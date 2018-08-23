<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Thêm mới</small>
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
                <form action="admin/product/add" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                    <div class="form-group">
                        <label>Chuyên mục</label>
                        <select class="form-control" name="subcate_id" id="subcate_id">
                        <?php $__currentLoopData = $subcate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <option value="<?php echo e($ct->id); ?>"><?php echo e($ct->subcate_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hãng</label>
                        <select class="form-control" name="nsx_id" id="nsx_id">
                        <?php $__currentLoopData = $nsx; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <option value="<?php echo e($sc->id); ?>"><?php echo e($sc->nsx_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="product_name" placeholder="Điền Tên sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Model sản phẩm</label>
                        <input class="form-control" name="product_model" placeholder="Điền Model sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="product_status" value="1" checked="" type="radio">Hàng mới về
                        </label>
                        <label class="radio-inline">
                            <input name="product_status" value="2" type="radio">Còn hàng
                        </label>
                        <label class="radio-inline">
                            <input name="product_status" value="3" type="radio">Liên hệ
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" name="product_price" placeholder="Điền giá sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Phần trăm giảm giá</label>
                        <input class="form-control" name="product_salevalue" placeholder="Điền Phần trăm giảm giá" />
                    </div>

                    <div class="form-group">
                        <label>Ảnh sản phẩm</label>
                        <div class="form-group">
							<?php 
							$i =1;
							while($i < 6){ ?>
								
									<div class="image_block" >
										<p>
											<input class="form-control" multiple="multiple" type="file" name="product_img[<?php echo e($i); ?>]"  />
										</p>
									</div>	
							<?php
							$i++;							
							}
							?>

							<style>
								.image_block {
									width: 19%;
									foat: left;
									padding: 10px;
									display: inline-block;
									position: relative;
								}
								.remove_image {
									position : absolute;
									top:0;
									right:20px
								}
							</style>
							
						</div>
                    </div>

                    <div class="form-group">
                        <label>Tag sản phẩm</label>
                        <input class="form-control" name="product_tag" placeholder="Điền tag sản phẩm" />
                    </div>

                    <div class="form-group">
                        <label>Thông tin sản phẩm</label>
                        <textarea class="form-control summernote" rows="5" name="product_info"></textarea>
                    </div>


                    <button type="submit" class="btn btn-default">Thêm sản phẩm</button>
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
            $("#subcate_id").change(function(){
                var subcate_id = $(this).val();
                $.get("admin/ajax/nsx/"+subcate_id,function(data){
                    $("#nsx_id").html(data);
                });
            });
            $('.summernote').summernote();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>