<?php
    $cont = 1;
    $count = 0;
    $count += count($colaboradores);
    $count += count($inscritos);
?>

@extends('layouts.app')

@section('content')

<h1 class="text-success">
    Adicionar Participante
</h1>
<section>
    <h4 class="text-success"> Pessoas </h4>
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
    <div class="row" id="eventos">
        @foreach($colaboradores as $colaborador)
            <div
                <?php
                    if($cont >= 4){
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
                    <button type="submit" class="btn btn-outline-success" onClick="inserirParticipante('{{ $colaborador->nome }}', '{{ $colaborador->cpf }}', '{{ $colaborador->area_atuacao }}', {{ $colaborador->id }})" >Adicionar</button>
                </span>
            </div>
            <?php
                $cont++;
            ?>
        @endforeach
        @foreach($inscritos as $inscritos)
            <div
                <?php
                    if($cont >= 4){
                        echo " style='display: none' ";
                    }
                ?>
                class="isvalid col-md-4 filtro"
            >
                <span href="#" class=" list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"> {{ $inscritos->nome }} </h5>
                        <small> 
                            {{ $inscritos->cpf }}
                        </small>
                    </div>
                    <small> Inscrito </small>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-outline-success" onClick="inserirParticipante('{{ $inscritos->nome }}', '{{ $inscritos->cpf }}', 'Inscrito', {{ $inscritos->id }})" >Adicionar</button>
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
<section>
    <h4 class="text-success"> Participantes Adicionados </h4>
    <form method= "POST" action="/evento/participante" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input style="display: none" value="{{ $id }}" id="evento_id" type="number" name="evento_id" class="form-control">
        <div class="row" id="participantes">
        
        </div>
        <button type="submit" class="btn btn-outline-success"> Concluir </button>
    </form>
</section>

@endsection

<script src="/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        //paginacao( 20, 1 );
        paginacao( {{ $count }}, 3 );
    });
</script>