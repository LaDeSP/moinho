@extends('layouts.app')
<style type="text/css">
        div.col-md-4{
            margin-top: 14px;
        }
    </style>

@section('content')
    <h1 class="text-info">Alterar Documentos</h1>
    {{dd($documento)}}
    <form onkeyup="verifica_submit('validate');"  method= "POST" action="{{ route('documento.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" name="help" value="{{ $id }}" id="SI" style="display: none" >
        <div class="row">
            <!-- Dados Inscrição - Arquivo -->
            <div class="col-md-3">
                <!-- Numero do Documento -->
                <label for="exampleFormControlInput1">Número*</label>
                <input 
                    type="text" 
                    name="numero_documento" 
                    size="23" 
                    value="{{ $documento[0]->documento_numero }}"
                    id="numero_documento" 
                    class="form-control validate is-valid"
                    onkeyup="verifica_vazio(this.value, this.id);"
                />
                <div class="invalid-feedback">
                    Por favor, digite o numero do documento
                </div>
            </div>
            <div class="col-md-3">
                <!-- Tipo do Documento -->
                <label for="exampleFormControlInput1">Tipo do Documento*</label>
                <select name="doc_type" class="form-control">
                    @foreach($documento_tipo as $doc_type) 
                        <option 
                            value="{{ $doc_type->id }}"
                            <?php
                                if($doc_type->id === $documento[0]->documento_tipo_id)
                                    echo "selected";
                            ?>
                        > {{ $doc_type->nome }} </option>
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
                <input 
                    type="text" 
                    name="comentario" 
                    size="23" 
                    value="{{ $documento[0]->comentario }}" 
                    id="comentario" 
                    class="form-control validate is-valid"
                    onkeyup="verifica_vazio(this.value, this.id);"
                />
                <div class="invalid-feedback">
                    Por favor, digite alguma anotação
                </div>
            </div>

            <!-- Dados Inscrição - Arquivo 2-->
            <div class="col-md-3">
                <!-- Numero do Documento -->
                <label for="exampleFormControlInput1">Número*</label>
                <input 
                    type="text" 
                    name="numero_documento2" 
                    size="23" 
                    value="{{ $documento[1]->documento_numero }}" 
                    id="numero_documento2" 
                    class="form-control validate is-valid"
                    onkeyup="verifica_vazio(this.value, this.id);"
                />
                <div class="invalid-feedback">
                    Por favor, digite o numero do documento
                </div>
            </div>
            <div class="col-md-3">
                <!-- Tipo do Documento -->
                <label for="exampleFormControlInput1">Tipo do Documento*</label>
                <select name="doc_type2" class="form-control">
                    @foreach($documento_tipo as $doc_type) 
                        <option 
                            value="{{ $doc_type->id }}"
                            <?php
                                if($doc_type->id === $documento[1]->documento_tipo_id)
                                    echo "selected";
                            ?>
                        > {{ $doc_type->nome }} </option>
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
                <input 
                    type="text" 
                    name="comentario2" 
                    size="23" 
                    value="{{ $documento[1]->comentario }}"  
                    id="comentario2" 
                    class="form-control validate is-valid"
                    onkeyup="verifica_vazio(this.value, this.id);"
                />
                <div class="invalid-feedback">
                    Por favor, digite alguma anotação
                </div>
            </div>

            <!-- Dados Inscrição - Arquivo 3-->
            <div class="col-md-3">
                <!-- Numero do Documento -->
                <label for="exampleFormControlInput1">Número*</label>
                <input 
                    type="text" 
                    name="numero_documento3" 
                    size="23" 
                    value="{{ $documento[2]->documento_numero }}"  
                    id="numero_documento3" 
                    class="form-control validate is-valid"
                    onkeyup="verifica_vazio(this.value, this.id);"
                />
                <div class="invalid-feedback">
                    Por favor, digite o numero do documento
                </div>
            </div>
            <div class="col-md-3">
                <!-- Tipo do Documento -->
                <label for="exampleFormControlInput1">Tipo do Documento*</label>
                <select name="doc_type3" class="form-control">
                    @foreach($documento_tipo as $doc_type) 
                        <option 
                            value="{{ $doc_type->id }}"
                            <?php
                                if($doc_type->id === $documento[2]->documento_tipo_id)
                                    echo "selected";
                            ?>
                        > {{ $doc_type->nome }} </option>
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
                <input 
                    type="text" 
                    name="comentario3" 
                    size="23" 
                    value="{{ $documento[2]->comentario }}"  
                    id="comentario3" 
                    class="form-control validate is-valid"
                    onkeyup="verifica_vazio(this.value, this.id);"
                />
                <div class="invalid-feedback">
                    Por favor, digite alguma anotação
                </div>
            </div>

            <div class="col-md-4">
                <button onClick="verifica_campo('validate');" type="submit" class="btn btn-outline-success" id="submit"> Alterar </button>
            </div>
        </div>  
    </form>
@endsection

