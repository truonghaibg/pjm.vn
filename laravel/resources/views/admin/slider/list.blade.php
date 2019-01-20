@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        {{$title}}
                        <small> Danh sách</small>
                    </h1>
                </div>
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{url('admin/slider/create')}}">Thêm mới</a>
                    <p></p>
                </div>
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Hình ảnh</th>
                            <th>Link</th>
                            <th>Sắp xếp</th>
                            <th>Trạng thái</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>
                                    <img style="width: 100px;" src="{{url('upload/slider', $item->image)}}"/>
                                </td>
                                <td>{{$item->link}}</td>
                                <td>{{$item->order}}</td>
                                <td>{{$item->status}}</td>
                                <td class="center">
                                    <a href="{{url("admin/slider/edit", $item->id)}}">
                                        <button type="button" class="btn btn-outline-warning btn-sm">Edit</button>
                                    </a>
                                    <a href="{{url("admin/slider/delete", $item->id)}}" onclick="return kiemtra()">
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
