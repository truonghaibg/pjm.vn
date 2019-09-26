@extends('layouts.master')
@section('head')
	<title> {{$product->title}} | {{$siteConfig->title}}</title>
	<meta property="og:title" content="{{$product->title}}"/>
	@if(!isset($product->image))
		<meta property="og:image" content="{{url($product->image)}}"/>
	@endif
	<meta name="description" content="{{$product->meta_description}}">
	<meta property="og:description" content="{{$product->meta_description}}">
	<meta name="keywords" content="{{$product->meta_keywords }}"/>
@endsection
@section('content')
    <div class="product-detail-wrap">
        <div class="container">
            <div class="row">
				<div class="col-lg-12 col-md-12">
				<br/>
					<br/>
				@if(count($errors)>0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
							{{$err}}<br>
						@endforeach
					</div>
				@endif
				@if(session('thongbao'))
					<div class="alert alert-success">
						{{session('thongbao')}}
					</div>
				@endif
				</div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <?php if(!is_null($product->image)){ ?>
					<div class="item">
						<img src='{{url($product->image)}}'
							 alt='{{$product->title}}'>
					</div>
                    <?php } ?>
				</div>
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
					<div class="pro-detail">
						<h1>{{$product->title}}</h1>
						<div class='p-pro'>
							<span style="color:red">Mã hàng: {{$product->product_model}}</span>
							<span>|</span>
							<?php
							if ($product->status == 1) {
								echo "<span class=' ' title='' style='color:#68EE60'>Hàng mới về</span>";
							} elseif ($product->status == 2) {
								echo "<span class='tinhtrang' title='' style='color:#68EE60'>Còn hàng</span>";
							} elseif ($product->status == 3) {
								echo "<span class='tinhtrang' title=''>Liên hệ</span>";
							}
							?>
							<span>|</span>
							<div class="fb-share-button"  data-href="{{url('san-pham', $product->slug)}}" data-layout="button_count"> </div>
						</div>
						<?php
						$phantram = ($product->product_salevalue) / 100;
						$tiensale = ($product->price) * $phantram;
						$price = ($product->price) - $tiensale;
						?>
						
						<div class="price_deal_detail_2">
							Giá sản phẩm:
							<?php if ($price==0) { ?>
								<div class="pr-price">
									Liên hệ
								</div>
							<?php } else { ?>
								<div class="pr-price">
									{{ number_format($price).' đ' }}
								</div>
							<?php } ?>
							<?php if ($price!=0) { ?>
							<div class="pr-price2">
								<span>[Giá đã bao gồm VAT] </span></br>
								<?php if ($product->product_salevalue != 0) {?>
								<span>Giá chính hãng: </span>
								<span style="text-decoration: line-through"> {{number_format($product->price)}}
									đ</span>
								<?php } ?>
								<span class="percent_off"
								<?php if ($product->product_salevalue == 0) {
									echo "style='display:none;'";
								} ?>>-{{$product->product_salevalue}}%</span><br>
								<span style="color:red;<?php if ($product->product_salevalue == 0) {
									echo "display:none;";
								} ?>">Tiết kiệm: <?php echo number_format($tiensale); ?> đ</span>
							</div>
							<?php } ?>
						</div>button
                    <?php if ($price!=0) { ?>
						<div class="button_buy">
							<a class="btn-red" href="#">Mua ngay</a>
							<a class="btn-blue" onclick="return kiemtra();" href="#">Cho vào
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
							<h5><i class="fa fa-phone"></i>&nbsp;Hotline Mr. Vũ: <a href="tel:0939661010">0939.66.10.10</a></h5>
							<h5><i class="fa fa-phone"></i>&nbsp;Hotline Ms. Vân: <a href="tel:0983786622">0983.78.66.22</a></h5>
						</div>
						<div class="boder-line"></div>
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
							<li>
								<a href="#contact" data-toggle="tab">Liên hệ báo giá</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="moreinfo">
								<div class="tab-description">
									<b>Mô tả chi tiết</b>
									<?php echo $product->desc_long; ?>
									<div class="desc" id="desc_id">
                                        <?php if(!is_null($product->image)){ ?>
											<img src="{{url($product->image)}}" alt="{{$product->title}}">
                                        <?php } ?>
                                        <?php if(!is_null($product->image01)){ ?>
											<img src="{{url($product->image01)}}" alt="{{$product->title}}">
                                        <?php } ?>
                                        <?php if(!is_null($product->image02)){ ?>
											<img src="{{url($product->image02)}}" alt="{{$product->title}}">
                                        <?php } ?>
                                        <?php if(!is_null($product->image03)){ ?>
											<img src="{{url($product->image03)}}" alt="{{$product->title}}">
                                        <?php } ?>
                                        <?php if(!is_null($product->image04)){ ?>
											<img src="{{url($product->image04)}}" alt="{{$product->title}}">
                                        <?php } ?>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="datasheet">
								<div class="agile-news-comments">
									<div class="agile-news-comments-info">
										<h4>Bình luận</h4>
										<div class="fb-comments" data-href="{{url("san-pham", $product->slug)}}" data-width="100%" data-numposts="5"></div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="contact">
								<div class="product-contact" style="width:100%">
									<style>
										.price_deal_detail_2 {
											width: 100% !important;
										}
									</style>
									<div class="card-body" >
										<form action="{{url('/')}}/lien-he-san-pham/{{$product->slug}}" method="POST">
											<input type="hidden" name="_token" value="{{csrf_token()}}" />
											<input type="hidden" name="id" value="{{$product->id}}" />
											<div class="form-group">
												<label>Số lượng:</label>
												<div>
													<input class="form-control" name="number" value="1" type="text">
												</div>
											</div>
											<div class="form-group">
												<label>Email:</label>
												<div>
													<input class="form-control" name="email" value="" type="text">
												</div>
											</div>
											<div class="form-group">
												<label>Số điện thoại:</label>
												<div>
													<input class="form-control" name="phone" value="" type="text">
												</div>
											</div>
											<div>
												<div class="form-group">
													<label>Nội dung<sup>*</sup>:</label>
													<div >
														<textarea rows="6" class="form-control" name="content" placeholder="Nội dung liên hệ..."></textarea>
														<small class="col-gray">Vui lòng nhập chi tiết sản phẩm như màu sắc, kích thước, vật liệu... và các yêu cầu cụ thể khác để nhận báo giá chính xác.</small>
													</div>
												</div>
											</div>
											<div class="text-right mt-3">
												<button type="submit" class="btn btn-success" style="">
													Gửi yêu cầu ngay
												</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
            @include('pages.product-suggest')
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