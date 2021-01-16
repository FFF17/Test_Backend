@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<form method="POST" action="{{ route($order->type == 'T' ? 'topup-transaction' : 'product-transaction') }}">
			@csrf
            	@if($errors->any())
		            <h5 class="text-danger">{{$errors->first()}}</h5>
		        @endif
                <h2>Pay Order</h2>
       
                    <div class="form-group">
        	    <label for="formGroupExampleInput">Order No</label>

                <input class="form-control" type="text" name="order_no" value="{{$order->order_no}}">
            </div>
                        <button type="submit" class="btn btn-lg btn-primary" >Submit</button>
</form>
        </div>
        </div>
    </div>
</div>
@endsection
    