<div class="partner-wrap d-none d-md-block">
    <div class="container partners">
        <div class="row">
            <?php foreach($headerData as $item){ ?>
            <div class="col-md-2 col-xs-4 text-center border rounded">
                <a href="{{$item->link}}" target="_blank">
                    <img height="100px" src='{{url('/')}}/upload/partners/{{$item->logo}}'
                         alt='{{$item->name}}'/>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>