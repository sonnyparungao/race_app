<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>


<?php if(session('error')): ?>
    <div class="alert alert-danger" style="color: red;">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>

