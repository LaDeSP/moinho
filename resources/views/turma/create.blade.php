@extends('layouts.app')

@section('content')
    

    <form method= "POST" action="{{ route('turma.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h1 class="text-warning"><?php echo Lang::get('conteudo.addClass');?></h1>
        <div class="row">
            <!-- Dados da Turma -->
            <div class="col-md-4">
                <!-- Nome da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name'); ?></label>
                <select name="turma" class="form-control">
                    @foreach($nome as $turma) 
                        <option value="{{ $turma->id }}"> {{ $turma->nome_turma }} </option>
                    @endforeach
                </select> 
            </div>
            <div class="col-md-4">
                <!-- Turno da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.shift');?> </label>
                <input type="text" name="turno" size="23" class="form-control">
            </div>
            <div class="col-md-4">
                <!-- Ano da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.year'); ?></label>
                <input type="year" name="ano" size="23" class="form-control">
            </div>
            <div class="col-md-4">
                <!-- Semestre da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.semester');?></label>
                <input type="text" name="periodo" size="23" class="form-control">
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

