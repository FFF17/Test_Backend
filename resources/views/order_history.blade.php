@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-body">
                    
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>#</th>
                          <th>Order No</th>
                          <th>Price</th>
                          <th>Status</th>
                        </tr>
                        @forelse($transaction as $key => $value)
                        <?php
                            $wallet = App\Topup_Balance::where('order_no', $value->order_no)->first();
                        ?>
                       <tr>
                           <td>{{$key + 1}}</td>
                           <td>{{$value->order_no}}</td>
                           <td>Rp. {{number_format($value->values)}},00</td>
                           @if($value->type == 'T')
                               @switch($value->status)
                                @case(1)
                                    <td>
                                        <a href="{{url('/pay_order/'.$value->order_no)}}" class="btn btn-sm btn-primary" >Pay Now</a>
                                    </td>
                                    @break
                                @case(2)
                                    <td>Success</td>
                                    @break
                                @case(3)
                                    <td>Canceled</td>
                                    @break
                                @case(3)
                                    <td>Failed</td>
                                    @break
                               @endswitch
                            @else
                            <?php
                                $product = App\Product::where('order_no', $value->order_no)->first();
                            ?>
                                @switch($value->status)
                                    @case(1)
                                        <td>
                                            <a href="{{url('/pay_order/'.$value->order_no)}}" class="btn btn-sm btn-primary" >Pay Now</a>
                                        </td>
                                        @break
                                    @case(2)
                                        <td>Shipping Code <b>{{$product->shiping_code}}</b></td>
                                        @break
                                    @case(3)
                                        <td>Canceled</td>
                                        @break
                               @endswitch
                            @endif
                       </tr>
                       @empty
                       <tr>
                           <td colspan="4">No Data</td>
                       </tr>
                       @endforelse

                      </table>
                      <a href="{{$transaction->previousPageUrl()}}">Prev</a>
                      <a href="{{$transaction->nextPageUrl()}}">Next</a>
                    </div>
                  </div>
               
        </div>
        </div>
    </div>
</div>
@endsection
    