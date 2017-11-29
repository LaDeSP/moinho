<?php $__env->startSection('content'); ?>
<br><br><br>
  <div class="row">
    <div class="col-md-12">
      <table id="myTable">
        <tr class="header">
          <th style="width:70%;"></th>
          <th style="width:30%;"></th>
        </tr>
        <tbody>
        <td><b>Numero da Matrícula</b></td>
        <td><b>Nome do Aluno</b></td>
        
        <?php $__currentLoopData = $matricula; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      	<tr>
        <?php if($mat->status_matricula_id != 1): ?>
       
              
      		<?php $__currentLoopData = busca_inscricao2($mat->inscricao_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscricao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><!-- logica é essa. só colocar os campos certos pra impressão e deu-->
      			<?php $__currentLoopData = busca_dados($inscricao->dados_inscricao_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dados): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      				<?php $__currentLoopData = busca_pessoa($dados->dados_pessoais_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pessoa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      				 <td><?php echo e($mat->id); ?></td>
       				 <td><?php echo e($pessoa->nome); ?></td>

      				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      			
      		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
      	
     
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
     
      </table>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>