<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Goodby\CSV\Import\Standard\LexerConfig;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;

use App\Models\Allresults;
use App\Models\AllMarket;

class CsvController extends Controller
{
    //
    public function index(){
      return view('csv.index');
    }

    public function test(){
      return view('csv.index');
    }


    public function importCsv(Request $rq){
        if($rq->hasFile('csv') && $rq->file('csv')->isValid()) {
            // CSV ファイル保存
            $tmpname = uniqid("CSVUP_").".".$rq->file('csv')->guessExtension(); //TMPファイル名
            $rq->file('csv')->move(public_path()."/csv/tmp",$tmpname);
            $tmppath = public_path()."/csv/tmp/".$tmpname;

            // Goodby CSVの設定
            $config_in = new LexerConfig();
            $config_in
                ->setFromCharset("SJIS-win")
                ->setToCharset("UTF-8") // CharasetをUTF-8に変換
                //->setIgnoreHeaderLine(true) //CSVのヘッダーを無視
                ->setIgnoreHeaderLine(false) //CSVのヘッダーを有効
            ;
            $lexer_in = new Lexer($config_in);

            $datalist = array();

            $interpreter = new Interpreter();
            $interpreter->addObserver(function (array $row) use (&$datalist){
               // 各列のデータを取得
               $datalist[] = $row;
            });

            // CSVデータをパース
            $lexer_in->parse($tmppath,$interpreter);

            // TMPファイル削除
            unlink($tmppath);

            // 処理
            $count=0;
            foreach($datalist as $row){
                // 各データ取り出し
                $csv_user = $this->get_csv_user($row);

                // DBへの登録
                $this->regist_user_csv($csv_user);

                //別記：モデルへ直接流し込み
                //Allresults::insert(['name' => $row[0], 'total_quantity' => $row[1]]);

                $count++;
            }
            return redirect('/csv/edit')->with('flashmessage', $count . '件のCSVのデータを読み込みました。');
        }
        return redirect('/csv/edit')->with('flashmessage','CSVの読み込みエラーが発生しました。');
    }

    private function get_csv_user($row){
      $user = array(
          //各カラムに対応するセルを選択
          'name' => $row[0],
          'total_quantity' => $row[1],
          'category' => $row[2],
          'quantity' => $row[3],
          'adachi' => $row[4],
          'oota' => $row[5],
          'itabashi' => $row[6],
          'kasai' => $row[7],
          'setagaya' => $row[8],
          'date' => $row[9]
      );
      return $user;
    }

    private function regist_user_csv($user){
      //insertするmodel(table_name)を指定する
      $newuser = new AllMarket;
        foreach($user as $key => $value){
            $newuser->$key = $value;
        }
        $newuser->save();
    }
}
