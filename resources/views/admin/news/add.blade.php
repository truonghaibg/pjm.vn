@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
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
                <form action="admin/news/add" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select  class="form-control" name="category">
                            <option value="1">Danh mục tin tức mới</option>
                            <option value="0">Danh mục bài viết cố định</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="title" placeholder="Điền Tiêu đề" />
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input class="form-control" type="file" name="img" />
                    </div>
					 <div class="form-group">
                        <label>Tags</label>
						<input class="form-control" name="tags" id="mySingleField" value="" readonly="readonly">
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
                        <textarea class="form-control summernote" rows="5" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <textarea class="form-control" name="sum"></textarea>
                    </div>

                    <button type="submit" class="btn btn-default">Thêm mới</button>
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
            $('.summernote').summernote();
        });
    </script>
@endsection
