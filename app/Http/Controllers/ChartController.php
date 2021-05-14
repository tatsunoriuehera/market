<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    //
    public function index(){

      $param=['name'=>'輪菊(白)'];
      //$param=['name'=>$request->name];
      //SQLの結果を連想配列で変数に代入
      $dates = DB::select('select distinct date , total_quantity from all_markets ');
      $namelist = DB::select('select distinct name from names ');
      //$dates=['2021-04-01','2021-04-02','2021-04-03'];

      //空の配列を作成
      $j_date = [];
      $j_quantity = [];
      //view側へ渡す変数で扱いやすいように、キーに対する値を代入
      //javascript（chartjs）で表示するには@jsonで変換する
      foreach($dates as $list){
        $j_date[] = $list->date;
        $j_quantity[] = $list->total_quantity;
      }
      //if(isset($request->set_date)){
        //$param=['date'=>$request->set_date];
        //$items=DB::select('select * from allresults where date = :date order by date desc,id',$param);
        //$items=DB::select('select * from all_markets where date = :date order by date desc,id',$param);
      //}
      //else{
        //$items=DB::select('select * from allresults order by date desc ,id');
        //$items=DB::select('select * from all_markets order by date desc ,id');
      //}
      return view('chart.index',['dates'=>$j_date,'param'=>$param,'quantity'=>$j_quantity,'date_list'=>$dates,'namelist'=>$namelist]);
      //return view('chart.index')->with($dates);

    }
    public function result(Request $request){
      $validate_rule = [
        's_date' => 'required' ,
        'e_date' => 'required'
      ];
      $this->validate($request,$validate_rule);

      $param = ['name'=>$request->name,'s_date'=>$request->s_date,'e_date'=>$request->e_date];
      //SQLの結果を連想配列で変数に代入
      $dates = DB::select('select distinct date , total_quantity from all_markets where name = :name
                            and date between :s_date and :e_date and total_quantity > 0 order by date ',$param);
      $namelist = DB::select('select distinct name from names ');
      //$dates=['2021-04-01','2021-04-02','2021-04-03'];

      //空の配列を作成
      $j_date = [];
      $j_quantity = [];
      //view側へ渡す変数で扱いやすいように、キーに対する値を代入
      //javascript（chartjs）で表示するには@jsonで変換する
      foreach($dates as $list){
        $j_date[] = $list->date;
        $j_quantity[] = $list->total_quantity;
      }
      //if(isset($request->set_date)){
        //$param=['date'=>$request->set_date];
        //$items=DB::select('select * from allresults where date = :date order by date desc,id',$param);
        //$items=DB::select('select * from all_markets where date = :date order by date desc,id',$param);
      //}
      //else{
        //$items=DB::select('select * from allresults order by date desc ,id');
        //$items=DB::select('select * from all_markets order by date desc ,id');
      //}
      return view('chart.index',['dates'=>$j_date,'quantity'=>$j_quantity,'param'=>$param,
      'date_list'=>$dates,'namelist'=>$namelist]);
      //return view('chart.index')->with($dates);

    }

}
