@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục
                    <small>{{$cate->cate_name}}</small>
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
                <form action="admin/cate/edit/{{$cate->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên Danh mục</label>
                        <input class="form-control" name="cate_name" placeholder="Tên Danh mục" value="{{$cate->cate_name}}" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả danh mục</label>
                        <textarea class="form-control" rows="3" name="cate_sum">{{$cate->cate_sum}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Meta keywords</label>
                        <input class="form-control" value="{{$cate->meta_keywords}}" name="meta_keywords" />
                    </div>

                    <div class="form-group">
                        <label>Meta description</label>
                        <input class="form-control" value="{{$cate->meta_description}}" name="meta_description" />
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
