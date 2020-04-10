@extends('layouts.master')

@section('content')
    <br/>
    <div class="news-wrap">
        <div class="container news">
            <div class="row content_news_page">
                <div class="col-md-9">
                    <h1>Tin tức mới</h1>
                    <br />
                    <div class="content_detail">
                        @foreach($news as $item)
                            <div class="row border-bottom" style="padding: 15px;">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="text-center">
                                        <a href="{{url('tin-tuc', $item->slug)}}" alt="{{$item->title}}">
                                            <img data-src="{{url($item->image)}}" alt="{{$item->title}}" class="lazyload img-fluid mx-auto d-block" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="post-header">
                                        <h4>
                                            <a class="post-item-link" href="{{url('tin-tuc', $item->slug)}}">
                                                <?php echo $item->title; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="post-content d-none d-md-block">
                                        <?php echo $item->desc_short; ?>
                                    </div>
                                    <br/>
                                    <div class="post-footer d-none d-md-block">
                                        <div class="item post-posed-date font-italic">
                                            <span class="label">Ngày đăng:</span>
                                            <span class="value">{{$item->created_at->format('d/m/Y')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <div  style="text-align: center">
                            <div style="display: inline-block;">
                                {{ $news->render() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box_left">
                        <div class="title_box_left">Danh mục tin tức</div>
                        <div class="content_box_left list_cat_news">
                            <ul class="ul">
                                @foreach($newsCategory as $item)
                                    <li><a href="{{url('danh-muc-tin-tuc',$item->id)}}" title="{{$item->title}}">{{$item->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--box_left-->
                </div>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
@endsection
