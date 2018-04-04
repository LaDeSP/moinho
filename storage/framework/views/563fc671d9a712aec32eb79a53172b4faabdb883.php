;

<?php $__env->startSection('content'); ?>
    <h1>Realizar Matricula</h1>

    <form method= "POST" action="<?php echo e(route('matricula.store')); ?>" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="col-md-4">
        
        <span>Inscricao:
        <select name="inscricao_id">
        <?php $__currentLoopData = busca_inscricao(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscricao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <option value="<?php echo e($inscricao->id); ?>"> <?php echo e($inscricao->nome); ?> </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select> </br>
        </span>
      <!-- <span> Turno: <input type="text" name="turno"></span></br>-->
        <span> Período: <input type="text" name="periodo"></span></br>
        <span> Data: <input type="date" name="data"></span></br>
        <span> Turma:
        <select name="turma_id">
        
        <?php $__currentLoopData = busca_turma(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <option value="<?php echo e($turma->id); ?>"> <?php echo e($turma->nome); ?> - <?php echo e($turma->turno); ?> </option><!--aqui tava dando merda pq tava turma_id as turma, dai imprimia a string da função em vez do turma->nome. Assim, imprimia a função toda. Mais algum BO que esqueci -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select> </br>
        </span>
        <span> Status:
        <select name="status">
        
        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <option value="<?php echo e($stat->id); ?>"> <?php echo e($stat->status); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select> </br>
        </span>
        </div>
        <input type="submit">
    </form>
<?php $__env->stopSection(); ?>

<!--
<?php
/* 
               $a = json_decode(busca_turma());
                for ($i = 0; $i < count($a); $i++) { 
                ?>
                     <option value= '<?php echo $a[$i]->id; ?>' > <?php echo $a[$i]->nome.' - '.$a[$i]->turno; ?> </option>
                <?php
            } isso começando dentro de todo o foreach
            */ 
        ?>
-->
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>