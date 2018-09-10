@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bài viết
                    <small>{{$item->title}}</small>
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
                <form action="admin/post/edit/{{$item->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Tiêu đề bài viết</label>
                        <input class="form-control" value="{{$item->title}}" name="title" />
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input class="form-control" value="{{$item->slug}}" type="text" name="slug" />
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt bài viết</label>
                        <input type="text" class="form-control" value="{{$item->description}}" name="description" />
                    </div>
                    <div class="form-group">
                        <label>Nội dung bài viết</label>
                        <textarea class="form-control summernote"rows="5" name="content_posts">{{$item->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label><br>
                        <label class="radio-inline">
                            <input name="status" value="0" <?php if ($item->status==0) echo 'checked' ?> type="radio">Không
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="1" <?php if ($item->status) echo 'checked' ?> type="radio">Có
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Meta keywords</label>
                        <input class="form-control" value="{{$item->meta_keywords}}" name="meta_keywords" />
                    </div>

                    <div class="form-group">
                        <label>Meta description</label>
                        <input class="form-control" value="{{$item->meta_description}}" name="meta_description" />
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
