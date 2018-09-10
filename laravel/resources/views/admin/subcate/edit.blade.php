@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chuyên mục
                    <small>{{$subcate->subcate_name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
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
                <form action="admin/subcate/edit/{{$subcate->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên chuyên mục</label>
                        <input class="form-control" name="subcate_name"  value="{{$subcate->subcate_name}}" />
                    </div>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="form-control" name="cate_id">
                        @foreach($cate as $tl)
                            <option
                            @if($tl->id == $subcate->cate_id)
                                {{"selected"}}
                            @endif
                             value="{{$tl->id}}">{{$tl->cate_name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nội dung tóm tắt</label>
                        <textarea class="form-control" rows="3" name="subcate_sum">{{$subcate->subcate_sum}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Meta keywords</label>
                        <input class="form-control" value="{{$subcate->meta_keywords}}" name="meta_keywords" />
                    </div>

                    <div class="form-group">
                        <label>Meta description</label>
                        <input class="form-control" value="{{$subcate->meta_description}}" name="meta_description" />
                    </div>

                    <a href="{{URL::previous()}}" class="btn btn-default">Quay lại</a>
                    <button type="submit" class="btn btn-default">Cập nhật</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
