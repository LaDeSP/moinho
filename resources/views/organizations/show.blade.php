@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <table id="myTable">
        <tr class="header">
          <th style="width:50%;">Tipo do documento</th>
          <th style="width:30%;">Data de vencimento</th>
          <th style="width:20%;">Ação</th>
        </tr>
        @foreach ($documents as $document)
          <tr>
            <td> {{ $document->document_type->name }} </td>
            <td> {{ $document->expiration_date }} </td>
            <td> <a class="btn btn-default"href="{{url($document->url)}}">Ver Documento</a>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection
