@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bài viết
                    <small>Thêm mới</small>
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
                <form action="admin/post/add" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Tiêu đề bài viết</label>
                        <input class="form-control" name="title" />
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input class="form-control" type="text" name="slug" />
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt bài viết</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung bài viết</label>
                        <textarea class="form-control summernote" rows="5" name="content_posts"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label><br>
                        <label class="radio-inline">
                            <input name="status" value="0"  type="radio">Không
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="1" checked="" type="radio">Có
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Meta keywords</label>
                        <input class="form-control" name="meta_keywords" />
                    </div>

                    <div class="form-group">
                        <label>Meta description</label>
                        <input class="form-control" name="meta_description" />
                    </div>

                    <a href="{{URL::previous()}}" class="btn btn-default">Quay lại</a>
                    <button type="submit" class="btn btn-default">Thêm mới</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#cate_id").change(function(){
                var cate_id = $(this).val();
                $.get("admin/ajax/subcate/"+cate_id,function(data){
                    $("#subcate_id").html(data);
                });
            });
            $('.summernote').summernote();
        });
    </script>
@endsection
