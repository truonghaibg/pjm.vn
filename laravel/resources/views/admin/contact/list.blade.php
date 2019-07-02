@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        {{$title}}<small> Danh sách</small>
                    </h1>
                </div>
                <div class="col-lg-12">
                    @if(session('info'))
                        <div class="alert alert-info">
                            {{session('info')}}
                        </div>
                    @endif
                    @if(count($errors))
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Tên</th>
                            <th>Điện thoại</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->mobile}}</td>
                                <td>{{$item->email}}</td>
                                <td class="center">
                                    <a href="{{url($edit_route, $item->id)}}">
                                        <button type="button" class="btn btn-outline-warning btn-sm">Edit</button>
                                    </a>
                                    <a href="{{url($delete_route, $item->id)}}" onclick="return checkDelete()">
                                        <button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection