@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-header">
                        {{$title}}<small> Cập nhật</small>
                    </h1>
                </div>
                <div class="col-12">
                    <form id="service-id" action="{{url('admin/banner/update', $item->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if($errors->has('error'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{$errors->first('error')}}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">ID</label>
                                    <input id="id-id" type="text" class="form-control" name="id" value="{{$item->id}}" readonly>
                                    <div class="text-block">
                                        @if($errors->has('id'))
                                            <p style="color:red">{{$errors->first('id')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Tiêu đề</label>
                                    <input id="title-id" type="text" class="form-control" name="title" value="{{$item->title}}">
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
                                    <label>Logo</label>
                                    <img style="width: 200px" src="{{url('/upload/banner',$item->image)}}" />
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
                                    <label class="control-label">Link</label>
                                    <input type="text" class="form-control" name="link" value="{{$item->link}}">
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
                                    <label class="control-label">Vị trí</label>
                                    <input type="text" class="form-control" name="location" value="{{$item->location}}">
                                    <div class="text-block">
                                        @if($errors->has('location'))
                                            <p style="color:red">{{$errors->first('location')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Mô tả</label>
                                    <input type="text" class="form-control" name="description" value="{{$item->description}}">
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
                                    <label class="control-label">Trạng thái</label>
                                    <input type="text" class="form-control" name="status" value="{{$item->status}}">
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
                                    <input type="text" class="form-control" name="meta_keywords" value="{{$item->meta_keywords}}">
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
                                    <input type="text" class="form-control" name="meta_description" value="{{$item->meta_description}}">
                                    <div class="text-block">
                                        @if($errors->has('meta_description'))
                                            <p style="color:red">{{$errors->first('meta_description')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Ngày tạo</label>
                                    <input type="text" class="form-control" name="created_at" value="{{$item->created_at}}" readonly>
                                    <div class="text-block">
                                        @if($errors->has('created_at'))
                                            <p style="color:red">{{$errors->first('created_at')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Ngày cập nhật</label>
                                    <input type="text" class="form-control" name="updated_at" value="{{$item->updated_at}}" readonly>
                                    <div class="text-block">
                                        @if($errors->has('updated_at'))
                                            <p style="color:red">{{$errors->first('updated_at')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <a href="{{url('admin/banner')}}" class="btn btn-default">Quay lại</a>
                                    <button type="submit" class="btn btn-default">Cập nhật</button>
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