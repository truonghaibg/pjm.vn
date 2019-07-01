@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>{{$product->title}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif

            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
                <form action="admin/product/edit/{{$product->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Chuyên mục</label>
                        <select class="form-control" name="subcate_id" id="subcate_id">
                        @foreach($subcate as $ct)
                            <option
                            @if($product->subcate_id == $ct->id)
                                {{"selected"}}
                            @endif
                             value="{{$ct->id}}"> {{$ct->cate_id}} - {{$ct->title}}</option>
                        @endforeach
                        </select>
                    </div>
					<div class="form-group">
                        <label>Đề xuất</label>
                        <input class="form-check-input" type="checkbox" value="1"  name="is_suggest" <?php if($product->is_suggest == 1){ ?>checked<?php } ?>>
                    </div>
                    <div class="form-group">
                        <label>Hãng</label>
                        <select class="form-control" name="nsx_id" id="nsx_id">
                          @if($product->nsx_id == 0)
                          <option value="0" selected>KHông thuộc hãng nào</option>
                          @foreach($nsx as $sc)
                            <option value="{{$sc->id}}">{{$sc->subcate_id}} - {{$sc->nsx_name}}</option>
                          @endforeach
                          @endif
                          <option value="0">Không thuộc hãng nào</option>
                          @foreach($nsx as $sc)
                          @if($product->nsx_id != 0)

                              <option
                              @if($product->nsx_id == $sc->id)
                                  {{"selected"}}
                              @endif
                               value="{{$sc->id}}">{{$sc->nsx_name}}
                             </option>
                          @endif
                          @endforeach


                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="title" value="{{$product->title}}" />
                    </div>

                    <div class="form-group">
                        <label>Model sản phẩm</label>
                        <input class="form-control" name="product_model" value="{{$product->product_model}}" />
                    </div>

                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="status" value="1" type="radio"
                            @if($product->status == 1)
                                    {{"checked"}}
                                @endif
                            >Hàng mới về
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="2" type="radio"
                            @if($product->status == 2)
                                    {{"checked"}}
                                @endif>Còn hàng
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="3" type="radio"
                            @if($product->status == 3)
                                    {{"checked"}}
                                @endif>Liên hệ
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" name="price" value="{{$product->price}}" />
                    </div>
                    <div class="form-group">
                        <label>Phần trăm giảm giá</label>
                        <input class="form-control" name="product_salevalue" value="{{$product->product_salevalue}}" />
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
										<div class="image_block" id="image-{{$image->id}}">
											<p>
												<button type="button" class="remove_image" onclick="removeImage({{$image->id}})"><i class="fa fa-trash-o  fa-fw"></i><button>
												<img width="200px" src="upload/product/{{$image->name}}" alt="">
												<input class="form-control" multiple="multiple" type="file" name="product_img[{{$i}}]"  />
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
											<input class="form-control" multiple="multiple" type="file" name="product_img[{{$i}}]"  />
										</p>
									</div>	
							<?php	} 
							$i++;
							}
							?>
							
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
                        <input class="form-control" name="product_tag" value="{{$product->product_tag}}" />
                    </div>
                    <div class="form-group">
                        <label>Thông tin sản phẩm</label>
                        <textarea class="form-control summernote" rows="5" name="product_info">{{$product->product_info}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Meta keywords</label>
                        <input class="form-control" name="meta_keywords" value="{{$product->meta_keywords}}" />
                    </div>

                    <div class="form-group">
                        <label>Meta description</label>
                        <input class="form-control" name="meta_description" value="{{$product->meta_description}}" />
                    </div>

                    <a href="{{URL::previous()}}" class="btn btn-default">Quay lại</a>
                    <button type="submit" class="btn btn-default">Cập nhật</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
@section('script')
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
@endsection
