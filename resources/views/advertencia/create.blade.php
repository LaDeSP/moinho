<?php 

use PHP\test;
?>

<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>

    @extends('layouts.app')

@section('content')

    <h1 class="text-warning">Advertência </h1>

    <div class="col-md-4">
          
        <label for="exampleFormControlInput1">Tipo*</label>
            <select name="tipo" class="form-control">
                @foreach($tipo as $ti) 
                    <option value="{{ $ti->id }}"> {{ $ti->nome }}</option>
                @endforeach
            </select>
              <!-- 
                @foreach(busca_nome_inscrito() as $inscricao) 
                    <option value="{{ $inscricao->id }}"> {{ $inscricao->nome }} </option>
                @endforeach 
            -->           
            A advertencia vai imprimir toda ocorrencia do lado esquerdo.

            No lado direito teremos a advertencia sendo aplicada
            
    </div>
    <div class="list-group">
        <div class="row">
          
            @foreach(mostrar_advertencia() as $array)
            <div class="col-md-4 {{ $array->participante_id }} {{ str_replace(' ', '_', $array->data_ocorrencia) }} {{ str_replace(' ', '_', $array->colaborador_id) }} filtro">
                <span href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $array->participante_id }}</h5>
                        <small>
                            <a href="{{ route('ocorrencia.edit', $array->ocorrencia_id)}}">
                                <i class="fa fa-pencil icon text-danger" aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('ocorrencia.show', $array->ocorrencia_id)}}">
                                <i class="fa fa-eye icon text-danger" aria-hidden="true"></i>
                            </a>
                        </small>
                    </div>
                    <small> Ocorrencia {{ $array->status}}</small>
                    <small>Data:  {{  $array->data_ocorrencia }}</small>
                    <small> Colaborador: {{ $array->nome_colaborador }}</small>
                    
                </span>
            </div>
                        
               
            @endforeach
        </div>
@endsection
