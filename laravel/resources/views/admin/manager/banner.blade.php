@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Manager
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
				
			@if(isset($success))
				<div class="alert alert-success">
					Đã cập nhật
				</div>
			@endif

			<form action="{{url('/')}}/admin/manager/banner" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<table class="table table-striped table-bordered table-hover" >
					<thead>
						<tr align="center">
							<th>ID</th>
							<th>Banner Trái</th>
							<th>Banner Phải</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
						<tr class="odd gradeX" align="center">
							<td>{{$banner->id}}</td>
							<td>
								<div class="row">
									<div class="col-md-3">
										<img width="50px" src="upload/banner/{{$banner->bannerleft}}" enctype="multipart/form-data">
									</div>
									<div class="col-md-9">
										<div class="form-group">
											<input class="form-control" multiple="multiple" type="file" name="bannerleft"  />
										</div>
										<div class="form-group">
											<label>Hiện trang chủ:</label>
											<input type="checkbox" name="left_isenable" value="1" <?php if($banner->left_isenable ==1) { ?> checked="checked"<?php } ?> />
										</div>
										<div class="form-group">
											<label>Đường dẫn đến:</label>
											<input class="form-control" type="text" value="<?php if(isset($banner->lefturl) && $banner->lefturl != ""){ echo $banner->lefturl; } ?>"  name="lefturl" >
										</div>
									</div>
								</div>
							</td>
							<td>
								<div class="row">
									<div class="col-md-3">
										<img width="50px" src="upload/banner/{{$banner->bannerright}}" alt="">
									</div>
									<div class="col-md-9">
										<div class="form-group">
											<input class="form-control" multiple="multiple" type="file" name="bannerright"  />
										</div>
										<div class="form-group">
											<label>Hiện trang chủ:</label>
											<input type="checkbox" name="right_isenable" value="1" <?php if($banner->right_isenable ==1) { ?> checked="checked" <?php } ?> />
										</div>
										<div class="form-group">
											<label>Đường dẫn đến :</label>
											<input class="form-control" type="text" value="<?php if(isset($banner->righturl) && $banner->righturl != ""){ echo $banner->righturl; } ?>"  name="righturl" >
										</div>
									</div>
								</div>
							
								
								
								<span>Hiện trang chủ: </span>
							</td>
							<td class="center">
								<input type="hidden" name="update" value="update" />
								<button type="submit" class="btn btn-outline-warning btn-success">Cập nhật</button>
							</td>
						</tr>
					
					</tbody>
				</table>
			</form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
