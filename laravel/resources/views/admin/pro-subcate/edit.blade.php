@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="form-group">
                <form id="service-id" action="{{url($update_route, $item->id)}}" method="post" enctype="multipart/form-data">
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
                                <label class="control-label">Danh mục cha</label>
                                <select name="cate_id" class="form-control">
                                    <option value="">--Not Defined--</option>
                                    @foreach($items as $category01)
                                        <option value="{{ $category01->id }}" > {{ $category01->title }} </option>
                                    @endforeach
                                </select>
                                <script>
                                    $("select[name='cate_id']").val({{$item->cate_id}});
                                </script>
                                <div class="text-block">
                                    @if($errors->has('cate_id'))
                                        <p style="color:red">{{$errors->first('cate_id')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="control-label" for="id-id">ID</label>
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
                                <label class="control-label">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{$item->slug}}" readonly>
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
                                @if(!empty($item->image))
                                    <img style="width: 200px" src="{{url($item->image)}}" />
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
                                <label class="control-label">Nội dung</label>
                                <textarea class="form-control summernote" name="content_text">{{$item->content}}</textarea>
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
                                <label class="control-label">Ngày sửa</label>
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
@endsection