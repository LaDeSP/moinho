<<<<<<< HEAD


    <style type="text/css">
        div.col-md-4{
            margin-top: 14px;
        }
    </style>
@extends('layouts.app');

@section('content')
    
=======
@extends('layouts.app');

@section('content')
    <h1>Cadastrar Turma</h1>
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab

    <form method= "POST" action="{{ route('turma.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-4">
<<<<<<< HEAD
        <h1>Cadastrar Turma</h1>
        <table>
             <tr>
                <td><label>Nome: </label></td>
                <td><select name="turma" class="form-control">
                    @foreach($nome as $turma) 
                        <option value="{{ $turma->id }}"> {{ $turma->nome_turma }} </option>
                    @endforeach
                    </select> </td>
            </tr>
            <tr>
                <td><label>Turno: </label></td>
                <td><input type="text" name="turno" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Ano: </label></td>
                <td><input type="year" name="ano" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Semestre: </label></td>
                <td><input type="text" name="periodo" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><input type="submit" class="btn-success"></td>
            </tr>
        </table>
       
    
        </div>

        
=======
        
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
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
    </form>
@endsection

