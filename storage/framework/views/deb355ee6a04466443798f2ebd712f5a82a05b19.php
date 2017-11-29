<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="col-md-12">
      <table id="myTable">
        <tr class="header">
          <th style="width:70%;"></th>
          <th style="width:30%;"></th>
        </tr>
        <?php $__currentLoopData = $escola; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($school->nome_fantasia); ?></td>
            <td><a class="btn btn-default">Escolas</a></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $documento_tipo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($doc_type->nome); ?></td>
            <td><a class="btn btn-default">Tipos de Documento</a></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

         <?php $__currentLoopData = $documento_tipo2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc_type2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($doc_type2->nome); ?></td>
            <td><a class="btn btn-default">Tipos de Documento</a></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

         <?php $__currentLoopData = $documento_tipo3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc_type3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($doc_type3->nome); ?></td>
            <td><a class="btn btn-default">Tipos de Documento</a></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     
      </table>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>