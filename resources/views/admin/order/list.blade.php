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
                <h1 class="page-header">Danh sách Order
                    <small>Danh sách</small>
                    <a href="{{url('export-order')}}" target="_blank">Tải xuống tất cả</a>
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
                        <th>Phương thức</th>
                        <th>Trạng thái</th>
                        <th>Sản phẩm/ Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Người mua/SĐT</th>
                        <th>Người nhận/SĐT/Địa chỉ</th>
                        <th style="display:none">Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($order as $p)
                    <tr class="odd gradeX" align="center">
                        <td style="color:red;"><?php echo number_format($p->id); ?></td>
                        <td>
                          <?php
                          switch ($p->payment_method) {
                                case 1:
                                    echo "Trực tiếp";
                                    break;
                                case 2:
                                    echo "COD";
                                    break;
                                case 3:
                                    echo "Chuyển khoản";
                                    break;
                                case 4:
                                    echo "Paypal";
                                    break;
                            } ?>
                        </td>
                        <td style="color:red; font-weight:bold;">
                          <?php
                          switch ($p->status) {
                                case 0:
                                    echo "CTT,chờ chuyển";
                                    break;
                                case 1:
                                    echo "CTT,đang chuyển";
                                    break;
                                case 2:
                                    echo "CTT,trả lại";
                                    break;
                                case 3:
                                    echo "ĐTT,không đạt";
                                    break;
                                case 4:
                                    echo "ĐTT,chờ chuyển";
                                    break;
                                case 5:
                                    echo "ĐTT,đang chuyển";
                                    break;
                                case 6:
                                    echo "ĐTT,đã chuyển";
                                    break;
                            } ?>
                        </td>
                        <td style="color:red; font-weight:bold;">
                          <?php
                           $model=explode(",",$p->product_id); $result=count($model);
                           $qty=explode(",",$p->qty);
                            $i=0;
                            while ($i < $result) {
                              $md=$model[$i];
                              $product = App\Product::where('product_model',$model[$i])->get();
                              foreach ($product as $row) {
                                echo "<a href='item/".$row->product_namekd."' target='_blank'>".$row->product_name."</a>";


                              }
                              $qt=$qty[$i];
                              echo " / ".$qt." sp";
                              echo "<br>";
                              $i++;
                            }
                           ?>

                        </td>
                        <td style="color:red;"><?php echo number_format($p->amount); ?> VNĐ</td>
                        <td>{{$p->buyer_name}}<br>{{$p->buyer_tel}}</td>
                        <td>{{$p->ship_to_name}}<br>{{$p->ship_to_tel}}<br>{{$p->ship_to_address}}</td>
                        <td class="center" style="display:none"><a href="admin/order/del/{{$p->id}}" onclick="return kiemtra();"> Delete</a></td>
                        <td class="center">
                          <a href="admin/order/edit/{{$p->id}}"><i class="fa fa-pencil fa-fw"></i></a><br>
                          <a href="{{url('export-order/'.$p->id)}}" target="_blank"><i class="fa fa-download fa-fw"></i></a>
                        </td>
                    </tr>

                    @empty
                        Không có order nào
                @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
