@extends('allresults/layout')
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">一覧</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-11 col-md-offset-1">
    <table class="table text-center">
      <tr>
        <th class="text-center">品名</th>
        <th class="text-center">数量計</th>
        <th class="text-center">販売区分</th>
        <th class="text-center">数量</th>
        <th class="text-center">北足立</th>
        <th class="text-center">大田</th>
        <th class="text-center">板橋</th>
        <th class="text-center">葛西</th>
        <th class="text-center">世田谷</th>
        <th class="text-center">日付</th>
      </tr>
      @foreach($items as $item)
      <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->total_quantity }}</td>
        <td>{{ $item->category }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ $item->adachi }}</td>
        <td>{{ $item->oota }}</td>
        <td>{{ $item->itabashi }}</td>
        <td>{{ $item->kasai }}</td>
        <td>{{ $item->setagaya }}</td>
        <td>{{ $item->date }}</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection
