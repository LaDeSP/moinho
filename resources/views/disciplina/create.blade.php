@extends('layouts.app');

@section('content')
    <h1>Cadastrar Disciplina</h1>

    <form method= "POST" action="{{ route('disciplina.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-4">
        <table>
            <tr>
                <td><label>Nome: </label></td>
                <td><input type="text" name="nome" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Turno: </label></td>
                <td><input type="text" name="turno" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Sala de Aula: </label></td>
                <td><input type="text" name="sala_de_aula" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Professor: </label></td>
                <td><select name="colaborador_id" class="form-control">
                    @foreach($colaborador as $professor) 
                        @foreach(busca_pessoa($professor->pessoa_id) as $nome)
                            <option value="{{ $professor->id }}"> {{ $nome->nome }} </option>
                        @endforeach
                    @endforeach
                    </select> </td>
            </tr>
            <tr>
                <td><label>Dia da Semana: </label></td>
                <td><input type="text" name="dia_semana" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Hora: </label></td>
                <td><input type="time" name="hora" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td> <input type="submit" class="btn-success"></td>
            </tr>


        </table>

       

        
        
    
        </div>
       
    </form>
@endsection

