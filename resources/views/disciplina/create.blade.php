@extends('layouts.app')

@section('content')
    <h1 class="text-info"><?php echo Lang::get('conteudo.registerDiscipline'); ?></h1>

    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('disciplina.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <!-- Dados Disciplina -->
            <div class="col-md-4">
                <!-- Nome da Disciplina -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name'); ?></label>
                <input type="text" name="nome" size="23" class="form-control validate" 
                id="nome" onkeyup="verifica_vazio(this.value, this.id);">
                <div class="invalid-feedback">
                    Por favor, digite o nome da disciplina
                </div>
            </div>
            <div class="col-md-4">
                <!-- Turno da Disciplina -->
                <label for="exampleFormControlInput1"> Turno da Disciplina (Estático) </label>
                <input type="text" name="turno" size="23" class="form-control validate"
                id="turno" onkeyup="verifica_vazio(this.value, this.id);">
                <div class="invalid-feedback">
                    Por favor, digite o turno da disciplina
                </div>
            </div>
            <div class="col-md-4">
                <!-- Sala de Aula da Disciplina -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.classroom'); ?></label>
                <input type="text" name="sala_de_aula" size="23" class="form-control validate"
                id="sala_de_aula" onkeyup="verifica_vazio(this.value, this.id);">
                <div class="invalid-feedback">
                    Por favor, digite a sala da disciplina
                </div>
            </div>
            <div class="col-md-4">
                <!-- Professor da Disciplina -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.teacher'); ?></label>
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
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.dayWeek'); ?></label>
                <input type="text" name="dia_semana" size="23" class="form-control validate"
                id="dia_semana" onkeyup="verifica_vazio(this.value, this.id);">
                <div class="invalid-feedback">
                    Por favor, digite o dia da semana da disciplina
                </div>
            </div>
            <div class="col-md-4">
                <!-- Hora da Disciplina -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.hour'); ?></label>
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
@endsection

