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
       <a class="navbar-brand" href="#">Demo of Race Result</a>
    </nav>

   <div class="container">
    <br style="clear:both;" /><br />
      <br /><br /><br />
       <div class="panel panel-default">
            <div class="panel-heading">
              <div class="pull-left">
                    <h2>
                      List of Active Race : 
                      <?php echo count($raceDetailsArr) > 0 ? "0" : ""; ?> 
                    </h2>
              </div>


                  <br  style="clear:both;" /> <br />

                  <?php if(isset($raceDetailsArr)): ?>
                    <?php $__currentLoopData = $raceDetailsArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $race): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <table class="table table-bordered" style="width:45%;float:left; margin-right:5%;">

                        <thead>   
                          <tr>
                            <td colspan="4">
                              <strong>
                                <?php echo e('Race No. ' .  $race->race_id); ?>

                              </strong>
                            </td>
                          </tr>
                          <tr>
                            <th>Horse Id</th>
                            <th>Distance Covered</th>
                            <th>Horse Position</th>
                            <th>Current time</th>
                          </tr>
                        </thead>
                        <tbody>
                              <?php $__currentLoopData = $race->raceDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rDetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td><?php echo e($rDetails->horse_name); ?></td>
                                <td><?php echo e($rDetails->distance_covered); ?></td>
                                <td><?php echo e($rDetails->position); ?></td>
                                <td><?php echo e($rDetails->cur_time); ?></td>
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </tbody>
                    </table>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php else: ?>

                    <?php endif; ?>

    <br style="clear:both;" /><br />



                     <div class="panel panel-default">
                  <div class="panel-heading">
                      <h2>Latest Race Results</h2>
                  </div>

                  <div class="panel-body">
                      <table class="table table-bordered">
                          <thead>   
                            <tr>
                              <th>Race Number</th>
                              <th>Race Status</th>
                              <th>Distance</th>
                              <th>Date Created</th>
                              <th>Date Updated</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                              <tbody>
                                <?php $__currentLoopData = $raceResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frace): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td>
                                    <a href="<?php echo e(url('viewRace')); ?>"
                                      onclick="window.open('<?php echo e(url('viewRaceDetails') . "/" . $frace->race_id); ?>', 
                                         'newwindow', 
                                         'width=500,height=500,top=200,left=300,right=300'); 
                                          return false;"    
                                    >
                                    <?php echo e($frace->race_id); ?>

                                    </a>
                                  </td>
                                  <td>
                                   <?php if($frace->race_status==0): ?>
                                      Not Yet Started     
                                  <?php elseif($frace->race_status==1): ?>
                                      Started 
                                  <?php elseif($frace->race_status==2): ?>   
                                      Completed  
                                  <?php endif; ?>
                                  </td>
                                  <td><?php echo e($frace->race_distance . " meters"); ?></td>
                                  <td><?php echo e($frace->created_at); ?></td>
                                  <td><?php echo e($frace->updated_at); ?></td>
                                  <td>
                                    <a class="btn btn-warning btn-xs" href="<?php echo e(url('viewRace')); ?>"
                                      onclick="window.open('<?php echo e(url('viewRaceDetails') . "/" . $frace->race_id); ?>', 
                                         'newwindow', 
                                         'width=500,height=500,top=200,left=300,right=300'); 
                                          return false;"    
                                    >
                                    View Results
                                    </a>
                                  </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </tbody>
                       </table> 
                  </div>
             </div>  

             <div class="panel panel-default">
                  <div class="panel-heading">
                      <h2>Horse with Best Time</h2>
                  </div>


                  <div class="panel-body">
                      <table class="table table-bordered">
                          <thead>   
                            <tr>
                              <th>Race Number</th>
                              <th>Horse Name</th>
                              <th>Speed</th>
                              <th>Strength</th>
                              <th>Endurance</th>
                              <th>Distance Covered</th>
                              <th>Duration</th>
                              <th>Race Date</th>
                            </tr>
                          </thead>
                          <tbody>

  
                              <?php if(count($horseWithBestTime) > 0): ?>
                                  <tr>
                                      <td><?php echo e($horseWithBestTime{0}->race_id); ?></td>
                                      <td><?php echo e($horseWithBestTime{0}->horse_name); ?></td>
                                      <td><?php echo e($horseWithBestTime{0}->horse_speed); ?></td>
                                      <td><?php echo e($horseWithBestTime{0}->horse_strength); ?></td>
                                      <td><?php echo e($horseWithBestTime{0}->horse_endurance); ?></td>
                                      <td><?php echo e($horseWithBestTime{0}->distance_covered); ?></td>
                                      <td><?php echo e($horseWithBestTime{0}->cur_time); ?></td>
                                      <td><?php echo e($horseWithBestTime{0}->raceDate); ?></td>
                                  </tr>  
                              <?php endif; ?>

                          </tbody>        
                    </table>        
                 </div>     
            </div>


            </div>  
        </div>        
    </div>

  </body>
</html>
