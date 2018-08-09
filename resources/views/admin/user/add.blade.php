@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản trị viên
                    <small>Thêm mới</small>
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
                <form action="admin/user/add" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Tên quản trị viên</label>
                        <input class="form-control" name="name" placeholder="Nhập tên quản trị viên" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="email" placeholder="Nhập địa chỉ Email" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="passwordAgain" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Quyền</label>
                        <label class="radio-inline">
                            <input name="level" value="0" checked="" type="radio">Nhân viên
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="1" type="radio">Quản lý
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Thông tin quản trị viên</label>
                        <textarea name="info" class="form-control" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-default">Thêm mới</button>
                    <button type="reset" class="btn btn-default">Nhập lại</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
