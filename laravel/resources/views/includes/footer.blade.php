<div style="clear: both;"></div>
<div class="footer-info-wrap">
    <div class="container footer-info">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="footer-block">
                    <h5 class="header-footer">Thông tin PJM</h5>
                    <ul class="list-footer">
                        <li><a href="{{url('bai-viet/tuyen-dung')}}">Giới thiệu</a></li>
                        <li><a href="{{url('tin-tuc')}}">Tin tức</a></li>
                        <li><a href="{{url('bai-viet/tuyen-dung')}}">Tuyển dụng</a></li>
                        <li><a href="{{url('bai-viet/lien-he')}}">Liên hệ, Hợp tác</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="footer-block">
                    <h5 class="header-footer">Chính sách chung</h5>
                    <ul class="list-footer">
                        <li><a href="{{url('bai-viet/quy-dinh-chung')}}">Quy định chung</a>
                        </li>
                        <li><a href="{{url('bai-viet/chinh-sach-chuyen-hang')}}">Chính sách vận
                                chuyển</a></li>
                        <li><a href="{{url('bai-viet/chinh-sach-bao-hanh')}}">Chính sách bảo hành</a>
                        </li>
                        <li><a href="{{url('bai-viet/chinh-sach-doi-tra')}}">Chính sách đổi trả</a></li>
                        <li><a href="{{url('bai-viet/chinh-sach-bao-ve-thong-tin-ca-nhan-cua-nguoi-tieu-dung')}}">Chính sách bảo vệ thông tin cá nhân của người tiêu dùng</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="footer-block">
                    <h5 class="header-footer">Hỗ trợ khách hàng</h5>
                    <ul class="list-footer">
                        <li><a href="{{url('bai-viet/huong-dan-mua-online')}}">Mua
                                hàng trực tuyến</a></li>
                        <li><a href="{{url('bai-viet/huong-dan-thanh-toan')}}">Hướng dẫn thanh toán</a></li>
                        <li><a href="{{url('bai-viet/huong-dan-mua-tra-gop')}}">Hướng
                                dẫn mua hàng trả góp</a></li>
                        <li><a href="{{url('#')}}">Gửi yêu cầu hỗ trợ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="footer-facebook">
                    <div class="fb-page" data-href="https://www.facebook.com/pjmcompany/" data-tabs="timeline" data-width="300" data-height="200" data-small-header="true" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/pjmcompany/" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/pjmcompany/">Công ty cổ phần PJM</a>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <?php echo $siteConfig->footer ?>
    </div>
</div>
<a href="#" id="back-to-top">
    <img src="{{url('images/back-top.png')}}" title="Back to top" alt="Back to top">
</a>

<div class="hotline-phone-ring-wrap">
    <div class="hotline-phone-ring">
        <div class="hotline-phone-ring-circle"></div>
        <div class="hotline-phone-ring-circle-fill"></div>
        <div class="hotline-phone-ring-img-circle">
            <a href="tel:0357375363" class="pps-btn-img">
                <img src="{{url('images/phone-ring.png')}}" alt="Gọi điện thoại" width="50">
            </a>
        </div>
    </div>
    <div class="hotline-bar">
        <a href="tel:{{$siteConfig->mobile}}">
            <span class="text-hotline">0939.66.1010</span>
        </a>
    </div>
</div>

<script>
    var btn = $('#back-to-top');
    $(window).scroll(function() {
        if ($(window).scrollTop() > 200) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });
    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
    });
</script>