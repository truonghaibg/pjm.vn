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
                <h1 class="page-header">Bài viết
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
                        <th>Tiêu đề</th>
                        <th>Danh mục</th>
                        <th>Chuyên mục</th>
                        <th>Tóm tắt</th>
                        <th>View</th>
                        <th>Hot</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($post as $p)
                    <tr class="odd gradeX" align="center">
                        <td>{{$p->id}}</td>
                        <td>{{$p->post_title}}</td>
                        <td>{{$p->subcate->cate->cate_name}}</td>
                        <td>{{$p->subcate->subcate_name}}</td>
                        <td>{{$p->post_sum}}</td>
                        <td>{{$p->post_view}}</td>
                        <td>
                            @if($p->post_high == "1")
                                Có
                                @else Không
                            @endif
                        </td>
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/post/del/{{$p->id}}" onclick="return kiemtra();"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/post/edit/{{$p->id}}">Thêm</a></td>
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
