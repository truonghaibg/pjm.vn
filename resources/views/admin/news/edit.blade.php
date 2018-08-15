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
                            <label>Ảnh</label>
                            <p>
                                <img width="200px" src="upload/news/{{$news->img}}" alt="">
                            </p>
                            <input class="form-control" type="file" name="img" />
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <?php
                            $oldTagString = "";
                            foreach($tagArray as $oldTag){
                                $oldTagString = $oldTagString.$oldTag.',';
                            }
                            if(strlen ($oldTagString) > 0){
                                $oldTagString = substr($oldTagString,0, -1);
                            }
                            ?>
                            <input class="form-control" name="tags" id="mySingleField" value=" <?php echo $oldTagString; ?>" readonly="readonly">
                             <script>
                                 var country_list = new Array();
                                 <?php
                                 foreach($tags as $item){ ?>

                                 country_list.push("<?php echo $item->name; ?>");

                                 <?php
                                 }
                                 ?>
                             </script>
                            <br/>
                            <ul class="form-control" id="singleFieldTags"></ul>
                            <link rel="stylesheet" href="{{url("/")}}/jquery-ui.css">
                            <link rel="stylesheet" href="{{url("/")}}/jquery.tagit.css" >
                        </div>
                        <br/>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control summernote" rows="5" name="content">{{$news->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea class="form-control" name="sum">{{$news->sum}}</textarea>
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
