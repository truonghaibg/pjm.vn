@extends('layout.index')
@section('content')
<div class="wrap">
	<div class="main">
		<div class="w-left">
			<div class="img">
					<img id="zoom_01" src='upload/product/{{$product4->product_img}}' data-zoom-image='upload/product/{{$product4->product_img}}' alt='{{$product4->product_namekd}}'>
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
									# code...
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/0x42.png')}}" alt=""></span><?php
									break;
								case '1':
									# code...
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/1x42.png')}}" alt=""></span><?php
									break;

								case '2':
									# code...
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/2x42.png')}}" alt=""></span><?php
									break;

								case '3':
									# code...
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/3x42.png')}}" alt=""></span><?php
									break;

								case '4':
									# code...
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/4x42.png')}}" alt=""></span><?php
									break;

								case '5':
									# code...
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/5x42.png')}}" alt=""></span><?php
									break;

								case '6':
									# code...
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/6x42.png')}}" alt=""></span><?php
									break;

								case '7':
									# code...
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/7x42.png')}}" alt=""></span><?php
									break;

								case '8':
									# code...
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/8x42.png')}}" alt=""></span><?php
									break;
								case '9':
									# code...
									?><span><img class="pro-price3" src="{{url('template_asset/images/site/pro/9x42.png')}}" alt=""></span><?php
									break;


								default:
									# code...
									break;
							}
						 ?>
					@empty
					@endforelse
					</div>
					<div class="pr-price2">
						<span>[Giá đã bao gồm VAT] </span></br>
						<span>Giá chính hãng: </span><span style="text-decoration: line-through"> {{number_format($product4->product_price,0,",",".")}} đ</span>
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
				    // body...
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
								}
								if ($product4->product_status == 2) {
									echo "<span class='tinhtrang' title='' style='color:#68EE60'>Còn hàng</span>";
								}
								if ($product4->product_status == 3) {
									echo "<span class='tinhtrang' title=''>Liên hệ</span>";
								}
							 ?>
						</div>
						<div class="cell">
								<table>
									<tbody>
										<tr>
											<td>
												<b>Đánh giá:</b>
												<img src="template_asset/images/site/pro/star_0.png" alt="">
											</td>
										</tr>
										<tr>
											<td>
												<b>Kho hàng: </b>
												<span>Đang còn hàng tại: </span>
												<br>
												<span style="margin-left: 62px; color: red; font-size: 15px">
                            * Tổ 10, Sông Công, Thái Nguyên <br>
                          </span>
											</td>
										</tr>
										<tr>
											<td>
												<b>Tình trạng:</b>
												<b>
													<?php
														if ($product4->product_status == 1) {
															 echo "Hàng mới về";
														}
														if ($product4->product_status == 2) {
															echo "Còn hàng";
														}
														if ($product4->product_status == 3) {
															echo "Liên hệ";
														}
													 ?>
												</b>
												<br>
											</td>
										</tr>
										<tr>
											<td>
												<b>Bảo hành:</b>
												<span>12 tháng</span>
												<br>
											</td>
										</tr>
										<tr>
											<td>
												<b>Giao hàng:</b>
												<br>
												<span style="margin-left: 62px; font-size: 15px">
                            - Miễn phí giao hàng (Bán kính 20 km) cho đơn hàng từ 500.000 đ trở lên <a href="{{url('')}}" style="color: red" target="_blank">(Chi tiết)</a>
                        </span>
												<br>
												<span style="margin-left: 62px; font-size: 15px">
                             - Miễn phí giao hàng 300 km đối với khách hàng Games Net, Doanh Nghiệp, Dự Án
                        </span>
												<br>
												<span style="margin-left: 62px; font-size: 15px">
                             - Nhận giao hàng và lắp đặt từ 8h00 - 20h30 các ngày kể cả ngày lễ, thứ 7, CN
                        </span>
											</td>
										</tr>
									</tbody>
								</table>
						</div>
						<div class="boder-line"></div>
						<div class='p-spec'>
							<b>Mô tả chi tiết</b>
							<?php echo $product4->product_info; ?>
						</div>
					<div class="boder-line"></div>
					<ul class="p-program">
						<li>
							<a href="{{url('tin-tuc/quy-dinh-ve-doi-tra-lai-hang')}}" target="_blank" title="">
								<div class="img-pr">
									<img src="template_asset/images/site/wrap/program-1.png" alt="">
								</div>
								<div class="sp-pr">
									<span>Đổi mới trong 30 ngày nếu sản phẩm lỗi do nhà sản xuất, cửa hàng.</span>
								</div>
							</a>
						</li>
						<li>
							<a href="{{url('tin-tuc/chinh-sach-van-chuyen-hang')}}" target="_blank" title="">
								<div class="img-pr">
									<img src="template_asset/images/site/wrap/program-3.png" alt="">
								</div>
								<div class="sp-pr">
									<span>Miễn phí vận chuyển cho khách hàng doanh nghiệp, dịch vụ net trong bán kính 200km từ công ty.</span>
								</div>
							</a>
						</li>
						<li>
							<a href="{{url('tin-tuc/huong-dan-mua-tra-gop')}}" target="_blank" title="">
								<div class="img-pr">
									<img src="template_asset/images/site/wrap/program-6.png" alt="">
								</div>
								<div class="sp-pr">
									<span>Hộ trợ trả góp với lãi xuất cực thấp, thủ tục đơn giản nhanh chóng.</span>
								</div>
							</a>
						</li>
						<li>
							<a href="{{url('tin-tuc/khuyen-mai')}}" target="_blank" title="">
								<div class="img-pr">
									<img src="template_asset/images/site/wrap/program-7.png" alt="">
								</div>
								<div class="sp-pr">
									<span>Hàng tuần có tổ chức Gameshow trúng thẻ cào, và hàng nghìn phần quà khác đang chờ đón bạn</span>
								</div>
							</a>
						</li>

					</ul>
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