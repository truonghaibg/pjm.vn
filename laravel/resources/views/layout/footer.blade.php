<div class="partner-wrap d-none d-md-block">
    <div class="container partners">
        <div class="row">
                <?php foreach($headerData as $item){ ?>
                <div class="col-md-2 col-xs-4 text-center border rounded">
                    <a href="{{$item->link}}" target="_blank">
                        <img height="100px" src='{{url('/')}}/upload/partners/{{$item->logo}}'
                             alt='{{$item->name}}'/>
                    </a>
                </div>
                <?php } ?>
            </div>
    </div>
</div>
<div style="clear: both;"></div>
<div class="footer-info-wrap">
    <div class="container footer-info">
        <div class="row">
            <div class="col-md">
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
            <div class="col-md">
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
                    </ul>
                </div>
            </div>
            <div class="col-md">
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
            <div class="col-md">
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
        <div class="row no-gutters">
            <div class="col">
                <h4>CÔNG TY CỔ PHẦN PJM</h4>
                <span>Trụ sở: Số nhà 20/109/559 Phố Kim Ngưu, Phường Vĩnh Tuy, Quận Hai Bà Trưng, Thành Phố Hà Nội.</span><br>
                <span>VPGD: P1603, Tầng 16CT2, Tòa nhà CT14 Bắc Hà, Đường Tố Hữu, Phường Trung Văn, Quận Từ Liêm, TP Hà Nội</span><br>
                <span>Website: http://pjm.vn --- Email: giapvu@pjm.vn --- Điện thoại: 0939.66.10.10</span><br>
            </div>
        </div>
    </div>
</div>

<a href="{{url('')}}" class="back-to-top" style="display: none;">
    <img src="{{url('')}}/template_asset/images/site/scroll-to-up/scrollbutton3.png" title="Back to top" alt="Back to top">
</a>