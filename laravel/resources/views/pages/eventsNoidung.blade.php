@extends('layout.index')
@section('content')

    <!--=========== BEGIN COURSE BANNER SECTION ================-->
    <div class="banner">
      <img src="upload/events/eventsbanner.jpg" alt="">
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
                      <a href="events/{{$events->id}}" class="blog_img">
                        <img alt="img" src="upload/events/{{$events->img}}">
                      </a>
                    </div>
                    <h2 class="blog_title"> {{$events->title}}</h2>
                    <div class="blog_commentbox">
                      <p><i class="fa fa-user"></i>Mobifone</p>
                      <p><i class="fa fa-calendar"></i>{{$events->created_at}}</p>
                    </div>
                    {!!$events->content!!}
                    
                  	</div>
                  <!-- single blog nex & prev button -->
                  <!-- <div class="single_blog_prevnext">
                    <a class="prev_post wow fadeInLeft" href="#"><i class="fa fa-angle-left"></i>Previous Post</a>
                    <a class="next_post wow fadeInRight" href="#">Next Post<i class="fa fa-angle-right"></i></a>
                  </div> -->
                </div>
                <!-- End single blog -->                
              </div>
              <!-- end blog archive  -->
              <!-- start related post -->
              
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
                @foreach($ea as $e)
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <a href="events/{{$e->id}}" class="news_img">
                          <img alt="img" src="upload/events/{{$e->img}}" class="media-object">
                        </a>
                      </div>
                      <div class="media-body">
                       <a href="news/{{$e->id}}">{{$e->title}}</a>
                       <span class="feed_date">{{$e->created_at}}</span>
                      </div>
                    </div>
                  </li>
				        @endforeach                 
                </ul>
              </div>
              <!-- End single sidebar -->
              <!-- start single sidebar -->
              <!-- <div class="single_sidebar">
                <h2>Category <span class="fa fa-angle-double-right"></span></h2>
                <ul>
                  <li><a href="#">Food</a></li>
                  <li><a href="#">Technology</a></li>
                  <li><a href="#">Fashion</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Games</a></li>
                </ul>
              </div> -->
              <!-- End single sidebar -->
              <!-- start single sidebar -->
              <!-- <div class="single_sidebar">
                <h2>Tags <span class="fa fa-angle-double-right"></span></h2>
                <ul class="tags_nav">
                  <li><a href="#"><i class="fa fa-tags"></i>Creative</a></li>
                  <li><a href="#"><i class="fa fa-tags"></i>News</a></li>
                  <li><a href="#"><i class="fa fa-tags"></i>Technology</a></li>
                  <li><a href="#"><i class="fa fa-tags"></i>Art</a></li>
                  <li><a href="#"><i class="fa fa-tags"></i>Audio</a></li>
                  <li><a href="#"><i class="fa fa-tags"></i>video</a></li>
                </ul>
              </div> -->
              <!-- End single sidebar -->
              <!-- start single sidebar -->
              <!-- <div class="single_sidebar">
                <h2>Sponsor Add <span class="fa fa-angle-double-right"></span></h2>
                <a class="side_add" href="#"><img src="img/side-add.jpg" alt="img"></a>
              </div> -->
              <!-- End single sidebar -->
            </div>
          </div>
          <!-- start course archive sidebar -->
        </div>
      </div>
    </section>
    <!--=========== END COURSE BANNER SECTION ================-->
@endsection