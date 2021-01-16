<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Wallet;
use App\Product;
use Auth;

class TransactionController extends Controller
{
	function secure_random_string($length) {
	    $random_string = '';
	    for($i = 0; $i < $length; $i++) {
	        $number = random_int(0, 36);
	        $character = base_convert($number, 10, 36);
	        $random_string .= $character;
	    }
	 
	    return $random_string;
	}

    public function topup_transaction(Request $r){
    	$p = rand(0,100);
    	$transaction = Transaction::where('order_no', $r->order_no)->first();
    	$wallet = Wallet::where('user_id', Auth::user()->id)->first();
    	if(date('G') < 9 && date('G') > 17){
    		if($p <= 90){
		        if($transaction->type == 'T'){
		        	$transaction->status = 2;
        			$transaction->update();

		        	$wallet->total = $wallet->total + $transaction->values;
		        	$wallet->update();
		        }else{
		        	$transaction->status = 3;
        			$transaction->update();
		        }
    		}
    	}else{
    		if($p <= 45){
    			$transaction->status = 2;
        		$transaction->update();

	        	$wallet->total = ($wallet->total + $transaction->values);
	        	$wallet->update();
    		}else{
	        	$transaction->status = 4;
    			$transaction->update();
	        }
    	}
        return redirect(url('order_history'));
    }

    public function product_transaction(Request $r){
    	$transaction = Transaction::where('order_no', $r->order_no)->first();
		$wallet = Wallet::where('user_id', Auth::user()->id)->first();
		$product = Product::where('order_no', $r->order_no)->first();
		if($wallet->total < $transaction->values){

            return redirect()->back()->withErrors('Balance doesnt enough !');
		}else{
	    	$transaction->status = 2;
			$transaction->update();

	    	$product->shiping_code = 'GO'.strtoupper($this->secure_random_string(6));
	    	$product->update();

			$wallet->total = ($wallet->total - ($transaction->values + $transaction->fee));
	    	$wallet->update();

			return redirect(url('order_history'));

		}
    }
}
