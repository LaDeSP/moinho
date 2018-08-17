<?php
    $cont = 1;
    $ano_atual = date('Y');
?>

@extends('layouts.app')

@section('content')
    <h1 class="text-warning"><?php echo Lang::get('conteudo.class');?></h1>

    @if( $disciplinas == 0 )
        <h3 class="alert alert-danger alert-dismissible fade show" role="alert">
            Nenhuma disciplina cadastrada
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </h3>
    @endif

    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('turma.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <!-- Dados da Turma -->
            <div class="col-md-4">
                <!-- Nome da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name'); ?>*</label>
                <input id="nome" type="text" name="turma" class="form-control validate"
                onkeyup="verifica_vazio(this.value, this.id);">
            </div>
            <div class="col-md-3 mb-3">
                <!-- Turno da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.shift');?>*</label>
                <select name="turno" class="form-control">
                    <option value="morning"> <?php echo Lang::get('validation.attributes.morning');?>  </option>
                    <option value="afternoon"> <?php echo Lang::get('validation.attributes.afternoon');?> </option>
                </select>
            </div>
            <div class="col-md-2">
                <!-- Ano da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.year'); ?>*</label>
                <input type="year" value="{{ $ano_atual }}" id="ano" name="ano" size="23" class="form-control validate is-valid"
                onkeyup="verifica_vazio(this.value, this.id);">
                <div class="invalid-feedback">
                    Por favor, digite o ano da turma
                </div>
            </div>
            <div class="form-group col-md-2">
                <!-- Periodo da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.semester');?>*</label>
                <select name="periodo" class="form-control">
                    <option value="1"> 1º </option>
                    <option value="2"> 2º </option>
                </select>
            </div>
            <div class="col-md-4">
                <!-- Submit -->
                <button type="submit" class="btn btn-outline-danger" id="submit" disabled><?php echo Lang::get('conteudo.add');?></button>
            </div>
        </div>   
    </form>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            <input
                type="text"
                name="selecao_ano" 
                id="selecao_ano_regular" 
                class="form-control" 
                value=""
                placeholder="Pesquisa"
                onKeyUp="changeListGroup('.filtro', this.value);" id='search'
            >
            </input>  
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-warning" onClick="changeSearch('search', '');" >Todos</button>
        </div>
    </div>
    <div class="list-group">
        <div class="row lista">
            @foreach(busca_turma() as $array)
                <div 
                    <?php
                        if($cont >= 25){
                            echo " style='display: none' ";
                        }
                    ?>  
                    class="col-md-4 {{ $array->ano }} {{ str_replace(' ', '_', $array->nome_turma) }} filtro"
                    id="{{ $array->id }}"
                >
                    <span href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $array->nome_turma }}</h5>
                            <small>
                                <a href="{{ route('turma.edit', $array->id)}}">
                                    <i class="fa fa-pencil icon text-warning" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('turma.show', $array->id)}}">
                                    <i class="fa fa-eye icon text-warning" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('turma_disciplina.edit', $array->id)}}" title="Disciplinas">
                                    <i class="fa fa-book icon text-warning" aria-hidden="true"></i>
                                </a>
                            </small>
                        </div>
                        <small>{{ ucfirst( Lang::get('conteudo.'.$array->turno) ) }}</small>,
                        <small>{{ $array->ano }}</small>
                        <br>
                        <small>Periodo: {{ $array->periodo }}°</small>
                    </span>
                </div>
                <?php
                    $cont++;
                ?>  
            @endforeach
        </div>
    </div>
    <nav aria-label="..." id='pagination'>
    </nav>
    <br>
    <br>
@endsection

<script src="{{ getenv('APP_URL') }}/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        paginacao( {{$count}} , 24 );
    });
</script>