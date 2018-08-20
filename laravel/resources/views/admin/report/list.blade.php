@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">

            <table class="table table-striped table-bordered table-hover" >
                <thead>
                    <tr >
                        <th style="text-align: center;">Sản phẩm </th>
                        <th style="text-align: center;">Đơn hàng</th>
                        <th style="text-align: center;">Tổng giá trị bán ra</th>
                        <th style="text-align: center;">Đã thanh toán</th>
                        <th style="text-align: center;">Đợi thanh toán</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX" align="center">
                        <td style="color:red; font-size:18px;">{{$totalpro}}<a href="admin/product/list" target="_blank">(More)</a></td>
                        <td style="color:red; font-size:18px;">{{$totalorder}}<a href="admin/order/list" target="_blank">(More)</a></td>
                        <td style="color:red; font-size:18px;">
                          <?php
                          $total=0;
                            foreach ($order as $od) {
                              $total= $total+($od->amount);
                            }
                            echo number_format($total)." VNĐ";
                           ?>
                        </td>
                        <td style="color:red; font-size:18px;">
                          <?php
                          $total2=0;
                            foreach ($productpayed as $payed) {
                              $total2= $total2+($payed->amount);
                            }
                            echo number_format($total2)." VNĐ";
                           ?>
                        </td>
                        <td style="color:red; font-size:18px;">
                          <?php
                          $total3=0;
                            foreach ($productwaitpay as $payed) {
                              $total3= $total3+($payed->amount);
                            }
                            echo number_format($total3)." VNĐ";
                           ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
        <div class="row">

            <table class="table table-striped table-bordered table-hover" >
                <thead>
                    <tr >
                        <th style="text-align: center;">Thanh toán Paypal</th>
                        <th style="text-align: center;">Chuyển khoản</th>
                        <th style="text-align: center;">COD</th>
                        <th style="text-align: center;">Trực tiếp</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX" align="center">
                        <td style="color:red; font-size:18px;">
                          <?php
                          $total=0;
                            foreach ($withpaypal as $od) {
                              $total= $total+($od->amount);
                            }
                            echo number_format($total)." VNĐ";
                           ?>
                        </td>
                        <td style="color:red; font-size:18px;">
                          <?php
                          $total2=0;
                            foreach ($chuyenkhoan as $payed) {
                              $total2= $total2+($payed->amount);
                            }
                            echo number_format($total2)." VNĐ";
                           ?>
                        </td>
                        <td style="color:red; font-size:18px;">
                          <?php
                          $total3=0;
                            foreach ($cod as $payed) {
                              $total3= $total3+($payed->amount);
                            }
                            echo number_format($total3)." VNĐ";
                           ?>
                        </td><td style="color:red; font-size:18px;">
                          <?php
                          $total3=0;
                            foreach ($tructiep as $payed) {
                              $total3= $total3+($payed->amount);
                            }
                            echo number_format($total3)." VNĐ";
                           ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
          <!-- Styles -->
          <style>
          #chartdiv {
          	width		: 100%;
          	height		: 500px;
          	font-size	: 11px;
          }
          </style>

          <!-- Resources -->

          <?php
            $array_update=array();
            $array_time=array();
            $order= App\Order::all();
            $result= count($order);
            $i=0;
            $j=0;
            foreach ($order as $od) {
              $array_update[$i]=$od->updated_at;
              $array_id[]=$od->id;
              $array_amount[]=$od->amount;
              $i++;
            }
            foreach ($array_update as $date => $dat) {
              $array_month[]=$dat->month;
            }
            $array_m = array_unique($array_month);
            $result=count($array_m);
            $arr = array_values($array_m);
            sort($arr);
            // dd($arr); //month & amount
            $a=0;
            while ($a < $result) {
              $dataProvider_amount[$a]=0;
              $amount=array();
              $dataProvider= App\Order::whereMonth('updated_at',$arr[$a])->get();
              // dd($dataProvider);
              foreach ($dataProvider as $value) {
                $amount[]=$value->amount;
              }
              $dataProvider_amount[$a]=array_sum($amount)."/".$arr[$a];
              // dd(array_sum($amount));
              $am[]=array_sum($amount);
              $data[]=array("country"=>'Tháng '.$arr[$a],"visits"=>array_sum($amount));
              $a++;
            }

            // foreach ($data as $key => $value) {
            //   $data[$key]=json_decode(json_encode($value));
            // }
            // dd($data);
            $a=0;
            echo "<input type='text' id='result' value='$result' style='display:none'>";
            while ($a < count($data)) {
              echo "<input type='text' id='month$a' value='$arr[$a]' style='display:none'>";
              echo "<input type='text' id='amount$a' value='$am[$a]' style='display:none'>";
              $a++;
            }
           ?>
           <input type="hidden" id="dataProvider" value="{{json_encode($data)}}">

          <!-- HTML -->
          <div id="chartdiv"></div>
        </div>
        
      </div>
    <!-- /.container-fluid -->
</div>
@endsection
@section('script')

<!-- Chart code -->
<script type="text/javascript">
 $(document).ready(function(){
  //  var result = document.getElementById("result").value;
  //  var i=0;
  //  var amo = new Array(3);
  //  while (i<result) {
  //   var m = mount+i;
  //   var month = document.getElementById(m).value;
  //   var mon=[month];
  //   var a = amount+i;
  //   var amount= document.getElementById(a).value;
  //   amo[i]=amount;
  //   $i++;
  //  }
   var dataProvider = document.getElementById("dataProvider").value;
   dataProvider = JSON.parse(dataProvider);
   console.log(dataProvider);
   var chart = AmCharts.makeChart( "chartdiv", {
    "type": "serial",
    "theme": "light",
    "dataProvider":dataProvider,
    "valueAxes": [ {
      "gridColor": "#FFFFFF",
      "gridAlpha": 0.2,
      "dashLength": 0
    } ],
    "gridAboveGraphs": true,
    "startDuration": 1,
    "graphs": [ {
      "balloonText": "[[category]]: <b>[[value]]</b>",
      "fillAlphas": 0.8,
      "lineAlpha": 0.2,
      "type": "column",
      "valueField": "visits"
    } ],
    "chartCursor": {
      "categoryBalloonEnabled": false,
      "cursorAlpha": 0,
      "zoomable": false
    },
    "categoryField": "country",
    "categoryAxis": {
      "gridPosition": "start",
      "gridAlpha": 0,
      "tickPosition": "start",
      "tickLength": 20
    },
    "export": {
      "enabled": true
    }

   });
 });


</script>
@endsection
