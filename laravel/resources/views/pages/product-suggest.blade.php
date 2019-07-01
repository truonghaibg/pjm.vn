<div class='related-product'>
    <div class="row">
        <div class="col">
            <div class='pro-title'>
                <div class='title-name'>
                    <a href="#">Sản phẩm đề xuất</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row related_product">
        <?php foreach($productSuggests as $item){ ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="product-block text-center">
                @include('includes.product-block')
            </div>
        </div>
        <?php } ?>
    </div>
</div>