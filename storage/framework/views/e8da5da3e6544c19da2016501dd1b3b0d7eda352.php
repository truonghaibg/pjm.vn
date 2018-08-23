<?php $__env->startSection('content'); ?>
<script type="text/javascript">
function kiemtra () {
    // body...
    if (!window.confirm("DỮ LIỆU SẼ BỊ XÓA VĨNH VIỄN. BẠN CÓ MUỐN TIẾP TỤC?")) {
        return false;
    };
}
</script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đối tác
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <?php if(session('thongbao')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('thongbao')); ?>

                </div>
            <?php endif; ?>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Logo</th>
                        <th>Description</th>
                        <th>Website</th
                        <th>Địa chỉ</th>
                        <th>Điện thoại</th>
                        <th>Hành động</th>

                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo e($item->name); ?></td>
                        <td><img style="width: 100px;" src="<?php echo e(url('/')); ?>/upload/partners/<?php echo e($item->logo); ?>" /></td>
                        <td><?php echo e($item->description); ?></td>
                        <td><?php echo e($item->link); ?></td>
                        <td><?php echo e($item->address); ?></td>
                        <td><?php echo e($item->mobile_phone); ?></td>

                        <td class="center">
                            <i class="fa fa-trash-o fa-fw"></i><a href="admin/partners/del/<?php echo e($item->id); ?>" onclick="return kiemtra();"> Xóa</a>
                            <i class="fa fa-pencil fa-fw"></i> <a href="admin/partners/edit/<?php echo e($item->id); ?>">Sửa</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>