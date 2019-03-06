@extends('layout.index')
@section('content')
<script>
    function check_field() {
        var error = "";
        var check_name = document.getElementById("buyer_name").value;
        var check_email = document.getElementById("buyer_email").value;
        var check_tel = document.getElementById("buyer_tel").value;
        var check_add = document.getElementById("buyer_address").value;

        var text=/^[a-zA-Z," ",]+$/;
        var number=/^[0-9]+$/;
        var reg_mail = /^[A-Za-z0-9]+([_\.\-]?[A-Za-z0-9])*@[A-Za-z0-9]+([\.\-]?[A-Za-z0-9]+)*(\.[A-Za-z]+)+$/;

        if ((check_name.length)>3 ) {
          if(number.test(check_name)){
            error += "-  Họ tên không chứa số\n";
            // document.myForm.check_name.focus();
          }
        } else {
          error += "-  Họ tên quá ngắn\n";
        }

        if ((check_tel.length)>8 ) {
          if(isNaN(check_tel)){
            error += "-  Số điện thoại không chứa chữ\n";
          }
        } else {
          error += "- Số điện thoại chưa đúng\n";
        }

        if ((check_email.length)>12 ) {
          if(reg_mail.test(check_email) == false){
            error += "-  Email không hợp lệ\n";
          }
        } else {
          error += "- Email chưa đúng\n";
        }

        if ((check_add.length)<10 ) {
          error += "- Địa chỉ chưa đúng\n";
        }
        //
        // if ((check_tel==null || check_tel=="",check_name==null || check_name=="",check_add==null || check_add=="")
        // {
        //   error += "- Không được để trống các trường\n";
        //   return false;
        // }
        if(error != "") {
            alert(error);
            return false;
        }
        return true;
        // if(check_tel.length < 8) error += "- Số điện thoại chưa đúng\n";
        // if(check_add.length < 4) error += "- Bạn chưa nhập tên\n";
        //
        // if (y.match(number)) {
        //     alert("Họ tên không được chứa số");
        // } else {
        //     alert("Input OK");
        // }
        // document.getElementById("demo").innerHTML = text;
    }
    function fill_ship_info(){
      document.getElementById('ship_to_name').value = document.getElementById('buyer_name').value;
      document.getElementById('ship_to_tel').value = document.getElementById('buyer_tel').value;
      document.getElementById('ship_to_address').value = document.getElementById('buyer_address').value;
    }
    $(document).ready(function(){
      $(".pay_option").change(function(){
        $(".pay_content").hide();
        $(this).parents("tr").find(".pay_content").show();
        $(this).parents("tr").find(".pay_content").find("li:eq(0) img").click();
      });
      $(".ship_option").change(function(){
        $(".ship_content").hide();
        $(this).parents("tr").find(".ship_content").show();
      });
    });
