@extends('admin.layout.index')
@section('content')
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
                        <th>Giảm giá %</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($product as $p)
                    <tr class="odd gradeX" align="center">
                        <td>{{$p->id}}</td>
                        <td>{{$p->product_name}}</td>
                        <td>{{$p->product_model}}</td>
                        @if($p->nsx_id == 0)
                            <td>None</td>
                        @else
                            <td>
							<?php
								if(isset($p->nsx->nsx_name)){
									echo $p->nsx->nsx_name;
								}
							?>
							</td>
                        @endif
                        <td>{{$p->product_price}}</td>
                        <td>
                            @if ($p->product_status == "1")
                                Hàng mới về
                            @elseif ($p->product_status == "2")
                                Còn hàng
                            @elseif ($p->product_status == "3")
                                Liên hệ
                            @endif
                        </td>
                        <td>{{$p->product_salevalue}}</td>
                        <td class="center">
                            <a href="{{url("admin/product/edit", $p->id)}}">
                                <button type="button" class="btn btn-outline-warning btn-sm">Edit</button>
                            </a>
                            <a href="{{url("admin/product/del", $p->id)}}" onclick="return checkDelete()">
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
