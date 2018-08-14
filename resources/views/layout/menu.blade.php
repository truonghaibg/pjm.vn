<div id="menu">
   <div class="header3">
         <ul>
            <li class="danhmuc">
               <a href="javascript:void(0)" id="main_menu">DANH MỤC SẢN PHẨM</a>
                <?php if (Route::getCurrentRoute()->uri() != '/') { ?>
                <ul class="ul1" style="display: none;">
                    @foreach ($cate as $c)
                    <li class="sub1">
                        <a class='a1' href="{{url('danh-sach/'.$c->cate_namekd)}}">
                            <img src='template_asset/images/site/flyout/{{$c->cate_name}}.png' alt='' />
                            <span class=''>{{$c->cate_name}}</span>
                            <img class="arow" src="template_asset/images/site/flyout/forward2.png" alt="" />
                        </a>
                        <ul class="ul2">
                            @foreach($c->subcate as $sc)
                            <li class="sub2">
                                <a class='a2' href="{{url('danh-sach/'.$c->cate_namekd.'/'.$sc->subcate_namekd)}}">
                                    <span>{{$sc->subcate_name}}</span>
                                </a>
                                <ul class='ul3'>
                                    @foreach($sc->nsx as $nsx)
                                    <li class='sub3'>
                                        <a class='a3' href="{{url('danh-sach/'.$c->cate_namekd.'/'.$sc->subcate_namekd.'/'.$nsx->nsx_namekd)}}">
                                            <span>
                                                {{$nsx->nsx_name}}
                                                <span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
                <?php } ?>
            </li>
            <li class="toplink">
               <a href="{{url('tin-tuc/khuyen-mai')}}">
                   Khuyền mãi
               </a>
            </li>
            <li class="toplink">
               <a href="{{url('tin-tuc/chinh-sach-bao-hanh')}}">
                    Hình ảnh dự án
               </a>
            </li>
            <li class="toplink">
               <a href="{{url('tin-tuc')}}">
                  Tin tức
               </a>
            </li>
         </ul>
       <?php if (Route::getCurrentRoute()->uri() == '/') { ?>
       <script>
           $(document).ready(function () {
                $("#main_menu").click(function() {
                    $( ".ul1" ).toggle( "slow" );
                });
           })
       </script>
       <?php } ?>
      </div>
  <div style="clear: both;"></div>
   
    <?php if (Route::getCurrentRoute()->uri() == '/') { ?>
    <ul class="ul1" style="display: block;position: relative !important">
        @foreach ($cate as $c)
        <li class="sub1">
            <a class='a1' href="{{url('danh-sach/'.$c->cate_namekd)}}">
                <img src='template_asset/images/site/flyout/{{$c->cate_name}}.png' alt='' />
                <span class=''>{{$c->cate_name}}</span>
                <img class="arow" src="template_asset/images/site/flyout/forward2.png" alt="" />
            </a>
            <ul class="ul2">
                @foreach($c->subcate as $sc)
                <li class="sub2">
                    <a class='a2' href="{{url('danh-sach/'.$c->cate_namekd.'/'.$sc->subcate_namekd)}}">
                        <span>{{$sc->subcate_name}}</span>
                    </a>
                    <ul class='ul3'>
                        @foreach($sc->nsx as $nsx)
                        <li class='sub3'>
                            <a class='a3' href="{{url('danh-sach/'.$c->cate_namekd.'/'.$sc->subcate_namekd.'/'.$nsx->nsx_namekd)}}">
                                <span>
                                    {{$nsx->nsx_name}}
                                    <span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
    <div class="slider theme-default">
        <div id="slider" class="nivoSlider">
            <img src="template_asset/images/site/slide/b1.jpg" />
            <a href="{{url('fb.com/profile.php?id=100001243054025')}}">
                <img class="img-slide" src="template_asset/images/site/slide/b2.jpg" />
            </a>
            <a href="{{url('fb.com/profile.php?id=100001243054025')}}">
                <img class="img-slide" src="template_asset/images/site/slide/b3.jpg" />
            </a>
            <a href="{{url('fb.com/profile.php?id=100001243054025')}}">
                <img class="img-slide" src="template_asset/images/site/slide/b4.jpg" />
            </a>
        </div>
    </div>
    <div class="baner-fly">
        <a href="{{url('')}}">
            <img src="template_asset/images/site/baner/baner.png" alt="" />
        </a>
    </div>
    <div class="video-news">
        <iframe width="300" height="216" src="https://www.youtube.com/embed/99DlqDCeuIw" frameborder="0" allowfullscreen></iframe>
    </div>
    <?php } ?>
    
   


</div>
<div style="clear: both;"></div>
