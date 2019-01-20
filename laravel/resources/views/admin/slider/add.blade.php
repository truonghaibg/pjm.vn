@extends('admin.layout.index')
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        {{$title}}
                        <small> Danh sách</small>
                    </h1>
                </div>
                <div class="col-lg-12" style="padding-bottom:120px">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{url('admin/slider/store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if($errors->has('error'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                {{$errors->first('error')}}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input class="form-control" name="title"/>
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
                                    <label>Hình ảnh</label>
                                    <input class="form-control" type="file" name="image"/>
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
                                    <label>Website</label>
                                    <input class="form-control" name="link"/>
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
                                    <label>Sắp xếp</label>
                                    <input class="form-control" name="order"/>
                                    <div class="text-block">
                                        @if($errors->has('order'))
                                            <p style="color:red">{{$errors->first('order')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <input class="form-control" name="status"/>
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
                                    <label class="control-label">Meta keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords">
                                    <div class="text-block">
                                        @if($errors->has('meta_keywords'))
                                            <p style="color:red">{{$errors->first('meta_keywords')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                                    <a href="{{url('admin/slider')}}" class="btn btn-default">Quay lại</a>
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
