<?php 

use PHP\test;
?>

<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>

    @extends('layouts.app')

@section('content')
    <h1 class="text-danger">Ocorrência </h1>
    @if( isset($message) )
        <h3 class="alert alert-success">
                {{ $message }}
        </h3>
    @endif

    <form method= "POST" action="{{ route('ocorrencia.store') }}" enctype="multipart/form-data" novalidate>
        {{ csrf_field() }}
        <div class="row">
          
            <div class="col-md-4">
               
                <!-- Inscrição -->
                <label for="exampleFormControlInput1">  <?php echo Lang::get('conteudo.registration'); ?>*</label>
                <select name="participante_id" class="form-control">
                    @foreach(busca_participante() as $participante) 
                        <option value="{{ $participante->dados_inscricao_id }}"> {{ $participante->nome }} </option>
                    @endforeach
                 
                </select>
                 
            </div>
            <div class="col-md-4">
          
                <label for="exampleFormControlInput1">Tipo*</label>
                    <select name="tipo" class="form-control">
                        @foreach($tipo as $ti) 
                            <option value="{{ $ti->id }}"> {{ $ti->nome }}</option>
                        @endforeach
                    </select>
                                      
            </div>
            <div class="col-md-4">
                 <!-- Data de Inscrição -->
                <label for="exampleFormControlInput1">Data da Ocorrência</label>
                            <input type="date" name="data" size="23" class="form-control"
                            id="data">
                            <div class="invalid-feedback">
                                Por favor, digite a data de inscricao
                </div>
            </div>
            <div class="col-md-12">
                            <label for="exampleFormControlInput1">Motivo</label>
                            <textarea name="motivo" rows="5"></textarea>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-danger" onClick="changeListGroup('.filtro', 'all');" >Gerar Ocorrência</button>
            </div>
        </div>
        <br>
        <div class="list-group">
            <div class="row">
              
                @foreach(mostrar_ocorrencia(auth()->user()->id) as $array)
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
                        <small>Ocorrencia: {{ $array->status}}</small>
                        <small>Data:  {{  $array->data_ocorrencia }}</small>
                    </span>
                </div>                         
                @endforeach
         

            </div>
          
        </div>
        @endsection
</form>