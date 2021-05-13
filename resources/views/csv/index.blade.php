<!--継承-->
@extends('csv.layout')

@section('title')

<h2>csv import(index.blade)</h2>
<p>all_marketsテーブルにインポートします。</p>
<form action="" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="row">
  <label class="col-1 text-right" for="form-file-1">csvfile:</label>
    <div class="col-11">
      <div class="custom-file">
        <input type="file" name="csv" class="custom-file-input" id="customFile">
        <label class="custom-file-label" for ="customFile" data-browse="参照">choose file ...</label>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-success btn-block" />submit</button>
</form>
@if(Session::has('flashmessage'))
    <script>
        $(window).on('load',function(){
            $('#myModal').modal('show');
        });
    </script>

    <!-- モーダルウィンドウの中身 -->
    <div class="modal fade" id="myModal" tabindex="-1"
         role="dialog" aria-labelledby="label1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                     {{ session('flashmessage') }}
                </div>
                <div class="modal-footer text-center">
                </div>
            </div>
        </div>
    </div>
    <p>{{ session('flashmessage') }}</p>
@endif
@section('footer')
