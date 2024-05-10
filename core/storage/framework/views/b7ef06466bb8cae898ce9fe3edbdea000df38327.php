<?php $__currentLoopData = $sitemaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sitemap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
  <td><?php echo e($sitemap->id); ?></td>
  <td><?php echo e($sitemap->sitemap_name); ?></td>
  <td>
    <div class="dropdown">
      <button class="btn btn-<?php echo e($sitemap->sitemap_status == 1 ? 'success' : 'danger'); ?> btn-sm  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo e($sitemap->sitemap_status == 1 ? __('Enabled') : __('Disabled')); ?>

      </button>
      <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="<?php echo e(route('back.sitemap.status', [$sitemap->id, 1])); ?>"><?php echo e(__('Enable')); ?></a>
        <a class="dropdown-item" href="<?php echo e(route('back.sitemap.status', [$sitemap->id, 0])); ?>"><?php echo e(__('Disable')); ?></a>
      </div>
    </div>
  </td>
  <td>
    <div class="action-list">
      <a class="btn btn-secondary btn-sm " href="<?php echo e(route('back.sitemap.edit', $sitemap->id)); ?>">
        <i class="fas fa-edit"></i>
      </a>
      <a class="btn btn-danger btn-sm " data-toggle="modal" data-target="#confirm-delete" href="javascript:;" data-href="<?php echo e(route('back.sitemap.delete', $sitemap->id)); ?>">
        <i class="fas fa-trash-alt"></i>
      </a>
    </div>
  </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/grupocorein/public_html/core/resources/views/back/settings/sitemap/table.blade.php ENDPATH**/ ?>