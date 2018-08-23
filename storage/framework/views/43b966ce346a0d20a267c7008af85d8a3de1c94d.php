<?php $__env->startSection('content'); ?>
<div class='product'>
  <div class='pro-title'>
      <div class='title-name'>
          <img class='logo-pro-title' src='template_asset/images/site/pro/cd.png' alt=''>
          <h3><?php echo e($cate2->cate_name); ?></h3>

      </div>

        <div class='sub-title'>
          <div class='sub-title-ul'>
            <?php $__currentLoopData = $subcate3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <div class='sub-title-li'><a href="<?php echo e(url('danh-sach/'.$cate2->cate_namekd.'/'.$sc->subcate_namekd)); ?>"><?php echo e($sc->subcate_name); ?>  | </a></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          </div>
        </div>

    </div>
    <img src='upload/cate/<?php echo e($cate2->cate_img); ?>'>
    <div class="sortby">
    <div class="sort_pro">
      <span>Sắp xếp sản phẩm <span class="bg icon_drop"></span> </span>
      <ul>
        <li><a href="<?php echo e(url('danh-sach/'.$cate2->cate_namekd.'/sapxep/sort=new')); ?>" rel="nofollow">Mới nhất</a> </li>
        <li><a href="<?php echo e(url('danh-sach/'.$cate2->cate_namekd.'/sapxep/sort=price-asc')); ?>" rel="nofollow">Giá: thấp -&gt; cao</a> </li>
        <li><a href="<?php echo e(url('danh-sach/'.$cate2->cate_namekd.'/sapxep/sort=price-desc')); ?>" rel="nofollow">Giá: cao -&gt; thấp</a> </li>
        <li><a href="<?php echo e(url('danh-sach/'.$cate2->cate_namekd.'/sapxep/sort=name')); ?>" rel="nofollow">Tên A-&gt;Z</a> </li>
      </ul>
    </div>
      
    </div>
    <div class='pro'>
      <div class='pros'>
        <ul class='pro-ul'>
        <?php if(isset($product_sapxep)): ?>
          <?php $__currentLoopData = $product_sapxep; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

            <li class='pro-li'>
                <a class='pro-a' href="<?php echo e(url('item/'.$p->product_namekd)); ?>" target'_blank' title='<?php echo e($p->product_namekd); ?>'>
                  <img class='pro-img' src='upload/product/<?php echo e($p->product_img); ?>'>
                  <img class='sale-value-img' <?php if ($p->product_salevalue==0) {
                      echo "style='display:none;'";
                    } ?>src='template_asset/images/site/pro/sale-img.png'>
                  <span class='sale-value-txt' 
                    <?php if ($p->product_salevalue==0) {
                      echo "style='display:none;'";
                    } ?>
                  ><?php echo e($p->product_salevalue); ?>%</span>
                  
                  <?php
                  $phantram = ($p->product_salevalue)/100;
                  $tiensale = ($p->product_price)*$phantram;
                  $price=($p->product_price)-$tiensale ?>

                  <div id="pro-price3">
                  <?php $__empty_1 = true; $__currentLoopData = str_split(number_format($price,0)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
                    <?php
                      switch ($p1) {
                        case ',':
                          ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/x42.png')); ?>" alt=""></span><?php
                          break;
                        case '0':
                          # code...
                          ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/0x42.png')); ?>" alt=""></span><?php
                          break;
                        case '1':
                          # code...
                          ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/1x42.png')); ?>" alt=""></span><?php
                          break;

                        case '2':
                          # code...
                          ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/2x42.png')); ?>" alt=""></span><?php
                          break;

                        case '3':
                          # code...
                          ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/3x42.png')); ?>" alt=""></span><?php
                          break;

                        case '4':
                          # code...
                          ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/4x42.png')); ?>" alt=""></span><?php
                          break;

                        case '5':
                          # code...
                          ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/5x42.png')); ?>" alt=""></span><?php
                          break;

                        case '6':
                          # code...
                          ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/6x42.png')); ?>" alt=""></span><?php
                          break;

                        case '7':
                          # code...
                          ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/7x42.png')); ?>" alt=""></span><?php
                          break;

                        case '8':
                          # code...
                          ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/8x42.png')); ?>" alt=""></span><?php
                          break;
                        case '9':
                          # code...
                          ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/9x42.png')); ?>" alt=""></span><?php
                          break;


                        default:
                          # code...
                          break;
                      }
                     ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                  <?php endif; ?>
                  </div>
                  <span class='pro-price2'><?php echo e(number_format($p->product_price,0,",",".")); ?></span>
                  <span class='pro-name' title=''><?php echo e($p->product_name); ?></span>
                  <span class='pro-info' title=''><?php echo e($p->product_tag); ?></span>
                  <?php
                    if ($p->product_status == 1) {
                       echo "<span class='pro-sale-info' title='' style='color:#68EE60'><img src='template_asset/images/site/pro/cart.png'>  Hàng mới về</span>";
                    }
                    if ($p->product_status == 2) {
                      echo "<span class='pro-sale-info' title='' style='color:#68EE60'><img src='template_asset/images/site/pro/cart.png'>  Còn hàng</span>";
                    }
                    if ($p->product_status == 3) {
                      echo "<span class='pro-sale-info' title=''><img src='template_asset/images/site/pro/telephone.png'>  Liên hệ</span>";
                    }
                   ?>
                </a>
              </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php else: ?>
          <?php $__currentLoopData = $subcate3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <?php $__currentLoopData = $sc->product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <li class='pro-li'>
                  <a class='pro-a' href="<?php echo e(url('item/'.$p->product_namekd)); ?>" target'_blank' title='<?php echo e($p->product_namekd); ?>'>
                    <img class='pro-img' src='upload/product/<?php echo e($p->product_img); ?>'>
                    <img class='sale-value-img' src='template_asset/images/site/pro/sale-img.png'>
                    <span class='sale-value-txt'><?php echo e($p->product_salevalue); ?>%</span>
                    <?php
                    $phantram = ($p->product_salevalue)/100;
                    $tiensale = ($p->product_price)*$phantram;
                    $price=($p->product_price)-$tiensale ?>

                    <div id="pro-price3">
                    <?php $__empty_1 = true; $__currentLoopData = str_split(number_format($price,0)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
                      <?php
                        switch ($p1) {
                          case ',':
                            ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/x42.png')); ?>" alt=""></span><?php
                            break;
                          case '0':
                            # code...
                            ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/0x42.png')); ?>" alt=""></span><?php
                            break;
                          case '1':
                            # code...
                            ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/1x42.png')); ?>" alt=""></span><?php
                            break;

                          case '2':
                            # code...
                            ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/2x42.png')); ?>" alt=""></span><?php
                            break;

                          case '3':
                            # code...
                            ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/3x42.png')); ?>" alt=""></span><?php
                            break;

                          case '4':
                            # code...
                            ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/4x42.png')); ?>" alt=""></span><?php
                            break;

                          case '5':
                            # code...
                            ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/5x42.png')); ?>" alt=""></span><?php
                            break;

                          case '6':
                            # code...
                            ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/6x42.png')); ?>" alt=""></span><?php
                            break;

                          case '7':
                            # code...
                            ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/7x42.png')); ?>" alt=""></span><?php
                            break;

                          case '8':
                            # code...
                            ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/8x42.png')); ?>" alt=""></span><?php
                            break;
                          case '9':
                            # code...
                            ?><span><img class="pro-price3" src="<?php echo e(url('template_asset/images/site/pro/9x42.png')); ?>" alt=""></span><?php
                            break;


                          default:
                            # code...
                            break;
                        }
                       ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                    </div>
                    <span class='pro-price2'><?php echo e(number_format($p->product_price,0,",",".")); ?></span>
                    <span class='pro-name' title=''><?php echo e($p->product_name); ?></span>
                    <span class='pro-info' title=''><?php echo e($p->product_tag); ?></span>
                    <?php
                      if ($p->product_status == 1) {
                         echo "<span class='pro-sale-info' title='' style='color:#68EE60'><img src='template_asset/images/site/pro/cart.png'>  Hàng mới về</span>";
                      }
                      if ($p->product_status == 2) {
                        echo "<span class='pro-sale-info' title='' style='color:#68EE60'><img src='template_asset/images/site/pro/cart.png'>  Còn hàng</span>";
                      }
                      if ($p->product_status == 3) {
                        echo "<span class='pro-sale-info' title=''><img src='template_asset/images/site/pro/telephone.png'>  Liên hệ</span>";
                      }
                     ?>
                  </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endif; ?>
        
        </div>
      </div>
</div>
<div style="clear: both;"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>