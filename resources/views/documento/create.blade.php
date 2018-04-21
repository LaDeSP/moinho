@extends('layouts.app')
<style type="text/css">
        div.col-md-4{
            margin-top: 14px;
        }
    </style>

@section('content')
    <h1 class="text-info">Adicionar Inscrição</h1>

    <form onkeyup="verifica_submit('validate');"  method= "POST" action="{{ route('documento.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" name="help" value="{{ $help }}" id="SI" >
        <div class="row">
            <!-- Dados Inscrição - Arquivo -->
            <div class="col-md-3">
                <!-- Numero do Documento -->
                <label for="exampleFormControlInput1">Número*</label>
                <input type="text" name="numero_documento" size="23" value="" id="numero_documento" class="form-control validate"
                onkeyup="verifica_vazio(this.value, this.id);">
                <div class="invalid-feedback">
                    Por favor, digite o numero do documento
                </div>
            </div>
            <div class="col-md-3">
                <!-- Tipo do Documento -->
                <label for="exampleFormControlInput1">Tipo do Documento*</label>
                <select name="doc_type" class="form-control">
                    @foreach($documento_tipo as $doc_type) 
                        <option value="{{ $doc_type->id }}"> {{ $doc_type->nome }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <!-- Anexo -->
                <label for="exampleFormControlInput1">Anexo*</label>
                <input type="file" name="documento" size="23" class="form-control-file">
            </div>
            <div class="col-md-11">
                <!-- Anotação -->
                <label for="exampleFormControlInput1">Anotação*</label>
                <input type="text" name="comentario" size="23" value="" id="comentario" class="form-control validate"
                onkeyup="verifica_vazio(this.value, this.id);">
                <div class="invalid-feedback">
                    Por favor, digite alguma anotação
                </div>
            </div>

            <!-- Dados Inscrição - Arquivo 2-->
            <div class="col-md-3">
                <!-- Numero do Documento -->
                <label for="exampleFormControlInput1">Número*</label>
                <input type="text" name="numero_documento2" size="23" value="" id="numero_documento2" class="form-control validate"
                onkeyup="verifica_vazio(this.value, this.id);">
                <div class="invalid-feedback">
                    Por favor, digite o numero do documento
                </div>
            </div>
            <div class="col-md-3">
                <!-- Tipo do Documento -->
                <label for="exampleFormControlInput1">Tipo do Documento*</label>
                <select name="doc_type2" class="form-control">
                    @foreach($documento_tipo as $doc_type) 
                        <option value="{{ $doc_type->id }}"> {{ $doc_type->nome }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <!-- Anexo -->
                <label for="exampleFormControlInput1">Anexo*</label>
                <input type="file" name="documento2" size="23" class="form-control-file">
            </div>
            <div class="col-md-11">
                <!-- Anotação -->
                <label for="exampleFormControlInput1">Anotação*</label>
                <input type="text" name="comentario2" size="23" value="" id="comentario2" class="form-control validate"
                onkeyup="verifica_vazio(this.value, this.id);">
                <div class="invalid-feedback">
                    Por favor, digite alguma anotação
                </div>
            </div>

            <!-- Dados Inscrição - Arquivo 3-->
            <div class="col-md-3">
                <!-- Numero do Documento -->
                <label for="exampleFormControlInput1">Número*</label>
                <input type="text" name="numero_documento3" size="23" value="" id="numero_documento3" class="form-control validate"
                onkeyup="verifica_vazio(this.value, this.id);">
                <div class="invalid-feedback">
                    Por favor, digite o numero do documento
                </div>
            </div>
            <div class="col-md-3">
                <!-- Tipo do Documento -->
                <label for="exampleFormControlInput1">Tipo do Documento*</label>
                <select name="doc_type3" class="form-control">
                    @foreach($documento_tipo as $doc_type) 
                        <option value="{{ $doc_type->id }}"> {{ $doc_type->nome }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <!-- Anexo -->
                <label for="exampleFormControlInput1">Anexo*</label>
                <input type="file" name="documento3" size="23" class="form-control-file">
            </div>
            <div class="col-md-11">
                <!-- Anotação -->
                <label for="exampleFormControlInput1">Anotação*</label>
                <input type="text" name="comentario3" size="23" value="" id="comentario3" class="form-control validate"
                onkeyup="verifica_vazio(this.value, this.id);">
                <div class="invalid-feedback">
                    Por favor, digite alguma anotação
                </div>
            </div>

            <div class="col-md-4">
                <button onClick="verifica_campo('validate');" type="submit" class="btn btn-outline-danger" id="submit" disabled><?php echo Lang::get('conteudo.add');?></button>
            </div>
        </div>  
    </form>
@endsection

