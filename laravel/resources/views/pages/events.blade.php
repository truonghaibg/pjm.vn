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
          <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="courseArchive_content">
              <!-- start blog archive  -->
              <div class="row">
				      @foreach($events as $n)
                <!-- start single blog archive -->
                <div class="col-lg-12 col-12 col-sm-12">
                  <div class="single_blog_archive wow fadeInUp">
                    <div class="blogimg_container">
                      <a href="events/{{$n->id}}" class="blog_img spe">
                        <img alt="img" src="upload/events/{{$n->img}}">
                      </a>
                    </div>
                    <h2 class="blog_title"><a href="events/{{$n->id}}"> {{$n->title}}</a></h2>
                    <p class="blog_summary">{{$n->title}}</p>
                    <a class="blog_readmore" href="events/{{$n->id}}">CHI TIẾT</a>
                  </div>
                </div>
                <!-- end single blog archive -->
				      @endforeach
              </div>
              
              <!-- end blog archive  -->
              <!-- <nav>
                <ul class="pagination wow fadeInLeft">
                  <li><a href="#"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
                </ul>
              </nav> -->
            </div>
          </div>
          <!-- End course content -->

          <!-- start course archive sidebar -->
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="courseArchive_sidebar">
              <!-- start single sidebar -->
              <div class="single_sidebar">
                <h2>Sự kiện Mobifone <span class="fa fa-angle-double-right"></span></h2>
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