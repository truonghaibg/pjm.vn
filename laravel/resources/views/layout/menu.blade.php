<div id="menu">
   <div class="header3">
         <ul>
            <li class="danhmuc">
               <a href="javascript:void(0)" id="main_menu">DANH MỤC SẢN PHẨM</a>
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
      </div>
  <div style="clear: both;"></div>
    <ul id="mainmenu" class="ul1" style="<?php if (Route::getCurrentRoute()->uri() == '/') { ?> display: block;position: relative !important <?php } else { ?> display: none;position: absolute !important; z-index:999 <?php } ?>">
        @foreach ($cate as $c)
        <li class="sub1">
            <a class='a1' href="{{url('danh-sach/'.$c->cate_namekd)}}" style="padding: 13px 5px">
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
                                    </span>
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
    <?php if (Route::getCurrentRoute()->uri() != '/') { ?>
    <script>

        $(document).ready(function () {
           $("#main_menu").click(function() {
				$( ".ul1" ).slideToggle( "slow", function() {});
			});
        })
       
    </script>
    <?php } ?>
    <?php if (Route::getCurrentRoute()->uri() == '/') { ?>
    <div class="slider theme-default">
        <div id="slider" class="nivoSlider" style="height: 332px">
			@foreach($slider as $item)
            <a href="{{$item->link}}" target="_blank">
                <img src="{{url('/')}}/upload/slider/{{$item->image}}" />
            </a>
             @endforeach
        </div>
    </div>
    <div class="baner-fly">
        <a href="{{url('')}}" target="_blank">
            <img src="{{url('/')}}/upload/slider/image_0.jpg" alt="" />
        </a>
    </div>
    <div class="video-news">
		<?php 
			$codes = explode("/", $video->link);
			$code = $codes[count($codes)- 1];
		?>
        <iframe width="300" height="160" src="https://www.youtube.com/embed/{{str_replace("watch?v=", "",$code )}}" frameborder="0" allowfullscreen></iframe>
    </div>
    <?php } ?>
</div>
<div style="clear: both;"></div>
