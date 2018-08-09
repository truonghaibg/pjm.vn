@extends('admin.layout.index')
@section('content')
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
                <form action="admin/product/add" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Chuyên mục</label>
                        <select class="form-control" name="subcate_id" id="subcate_id">
                        @foreach($subcate as $ct)
                            <option value="{{$ct->id}}">{{$ct->subcate_name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hãng</label>
                        <select class="form-control" name="nsx_id" id="nsx_id">
                        @foreach($nsx as $sc)
                            <option value="{{$sc->id}}">{{$sc->nsx_name}}</option>
                        @endforeach
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
                        <input class="form-control" type="file" name="product_img" />
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
