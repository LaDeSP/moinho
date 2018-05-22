<?php 

use PHP\test;
?>

<html>
    <head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
@extends('layouts.app')

@section('content')
<h1 class="text-danger"> Alterar Ocorrencia </h1>
@if( isset($message) )
        <h3 class="alert alert-success">
                {{ $message }}
        </h3>
    @endif
    <form 
    onkeyup="verifica_submit('validate');"
        method="POST" 
        action="{{ route('ocorrencia.update', $id) }}" 
        enctype="multipart/form-data" 
        class="needs-validation" 
        novalidate
    >
    <input name="_method" type="hidden" value="PUT">

    {{ csrf_field() }}
    <div class="row">
      
        <div class="col-md-4">
           
            <label for="exampleFormControlInput1">
                <?php echo Lang::get('validation.attributes.name'); ?> do participante
            </label>
         <input type="text" name="nomeParticipante" size="23" class="form-control"
        id="nome" value=" <?php 
        $teste = busca_ocorrencia_participante($id);
        echo $teste->nome;
   ?>" Disabled>
        </div>        
        <div class="col-md-4">
            <label for="exampleFormControlInput1">Tipo</label>
                <select name="tipo" class="form-control" >
                        @foreach($t as $tipo_geral) 
                        <option 
                            value="{{ $tipo_geral->id }}"
                            <?php
                                if($nomeOcorrencia->id === $tipo_geral->id)
                                    echo("selected");
                            ?>
                        > {{ $tipo_geral->nome}} </option>
                    @endforeach                 
                </select>            
        </div>
        <div class="col-md-4">
            <label for="exampleFormControlInput1">Data da Ocorrência</label>
                        <input type="date" name="data" size="23" class="form-control validate" onkeyup="verifica_vazio(this.value, this.id);"
                        id="data" value="{{$ocorrencia->data_ocorrencia}}" >
                        <div class="invalid-feedback">
                            Por favor, digite a data da ocorrência
                        </div>
        </div>
        <div class="col-md-4">
            <label for="exampleFormControlInput1">Registrado por:  {{$pessoa->nome}} </label>
            <input type="text" name="Colaborador" size="23" class="form-control"
            id="Colaborador" value="{{$colaborador->id}}" hidden> 
        </div>
            
                    <div class="col-md-12"  class="form-control">
                        <label for="exampleFormControlInput1">Motivo</label>
                        <textarea class="form-control" name="motivo" rows="5" onkeyup="verifica_vazio(this.value, this.id);"> {{$ocorrencia->motivo}}</textarea>
        </div>
        <div class="col-md-3">
            <!-- Submit -->
            <button disabled onClick="verifica_campo('validate');" type="submit" class="btn btn-outline-danger " id="submit"> Alterar </button>
        </div>
    </div>
    @endsection
</form>

