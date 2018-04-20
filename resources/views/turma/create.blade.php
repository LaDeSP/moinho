@extends('layouts.app')

@section('content')
    <h1 class="text-warning"><?php echo Lang::get('conteudo.addClass');?></h1>

    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('turma.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <!-- Dados da Turma -->
            <div class="col-md-4">
                <!-- Nome da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name'); ?>*</label>
                <select name="turma" class="form-control">
                    @foreach($nome as $turma) 
                        <option value="{{ $turma->id }}"> {{ $turma->nome_turma }} </option>
                    @endforeach
                </select> 
            </div>
            <div class="col-md-3 mb-3">
                <!-- Turno da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.shift');?>*</label>
                <select name="turno" class="form-control">
                    <option value="morning"> <?php echo Lang::get('validation.attributes.morning');?>  </option>
                    <option value="afternoon"> <?php echo Lang::get('validation.attributes.afternoon');?> </option>
                </select>
            </div>
            <div class="col-md-2">
                <!-- Ano da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.year'); ?>*</label>
                <input type="year" value="" id="ano" name="ano" size="23" class="form-control validate"
                onkeyup="verifica_vazio(this.value, this.id);">
                <div class="invalid-feedback">
                    Por favor, digite o ano da turma
                </div>
            </div>
            <div class="form-group col-md-2">
                <!-- Periodo da Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.semester');?>*</label>
                <select name="periodo" class="form-control">
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
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            <input
                type="text"
                name="selecao_ano" 
                id="selecao_ano_regular" 
                class="form-control" 
                value=""
                placeholder="Pesquisa"
                onchange="changeListGroup('.filtro', this.value);"
            >
            </input>  
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-warning" onClick="changeListGroup('.filtro', 'all');" >Todos</button>
        </div>
    </div>
    <div class="list-group">
        <div class="row lista">
            @foreach(busca_turma() as $array)
                <div 
                    class="col-md-4 {{ $array->ano }} {{ str_replace(' ', '_', $array->nome_turma) }} filtro"
                >
                    <span href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $array->nome_turma }}</h5>
                            <small>
                                <a href="#" id="{{ $array->id }}">
                                    <i class="fa fa-pencil icon text-warning" aria-hidden="true"></i>
                                </a>
                            </small>
                        </div>
                        <small>{{ $array->turno }}</small>,
                        <small>{{ $array->ano }}</small>
                        <br>
                        <small>Periodo: {{ $array->periodo }}°</small>
                    </span>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    <br>
@endsection

