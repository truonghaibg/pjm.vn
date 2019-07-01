@extends('layouts.master')
@section('content')
    <div class="product-wrap">
        <div class="container product">
            <div class="pro-title">
                <div class="row">
                    <div class="col title-name">
                        <a href="#">{{$nsx3->nsx_name}}</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php foreach($product3 as $item){ ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="product-block text-center">
                        @include('includes.product-block')
                    </div>
                </div>
                <?php } ?>
            </div>
			<div class="row">
				<div class="col-md-12" style="text-align: center">
					{{ $product3->render() }}
				</div>
			</div>
        </div>
    </div>
    <div style="clear: both;"></div>
@endsection
