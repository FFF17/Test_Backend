<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form method="POST" action="<?php echo e(route('post-product')); ?>">
            <?php echo csrf_field(); ?>
            <h2>Product Page</h2>
            <div class="form-group">
        	    <label for="formGroupExampleInput">Product</label>

                <textarea class="form-control" id="exampleFormControlTextarea1" name="product_name" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput">Shipping Address</label>

                <textarea class="form-control" id="exampleFormControlTextarea1" name="shiping_address" rows="3"></textarea>
            </div>
            <div class="form-group">
        	    <label for="formGroupExampleInput">Price</label>

                <input class="form-control" type="number" name="price">
            </div>
            <button type="submit" class="btn btn-lg btn-primary" >Submit</button>
        </form>
        </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>