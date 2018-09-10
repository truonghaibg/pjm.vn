<div class="menu-wrap">
    <div class="container">
        <div class="row menu-bar">
            <div class="col-md-3">
                <div class="nav-bar-category">
                    <div class="module-inner">
                        <h3 class="module-title">
                            <span>DANH MỤC SẢN PHẨM</span>
                        </h3>
                        <div class="module-ct">
                            <ul class="nav nav-pills nav-stacked "
                                style="<?php if (Route::getCurrentRoute()->uri() == '/') { ?> display: block;position: relative !important <?php } else { ?> display: none;position: absolute !important; z-index:999 <?php } ?>">
                                @foreach ($cate as $c)
                                    <li class="sub1">
                                        <a class='a1' href="{{url('danh-sach/'.$c->cate_namekd)}}" style="padding: 13px 5px">
                                            <span class=''>{{$c->cate_name}}</span>
                                        </a>
                                        <div style="height: 570px; width: 872px;">
                                            <ul class="ul2">
                                                @foreach($c->subcate as $sc)
                                                    <li class="sub2">
                                                        <a class='a2' href="{{url('danh-sach/'.$c->cate_namekd.'/'.$sc->subcate_namekd)}}">
                                                            <span>{{$sc->subcate_name}}</span>
                                                        </a>
                                                        <ul class='ul3'>
                                                            @foreach($sc->nsx as $nsx)
                                                                <li class='sub3'>
                                                                    <a class='a3'
                                                                       href="{{url('danh-sach/'.$c->cate_namekd.'/'.$sc->subcate_namekd.'/'.$nsx->nsx_namekd)}}">
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
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="menu-right">
                    <ul>
                        <li class="toplink">
                            <a href="{{url('tin-tuc/khuyen-mai')}}">
                                Giới thiệu
                            </a>
                        </li>
                        <li class="toplink">
                            <a href="{{url('tin-tuc')}}">
                                Hoạt động
                            </a>
                        </li>
                        <li class="toplink">
                            <a href="{{url('tin-tuc')}}">
                                Tin tức
                            </a>
                        </li>
                        <li class="toplink">
                            <a href="{{url('tin-tuc')}}">
                                Liên hệ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
<div style="clear: both;"></div>
