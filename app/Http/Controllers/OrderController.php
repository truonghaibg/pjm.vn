<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Order;
use App\Product;
use Cart;
use Excel;
class OrderController extends Controller
{
    //

    public function getList(){
        $order = Order::orderBy('id','DESC')->get();
        return view('admin.order.list',['order'=>$order]);
    }
    function exportorder(){
      $export2 = Order::all();
      $now = getdate();
      $currentTime = $now["hours"] . "h" . $now["minutes"] . "p" . $now["seconds"];
      $currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"];
      $currentWeek = $now["wday"] . ".";
      foreach ($export2 as $key) {
        Excel::create('Danh sách Order ngày '.$currentDate.' at '.$currentTime, function ($excel) use($export2){
          $excel->sheet('sheet', function ($sheet) use($export2){
              $sheet->fromArray($export2);
              // Font family
              $sheet->setFontFamily('Times New Roman');

              // Font size
              $sheet->setFontSize(15);

              // Font bold
              $sheet->setFontBold(true);
              // Sets all borders
              $sheet->setAllBorders('thin');

              // Set border for cells
              $sheet->setBorder('A1', 'thin');

              // Set border for range
              $sheet->setBorder('A1:F10', 'thin');
              $sheet->setCellValue('A1', 'STT');
              $sheet->setCellValue('B1', 'NGƯỜI MUA');
              $sheet->setCellValue('C1', 'EMAIL');
              $sheet->setCellValue('D1', 'SĐT');
              $sheet->setCellValue('E1', 'ĐỊA CHỈ');
              $sheet->setCellValue('F1', 'GHI CHÚ');
              $sheet->setCellValue('G1', 'NGƯỜI NHẬN');
              $sheet->setCellValue('H1', 'SĐT');
              $sheet->setCellValue('I1', 'ĐỊA CHỈ');
              $sheet->setCellValue('J1', 'THANH TOÁN');
              $sheet->setCellValue('K1', 'GIAO HÀNG');
              $sheet->setCellValue('L1', 'MÃ SẢN PHẨM');
              $sheet->setCellValue('M1', 'SỐ LƯỢNG');
              $sheet->setCellValue('N1', 'TỔNG TIỀN');
              $sheet->setCellValue('O1', 'TRẠNG THÁI');
              $sheet->setCellValue('P1', 'NGÀY ĐẶT MUA');
              $sheet->setCellValue('Q1', 'NGÀY CẬP NHẬT');
              $sheet->row(1, function($row) {

                  // call cell manipulation methods
                  $row->setBackground('#b0eb78');
                  $row->setAlignment('center');

              });
          });

        })->export('xls');
      }
    }
    function exportid($id){
      $export2 = Order::where('id',$id)->get();
      foreach ($export2 as $key) {
        $sp=(explode(",",$key->product_id));
        $i=0;
        while ( $i < (count($sp))) {
          $pr= Product::where('product_model',$sp[$i])->get();
          $i++;
          foreach ($pr as $key) {
            $namep[]=$key->product_name;
          }
          $name=implode("-/-",$namep);
        }
        // dd($namep);
        // dd($data);
        foreach ($export2 as $key) {
          switch ($key->ship_method) {
              case 1:
                  $key->ship_method= 'Vận chuyển tính phí theo thỏa thuận';
                  break;
              case 2:
                  $key->ship_method= 'Miễn phí trong nội thành Hà Nội';
                  break;
              case 3:
                  $key->ship_method= 'Miễn phí trong 35 KM';
                  break;
          }
          switch ($key->status) {
              case 0:
                  $key->status= 'CTT,chờ chuyển';
                  break;
              case 1:
                  $key->status= 'CTT,đang chuyển';
                  break;
              case 2:
                  $key->status= 'CTT,trả lại';
                  break;
              case 3:
                  $key->status= 'ĐTT,không đạt';
                  break;
              case 4:
                  $key->status= 'ĐTT,chờ chuyển';
                  break;
              case 5:
                  $key->status= 'ĐTT,đang chuyển';
                  break;
              case 6:
                  $key->status= 'ĐTT,đã chuyển';
                  break;
          }
          switch ($key->payment_method) {
              case 1:
                  $key->payment_method= 'Thanh toán trực tiếp';
                  break;
              case 2:
                  $key->payment_method= 'Thanh toán tại nơi giao hàng';
                  break;
              case 3:
                  $key->payment_method= 'Thanh toán bằng chuyển khoản';
                  break;
              case 4:
                  $key->payment_method= 'Chuyển khoản qua Paypal';
                  break;
          }
          $key->product_id=$name;
        }
        // dd($export2);
        Excel::create('Order '.$key->buyer_name.' at '.$key->created_at, function ($excel) use($export2){
          $excel->sheet('sheet', function ($sheet) use($export2){
              $sheet->fromArray($export2);
              // Font family
              $sheet->setFontFamily('Times New Roman');

              // Font size
              $sheet->setFontSize(15);

              // Font bold
              $sheet->setFontBold(true);
              // Sets all borders
              $sheet->setAllBorders('thin');

              // Set border for cells
              $sheet->setBorder('A1', 'thin');

              // Set border for range
              $sheet->setBorder('A1:F10', 'thin');
              $sheet->setCellValue('A1', 'ID');
              $sheet->setCellValue('B1', 'NGƯỜI MUA');
              $sheet->setCellValue('C1', 'EMAIL');
              $sheet->setCellValue('D1', 'SĐT');
              $sheet->setCellValue('E1', 'ĐỊA CHỈ');
              $sheet->setCellValue('F1', 'GHI CHÚ');
              $sheet->setCellValue('G1', 'NGƯỜI NHẬN');
              $sheet->setCellValue('H1', 'SĐT');
              $sheet->setCellValue('I1', 'ĐỊA CHỈ');
              $sheet->setCellValue('J1', 'THANH TOÁN');
              $sheet->setCellValue('K1', 'GIAO HÀNG');
              $sheet->setCellValue('L1', 'TÊN SẢN PHẨM');
              // $sheet->setCellValue('L2', );
              $sheet->setCellValue('M1', 'SỐ LƯỢNG');
              $sheet->setCellValue('N1', 'TỔNG TIỀN');
              $sheet->setCellValue('O1', 'TRẠNG THÁI');
              $sheet->setCellValue('P1', 'NGÀY ĐẶT MUA');
              $sheet->setCellValue('Q1', 'NGÀY CẬP NHẬT');
              // $sheet->setCellValue('A3', $namep);
              $sheet->row(1, function($row) {

                  // call cell manipulation methods
                  $row->setBackground('#b0eb78');
                  $row->setAlignment('center');

              });
            //   $sheet->getStyle('A1:E1')->applyFromArray(
            //     array(
            //         'fill' => array(
            //             'type' => PHPExcel_Style_Fill::FILL_SOLID,
            //             'color' => array('rgb' => 'FF0000')
            //         ),
            //         'font' => array(
            //             'name' => 'Calibri',
            //             'size' => 12,
            //         ),
            //     )
            // );
          });

        })->export('xls');
      }

    }
    public function postAdd(Request $request){
      Cart::destroy();
      $order = new Order;
      $order->buyer_name = $request->buyer_name;
      $order->buyer_email = $request->buyer_email;
      $order->buyer_tel = $request->buyer_tel;
      $order->buyer_address = $request->buyer_address;
      $order->buyer_note = $request->buyer_note;
      $order->ship_to_name = $request->ship_to_name;
      $order->ship_to_tel = $request->ship_to_tel;
      $order->ship_to_address = $request->ship_to_address;
      $order->payment_method = $request->pay_method;
      $order->ship_method = $request->ship_method;

      $model=json_decode($request->prmodel,true);
      $qty=json_decode($request->prqty,true);
      $result=count($model);
      $md = implode(",", $model);
      $qt = implode(",", $qty);
      $order->product_id = $md;
      $order->qty = $qt;
      $order->amount = Cart::total();
      $order->status = 0;
      $order->save();
      $cart = array("Người mua"=>$request->buyer_name, "Email"=>$request->buyer_email, "Sđt"=>$request->buyer_tel);
      Excel::create('Đơn hàng của bạn', function ($excel) use($cart){
        $excel->sheet('sheet', function ($sheet) use($cart){
            $sheet->fromArray($cart);
        });
      })->export('xls');
      return view('pages.success');
    }

    public function getEdit($id){
        $order = Order::all();
        $order2 = Order::find($id);
        return view('admin.order.edit',['order'=>$order,'order2'=>$order2]);
    }

    public function postEdit(Request $request,$id){
        $order = Order::find($id);
        $order->buyer_name = $request->buyer_name;
        $order->buyer_email = $request->buyer_email;
        $order->buyer_tel = $request->buyer_tel;
        $order->buyer_address = $request->buyer_address;
        $order->buyer_note = $request->buyer_note;
        $order->ship_to_name = $request->ship_to_name;
        $order->ship_to_tel = $request->ship_to_tel;
        $order->ship_to_address = $request->ship_to_address;
        $order->payment_method = $request->payment_method;
        $order->ship_method = $request->ship_method;
        $order->product_id = $request->product_id;
        $order->qty = $request->qty;
        $order->amount = $request->amount;
        $order->buyer_address = $request->buyer_address;
        $order->status = $request->status;
        $order->save();
        return redirect('admin/order/list')->with('thongbao','Sửa thành công');
    }

    public function getDel($id){
        $order = Order::find($id);
        $order->delete();
        return redirect('admin/order/list')->with('thongbao','Xóa thành công');
    }
}
