@extends('layouts.app')

@section('content')


<h1 class="text-warning"> Visualizar Turma</h1>
<div class="text-right">
  <a href="{{ route('turma.edit', $id)}}">
      <i class="fa fa-pencil icon text-warning" aria-hidden="true"></i>
  </a>
</div>

<form onkeyup="verifica_submit('validate');" method= "UPDATE" action="{{ route('turma.update', $id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <!-- Dados da Turma -->
        <div class="col-md-4">
            <!-- Nome da Turma -->
            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name'); ?>*</label>
            <select name="turma" class="form-control" Disabled>
                @foreach($nome as $nome_turma) 
                    <option 
                        value="{{ $nome_turma->id }}"
                        <?php
                            if($turma->id === $nome_turma->id)
                                echo("selected");
                        ?>
                    > {{ $nome_turma->nome_turma }} </option>
                @endforeach
            </select> 
        </div>
        <div class="col-md-3 mb-3">
            <!-- Turno da Turma -->
            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.shift');?>*</label>
            <select value="{{ $turma->turno }}" name="turno" class="form-control" Disabled>
                
                <option value="morning" 
                    <?php if(strcmp($turma->turno, 'morning') === 0){echo("selected");} ?>
                > <?php echo Lang::get('validation.attributes.morning');?>  </option>

                <option value="afternoon" 
                    <?php if(strcmp($turma->turno, 'afternoon') === 0){echo("selected");} ?>
                > <?php echo Lang::get('validation.attributes.afternoon');?> </option>
                
            </select>
        </div>
        <div class="col-md-2">
            <!-- Ano da Turma -->
            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.year'); ?>*</label>
            <input type="year" value="{{ $turma->ano }}" id="ano" name="ano" size="23" class="form-control validate"
            onkeyup="verifica_vazio(this.value, this.id);" Disabled>
            <div class="invalid-feedback">
                Por favor, digite o ano da turma
            </div>
        </div>
        <div class="form-group col-md-2">
            <!-- Periodo da Turma -->
            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.semester');?>*</label>
            <select value="{{ $turma->periodo }}" name="periodo" class="form-control" Disabled>
                <option value="1"> 1º </option>
                <option value="2"> 2º </option>
            </select>
        </div>
    </div>   
</form>

<section>
    @if(count($disciplinas) != 0)
        <h1 class="text-warning"> Disciplinas Adicionadas</h1>
    @endif
    <div class="text-right">
        <a href="{{ route('turma_disciplina.edit', $id)}}" title="Disciplinas">
            <i class="fa fa-book icon text-warning" aria-hidden="true"></i>
        </a>
    </div>
    <div class="row">
        @foreach($disciplinas as $disciplina)
        <div class="col-md-3">
            <span class="list-group-item list-group-item-action flex-column align-items-start ">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $disciplina->nome }}</h5>
                </div>
            </span>
        </div>
        @endforeach
    </div>
</section>

@endsection