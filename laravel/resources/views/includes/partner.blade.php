<div class="partner-wrap d-none d-md-block">
    <div class="container partners">
        <div class="row">
            <?php foreach($partners as $item){ ?>
            <div class="col-md-2 col-xs-4 text-center border rounded">
                <a href="{{$item->link}}" target="_blank">
                    <img class="lazyload" height="100px" data-src='{{url($item->image)}}' alt="{{$item->title}}"
                         alt='{{$item->title}}'/>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>