</script>
<div class="cart-info"<?php
 if (Cart::total() == 0){
   echo 'style="display:none"';
 }
   ?>>
  <form action="{{url('check-out')}}" method="POST" enctype="multipart/form-data" onsubmit="return check_field()">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <div class="c3_col_1">
      <div class="c3_box">
        <div class="title_box_cart"> Thông tin khách hàng</div>
        <div> Họ tên Quý khách <span class="txt2">*</span>
          <input name="buyer_name" id="buyer_name" value="" type="text">
        </div>
        <div> Địa chỉ Email <span class="txt2">*</span>
          <input name="buyer_email" id="buyer_email" value="" type="text">
        </div>
        <div> Số điện thoại <span class="txt2">*</span>
          <input name="buyer_tel" id="buyer_tel" value="" type="text">
        </div>
        <div> Địa chỉ <span class="txt2">(số nhà, đường, tỉnh) *</span>
          <textarea name="buyer_address" id="buyer_address"></textarea>
        </div>
        <div class="clear"></div>
      </div>

      <div class="c3_box">
        <div class="c3_box">
          <div class="title_box_cart">Thông tin giao hàng</div>
          <div class="txt0">
            <input onchange="fill_ship_info()" type="checkbox">
            Giao hàng tới cùng địa chỉ</div>
          <div> Họ tên <span class="txt2">*</span> <br>
            <input size="40" name="ship_to_name" id="ship_to_name" type="text">
          </div>
          <div class="clear"></div>
          <div> Số điện thoại <span class="txt2">*</span> <br>
            <input value="" id="ship_to_tel" name="ship_to_tel" size="40" type="text">
          </div>
          <div> Địa chỉ <span class="txt2">(số nhà, đường, tỉnh) *</span> <br>
            <textarea id="ship_to_address" name="ship_to_address"></textarea>
          </div>
          <div> Ghi chú
          <textarea name="buyer_note" id="buyer_note"></textarea>
        </div>
        </div>
      </div>
    </div>

    <div class="c3_col_1" style="margin: 0;width:36%">
      <div class="c3_box">
        <div class="title_box_cart">Hình thức thanh toán</div>
        <table class="tbl_pay">

          <tbody><tr>
            <td valign="top"><input name="pay_method" value="1" class="pay_option" type="radio"></td>
            <td valign="top">
              <div class="txt0">Thanh toán trực tiếp</div>

              <div class="pay_content" style="display:none;">
                Quý khách hàng có thể thanh toán trực tiếp tại 2 cơ sở chính của Hà Nội Computer có địa chỉ 129 + 131 Lê Thanh Nghị hoặc chi nhánh 43 Thái Hà
              </div>

            </td>
          </tr>

          <tr>
            <td valign="top"><input name="pay_method" value="2" class="pay_option" type="radio"></td>
            <td valign="top">
              <div class="txt0">Thanh toán tại nơi giao hàng</div>

              <div class="pay_content" style="display:none;">
                Quý khách hàng có thể thanh toán tại nơi giao hàng bằng tiền mặt sau khi nhận được đầy đủ hàng hóa và đáp ứng chất lượng
              </div>

            </td>
          </tr>

          <tr>
            <td valign="top"><input name="pay_method" value="3" class="pay_option" type="radio"></td>
            <td valign="top">
              <div class="txt0">Thanh toán bằng chuyển khoản</div>

              <div class="pay_content" style="display:none;">
                Quý khách hàng có thể khoản thanh toán trước bằng hình thức chuyển khoản vào một trong các tài khoản sau :
                <br>
                <br>Chủ tài khoản : NGÔ XUÂN TÀI
                <br>Địa chi : 39 , 14 Phú Xá Thái Nguyên
                <br>
                <br>1/Ngân Hàng TMCP Công Thương Việt Nam - VietinBank
                <br>
                <br>- Số tài khoản VND: 107866673368
                <br>
                <br>2. Ngân hàng TMCP Ngoại Thương Việt Nam- Chi nhánh Thái Nguyên (Vietcombank)
                <br>
                <br>- Số tài khoản VND: 0821000060773
              </div>

            </td>
          </tr>

          <tr>
            <td valign="top"><input name="pay_method" value="4" class="pay_option" type="radio"></td>
            <td valign="top">
              <div class="txt0">Chuyển khoản qua Paypal</div>

              <div class="pay_content" style="display:none;">
                <ul class="b_l">
              		<li><img class="img-bank" id="30" src="https://www.baokim.vn/application/uploads/banks/vietcombank.png" title="Vietcombank - Ngân hàng TMCP Ngoại thương"></li><li><img class="img-bank" id="36" src="https://www.baokim.vn/application/uploads/banks/techcombank.png" title="Techcombank - Ngân hàng Kỹ thương Việt Nam"></li><li><img class="img-bank" id="132" src="https://www.baokim.vn/application/uploads/banks/vietinbank.png" title="Vietinbank - Ngân hàng Công thương Việt Nam"></li><li><img class="img-bank" id="133" src="https://www.baokim.vn/application/uploads/banks/bidvbank.png" title="BIDV - Ngân hàng Đầu tư và Phát triển Việt Nam"></li><li><img class="img-bank" id="84" src="https://www.baokim.vn/application/uploads/banks/maritimebank.png" title="MSB - Ngân hàng Hàng Hải Việt Nam"></li><li><img class="img-bank" id="136" src="https://www.baokim.vn/application/uploads/banks/vpbank.png" title="VPBank - Ngân hàng Việt Nam Thịnh Vượng"></li><li><img class="img-bank" id="32" src="https://www.baokim.vn/application/uploads/banks/dongabank.png" title="DongA Bank - Ngân hàng Đông Á"></li><li><img class="img-bank" id="54" src="https://www.baokim.vn/application/uploads/banks/acbbank.png" title="ACB - Ngân hàng Á Châu"></li><li><img class="img-bank" id="147" src="https://www.baokim.vn/application/uploads/banks/agribank.png" title="Agribank - Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam"></li><li><img class="img-bank" id="80" src="https://www.baokim.vn/application/uploads/banks/sacombank.png" title="Sacombank - Ngân hàng Sài Gòn Thương Tín"></li><li><img class="img-bank" id="65" src="https://www.baokim.vn/application/uploads/banks/mbbank.png" title="Ngân hàng Quân Đội (MB)"></li><li><img class="img-bank" id="140" src="https://www.baokim.vn/application/uploads/banks/eximbank.png" title="Eximbank - Ngân hàng Xuất nhập khẩu"></li><li><img class="img-bank" id="82" src="https://www.baokim.vn/application/uploads/banks/baovietbank.png" title="BAOVIET Bank - Ngân hàng Bảo Việt"></li><li><img class="img-bank" id="81" src="https://www.baokim.vn/application/uploads/banks/pgbank.png" title="PG Bank - Ngân Hàng TMCP Xăng Dầu"></li><li><img class="img-bank" id="45" src="https://www.baokim.vn/application/uploads/banks/shbbank.png" title="SHB - Ngân hàng Sài Gòn- Hà Nội"></li><li><img class="img-bank" id="47" src="https://www.baokim.vn/application/uploads/banks/vibbank.png" title="VIB - Ngân hàng Quốc Tế"></li><li><img class="img-bank" id="56" src="https://www.baokim.vn/application/uploads/banks/tienphongbank.png" title="TienPhongBank - Ngân hàng Tiên  Phong"></li><li><img class="img-bank" id="49" src="https://www.baokim.vn/application/uploads/banks/seabank.png" title="SeABank - Ngân hàng Đông Nam Á"></li>
                </ul>
              </div>

            </td>
          </tr>


        </tbody></table>
      </div><!--c3_box-->
      <div class="c3_box">
        <div class="title_box_cart">Hình thức vận chuyển</div>
        <div>
          <table class="tbl_ship">

            <tbody><tr>
              <td valign="top"><input name="ship_method" value="1" class="ship_option" type="radio"></td>
              <td valign="top"><div class="txt0">Vận chuyển tính phí theo thỏa thuận</div>
            	<div class="ship_content" style="display:none;">Hình thức Vận chuyển tính phí theo thỏa thuận khi đơn hàng có bán kính &gt; 20Km. Quý khách vui lòng thỏa thuận giá vận chuyển với nhân viên tư vấn bán hàng</div></td>
            </tr>

            <tr>
              <td valign="top"><input name="ship_method" value="2" class="ship_option" type="radio"></td>
              <td valign="top"><div class="txt0">Miễn phí trong nội thành Hà Nội</div>
            	<div class="ship_content" style="display:none;">Hình thức vận chuyển miễn phí trong nội thành Hà Nội</div></td>
            </tr>

            <tr>
              <td valign="top"><input name="ship_method" value="3" class="ship_option" type="radio"></td>
              <td valign="top"><div class="txt0">Miễn phí trong 35 KM</div>
            	<div class="ship_content" style="display:none;">Hình thức vận chuyển miễn phí trong bán kính 35 km tính từ Công ty.</div></td>
            </tr>

          </tbody></table>
        </div>
        <div class="clear"></div>
      </div><!--c3_box-->
    </div>


    <div class="c3_col_1 c3_col_2">
      <div class="title_box_cart"> Xác nhận đơn hàng</div>
      <div class="c3_box">
        <div class="tbl_cart3">
          <table style="border-collapse: collapse;border: 1px solid #ccc;width: 100%;">




            <tbody>
              <?php $i=0; $array_promodel=array("0");$array_proqty=array("0");?>
               @foreach(Cart::content() as $row)
                <?php
                $phantram = ($row->options->sale)/100;
                $tiensale = ($row->price)*$phantram;
                $price=($row->price)-$tiensale;
                $tong=$price*($row->qty);
                $array_proqty[$i]=($row->qty);
                $array_promodel[$i]=($row->options->model);
                $i = $i+1; ?>
                <tr>
                  <td><?php
                  echo $i; ?></td>
                  <td>  <a href="{{url('item/'.$row->options->namekd)}}"><b><?php echo $row->name; ?></b></a>  </td>
                  <td><strong class="red"><?php echo number_format($row->price); ?> <u>đ</u></strong></td>
                  <td><input name="quantity_pro_35322" value="<?php echo $row->qty; ?>" type="hidden"><?php echo $row->qty; ?></td>
                </tr>

      	   	@endforeach
            <input type="text" name="prqty" value="{{json_encode($array_proqty)}}" style="display:none;">
            <input type="text" name="prmodel" value="{{json_encode($array_promodel)}}" style="display:none;">

            <tr class="txt_16">
              <td class="txt2 txt_right" colspan="4">
                Tổng tiền
                <strong class="red"><?php echo number_format(Cart::total()); ?> <u>đ</u></strong><br>
                (Chưa bao gồm phí vận chuyển)
              </td>
            </tr>
          </tbody></table>
          <div class="clear space2"></div>
          <div style="padding-top:10px;">
            <button class="btn_red" type="submit">Đặt hàng</button>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </form>
</div>
<div style="clear: both;"></div>
@endsection
