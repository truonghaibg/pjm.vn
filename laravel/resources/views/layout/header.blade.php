<div class="top-nav">

</div>
<div class="header">
    <div class="header2">
        <a class="main-logo" href="{{url('')}}"><img src="{{url('/')}}/template_asset/images/logo/logo.png" alt=""></a>
        <form action="{{url('tim-kiem')}}" class="search" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <input class="txt-search" type="text" name="search" size="70"
                   placeholder="Nhập tên hoặc mã sản phẩm cần tìm kiếm...">
            <button type="submit" class="btn-red ok" name="ok">Tìm kiếm</button>
        </form>

        <ul class="header-right">
            <li><img class="tuvan" src="{{url('/')}}/template_asset/images/site/header/btn-tuvan.png" alt=""></li>
            <li>
                <?php
                $result = count(Cart::content());
                ?>
                <div style="float: right; margin: 0px 45px">
                    <a class="mycart" href="{{url('gio-hang')}}">
                        <img src="{{url('/')}}/images/grocery-cart-icon-7482.png"/>
                        <span>(<?php echo $result; ?>)</span>
                    </a>
                </div>
            </li>
        </ul>
        <?php
        $result = count(Cart::content());
        ?>

    </div>

</div>
<div style="clear: both;"></div>
