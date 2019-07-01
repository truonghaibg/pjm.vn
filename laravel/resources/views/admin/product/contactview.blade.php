@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Liên hệ báo giá</h1>
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
                <form action="admin/product/product-contact-details/{{$productContact->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
					<div class="form-group">
                        <label>Sản phẩm</label>
                        <p><a href="{{url('/')}}/san-pham/{{$productContact->product->slug}}" ><?php echo $productContact->product->title; ?></a></p>
						<p><img src="{{url('/')}}/upload/product/{{$productContact->product->images[0]->name}}" style="width: 100px"  /></p>
						
					</div>
					<div class="form-group">
                        <label>Số lượng : {{$productContact->number}}</label>
                    </div>
					<div class="form-group">
                        <label>Số điện thoại liên hệ :</label>
						<input class="form-control" name="phone" value="{{$productContact->phone}}" type="text">
                    </div>
					<div class="form-group">
                        <label>Email:</label>
						<input class="form-control" name="email" value="{{$productContact->email}}" type="text">
                    </div>
                    <div class="form-group">
                        <label>Nội dung yêu cầu báo giá</label>
                        <div style="width:100%; border:1px solid  #ccc; padding: 15px;">
							<p>{{$productContact->content}}</p>
						</div>
                    </div>
					 <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-control" name="status" id="nsx_id">
							<option value="0" <?php if($productContact->status == 0){ ?>selected <?php } ?>>Mới</option>
							<option value="1" <?php if($productContact->status == 1){ ?>selected <?php } ?>>Chưa báo giá</option>
							<option value="2" <?php if($productContact->status == 2){ ?>selected <?php } ?>>Đã báo giá</option> 
                        </select>
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
