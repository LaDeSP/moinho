@extends('layouts.app')
<style type="text/css">
        div.col-md-4{
            margin-top: 14px;
        }
        #image{
            margin-bottom: 30px;
        }
    </style>

@section('content')
    <h1 class="text-info">Alterar Documentos</h1>
    @if( \Session::has('success') )
        <h3 class="alert alert-success alert-dismissible fade show" role="alert">
            {{ \Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </h3>
    @endif
    <form onkeyup="verifica_submit('validate');"  method="POST" action="{{ route('documento.update', $id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        <input type="text" name="help" value="{{ $id }}" id="SI" style="display: none" >
        <div class="row">
            @foreach( $documento as $key => $doc )
                <div class="col-12 row" id="{{ $doc->id }}">
                    <input type="number" class="d-none" name="id[]" value="{{ $doc->id }}" ></input>
                    <!-- Dados Inscrição - Arquivo -->
                    <div class="col-md-3">
                        <!-- Numero do Documento -->
                        <label for="exampleFormControlInput1">Número*</label>
                        <input 
                            type="text" 
                            name="numero_documento[]" 
                            size="23" 
                            value="{{ $doc->documento_numero }}"
                            id="numero_documento{{ $doc->id }}" 
                            class="form-control"
                        />
                        <div class="invalid-feedback">
                            Por favor, digite o numero do documento
                        </div>
                    </div>
                    <div class="col-md-3">
                        <!-- Tipo do Documento -->
                        <label for="exampleFormControlInput1">Tipo do Documento*</label>
                        <select name="doc_type[]" class="form-control">
                            @foreach($documento_tipo as $doc_type) 
                                <option 
                                    value="{{ $doc_type->id }}"
                                    <?php
                                        if($doc_type->id === $doc->documento_tipo_id)
                                            echo "selected";
                                    ?>
                                > {{ $doc_type->nome }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <!-- Anexo -->
                        <label for="exampleFormControlInput1">Novo Anexo*</label>
                        <input type="file" name="documento[]" size="23" class="form-control-file">
                    </div>
                    <div class="col-md-11">
                        <!-- Anotação -->
                        <label for="exampleFormControlInput1">Anotação*</label>
                        <input 
                            type="text" 
                            name="comentario[]" 
                            size="23" 
                            value="{{ $doc->comentario }}" 
                            id="comentario{{ $doc->id }}" 
                            class="form-control"
                        />
                        <div class="invalid-feedback">
                            Por favor, digite alguma anotação
                        </div>
                    </div>
                    <div class="col-md-11" id="file{{ $doc->id }}">
                        <iframe src="{{ $doc->url }}" width="100%" height="500"></iframe>
                    </div>
                    <a onClick="moveDoc({{ $doc->id }}, 'remove')"> <i class="fa fa-trash fa-lg  text-danger" aria-hidden="true"></i> </a>
                </div>
            @endforeach
        </div>
        <div class="row" id="new">
            <!-- Dados Inscrição - Arquivo -->
            <div class="col-12 row" id="original">
                <input type="number" class="d-none" name="id[]" value="0" ></input>
                <div class="col-md-3">
                    <!-- Numero do Documento -->
                    <label for="exampleFormControlInput1">Número*</label>
                    <input 
                        type="text" 
                        name="numero_documento[]" 
                        size="23" 
                        id="numero_documento0" 
                        class="form-control"
                    />
                    <div class="invalid-feedback">
                        Por favor, digite o numero do documento
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- Tipo do Documento -->
                    <label for="exampleFormControlInput1">Tipo do Documento*</label>
                    <select name="doc_type[]" class="form-control">
                        @foreach($documento_tipo as $doc_type) 
                            <option 
                                value="{{ $doc_type->id }}"
                            > {{ $doc_type->nome }} </option>
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
                    <input 
                        type="text" 
                        name="comentario[]" 
                        size="23" 
                        id="comentario0" 
                        class="form-control"
                    />
                    <div class="invalid-feedback">
                        Por favor, digite alguma anotação
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button onClick="moreDocument()" class="btn btn-outline-info" type="button" id="more"> Adicionar novo Documento </button>
        </div>
        <div class="row" id="remove">
        </div>
        <div class="row">
            <div class="col-md-4">
                <button type="submit" class="btn btn-outline-success" id="submit"> Alterar </button>
            </div>
        </div>
    </form>
@endsection

