@extends('layouts.master')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <ul>
                    <li class="home"> <a href="{{url('')}}" title="Trang chủ">Trang chủ</a><span>&raquo; </span></li>
                    @if(count($item->parent))
                        <li class=""> <a href="{{url("danh-muc-san-pham", $item->parent->slug)}}" title="{{$item->parent->title}}">{{$item->parent->title}}</a><span>&raquo; </span></li>
                    @endif
                    <li class="category13"><strong>{{$item->title}}</strong></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End breadcrumbs -->
    <!-- Two columns content -->
    <div class="main-container col2-left-layout">
        <div class="main container">
            <div class="row">
                <section class="col-main col-sm-9 col-sm-push-3">
                    <div class="category-title">
                        <h1>{{$item->title}}</h1>
                    </div>
                    <div class="category-products">
                        <div class="toolbar" style="display: none">
                            <div class="sorter">
                                <div class="view-mode">
                                    <span class="button button-active button-grid" title="Grid">Grid</span>
                                    <a class="button button-list" title="List" href="#">List</a>
                                </div>
                            </div>
                            <div class="pager">
                                <div class="pages">
                                    <label>Trang:</label>
                                    <ul class="pagination">
                                        <li><a href="#">«</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">»</a></li>
                                    </ul>
                                </div>
                                <div id="limiter">
                                    <label>Số lượng: </label>
                                    <ul>
                                        <li><a href="#">15<span class="right-arrow"></span></a>
                                            <ul>
                                                <li><a href="#">20</a></li>
                                                <li><a href="#">30</a></li>
                                                <li><a href="#">35</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul class="products-grid">
                            @if(count($item->getProductRecursive))
                                @foreach($item->getProductRecursive as $product)
                                    <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        @include("includes.product_inline_block")
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </section>
                <aside class="col-right sidebar col-sm-3 col-xs-12 col-sm-pull-9">
                    <div class="side-nav-categories">
                        <div class="block-title"> Danh mục sản phẩm </div>
                        <!--block-title-->
                        <!-- BEGIN BOX-CATEGORY -->
                        <div class="box-content box-category">
                            <ul>
                                @foreach($productCategory as $category01)
                                    <li>
                                        @if(count($category01->children))
                                            <a href="{{url("danh-muc-san-pham", $category01->slug)}}" title="{{$category01->title}}"><span>{{$category01->title}}</span> </a><span class="subDropdown minus"></span>
                                            <ul class="level0_415" style="display:block">
                                                @foreach($category01->children as $category02)
                                                    <li class="level1 first">
                                                        <a href="{{url("danh-muc-san-pham", $category02->slug)}}" title="{{$category01->title}}"><span>{{$category02->title}}</span></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <a href="{{url("danh-muc-san-pham", $category01->slug)}}" title="{{$category01->title}}"><span>{{$category01->title}}</span> </a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--box-content box-category-->
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <!-- End Two columns content -->

@endsection