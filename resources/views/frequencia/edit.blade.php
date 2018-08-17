@extends('layouts.app')

@section('content')

<h1 class="text-success">Editar Frequência </h1>
@if( isset($message) )
        <h3 class="alert alert-success">
                {{ $message }}
        </h3>
        @endif
        @if( isset($error) )
        <h3 class="alert alert-danger">
                {{ $error }}
        </h3>
        @endif
<style>
    input[type=checkbox] {
 transform: scale(1.5);
}

</style>
<div class="frequencia" id ="frequencia" > 
<?php 
    $id = $freque->id;
    ?>
    <form id="salvarFrequencia" method="POST" action="{{route('frequencia.update',$id)}}" enctype="multipart/form-data" onkeyup="verifica_submit('validate');" novalidate >
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
                <th scope="row" id="matricula_id">
                        <input type="text" name="id_matricula[]" class="d-none" value="{{$f->matricula}}"> 
                        {{$f->matricula}}
                </th> <!-- Id da matricula do estudante -->
                    
                    <td id="nomeParticipante">
                            <input type="text" name="id_frequencia[]" class="d-none" value="{{$f->id_frequencia}}"> 
                        {{$f->nome_participante}}
                    </td>
                    <td id="frequencia">
                    <input value="{{$f->matricula}}" class="freq" id="presenca" type="checkbox" <?php if($f->frequencia == 1) echo("checked"); ?> >
                        <label for="presenca"></label> 
                    <input name="presenca[]" class="d-none" id="{{$f->matricula}}presenca" value="<?php if($f->frequencia == 1){ $de = 1; echo($de); }else{$di = 0; echo($di);}?>" type="text" />  
                    </td>
                    <td id="justificativa">
                            <textarea name="justificativa[]" rows="2" cols="2" type="text" >{{$f->justificativa}}</textarea>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>   

            <div class="col-md-2"><br>
                
                <button type="submit" onClick="changeListGroup('.filtro', 'all');" onclick="verificar();" class="btn btn-outline-danger" disable id="submit"> Salvar</button>
            </div> 
        </form>
    <br>
</div>
@endsection

<script src="{{ getenv('APP_URL') }}/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
  
$(document).on('change', '.freq', function(e){
   // console.log(e.target.value);
   console.log(e.target.value+'presenca');
    console.log(e.target.checked);
    console.log(e.target);    

    if(e.target.checked){
        console.log("MARCADO")
        $('#'+e.target.value+'presenca')[0].attributes.value.value = 1;

    }else{
        console.log("DESMARCADO")
        $('#'+e.target.value+'presenca')[0].attributes.value.value = 0;

    }


});
</script>

