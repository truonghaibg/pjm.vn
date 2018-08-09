@extends('admin.layout.index')
@section('content')
<script type="text/javascript">
function kiemtra () {
    // body...
    if (!window.confirm("DỮ LIỆU SẼ BỊ XÓA VĨNH VIỄN. BẠN CÓ MUỐN TIẾP TỤC?")) {
        return false;
    };
}
</script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục
                    <small>List</small>
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
                        <th>Tên</th>
                        <th>Khách hàng</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cate as $tl)
                    <tr class="odd gradeX" align="center">
                        <td>{{$tl->id}}</td>
                        <td>{{$tl->cate_name}}</td>
                        <td>{{isset($tl->customer->customer_name)?$tl->customer->customer_name:"Unknown"}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/cate/del/{{$tl->id}}" onclick="return kiemtra();"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/cate/edit/{{$tl->id}}">Sửa</a></td>
                    </tr>
                    @empty
                        Không có danh mục nào
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
