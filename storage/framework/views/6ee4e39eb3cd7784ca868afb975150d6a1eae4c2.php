<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small><?php echo e($product->product_name); ?></small>
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
                <form action="admin/product/edit/<?php echo e($product->id); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                    <div class="form-group">
                        <label>Chuyên mục</label>
                        <select class="form-control" name="subcate_id" id="subcate_id">
                        <?php $__currentLoopData = $subcate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <option
                            <?php if($product->subcate_id == $ct->id): ?>
                                <?php echo e("selected"); ?>

                            <?php endif; ?>
                             value="<?php echo e($ct->id); ?>"><?php echo e($ct->subcate_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hãng</label>
                        <select class="form-control" name="nsx_id" id="nsx_id">
                          <?php if($product->nsx_id == 0): ?>
                          <option value="0" selected>KHông thuộc hãng nào</option>
                          <?php $__currentLoopData = $nsx; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <option value="<?php echo e($sc->id); ?>"><?php echo e($sc->nsx_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                          <?php endif; ?>
                          <option value="0">Không thuộc hãng nào</option>
                          <?php $__currentLoopData = $nsx; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <?php if($product->nsx_id != 0): ?>

                              <option
                              <?php if($product->nsx_id == $sc->id): ?>
                                  <?php echo e("selected"); ?>

                              <?php endif; ?>
                               value="<?php echo e($sc->id); ?>"><?php echo e($sc->nsx_name); ?>

                             </option>
                          <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="product_name" value="<?php echo e($product->product_name); ?>" />
                    </div>

                    <div class="form-group">
                        <label>Model sản phẩm</label>
                        <input class="form-control" name="product_model" value="<?php echo e($product->product_model); ?>" />
                    </div>

                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="product_status" value="1" type="radio"
                            <?php if($product->product_status == 1): ?>
                                    <?php echo e("checked"); ?>

                                <?php endif; ?>
                            >Hàng mới về
                        </label>
                        <label class="radio-inline">
                            <input name="product_status" value="2" type="radio"
                            <?php if($product->product_status == 2): ?>
                                    <?php echo e("checked"); ?>

                                <?php endif; ?>>Còn hàng
                        </label>
                        <label class="radio-inline">
                            <input name="product_status" value="3" type="radio"
                            <?php if($product->product_status == 3): ?>
                                    <?php echo e("checked"); ?>

                                <?php endif; ?>>Liên hệ
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" name="product_price" value="<?php echo e($product->product_price); ?>" />
                    </div>
                    <div class="form-group">
                        <label>Phần trăm giảm giá</label>
                        <input class="form-control" name="product_salevalue" value="<?php echo e($product->product_salevalue); ?>" />
                    </div>
                    <div class="form-group">
                        <label>Ảnh sản phẩm</label>
						<div class="form-group">
							<?php 
							$i =1;
							while($i < 6){ 
								$hasImage = false;
								foreach($images as $image){
									if(isset($image->sort) && $i == $image->sort){ ?>
										<div class="image_block" id="image-<?php echo e($image->id); ?>">
											<p>
												<button type="button" class="remove_image" onclick="removeImage(<?php echo e($image->id); ?>)"><i class="fa fa-trash-o  fa-fw"></i><button>
												<img width="200px" src="upload/product/<?php echo e($image->name); ?>" alt="">
												<input class="form-control" multiple="multiple" type="file" name="product_img[<?php echo e($i); ?>]"  />
											</p>
										</div>	
							<?php	
									$hasImage = true;
									}  
							?>		
							<?php	
								}
								if(!$hasImage){ ?>
									<div class="image_block" >
										<p>
											<input class="form-control" multiple="multiple" type="file" name="product_img[<?php echo e($i); ?>]"  />
										</p>
									</div>	
							<?php	} 
							$i++;
							}
							?>
							
							<!--
							/*
							
								*/
							-->
							<script>
								// remove image  by ajax
								// sau khi remove .Chuyen tat ca len truoc.tao ra block phia sau
								function removeImage(image_id) {
									var baseAdminUrl = $('#baseAdminUrl').val();
									$.ajax({
										type: 'GET',
										url: baseAdminUrl + "/ajax/remove-product-image/"+image_id,
										success: function (rs) {
											$("#image-"+image_id+" .remove_image").remove();
											$("#image-"+image_id+" img").remove();
										}
									});	
								}
							</script>
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
                        <input class="form-control" name="product_tag" value="<?php echo e($product->product_tag); ?>" />
                    </div>
                    <div class="form-group">
                        <label>Thông tin sản phẩm</label>
                        <textarea class="form-control summernote" rows="5" name="product_info"><?php echo e($product->product_info); ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-default">Sửa sản phẩm</button>
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