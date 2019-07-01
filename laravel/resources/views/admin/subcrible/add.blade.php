@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    {{$title}}<small> tạo mới</small>
                </h1>
            </div>
            <div class="col-lg-12" style="padding-bottom:120px">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif

                @if(session('info'))
                    <div class="alert alert-info">
                        {{session('info')}}
                    </div>
                @endif
                <form action="{{url('admin/subcrible/store')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if($errors->has('error'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{$errors->first('error')}}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email"/>
                                <div class="text-block">
                                    @if($errors->has('email'))
                                        <p style="color:red">{{$errors->first('email')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <input class="form-control" name="status" />
                                <div class="text-block">
                                    @if($errors->has('status'))
                                        <p style="color:red">{{$errors->first('status')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <a href="{{url('admin/subcrible')}}" class="btn btn-default">Quay lại</a>
                                <button type="submit" class="btn btn-default">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
