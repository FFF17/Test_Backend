<?php $__env->startSection('content'); ?>
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
                        <?php $__empty_1 = true; $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $wallet = App\Topup_Balance::where('order_no', $value->order_no)->first();
                        ?>
                       <tr>
                           <td><?php echo e($key + 1); ?></td>
                           <td><?php echo e($value->order_no); ?></td>
                           <td>Rp. <?php echo e(number_format($value->values)); ?>,00</td>
                           <?php if($value->type == 'T'): ?>
                               <?php switch($value->status):
                                case (1): ?>
                                    <td>
                                        <a href="<?php echo e(url('/pay_order/'.$value->order_no)); ?>" class="btn btn-sm btn-primary" >Pay Now</a>
                                    </td>
                                    <?php break; ?>
                                <?php case (2): ?>
                                    <td>Success</td>
                                    <?php break; ?>
                                <?php case (3): ?>
                                    <td>Canceled</td>
                                    <?php break; ?>
                                <?php case (3): ?>
                                    <td>Failed</td>
                                    <?php break; ?>
                               <?php endswitch; ?>
                            <?php else: ?>
                            <?php
                                $product = App\Product::where('order_no', $value->order_no)->first();
                            ?>
                                <?php switch($value->status):
                                    case (1): ?>
                                        <td>
                                            <a href="<?php echo e(url('/pay_order/'.$value->order_no)); ?>" class="btn btn-sm btn-primary" >Pay Now</a>
                                        </td>
                                        <?php break; ?>
                                    <?php case (2): ?>
                                        <td>Shipping Code <b><?php echo e($product->shiping_code); ?></b></td>
                                        <?php break; ?>
                                    <?php case (3): ?>
                                        <td>Canceled</td>
                                        <?php break; ?>
                               <?php endswitch; ?>
                            <?php endif; ?>
                       </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                       <tr>
                           <td colspan="4">No Data</td>
                       </tr>
                       <?php endif; ?>

                      </table>
                      <a href="<?php echo e($transaction->previousPageUrl()); ?>">Prev</a>
                      <a href="<?php echo e($transaction->nextPageUrl()); ?>">Next</a>
                    </div>
                  </div>
               
        </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>