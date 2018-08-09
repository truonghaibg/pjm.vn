@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" style="padding-bottom:120px">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif

            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
                <form action="admin/order/edit/{{$order2->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Tên người mua</label>
                      <input style="color:red;text-transform:uppercase;font-weight:bold;" class="form-control" name="buyer_name" value="{{$order2->buyer_name}}" />
                  </div>
                  <div class="form-group">
                      <label>Nội dung đơn hàng</label>
                      <p style="color:red;font-size:18px;background-color:#e6e9ef;">
                        <?php
                         $model=explode(",",$order2->product_id);
                         $result=count($model);
                         $qty=explode(",",$order2->qty);
                          $i=0;
                          while ($i < $result) {
                            $md=$model[$i];
                            $product = App\Product::where('product_model',$model[$i])->get();
                            foreach ($product as $row) {
                              echo "<a href='item/".$row->product_namekd."' target='_blank'>".$row->product_name."</a>";


                            }
                            $qt=$qty[$i];
                            echo " / SL: ".$qt." sản phẩm / Đơn giá: ".number_format($qt*$row->product_price)." VNĐ";
                            echo "<br>";
                            $i++;
                          }
                          echo "Tổng giá trị đơn hàng: ".number_format($order2->amount)." VNĐ";
                         ?>
                      </p>
                  </div>
                  <div class="form-group">
                      <label>Phương thức thanh toán</label>
                      <select class="form-control" name="payment_method" id="pay_method">
                      @for($i=1; $i <= 4; $i++)
                          <option
                          <?php
                            if ($order2->payment_method==$i) {
                              echo "selected";
                            }
                           ?>
                           value="{{$i}}">
                           <?php
                           switch ($i) {
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
                         </option>
                           $i++;
                      @endfor
                      </select>
                  </div>

                  <div class="form-group">
                      <label>Trạng thái</label>
                      <select class="form-control" name="status" id="status">
                      @for($i=0; $i <= 6; $i++)
                          <option
                          <?php
                            if ($order2->status==$i) {
                              echo "selected";
                            }
                           ?>
                           value="{{$i}}">
                           <?php
                           switch ($i) {
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
                         </option>
                           $i++;
                      @endfor
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Hình thức vận chuyển</label>
                      <select class="form-control" name="ship_method" id="ship_method">
                      @for($i=1; $i <= 3; $i++)
                          <option
                          <?php
                            if ($order2->ship_method==$i) {
                              echo "selected";
                            }
                           ?>
                           value="{{$i}}">
                           <?php
                           switch ($i) {
                             case 1:
                                 echo "Vận chuyển tính phí theo thỏa thuận";
                                 break;
                             case 2:
                                 echo "Miễn phí trong nội thành Hà Nội";
                                 break;
                             case 3:
                                 echo "Miễn phí trong 35 KM";
                                 break;
                             } ?>
                         </option>
                           $i++;
                      @endfor
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Email người mua</label>
                      <input class="form-control" name="buyer_email" value="{{$order2->buyer_email}}" />
                  </div>
                  <div class="form-group">
                      <label>SĐT người mua</label>
                      <input class="form-control" name="buyer_tel" value="{{$order2->buyer_tel}}" />
                  </div>
                  <div class="form-group">
                      <label>Địa chỉ người mua</label>
                      <input class="form-control" name="buyer_address" value="{{$order2->buyer_address}}" />
                  </div>
                  <div class="form-group">
                      <label>Ghi chú</label>
                      <textarea class="form-control" name="buyer_note" rows="3" cols="80">{{$order2->buyer_note}}</textarea>
                  </div>
                  <div class="form-group">
                      <label>Tên người nhận</label>
                      <input style="color:red;text-transform:uppercase;font-weight:bold;" class="form-control" name="ship_to_name" value="{{$order2->ship_to_name}}" />
                  </div>
                  <div class="form-group">
                      <label>SĐT người nhận</label>
                      <input class="form-control" name="ship_to_tel" value="{{$order2->ship_to_tel}}" />
                  </div>
                  <div class="form-group">
                      <label>Địa chỉ người nhận</label>
                      <textarea class="form-control" name="ship_to_address" rows="3" cols="80">{{$order2->ship_to_address}}</textarea>
                  </div>
                  <input type="text" name="product_id" value="{{$order2->product_id}}" style="display:none";>
                  <input type="text" name="qty" value="{{$order2->qty}}" style="display:none";>
                  <input type="text" name="amount" value="{{$order2->amount}}" style="display:none";>

                    <button type="submit" class="btn btn-default">Sửa sản phẩm</button>
                    <button type="reset" class="btn btn-default">Viết lại</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
@section('script')

@endsection
