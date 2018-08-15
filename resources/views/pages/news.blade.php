@extends('layout.index')
@section('content')
<div class="news">
  <div class="content_left">
    <div class="box_left">
        <div class="title_box_left">Danh mục tin tức</div>
        <div class="content_box_left list_cat_news">
          <ul class="ul">
            @foreach($n as $item)
              <li><a href="{{url('tin-tuc/'.$item->titlekd)}}">{{$item->title}}</a></li>
            @endforeach
          </ul>
        </div>
    </div><!--box_left-->
  </div>
  <div class="content_news_page">
    <h1>Tin tức mới</h1>
      <br />
    <div class="content_detail">
        @foreach($news as $item)

        <div class="post-holder post-holder-591">
	        <div class="post-holder-image">
		        <div class="post-ftimg-hld">
                    <a href="{{url('/')}}/tin-tuc/{{$item->titlekd}}" alt="{{$item->title}}">
                        <img style="width: 90%;" src="{{url('/')}}/upload/news/{{$item->img}}" alt="" />
                    </a>
                </div>
        	</div>
	        <div class="post-holder-right">
		        <div class="post-header">
			        <div class="post-title-holder clearfix">
				        <h2 class="post-title">
                            <a class="post-item-link" href="{{url('/')}}/tin-tuc/{{$item->titlekd}}">
                                <?php echo $item->title; ?>
                            </a>
				        </h2>
			        </div>
		        </div>

		        <div class="post-content">
			        <div class="post-description clearfix">
				        <div class="post-text-hld clearfix">
							<?php echo $item->sum; ?> ...
                        </div>
                        <a class="post-read-more" href="{{url('/')}}/tin-tuc/{{$item->titlekd}}" title="{{$item->title}}">
                            Đọc tiếp »
                        </a>
			        </div>
		        </div>
		        <div class="post-footer">
                    <div class="post-info clear">
                        <div class="item post-posed-date">
                            <span class="label">Ngày đăng:</span>
                            <span class="value">{{$item->created_at->format('d/m/Y')}}</span>
                        </div>
                        <br />
                        <div class="item post-categories">
                            <span class="label">Tags:</span>
                            @foreach($item->tags as $tag)
                            <a title="{{$tag->name}}" href="#"> {{$tag->name}}</a>,
                            @endforeach
                          </div>
                     </div>
                </div>
	        </div>
        </div>
        @endforeach
    </div>
  </div>
</div>
<div style="clear: both;"></div>
@endsection
