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
    <style>
    input[type="radio"] {
        -ms-transform: scale(1.4); /* IE 9 */
        -webkit-transform: scale(1.4); /* Chrome, Safari, Opera */
        transform: scale(1.4);
    }
    </style> 

    <div class="cold-m-8">
        <h1 class="text-warning">Advertência</h1>
        @if( isset($message) )
        <h3 class="alert alert-success">
                {{ $message }}
        </h3>
    </div>
    @endif
    <!-- Criar advertências -->
    <form method= "POST" onkeyup="verifica_submit('validate');"  action="{{ route('advertencia.store') }}" enctype="multipart/form-data" novalidate>
        {{ csrf_field() }}

        <div class="row">
                <div class="col-md-6">
                      
                <label for="exampleFormControlInput1">Ocorrência: *</label>
                    <select name="ocorrencia_id" class="form-control">
                            @foreach(listar_ocorrencias() as $array)
                           
                                @if($role->name != 'social' && $array->tipo_ocorrencia_advertencia !== 4) <!-- GARANTE QUE A OCORRÊNCIA DO TIPO ABUSO NÃO APAREÇA PARA O ADM -->
                                 <option value="{{  $array->ocorrencia_id }}"> {{ $array->nome_colaborador }} - {{ date('d/m/Y', strtotime($array->data_ocorrencia)) }} ({{$array->status}})</option>
                                
                                @endif
                                @if($role->name === 'social')
                                <option value="{{  $array->ocorrencia_id }}"> {{ $array->nome_colaborador }} - {{ date('d/m/Y', strtotime($array->data_ocorrencia))}} ({{$array->status}})</option>
                                @endif
                            @endforeach
                    </select>                
            </div>
            
            <div class="col-md-2">
                <label for="exampleFormControlInput1">Tipo: *</label>
                    <select name="tipo" class="form-control">
                        @foreach($tipo as $ti) 
                            <option value="{{ $ti->id }}"> {{ $ti->nome }}</option>
                        @endforeach
                    </select>                
            </div>
            <div class="col-md-3">
                <!-- Data da Advertência -->
            <label for="exampleFormControlInput1">Data da Advertência: *</label>
                        <input type="date" name="data" size="23"  class="form-control validate" 
            id="data" value="{{$data}}" onkeyup="verifica_vazio(this.value, this.id);" >
                <div class="invalid-feedback">
                    Por favor, digite a data da advertência
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                    <!-- Nome do Agressor -->
                    <label><?php echo Lang::get('validation.attributes.name');?> do agressor: <b><small>(opcional) </small></b></label>
                    <input type="text" name="nome" value="" id="nome" size="23" class="form-control">
            </div>

            <div class="col-md-4">
            <!-- Chamar Responsável -->
            <label for="exampleFormControlInput1">Providências: *</label>
                    <select name="providencia" class="form-control">
                        <option value="0"> </option>
                        <option value="2"> Notificação  </option>
                        <option value="3"> Assinatura do Responsável </option>
                        <option value="1"> Assinatura e Presença do Responsável </option>

                    </select>
            </div>
           
        </div>
        <div class="row">
                    <div class="col-md-12">
                            <label for="">Observação: <small><b>(opcional) será colocado no termo da advertência</b></small></label>
                            <textarea name="observacao" rows="5"></textarea>
                    </div>
        </div>
            <div class="col-md-2">
                <button disabled type="submit" class="btn btn-outline-danger" id="submit" onClick="changeListGroup('.filtro', 'all');" >Gerar Advertência</button>
            </div>
        
        </form>    
        <!-- fim do formulario --><br>
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
                
                    @if($role->name != 'social')
                        @foreach(mostrar_advertencias() as $array)
                            <div <?php
                            if($count >= 9){
                                echo " style='display: none' ";
                            }
                        ?>class="isvalid col-md-4 {{ $array->status }} {{ str_replace(' ', '_', $array->data_advertencia) }} {{ str_replace(' ', '_', $array->nome_colaborador) }} filtro">
     
                            <span href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $array->nome_colaborador }}</h5>
                                        <small>
                                            <a href="{{ route('advertencia.edit', $array->advertencia_id)}}">
                                                <i class="fa fa-pencil icon text-warning" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('advertencia.show', $array->advertencia_id)}}">
                                                <i class="fa fa-eye icon text-warning" aria-hidden="true"></i>
                                            </a>
                                        </small>
                                    </div>
                                    <small>Advertência: {{ $array->status }}</small>
                                    <small>Data:   {{ date('d/m/Y', strtotime($array->data_advertencia)) }}</small>
                                </span>
                                <br>
                            </div>
                            <?php   $count++; ?> 
                            @endforeach
                    @endif
                
                    @if($role->name === 'social')
                    @foreach(mostrar_advertencias_social() as $array)
                            <div <?php
                            if($count >= 9){
                                echo " style='display: none' ";
                            }
                        ?>class="isvalid col-md-4 {{ $array->status }} {{ str_replace(' ', '_', $array->data_advertencia) }} {{ str_replace(' ', '_', $array->nome_colaborador) }} filtro">
     
                            <span href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $array->nome_colaborador }}</h5>
                                    <small>
                                        <a href="{{ route('advertencia.edit', $array->advertencia_id)}}">
                                            <i class="fa fa-pencil icon text-warning" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('advertencia.show', $array->advertencia_id)}}">
                                            <i class="fa fa-eye icon text-warning" aria-hidden="true"></i>
                                        </a>
                                    </small>
                                </div>
                                <small>Ocorrencia: {{ $array->status }}</small>
                                <small>Data:   {{ date('d/m/Y', strtotime($array->data_advertencia)) }}</small>
                            </span>
                            <br>
                            </div>
                            <?php   $count++; ?> 
                            @endforeach
                    @endif 
                                           
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

