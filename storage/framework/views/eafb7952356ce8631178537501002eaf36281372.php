;

<?php $__env->startSection('content'); ?>
    <h1>Criar Nova Turma</h1>

    <form method= "POST" action="<?php echo e(route('NomeTurma.store')); ?>" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="col-md-4">
        
        
        <span> Nome: <input type="text" name="nome"></span></br>
       
    
        </div>
        <input type="submit">
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>