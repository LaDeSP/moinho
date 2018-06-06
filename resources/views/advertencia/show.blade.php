<?php 

use PHP\test;

?>

<html>
    <head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
@extends('layouts.app')

@section('content')

<h1 class="text-warning"> Visualizar Advertência </h1>
    <div class="text-right">
        <a href="{{ route('advertencia.edit', $id)}}">
            <i class="fa fa-pencil icon text-warning" aria-hidden="true"></i>
        </a>
    </div>
    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('escola.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-md-4">
                <label for="exampleFormControlInput1">
                    <?php echo Lang::get('validation.attributes.name'); ?> do participante
                </label>
                        <input type="text" name="participante_id" size="23" class="form-control validate"
                    id="nome" value="{{$id}}" hidden="hidden" disabled> <!-- id da ocorrencia (ocorrencia.id) -->
                        <input type="text" name="nomeParticipante" size="23" class="form-control validate"
                        id="nome" value=" <?php 
                        $teste = busca_ocorrencia_participante($advertencia->ocorrencia_id);
                        echo $teste->nome;
                ?>" Disabled>
            </div>
            <div class="col-md-4">
                    <label for="exampleFormControlInput1">Tipo</label>
                        <select name="tipo" class="form-control" disabled>
                                @foreach($t as $tipo_geral) 
                                <option 
                                    value="{{ $tipo_geral->id }}"
                                    <?php
                                        if($nomeAdvertencia->id === $tipo_geral->id)
                                            echo("selected");
                                    ?>
                                > {{ $tipo_geral->nome}} </option>
                            @endforeach                 
                        </select>                                
            </div>
            <div class="col-md-4">
                   <label for="exampleFormControlInput1">Data da Ocorrência</label>
                               <input type="date" name="data" size="23" class="form-control"
                               id="data" value="{{$advertencia->data_advertencia}}" disabled>
                               <div class="invalid-feedback">
                                   Por favor, digite a data da ocorrência
                             </div>
            </div>

        </div>
            <div class="row">
                <div class="col-md-4">
                        <!-- Nome do Agressor -->
                        <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name');?> do agressor: <small>(opcional)</small></label>
                    <input type="text" name="nome" value="{{$advertencia->agressor}}" id="nome" size="23" class="form-control" disabled>
                </div>
                <div class="col-md-4">
                        <!-- Chamar Responsável -->
                        <label for="exampleFormControlInput1">Chamar Responsável*</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="responsavel" id="exampleRadios1" value="1" <?php if($advertencia->responsavel_assina == 1)echo("checked");?> >
                                    <label class="form-check-label" for="exampleRadios1">
                                    Sim
                                    </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="responsavel"  id="exampleRadios2" value="0" <?php if($advertencia->responsavel_assina == 0) echo("checked"); ?>>
                                    <label class="form-check-label" for="exampleRadios2">
                                    Não
                                    </label>
                            </div>
                </div>
            </div>
                    <div class="row">
                            <div class="col-md-4">
                                    <label for="exampleFormControlInput1">Advertência gerada por:  {{$pessoa->nome}} </label>
                                    <input type="text" name="Colaborador" size="23" class="form-control validate"
                                    id="Colaborador" value="{{$colaborador->id}}" hidden> 
                            </div>
                    </div>
                <div class="row">
                    <div class="col-md-12">
                            <label for="exampleFormControlInput1">Observação: <small>(opcional)</small></label>
                    <textarea name="observacao" rows="5" disabled> {{$advertencia->observacao}}</textarea>
                    </div>
                </div>
                @permission('excluir-advertencias')

                <div class="text-right">
                    <a href="/advertencia/remove/{{ $id }}">
                        <i class="fa fa-trash icon text-warning" aria-hidden="true"></i>
                    </a>
                </div>
                @endpermission
               <?php $ocorrencia = busca_ocorrencia_participante($advertencia->ocorrencia_id); ?> 

               <h3 class="text-danger"> Ocorrência associada </h3>
               <!-- Imprimir a ocorrência que resultou na advertência -->
                   <div class="row">
                       <div class="col-md-4">
                       Data da ocorrencia: {{ date('d/m/Y', strtotime($ocorrencia->data_ocorrencia))}}
                       </div>
                       <div class="col-md-2">
                               Tipo: {{$ocorrencia->tipo}}
                       </div>
                       <div class="col-md-4">
                               Ocorrência gerada por: {{$ocorrencia->name}}
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-md-8">
                           Motivo: {{$ocorrencia->motivo}}
                       </div>
                   </div>    
           </div>
        @endsection

