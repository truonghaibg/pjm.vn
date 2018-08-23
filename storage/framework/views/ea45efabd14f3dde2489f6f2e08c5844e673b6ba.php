<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách Order
                    <small>Danh sách</small>
                    <a href="<?php echo e(url('export-order')); ?>" target="_blank">Tải xuống tất cả</a>
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
                        <th>Phương thức</th>
                        <th>Trạng thái</th>
                        <th>Sản phẩm/ Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Người mua/SĐT</th>
                        <th>Người nhận/SĐT/Địa chỉ</th>
                        <th style="display:none">Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
                    <tr class="odd gradeX" align="center">
                        <td style="color:red;"><?php echo number_format($p->id); ?></td>
                        <td>
                          <?php
                          switch ($p->payment_method) {
                                case 1:
                                    echo "Trực tiếp";
                                    break;
                                case 2:
                                    echo "COD";
                                    break;
                                case 3:
                                    echo "Chuyển khoản";
                                    break;
                                case 4:
                                    echo "Paypal";
                                    break;
                            } ?>
                        </td>
                        <td style="color:red; font-weight:bold;">
                          <?php
                          switch ($p->status) {
                                case 0:
                                    echo "CTT,chờ chuyển";
                                    break;
                                case 1:
                                    echo "CTT,đang chuyển";
                                    break;
                                case 2:
                                    echo "CTT,trả lại";
                                    break;
                                case 3:
                                    echo "ĐTT,không đạt";
                                    break;
                                case 4:
                                    echo "ĐTT,chờ chuyển";
                                    break;
                                case 5:
                                    echo "ĐTT,đang chuyển";
                                    break;
                                case 6:
                                    echo "ĐTT,đã chuyển";
                                    break;
                            } ?>
                        </td>
                        <td style="color:red; font-weight:bold;">
                          <?php
                           $model=explode(",",$p->product_id); $result=count($model);
                           $qty=explode(",",$p->qty);
                            $i=0;
                            while ($i < $result) {
                              $md=$model[$i];
                              $product = App\Product::where('product_model',$model[$i])->get();
                              foreach ($product as $row) {
                                echo "<a href='item/".$row->product_namekd."' target='_blank'>".$row->product_name."</a>";


                              }
                              $qt=$qty[$i];
                              echo " / ".$qt." sp";
                              echo "<br>";
                              $i++;
                            }
                           ?>

                        </td>
                        <td style="color:red;"><?php echo number_format($p->amount); ?> VNĐ</td>
                        <td><?php echo e($p->buyer_name); ?><br><?php echo e($p->buyer_tel); ?></td>
                        <td><?php echo e($p->ship_to_name); ?><br><?php echo e($p->ship_to_tel); ?><br><?php echo e($p->ship_to_address); ?></td>
                        <td class="center" style="display:none"><a href="admin/order/del/<?php echo e($p->id); ?>" onclick="return kiemtra();"> Delete</a></td>
                        <td class="center">
                          <a href="admin/order/edit/<?php echo e($p->id); ?>"><i class="fa fa-pencil fa-fw"></i></a><br>
                          <a href="<?php echo e(url('export-order/'.$p->id)); ?>" target="_blank"><i class="fa fa-download fa-fw"></i></a>
                        </td>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                        Không có order nào
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>