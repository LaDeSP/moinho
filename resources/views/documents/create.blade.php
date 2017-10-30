@extends('layouts.app');

@section('content')
    <h1>Adicionar Documento</h1>

    <form method= "POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <span> Data de expiração: <input type="date" name="expiration_date"></span></br>
        <span>Organização:
        <select name="organization"></select>
        @foreach($organizations as $organization) 
            <option value="{{ $organization->id }}"> {{ $organization->name }} </option>
        @endforeach
        </select> </br>
        </span>
        <span> Número do documento: <input type="text" name="document_number"></span>
        <span> Tipo do documento: 
        <select name="document_type">
        @foreach($document_types as $doc_type) 
            <option value="{{ $doc_type->id }}"> {{ $doc_type->name }} </option>
        @endforeach
        </select>
        </span>
        <span> Anotação: <input type="text" name="comment"></span>
        <input type="file" id="document" name="document">
        <input type="submit">
    </form>
@endsection