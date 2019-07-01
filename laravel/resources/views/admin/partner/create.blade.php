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
                                <label>Tên đối tác</label>
                                <input class="form-control" name="title" placeholder="Điền tên đối tác" />
                                <div class="text-block">
                                    @if($errors->has('title'))
                                        <p style="color:red">{{$errors->first('title')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input class="form-control" type="file" name="image" />
                                <div class="text-block">
                                    @if($errors->has('image'))
                                        <p style="color:red">{{$errors->first('image')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control summernote" rows="5" name="description"></textarea>
                                <div class="text-block">
                                    @if($errors->has('description'))
                                        <p style="color:red">{{$errors->first('description')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link" placeholder="Link" />
                                <div class="text-block">
                                    @if($errors->has('link'))
                                        <p style="color:red">{{$errors->first('link')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="address" placeholder="address" />
                                <div class="text-block">
                                    @if($errors->has('address'))
                                        <p style="color:red">{{$errors->first('address')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Điện thoại</label>
                                <input class="form-control" name="mobile" placeholder="Điện thoại" />
                                <div class="text-block">
                                    @if($errors->has('mobile'))
                                        <p style="color:red">{{$errors->first('mobile')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <input class="form-control" name="status" placeholder="Trạng thái" />
                                <div class="text-block">
                                    @if($errors->has('status'))
                                        <p style="color:red">{{$errors->first('status')}}</p>
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
    </div>
</div>
@endsection
