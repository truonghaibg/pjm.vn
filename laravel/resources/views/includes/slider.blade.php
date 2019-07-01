<div class="slider-wrap clearfix">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-12 col-md-9 slider-intro">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($sliders as $item)
                            <div class="carousel-item">
                                <a href="{{$item->link}}" target="_blank"  title="{{$item->title}}">
                                    <img src="{{url($item->image)}}" class="d-block w-100" alt="{{$item->title}}">
                                </a>
                            </div>

                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="clear: both;"></div>
<script>
    $('.slider-wrap').find('.carousel-item').first().addClass('active');

</script>
