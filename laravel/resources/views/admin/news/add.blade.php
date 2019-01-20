@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-header">
                        {{$title}}<small> Thêm mới</small>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form id="service-id" action="{{url('admin/news/store')}}" method="post" enctype="multipart/form-data">
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
                                    <label class="control-label">Danh mục</label>
                                    <select name="news_category_id" class="form-control">
                                        @foreach($items as $categoryProduct)
                                            <option value="{{ $categoryProduct->id }}" > {{ $categoryProduct->title }} </option>
                                        @endforeach
                                    </select>
                                    <div class="text-block">
                                        @if($errors->has('news_category_id'))
                                            <p style="color:red">{{$errors->first('news_category_id')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Tiêu đề</label>
                                    <input id="title-id" type="text" class="form-control" name="title">
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
                                    <label class="control-label">Slug</label>
                                    <input type="text" class="form-control" name="slug">
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
                                    <label class="control-label">Hình ảnh</label>
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
                                    <label class="control-label">Mô tả</label>
                                    <input type="text" class="form-control" name="description">
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
                                    <label class="control-label">Nội dung</label>
                                    <textarea class="form-control summernote" name="content_text" ></textarea>
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
                                    <label class="control-label">Trạng thái</label>
                                    <input type="text" class="form-control" name="status">
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
                                    <a href="{{url('admin/news')}}" class="btn btn-default">Quay lại</a>
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