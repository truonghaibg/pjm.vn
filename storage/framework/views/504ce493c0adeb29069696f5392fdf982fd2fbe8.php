<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đối tác
                    <small>Sửa</small>
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
                <form action="admin/partners/edit/<?php echo e($partners->id); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                    <div class="form-group">

                    <div class="form-group">
                    <div class="form-group">
                        <label>Tên đối tác</label>
                        <input class="form-control" name="name" placeholder="Điền tên đối tác" value="<?php echo e($partners->name); ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <img style="width: 200px" src="<?php echo e(url('/')); ?>/upload/partners/<?php echo e($partners->logo); ?>" />
                        <input class="form-control" type="file" name="logo" />
                    </div>
					
					<br/>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control summernote" rows="5" name="description"><?php echo e($partners->description); ?></textarea>
                    </div>
                   <div class="form-group">
                        <label>Website</label>
                        <input class="form-control" name="link" placeholder="Website" value="<?php echo e($partners->link); ?>" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="address" placeholder="address" value="<?php echo e($partners->address); ?>" />
                    </div>
                    <div class="form-group">
                        <label>Điện thoại</label>
                        <input class="form-control" name="mobile_phone" placeholder="Điện thoại" value="<?php echo e($partners->mobile_phone); ?>" />
                    </div>



                    <button type="submit" class="btn btn-default">Sửa tin</button>
                    <button type="reset" class="btn btn-default">Viết lại</button>
                <form>
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