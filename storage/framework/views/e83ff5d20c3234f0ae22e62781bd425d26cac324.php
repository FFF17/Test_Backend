<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form method="POST" action="<?php echo e(route('post-topup')); ?>">
<?php echo csrf_field(); ?>
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
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>