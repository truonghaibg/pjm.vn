@extends('layout.index')
@section('content')
<div class='product'>
  <div class='pro-title'>
      <div class='title-name'>
          <img class='logo-pro-title' src='{{url('/')}}/template_asset/images/site/pro/cd.png' alt=''>
          <h3>
          {{$nsx3->nsx_name}}
          </h3>
      </div>
        <div class='sub-title'>
          <div class='sub-title-ul'>
          </div>
        </div>
    </div>
    <div class='pro'>
      <div class='pros'>
        <ul class='pro-ul'>
          @foreach($product3 as $p)
            <li class='pro-li'>
                <a class='pro-a' href="{{url('item/'.$p->product_namekd)}}" target="_blank" title='{{$p->product_namekd}}'>
                  <img class='pro-img' src='{{url('')}}/upload/product/{{$p->product_img}}'>
                  <img class='sale-value-img' <?php if ($p->product_salevalue==0) {
                      echo "style='display:none;'";
                    } ?>src='{{url('')}}/template_asset/images/site/pro/sale-img.png'>
                  <span class='sale-value-txt' 
                    <?php if ($p->product_salevalue==0) {
                      echo "style='display:none;'";
                    } ?>
                  >{{$p->product_salevalue}}%</span>
                  <?php
                      $phantram = ($p->product_salevalue)/100;
                      $tiensale = ($p->product_price)*$phantram;
                      $price = ($p->product_price)-$tiensale;
                  ?>

                  <div id="pro-price3">
                      <?php
                      if ($price==0) {
                          echo 'Liên hệ';
                      } else {
                          echo number_format($price).'đ';
                      }
                      ?>
                  </div>
                  <span class='pro-price2'>{{number_format($p->product_price)}}đ</span>
                  <span class='pro-name' title=''>{{$p->product_name}}</span>
                    <?php
                    if ($p->product_status == 1) {
                        echo "<span class='pro-sale-info' title='' style='color:#68EE60'><img src='" . url('/') . "/template_asset/images/site/pro/cart.png'>  Hàng mới về</span>";
                    }
                    if ($p->product_status == 2) {
                        echo "<span class='pro-sale-info' title='' style='color:#68EE60'><img src='" . url('/') . "/template_asset/images/site/pro/cart.png'>  Còn hàng</span>";
                    }
                    if ($p->product_status == 3) {
                        echo "<span class='pro-sale-info' title=''><img src='" . url('/') . "/template_asset/images/site/pro/telephone.png'>  Liên hệ</span>";
                    }
                    ?>
                </a>
              </li>
            @endforeach
        </ul>
        </div>
      </div>
</div>
<div style="clear: both;"></div>
@endsection
