@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form method="POST" action="{{ route('post-topup') }}">
@csrf
                <h2>Prepaid Balance</h2>
        <div class="form-group">
        	    <label for="formGroupExampleInput">Mobile Number</label>

                <input class="form-control" type="text" name="mobile_no">
            </div>
                    <div class="form-group">
        	    <label for="formGroupExampleInput">Value</label>

                <input class="form-control" type="number" name="value">
            </div>
                        <button type="submit" class="btn btn-lg btn-primary" >Submit</button>
        </form>

        </div>
        </div>
    </div>
</div>
@endsection
    