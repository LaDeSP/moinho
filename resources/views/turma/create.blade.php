@extends('layouts.app');

@section('content')
    <h1>Cadastrar Turma</h1>

    <form method= "POST" action="{{ route('turma.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-4">
        
        <span>Nome:
        <select name="turma">
        @foreach($nome as $turma) 
            <option value="{{ $turma->id }}"> {{ $turma->nome }} </option>
        @endforeach
        </select> </br>
        </span>
        <span> Turno: <input type="text" name="turno"></span></br>
        
    
        </div>
        <input type="submit">
    </form>
@endsection

