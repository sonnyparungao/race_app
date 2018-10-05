<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h2>List of Horses</h2>
                </div>

                <div class="panel-body">
                     <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Horse Name</th>
                            <th>Speed</th>
                            <th>Strength</th>
                            <th>Endurance</th>
                            <th>Jockey Name</th>
                            <th>Status</th>
                            <th>Date Created</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $horses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td><?php echo e($horse->horse_name); ?></td>
                                <td><?php echo e($horse->horse_speed); ?></td>
                                <td><?php echo e($horse->horse_strength); ?></td>
                                <td><?php echo e($horse->horse_endurance); ?></td>
                                <td><?php echo e($horse->jockey_name); ?></td>
                                <td><?php echo e($horse->is_racing == 0 ? "Available" : "In-race"); ?></td>
                                <td><?php echo e($horse->created_at); ?></td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php if(count($horses) > 0): ?>
                      <div class="pull-right">
                          <?php echo e($horses->links()); ?>

                      </div>  
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>