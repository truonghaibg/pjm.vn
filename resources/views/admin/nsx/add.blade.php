@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hãng
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
                <form action="admin/nsx/add" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                    <div class="form-group">
                        <label>Tên hãng</label>
                        <input class="form-control" name="nsx_name" placeholder="Điền tên hãng" />
                    </div>

                    <div class="form-group">
                        <label>Chuyên mục</label>
                        <select class="form-control" name="subcate_id">
                        @foreach($subcate as $tl)
                            <option value="{{$tl->id}}">{{$tl->subcate_name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-default">Thêm mới</button>
                    <button type="reset" class="btn btn-default">Viết lại</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
