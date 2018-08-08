@extends('layouts.app')

@section('content')
    @permission('criar_eventos')
    <h1 class="text-success"> Adicionar Evento </h1>
    

    @if( \Session::has('message') )
        <h3 class="alert alert-success alert-dismissible fade show" role="alert">
            {{ \Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </h3>
    @endif

    @if( \Session::has('error') )
        <h3 class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ \Session::get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </h3>
    @endif
    
    @if( !isset($colaboradores) )
        <h3 class="alert alert-danger alert-dismissible fade show" role="alert">
            Nenhum reponsável ainda cadastrado
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </h3>
    @endif
    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('evento.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div id="carouselExampleControls" class="carousel slide" data-wrap="false" data-interval="100000">
            <div class="carousel-inner" >
                <div class="carousel-item active">
                    <div class="row">    
                        <div class="col-md-5">
                            <!-- Nome do Evento -->
                            <label for="exampleFormControlInput1"> Nome* </label>
                            <input id="nome" type="text" name="nome" class="form-control validate"
                            onkeyup="verifica_vazio(this.value, this.id);">
                        </div>
                        <div class="col-md-5">
                            <!-- Colaborador do Evento -->
                            <label for="exampleFormControlInput1"> Responsável* </label>
                            <select name="colaborador" class="form-control">
                                @if( isset($colaboradores) )
                                    @foreach($colaboradores as $colaborador)
                                        <option value="{{ $colaborador->id }}"> {{ $pessoas[$colaborador->id]->nome }} - {{ $colaborador->area_atuacao }} </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-2">
                            <!-- Situação do Evento -->
                            <label for="exampleFormControlInput1"> Situação* </label>
                            <select 
                                name="situacao" 
                                class="form-control" 
                                id="situacao"
                                onchange="criar_observacao(this.value)"
                            >
                                @if( isset($situacoes) )
                                    @foreach($situacoes as $situacoe)
                                        <option value="{{ $situacoe->id }}"> {{ $situacoe->nome }} </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1"> Descrição </label>
                            <textarea class="form-control" name="descricao" rows="3"></textarea>
                        </div>
                        <div class="col-md-12" id="observacao" style="display: none">
                            <label for="exampleFormControlInput1"> Observação </label>
                            <textarea class="form-control" name="observacao" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <!-- Data Inicio Evento -->
                            <input 
                                type="datetime-local" 
                                name="evento_inicio" 
                                size="20" 
                                class="form-control"
                                id="evento_inicio" 
                            >
                            <div class="invalid-feedback">
                                Por favor, digite uma data e horário para o evento
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-1">
                            <div style="margin-top: 10px; text-align: center">às</div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <!-- Data Fim Evento -->
                            <input 
                                type="datetime-local" 
                                name="evento_fim" 
                                size="20" 
                                class="form-control"
                                id="evento_fim" 
                            >
                            <div class="invalid-feedback">
                                Por favor, digite uma data e horário para o evento
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" onClick="inserir('evento_inicio', 'evento_fim')" class="btn btn-outline-success" >Inserir Data e Horário</button>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-outline-danger" id="submit" disabled><?php echo Lang::get('conteudo.add');?></button>
                        </div>

                        <div class="col-md-12">
                            <!-- Horarios adicionados -->
                            <br>
                            <h3 class="text-success"> Horários Selecionados </h3>
                            <div id="datas_horarios" class="row">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" id="previous" role="button" data-slide="prev" style="right: 50%">
                <i class="fa fa-arrow-left fa-lg text-success icon" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" id="next" role="button" data-slide="next">
                <i class="fa fa-arrow-right fa-lg text-success icon" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </form>
    @endpermission
    <br>
    <br>
    <h3 class="text-success"> Eventos </h3>
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
        <!--
        <div class="col-md-3 text-center">
            <button 
                type="submit"
                id="meus_eventos"
                class="btn btn-outline-info" 
                onClick="changeUser('.filtro', '{{ Auth::user()->name }}', this.id);" 
            >Meus Eventos</button>
        </div>
        <div class="col-md-5" id="info">
            <h3>
                Eventos >
            </h3>
        </div>
        <div class="col-md-3 text-center">
            <button type="submit" class="btn btn-outline-danger" onClick="changePesquisa('.filtro', '');" >Todos</button>
        </div>
        @foreach($situacoes as $situacoe)
        <div class="col-md-3 text-center">
            <button 
                type="submit"
                <?php
                    switch($situacoe->nome){
                        case 'Agendado':
                            echo 'class="btn btn-outline-primary"';
                            break;
                        case 'Cancelado':
                            echo 'class="btn btn-outline-danger"';
                            break;
                        case 'Realizado':
                            echo 'class="btn btn-outline-success"';
                            break;
                    }
                ?>
                onClick="changePesquisa('.filtro', '{{ $situacoe->nome }}');" 
            >{{ $situacoe->nome }}</button>
        </div>
        @endforeach
        -->
    </div>
    <div class="row" id="eventos">
        @foreach($eventos as $evento)
            <div
                <?php
                    if($cont >= 25){
                        echo " style='display: none' ";
                    }
                ?>
                class="isvalid col-md-4 {{ $pessoas[ $colaboradores[ $evento->colaborador_id ]->id ]->nome }} {{ $evento->situacao }} {{ $evento->nome_evento }} {{ date('d/m/Y h:i', strtotime($evento->fim)) }} {{ date('d/m/Y h:i', strtotime($evento->inicio)) }} filtro"
            >
                <span href="#" class=" list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"> {{ $evento->nome_evento }} </h5>
                        <small>
                            @permission('editar_eventos')
                            <a href="{{ route('evento.edit', $evento->id) }}" title="Alterar Evento">
                                <i class="fa fa-pencil icon text-success" aria-hidden="true"></i>
                            </a>
                            @endpermission
                            <a href="{{ route('evento.show', $evento->id) }}" title="Visualizar Evento">
                                <i class="fa fa-eye icon text-success" aria-hidden="true"></i>
                            </a>
                            
                            <a href="/evento/participante/{{ $evento->id }}/edit" title="Participantes">
                                <i class="fa fa-user icon text-success" aria-hidden="true"></i>
                            </a>
                        </small>
                    </div>
                    <?php
                        switch($evento->situacao){
                            case 'Agendado':
                                echo "<small class='text-primary'>".$evento->situacao."</small>";
                                break;
                            case 'Cancelado':
                                echo "<small class='text-danger'>".$evento->situacao."</small>";
                                break;
                            case 'Realizado':
                                echo "<small class='text-success'>".$evento->situacao."</small>";
                                break;
                        }
                    ?>
                    <p class="mb-1">
                        {{ date('d/m/Y h:i', strtotime($evento->inicio)) }}
                        
                        às
                        
                        {{ date('d/m/Y h:i', strtotime($evento->fim)) }}
                    </p>
                    <small>
                        Responsável: {{ $pessoas[ $colaboradores[ $evento->colaborador_id ]->id ]->nome  }}
                    </small>
                    <br>
                    @permission('excluir_eventos')
                    <a class="excluirRegistro" title="Excluir Evento">
                        <i 
                            url="/evento/remove/{{ $evento->id }}" 
                            nome="Evento"
                            excluir="{{ $evento->nome_evento }}"
                            class="fa fa-trash icon text-danger" 
                            aria-hidden="true"
                        ></i>
                    </a>
                    @endpermission
                </span>
            </div>
            <?php
                $cont++;
            ?>
        @endforeach
        
    </div>
    <nav aria-label="..." id='pagination'>
    </nav>
@endsection
<script src="/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        //paginacao( 20, 1 );
        
        paginacao( {{ $count }}, 24 );
        total_slide = 2
    });
</script>