@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <table id="myTable">
        <tr class="header">
          <th style="width:70%;"></th>
          <th style="width:30%;"></th>
        </tr>
      @foreach($nome as $turma) 
          <tr>
            <td>{{ $turma->id}}</td>
            <td><a class="btn btn-default">Turmas</a></td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection
