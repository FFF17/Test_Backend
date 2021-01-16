<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<form method="POST" action="<?php echo e(route($order->type == 'T' ? 'topup-transaction' : 'product-transaction')); ?>">
			<?php echo csrf_field(); ?>
            	<?php if($errors->any()): ?>
		            <h5 class="text-danger"><?php echo e($errors->first()); ?></h5>
		        <?php endif; ?>
                <h2>Pay Order</h2>
       
                    <div class="form-group">
        	    <label for="formGroupExampleInput">Order No</label>

                <input class="form-control" type="text" name="order_no" value="<?php echo e($order->order_no); ?>">
            </div>
                        <button type="submit" class="btn btn-lg btn-primary" >Submit</button>
</form>
        </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>