@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Manager
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Ảnh</th>
						<th>Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($slider as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{$item->id}}</td>
                        <td><img style="width: 200px;" src="{{url('/')}}/upload/slider/{{$item->image}}" /></td>
						<td>{{$item->link}}</td>
                        <td class="center">
                            <a href="{{url("admin/manager/edit-slider-item", $item->id)}}">
                                <button type="button" class="btn btn-outline-warning btn-sm">Edit</button>
                            </a>
                            <a href="{{url("admin/manager/delete-slider-item", $item->id)}}" onclick="return checkDelete()">
                                <button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
