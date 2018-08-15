<?php
    $cont = 1;
    $count = 0;
    $count += count($colaboradores);
    $count += count($inscritos);
?>

@extends('layouts.app')

@section('content')


@permission('editar_participantes')
<h1 class="text-success">
    Adicionar Participante
</h1>
@if( \Session::has('message') )
    <h3 class="alert alert-success alert-dismissible fade show" role="alert">
        {{ \Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </h3>
@endif
<div class="row">
    <a class="nav-link js-scroll-trigger col-md-2" href="{{ route('evento.create')}}">
        <h4 class="blue">
            <i class="fa fa-angle-left" aria-hidden="true"></i> Voltar
        </h4>
    </a>
</div>
<section>
    <h4 class="text-success"> Pessoas </h4>
    <div class="col-md-4">
        <input
            type="text"
            class="form-control" 
            value=""
            placeholder="Pesquisa"
            onKeyUp="changeListGroup('.filtro', this.value);" id='search'
        >
        </input>  
    </div>
    <div class="row" id="eventos">
        @foreach($colaboradores as $colaborador)
            <div
                <?php
                    if($cont >= 10){
                        echo " style='display: none' ";
                    }
                ?>
                class="isvalid col-md-4 filtro {{ $colaborador->area_atuacao }} {{ $colaborador->nome }} {{ $colaborador->cpf }}"
            >
                <span href="#" class=" list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"> {{ $colaborador->nome }} </h5>
                        <small> 
                            {{ $colaborador->cpf }}
                        </small>
                    </div>
                    <small> {{ $colaborador->area_atuacao }} </small>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-outline-success" onClick="inserirParticipante('{{ $colaborador->nome }}', '{{ $colaborador->cpf }}', '{{ $colaborador->area_atuacao }}', '{{ $colaborador->id }}card', {{ $colaborador->id }})" >Adicionar</button>
                </span>
            </div>
            <?php
                $cont++;
            ?>
        @endforeach
        
        @foreach($inscritos as $inscritos)
            <div
                <?php
                    if($cont >= 10){
                        echo " style='display: none' ";
                    }
                ?>
                class="isvalid col-md-4 filtro {{ $inscritos->nome }} {{ $inscritos->cpf }} Inscrito"
            >
                <span href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"> {{ $inscritos->nome }} </h5>
                        <small> 
                            {{ $inscritos->cpf }}
                        </small>
                    </div>
                    <small> Inscrito </small>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-outline-success" onClick="inserirParticipante('{{ $inscritos->nome }}', '{{ $inscritos->cpf }}', 'Inscrito','{{ $inscritos->id }}card', {{ $inscritos->id }})" >Adicionar</button>
                </span>
            </div>
            <?php
                $cont++;
            ?>
        @endforeach
        
    </div>
    <nav aria-label="..." id='pagination'>
    </nav>
</section>
@endpermission
<section>
    <h4 class="text-success"> Participantes Adicionados </h4>
    <form method= "POST" action="/evento/participante" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input style="display: none" value="{{ $id }}" id="evento_id" type="number" name="evento_id" class="form-control">
        <div class="row" id="participantes">
            @foreach($participantes_col as $participante)
                <div class="col-md-4" id="{{ $participante->id }}card">
                    <span href="#" class=" list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1" id="{{ $participante->id }}name"> {{ $participante->nome }} </h5>
                            <small id="{{ $participante->id }}cpf"> {{ $participante->cpf }} </small>
                        </div>
                        <small id="{{ $participante->id }}tipo"> {{ $participante->area_atuacao }} </small>
                        <br>
                        <br>
                        @permission('editar_participantes')
                        <button type="button" class="btn btn-outline-danger" onClick="excluir_elemento('{{ $participante->id }}card', {{ $participante->pessoa_evento_id }})" > Excluir </button>
                        @endpermission
                        <input id="{{ $participante->id }}" style="display: none" value="{{ $participante->id }}" type="number" name="participante_id[]" class="form-control">
                        <input style="display: none" value="{{ $participante->pessoa_evento_id }}" type="number" name="evento_participante[]" class="form-control">
                    </span>
                </div>
            @endforeach
            @foreach($participantes_ins as $participante)
                <div class="col-md-4" id="{{ $participante->id }}card" >
                    <span href="#" class=" list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1" id="{{ $participante->id }}name"> {{ $participante->nome }} </h5>
                            <small id="{{ $participante->id }}cpf"> {{ $participante->cpf }} </small>
                        </div>
                        <small id="{{ $participante->id }}tipo"> Inscrito </small>
                        <br>
                        <br>
                        @permission('editar_participantes')
                        <button type="button" class="btn btn-outline-danger" onClick="excluir_elemento('{{ $participante->id }}card', {{ $participante->pessoa_evento_id }})" > Excluir </button>
                        @endpermission
                        <input id="{{ $participante->id }}" style="display: none" value="{{ $participante->id }}" type="number" name="participante_id[]" class="form-control">
                        <input style="display: none" value="{{ $participante->pessoa_evento_id }}" type="number" name="evento_participante[]" class="form-control">
                    </span>
                </div>
            @endforeach
        </div>
        @permission('editar_participantes')
        <button type="submit" class="btn btn-outline-success"> Concluir </button>
        @endpermission
        <div id="excluidos">
        </div>
    </form>
</section>

@endsection

<script src="/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        //paginacao( 20, 1 );
        paginacao( {{ $count }}, 9 );
    });
</script>