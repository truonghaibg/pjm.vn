@extends('layout.index')
@section('content')

    <!--=========== BEGIN COURSE BANNER SECTION ================-->
    <section id="imgBanner">
      <h2>CÁ NHÂN</h2>
    </section>
    <!--=========== END COURSE BANNER SECTION ================-->
    
    <!--=========== BEGIN COURSE BANNER SECTION ================-->
    <section id="courseArchive">
      <div class="container">
        <div class="row">
          <!-- start course content -->
          <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="courseArchive_content">
              <div class="row">
				@foreach($cate as $c)
				@if($c->customer_id == 1)
                <!-- start single course -->
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="single_course wow fadeInUp">
                    <div class="singCourse_imgarea">
                      <img maxwidth="400px" max-height="270px" src="upload/cate/{{$c->cate_img}}" />
                      <div class="mask">                         
                        <a href="canhan/{{$c->cate_namekd}}" class="course_more">XEM THÊM</a>
                      </div>
                    </div>
                    <div class="singCourse_content">
                    <h3 class="singCourse_title"><a href="canhan/{{$c->cate_namekd}}">{{$c->cate_name}}</a></h3>
                    </div>
                  </div>
                </div>
                <!-- End single course -->
				@endif
				@endforeach
              </div>
              <!-- start previous & next button -->
              <!-- <div class="single_blog_prevnext">
                <a href="#" class="prev_post wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"><i class="fa fa-angle-left"></i>Previous</a>
                <a href="#" class="next_post wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">Next<i class="fa fa-angle-right"></i></a>
              </div> -->
            </div>
          </div>
          <!-- End course content -->

          <!-- start course archive sidebar -->
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="courseArchive_sidebar">
              <!-- start single sidebar -->
              <div class="single_sidebar">
                <h2>Sự kiện <span class="fa fa-angle-double-right"></span></h2>
                <ul class="news_tab">
                @foreach($news as $n)
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <a href="events/{{$n->id}}" class="news_img">
                          <img alt="img" src="upload/news/{{$n->img}}" class="media-object">
                        </a>
                      </div>
                      <div class="media-body">
                       <a href="events/{{$n->id}}">{{$n->title}}</a>
                       <span class="feed_date">{{$n->updated_at}}</span>
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