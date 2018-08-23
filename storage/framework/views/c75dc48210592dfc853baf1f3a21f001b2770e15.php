
<div class="f1">
<div style="width: 100%;text-align: center; background: #e0e0e0; height: 100px;">
    <div class="top_partners" style="width:1200px;text-align: center;">
        <section id="aaa">
            <div class="row">
                <div class="large-12 columns">
                    <div class="owl-carousel owl-theme" id="partners">
                        <?php foreach($headerData as $item){ ?>
                        <div class="item">
                            <a href="<?php echo e($item->link); ?>" target="_blank">
                                <img src='upload/partners/<?php echo e($item->logo); ?>' alt='<?php echo e($item->name); ?>' />
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
  <div class="footer">
    <div class="ttc">
      <h4 class="f-h4">Thông tin chung</h4>
      <ul class="f-ul">
        <li class="f-li"><a class="f-a" target="_blank" href="<?php echo e(url('tin-tuc/tuyen-dung')); ?>">Tuyển dụng</a></li>
        <li class="f-li"><a class="f-a" target="_blank" href="<?php echo e(url('tin-tuc')); ?>">Tin tức</a></li>
        <li class="f-li"><a class="f-a" target="_blank" href="<?php echo e(url('tin-tuc')); ?>">Ý kiến khách hàng*</a></li>
        <li class="f-li"><a class="f-a" target="_blank" href="<?php echo e(url('tin-tuc')); ?>">Liên hệ, Hợp tác*</a></li>
      </ul>
    </div>
    <div class="htkh">
      <h4 class="f-h4">Chính sách chung</h4>
      <ul class="f-ul">
        <li class="f-li"><a class="f-a" href="<?php echo e(url('tin-tuc/quy-dinh-chung')); ?>">Chính sách, quy định chung</a></li>
        <li class="f-li"><a class="f-a" href="<?php echo e(url('tin-tuc/chinh-sach-van-chuyen-hang')); ?>">Chính sách vận chuyển</a></li>
        <li class="f-li"><a class="f-a" href="<?php echo e(url('tin-tuc/chinh-sach-bao-hanh')); ?>">Chính sách bảo hành</a></li>
        <li class="f-li"><a class="f-a" href="<?php echo e(url('tin-tuc/quy-dinh-ve-doi-tra-lai-hang')); ?>">Chính sách đổi, trả lại hàng</a></li>
        <li class="f-li"><a class="f-a" href="<?php echo e(url('tin-tuc')); ?>">Chính sách cho doanh nghiệp*</a></li>
      </ul>
    </div>
    <div class="gtct">
      <h4 class="f-h4">Thông tin khuyến mãi</h4>
      <ul class="f-ul">
        <li class="f-li"><a class="f-a" href="<?php echo e(url('tin-tuc')); ?>">Sản phẩm bán chạy*</a></li>
        <li class="f-li"><a class="f-a" href="<?php echo e(url('tin-tuc*')); ?>">Sản phẩm khuyến mãi</a></li>
        <li class="f-li"><a class="f-a" target="_blank" href="<?php echo e(url('/admin')); ?>">Đăng nhập</a></li>
      </ul>
    </div>
    <div class="td">
      <h4 class="f-h4">Hỗ trợ khách hàng</h3>
      <ul class="f-ul">
        <li class="f-li"><a class="f-a" target="_blank" href="<?php echo e(url('tin-tuc/huong-dan-mua-online')); ?>">Mua hàng trực tuyến</a></li>
        <li class="f-li"><a class="f-a" target="_blank" href="<?php echo e(url('')); ?>">Hướng dẫn thanh toán*</a></li>
        <li class="f-li"><a class="f-a" target="_blank" href="<?php echo e(url('tin-tuc/huong-dan-mua-tra-gop')); ?>">Hướng dẫn mua hàng trả góp</a></li>
        <li class="f-li"><a class="f-a" target="_blank" href="<?php echo e(url('')); ?>">Gửi yêu cầu hỗ trợ*</a></li>
      </ul>
    </div>
    <div class="htkh">
      <h4 class="f-h4">Thanh toán an toàn</h4>
      <a href="<?php echo e(url('')); ?>"><img src="template_asset/images/site/footer/sprite.png" alt=""></a>
      <a href="<?php echo e(url('')); ?>"><img src="template_asset/images/site/footer/ieb.png" alt=""></a>
      <a href="<?php echo e(url('')); ?>"><img src="template_asset/images/site/footer/ck.png" alt=""></a>
      <a href="<?php echo e(url('')); ?>"><img src="template_asset/images/site/footer/paypal-checkout.png" alt=""></a>
    </div>
  </div>
</div>

<div style="clear: both;"></div>
<div class="if">
  <span>CÔNG TY CỔ PHẦN PJM</span><br>
  <span>Email: giapvu.pjm@gmail.com. Điện thoại: 0939.66.10.10</span><br>
  <img src="template_asset/images/site/fend/dathongbao.png" alt="">
  <img src="template_asset/images/site/fend/dadangky.png" alt="">
</div>

<script type='text/javascript'>
    window._sbzq||function(e){e._sbzq=[];
    var t=e._sbzq;t.push(["_setAccount",64843]);
    var n=e.location.protocol=="https:"?"https:":"http:";
    var r=document.createElement("script");
    r.type="text/javascript";r.async=true;
    r.src=n+"//static.subiz.com/public/js/loader.js";
    var i=document.getElementsByTagName("script")[0];
    i.parentNode.insertBefore(r,i)}(window);
</script>
<a href="<?php echo e(url('')); ?>" class="back-to-top" style="display: none;">
  <img src="template_asset/images/site/scroll-to-up/scrollbutton4-white.png" alt="">
</a>