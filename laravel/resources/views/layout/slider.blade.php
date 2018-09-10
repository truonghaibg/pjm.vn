<div class="slider-wrap">
    <div class="container">
        <div class="row slider-bar justify-content-end">
            <div class="col-lg-offset-3 col-md-12 col-lg-9">
                <div class="row">
                    <?php if (Route::getCurrentRoute()->uri() == '/') { ?>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 ">
                        <div class="slider theme-default">
                            <div id="slider" class="nivoSlider" style="height: 332px">
                                @foreach($slider as $item)
                                    <a href="{{$item->link}}" target="_blank">
                                        <img src="{{url('/')}}/upload/slider/{{$item->image}}"/>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 d-md-block d-none">
                        <?php if (Route::getCurrentRoute()->uri() != '/') { ?>
                        <script>
                            $(document).ready(function () {
                                $("#main_menu").click(function () {
                                    $(".ul1").slideToggle("slow", function () {
                                    });
                                });
                            })
                        </script>
                        <?php } ?>
                        <div class="baner-fly">
                            <a href="{{url('')}}" target="_blank">
                                <img src="{{url('/')}}/upload/slider/image_0.jpg" alt=""/>
                            </a>
                        </div>
                        <div class="video-news">
                            <?php
                            $codes = explode("/", $video->link);
                            $code = $codes[count($codes) - 1];
                            ?>
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{str_replace("watch?v=", "",$code )}}"
                                    frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="clear: both;"></div>
