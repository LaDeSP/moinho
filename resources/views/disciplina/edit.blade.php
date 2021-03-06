@extends('layouts.app')

@section('content')
    <h1 class="text-info"> Alterar Disciplina </h1>

    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('disciplina.update', $disciplina->id) }}" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PUT">
        {{ csrf_field() }}
        <div class="row">
            <!-- Dados Disciplina -->
            <div class="col-md-4">
                <!-- Nome da Disciplina -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name'); ?>*</label>
                <input
                    value="{{ $disciplina->nome }}"
                    type="text" 
                    name="nome" 
                    size="23" 
                    class="form-control validate is-valid" 
                    id="nome" 
                    onkeyup="verifica_vazio(this.value, this.id);"
                />
                <div class="invalid-feedback">
                    Por favor, digite o nome da disciplina
                </div>
            </div>
            <div class="col-md-4">
                <!-- Turno da Disciplina -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.shift');?>*</label>
                <select name="turno" class="form-control">
                    <option value="Matutino" 
                        <?php if(strcmp($disciplina->turno, 'morning') === 0 || strcmp($disciplina->turno, 'Matutino') === 0){echo("selected");} ?>
                    > <?php echo Lang::get('validation.attributes.morning');?>  </option>

                    <option value="Vespertino" 
                        <?php if(strcmp($disciplina->turno, 'afternoon') === 0 || strcmp($disciplina->turno, 'Vespertino') === 0){echo("selected");} ?>
                    > <?php echo Lang::get('validation.attributes.afternoon');?> </option>
                </select>
            </div>
            <div class="col-md-4">
                <!-- Sala de Aula da Disciplina -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.classroom'); ?>*</label>
                <input 
                    value="{{ $disciplina->sala_aula }}"
                    type="text" 
                    name="sala_de_aula" 
                    size="23" 
                    class="form-control validate is-valid"
                    id="sala_de_aula" 
                    onkeyup="verifica_vazio(this.value, this.id);"
                />
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
                            <option 
                                value="{{ $professor->id }}"
                                <?php
                                    if($professor->id === $disciplina->colaborador_id)
                                        echo "selected";
                                ?>
                            > {{ $nome->nome }} </option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <!-- Dia da Semana da Disciplina -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.dayWeek'); ?>*</label>
                <select name="dia_semana" class="form-control">
                    <option 
                        value="Segunda-Feira"
                        <?php if(strcmp($horario->dia_semana, 'monday') === 0 || strcmp($horario->dia_semana, 'Segunda-Feira') === 0){echo("selected");} ?>
                    > <?php echo Lang::get('conteudo.monday'); ?> </option>
                    <option 
                        value="Terça-Feira"
                        <?php if(strcmp($horario->dia_semana, 'tuesday') === 0 || strcmp($horario->dia_semana, 'Terça-Feira') === 0){echo("selected");} ?>
                    > <?php echo Lang::get('conteudo.tuesday'); ?> </option>
                    <option 
                        value="Quarta-Feira"
                        <?php if(strcmp($horario->dia_semana, 'wednesday') === 0 || strcmp($horario->dia_semana, 'Quarta-Feira') === 0){echo("selected");} ?>
                    > <?php echo Lang::get('conteudo.wednesday'); ?> </option>
                    <option 
                        value="Quinta-Feira"
                        <?php if(strcmp($horario->dia_semana, 'thursday') === 0 || strcmp($horario->dia_semana, 'Quinta-Feira') === 0){echo("selected");} ?>
                    > <?php echo Lang::get('conteudo.thursday'); ?></option>
                    <option 
                        value="Sexta-Feira"
                        <?php if(strcmp($horario->dia_semana, 'friday') === 0 || strcmp($horario->dia_semana, 'Sexta-Feira') === 0){echo("selected");} ?>
                    > <?php echo Lang::get('conteudo.friday'); ?> </option>
                </select>
            </div>
            <div class="col-md-4">
                <!-- Hora da Disciplina -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.hour'); ?>*</label>
                <input 
                    value="{{ $horario->hora }}"
                    type="time" 
                    name="hora" 
                    size="23" 
                    class="form-control validate is-valid"
                    id="hora" 
                    onkeyup="verifica_vazio(this.value, this.id);"
                >
                <div class="invalid-feedback">
                    Por favor, digite a hora da disciplina
                </div>
            </div>
            <div class="col-md-4">
                <!-- Submit -->
                <button type="submit" class="btn btn-outline-success" id="submit"> Salvar </button>
            </div>
        </div>
    </form>
@endsection

