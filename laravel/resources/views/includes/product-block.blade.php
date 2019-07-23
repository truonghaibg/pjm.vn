<div class="product-block-detail">
    <div class="product-item text-center">
    <a class='pro-a' href="{{url('san-pham',$item->slug)}}"
       title="{{$item->title}}">
        <img class="item-img rounded" src="{{url($item->image)}}" alt="{{$item->title}}">
        <img class="sale-value-img"
             <?php if ($item->product_salevalue == 0) {
            echo "style='display:none;'";
        } ?>
             src='{{url('template_asset/images/site/pro/sale-img.png')}}'>
        <span class='sale-value-txt'
        <?php if ($item->product_salevalue == 0) {
            echo "style='display:none;'";
        } ?>
        >{{$item->product_salevalue}}%</span>
        <?php
        $discount = ($item->product_salevalue) / 100;
        $price = ($item->price) - ($item->price) * $discount;
        ?>

        <div class="item-price">
            <?php
            if ($price == 0) {
                echo 'Liên hệ';
            } else {
                echo number_format($price) . ' đ';
            }
            ?>
        </div>

        <span class="item-price-discount" <?php if ($item->product_salevalue == 0) {
            echo "style='display:none;'";
        } ?>>
            {{number_format($item->price)}} đ
        </span>

        <div class="item-name">
            {{$item->title}}
        </div>
    </a>
</div>
</div>