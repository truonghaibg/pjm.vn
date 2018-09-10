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
                    <h5 class="header-footer">Thông tin chung</h5>
                    <ul class="list-footer">
                        <li><a href="{{url('tin-tuc/tuyen-dung')}}">Tuyển dụng</a></li>
                        <li><a href="{{url('tin-tuc')}}">Tin tức</a></li>
                        <li><a href="{{url('tin-tuc')}}">Ý kiến khách hàng</a></li>
                        <li><a href="{{url('tin-tuc')}}">Liên hệ, Hợp tác*</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="footer-block">
                    <h5 class="header-footer">Chính sách chung</h5>
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
            </div>
            <div class="col-md">
                <div class="footer-block">
                    <h5 class="header-footer">Thông tin khuyến mãi</h5>
                    <ul class="list-footer">
                        <li><a href="{{url('tin-tuc')}}">Sản phẩm bán chạy</a></li>
                        <li><a href="{{url('tin-tuc')}}">Sản phẩm khuyến mãi</a></li>
                        <li><a href="{{url('/admin')}}">Đăng nhập</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="footer-block">
                    <h5 class="header-footer">Hỗ trợ khách hàng</h5>
                    <ul class="list-footer">
                        <li><a href="{{url('tin-tuc/huong-dan-mua-online')}}">Mua
                                hàng trực tuyến</a></li>
                        <li><a href="{{url('')}}">Hướng dẫn thanh toán</a></li>
                        <li><a href="{{url('tin-tuc/huong-dan-mua-tra-gop')}}">Hướng
                                dẫn mua hàng trả góp</a></li>
                        <li><a href="{{url('')}}">Gửi yêu cầu hỗ trợ</a></li>
                    </ul>
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
    <img src="{{url('')}}/template_asset/images/site/scroll-to-up/scrollbutton4-white.png" title="Back to top" alt="Back to top">
</a>