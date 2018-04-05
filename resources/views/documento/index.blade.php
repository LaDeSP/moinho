@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <table id="myTable">
        <tr class="header">
          <th style="width:70%;"></th>
          <th style="width:30%;"></th>
        </tr>
        @foreach ($escola as $school)
          <tr>
            <td>{{ $school->nome_fantasia}}</td>
            <td><a class="btn btn-default">Escolas</a></td>
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
     
      </table>
    </div>
  </div>
@endsection
