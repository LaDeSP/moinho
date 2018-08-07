<?php 

use PHP\test;

$ocorrencia = busca_ocorrencia_participante($id);
?>

<html>
    <head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
@extends('layouts.app')

@section('content')
<?php 
$teste = busca_ocorrencia_participante($advertencia->ocorrencia_id);
?> 

    <h1 class="text-warning"> Alterar Advertência </h1>
        @if( isset($message) )
            <h3 class="alert alert-success">
                    {{ $message }}
            </h3>
        @endif
    <form 
        onkeyup="verifica_submit('validate');"
            method="POST" 
            action="{{ route('advertencia.update', $id) }}" 
            enctype="multipart/form-data" 
            class="needs-validation" 
            novalidate
        >

    <input name="_method" type="hidden" value="PUT">

    {{ csrf_field() }}
        <div class="row">
            <div class="col-md-4">
                <label for="exampleFormControlInput1">
                    <?php echo Lang::get('validation.attributes.name'); ?> do participante:
                </label>
                        <input type="text" name="participante_id" size="23" class="form-control" id="id_participante" value="{{$teste[0]->participante_id}}" hidden disabled> <!-- id DO PARTICIPANTE -->
                        <input type="text" name="nomeParticipante" size="23" class="form-control" id="nome_participante" value="{{$teste[0]->nome_participante}}"Disabled>
            </div>
            <div class="col-md-4">
                    <label for="exampleFormControlInput1">Tipo: *</label>
                        <select name="tipo" class="form-control" >
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
                   <label for="exampleFormControlInput1">Data da Advertência: *<small> <b>(data que será colocada no termo)</b></small></label>
                               <input type="date" name="data" size="23"  class="form-control validate"  onkeyup="verifica_vazio(this.value, this.id);"
                               id="data" value="{{$advertencia->data_advertencia}}" >
                               <div class="invalid-feedback">
                                   Por favor, digite a data da advertência
                             </div>
            </div>

        </div>
            <div class="row">
                <div class="col-md-4">
                        <!-- Nome do Agressor -->
                        <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name');?> do agressor: <small><b>(opcional)</b></small></label>
                    <input type="text" name="agressor" value="{{$advertencia->agressor}}" id="agressor" size="23" class="form-control">
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
                            <input class="form-check-input" type="radio" name="responsavel"  id="exampleRadios2" value="0" <?php if($advertencia->responsavel_assina == 0) echo("checked"); ?> >
                                    <label class="form-check-label" for="exampleRadios2">
                                    Não
                                    </label>
                            </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-4">
                            <label for="exampleFormControlInput1">Advertência gerada por:  {{$pessoa->nome}} </label>
                            <input type="text" name="Colaborador" size="23" class="form-control"
                            id="Colaborador" value="{{$colaborador->id}}" hidden> 
                    </div>
            </div>
            <div class="row">
                    <div class="col-md-12">
                            <label for="exampleFormControlInput1">Observação: <small><b>(opcional) *poderá ser colocado no termo da advertência</b></small></label>
                    <textarea name="observacao" rows="5" > {{$advertencia->observacao}}</textarea>
                    </div>
            </div>
            <div class="col-md-3">
                    <!-- Submit -->
                    <button disabled onClick="verifica_campo('validate');" type="submit" class="btn btn-outline-danger " id="submit"> Alterar </button>
                </div>
        
    </div>

@endsection

