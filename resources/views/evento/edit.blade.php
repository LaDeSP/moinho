@extends('layouts.app')

@section('content')

    <h1 class="text-success"> Alterar Evento </h1>

    @if( \Session::has('message') )
        <h3 class="alert alert-success alert-dismissible fade show" role="alert">
            {{ \Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </h3>
    @endif

    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('evento.update', $id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        <div class="row">    
            <div class="col-md-5">
                <!-- Nome do Evento -->
                <label for="exampleFormControlInput1"> Nome* </label>
                <input 
                    id="nome" 
                    type="text" 
                    value="{{ $evento->nome }}"
                    name="nome" 
                    class="form-control validate is-valid"
                    onkeyup="verifica_vazio(this.value, this.id);"
                >
            </div>
            <div class="col-md-5">
                <!-- Colaborador do Evento -->
                <label for="exampleFormControlInput1"> Colaborador* </label>
                <select name="colaborador" class="form-control">
                    @foreach($colaboradores as $colaborador)
                        <option 
                            value="{{ $colaborador->id }}"
                            <?php 
                                if($colaborador->id === $evento->colaborador_id)
                                    echo 'selected';
                            ?>
                        > {{ $pessoas[$colaborador->id]->nome }} - {{ $colaborador->area_atuacao }} </option>
                    @endforeach
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
                    @foreach($situacoes as $situacoe)
                        <option 
                            value="{{ $situacoe->id }}"
                            <?php 
                                if($situacoe->id === $evento_situacao->situacao_id)
                                    echo 'selected';
                            ?>
                        > {{ $situacoe->nome }} </option>
                    @endforeach
                </select>
            </div>
            <!-- Descrição -->
            <div class="col-md-12">
                <label for="exampleFormControlInput1"> Descrição </label>
                <textarea class="form-control" name="descricao" rows="3" >{{ $evento->descricao }}</textarea>
            </div>
            <!-- Observação -->
            <div 
                class="col-md-12" 
                id="observacao" 
                @if($evento_situacao->situacao_id != 2)
                    style="display: none"
                @endif
            >
                <label for="exampleFormControlInput1"> Observação </label>
                <textarea class="form-control" name="observacao" rows="3"> {{ $evento_situacao->observacao }} </textarea>
            </div>
            <div class="col-sm-4">
                <!-- Data Participante -->
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

            <div class="col-sm-1">
                <div style="margin-top: 10px; text-align: center">às</div>
            </div>

            <div class="col-sm-4">
                <!-- Data Participante -->
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
            <div class="col-md-3">
                <button type="button" onClick="inserir('evento_inicio', 'evento_fim')" class="btn btn-outline-success" >Inserir Data e Horário</button>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-outline-success" id="submit" > Alterar </button>
            </div>

            <div class="col-md-12">
                <!-- Horarios adicionados -->
                <br>
                <h3 class="text-success"> Horários Selecionados </h3>
                <div id="datas_horarios" class="row">
                </div>
            </div>
        </div>
    </form>

    

@endsection

<script src="/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function(){

        var periodos = [];
        @foreach($periodos as $periodo)
            nova_entrada = new Date( '{{ $periodo->inicio }}' );
            nova_entrada = nova_entrada.getDate()+`/`+( nova_entrada.getMonth()+1 )+`/`+nova_entrada.getFullYear()+' '+nova_entrada.getHours()+':'+nova_entrada.getMinutes();
            nova_saida = new Date( '{{ $periodo->fim }}' );
            nova_saida = nova_saida.getDate()+`/`+( nova_saida.getMonth()+1 )+`/`+nova_saida.getFullYear()+' '+nova_saida.getHours()+':'+nova_saida.getMinutes();
            periodos.push({
                id: {{ $periodo->id }},
                inicio: nova_entrada,
                fim: nova_saida,
                entrada: '{{ $periodo->fim }}',
                saida: '{{ $periodo->inicio }}'
            });
        @endforeach

        //console.log(periodos);

        for(i = 0; i < {{ count($periodos) }}; i++){
            inserir_criados(periodos[i].entrada, periodos[i].saida, 1, periodos[i].id);   
        }
    });
    
</script>