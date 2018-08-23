<?php $__env->startSection('content'); ?>
<div class="news">
  <div class="content_news_page">
    <h1><?php echo $new->title; ?></h1>
    <div class="time"><?php echo $new->updated_at; ?></div>
    <div class="content_detail">
      <?php echo $new->content; ?>
    </div>
  </div>
  <div class="content_right">
    <div class="box_left">
        <div class="title_box_left">Danh mục tin tức</div>
        <div class="content_box_left list_cat_news">
          <ul class="ul">
            <?php $__currentLoopData = $newsCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <li><a href="<?php echo e(url('danh-muc-tin-tuc/'.$item->id)); ?>"><?php echo e($item->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          </ul>
        </div>
    </div><!--box_left-->
  </div>
  
</div>
<div style="clear: both;"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>