<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Sửa tin</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
            <?php if(count($errors)>0): ?>
                <div class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php echo e($err); ?><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
            <?php endif; ?>

            <?php if(session('thongbao')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('thongbao')); ?>

                </div>
            <?php endif; ?>
                <form action="admin/news/edit/<?php echo e($news->id); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                    <div class="form-group">

                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="title" placeholder="Điền Tiêu đề" value="<?php echo e($news->title); ?>" />
                        </div>
						<div class="form-group">
                        <label>Danh mục</label>
                        <select  class="form-control" name="category" >
							<option value="0" <?php if($news->news_category_id == 0){ ?>  selected="selected" <?php } ?>>Danh mục bài viết cố định</option>
                            <?php $__currentLoopData = $newsCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<option value="<?php echo e($item->id); ?>" <?php if($news->news_category_id == $item->id){ ?>  selected="selected" <?php } ?>><?php echo e($item->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                    </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <p>
                                <img width="200px" src="upload/news/<?php echo e($news->img); ?>" alt="">
                            </p>
                            <input class="form-control" type="file" name="img" />
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <?php
                            $oldTagString = "";
                            foreach($tagArray as $oldTag){
                                $oldTagString = $oldTagString.$oldTag.',';
                            }
                            if(strlen ($oldTagString) > 0){
                                $oldTagString = substr($oldTagString,0, -1);
                            }
                            ?>
                            <input class="form-control" name="tags" id="mySingleField" value=" <?php echo $oldTagString; ?>" readonly="readonly">
                             <script>
                                 var country_list = new Array();
                                 <?php
                                 foreach($tags as $item){ ?>

                                 country_list.push("<?php echo $item->name; ?>");

                                 <?php
                                 }
                                 ?>
                             </script>
                            <br/>
                            <ul class="form-control" id="singleFieldTags"></ul>
                            <link rel="stylesheet" href="<?php echo e(url("/")); ?>/jquery-ui.css">
                            <link rel="stylesheet" href="<?php echo e(url("/")); ?>/jquery.tagit.css" >
                        </div>
                        <br/>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control summernote" rows="5" name="content"><?php echo e($news->content); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea class="form-control" name="sum"><?php echo e($news->sum); ?></textarea>
                        </div>

                        <a href="<?php echo e(URL::previous()); ?>" class="btn btn-default">Quay lại</a>
                        <button type="submit" class="btn btn-default">Cập nhật</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            $('.summernote').summernote();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>