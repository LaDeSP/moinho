@extends('layouts.app')

@section('content')
    <h1 class="text-info"><?php echo Lang::get('conteudo.registerDiscipline'); ?></h1>

    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('disciplina.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <!-- Dados Disciplina -->
            <div class="col-md-4">
                <!-- Nome da Disciplina -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name'); ?>*</label>
                <input type="text" name="nome" size="23" class="form-control validate" 
                id="nome" onkeyup="verifica_vazio(this.value, this.id);">
                <div class="invalid-feedback">
                    Por favor, digite o nome da disciplina
                </div>
            </div>
            <div class="col-md-4">
                <!-- Turno da Disciplina -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.shift');?>*</label>
                <select name="turno" class="form-control">
                    <option value="morning"> <?php echo Lang::get('validation.attributes.morning');?>  </option>
                    <option value="afternoon"> <?php echo Lang::get('validation.attributes.afternoon');?> </option>
                </select>
            </div>
            <div class="col-md-4">
                <!-- Sala de Aula da Disciplina -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.classroom'); ?>*</label>
                <input type="text" name="sala_de_aula" size="23" class="form-control validate"
                id="sala_de_aula" onkeyup="verifica_vazio(this.value, this.id);">
                <div class="invalid-feedback">
                    Por favor, digite a sala da disciplina
                </div>
            </div>
            <div class="col-md-4">
                <!-- Professor da Disciplina -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.teacher'); ?>*</label>
                <select name="colaborador_id" class="form-control">
                    @foreach($colaborador as $professor) 
                        @foreach(busca_pessoa($professor->pessoa_id) as $nome)
                            <option value="{{ $professor->id }}"> {{ $nome->nome }} </option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <!-- Dia da Semana da Disciplina -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.dayWeek'); ?>*</label>
                <select name="dia_semana" class="form-control">
                    <option value="monday"> <?php echo Lang::get('conteudo.monday'); ?> </option>
                    <option value="tuesday"> <?php echo Lang::get('conteudo.tuesday'); ?> </option>
                    <option value="wednesday"> <?php echo Lang::get('conteudo.wednesday'); ?> </option>
                    <option value="thursday"> <?php echo Lang::get('conteudo.thursday'); ?></option>
                    <option value="friday"> <?php echo Lang::get('conteudo.friday'); ?> </option>
                </select>
            </div>
            <div class="col-md-4">
                <!-- Hora da Disciplina -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.hour'); ?>*</label>
                <input type="time" name="hora" size="23" class="form-control validate"
                id="hora" onkeyup="verifica_vazio(this.value, this.id);">
                <div class="invalid-feedback">
                    Por favor, digite a hora da disciplina
                </div>
            </div>
            <div class="col-md-4">
                <!-- Submit -->
                <button type="submit" class="btn btn-outline-danger" id="submit" disabled><?php echo Lang::get('conteudo.add'); ?></button>
            </div>
        </div>
    </form>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            <input
                type="text"
                class="form-control" 
                value=""
                placeholder="Pesquisa"
                onchange="changeListGroup('.filtro', this.value);"
            >
            </input>  
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-info" onClick="changeListGroup('.filtro', 'all');" >Todos</button>
        </div>
    </div>
    <div class="list-group">
        <div class="row">
            @foreach(buscar_disciplina() as $array)
                <div class="col-md-4 {{ $array->sala_aula }} {{  str_replace(' ', '_', $array->nome) }} {{  str_replace(' ', '_', $array->nome_colaborador) }} filtro">
                    <span href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $array->nome }}</h5>
                            <small>
                                <a href="#" id="{{ $array->id }}">
                                    <i class="fa fa-pencil icon text-info" aria-hidden="true"></i>
                                </a>
                            </small>
                        </div>
                        <small>{{ ucfirst($array->turno) }}</small>,
                        <small>{{ $array->sala_aula }}</small>
                        <br>
                        <small>{{ $array->nome_colaborador }}</small>
                    </span>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    <br>
@endsection

