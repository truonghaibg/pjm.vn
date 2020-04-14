@extends('layouts.master')
@section('head')
	<title> {{$new->title}} | {{$siteConfig->title}}</title>
	<meta property="og:title" content="{{$new->title}}"/>
	@if(isset($new->image))
		<meta property="og:image" content="{{url($new->image)}}"/>
		<meta property="og:image:alt" content="{{url($new->image)}}"/>
	@endif
	<meta name="description" content="{{$new->meta_description}}">
	<meta property="og:description" content="{{$new->meta_description}}">
	<meta name="keywords" content="{{$new->meta_keywords }}"/>
@endsection
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
					<div class="fb-share-button"  data-href="{{url('/')}}/tin-tuc/{{$new->title}}" data-layout="button_count"> </div>
                </div>
                <div class="content_detail">
                    <?php echo $new->desc_long; ?>
                </div>
				<div class="content_detail">
					<div class='related-product'>
						<div class="row">
							<div class="col">
								<div class='pro-title'>
									<div class='title-name'>
										<a style="text-decoration:none" href="{{url('danh-muc-tin-tuc', $new->category_id)}}">Tin liên quan</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row related_product">
							@foreach($relatedNews as $item)
								<div class="row border-bottom" style="padding: 15px;">
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<div class="text-center">
											<a href="{{url('tin-tuc', $item->slug)}}" alt="{{$item->title}}">
												<img src="{{url($item->image)}}" alt="{{$item->title}}" class="img-fluid mx-auto d-block" />
											</a>
										</div>
									</div>
									<div class="col">
										<div class="post-header">
											<h4>
												<a class="post-item-link" href="{{url('tin-tuc', $item->slug)}}" title="{{$item->title}}">
													{{$item->title}}
												</a>
											</h4>
										</div>

										<div class="post-content d-none d-md-block">
											{{$item->desc_short}}
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
					</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="box_left">
                    <div class="title_box_left">Danh mục tin tức</div>
                    <div class="content_box_left list_cat_news">
                        <ul class="ul">
                            @foreach($newsCategory as $item)
                                <li><a href="{{url('danh-muc-tin-tuc', $item->id)}}" title="{{$item->title}}">{{$item->title}}</a></li>
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
