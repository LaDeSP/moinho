@extends('layouts.app')

@section('content')

<div class="panel panel-info">
    <div class="panel-heading">
    
    <table>
      <tr class="header">
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
    </tr>
    <td><b> <?php echo Lang::get('conteudo.namei'); ?> </b></td>
    <td><b><?php echo Lang::get('conteudo.cpf'); ?></b></td>
    <td><b><?php echo Lang::get('conteudo.exameDate'); ?> </b></td>
    
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
@endsection
