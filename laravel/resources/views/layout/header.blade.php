<div class="top-nav">

</div>
<div class="header">
    <a class="main-logo" href="{{url('')}}">
        <img src="{{url('')}}/template_asset/images/logo/logo.png" alt="">
    </a>
    <form action="{{url('tim-kiem')}}" class="search" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <input class="txt-search" type="text" name="search" size="70"
               placeholder="Nhập tên hoặc mã sản phẩm cần tìm kiếm...">
        <span>
                <button type="submit" class="btn-red btn-search" name="Tìm kiếm">Tìm kiếm</button>
        </span>
    </form>
    <div class="header-right">
        <ul >
            <li>
                <span class="hotline">Hotline: 0939 66 1010</span>
            </li>
            {{--<li><img class="tuvan" src="{{url('/')}}/template_asset/images/site/header/btn-tuvan.png" alt=""></li>--}}
            <li>
                <?php
                $result = count(Cart::content());
                ?>
                <div style="float: right; margin: 0px 10px">
                    <a class="mycart" href="{{url('gio-hang')}}">
                        <img src="{{url('/')}}/images/cart-icon.png"/>
                        <span style="color: red">(<?php echo $result; ?>)</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>

</div>
<div style="clear: both;"></div>
