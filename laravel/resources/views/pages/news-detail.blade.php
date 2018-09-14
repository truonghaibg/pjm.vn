@extends('layout.index')
@section('content')
<div class="news-wrap">
    <div class="container news">
        <br>
        <div class="row">
            <div class="col-lg-9 col-md-9">
                <h2>{{$new->title}}</h2>
                <div class="time">
                    <span class="label">Ngày đăng:</span>
                    <span class="value">{{$new->created_at->format('d/m/Y')}}</span>
					<div class="fb-share-button"  data-href="{{url('/')}}/tin-tuc/{{$new->titlekd}}" data-layout="button_count"> </div>
                </div>
                <div class="content_detail">
                    <?php echo $new->content; ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="box_left">
                    <div class="title_box_left">Danh mục tin tức</div>
                    <div class="content_box_left list_cat_news">
                        <ul class="ul">
                            @foreach($newsCategory as $item)
                                <li><a href="{{url('danh-muc-tin-tuc/'.$item->id)}}">{{$item->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="clear: both;"></div>
@endsection
