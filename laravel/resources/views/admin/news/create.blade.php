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
                    <form id="service-id" action="{{url($store_route)}}" method="post" enctype="multipart/form-data">
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
                                    <label class="control-label">Danh mục</label>
                                    <select name="category_id" class="form-control">
                                        @foreach($items as $categoryProduct)
                                            <option value="{{ $categoryProduct->id }}" > {{ $categoryProduct->title }} </option>
                                        @endforeach
                                    </select>
                                    <div class="text-block">
                                        @if($errors->has('category_id'))
                                            <p style="color:red">{{$errors->first('category_id')}}</p>
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
                                    <input type="text" class="form-control" name="desc_short">
                                    <div class="text-block">
                                        @if($errors->has('desc_short'))
                                            <p style="color:red">{{$errors->first('desc_short')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Nội dung</label>
                                    <textarea class="form-control summernote" name="desc_long" ></textarea>
                                    <div class="text-block">
                                        @if($errors->has('desc_long'))
                                            <p style="color:red">{{$errors->first('desc_long')}}</p>
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