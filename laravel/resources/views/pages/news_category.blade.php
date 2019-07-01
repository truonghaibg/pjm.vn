@extends('layouts.master')
@section('head')
    <link rel="stylesheet" href="{{url('css/blogmate.css')}}" type="text/css">
    <title> {{$category->title}} | {{$siteConfig->title}}</title>
    <meta property="og:title" content="{{$category->title}}"/>
    <meta property="og:image" content="{{url($category->image)}}"/>
    <meta name="description" content="{{$category->meta_description}}">
    <meta property="og:description" content="{{$category->meta_description}}">
    <meta name="keywords" content="{{$category->meta_keywords }}"/>
    <meta name="description" content="">
    <meta name="author" content="">
@endsection
@section('content')
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <div class="col-main col-sm-9 wow bounceInUp animated">
                    <div class="page-title">
                        <h2>Tin tức - {{$category->title}}</h2>
                    </div>
                    <hr>
                    <div class="blog-wrapper" id="main">
                        <div class="site-content" id="primary">
                            <div role="main" id="content">
                                <div class="aa-blog-content">
                                    @if(count($newsInCategory) > 0)
                                        @foreach($newsInCategory as $item)
                                            <div class="content_detail">
                                                <div class="row border-bottom" style="padding: 15px;">
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                        <div class="text-center">
                                                            <a href="{{url('tin-tuc', $item->slug)}}"
                                                               alt="{{$item->title}}">
                                                                <img src="{{url($item->image)}}"
                                                                     alt="{{$item->title}}"
                                                                     class="img-responsive mx-auto d-block">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="post-header">
                                                            <h3>
                                                                <a class="post-item-link"
                                                                   href="{{url('tin-tuc', $item->slug)}}">
                                                                    {{$item->title}}</a>
                                                            </h3>
                                                        </div>
                                                        <div class="post-content d-none d-md-block">
                                                            {{$item->description }}
                                                        </div>
                                                        <br>
                                                        <p class="post-meta"><i class="icon-calendar"></i>
                                                            {{$item->created_at}}</p>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <p style="text-align: center">Chưa có bài viết</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-right sidebar col-sm-3 wow bounceInUp animated">
                    <div role="complementary" class="widget_wrapper13" id="secondary">
                        <div class="popular-posts widget widget_categories" id="categories-2">
                            <h3 class="widget-title">Danh mục tin tức</h3>
                            <ul>
                                @foreach($allCategory as $item)
                                    <li class="cat-item cat-item-19599">
                                        <a href="{{url('danh-muc-tin-tuc', $item->slug)}}">{{$item->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="popular-posts widget widget__sidebar" id="recent-posts-4">
                            <h3 class="widget-title">Tin tức mới</h3>
                            <div class="widget-content">
                                <ul class="posts-list unstyled clearfix">
                                    @foreach($newsLatest as $item)
                                        <li>
                                            <figure class="featured-thumb">
                                                <a href="#pellentesque-posuere">
                                                    <img width="80" height="100" alt="{{$item->title}}" src="{{url($item->image)}}">
                                                </a>
                                            </figure>
                                            <!--featured-thumb-->
                                            <h4>
                                                <a title="{{$item->title}}" href="{{url('tin-tuc', $item->slug)}}" style="white-space: normal">{{$item->title}}</a>
                                            </h4>
                                            <p class="post-meta"><i class="icon-calendar"></i>
                                                {{$item->created_at}}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--widget-content-->
                        </div>

                        <!-- Banner Ad Block -->
                        <div class="ad-spots widget widget__sidebar">
                            <h3 class="widget-title">Quảng cáo</h3>
                            <div class="widget-content"><a target="_self" href="#" title=""><img alt="offer banner" src="images/offer-banner1.jpg"></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection