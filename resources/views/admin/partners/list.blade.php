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
                <h1 class="page-header">Đối tác
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
                        <th>Tên</th>
                        <th>Logo</th>
                        <th>Description</th>
                        <th>Website</th
                        <th>Địa chỉ</th>
                        <th>Điện thoại</th>
                        <th>Hành động</th>

                    </tr>
                </thead>
                <tbody>
                @foreach($partners as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{$item->name}}</td>
                        <td><img style="width: 100px;" src="{{url('/')}}/upload/partners/{{$item->logo}}" /></td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->link}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->mobile_phone}}</td>

                        <td class="center">
                            <i class="fa fa-trash-o fa-fw"></i><a href="admin/partners/del/{{$item->id}}" onclick="return kiemtra();"> Xóa</a>
                            <i class="fa fa-pencil fa-fw"></i> <a href="admin/partners/edit/{{$item->id}}">Sửa</a>
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
