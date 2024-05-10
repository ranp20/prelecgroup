<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<title><?php echo e($setting->title); ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
	<link rel="icon" href="<?php echo e(asset('assets/images/'.$setting->favicon)); ?>" type="image/x-icon"/>
	<script type="text/javascript" src="<?php echo e(asset('assets/back/js/plugin/webfont/webfont.min.js')); ?>"></script>
	<script id="setFont" data-src="<?php echo e(asset('assets/back/css/fonts.css')); ?>" src="<?php echo e(asset('assets/back/js/plugin/webfont/setfont.js')); ?>"></script>
	<link rel="preload" href="<?php echo e(asset('assets/back/css/styles.min.css')); ?>" as="style">
	<link id="mainStyles" rel="stylesheet" media="screen" href="<?php echo e(asset('assets/back/css/styles.min.css')); ?>">
</head>
<body class="login">
  <?php echo $__env->yieldContent('content'); ?>
	<?php
		$mainbs = [];
		$mainbs['is_announcement'] = $setting->is_announcement;
		$mainbs['announcement_delay'] = $setting->announcement_delay;
		$mainbs['overlay'] = $setting->overlay;
		$mainbs = json_encode($mainbs);
	?>
	<script type="text/javascript" src="<?php echo e(asset('assets/back/js/core/jquery.3.6.0.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('assets/back/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('assets/back/js/core/popper.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/back/js/core/bootstrap.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/back/js/ready.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/back/js/login.js')); ?>"></script>
</body>
</html><?php /**PATH /home/grupocorein/public_html/core/resources/views/master/back-login.blade.php ENDPATH**/ ?>