@extends('layouts.app')

@section('content')
<!--<a href="{{url($document->url)}}">Open the pdf!</a>-->
@foreach ($escola as $school)
          <tr>
            <td> {{ $school->nome_fantasia }} </td>
            <td> <a class="btn btn-default">Escolas</a>
          </tr>
        @endforeach
@endsection