@extends('layouts.app')

@section('content')

    <h1 class="text-success"> Adicionar Evento </h1>

    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('evento.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">    
            <div class="col-md-5">
                <!-- Nome do Evento -->
                <label for="exampleFormControlInput1"> Nome* </label>
                <input 
                    id="nome" 
                    type="text" 
                    value="{{ $evento->nome }}"
                    name="nome" 
                    class="form-control"
                    onkeyup="verifica_vazio(this.value, this.id);" 
                    readonly
                >
            </div>
            <div class="col-md-5">
                <!-- Colaborador do Evento -->
                <label for="exampleFormControlInput1"> Colaborador* </label>
                <select name="colaborador" class="form-control" readonly>
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
                <select name="situacao" class="form-control" readonly>
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
            <div class="col-md-12">
                <label for="exampleFormControlInput1"> Descrição </label>
                <textarea class="form-control" name="descricao" rows="3" readonly>{{ $evento->descricao }}</textarea>
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
            inserir_criados(periodos[i].entrada, periodos[i].saida, 0, periodos[i].id);   
        }
        total_slide = 3
    });
    
</script>