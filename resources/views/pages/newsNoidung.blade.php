@extends('layout.index')
@section('content')
<div class="news">
  <div class="content_news_page">
    <h1><?php echo $new->title; ?></h1>
    <div class="time"><?php echo $new->updated_at; ?></div>
    <div class="content_detail">
      <?php echo $new->content; ?>
    </div>
  </div>
  <div class="content_right">
    <div class="box_left">
        <div class="title_box_left">Danh mục tin tức</div>
        <div class="content_box_left list_cat_news">
          <ul class="ul">
            @foreach($newsCategory as $item)
              <li><a href="{{url('danh-muc-tin-tuc/'.$item->id)}}">{{$item->name}}</a></li>
            @endforeach
          </ul>
        </div>
    </div><!--box_left-->
  </div>
  
</div>
<div style="clear: both;"></div>
@endsection
