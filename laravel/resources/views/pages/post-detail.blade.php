@extends('layouts.master')
@section('content')
<div class="post-wrap">
    <div class="container post">
        <br>
        <div class="row">
            <div class="col-lg-9 col-md-9">
                <h2>{{$post->title}}</h2>
                <div class="time">
                    <span class="label">Ngày đăng:</span>
                    <span class="value">{{$post->created_at->format('d/m/Y')}}</span>
					<div class="fb-share-button"  data-href="{{url('/')}}/tin-tuc/{{$post->slug}}" data-layout="button_count"> </div>
                </div>
                <div class="content_detail">
                    <?php echo $post->content; ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="box_left">
                    <div class="title_box_left">Danh sách bài viết</div>
                    <div class="content_box_left list_cat_news">
                        <ul class="ul">
                            @foreach($posts as $item)
                                <li><a href="{{url('bai-viet/'.$item->slug)}}">{{$item->title}}</a></li>
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
