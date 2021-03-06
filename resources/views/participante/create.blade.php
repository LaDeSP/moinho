@extends('layouts.app')

@section('content')
    
    <h1 class="text-success"><?php echo Lang::get('conteudo.addPartipant');?></h1>

    <!-- Relatório -->
    <div style="margin-bottom: 20px">
        <!-- Adicionar filtros -->
        <a href="{{ url('/relatorio_participante')}}"  class="btn btn-outline-info"><?php echo Lang::get('conteudo.participantReport');?></a>
    </div>
    <form method= "POST" action="{{ route('participante.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <!-- Dados do Participante -->
            <div class="col-md-4">
                <!-- Nome do Participante -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.grade');?></label>
                <input type="text" name="serie" size="23" class="form-control">
            </div>
            <div class="col-md-4">
                <!-- Sala de Aula do Participante -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.classroom');?></label>
                <input type="text" name="sala" size="23" class="form-control">
            </div>
            <div class="col-md-4">
                <!-- Status do Participante -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.status');?></label> 
                <input type="year" name="status" size="23" class="form-control">
            </div>
            <div class="col-md-4">
                <!-- Matricula do Participante -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.enrolment');?></label>
                <select name="matricula_id" class="form-control">
                    @foreach( buscar_matricula_pessoa('Regular') as $matricula )
                        <option value="{{ $matricula->id}}"> {{ $matricula->nome }} - {{ $matricula->nome_turma }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-8">
            </div>
            <div class="col-md-4">
                <!-- Submit -->
                <button type="submit" class="btn btn-outline-info" id="submit"><?php echo Lang::get('conteudo.add');?></button>
            </div>
        </div>   
    </form>
@endsection

