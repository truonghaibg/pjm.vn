@extends('layout.index')
@section('content')
    <div class="product-wrap">
        <div class="container product">
            <div class="pro-title">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="title-name">
                            <a href="#">{{$cate2->cate_name}}</a>
                        </div>
                    </div>
                   
                </div>
            </div>
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
					<div class="row pro">
						@foreach($products as $p)
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<div class="product-block text-center">
								@include('pages.product-block')
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
					<ul>
						@foreach($subCategory as $sub)
						<li class='sub-title-li full-width'>
							<a href="{{url('/')}}/danh-sach/{{$cate2->cate_namekd}}/{{$sub->subcate_namekd}}">{{$sub->subcate_name}}</a>
						</li>
						@endforeach
					<ul>
				</div>
			</div>
            
        </div>
    </div>
    <div style="clear: both;"></div>
@endsection
