
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="card mb-4">
    <div class="card-body">
      <div class="d-sm-flex align-items-center justify-content-between">
        <h3 class=" mb-0bc-title"><b><?php echo e(__('Sitemaps')); ?></b></h3>
        <a class="btn btn-primary  btn-sm" href="<?php echo e(route('back.sitemap.add')); ?>"><i class="fas fa-plus"></i> <?php echo e(__('Add')); ?></a>
      </div>
    </div>
  </div>
	<div class="card shadow mb-4">
		<div class="card-body">
			<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="table-responsive">
				<table class="table table-bordered table-striped" id="admin-table" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th><?php echo e(__('ID')); ?></th>
              <th><?php echo e(__('Name')); ?></th>
              <th><?php echo e(__('Status')); ?></th>
              <th><?php echo e(__('Actions')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php echo $__env->make('back.settings.sitemap.table',compact('sitemaps'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>            
          </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Confirm Delete?')); ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
		    </div>
        <div class="modal-body">
			  <?php echo e(__('You are going to delete this map. All content related to this map will be lost.')); ?> <?php echo e(__('Do you want to delete it?')); ?>

		    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
          <form action="" class="d-inline btn-ok" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger"><?php echo e(__('Delete')); ?></button>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/grupocorein/public_html/core/resources/views/back/settings/sitemap/index.blade.php ENDPATH**/ ?>