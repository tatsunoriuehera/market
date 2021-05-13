<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::resource('allresults','AllresultsController');
Route::get('allresults','AllresultsController@index');
//update
Route::get('allresults/edit','AllresultsController@edit');
Route::post('allresults/edit','AllresultsController@update');
//delete
Route::post('allresults','AllresultsController@destroy');

/////////////////////////////////////////////////////////////////////////////

Route::get('csv','CsvController@index');//表示
Route::post('csv','CsvController@importCSV');//登録


Route::get('csv/edit', 'CsvController@test'); //表示
Route::post('csv/edit', 'CsvController@importCsv'); //登録

/////////////////////////////////////////////////////////////////////////////

Route::get('chart','ChartController@index');//表示
Route::post('chart','ChartController@result');//結果
