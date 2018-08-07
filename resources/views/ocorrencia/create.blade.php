<?php 

use PHP\test;
$data = date("Y/m/d");
$data = str_replace("/","-",$data); 

$count = 0 ;
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

    <form onkeyup="verifica_submit('validate');"  method= "POST" action="{{ route('ocorrencia.store') }}" enctype="multipart/form-data" novalidate>
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <label for="exampleFormControlInput1"> Participante: *</label>
                <select name="participante_id" class="form-control">
                    @foreach(busca_participante() as $participante) 
                        <option value="{{ $participante->matricula }}"> {{ $participante->nome }} </option>
                    @endforeach
                 
                </select>
            </div>
            <div class="col-md-3">
                <label for="exampleFormControlInput1">Tipo: *</label>
                    <select name="tipo" class="form-control">
                        @foreach($tipo as $ti) 
                            <option value="{{ $ti->id }}"> {{ $ti->nome }}</option>
                        @endforeach
                    </select>
                                      
            </div>
            <div class="col-md-3">
                <label for="exampleFormControlInput1">Data da Ocorrência: *</label>
                            <input type="date" name="data" size="23" class="form-control is-valid validate" onkeyup="verifica_vazio(this.value, this.id);" 
                            id="data" value="{{$data}}" >
                            <div class="invalid-feedback">
                                Por favor, digite a data da ocorrência
                            </div>
            </div>
            <div class="col-md-12">
                            <label for="exampleFormControlInput1" >Motivo: *</label>
                            <textarea name="motivo" rows="5"  class="form-control"  required></textarea>
            </div>
            <div class="col-md-2">
                <button type="submit"  id="submit" class="btn btn-outline-danger" onClick="changeListGroup('.filtro', 'all');" disabled>Gerar Ocorrência</button>
            </div>
        </div>
        
    </form>
        <br>
        <div class="row">
                <div class="col-md-4">
                    <input
                        type="text"
                        class="form-control" 
                        value=""
                        placeholder="Pesquisa"
                        onKeyUp="changeListGroup('.filtro', this.value);"
                    >
                    </input>  
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-danger" disabled onClick="changePesquisa('.filtro', '');" >Todos</button>
                </div>
        </div>

        <div class="list-group">
            <div class="row">
                 @foreach(mostrar_ocorrencia(auth()->user()->id) as $array)
                 
                <div <?php
                if($count >= 9){
                    echo " style='display: none' ";
                }
            ?> class="isvalid col-md-4 {{ $array->status }} {{ str_replace(' ', '_', $array->data_ocorrencia) }} {{ str_replace(' ', '_', $array->nome_colaborador) }} filtro">
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
                        <small>Data:   {{ date('d/m/Y', strtotime($array->data_ocorrencia)) }}</small>                                                    
                    </span>
                </div>       
                <?php
                    $count++;
                ?>                  
                @endforeach
            </div>
        </div>
        <nav aria-label="..." id='pagination'>
            </nav>
            <br>
            <br>
        @endsection

<script src="/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        //paginacao( 20, 1 );
        paginacao( {{ $count }},8);
    });
</script>
