@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Manager
                    <small>Sửa video link</small>
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
                <form action="admin/manager/video" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
						<div class="form-group">
                            <label>Video>Ảnh</label>
                                <div class="video-news">
								<?php 
									$codes = explode("/", $video->link);
									$code = $codes[count($codes)- 1];
								?>
									<iframe width="300" height="216" src="https://www.youtube.com/embed/{{str_replace("watch?v=", "",$code )}}" frameborder="0" allowfullscreen></iframe>
								</div>
                            <input class="form-control" type="text" name="link" value="{{$video->link}}" />
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
