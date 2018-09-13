@extends('layout.index')
@section('content')
    <div class="product-detail-wrap">
        <div class="container">
            <div class="row">
				<div class="col-lg-12 col-md-12">
					<br/>
					<br/>
				</div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
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
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
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
							<h4><i class="fa fa-phone"></i>&nbsp;Hotline Mr. Vũ: 0939 66 1010</h4>
							<h4><i class="fa fa-phone"></i>&nbsp;Hotline Ms. Vân: 096 434 9191</h4>
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
            <div class="row">
                <div class="col-lg-12">
				
					<div class="product-more-info-tab">
						<ul class="nav nav-tabs more-info-tab">
							<li class="active">
								<a href="#moreinfo" data-toggle="tab">Thông tin</a>
							</li>
							<li>
								<a href="#datasheet" data-toggle="tab">Bình luận</a>
							</li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane active" id="moreinfo">
								<div class="tab-description">
									<?php echo htmlspecialchars_decode(stripslashes($product4->product_info)); ?>
								</div>
							</div>

							<div class="tab-pane" id="datasheet">
								<div class="agile-news-comments">
									<div class="agile-news-comments-info">
										<h4>Bình luận</h4>
										<div class="fb-comments" data-href="{{url("/")}}/san-pham/{{$product4->product_namekd}}" data-width="100%" data-numposts="5"></div>
									</div>
								</div>
							</div>


						</div>
					</div>
				
				
				
				
				
				
				
                    
                </div>
            </div>
           
            @include('pages.product-related')
        </div>
    </div>
    <div style="clear: both;"></div>
@endsection
@section('script')
    <script type="text/javascript">
        $("#zoom_01").elevateZoom();
    </script>
@endsection