@extends('layout.index')
@section('content')
<div class="wrap">
	<div class="main">
		<div class="w-left">
			<div class="img">
					<section id="demos">
					  <div class="row">
						<div class="large-12 columns">
							<div class="owl-carousel owl-theme">
								<?php foreach($images as $image){ ?>
								<div class="item">
								  <img id="zoom_01" src='upload/product/{{$image->name}}' data-zoom-image='upload/product/{{$image->name}}' alt='{{$product4->product_namekd}}'>
								</div>
								<?php } ?>
							</div>
							<script>
								$(document).ready(function() {
									var owl = $('.owl-carousel');
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
			<div class="name">
					<span>{{$product4->product_name}}</span>
			</div>
				<?php
				$phantram = ($product4->product_salevalue)/100;
				$tiensale = ($product4->product_price)*$phantram;
				$price=($product4->product_price)-$tiensale ?>

				<div class="price_deal_detail_2">
					<div class="pr-price">
					@forelse(str_split(number_format($price,0)) as $p1)
						<?php
							switch ($p1) {
								case ',':
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/x42.png')}}" alt=""></span><?php
									break;

								case '0':
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/0x42.png')}}" alt=""></span><?php
									break;

								case '1':
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/1x42.png')}}" alt=""></span><?php
									break;

								case '2':
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/2x42.png')}}" alt=""></span><?php
									break;

								case '3':
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/3x42.png')}}" alt=""></span><?php
									break;

								case '4':
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/4x42.png')}}" alt=""></span><?php
									break;

								case '5':
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/5x42.png')}}" alt=""></span><?php
									break;

								case '6':
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/6x42.png')}}" alt=""></span><?php
									break;

								case '7':
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/7x42.png')}}" alt=""></span><?php
									break;

								case '8':
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/8x42.png')}}" alt=""></span><?php
									break;

								case '9':
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/9x42.png')}}" alt=""></span><?php
									break;

								default:
									break;
							}
						 ?>
					@empty
					@endforelse
					</div>
					<div class="pr-price2">
						<span>[Giá đã bao gồm VAT] </span></br>
						<span>Giá chính hãng: </span>
						<span style="text-decoration: line-through"> {{number_format($product4->product_price,0,",",".")}} đ</span>
						<span class="percent_off"
						<?php if ($product4->product_salevalue==0) {
							echo "style='display:none;'";
						} ?>>-{{$product4->product_salevalue}}%</span><br>
						<span style="color:red;<?php if ($product4->product_salevalue==0) {
							echo "display:none;";
						} ?>" >Tiết kiệm: <?php echo number_format($tiensale); ?> đ</span>
					</div>
				</div>
				<div class="button_buy">
					<a class="btn-red" href="{{url('gh/'.$product4->id)}}">Mua ngay</a>
					<a class="btn-blue" onclick="return kiemtra();" href="{{url('cart/'.$product4->id)}}">Cho vào giỏ</a>
				</div>
				<script type="text/javascript">
				function kiemtra () {
				    if (!window.confirm("Bạn có muốn thêm vào giỏ hàng?")) {
				        return false;
				    };
				}
				</script>
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
									 echo "<span class='tinhtrang' title='' style='color:#68EE60'>Hàng mới về</span>";
								} elseif ($product4->product_status == 2) {
									echo "<span class='tinhtrang' title='' style='color:#68EE60'>Còn hàng</span>";
								} elseif ($product4->product_status == 3) {
									echo "<span class='tinhtrang' title=''>Liên hệ</span>";
								}
							 ?>
						</div>
						<div class="boder-line"></div>
						<div class='p-spec'>
							<b>Mô tả chi tiết</b>
							<?php echo $product4->product_info; ?>
						</div>
					<div class="boder-line"></div>
				</div>
				<div class="pro-price"></div>
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