<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <h2>Success</h2>
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th>Order No</th>
              <th><?php echo e($order->order_no); ?></th>
            </tr>
           <tr>
                <th>Total</th>
                <th>Rp. <?php echo e(number_format($order->values + $order->fee)); ?>,00</th>
           </tr>
           

          </table>

        </div>
        <div class="col-md-8">
            <?php if($order->type == 'P'): ?>
                <p><?php echo e($type_list->product_name); ?> that costs Rp. <?php echo e(number_format($type_list->price)); ?>,00 will be shipped to:</p>
                <p><?php echo e($type_list->shiping_address); ?></p>
                <p>Only after you pay</p>
            <?php else: ?>
                <p>Your mobile phone number +62-<?php echo e($type_list->mobile_no); ?> will receive 
                    Rp. <?php echo e(number_format($type_list->value)); ?>,00</p>
            <?php endif; ?>
          <a href="<?php echo e(url('/pay_order/'.$order->order_no)); ?>" class="btn btn-lg btn-primary" >Pay</a>
        </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>