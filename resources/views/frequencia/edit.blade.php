@extends('layouts.app')

@section('content')

<h1 class="text-success">Editar Frequência </h1>

<style>
    input[type=checkbox] {
 transform: scale(1.5);
}

</style>
<div class="frequencia" id ="frequencia" > 
<?php 
    $id = $freque->id;
    echo($id);
    ?>
    <form id="salvarFrequencia" method="POST" action="{{route('frequencia.update',$id)}}" enctype="multipart/form-data" novalidate >
        <input name="_method" type="hidden" value="PUT">
  
        {{ csrf_field() }} 
   
        <table class="table" id="tabelaAluno" >
                <thead class="table-success">
                <tr>
                    <th scope="col">Matricula</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Presença</th>
                    <th scope="col">Justificativa</th>
                </tr>
                </thead>
            <tbody>
                    
                @foreach($query as $f)
                <tr>
                <th scope="row" id="matricula_id">{{$f->matricula}}</th> <!-- Id da matricula do estudante -->
                    
                    <td id="nomeParticipante">
                            <input type="text" name="id_frequencia[]" value="{{$f->id_frequencia}}"> 
                        {{$f->nome_participante}}
                    </td>
                    <td id="frequencia">
                        <input name="presenca[]" class="freq" type="checkbox" <?php if($f->frequencia == 1) echo("checked"); ?> >  
                    </td>
                    <td id="justificativa">
                            <textarea name="justificativa[]" rows="2" cols="2" type="text" >{{$f->justificativa}}</textarea>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>   
        
            <div class="col-md-2"><br>
                <button type="submit" class="btn btn-outline-danger"> Salvar</button>
            </div> 
        </form>
    <br>
</div>
@endsection

<script src="/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">

$(document).on('change', '.freq', function(e){
    console.log(e.target.value);
    console.log(e.target.checked);
    console.log(e.target);
    
});
</script>

