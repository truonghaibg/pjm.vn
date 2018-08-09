@extends('layout.index')
@section('content')
<div class="news">
  <div class="content_left">
    <div class="box_left">
        <div class="title_box_left">Danh mục tin tức</div>
        <div class="content_box_left list_cat_news">
          <ul class="ul">
            @foreach($n as $news)
              <li><a href="{{url('tin-tuc/'.$news->titlekd)}}">{{$news->title}}</a></li>
            @endforeach
          </ul>
        </div>
    </div><!--box_left-->
  </div>
  <div class="content_news_page">
    <h1>Chào mừng bạn đến với Ngọc Cường Computer</h1>
    <div class="time">2016-09-17 09:04:55</div>
    <div class="content_detail">
      <p>Xin mời bạn chọn danh mục các tin tức ở bên phải</p>
    </div>
  </div>
</div>
<div style="clear: both;"></div>
@endsection
