<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllresultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //$dates=DB::select('select distinct date from allresults order by date desc');
        $dates=DB::select('select distinct date from all_markets order by date desc');
        if(isset($request->set_date)){
          $param=['date'=>$request->set_date];
          //$items=DB::select('select * from allresults where date = :date order by date desc,id',$param);
          $items=DB::select('select * from all_markets where date = :date order by date desc,id',$param);
        }
        else{
          //$items=DB::select('select * from allresults order by date desc ,id');
          $items=DB::select('select * from all_markets order by date desc ,id');
        }
        return view('allresults.index',['items'=>$items],['dates'=>$dates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        if(isset($request->set_date)){
          $param=['date'=>$request->set_date];
          //$items=DB::select('select * from allresults where date = :date order by date desc,id',$param);
          $items=DB::select('select * from all_markets where date = :date order by date desc,id',$param);
        }
        else{
          //$items=DB::select('select * from allresults order by date desc ,id');
          $items=DB::select('select * from all_markets order by date desc ,id');
        }
        return view('allresults.edit',['items'=>$items]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if(isset($request->set_date)){
          $param=['date'=>$request->set_date];
          //$items=DB::update('update allresults set date =:date where date is null',$param);
          $items=DB::update('update all_markets set date =:date where date is null',$param);
          $message = "null date is ". $request->set_date. " update";
        }else{
          $message = "set_date is empty";
        }
        return view('allresults.edit',compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        if(isset($request->name)){
          $param=['name'=>$request->name];
          //$items=DB::delete('delete from allresults where name =:name',$param);
          $items=DB::delete('delete from all_markets where name =:name',$param);
          $message = "name " . $request->name. " is delete";
        }else{
          $message = "name is empty";
        }
        return view('allresults.edit',compact('message'));
    }

}
