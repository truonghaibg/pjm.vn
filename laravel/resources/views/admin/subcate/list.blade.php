@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chuyên mục
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
                        <th>Tên Chuyên mục</th>
                        <th>Danh mục</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subcate as $tl)
                    <tr class="odd gradeX" align="center">
                        <td>{{$tl->id}}</td>
                        <td>{{$tl->subcate_name}}</td>
                        <td>{{isset($tl->cate->cate_name)?$tl->cate->cate_name:""}}</td>
                        <td class="center">
                            <a href="{{url("admin/subcate/edit", $tl->id)}}">
                                <button type="button" class="btn btn-outline-warning btn-sm">Edit</button>
                            </a>
                            <a href="{{url("admin/subcate/del", $tl->id)}}" onclick="return checkDelete()">
                                <button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
                            </a>
                        </td>
                    </tr>
                    @empty
                        Không có chuyên mục nào
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
