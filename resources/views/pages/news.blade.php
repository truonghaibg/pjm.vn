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
                        <!--
				        <div class="addthis_toolbox addthis_default_style" addthis:url="https://newlando.vn/can-bo-cong-nhan-vien-newland-viet-nam-du-lich-dau-xuan-de-chuan-bi-san-sang-chien-dich-xay-dung-201/" addthis:title="Cán bộ công nhân viên Newland Việt Nam du lịch đầu xuân để chuẩn bị sẵn sàng chiến dịch xây dựng 2018" addthis:media="https://newlando.vn/pub/media/product_des_images/Can-bo-cong-nhan-vien-Newland-Viet-Nam-du-lich-dau-xuan-de-chuan-bi-san-sang-chien-dich-xay-dung-2018.jpg">
					        <a class="addthis_button_facebook at300b" title="Facebook" href="#"><span class="at-icon-wrapper" style="background-color: rgb(59, 89, 152); line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-facebook-1" title="Facebook" alt="Facebook" style="width: 16px; height: 16px;" class="at-icon at-icon-facebook"><title id="at-svg-facebook-1">Facebook</title><g><path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path></g></svg></span></a>
					        <a class="addthis_button_twitter at300b" title="Twitter" href="#"><span class="at-icon-wrapper" style="background-color: rgb(29, 161, 242); line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-twitter-2" title="Twitter" alt="Twitter" style="width: 16px; height: 16px;" class="at-icon at-icon-twitter"><title id="at-svg-twitter-2">Twitter</title><g><path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill-rule="evenodd"></path></g></svg></span></a>
					        <a class="addthis_button_email at300b" target="_blank" title="Email" href="#"><span class="at-icon-wrapper" style="background-color: rgb(132, 132, 132); line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-email-3" title="Email" alt="Email" style="width: 16px; height: 16px;" class="at-icon at-icon-email"><title id="at-svg-email-3">Email</title><g><g fill-rule="evenodd"></g><path d="M27 22.757c0 1.24-.988 2.243-2.19 2.243H7.19C5.98 25 5 23.994 5 22.757V13.67c0-.556.39-.773.855-.496l8.78 5.238c.782.467 1.95.467 2.73 0l8.78-5.238c.472-.28.855-.063.855.495v9.087z"></path><path d="M27 9.243C27 8.006 26.02 7 24.81 7H7.19C5.988 7 5 8.004 5 9.243v.465c0 .554.385 1.232.857 1.514l9.61 5.733c.267.16.8.16 1.067 0l9.61-5.733c.473-.283.856-.96.856-1.514v-.465z"></path></g></svg></span></a>
					        <a class="addthis_button_compact at300m" href="#"><span class="at-icon-wrapper" style="background-color: rgb(255, 101, 80); line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-addthis-4" title="More" alt="More" style="width: 16px; height: 16px;" class="at-icon at-icon-addthis"><title id="at-svg-addthis-4">Addthis</title><g><path d="M18 14V8h-4v6H8v4h6v6h4v-6h6v-4h-6z" fill-rule="evenodd"></path></g></svg></span></a>
				            <div class="atclear"></div>
                        </div>
                        -->
			        </div>
		        </div>

		        <div class="post-content">
			        <div class="post-description clearfix">
				        <div class="post-text-hld clearfix">
							<?php echo $item->sum; ?> ...				
                        </div>
				       
                        <a class="post-read-more" href="{{url('/')}}/tin-tuc/{{$item->titlekd}}" title="{{$item->title}}">
                            Read more »
                        </a>
			        </div>
		        </div>
		        <div class="post-footer">
                    <div class="post-info clear">
                        <div class="item post-posed-date">
                            <span class="label">Posted:</span>
                            <span class="value">March 19, 2018</span>
                        </div>
                        <div class="dash">|</div>         
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
