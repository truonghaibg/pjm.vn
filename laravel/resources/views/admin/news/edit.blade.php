@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Sửa tin</small>
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
                <form action="admin/news/edit/{{$news->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">

                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="title" placeholder="Điền Tiêu đề" value="{{$news->title}}" />
                        </div>
						<div class="form-group">
                        <label>Danh mục</label>
                        <select  class="form-control" name="category" >
                            @foreach($newsCategory as $item)
							<option value="{{$item->id}}" <?php if($news->news_category_id == $item->id){ ?>  selected="selected" <?php } ?>>{{$item->name}}</option>
							@endforeach
                        </select>
                    </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <p>
                                <img width="200px" src="upload/news/{{$news->img}}" alt="">
                            </p>
                            <input class="form-control" type="file" name="img" />
                        </div>
                        <br/>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control summernote" rows="5" name="content_news">{{$news->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea class="form-control" name="sum">{{$news->sum}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Meta keywords</label>
                            <input class="form-control" name="meta_keywords" value="{{$news->meta_keywords}}" />
                        </div>

                        <div class="form-group">
                            <label>Meta description</label>
                            <input class="form-control" name="meta_description" value="{{$news->meta_description}}" />
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
@section('script')
    <script>
        $(document).ready(function(){
            $('.summernote').summernote();
        });
    </script>
@endsection
