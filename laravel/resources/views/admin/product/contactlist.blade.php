@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Yêu cầu báo giá
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
						<th>Thời gian</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($productContact as $p)
                    <tr class="odd gradeX" align="center">
                        <td>{{$p->id}}</td>
                        <td>{{$p->created_at}}</td>
                        <td><?php if(isset($p->product->product_name)) echo($p->product->product_name) ?></td>
                        <td>{{$p->number}}</td>
                        <td>
						
						<?php
							switch($p->status) {
								case 0 : echo "Mới"; break;
								case 1 : echo "Chưa báo giá"; break;
								case 2 : echo "Đã trả lời"; break;
								default: echo "Mới";
							}
							
						?>
						
						</td>
                        <td class="center">
                            <a href="{{url("admin/product/product-contact-details", $p->id)}}">
                                <button type="button" class="btn btn-outline-warning btn-sm">Xem</button>
                            </a>
                            <a href="{{url("admin/product/product-contact-details-delete", $p->id)}}" onclick="return checkDelete()">
                                <button type="button" class="btn btn-outline-danger btn-sm">Xóa</button>
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
