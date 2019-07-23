<div class="product-wrap">
	<div class="container">
		<div class="pro-title">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class='title-name'>
						<a href="{{url('/')}}">Sản phẩm bán chạy</a>
					</div>
				</div>
			</div>
		</div>

		<div class="row text-center">
            @foreach($productSale as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 text-center">
                    <div class="product-block text-center">
                        @include('includes.product-block')
                    </div>
                </div>
            @endforeach
		</div>
	</div>
</div>
<div style="clear: both;"></div>