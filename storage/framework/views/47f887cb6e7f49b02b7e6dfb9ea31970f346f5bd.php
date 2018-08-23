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
                <h1 class="page-header">Sản phẩm
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
                        <th>Model</th>
                        <th>Hãng</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                        <th>Thông tin</th>
                        <th>Giảm giá %</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo e($p->id); ?></td>
                        <td><?php echo e($p->product_name); ?></td>
                        <td><?php echo e($p->product_model); ?></td>
                        <?php if(($p->nsx_id)==0): ?>
                            <td>None</td>
                        <?php else: ?><td><?php echo e($p->nsx->nsx_name); ?></td>
                        <?php endif; ?>

                        <td><?php echo e($p->product_price); ?></td>
                        <td>
                            <?php if($p->product_status == "1"): ?>
                                Hàng mới về
                            <?php endif; ?>
                            <?php if($p->product_status == "2"): ?>
                                Còn hàng
                            <?php endif; ?>
                            <?php if($p->product_status == "3"): ?>
                                Liên hệ
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($p->product_tag); ?></td>
                        <td><?php echo e($p->product_salevalue); ?></td>
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/product/del/<?php echo e($p->id); ?>" onclick="return kiemtra();"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/<?php echo e($p->id); ?>">Sửa</a></td>
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