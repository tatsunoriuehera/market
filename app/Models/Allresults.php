<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allresults extends Model
{
    //ブラックリスト方式
    //記述したカラムはアクセスできない
    //protected $guarded = ['id'];

    //ホワイトリスト方式はその逆
    //　$fillable　を使ってアクセスできるカラムを記述
    //protected $fillable = [];
}
