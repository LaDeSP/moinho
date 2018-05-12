<?php 

use PHP\test;
?>

<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>

    @extends('layouts.app')

@section('content')
    <style>
    input[type="radio"] {
        -ms-transform: scale(1.4); /* IE 9 */
        -webkit-transform: scale(1.4); /* Chrome, Safari, Opera */
        transform: scale(1.4);
    }
    </style> 

<form method= "POST" action="{{ route('advertencia.store') }}" enctype="multipart/form-data" novalidate>
    {{ csrf_field() }}
    <div class="cold-m-8">
        <h1 class="text-warning">Advertência</h1>
        @if( isset($message) )
        <h3 class="alert alert-success">
                {{ $message }}
        </h3>
    @endif
        <div class="row">
            <div class="col-md-4">
                <label for="exampleFormControlInput1">Tipo*</label>
                    <select name="tipo" class="form-control">
                        @foreach($tipo as $ti) 
                            <option value="{{ $ti->id }}"> {{ $ti->nome }}</option>
                        @endforeach
                    </select>                
            </div>
            <div class="col-md-4">
                <!-- Data da Advertência -->
            <label for="exampleFormControlInput1">Data da Advertência*</label>
                        <input type="date" name="data" size="23" class="form-control"
                        id="data">
                        <div class="invalid-feedback">
                            Por favor, digite a data da advertência
                        </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                    <!-- Nome do Agressor -->
                    <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name');?> do agressor <small>(opcional)</small></label>
                    <input type="text" name="nome" value="" id="nome" size="23" class="form-control validate"
                    onkeyup="verifica_vazio(this.value, this.id);">
            </div>
        <div class="col-md-4">
            <!-- Chamar Responsável -->
            <label for="exampleFormControlInput1">Chamar Responsável*</label>
                <div class="form-check" >
                    <input class="form-check-input" type="radio" name="responsavel" id="exampleRadios1" value="1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                        Sim
                        </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="responsavel" id="exampleRadios2" value="0">
                        <label class="form-check-label" for="exampleRadios2">
                        Não
                        </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <label for="exampleFormControlInput1">Observação: <small>(opcional)</small></label>
                    <textarea name="observacao" rows="5"></textarea>
            </div>
        </div>
        <div class="col-md-2">
                <button type="submit" class="btn btn-outline-warning" onClick="changeListGroup('.filtro', 'all');" >Gerar Advertência</button>
            </div>
        
        <div class="list-group">
            <div class="row">        
                @foreach(mostrar_ocorrencias() as $array)
                    @if($role->name === 'administrador' && $array->tipo_ocorrencia_advertencia !== 4)
                        <div class="col-md-4 {{ $array->participante_id }} {{ str_replace(' ', '_', $array->data_ocorrencia) }} {{ str_replace(' ', '_', $array->colaborador_id) }} filtro">
                            <span href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $array->nome_colaborador }}</h5>
                                    <small>
                                        <a href="{{ route('ocorrencia.edit', $array->ocorrencia_id)}}">
                                            <i class="fa fa-pencil icon text-danger" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('ocorrencia.show', $array->ocorrencia_id)}}">
                                            <i class="fa fa-eye icon text-danger" aria-hidden="true"></i>
                                        </a>
                                    </small>
                                </div>
                                <small>Ocorrencia: {{ $array->status }}</small>
                                <small>Data:   {{ date('d/m/Y', strtotime($array->data_ocorrencia)) }}</small>
                            </span>
                            <br>
                            <button type="submit" class="btn btn-outline-danger" href="{{ route('advertencia.create', $array->ocorrencia_id)}}" onClick="changeListGroup('.filtro', 'all');" >Gerar Advertência</button>
                        </div>
                    @endif
                    @if($role->name === 'social' && $array->tipo_ocorrencia_advertencia === 4)
                        <div class="col-md-4 {{ $array->participante_id }} {{ str_replace(' ', '_', $array->data_ocorrencia) }} {{ str_replace(' ', '_', $array->colaborador_id) }} filtro">
                            <span href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $array->nome_colaborador }}</h5>
                                    <small>
                                        <a href="{{ route('ocorrencia.edit', $array->ocorrencia_id)}}">
                                            <i class="fa fa-pencil icon text-danger" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('ocorrencia.show', $array->ocorrencia_id)}}">
                                            <i class="fa fa-eye icon text-danger" aria-hidden="true"></i>
                                        </a>
                                    </small>
                                </div>
                                <small>Ocorrencia: {{ $array->status }}</small>
                                <small>Data:   {{ date('d/m/Y', strtotime($array->data_ocorrencia)) }}</small>
                            </span>
                            <br>
                            <button type="submit" class="btn btn-outline-danger" href="{{ route('advertencia.create', $array->ocorrencia_id)}}" onClick="changeListGroup('.filtro', 'all');" >Gerar Advertência</button>
                        </div>
                    @endif
                            
                @endforeach
            </div>
        </div>
    </div>
    
@endsection

