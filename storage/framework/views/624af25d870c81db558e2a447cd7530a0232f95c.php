<div id="menu">
   <div class="header3">
         <ul>
            <li class="danhmuc">
               <a href="javascript:void(0)" id="main_menu">DANH MỤC SẢN PHẨM</a>
            </li>
            <li class="toplink">
               <a href="<?php echo e(url('tin-tuc/khuyen-mai')); ?>">
                   Khuyền mãi
               </a>
            </li>
            <li class="toplink">
               <a href="<?php echo e(url('tin-tuc/chinh-sach-bao-hanh')); ?>">
                    Hình ảnh dự án
               </a>
            </li>
            <li class="toplink">
               <a href="<?php echo e(url('tin-tuc')); ?>">
                  Tin tức
               </a>
            </li>
         </ul>
      </div>
  <div style="clear: both;"></div>
    <ul id="mainmenu" class="ul1" style="<?php if (Route::getCurrentRoute()->uri() == '/') { ?> display: block;position: relative !important <?php } else { ?> display: none;position: absolute !important; z-index:999 <?php } ?>">
        <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <li class="sub1">
            <a class='a1' href="<?php echo e(url('danh-sach/'.$c->cate_namekd)); ?>" style="padding: 13px 5px">
                <img src='template_asset/images/site/flyout/<?php echo e($c->cate_name); ?>.png' alt='' />
                <span class=''><?php echo e($c->cate_name); ?></span>
                <img class="arow" src="template_asset/images/site/flyout/forward2.png" alt="" />
            </a>
            <ul class="ul2">
                <?php $__currentLoopData = $c->subcate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li class="sub2">
                    <a class='a2' href="<?php echo e(url('danh-sach/'.$c->cate_namekd.'/'.$sc->subcate_namekd)); ?>">
                        <span><?php echo e($sc->subcate_name); ?></span>
                    </a>
                    <ul class='ul3'>
                        <?php $__currentLoopData = $sc->nsx; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nsx): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li class='sub3'>
                            <a class='a3' href="<?php echo e(url('danh-sach/'.$c->cate_namekd.'/'.$sc->subcate_namekd.'/'.$nsx->nsx_namekd)); ?>">
                                <span>
                                    <?php echo e($nsx->nsx_name); ?>

                                    </span>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ul>
    <?php if (Route::getCurrentRoute()->uri() != '/') { ?>
    <script>

        $(document).ready(function () {
           $("#main_menu").click(function() {
				$( ".ul1" ).slideToggle( "slow", function() {});
			});
        })
       
    </script>
    <?php } ?>
    <?php if (Route::getCurrentRoute()->uri() == '/') { ?>
    <div class="slider theme-default">
        <div id="slider" class="nivoSlider" style="height: 332px">
			<?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <a href="<?php echo e($item->link); ?>" target="_blank">
                <img src="<?php echo e(url('/')); ?>/upload/slider/<?php echo e($item->image); ?>" />
            </a>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
    </div>
    <div class="baner-fly">
        <a href="<?php echo e(url('')); ?>" target="_blank">
            <img src="<?php echo e(url('/')); ?>/upload/slider/image_0.jpg" alt="" />
        </a>
    </div>
    <div class="video-news">
		<?php 
			$codes = explode("/", $video->link);
			$code = $codes[count($codes)- 1];
		?>
        <iframe width="300" height="160" src="https://www.youtube.com/embed/<?php echo e(str_replace("watch?v=", "",$code )); ?>" frameborder="0" allowfullscreen></iframe>
    </div>
    <?php } ?>
</div>
<div style="clear: both;"></div>
