@extends('layouts.app')

@section('content')
<!--<a href="{{url($document->url)}}">Open the pdf!</a>-->
@foreach ($escola as $school)
          <tr>
            <td> {{ $school->nome_fantasia }} </td>
            <td> <a class="btn btn-default">Escolas</a>
          </tr>
        @endforeach

@foreach ($documento_tipo as $doc_type)
          <tr>
            <td>{{ $doc_type->nome}}</td>
            <td><a class="btn btn-default">Tipos de Documento</a></td>
          </tr>
        @endforeach

        @foreach ($documento_tipo2 as $doc_type2)
          <tr>
            <td>{{ $doc_type2->nome}}</td>
            <td><a class="btn btn-default">Tipos de Documento</a></td>
          </tr>
        @endforeach

        @foreach ($documento_tipo3 as $doc_type3)
          <tr>
            <td>{{ $doc_type3->nome}}</td>
            <td><a class="btn btn-default">Tipos de Documento</a></td>
          </tr>
        @endforeach
@endsection