@extends('layouts.app')

@section('content')
<<<<<<< HEAD

<div class="panel panel-info">
    <div class="panel-heading">
    <table>
      <tr class="header">
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
    </tr>
    <td><b>Nome do Inscrito</b></td>
    <td><b>CPF do Inscrito</b></td>
    <td><b>Data de Avaliação</b></td>
    
    </table>

    </div>
      <div class="panel-body" id="teste">
      <table>
      <tr class="header">
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
    </tr>
      <tbody>
        <tr>
        @foreach(home() as $turma) 
            @if ($turma->Dias>=0) 
            <tr>
            <td> {{ $turma->nome }} </td>
            <td> {{ $turma->cpf }}</td> 
            <td>  - Daqui a {{ $turma->Dias}} dias.</td>
            </tr>
            @endif
        @endforeach
    </tbody>
   


      </table>
      </div>
=======
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>
                       
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
@endsection
