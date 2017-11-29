@extends('layouts.app');

@section('content')
    <h1>Criar Nova Turma</h1>

    <form method= "POST" action="{{ route('NomeTurma.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-4">
        
        
        <span> Nome: <input type="text" name="nome"></span></br>
       
    
        </div>
        <input type="submit">
    </form>
@endsection

