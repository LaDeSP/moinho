
@extends('layouts.app');

@section('content')
    <h1>Realizar Matricula</h1>

    <form method= "POST" action="{{ route('matricula.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-4">
        
        <span>Inscricao:
        <select name="inscricao_id">
        @foreach(busca_inscricao() as $inscricao) 
            <option value="{{ $inscricao->id }}"> {{ $inscricao->nome }} </option>
        @endforeach
        </select> </br>
        </span>
      <!-- <span> Turno: <input type="text" name="turno"></span></br>-->
        <span> Período: <input type="text" name="periodo"></span></br>
        <span> Data: <input type="date" name="data"></span></br>
        <span> Turma:
        <select name="turma_id">
        
        @foreach(busca_turma() as $turma) 
            <option value="{{ $turma->id }}"> {{ $turma->nome }} - {{$turma->turno}} </option><!--aqui tava dando merda pq tava turma_id as turma, dai imprimia a string da função em vez do turma->nome. Assim, imprimia a função toda. Mais algum BO que esqueci -->
        @endforeach
        </select> </br>
        </span>
        <span> Status:
        <select name="status">
        
        @foreach($status as $stat) 
            <option value="{{ $stat->id }}"> {{ $stat->status }}</option>
        @endforeach
        </select> </br>
        </span>
        </div>
        <input type="submit">
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