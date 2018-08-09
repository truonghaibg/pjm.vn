@extends('layout.index')
@section('content')
<div class='product'>
  <div class='pro-title'>
      <div class='title-name'>
          <img class='logo-pro-title' src='template_asset/images/site/pro/cd.png' alt=''>
          <h3>
          {{$subcate2->subcate_name}}
          </h3>

      </div>

        <div class='sub-title'>
          <div class='sub-title-ul'>
            @foreach($subcate2->nsx as $n)
              <div class='sub-title-li'><a href="{{url('danh-sach/'.$cate1->cate_namekd.'/'.$subcate2->subcate_namekd.'/'.$n->nsx_namekd)}}">{{$n->nsx_name}}  | </a></div>
            @endforeach
          </div>
        </div>

    </div>

    <div class='pro'>
      <div class='pros'>
        <ul class='pro-ul'>
          @foreach($product2 as $p)
            <li class='pro-li'>
                <a class='pro-a' href="{{url('item/'.$p->product_namekd)}}" target'_blank' title='{{$p->product_namekd}}'>
                  <img class='pro-img' src='upload/product/{{$p->product_img}}'>
                  <img class='sale-value-img' <?php if ($p->product_salevalue==0) {
                      echo "style='display:none;'";
                    } ?>src='template_asset/images/site/pro/sale-img.png'>
                  <span class='sale-value-txt' 
                    <?php if ($p->product_salevalue==0) {
                      echo "style='display:none;'";
                    } ?>
                  >{{$p->product_salevalue}}%</span>
                  <?php
                  $phantram = ($p->product_salevalue)/100;
                  $tiensale = ($p->product_price)*$phantram;
                  $price=($p->product_price)-$tiensale ?>

                  <div id="pro-price3">
                  @forelse(str_split(number_format($price,0)) as $p1)
                    <?php
                      switch ($p1) {
                        case ',':
                          ?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/x42.png')}}" alt=""></span><?php
                          break;
                        case '0':
                          # code...
                          ?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/0x42.png')}}" alt=""></span><?php
                          break;
                        case '1':
                          # code...
                          ?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/1x42.png')}}" alt=""></span><?php
                          break;

                        case '2':
                          # code...
                          ?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/2x42.png')}}" alt=""></span><?php
                          break;

                        case '3':
                          # code...
                          ?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/3x42.png')}}" alt=""></span><?php
                          break;

                        case '4':
                          # code...
                          ?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/4x42.png')}}" alt=""></span><?php
                          break;

                        case '5':
                          # code...
                          ?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/5x42.png')}}" alt=""></span><?php
                          break;

                        case '6':
                          # code...
                          ?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/6x42.png')}}" alt=""></span><?php
                          break;

                        case '7':
                          # code...
                          ?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/7x42.png')}}" alt=""></span><?php
                          break;

                        case '8':
                          # code...
                          ?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/8x42.png')}}" alt=""></span><?php
                          break;
                        case '9':
                          # code...
                          ?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/9x42.png')}}" alt=""></span><?php
                          break;


                        default:
                          # code...
                          break;
                      }
                     ?>
                  @empty
                  @endforelse
                  </div>
                  <span class='pro-price2'>{{number_format($p->product_price,0,",",".")}}</span>
                  <span class='pro-name' title=''>{{$p->product_name}}</span>
                  <span class='pro-info' title=''>{{$p->product_tag}}</span>
                  <?php
                    if ($p->product_status == 1) {
                       echo "<span class='pro-sale-info' title='' style='color:#68EE60'><img src='template_asset/images/site/pro/cart.png'>  Hàng mới về</span>";
                    }
                    if ($p->product_status == 2) {
                      echo "<span class='pro-sale-info' title='' style='color:#68EE60'><img src='template_asset/images/site/pro/cart.png'>  Còn hàng</span>";
                    }
                    if ($p->product_status == 3) {
                      echo "<span class='pro-sale-info' title=''><img src='template_asset/images/site/pro/telephone.png'>  Liên hệ</span>";
                    }
                   ?>
                </a>
              </li>
        @endforeach
        </div>
      </div>
</div>
<div style="clear: both;"></div>
@endsection
