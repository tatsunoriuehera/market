<html>
<head>
  <meta charset="utf-8">
  <titie>@yield('title')</titie>
  <!--<link href="{{asset('css/style.css')}}" rel="stylesheet">-->
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  <style media="screen">
    .pagination li{display: inline-block;}
  </style>
  <!--GoogleのCDN-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
@yield('content')

@yield('footer')
  <script>
  // ファイルを選択すると、コントロール部分にファイル名を表示
    $('.custom-file-input').on('change',function(){
    $(this).next('.custom-file-label').html($(this)[0].files[0].name);
  })
  </script>
  <!--GoogleのCDN-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
