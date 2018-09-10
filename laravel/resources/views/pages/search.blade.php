@extends('layout.index')
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
                <?php foreach($products as $p){?>
                <div class="col-lg-3 col-sm-4 col-sm-6 col-xs-12">
                    <div class="product-block text-center">
                        @include('pages.product-block')
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
@endsection
