<?php
function cmp($a, $b)
{
    return strtotime($a['created_at']) < strtotime($b['created_at']) ? 1 : -1;
}
?>
@foreach ($cate as $c)
    <div class="product-wrap">
        <div class="container product">
            <div class="pro-title">
                <div class='row'>
                <div class="col-4">
                    <div class='title-name'>
                        <a href="{{url('danh-sach/'.$c->slug)}}">{{$c->title}}</a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 hidden-xs hidden-sm">
                    <div class='sub-title'>
                        <div class='sub-title-ul'>
                            @foreach($c->subcate as $sc)
                                <div class='sub-title-li'>
                                    <a href="{{url('danh-sach/'.$c->slug.'/'.$sc->slug)}}">{{$sc->title}}
                                        | </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row pro">
                <div class='pros'>
                    <ul class='pro-ul'>
                        <?php $productArray = []; ?>
                        @foreach($c->subcate as $s)
                            @foreach($s->product as $p)
                                <?php
                                $productArray[] = $p->toArray();
                                ?>
                            @endforeach
                        @endforeach
                        <?php
                        uasort($productArray, 'cmp');
                        ?>
                        <?php
                        $i = 0;
                        foreach($productArray as $p){
                        ?>
                        <li class='pro-li'>
                            <a class='pro-a' href="{{url('item/'.$p['slug'])}}"
                               title="{{$p['slug']}}">
                                <img class="pro-img" src="{{url($p['image'])}}">
                                <img class="sale-value-img" <?php if ($p['product_salevalue'] == 0) {
                                    echo "style='display:none;'";
                                } ?>src='{{url('>
                                <span class='sale-value-txt'
                                <?php if ($p['product_salevalue'] == 0) {
                                    echo "style='display:none;'";
                                } ?>
                                >{{$p['product_salevalue']}}%</span>
                                <?php
                                $phantram = ($p['product_salevalue']) / 100;
                                $tiensale = ($p['price']) * $phantram;
                                $price = ($p['price']) - $tiensale;
                                ?>
                                <span class='pro-name' title=''>{{$p['title']}}</span>
                                <div id="pro-price3">
                                    <?php
                                    if ($price == 0) {
                                        echo 'Liên hệ';
                                    } else {
                                        echo number_format($price) . ' đ';
                                    }
                                    ?>
                                </div>

                                <span class='pro-price2' <?php if ($p['product_salevalue'] == 0) {
                                    echo "style='display:none;'";
                                } ?>>
								{{number_format($p['price'])}} đ
							    </span>

                                <?php
                                if ($p['status'] == 1) {
                                    echo "<span class='pro-sale-info' title='' style='color:#68EE60'><img src='" . url('') . "/template_asset/images/site/pro/cart.png'>  Hàng mới về</span>";
                                } elseif ($p['status'] == 2) {
                                    echo "<span class='pro-sale-info' title='' style='color:#68EE60'><img src='" . url('') . "/template_asset/images/site/pro/cart.png'>  Còn hàng</span>";
                                } elseif ($p['status'] == 3) {
                                    echo "<span class='pro-sale-info' title=''><img src='" . url('') . "/template_asset/images/site/pro/telephone.png'>  Liên hệ</span>";
                                }
                                ?>
                            </a>
                        </li>
                        <?php
                        $i++;
                        if ($i == 10) {
                            break;
                        }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
@endforeach