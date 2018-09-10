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
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class='sub-title'>
                            <div class='sub-title-ul'>
                                @foreach($subcate3 as $sc)
                                    <div class='sub-title-li'><a
                                                href="{{url('danh-sach/'.$cate2->cate_namekd.'/'.$sc->subcate_namekd)}}">{{$sc->subcate_name}}
                                            | </a></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pro">
                @foreach($subcate3 as $sc)
                    @foreach($sc->product as $p)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="product-block text-center">
                            @include('pages.product-block')
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
@endsection
