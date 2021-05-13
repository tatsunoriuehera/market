<html>
<head>
  <meta charset="utf-8">
  <titie>@yield('title')</titie>
  <!--<link href="{{asset('css/style.css')}}" rel="stylesheet">-->
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  <style media="screen">
    .pagination li{display: inline-block;}
  </style>

</head>
<body>
@yield('content')

@yield('footer')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
  <script type="text/javascript">
  //let array_date = ['2021-04-01','2021-04-02','2021-04-03']
  //let array_price = ['10','15','5'];

  //javascript（chartjs）で表示するにはjsonで変換する
  let array_date = @json($dates);
  let array_quantity = @json($quantity);
  //let date = <?php echo json_encode($dates); ?>;
  console.log(array_quantity)
  //let array_price = <?php #echo $json_price; ?>;

       function disp(){
         user = window.prompt("please input user name","");
       }

  var ctx = document.getElementById("myLineChart").getContext('2d');
  var myLineChart = new Chart(ctx, {
    type: 'bar',
        data:{
            //X軸の情報
            labels: array_date,
            //Y軸の情報
            datasets: [{
                    //グラフの種類
                    type: 'bar',
                    //凡例名
                    label: "<?php #echo $mid_name["$s_item"]."-".$mid_name["$e_item"]; ?>数量<?php #echo $s_day.$e_day; ?>",
                    //情報
                    data: array_quantity,
                    //背景色
                    backgroundColor: "rgba(54,162,235,0.2)",
                    //線色
                    borderColor: 'rgb(54,162,235)',
                    //先の太さ
          }]
      }
      ,
      options:{
        scales:{
          yAxes:[{ticks:{beginAtZero:true,stepSize:0}}]
        }
      }

    });
</script>
  <!--GoogleのCDN-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
