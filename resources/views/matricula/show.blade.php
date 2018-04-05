@extends('layouts.app')

@section('content')
<!--<a href="{{url($document->url)}}">Open the pdf!</a>-->
@foreach ($inscricao_id as $inscricao)
          <tr>
            <td> {{ $inscricao->id }} </td>
            <td> <a class="btn btn-default">Inscrições</a>
          </tr>
        @endforeach
@foreach ($turma_id as $turma)
          <tr>
            <td> {{ <?php $a[$i] ?> }} </td>
            <td> <a class="btn btn-default">Turmas</a>
          </tr>
        @endforeach
@endsection