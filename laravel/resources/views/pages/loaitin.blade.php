@extends('layout.index')
@section('content')
    <div class="product-wrap">
        <div class="container">
            <div class="pro-title">
                <div class="row ">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="title-name">
                            <a href="">{{$subcate2->subcate_name}}</a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 sub-title">
                        <div class='sub-title-ul'>
                            @foreach($subcate2->nsx as $n)
                                <div class='sub-title-li'>
                                    <a href="{{url('danh-sach/'.$cate1->cate_namekd.'/'.$subcate2->subcate_namekd.'/'.$n->nsx_namekd)}}">{{$n->nsx_name}}
                                        | </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($product2 as $p){ ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
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
