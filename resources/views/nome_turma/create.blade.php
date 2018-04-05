@extends('layouts.app');

@section('content')
    <h1>Criar Nova Turma</h1>

    <form method= "POST" action="{{ route('NomeTurma.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-4">
        
        <table>
        	<tr>
        		<td><label>Nome: </label></td>
        		<td><input type="text" name="nome" size="23" class="form-control"></td>
        	</tr>
        	<tr>
        		<td><input type="submit" class="btn-success"></td>
        	</tr>
        </table>
        
       
    
        </div>
     
    </form>
@endsection

