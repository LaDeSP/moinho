@extends('layouts.app')

@section('content')
    <h1 class="text-warning"><?php echo Lang::get('conteudo.addClass');?></h1>

    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('turma.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
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
            <div class="col-md-2">
                <!-- Ano da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.year'); ?></label>
                <input type="year" value="" id="ano" name="ano" size="23" class="form-control validate"
                onkeyup="verifica_vazio(this.value, this.id);">
                <div class="invalid-feedback">
                    Por favor, digite o ano da turma
                </div>
            </div>
            <div class="form-group col-md-2">
                <!-- Semestre da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.semester');?></label>
                <select name="turno" class="form-control">
                                <option value="1"> 1º </option>
                                <option value="2"> 2º </option>
                           </select>
            </div>
            <div class="col-md-4">
                <!-- Submit -->
                <button type="submit" class="btn btn-outline-danger" id="submit" disabled><?php echo Lang::get('conteudo.add');?></button>
            </div>
        </div>   
    </form>
@endsection

