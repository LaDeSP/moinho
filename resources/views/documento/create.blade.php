


@extends('layouts.app');
<style type="text/css">
        div.col-md-4{
            margin-top: 14px;
        }
    </style>

@section('content')
    <h1>Adicionar Inscrição</h1>

    <form method= "POST" action="{{ route('documento.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" name="help" value="{{ $help }}" id="SI" >
        <div class="col-md-4">
            <table>
            <tr>
                <td><label>Número do Documento: </label></td>
                <td><input type="text" name="numero_documento" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Tipo do Documento: </label></td>
                <td><select name="doc_type" class="form-control">
                    @foreach($documento_tipo as $doc_type) 
                        <option value="{{ $doc_type->id }}"> {{ $doc_type->nome }} </option>
                    @endforeach
                    </select></td>
            </tr>
            <tr>
                <td><label>Anotação: </label></td>
                <td><input type="text" name="comentario" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Anexo: </label></td>
                <td><input type="file" name="documento" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Número do Documento: </label></td>
                <td><input type="text" name="numero_documento2" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Tipo do Documento: </label></td>
                <td><select name="doc_type2" class="form-control">
                    @foreach($documento_tipo2 as $doc_type2) 
                        <option value="{{ $doc_type2->id }}"> {{ $doc_type2->nome }} </option>
                    @endforeach
                    </select></td>
            </tr>
            <tr>
                <td><label>Anotação: </label></td>
                <td><input type="text" name="comentario2" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Anexo: </label></td>
                <td><input type="file" name="documento2" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Número do Documento: </label></td>
                <td><input type="text" name="numero_documento3" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Tipo do Documento: </label></td>
                <td><select name="doc_type3" class="form-control">
                    @foreach($documento_tipo3 as $doc_type3) 
                        <option value="{{ $doc_type3->id }}"> {{ $doc_type3->nome }} </option>
                    @endforeach
                    </select></td>
            </tr>
            <tr>
                <td><label>Anotação: </label></td>
                <td><input type="text" name="comentario3" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Anexo: </label></td>
                <td><input type="file" name="documento3" size="23" class="form-control"></td>
            </tr>
            
            <tr>
                <td><input type="submit" class="btn-success"></td>
            </tr>
            </table>
         
        </div>
   

        
    </form>
@endsection

