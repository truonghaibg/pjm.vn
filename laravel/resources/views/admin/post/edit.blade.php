@extends('admin.layout.index')
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        {{$title}}<small> Cập nhật</small>
                    </h1>
                </div>
                <div class="col-lg-12" style="padding-bottom:120px">
                    <form action="{{url($update_route, $item->id)}}" method="POST" enctype="multipart/form-data">
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
                                    <label>ID</label>
                                    <input class="form-control" name="id" value="{{$item->id}}" readonly/>
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
                                    <label>Tiêu đề</label>
                                    <input class="form-control" name="title" value="{{$item->title}}"/>
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
                                    <label>Slug</label>
                                    <input class="form-control" name="slug" value="{{$item->slug}}" readonly/>
                                    <div class="text-block">
                                        @if($errors->has('slug'))
                                            <p style="color:red">{{$errors->first('slug')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    @if(!is_null($item->image))
                                        <img style="width: 200px" src="{{url($item->image)}}" alt="{{$item->title}}" />
                                    @endif
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
                                    <input class="form-control" name="description" value="{{$item->description}}"/>
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
                                    <label>Nội dung</label>
                                    <textarea class="form-control summernote" rows="5" name="content_text">{{$item->content}}</textarea>
                                    <div class="text-block">
                                        @if($errors->has('content_text'))
                                            <p style="color:red">{{$errors->first('content_text')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <input class="form-control" name="status" value="{{$item->status}}"/>
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
                        </div>
                        <div class="row">
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
                        </div>
                        <div class="row">
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
                        </div>
                        <div class="row">
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
                                    <a href="{{url($back_route)}}" class="btn btn-default">Quay lại</a>
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
