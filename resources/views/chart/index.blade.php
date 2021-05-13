<!--継承-->
@extends('chart.layout')

@section('title')

<h2>this is chart.blade</h2>
<p>choose date and item</p>
{{$param['name']}}
<form action="" method="post">
  {{csrf_field()}}
  <div>
    <label>item name:</label>
    <select name="name">
      @foreach($date_list as $value)
      <option value="{{$value->name}}">
        {{$value->name}}
      </option>
      @endforeach
    </select>
  </div>
  <div>
    <label>date:</label><input type="date" name="s_date">-<input type="date" name="e_date">
  </div>
  <button type="submit"/>submit</button>
</form>

<canvas id="myLineChart"></canvas>

<table border="1">
@foreach($date_list as $value)
<tr>
  <td>{{$value->date}}</td>
  <td align="right">{{number_format($value->total_quantity)}}</td>
</tr>
@endforeach
</table>


@section('footer')
