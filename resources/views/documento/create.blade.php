@extends('layouts.app')
<style type="text/css">
        div.col-md-4{
            margin-top: 14px;
        }
</style>
<!-- Quando mandar para o servidor trocar esse src do script -->

@section('content')
    <h1 class="text-info">Adicionar Documento</h1>
    <form onkeyup="verifica_submit('validate');"  method= "POST" action="{{ route('documento.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" class="d-none" name="help" value="{{ $help }}" id="SI" >
        <div class="row" id="original">
            <!-- Dados Inscrição - Arquivo -->
                <div class="col-md-3">
                    <!-- Numero do Documento -->
                    <label for="exampleFormControlInput1">Número*</label>
                    <input type="text" name="numero_documento[]" size="23" value="" id="numero_documento" class="form-control">
                    <div class="invalid-feedback">
                        Por favor, digite o numero do documento
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- Tipo do Documento -->
                    <label for="exampleFormControlInput1">Tipo do Documento*</label>
                    <select name="doc_type[]" class="form-control">
                        @foreach($documento_tipo as $doc_type) 
                            <option value="{{ $doc_type->id }}"> {{ $doc_type->nome }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <!-- Anexo -->
                    <label for="exampleFormControlInput1">Anexo*</label>
                    <input type="file" name="documento[]" size="23" class="form-control-file">
                </div>
                <div class="col-md-11">
                    <!-- Anotação -->
                    <label for="exampleFormControlInput1">Anotação*</label>
                    <input type="text" name="comentario[]" size="23" value="" id="comentario" class="form-control">
                    <div class="invalid-feedback">
                        Por favor, digite alguma anotação
                    </div>
                </div>
        </div> 
        <div id="new">
        </div> 
        <div class="row">
            <div class="col-md-11">
                <div class="text-right">
                    <button onClick="moreDocument()" class="btn btn-outline-danger" type="button" id="more"> Adicionar novo Documento </button>
                </div>
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-outline-success" id="submit" ><?php echo Lang::get('conteudo.add');?></button>
            </div>
        </div>
    </form>
@endsection