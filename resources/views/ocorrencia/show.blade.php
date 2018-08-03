<?php 

use PHP\test;
?>

<html>
    <head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
@extends('layouts.app')

@section('content')
<h1 class="text-danger"> Visualizar Ocorrencia </h1>
    <div class="text-right">
        <a href="{{ route('ocorrencia.edit', $ocorrencia->id)}}">
            <i class="fa fa-pencil icon text-danger" aria-hidden="true"></i>
        </a>
    </div>
    {{ csrf_field() }}
    <div class="row">
         <?php 
        //passando o id da ocorrencia
         $teste = busca_ocorrencia_participante($ocorrencia->id); 
       ?>
      
        <div class="col-md-4">
           
            <label for="exampleFormControlInput1">
                <?php echo Lang::get('validation.attributes.name'); ?> do participante
            </label>
            <input type="text" name="participante_id" size="23" class="form-control validate"
        id="nome" value="{{$ocorrencia->participante_id}}" hidden="hidden" disabled> <!-- id da ocorrencia (ocorrencia.id) -->
            <input type="text" name="nomeParticipante" size="23" class="form-control validate"
            id="nome" value="{{$teste[0]->nome_participante}} " Disabled>
        </div>
      
        <div class="col-md-4">
                <label for="exampleFormControlInput1">Tipo</label>
                    <select name="tipo" class="form-control" disabled>
                            @foreach($t as $tipo_geral) 
                            <option 
                                value="{{ $tipo_geral->id }}"
                                <?php
                                    if($ocorrencia->tipo_ocorrencia_advertencia === $tipo_geral->id)
                                        echo("selected");
                                ?>
                            > {{ $tipo_geral->nome}} </option>
                        @endforeach                 
                    </select>                                
            </div>
        <div class="col-md-4">
             <!-- Data de Inscrição -->
            <label for="exampleFormControlInput1">Data da Ocorrência</label>
                        <input type="date" name="data" size="23" class="form-control"
                        id="data" value="{{$ocorrencia->data_ocorrencia}}" disabled>
                        <div class="invalid-feedback">
                            Por favor, digite a data de inscricao
            </div>
        </div>
        <div class="col-md-4">
            <label for="exampleFormControlInput1">Registrado por:  {{$pessoa->nome}} </label>
            <input type="text" name="Colaborador" size="23" class="form-control validate"
            id="Colaborador" value="{{$ocorrencia->colaborador_id}}" hidden> 
        </div>
            
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1">Motivo</label>
                        <textarea class="form-control" name="motivo" rows="5" disabled> {{$ocorrencia->motivo}}</textarea>
            </div>
    </div>
    @permission('excluir-ocorrencias')
    <div class="text-right">
        <a class="excluirRegistro" title="Excluir Ocorrência">
            <i 
                url="/ocorrencia/remove/{{ $ocorrencia->id }}" 
                nome="Ocorrência" 
                class="fa fa-trash icon text-danger" 
                aria-hidden="true"
            ></i>
        </a>
    </div>
    @endpermission
</form>
    @endsection


