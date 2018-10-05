<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      
    </head>
   <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
       <a class="navbar-brand" href="#">Demo</a>
    </nav>

   <div class="container">
    <br /><br /><br />
        <form id="frmRaceProgress" method="post" action="<?php echo e(url('processRace')); ?>">
            <?php echo e(csrf_field()); ?>

             <input type="hidden" name="hdRaceId" value="<?php echo e($horses[0]->race_id); ?>" />   
             <input type="submit" value="Process" class="btn btn-primary" />
        </form>     <br />
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Horse Name</th>
                    <th>Distance Covered</th>
                    <th>Speed</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $horses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($horse->horse_name); ?></td>
                    <td><?php echo e($horse->distance_covered); ?></td>
                    <td><?php echo e($horse->horse_speed); ?></td>
                  </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>

    </div>

  </body>
</html>
