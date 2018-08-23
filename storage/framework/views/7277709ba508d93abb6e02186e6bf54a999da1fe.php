<?php
function cmp($a,$b){
	return strtotime($a['created_at'])<strtotime($b['created_at'])?1:-1;
}

?>
<?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	<div class='product'>
		<div class='pro-title'>
			<div class='title-name'>
				<img class='logo-pro-title' src='template_asset/images/site/pro/cd.png' alt='<?php echo e($c->cate_name); ?>'>
				<a href="<?php echo e(url('danh-sach/'.$c->cate_namekd)); ?>"><?php echo e($c->cate_name); ?></a>
			</div>
			<div class='sub-title'>
				<div class='sub-title-ul'>
					<?php $__currentLoopData = $c->subcate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<div class='sub-title-li'><a href="<?php echo e(url('danh-sach/'.$c->cate_namekd.'/'.$sc->subcate_namekd)); ?>" ><?php echo e($sc->subcate_name); ?>  | </a></div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				</div>
			</div>
		</div>
		<img src='upload/cate/<?php echo e($c->cate_img); ?>'>
		<div class='pro'>
			<div class='pros'>
				<ul class='pro-ul'>
					<?php $productArray = []; ?>
					<?php $__currentLoopData = $c->subcate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<?php $__currentLoopData = $s->product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<?php 
						$productArray[] = $p->toArray();
					
					?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					<?php 
						uasort($productArray,'cmp');
					?>
					<?php 
					$i=0;
					foreach($productArray as $p){ 
					?>
						<li class='pro-li'>
							<a class='pro-a' href="<?php echo e(url('item/'.$p['product_namekd'])); ?>" title='<?php echo e($p['product_namekd']); ?>'>
								<img class='pro-img' src='upload/product/<?php echo e($p['product_img']); ?>'>
								<img class='sale-value-img' <?php if ($p['product_salevalue']==0) {
										echo "style='display:none;'";
									} ?>src='template_asset/images/site/pro/sale-img.png'>
								<span class='sale-value-txt'
									<?php if ($p['product_salevalue']==0) {
										echo "style='display:none;'";
									} ?>
								><?php echo e($p['product_salevalue']); ?>%</span>
								<?php
								$phantram = ($p['product_salevalue'])/100;
								$tiensale = ($p['product_price'])*$phantram;
								$price=($p['product_price'])-$tiensale ?>
								<div id="pro-price3">
									<?php echo e(number_format($price,0,",",".")); ?> đ
								</div>

								<span class='pro-price2' <?php if ($p['product_salevalue']==0) {
										echo "style='display:none;'";
									} ?>>
									<?php echo e(number_format($p['product_price'],0,",",".")); ?> đ
								</span>
								<span class='pro-name' title=''><?php echo e($p['product_name']); ?></span>
								<?php
									if ($p['product_status'] == 1) {
										 echo "<span class='pro-sale-info' title='' style='color:#68EE60'><img src='template_asset/images/site/pro/cart.png'>  Hàng mới về</span>";
									}
									if ($p['product_status'] == 2) {
										echo "<span class='pro-sale-info' title='' style='color:#68EE60'><img src='template_asset/images/site/pro/cart.png'>  Còn hàng</span>";
									}
									if ($p['product_status'] == 3) {
										echo "<span class='pro-sale-info' title=''><img src='template_asset/images/site/pro/telephone.png'>  Liên hệ</span>";
									}
								 ?>
							</a>
						</li>
					<?php 
						$i++;
						if($i ==10){
							break;
						}
					}
					?>
					
				</ul>
			</div>
			<!--<div class='pro-banner'><img src='upload/cate/<?php echo e($c->id); ?>.png'></div>-->
		</div>
	</div>
	<div style="clear: both;"></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
