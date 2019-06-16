<?php
function cmp($a, $b)
{
    return strtotime($a['created_at']) < strtotime($b['created_at']) ? 1 : -1;
}
?>
<div class="product-wrap">
	<div class="container">
		<div class="pro-title">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class='title-name'>
						<a href="{{url('/')}}">Sản phẩm đề xuất</a>
					</div>
				</div>
			</div>
		</div>

		<div class="row text-center">
			<?php $productArray = []; ?>
				@foreach($productSuggests as $p)
					<?php
					$productArray[] = $p->toArray();
					?>
				@endforeach

            <?php
                uasort($productArray, 'cmp');
                $i = 0;
            ?>
            @foreach($productArray as $p)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 text-center">
                    <div class="product-block text-center">
                        @include('pages.product-block')
                    </div>
                </div>
            @endforeach
		</div>
	</div>
</div>
<div style="clear: both;"></div>
@foreach ($cate as $cateParent)
    <div class="product-wrap">
        <div class="container">
            <div class="pro-title">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class='title-name'>
                            <a href="{{url('danh-sach/'.$cateParent->cate_namekd)}}">{{$cateParent->cate_name}}</a>
                        </div>
                    </div>
                    <div class="col-md-9 d-none d-md-block">
                        <div class='sub-title'>
                            <div class='sub-title-ul'>
                                @foreach($cateParent->subcate as $subCate)
                                    <div class='sub-title-li'>
                                        <a href="{{url('danh-sach/'.$cateParent->cate_namekd.'/'.$subCate->subcate_namekd)}}">{{$subCate->subcate_name}}
                                            | </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <?php $productArray = []; ?>
                @foreach($cateParent->subcate as $s)
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
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 text-center">
                    <div class="product-block text-center">
                        @include('pages.product-block')
                    </div>
                </div>
                <?php
                $i++;
                if ($i == 8) {
                    break;
                }
                }
                ?>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
@endforeach