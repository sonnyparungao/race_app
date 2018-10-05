<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
<br /><br />
<table class="table table-bordered">
    <thead>   
      <tr>
        <th>Horse Name</th>
        <th>Distance Covered</th>
        <th>Horse Position</th>
        <th>Duration</th>
      </tr>
    </thead>
    <tbody>
          <?php $__currentLoopData = $raceDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rDetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($rDetails->horse_name); ?></td>
            <td><?php echo e($rDetails->distance_covered); ?> meters</td>
            <td><?php echo e($rDetails->position); ?></td>
            <td><?php echo e($rDetails->cur_time); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </tbody>
</table>
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
