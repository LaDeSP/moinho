@extends('layouts.app')

@section('content')
<!--<a href="{{url($document->url)}}">Open the pdf!</a>-->
@foreach($nome as $turma) 
          <tr>
            <td> {{ $turma->id }} </td>
            <td> <a class="btn btn-default">Turmas</a>
          </tr>
        @endforeach
@endsection

