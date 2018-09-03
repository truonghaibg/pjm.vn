<div class="partners">
    <div style="width: 100%;text-align: center; background: #e0e0e0; height: 100px;">
        <div class="top_partners" style="width:1200px;text-align: center;">
            <section id="aaa">
                <div class="row">
                    <div class="large-12 columns">
                        <div class="owl-carousel owl-theme" id="partners">
                            <?php foreach($headerData as $item){ ?>
                            <div class="item">
                                <a href="{{$item->link}}" target="_blank">
                                    <img height="100px" width="100px" src='{{url('/')}}/upload/partners/{{$item->logo}}'
                                         alt='{{$item->name}}'/>
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
                                            items: 12
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
</div>
<div style="clear: both;"></div>
<div class="footer-wrap">
    <div style="clear: both;"></div>
    <div class="footer-menu">
        <div class="footer-block">
            <h4 class="header-footer">Thông tin chung</h4>
            <ul class="list-footer">
                <li><a href="{{url('tin-tuc/tuyen-dung')}}">Tuyển dụng</a></li>
                <li><a href="{{url('tin-tuc')}}">Tin tức</a></li>
                <li><a href="{{url('tin-tuc')}}">Ý kiến khách hàng*</a></li>
                <li><a href="{{url('tin-tuc')}}">Liên hệ, Hợp tác*</a></li>
            </ul>
        </div>
        <div class="footer-block">
            <h4 class="header-footer">Chính sách chung</h4>
            <ul class="list-footer">
                <li><a href="{{url('tin-tuc/quy-dinh-chung')}}">Chính sách, quy định chung</a>
                </li>
                <li><a href="{{url('tin-tuc/chinh-sach-van-chuyen-hang')}}">Chính sách vận
                        chuyển</a></li>
                <li><a href="{{url('tin-tuc/chinh-sach-bao-hanh')}}">Chính sách bảo hành</a>
                </li>
                <li><a href="{{url('tin-tuc/quy-dinh-ve-doi-tra-lai-hang')}}">Chính sách đổi,
                        trả lại hàng</a></li>
                <li><a href="{{url('tin-tuc')}}">Chính sách cho doanh nghiệp*</a></li>
            </ul>
        </div>
        <div class="footer-block">
            <h4 class="header-footer">Thông tin khuyến mãi</h4>
            <ul class="list-footer">
                <li><a href="{{url('tin-tuc')}}">Sản phẩm bán chạy*</a></li>
                <li><a href="{{url('tin-tuc*')}}">Sản phẩm khuyến mãi</a></li>
                <li><a href="{{url('/admin')}}">Đăng nhập</a></li>
            </ul>
        </div>
        <div class="footer-block">
            <h4 class="header-footer">Hỗ trợ khách hàng</h4>
            <ul class="list-footer">
                <li><a href="{{url('tin-tuc/huong-dan-mua-online')}}">Mua
                        hàng trực tuyến</a></li>
                <li><a href="{{url('')}}">Hướng dẫn thanh toán*</a></li>
                <li><a href="{{url('tin-tuc/huong-dan-mua-tra-gop')}}">Hướng
                        dẫn mua hàng trả góp</a></li>
                <li><a href="{{url('')}}">Gửi yêu cầu hỗ trợ*</a></li>
            </ul>
        </div>
    </div>
</div>

<div style="clear: both;"></div>
<div class="footer-info-wrap">
    <div class="footer-info">
        <h2>CÔNG TY CỔ PHẦN PJM</h2>
        <span>Trụ sở: Số nhà 20/109/559 Phố Kim Ngưu, Phường Vĩnh Tuy, Quận Hai Bà Trưng, Thành Phố Hà Nội.</span><br>
        <span>VPGD: P1603, Tầng 16CT2, Tòa nhà CT14 Bắc Hà, Đường Tố Hữu, Phường Trung Văn, Quận Từ Liêm, TP Hà Nội</span><br>
        <span>Website: http://pjm.vn --- Email: giapvu@pjm.vn --- Điện thoại: 0939.66.10.10</span><br>
        {{--<img src="{{url('/')}}/template_asset/images/site/fend/dathongbao.png" alt="">--}}
        {{--<img src="{{url('/')}}/template_asset/images/site/fend/dadangky.png" alt="">--}}
    </div>
</div>


{{--<script type='text/javascript'>
    window._sbzq || function (e) {
        e._sbzq = [];
        var t = e._sbzq;
        t.push(["_setAccount", 64843]);
        var n = e.location.protocol == "https:" ? "https:" : "http:";
        var r = document.createElement("script");
        r.type = "text/javascript";
        r.async = true;
        r.src = n + "//static.subiz.com/public/js/loader.js";
        var i = document.getElementsByTagName("script")[0];
        i.parentNode.insertBefore(r, i)
    }(window);
</script>--}}
<a href="{{url('')}}" class="back-to-top" style="display: none;">
    <img src="{{url('')}}/template_asset/images/site/scroll-to-up/scrollbutton4-white.png" alt="">
</a>