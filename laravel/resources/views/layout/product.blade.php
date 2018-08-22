<?php
function cmp($a, $b)
{
    return strtotime($a['created_at']) < strtotime($b['created_at']) ? 1 : -1;
}
?>
@foreach ($cate as $c)
    <div class='product'>
        <div class='pro-title'>
            <div class='title-name'>
                <img class='logo-pro-title' src='{{url('/')}}/template_asset/images/site/pro/cd.png'
                     alt='{{$c->cate_name}}'>
                <a href="{{url('danh-sach/'.$c->cate_namekd)}}">{{$c->cate_name}}</a>
            </div>
            <div class='sub-title'>
                <div class='sub-title-ul'>
                    @foreach($c->subcate as $sc)
                        <div class='sub-title-li'>
                            <a href="{{url('danh-sach/'.$c->cate_namekd.'/'.$sc->subcate_namekd)}}">{{$sc->subcate_name}}
                                | </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <img src='{{url('/')}}/upload/cate/{{$c->cate_img}}'>
        <div class='pro'>
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
                        <a class='pro-a' href="{{url('item/'.$p['product_namekd'])}}" title='{{$p['product_namekd']}}'>
                            <img class='pro-img' src='upload/product/{{$p['product_img']}}'>
                            <img class='sale-value-img' <?php if ($p['product_salevalue'] == 0) {
                                echo "style='display:none;'";
                            } ?>src='template_asset/images/site/pro/sale-img.png'>
                            <span class='sale-value-txt'
                            <?php if ($p['product_salevalue'] == 0) {
                                echo "style='display:none;'";
                            } ?>
                            >{{$p['product_salevalue']}}%</span>
                            <?php
                            $phantram = ($p['product_salevalue']) / 100;
                            $tiensale = ($p['product_price']) * $phantram;
                            $price = ($p['product_price']) - $tiensale;
                            ?>
                            <span class='pro-name' title=''>{{$p['product_name']}}</span>
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
								{{number_format($p['product_price'])}} đ
							</span>

                            <?php
                            if ($p['product_status'] == 1) {
                                echo "<span class='pro-sale-info' title='' style='color:#68EE60'><img src='template_asset/images/site/pro/cart.png'>  Hàng mới về</span>";
                            } elseif ($p['product_status'] == 2) {
                                echo "<span class='pro-sale-info' title='' style='color:#68EE60'><img src='template_asset/images/site/pro/cart.png'>  Còn hàng</span>";
                            } elseif ($p['product_status'] == 3) {
                                echo "<span class='pro-sale-info' title=''><img src='template_asset/images/site/pro/telephone.png'>  Liên hệ</span>";
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
    <div style="clear: both;"></div>
@endforeach