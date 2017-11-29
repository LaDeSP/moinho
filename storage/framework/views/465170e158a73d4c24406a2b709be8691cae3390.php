<?php $__env->startSection('content'); ?>

<?php $__currentLoopData = $matricula; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matriculaa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td> echo "<?php echo e($matriculaa->id); ?>" </td>
            <td> <a class="btn btn-default">Matriculas</a>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>