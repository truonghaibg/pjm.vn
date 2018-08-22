@extends('layout.index')
@section('content')

    <!--=========== BEGIN COURSE BANNER SECTION ================-->
    <div class="banner">
      <img src="upload/subcate/{{$subcate->subcate_img}}" alt="">
    </div>
    <!--=========== END COURSE BANNER SECTION ================-->
    <!--=========== BEGIN COURSE BANNER SECTION ================-->
    <section id="courseArchive">
      <div class="container">
        <div class="row">
          <!-- start course content -->
          <div class="col-lg-9 col-md-9 col-sm-9">
            <div class="courseArchive_content">
              <!-- start blog archive  -->
              <div class="row">
                <!-- start single blog -->
                <div class="col-lg-12 col-12 col-sm-12">
                  <div class="single_blog">
                    <div class="blogimg_container">
                      <a href="canhan/{{$cate1->cate_namekd}}/{{$subcate->subcate_namekd}}/{{$post->post_titlekd}}" class="blog_img">
                        <img alt="img" src="upload/post/{{$post->post_img}}">
                      </a>
                    </div>
                    <h2 class="blog_title"><a href=""> {{$post->post_tittle}}</a></h2>
                    <div class="blog_commentbox">
                      <p><i class="fa fa-user"></i>Mobifone</p>
                      <p><i class="fa fa-calendar"></i>{{$post->created_at}}</p>
                      <a href="#"><i class="fa fa-comments"></i>{{$post->post_view}} Views</a>
                    </div>
                    {!!$post->post_content!!}
                    
                  	</div>
                  <!-- single blog nex & prev button -->
                  <!-- <div class="single_blog_prevnext">
                <!-- End single blog -->
              </div>
              <!-- end blog archive  -->
              <!-- start related post -->
              <div class="related_post">
                <h2>Bài viết cùng chủ đề</h2>
                <div class="row">
				@foreach($p as $post)
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single_blog_archive wow fadeInUp">
                      <div class="blogimg_container">
                        <a class="blog_img" href="canhan/{{$cate1->cate_namekd}}/{{$subcate->subcate_namekd}}/{{$post->post_titlekd}}">
                          <img src="upload/post/{{$post->post_img}}" alt="img">
                        </a>
                      </div>
                      <h2 class="blog_title"><a href="canhan/{{$cate1->cate_namekd}}/{{$subcate->subcate_namekd}}/{{$post->post_titlekd}}"> {{$post->post_title}}</a></h2>
                      <div class="blog_commentbox">
                        <p><i class="fa fa-user"></i>Mobifone</p>
                        <p><i class="fa fa-calendar"></i>15 March 2015</p>
                      </div>

                      <a href="canhan/{{$cate1->cate_namekd}}/{{$subcate->subcate_namekd}}/{{$post->post_titlekd}}" class="blog_readmore">Chi tiết</a>
                    </div>
                  </div>
				@endforeach
                </div> 
              </div> 
              <!-- start related post -->           
            </div>
          </div>
          <!-- End course content -->

          <!-- start course archive sidebar -->
          <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="courseArchive_sidebar">
              <!-- start single sidebar -->
              <div class="single_sidebar">
                <h2>Sự kiện <span class="fa fa-angle-double-right"></span></h2>
                <ul class="news_tab">
                @foreach($events as $e)
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <a href="events/{{$e->id}}" class="news_img">
                          <img alt="img" src="upload/events/{{$e->img}}" class="media-object">
                        </a>
                      </div>
                      <div class="media-body">
                       <a href="events/{{$e->id}}">{{$e->title}}</a>
                       <span class="feed_date">27.02.15</span>
                      </div>
                    </div>
                  </li>
				@endforeach                 
                </ul>
              </div>
              <!-- End single sidebar -->
            </div>
          </div>
          <!-- start course archive sidebar -->
        </div>
      </div>
    </section>
    <!--=========== END COURSE BANNER SECTION ================-->
@endsection