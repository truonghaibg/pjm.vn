@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    {{$title}}<small> Danh sách</small>
                </h1>
            </div>
            <div class="col-lg-12" style="padding-bottom:120px">
                <form action="{{url($store_route)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if(count($errors))
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Chuyên mục</label>
                                <select class="form-control" name="subcate_id" id="subcate_id">
                                    @foreach($subcate as $ct)
                                        <option value="{{$ct->id}}">{{$ct->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Hãng</label>
                                <select class="form-control" name="nsx_id" id="nsx_id">
                                    @foreach($nsx as $sc)
                                        <option value="{{$sc->id}}">{{$sc->nsx_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Sản phẩm đề xuất</label>
                            <input class="form-check-input" type="checkbox" value="1"  name="is_suggest">
                        </div>
                        <div class="col-md-2">
                            <label>Sản phẩm mới</label>
                            <input class="form-check-input" type="checkbox" value="1"  name="is_new">
                        </div>
                        <div class="col-md-2">
                            <label>Sản phẩm bán chạy</label>
                            <input class="form-check-input" type="checkbox" value="1"  name="is_sale">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="title" placeholder="Điền Tên sản phẩm" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Model sản phẩm</label>
                                <input class="form-control" name="product_model" placeholder="Điền Model sản phẩm" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <label class="radio-inline">
                                    <input name="status" value="1" checked="" type="radio">Hàng mới về
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="2" type="radio">Còn hàng
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="3" type="radio">Liên hệ
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" name="price" placeholder="Điền giá sản phẩm" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Phần trăm giảm giá</label>
                                <input class="form-control" name="product_salevalue" placeholder="Điền Phần trăm giảm giá" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input class="form-control" multiple="multiple" type="file" name="image"  />
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <input class="form-control" multiple="multiple" type="file" name="image01"  />
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <input class="form-control" multiple="multiple" type="file" name="image02"  />
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <input class="form-control" multiple="multiple" type="file" name="image03"  />
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <input class="form-control" multiple="multiple" type="file" name="image04"  />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Thông tin sản phẩm</label>
                                <textarea class="form-control summernote" rows="5" name="product_info"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="control-label">Meta keywords</label>
                                <input type="text" class="form-control" name="meta_keywords">
                                <div class="text-block">
                                    @if($errors->has('meta_keywords'))
                                        <p style="color:red">{{$errors->first('meta_keywords')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="control-label">Meta description</label>
                                <input type="text" class="form-control" name="meta_description">
                                <div class="text-block">
                                    @if($errors->has('meta_description'))
                                        <p style="color:red">{{$errors->first('meta_description')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <a href="{{url($back_route)}}" class="btn btn-default">Quay lại</a>
                                <button type="submit" class="btn btn-default">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
