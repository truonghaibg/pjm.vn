<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
{
    //

    public function getList(){
        $transaction = Transaction::orderBy('id','DESC')->get();
        return view('admin.transaction.list',['transaction'=>$transaction]);
    }

    public function postAdd(Request $request){
        $transaction = new Transaction;
        $transaction->status = $request->status;
        $transaction->buyer_name = $request->buyer_name;
        $transaction->buyer_email = $request->buyer_email;
        $transaction->buyer_tel = $request->buyer_tel;
        $transaction->buyer_address = $request->buyer_address;
        $transaction->buyer_note = $request->buyer_note;
        $transaction->ship_to_name = $request->ship_to_name;
        $transaction->ship_to_tel = $request->ship_to_tel;
        $transaction->ship_to_address = $request->ship_to_address;
        $transaction->amount = $request->amount;
        $transaction->payment_method = $request->payment_method;
        $post->save();
        return redirect('layout/index');
    }

    public function getEdit($id){
        $transaction = Transaction::find($id);
        return view('admin.transaction.edit',['transaction'=>$transaction]);
    }

    public function postEdit(Request $request,$id){
        $transaction = Transaction::find($id);
        $transaction->status = $request->status;
        $transaction->buyer_name = $request->buyer_name;
        $transaction->buyer_email = $request->buyer_email;
        $transaction->buyer_tel = $request->buyer_tel;
        $transaction->buyer_address = $request->buyer_address;
        $transaction->buyer_note = $request->buyer_note;
        $transaction->ship_to_name = $request->ship_to_name;
        $transaction->ship_to_tel = $request->ship_to_tel;
        $transaction->ship_to_address = $request->ship_to_address;
        $transaction->amount = $request->amount;
        $transaction->payment_method = $request->payment_method;
        $transaction->save();
        return redirect('admin/transaction/list')->with('thongbao','Sửa thành công');
    }

    public function getDel($id){
        $transaction = Transaction::find($id);
        $transaction->delete();
        return redirect('admin/transaction/list')->with('thongbao','Xóa thành công');
    }
}
