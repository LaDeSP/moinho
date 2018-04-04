;

<?php $__env->startSection('content'); ?>
    <h1>Cadastrar Turma</h1>

    <form method= "POST" action="<?php echo e(route('turma.store')); ?>" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="col-md-4">
        
        <span>Nome:
        <select name="turma">
        <?php $__currentLoopData = $nome; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <option value="<?php echo e($turma->id); ?>"> <?php echo e($turma->nome); ?> </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select> </br>
        </span>
        <span> Turno: <input type="text" name="turno"></span></br>
        
    
        </div>
        <input type="submit">
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>