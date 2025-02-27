<?php $__env->startSection('content'); ?>

<!-- Start of Main Content -->
<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 pl-3"><b><?php echo e(__('Categories')); ?></b></h3>
                <a class="btn btn-primary  btn-sm" href="<?php echo e(route('back.fcategory.create')); ?>"><i class="fas fa-plus"></i> <?php echo e(__('Add')); ?></a>
                </div>
        </div>
    </div>

    

    <input type="hidden" id="table-create-data" data-icon="fas fa-plus" data-href="<?php echo e(route('back.fcategory.create')); ?>" value="<?php echo e(__('Create Category')); ?>">

	<!-- DataTales -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="table-responsive">
				<table class="table table-bordered table-striped" id="admin-table" width="100%" cellspacing="0">

					<thead>
						<tr>

              <th><?php echo e(__('Name')); ?></th>
              <th width="40%"><?php echo e(__('Text')); ?></th>
							<th><?php echo e(__('Status')); ?></th>
							<th><?php echo e(__('Actions')); ?></th>
						</tr>
					</thead>

					<tbody>
              <?php echo $__env->make('back.fcategory.table',compact('datas'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>

</div>

</div>
<!-- End of Main Content -->



  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

		<!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Confirm Delete?')); ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
		</div>

		<!-- Modal Body -->
        <div class="modal-body">
			<?php echo e(__('You are going to delete this category. All contents related with this category will be lost.')); ?> <?php echo e(__('Do you want to delete it?')); ?>

		</div>

		<!-- Modal footer -->
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

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/grupocorein/public_html/core/resources/views/back/fcategory/index.blade.php ENDPATH**/ ?>