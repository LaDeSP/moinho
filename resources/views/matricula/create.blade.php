<?php

$data = date("Y/m/d");
$data = str_replace("/","-",$data);

?>

<script type="text/javascript">
  
</script>

@extends('layouts.app')

@section('content')
    <h1 class="text-success"> 
    <?php echo Lang::get('conteudo.enrolment'); ?>
    </h1>
    @if( !count( busca_nome_inscrito() ) )
        <h3 class="alert alert-danger alert-dismissible fade show" role="alert">
            Nenhuma inscrito cadastrado
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </h3>
    @endif

    <!-- Criar matricula -->
    @permission('criar-matricula')
    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('matricula.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <!-- Inscrição -->
                <label for="exampleFormControlInput1">  <?php echo Lang::get('conteudo.registration'); ?>*</label>
                <select name="inscricao_id" class="form-control">
                    @foreach(busca_nome_inscrito() as $inscricao) 
                        <option value="{{ $inscricao->id }}"> {{ $inscricao->nome }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <!-- Data -->
                <label for="exampleFormControlInput1"> <?php echo Lang::get('conteudo.dateRegistration'); ?>*</label>
                <input type="date" name="data" size="23" id="data" class="form-control validate is-valid"
                value='{{ $data }}' onkeyup="verifica_vazio(this.value, this.id);">
            </div>

            <!-- Segunda Linha -->
            <div class="col-md-4">
                <!-- Turno -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.shift');?>*</label>
                <select name="turno" class="form-control">
                    <option value="morning"> <?php echo Lang::get('validation.attributes.morning');?>  </option>
                    <option value="afternoon"> <?php echo Lang::get('validation.attributes.afternoon');?> </option>
                </select>
            </div>
            <div class="col-md-4">
                <!-- Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.turma'); ?>*</label>
                <select name="turma_id" class="form-control">
                    @foreach(busca_turma() as $turma) 
                        <option value="{{ $turma->id }}"> {{ $turma->nome_turma }} - {{$turma->ano}} </option><!--aqui tava dando merda pq tava turma_id as turma, dai imprimia a string da função em vez do turma->nome. Assim, imprimia a função toda. Mais algum BO que esqueci -->
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <!-- Status -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.status'); ?>*</label>
                <select name="status" class="form-control">
                    @foreach($status as $stat) 
                        <option value="{{ $stat->id }}"> {{ $stat->status }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12">
                <br>
                <button id="submit" type="submit" class="btn btn-outline-success" <?php if( !count( busca_nome_inscrito() ) ) echo 'disabled'; ?> ><?php echo Lang::get('conteudo.add'); ?></button>
            </div>
        </div>
    </form>
    @endpermission

<section class="">
    <div>
        @permission('ver-matriculas-regulares')
        <div>
            <h4 class="text-success">
                <?php echo Lang::get('conteudo.listRegular'); ?>            
            </h4>
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
                    <button type="submit" class="btn btn-outline-success" onClick="changeListGroup('.filtro', '');" >Todos</button>
                </div>
            </div>
            <br>
            <div class="list-group " id="body_regular">
                <div class="row">
                
                    @foreach($matricula as $mat)
                        @if(date('Y', strtotime($mat->data)) >= date('Y'))    
                            @foreach(busca_inscricao2($mat->inscricao_id) as $inscricao)
                                @foreach(busca_dados($inscricao->dados_inscricao_id) as $dados)
                                    @foreach (busca_pessoa($dados->dados_pessoais_id) as $pessoa)
                                        @foreach (buscar_turma($mat->turma_id) as $turma)
                                            @foreach (buscar_nometurma($turma->nome_turma_id) as $nometurma)
                                                <div
                                                    <?php
                                                        if($cont >= 25){
                                                            echo " style='display: none' ";
                                                        }
                                                    ?>
                                                    class="isvalid col-md-4 col-sm-6 {{ $status[ $mat->status_matricula_id ]->status }} {{ date('d/m/Y', strtotime($mat->data)) }} {{ $turma->ano }} {{ str_replace(' ', '_', $pessoa->nome) }} {{ str_replace(' ', '_', $nometurma->nome_turma) }} filtro"
                                                    id="{{ $mat->id }}"
                                                >
                                                    <span href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                                        <div class="d-flex w-100 justify-content-between">
                                                            <h5 class="mb-1">{{ $pessoa->nome }}</h5>
                                                            <small>
                                                                @permission('criar-matricula')
                                                                    <a href="{{ route('matricula.edit', $mat->id)}}">
                                                                        <i class="fa fa-pencil icon text-success" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="{{ route('matricula.show', $mat->id)}}">
                                                                        <i class="fa fa-eye icon text-success" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="/termo/imagem/{{ $mat->id }}">
                                                                        <i class="fa fa-file-text icon text-success" aria-hidden="true"></i>
                                                                    </a>
                                                                @endpermission
                                                            </small>
                                                        </div>
                                                        <small> {{ $status[ $mat->status_matricula_id ]->status }} </small>
                                                        <br>
                                                        <small>{{ ucfirst($nometurma->nome_turma) }}</small>,
                                                        <small>{{ $turma->ano }}</small>
                                                        <br>
                                                        <small>Data: {{ date('d/m/Y', strtotime($mat->data)) }}</small>
                                                    </span>
                                                </div>
                                                <?php
                                                    $cont++;
                                                ?>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
            <br>
            <br>
        </div>
        <nav aria-label="..." id='pagination'>
        </nav>
        @endpermission
    </div>
</section>
@endsection

<script src="/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        paginacao( {{$count}} , 24 );
    });
</script>