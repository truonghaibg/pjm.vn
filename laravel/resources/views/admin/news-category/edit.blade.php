@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Sửa danh mục</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
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
                <form action="admin/news-category/edit/{{$item->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">

                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" name="name" value="{{$item->name}}" />
                        </div>

                        <div class="form-group">
                            <label>Slug</label>
                            <input class="form-control" name="slug" value="{{$item->slug}}" />
                        </div>

                        <div class="form-group">
                            <label>Meta keywords</label>
                            <input class="form-control" name="meta_keywords" value="{{$item->meta_keywords}}" />
                        </div>

                        <div class="form-group">
                            <label>Meta description</label>
                            <input class="form-control" name="meta_description" value="{{$item->meta_description}}" />
                        </div>

                        <a href="{{URL::previous()}}" class="btn btn-default">Quay lại</a>
                        <button type="submit" class="btn btn-default">Cập nhật</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection

