@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bài viết
                    <small>{{$post->post_title}}</small>
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
                <form action="admin/post/edit/{{$post->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="form-control" name="cate_id" id="cate_id">
                        @foreach($cate as $ct)
                            <option
                            @if($post->subcate->cate->id == $ct->id)
                                {{"selected"}}
                            @endif
                             value="{{$ct->id}}">{{$ct->cate_name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chuyên mục</label>
                        <select class="form-control" name="subcate_id" id="subcate_id">
                        @foreach($subcate as $sc)
                            <option
                            @if($post->subcate->id == $sc->id)
                                {{"selected"}}
                            @endif
                             value="{{$sc->id}}">{{$sc->subcate_name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề bài viết</label>
                        <input class="form-control" name="post_title" placeholder="Please Enter Post Title" value="{{$post->post_title}}" />
                    </div>
                    <div class="form-group">
                        <label>Ảnh bài viết</label>
                        <p>
                            <img width="200px" src="upload/post/{{$post->post_img}}" alt="">
                        </p>
                        <input class="form-control" type="file" name="post_img" />
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <textarea class="form-control" rows="3" name="post_sum">{{$post->post_sum}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control summernote" rows="5" name="post_content">{{$post->post_content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Được quan tâm?</label>
                        <label class="radio-inline">
                            <input name="post_high" value="0" type="radio"
                                @if($post->post_high == 0)
                                    {{"checked"}}
                                @endif
                            >Không
                        </label>
                        <label class="radio-inline">
                            <input name="post_high" value="1" type="radio"
                            @if($post->post_high == 1)
                                    {{"checked"}}
                                @endif>Có
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa bài viết</button>
                    <button type="reset" class="btn btn-default">Viết lại</button>
                <form>
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
