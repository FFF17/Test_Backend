<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Topup_Balance;
use App\Transaction;
class TopupController extends Controller
{
    public function create(Request $r){
    	date_default_timezone_set('Asia/Jakarta');

    	$count = Topup_Balance::where('created_at', '>=', date('Y-m-d').' 00:00:00')->count();    	
    	$order_no = 'T'.date("ymd").($count+1);

    	$topup = new Topup_Balance;
        $topup->mobile_no = $r->mobile_no;
        $topup->value = $r->value;
        $topup->user_id = Auth::user()->id;
        $topup->order_no = $order_no;
        $topup->status = 1;
        $topup->save();

    	$transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->type = 'T';
        $transaction->values = $r->value;
        $transaction->order_no = $order_no;
        $transaction->fee = ($r->value / 100) * 5;
        $transaction->status = 1;
        $transaction->save();

        return redirect(url('transaction/'.$order_no));
    }

}
