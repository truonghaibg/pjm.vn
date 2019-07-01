@extends('layouts.master')
@section('content')
    <div class="product-wrap">
        <div class="container product">
            <div class="pro-title">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="title-name">
                            <a href="#">{{$item->title}}</a>
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
					<div class="row pro">
						@foreach($products as $item)
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<div class="product-block text-center">
								@include('includes.product-block')
							</div>
						</div>
						@endforeach
					</div>
					<div class="row">
						<div class="col-md-12" style="text-align: center">
							{{ $products->render() }}
						</div>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="pro-title">
								<div class='title-name'>
									<a href="#">Danh mục con</a>
								</div>
							</div>
							<ul style="display: inline-block;width: 100%;">
								@foreach($subCategory as $sub)
									<li class='sub-title-li full-width' style="text-align: left; padding-left:10px ">
										<a href="{{url('danh-sach')}}/{{$item->slug}}/{{$sub->slug}}">{{$sub->title}}</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="product-wrap">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="pro-title">
										<div class='title-name'>
											<a href="{{url('/')}}">Sản phẩm đề xuất</a>
										</div>
									</div>
								</div>
							</div>

							<div class="row text-center">
								<?php
								foreach($productSuggests as $item){
								?>
								<div class="col-lg-12 col-md-12  text-center">
									<div class="product-block text-center">
										@include('includes.product-block')
									</div>
								</div>
								<?php
								}
								?>
							</div>
					</div>
					<div style="clear: both;"></div>
				</div>
			</div>
        </div>
    </div>
    <div style="clear: both;"></div>
@endsection
