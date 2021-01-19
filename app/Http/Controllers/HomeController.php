<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Wallet;
use App\Product;
use App\Topup_Balance;
use App\Transaction;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallet = Wallet::where('user_id', Auth::user()->id)->first();
        return view('home')->with('wallet', $wallet);
    }

     public function top_up()
    {
    $wallet = Wallet::where('user_id', Auth::user()->id)->first();

        return view('top_up')->with('wallet', $wallet);
    }
    public function product()
    {
    $wallet = Wallet::where('user_id', Auth::user()->id)->first();

        return view('product')->with('wallet', $wallet);
    }
     public function transaction($order_no)
    {
        $wallet = Wallet::where('user_id', Auth::user()->id)->first();
        $order = Transaction::where('order_no', $order_no)->first();
        if($order->type == 'T'){
            $type_list = Topup_Balance::where('order_no', $order_no)->first();
        }else{
            $type_list = Product::where('order_no', $order_no)->first();
        }

        return view('transaction')->with(['wallet' => $wallet, 'order'=> $order, 'type_list'=> $type_list]);
    }
    public function pay_order($order_no)
    {
        $wallet = Wallet::where('user_id', Auth::user()->id)->first();
        $order = Transaction::where('order_no', $order_no)->first();

        return view('pay_order')->with(['wallet' => $wallet, 'order' => $order]);
    }
     public function order_history()
    {
        date_default_timezone_set('Asia/Jakarta');
        $transaction_all = Transaction::where('user_id', Auth::user()->id)->get();
        $transaction = Transaction::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(20);

        foreach($transaction_all as $value){
            $datetime1 = date_create($value->created_at);
            $datetime2 = date_create(date("c"));
           
            $interval = date_diff($datetime1, $datetime1);
            
            if($interval->format('%i') > 5 && ($value->status = 1)){
                $value->status = 3;
                $value->update();
            }
        }
        return view('order_history')->with(['transaction' => $transaction]);
    }
   /* public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
 
            // mengambil data dari table pegawai sesuai pencarian data
        $transaction_all = Transaction::where('user_id', Auth::user()->id)->get();
        $transaction = Transaction::where('user_id', Auth::user()->id)->where('order_no','like',"%".$cari."%")
->paginate();
        
 
            // mengirim data pegawai ke view index
        return view('order_history')->with(['transaction' => $transaction]);
 
    }*/
}
