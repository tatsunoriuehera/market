@extends('allresults.layout')
@section('title','index')
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">一覧</h3>
    <p class="ops-title">memo：足立は通常４倍入荷</p>
  </div>
  <div class="">
    <a href="/market/public">go index</a>
  </div>
  <ul>
    <!--<li><a href="allresults">all_date</a></li>-->
    @foreach($dates as $date)
    <li><a href="allresults?set_date={{$date->date}}">{{$date->date}}</a></li>
    @endforeach
  </ul>
  {{$dates->links()}}
</div>

<form action="allresults/edit" method="post">
  <label>update date:</label>{{csrf_field()}}<input type="text" name="set_date" value="">
  <input type="submit" name="submit" value="submit">
</form>

<form action="allresults" method="post">
  <label>delete name:</label>{{csrf_field()}}<input type="text" name="name" value="品名">
  <input type="submit" name="submit" value="submit">
</form>

<div class="row">
  <div class="col-md-11 col-md-offset-1">
    <table class="table text-right">
      <tr>
        <th class="text-center">#</th>
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
        <td>{{ $loop->index }}</td>
        <td class="text-left">{{ $item->name }}</td>
        <td>{{ number_format($item->total_quantity) }}</td>
        <td>{{ $item->category }}</td>
        <td>{{ number_format($item->quantity) }}</td>
        <td>{{ number_format($item->adachi) }}</td>
        <td>{{ number_format($item->oota) }}</td>
        <td>{{ number_format($item->itabashi) }}</td>
        <td>{{ number_format($item->kasai) }}</td>
        <td>{{ number_format($item->setagaya) }}</td>
        <td>{{ $item->date }}</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection

@section('footer')
presented by uehara
@endsection
