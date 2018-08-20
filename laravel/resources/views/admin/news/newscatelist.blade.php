@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Danh mục tin tức</small>
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
                        <th style="width: 50px;">ID</th>
                        <th>Tên</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($newscate as $p)
                    <tr class="odd gradeX" align="center">
                        <td>{{$p->id}}</td>
                        <td>{{$p->name}}</td>
                        <td class="center">
                            <a href="{{url("admin/news/news-cate-edit", $p->id)}}">
                                <button type="button" class="btn btn-outline-warning btn-sm">Edit</button>
                            </a>
                            <a href="{{url("admin/news/news-cate-del", $p->id)}}" onclick="return checkDelete()">
                                <button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
			<a href="{{url('/admin/news/news-cate-add')}}" >
				<button type="button" class="btn btn-outline-warning btn-sm">Thêm</button>
			</a>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
