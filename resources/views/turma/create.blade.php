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
            <div class="col-md-3 mb-3">
                <!-- Turno da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.shift');?></label>
                           <select name="turno" class="form-control">
                                <option value="morning"> <?php echo Lang::get('validation.attributes.morning');?>  </option>
                                <option value="afternoon"> <?php echo Lang::get('validation.attributes.afternoon');?> </option>
                           </select>
            </div>
            <div class="col-md-4">
                <!-- Ano da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.year'); ?></label>
                <input type="year" name="ano" size="23" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <!-- Semestre da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.semester');?></label>
                <select name="turno" class="form-control">
                                <option value="1"> 1º </option>
                                <option value="2"> 2º </option>
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

