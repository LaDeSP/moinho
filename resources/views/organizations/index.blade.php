@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-md-4">
      <table id="myTable">
        <tr class="header">
          <th style="width:40%;">Nome</th>
          <th style="width:30%;">CNPJ</th>
          <th style="width:30%;">Ações</th>
        </tr>
        @foreach ($organizations as $organization)
          <tr>
            <td>{{ $organization->name }}</td>
            <td>{{ $organization->cnpj }}</td>
            <td><a href="{{ route('organizations.show', $organization->id) }}" class="btn btn-default" type="button">Documentos</a></td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection