@extends('layout.index')
@section('content')
    <div class="wrap">
        <div class="main">
            <div class="w-left">
                <div class="img">
                    <section id="demos">
                        <div class="row">
                            <div class="large-12 columns">
                                <div class="owl-carousel owl-theme" id="slider_product">
                                    <?php foreach($images as $image){ ?>
                                    <div class="item">
                                        <img id="zoom_01" src='{{url('/')}}/upload/product/{{$image->name}}'
                                             data-zoom-image='{{url('/')}}/upload/product/{{$image->name}}'
                                             alt='{{$product4->product_namekd}}'>
                                    </div>
                                    <?php } ?>
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        var owl = $('#slider_product');
                                        owl.owlCarousel({
                                            margin: 10,
                                            nav: false,
                                            loop: true,
                                            responsive: {
                                                0: {
                                                    items: 1
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
            <div class="w-right">
                <div class="gt">
                    <div class="pro-detail">
                        <h1>{{$product4->product_name}}</h1>
                        <div class='p-pro'>
                            <span style="color:red">Mã hàng: {{$product4->product_model}}</span>
                            <span>|</span>
                            <?php
                            if ($product4->product_status == 1) {
                                echo "<span class=' ' title='' style='color:#68EE60'>Hàng mới về</span>";
                            } elseif ($product4->product_status == 2) {
                                echo "<span class='tinhtrang' title='' style='color:#68EE60'>Còn hàng</span>";
                            } elseif ($product4->product_status == 3) {
                                echo "<span class='tinhtrang' title=''>Liên hệ</span>";
                            }
                            ?>
                        </div>
                        <?php
                        $phantram = ($product4->product_salevalue) / 100;
                        $tiensale = ($product4->product_price) * $phantram;
                        $price = ($product4->product_price) - $tiensale;
                        ?>

                        <div class="price_deal_detail_2">
                            Giá sản phẩm:
                            <div class="pr-price">
                                <?php
                                if ($price==0) {
                                    echo 'Liên hệ';
                                } else {
                                    echo number_format($price).' đ';
                                }
                                ?>
                            </div>
                            <?php if ($price!=0) { ?>
                            <div class="pr-price2">
                                <span>[Giá đã bao gồm VAT] </span></br>
                                <?php if ($product4->product_salevalue != 0) {?>
                                <span>Giá chính hãng: </span>
                                <span style="text-decoration: line-through"> {{number_format($product4->product_price)}}
                                    đ</span>
                                <?php } ?>
                                <span class="percent_off"
                                <?php if ($product4->product_salevalue == 0) {
                                    echo "style='display:none;'";
                                } ?>>-{{$product4->product_salevalue}}%</span><br>
                                <span style="color:red;<?php if ($product4->product_salevalue == 0) {
                                    echo "display:none;";
                                } ?>">Tiết kiệm: <?php echo number_format($tiensale); ?> đ</span>
                            </div>
                            <?php } ?>
                        </div>
                        <?php if ($price!=0) { ?>
                        <div class="button_buy">
                            <a class="btn-red" href="{{url('gh/'.$product4->id)}}">Mua ngay</a>
                            <a class="btn-blue" onclick="return kiemtra();" href="{{url('cart/'.$product4->id)}}">Cho vào
                                giỏ</a>
                        </div>
                        <?php } ?>
                        <script type="text/javascript">
                            function kiemtra() {
                                if (!window.confirm("Bạn có muốn thêm vào giỏ hàng?")) {
                                    return false;
                                }
                            }
                        </script>
                        <div class="boder-line"></div>
                        <div class="hotline">
                            <h4><i class="fa fa-phone"></i>&nbsp;Liên hệ Mr. Vũ: 0939 66 1010</h4>
                            <h4><i class="fa fa-phone"></i>&nbsp;Liên hệ Ms. Vân: 096 434 9191</h4>
                        </div>
                        <div class="boder-line"></div>
                        <div class='p-spec'>
                            <b>Mô tả chi tiết</b>
                            <?php echo $product4->product_info; ?>
                        </div>
                        <div class="boder-line"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class='pro related-product'>
            <div class='pro-title'>
                <div class='title-name'>
                    <a href="">Sản phẩm liên quan</a>
                </div>
            </div>
            <div class='pros'>
                <div class="related_product">
                    <section id="demos">
                        <div class="row">
                            <div class="large-12 columns">
                                <div class="owl-carousel owl-theme" id="related_product">
                                    <?php foreach($relatedProduct as $p){ $p->ToArray(); ?>
                                    <div class='item pro-li'>
                                        <a class='pro-a' href="{{url('item/'.$p['product_namekd'])}}"
                                           title="{{$p['product_namekd']}}">
                                            <img class='pro-img'
                                                 src='{{url('/')}}/upload/product/{{$p['product_img']}}'>
                                            <img class='sale-value-img' <?php if ($p['product_salevalue'] == 0) {
                                                echo "style='display:none;'";
                                            } ?>src='{{url('/')}}/template_asset/images/site/pro/sale-img.png'>
                                            <span class='sale-value-txt'
                                            <?php if ($p['product_salevalue'] == 0) {
                                                echo "style='display:none;'";
                                            } ?>
                                            >{{$p['product_salevalue']}}%</span>
                                            <?php
                                            $phantram = ($p['product_salevalue']) / 100;
                                            $tiensale = ($p['product_price']) * $phantram;
                                            $price = ($p['product_price']) - $tiensale;
                                            ?>
                                            <span class='pro-name' title=''>{{$p['product_name']}}</span>
                                            <div id="pro-price3">
                                                <?php
                                                if ($price == 0) {
                                                    echo 'Liên hệ';
                                                } else {
                                                    echo number_format($price) . ' đ';
                                                }
                                                ?>
                                            </div>

                                            <span class='pro-price2' <?php if ($p['product_salevalue'] == 0) {
                                                echo "style='display:none;'";
                                            } ?>>
													{{number_format($p['product_price'])}} đ
												</span>

                                            <?php
                                            if ($p['product_status'] == 1) {
                                                echo "<span class='pro-sale-info' title='' style='color:#68EE60'><img src='" . url('/') . "/template_asset/images/site/pro/cart.png'>  Hàng mới về</span>";
                                            } elseif ($p['product_status'] == 2) {
                                                echo "<span class='pro-sale-info' title='' style='color:#68EE60'><img src='" . url('/') . "/template_asset/images/site/pro/cart.png'>  Còn hàng</span>";
                                            } elseif ($p['product_status'] == 3) {
                                                echo "<span class='pro-sale-info' title=''><img src='" . url('/') . "/template_asset/images/site/pro/telephone.png'>  Liên hệ</span>";
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <?php } ?>
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        var owl = $('#related_product');
                                        owl.owlCarousel({
                                            margin: 0,
                                            nav: false,
                                            loop: true,
                                            autoplay: true,
                                            responsive: {
                                                0: {
                                                    items: 5
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
        </div>
    </div>
    <div style="clear: both;"></div>
@endsection
@section('script')
    <script type="text/javascript">
        $("#zoom_01").elevateZoom();
    </script>
@endsection