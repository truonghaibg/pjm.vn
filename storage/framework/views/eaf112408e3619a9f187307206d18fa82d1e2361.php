<?php $__env->startSection('content'); ?>
<br/>
<div class="news">
  <div class="content_news_page">
    <h1>Tin tức mới</h1>
      <br />
    <div class="content_detail">
        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

        <div class="post-holder post-holder-591">
	        <div class="post-holder-image">
		        <div class="post-ftimg-hld">
                    <a href="<?php echo e(url('/')); ?>/tin-tuc/<?php echo e($item->titlekd); ?>" alt="<?php echo e($item->title); ?>">
                        <img style="width: 90%;" src="<?php echo e(url('/')); ?>/upload/news/<?php echo e($item->img); ?>" alt="" />
                    </a>
                </div>
        	</div>
	        <div class="post-holder-right">
		        <div class="post-header">
			        <div class="post-title-holder clearfix">
				        <h2 class="post-title">
                            <a class="post-item-link" href="<?php echo e(url('/')); ?>/tin-tuc/<?php echo e($item->titlekd); ?>">
                                <?php echo $item->title; ?>
                            </a>
				        </h2>
			        </div>
		        </div>

		        <div class="post-content">
			        <div class="post-description clearfix">
				        <div class="post-text-hld clearfix">
							<?php echo $item->sum; ?> ... <a class="post-read-more" href="<?php echo e(url('/')); ?>/tin-tuc/<?php echo e($item->titlekd); ?>" title="<?php echo e($item->title); ?>">
                            Đọc tiếp »
                        </a>
                        </div>
                       
			        </div>
		        </div>
				<br />
		        <div class="post-footer">
                    <div class="post-info clear">
                        <div class="item post-posed-date">
                            <span class="label">Ngày đăng:</span>
                            <span class="value"><?php echo e($item->created_at->format('d/m/Y')); ?></span>
                        </div>
                        <br />
						<br />
                        <div class="item post-categories">
                            <span class="label">Tags:</span>
                            <?php $__currentLoopData = $item->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <a title="<?php echo e($tag->name); ?>" href="#"> <?php echo e($tag->name); ?></a>,
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                          </div>
                     </div>
                </div>
	        </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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