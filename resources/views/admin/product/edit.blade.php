@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>{{$product->product_name}}</small>
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
                             value="{{$ct->id}}">{{$ct->subcate_name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hãng</label>
                        <select class="form-control" name="nsx_id" id="nsx_id">
                          @if($product->nsx_id == 0)
                          <option value="0" selected>KHông thuộc hãng nào</option>
                          @foreach($nsx as $sc)
                            <option value="{{$sc->id}}">{{$sc->nsx_name}}</option>
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
                        <input class="form-control" name="product_name" value="{{$product->product_name}}" />
                    </div>

                    <div class="form-group">
                        <label>Model sản phẩm</label>
                        <input class="form-control" name="product_model" value="{{$product->product_model}}" />
                    </div>

                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="product_status" value="1" type="radio"
                            @if($product->product_status == 1)
                                    {{"checked"}}
                                @endif
                            >Hàng mới về
                        </label>
                        <label class="radio-inline">
                            <input name="product_status" value="2" type="radio"
                            @if($product->product_status == 2)
                                    {{"checked"}}
                                @endif>Còn hàng
                        </label>
                        <label class="radio-inline">
                            <input name="product_status" value="3" type="radio"
                            @if($product->product_status == 3)
                                    {{"checked"}}
                                @endif>Liên hệ
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" name="product_price" value="{{$product->product_price}}" />
                    </div>
                    <div class="form-group">
                        <label>Phần trăm giảm giá</label>
                        <input class="form-control" name="product_salevalue" value="{{$product->product_salevalue}}" />
                    </div>
                    <div class="form-group">
                        <label>Ảnh sản phẩm</label>
                        <p>
                            <img width="200px" src="upload/product/{{$product->product_img}}" alt="">
                        </p>
                        <input class="form-control" type="file" name="product_img" />
                    </div>
                    <div class="form-group">
                        <label>Tag sản phẩm</label>
                        <input class="form-control" name="product_tag" value="{{$product->product_tag}}" />
                    </div>
                    <div class="form-group">
                        <label>Thông tin sản phẩm</label>
                        <textarea class="form-control summernote" rows="5" name="product_info">{{$product->product_info}}</textarea>
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
