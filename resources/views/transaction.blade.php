@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <h2>Success</h2>
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th>Order No</th>
              <th>{{$order->order_no}}</th>
            </tr>
           <tr>
                <th>Total</th>
                <th>Rp. {{number_format($order->values + $order->fee)}},00</th>
           </tr>
           

          </table>

        </div>
        <div class="col-md-8">
            @if($order->type == 'P')
                <p>{{$type_list->product_name}} that costs Rp. {{number_format($type_list->price)}},00 will be shipped to:</p>
                <p>{{$type_list->shiping_address}}</p>
                <p>Only after you pay</p>
            @else
                <p>Your mobile phone number +62-{{$type_list->mobile_no}} will receive 
                    Rp. {{number_format($type_list->value)}},00</p>
            @endif
          <a href="{{url('/pay_order/'.$order->order_no)}}" class="btn btn-lg btn-primary" >Pay</a>
        </div>
        </div>
    </div>
</div>
@endsection
    