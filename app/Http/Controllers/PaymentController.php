<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Paypal;
use Cart;
use Excel;
use App\Cate;
use App\Subcate;
use App\Nsx;
use App\Post;
use App\Product;
use App\News;
use App\Events;
use App\Order;
  class PaymentController extends Controller
  {

    private $_apiContext;

    function __construct()
    {
      $this->_apiContext = Paypal::ApiContext(
        config('services.paypal.client_id'),
        config('services.paypal.secret')
      );
      $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));
    }
    /*
   * Process payment using credit card
   */
   public function create()
    {
        return View::make('payment.order');
    }
    public function getCheckout(Request $request)
    	{
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
        if ($request->pay_method==1||$request->pay_method==2||$request->pay_method==3) {
          Cart::destroy();
          return redirect('success');
        }
        if ($request->pay_method==4) {
          $payer = PayPal::Payer();
    	    $payer->setPaymentMethod('paypal');

    	    $amount = PayPal:: Amount();
    	    $amount->setCurrency('USD');
          $amountusd=(Cart::total())/22727;
    	    $amount->setTotal($amountusd);

    	    $transaction = PayPal::Transaction();
    	    $transaction->setAmount($amount);
    	    $transaction->setDescription('Buy Premium  Plan on 18');

    	    $redirectUrls = PayPal:: RedirectUrls();
    	    $redirectUrls->setReturnUrl(url('get-done/'.$order->id));
    	    $redirectUrls->setCancelUrl(url('get-cancel'));

    	    $payment = PayPal::Payment();
    	    $payment->setIntent('sale');
    	    $payment->setPayer($payer);
    	    $payment->setRedirectUrls($redirectUrls);
    	    $payment->setTransactions(array($transaction));

    	    $response = $payment->create($this->_apiContext);
    	    $redirectUrl = $response->links[1]->href;

    	    return redirect()->to( $redirectUrl );
        }

    	}

    	public function getDone(Request $request,$id)
    	{

          $order_id = $id;
            
    	    $id = $request->get('paymentId');
    	    $token = $request->get('token');
    	    $payer_id = $request->get('PayerID');

    	    $payment = PayPal::getById($id, $this->_apiContext);

    	    $paymentExecution = PayPal::PaymentExecution();

    	    $paymentExecution->setPayerId($payer_id);
    	    $executePayment = $payment->execute($paymentExecution, $this->_apiContext);

          $order= Order::find($order_id);
          $donhang=$order_id;
          $order->status = 4;
          $order->save();
          Cart::destroy();
          // $cart = array($request->buyer_name,$request->buyer_email,$request->buyer_tel);
          // Excel::create('Đơn hàng của bạn', function ($excel) use($cart){
          //   $excel->sheet('sheet', function ($sheet) use($cart){
          //       $sheet->fromArray($cart);
          //   });
          // })->export('xls');

          return redirect('success')->with('donhang',$donhang);
    	}

    	public function getCancel()
    	{
    	    return redirect()->back();
          return redirect('success');
    	}
  }
 ?>
