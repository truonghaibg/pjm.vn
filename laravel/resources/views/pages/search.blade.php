@extends('layouts.master')
@section('content')
    <div class="product-wrap">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class='pro-title'>
                        <div class='title-name'>
                            <a href="{{url('')}}">Tìm kiếm từ khóa: {{$key_search}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pro">
                <?php foreach($products as $item){?>
                <div class="col-lg-3 col-sm-4 col-sm-6 col-xs-12">
                    <div class="product-block text-center">
                        @include('includes.product-block')
                    </div>
                </div>
                <?php } ?>
            </div>
			<div class="row">
				<div class="col-md-12" style="text-align: center">
					<div class="relink-pager" style="text-align: center;display: inline-block;">
						{{ $products->render() }}
					</div>
				</div>
			</div>
			<script>
				<?php 
					if(isset($key_search) && $key_search != ""){ ?>
						jQuery(document).ready(function() {
							jQuery("#key-search").val("<?php echo $key_search ?>");
						})
					
					
				<?php } ?>
			</script>
        </div>
    </div>
    <div style="clear: both;"></div>
@endsection
