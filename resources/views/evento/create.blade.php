
@extends('layouts.app')

@section('content')
    <h1 class="text-success"> Adicionar Evento </h1>

    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('evento.store') }}" enctype="multipart/form-data">
        <div class="row">    
            <div class="col-md-5">
                <!-- Nome do Evento -->
                <label for="exampleFormControlInput1"> Nome* </label>
                <input id="nome" type="text" name="nome" class="form-control validate"
                onkeyup="verifica_vazio(this.value, this.id);">
            </div>
            <div class="col-md-5">
                <!-- Colaborador do Evento -->
                <label for="exampleFormControlInput1"> Colaborador* </label>
                <select name="colaborador" class="form-control">
                    @foreach($colaboradores as $colaborador)
                        <option value="{{ $colaborador->id }}"> {{ $pessoas[$colaborador->id]->nome }} - {{ $colaborador->area_atuacao }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <!-- Situação do Evento -->
                <label for="exampleFormControlInput1"> Situação* </label>
                <select name="situacao" class="form-control">
                    @foreach($situacoes as $situacoe)
                        <option value="{{ $situacoe->id }}"> {{ $situacoe->nome }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <!-- Horario do evento -->
                <div class="row">
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
                        <h5 style="margin-top: 8px; text-align: center"> ÁS </h5>
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
                        <button type="button" onClick="teste('evento_inicio', 'evento_fim')" class="btn btn-outline-success" >Inserir Data e Horário</button>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-outline-danger" id="submit" disabled><?php echo Lang::get('conteudo.add');?></button>
                    </div>
                    
                </div>
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