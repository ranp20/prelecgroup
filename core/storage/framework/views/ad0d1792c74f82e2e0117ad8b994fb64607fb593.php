<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr id="transaction-bulk-delete">
  <td><input type="checkbox" class="bulk-item" value="<?php echo e($data->id); ?>"></td>
  <td >
    <?php if(!$data->user->id): ?>
    <?php echo e($data->user_email); ?>

    <?php else: ?>
    <a href="<?php echo e(route('back.user.show',$data->user->id)); ?>"><?php echo e($data->user_email); ?></a>
    <?php endif; ?>
  </td>
  <td>
    <a href="<?php echo e(route('back.order.invoice',$data->order_id)); ?>"><?php echo e($data->txn_id); ?></a>
  </td>
  <?php
    $statusOrder = "";
    if($data->order->order_status == 'Pending'){
      $statusOrder = __('Pending');
    }else if($data->order->order_status == 'In Progress'){
      $statusOrder = __('In Progress');
    }else if($data->order->order_status == 'Delivered'){
      $statusOrder = __('Delivered');
    }else if($data->order->order_status == 'Canceled'){
      $statusOrder = __('Canceled');
    }else{
      $statusOrder = __('Canceled');
    }
  ?>
  <td>
    <p class="badge badge-dark"><?php echo e($statusOrder); ?></p>
  </td>
  <?php
    $statusPayment = "";
    if($data->order->payment_status == 'Paid'){
      $statusPayment = __('Paid');
    }else if($data->order->payment_status == 'Unpaid'){
      $statusPayment = __('Unpaid');
    }else{
      $statusPayment = __('Unpaid');
    }
  ?>
  <td>
    <p class="badge badge-primary"><?php echo e($statusPayment); ?></p>
  </td>
  <td>
    <?php if($setting->currency_direction == 1): ?>
    <?php echo e($data->currency_sign); ?><?php echo e(round($data->amount * $data->currency_value,2)); ?>

    <?php else: ?>
    <?php echo e(round($data->amount * $data->currency_value,2)); ?><?php echo e($data->currency_sign); ?>

    <?php endif; ?>
  </td>
  <td>
    <div class="action-list">
      <a class="btn btn-danger btn-sm " data-toggle="modal" data-target="#confirm-delete" href="javascript:;" data-href="<?php echo e(route('back.transaction.delete',$data->id)); ?>">
        <i class="fas fa-trash-alt"></i>
      </a>
    </div>
  </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/grupocorein/public_html/core/resources/views/back/transactions/table.blade.php ENDPATH**/ ?>