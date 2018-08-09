<div class="header">

  <div class="header2">
    <a href="{{url('')}}"><img src="template_asset/images/logo/logo.png" alt=""></a>
    <form action="{{url('tim-kiem')}}" class="search" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}"/>
      <input class="txt-search" type="text" name="search" size="30" placeholder="Nhập tên hoặc mã sản phẩm">
      <button type="submit" class="btn-red ok" name="ok">Tìm kiếm</button>
    </form>

    <ul class="header-right">
      <li><a href="{{url('tin-tuc/quy-dinh-ve-doi-tra-lai-hang')}}" ><img src="template_asset/images/site/header/btn-doitra30.png" alt=""></a></li>
      <li><a href="{{url('tin-tuc/chinh-sach-van-chuyen-hang')}}" ><img src="template_asset/images/site/header/btn-mienphivanchuyen.png" alt=""></a></li>
      <li><a href="{{url('tin-tuc/huong-dan-mua-tra-gop')}}" ><img src="template_asset/images/site/header/btn-tragop0lai.png" alt=""></a></li>
      <li><img src="template_asset/images/site/header/btn-tuvan.png" alt=""></li>
    </ul>
    <?php
        $result=count(Cart::content());
     ?>
    <a class="dm" href="{{url('gio-hang')}}">Giỏ hàng của bạn (<?php echo $result; ?>)</a>
  </div>

</div>
<div style="clear: both;"></div>
