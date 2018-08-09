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
                <h1 class="page-header">Sản phẩm
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
                        <th>Model</th>
                        <th>Hãng</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                        <th>Thông tin</th>
                        <th>Giảm giá %</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($product as $p)
                    <tr class="odd gradeX" align="center">
                        <td>{{$p->id}}</td>
                        <td>{{$p->product_name}}</td>
                        <td>{{$p->product_model}}</td>
                        @if(($p->nsx_id)==0)
                            <td>None</td>
                        @else<td>{{$p->nsx->nsx_name}}</td>
                        @endif

                        <td>{{$p->product_price}}</td>
                        <td>
                            @if($p->product_status == "1")
                                Hàng mới về
                            @endif
                            @if($p->product_status == "2")
                                Còn hàng
                            @endif
                            @if($p->product_status == "3")
                                Liên hệ
                            @endif
                        </td>
                        <td>{{$p->product_tag}}</td>
                        <td>{{$p->product_salevalue}}</td>
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/product/del/{{$p->id}}" onclick="return kiemtra();"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$p->id}}">Sửa</a></td>
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
