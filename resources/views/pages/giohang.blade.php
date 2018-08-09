@extends('layout.index')
@section('content')
<div class="ghang">
  <div id="guide_cart">
      <img src="template_asset/images/site/cart/cart.png" alt="" style="float:left">
      <h1>Chi tiết giỏ hàng</h1>
      <p>Để xóa sản phẩm khỏi giỏ hàng, bấm <img src="template_asset/images/site/cart/icon_del.png" alt="">, để mua thêm bấm <b>"Mua thêm sản phẩm khác"</b>.
        Để sang bước đặt hàng tiếp theo, bấm <b>"Tiếp tục"</b>, để mua hàng trả góp bấm <b>"Mua trả góp"</b></p>
  </div>
  <form action="{{url('/update-cart')}}" method="POST">
  <table style="margin-top: 10px;width: 100%; border-collapse: collapse;" id="tbl_list_cart" cellpadding="5" bordercolor="#CCCCCC" border="1">

      <input type="hidden" name="_token" value="{{csrf_token()}}"/>
      <thead class="tbd-cart">
         	<tr style="background-color: #f5f5f5;">
              <td>STT</td>
              <td>Tên sản phẩm</td>
              <td>Số lượng</td>
              <td>Giá sản phẩm</td>
              <td>Tổng</td>
              <td>Xóa</td>
         	</tr>
     	</thead>

     	<tbody class="tbd-cart">
        <?php $i=0;$a=0;$b=0; $array_rowid=array("0");?>
     		 @foreach(Cart::content() as $row)
          <?php
          $phantram = ($row->options->sale)/100;
          $tiensale = ($row->price)*$phantram;
          $price=($row->price)-$tiensale;
          $tong=$price*($row->qty);

          $i = $i+1;
          $array_rowid[$a]=($row->rowId);
          $a = $a+1;
          ?>
         		<tr>
                <td><?php
                echo $i; ?></td>
             		<td>
                    <img src="upload/product/{{$row->options->img}}" style="vertical-align: middle; margin-right: 10px; float:left; width:100px;">
                    <div style="margin-left:120px;">
                      <a href="{{url('item/'.$row->options->namekd)}}" >
                        <p><strong ><?php echo $row->name; ?></strong></p>
                      </a>
                      <p style="padding-top: 3px; color:red;font-weight: normal;text-transform: none;" class="red">Mã sản phẩm: <?php echo $row->options->model; ?></p>
                      <p style="padding-top: 3px;font-weight: normal;text-transform: none;">Bảo hành: 12T</p>
                    </div>
             		</td>
<td><input type="text" name="qty[]" value="<?php echo $row->qty; ?>" size="3" id="mySelect" onchange="myFunction()"></td>
             		<td>$<?php echo number_format($row->price); ?> VND
                  <input type="text" id="demo_price" style="display:none;" value="{{$row->price}}"></td>
                <?php $item_total=($row->qty)*($row->price); ?>
             		<td style="font-weight:bold">$<?php echo number_format($row->total); ?> VND</td>
                <td>
                  <a href="{{url('del-item/'.$row->rowId)}}" onclick="return kiemtra();">
                    <img src="template_asset/images/site/cart/icon_del.png">
                  </a>
                </td>
         		</tr>

  	   	@endforeach

           <input type="text" name="rowid" value="{{json_encode($array_rowid)}}" style="display:none">



        <script>
        // $(document).ready(function(){
        //   $(".update-cart").click(function(){
        //     alert(111);
        //   });
        // });
        function myFunction() {
            var y = document.getElementById("mySelect").value;
            document.getElementById("qty").value = y;
        }
        function kiemtra () {
            // body...
            if (!window.confirm("Bạn có muốn xoa san pham?")) {
                return false;
            };
        }
        </script>
     	</tbody>

     	<tfoot class="tfoot-cart">
     		<tr>
          <td colspan="3"></td>
     			<td colspan="3">Tổng tiền: <b style="color:red; font-size:17px;"><?php echo number_format(Cart::total()); ?> VND</b><br>
          Chưa bao gồm phí vận chuyển </td>
     		</tr>

     	</tfoot>
  </table>
  <div class="buy-cart" <?php
   if (Cart::total() == 0){
     echo 'style="display:none"';
   }
     ?>>
    <a href="{{url('tin-tuc/mua-tra-gop')}}" class="btn-orange">Mua trả góp</a>
    <a href="{{url('gio-hang-buoc-2')}}" class="btn-red">Tiếp tục</a>
    <button type="submit" style="border:none" class="btn-red update-cart" name="button">Cập nhật</button>

    <a href="{{url('')}}" class="btn-blue">Mua thêm sản phẩm khác</a>
  </div>

  </form>

</div>
<div style="clear: both;"></div>


@endsection
