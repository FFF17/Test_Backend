<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\Transaction;
class ProductController extends Controller
{
    public function create(Request $r){
    	date_default_timezone_set('Asia/Jakarta');

    	$count = Product::where('created_at', '>=', date('Y-m-d').' 00:00:00')->count();
    	$order_no = 'P'.date("ymd").($count+1).'00';

    	$product = new Product;
        $product->product_name = $r->product_name;
        $product->shiping_address = $r->shiping_address;
        $product->price = $r->price;
        $product->user_id = Auth::user()->id;
        $product->order_no = $order_no;
        $product->status = 1;
        $product->save();

        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->type = 'P';
        $transaction->values = $r->price;
        $transaction->order_no = $order_no;
        $transaction->fee = 10000;
        $transaction->status = 1;
        $transaction->save();

        return redirect(url('transaction/'.$order_no));
    }
}
