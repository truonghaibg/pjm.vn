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
                <h1 class="page-header">Bài viết
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
                        <th>Tiêu đề</th>
                        <th>Danh mục</th>
                        <th>Chuyên mục</th>
                        <th>Tóm tắt</th>
                        <th>View</th>
                        <th>Hot</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo e($p->id); ?></td>
                        <td><?php echo e($p->post_title); ?></td>
                        <td><?php echo e($p->subcate->cate->cate_name); ?></td>
                        <td><?php echo e($p->subcate->subcate_name); ?></td>
                        <td><?php echo e($p->post_sum); ?></td>
                        <td><?php echo e($p->post_view); ?></td>
                        <td>
                            <?php if($p->post_high == "1"): ?>
                                Có
                                <?php else: ?> Không
                            <?php endif; ?>
                        </td>
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/post/del/<?php echo e($p->id); ?>" onclick="return kiemtra();"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/post/edit/<?php echo e($p->id); ?>">Thêm</a></td>
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