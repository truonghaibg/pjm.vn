@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản trị viên
                    <small>{{$user->name}}</small>
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
                <form action="admin/user/edit/{{$user->id}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Tên quản trị viên</label>
                        <input class="form-control" name="name" placeholder="Nhập tên User" value="{{$user->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" value="{{$user->email}}" disabled=""/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="changepass" name="passChange">
                        <label>Mật khẩu mới</label>
                        <input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu" disabled="" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu mới</label>
                        <input type="password" class="form-control password" name="passwordAgain" placeholder="Nhập mật khẩu" disabled="" />
                    </div>
                    <div class="form-group">
                        <label>Quyền</label>
                        <label class="radio-inline">
                            <input name="level" value="0"
                                @if($user->level == 0)
                                {{"checked"}}
                                @endif type="radio">Nhân viên
                        </label>
                        <label class="radio-inline">
                            <input name="level"
                            @if($user->level == 1)
                                {{"checked"}}
                                @endif value="1" type="radio">Quản lý
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Thông tin quản trị viên</label>
                        <textarea name="info" class="form-control" rows="3">{{$user->info}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-default">Sửa thông tin</button>
                    <button type="reset" class="btn btn-default">Nhập lại</button>
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
            $("#changepass").change(function(){
                if ($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                } else{
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection
