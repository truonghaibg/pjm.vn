<div class="product-block-detail">
    <div class="product-item text-center">
    <a class='pro-a' href="{{url('san-pham/'.$p['product_namekd'])}}"
       title="{{$p['product_namekd']}}">
        <img class="item-img rounded" src="{{url('')}}/upload/product/{{$p['product_img']}}">
        <img class="sale-value-img" <?php if ($p['product_salevalue'] == 0) {
            echo "style='display:none;'";
        } ?>src='{{url('')}}/template_asset/images/site/pro/sale-img.png'>
        <span class='sale-value-txt'
        <?php if ($p['product_salevalue'] == 0) {
            echo "style='display:none;'";
        } ?>
        >{{$p['product_salevalue']}}%</span>
        <?php
        $discount = ($p['product_salevalue']) / 100;
        $price = ($p['product_price']) - ($p['product_price']) * $discount;
        ?>

        <div class="item-price">
            <?php
            if ($price == 0) {
                echo 'Liên hệ';
            } else {
                echo number_format($price) . ' VNĐ';
            }
            ?>
        </div>

        <span class="item-price-discount" <?php if ($p['product_salevalue'] == 0) {
            echo "style='display:none;'";
        } ?>>
            {{number_format($p['product_price'])}} đ
        </span>

        <div class="item-name">
            {{$p['product_name']}}
        </div>


        <?php
        if ($p['product_status'] == 1) {
            echo "<span class='item-sale-info' title='' style='color:#68EE60'><img src='" . url('') . "/template_asset/images/site/pro/cart.png'>  Hàng mới về</span>";
        } elseif ($p['product_status'] == 2) {
            echo "<span class='item-sale-info' title='' style='color:#68EE60'><img src='" . url('') . "/template_asset/images/site/pro/cart.png'>  Còn hàng</span>";
        } elseif ($p['product_status'] == 3) {
            echo "<span class='item-sale-info' title=''><img src='" . url('') . "/template_asset/images/site/pro/telephone.png'>  Liên hệ</span>";
        }
        ?>
    </a>
</div>
</div>