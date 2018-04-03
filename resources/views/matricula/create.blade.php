
@extends('layouts.app');

@section('content')
    <h1>Realizar Matricula</h1>

    <form method= "POST" action="{{ route('matricula.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-4">
        <table>
            <tr>
                <td><label>Inscrição: </label></td>
                <td><select name="inscricao_id" class="form-control">
                    @foreach(busca_inscricao() as $inscricao) 
                        <option value="{{ $inscricao->id }}"> {{ $inscricao->nome }} </option>
                    @endforeach
                    </select></td>
            </tr>
            <tr>
                <td><label>Período: </label></td>
                <td><input type="text" name="periodo" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Data: </label></td>
                <td><input type="date" name="data" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Turma: </label></td>
                <td> <select name="turma_id" class="form-control">
                    @foreach(busca_turma() as $turma) 
                        <option value="{{ $turma->id }}"> {{ $turma->nome_turma }} - {{$turma->ano}} </option><!--aqui tava dando merda pq tava turma_id as turma, dai imprimia a string da função em vez do turma->nome. Assim, imprimia a função toda. Mais algum BO que esqueci -->
                    @endforeach
                        </select></td>
            </tr>
            <tr>
                <td><label>Satus: </label></td>
                <td><select name="status" class="form-control">
                    @foreach($status as $stat) 
                        <option value="{{ $stat->id }}"> {{ $stat->status }}</option>
                    @endforeach
                </select></td>
            </tr>
            <tr>
                <td><input type="submit" class="btn-success"></td>
            </tr>
            
       </table>
        
        
    </form>
@endsection

<!--
<?php
/* 
               $a = json_decode(busca_turma());
                for ($i = 0; $i < count($a); $i++) { 
                ?>
                     <option value= '<?php echo $a[$i]->id; ?>' > <?php echo $a[$i]->nome.' - '.$a[$i]->turno; ?> </option>
                <?php
            } isso começando dentro de todo o foreach
            */ 
        ?>
-->