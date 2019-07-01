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
                                <select name="subcate_id" class="form-control">
                                    <option value="">--Not Defined--</option>
                                    @foreach($items as $category01)
                                        <option value="{{ $category01->id }}" > {{ $category01->title }} </option>
                                    @endforeach
                                </select>
                                <script>
                                    $("select[name='subcate_id']").val({{$item->subcate_id}});
                                </script>
                                <div class="text-block">
                                    @if($errors->has('subcate_id'))
                                        <p style="color:red">{{$errors->first('subcate_id')}}</p>
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