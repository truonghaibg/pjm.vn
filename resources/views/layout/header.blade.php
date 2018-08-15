<div style="width: 100%;text-align: center">
    <div class="top_partners" style="width:1200px;text-align: center;">
        <section id="demos">
            <div class="row">
                <div class="large-12 columns">
                    <div class="owl-carousel owl-theme" id="partners">
                        <?php foreach($headerData as $item){ ?>
                        <div class="item">
                            <a href="{{$item->link}}" target="_blank">
                                <img src='upload/partners/{{$item->logo}}' alt='{{$item->name}}' />
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <script>
                        $(document).ready(function () {
                            var owl = $('#partners');
                            owl.owlCarousel({
                                margin: 0,
                                nav: false,
                                loop: true,
                                autoplay: true,
                                responsive: {
                                    0: {
                                        items: 10
                                    }
                                }
                            })
                        })
                    </script>
                </div>
            </div>
        </section>
    </div>
</div>
<style>
    .top_partners .owl-dots {
    display: none;
    }
</style>

<div class="header">

  <div class="header2">
    <a href="{{url('')}}"><img src="template_asset/images/logo/logo.png" alt=""></a>
    <form action="{{url('tim-kiem')}}" class="search" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}"/>
      <input class="txt-search" type="text" name="search" size="90" placeholder="Nhập tên hoặc mã sản phẩm cần tìm kiếm...">
      <button type="submit" class="btn-red ok" name="ok">Tìm kiếm</button>
    </form>

    <ul class="header-right">
      {{--<li><a href="{{url('tin-tuc/quy-dinh-ve-doi-tra-lai-hang')}}" ><img src="template_asset/images/site/header/btn-doitra30.png" alt=""></a></li>--}}
      {{--<li><a href="{{url('tin-tuc/chinh-sach-van-chuyen-hang')}}" ><img src="template_asset/images/site/header/btn-mienphivanchuyen.png" alt=""></a></li>--}}
      {{--<li><a href="{{url('tin-tuc/huong-dan-mua-tra-gop')}}" ><img src="template_asset/images/site/header/btn-tragop0lai.png" alt=""></a></li>--}}
      <li><img src="template_asset/images/site/header/btn-tuvan.png" alt=""></li>
    </ul>
    <?php
        $result=count(Cart::content());
     ?>
    <a class="dm" href="{{url('gio-hang')}}">Giỏ hàng của bạn (<?php echo $result; ?>)</a>
  </div>

</div>
<div style="clear: both;"></div>
