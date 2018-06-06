@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
    
    $('#turma').on('change', function(e){
        
            console.log(e);
            var turma_id = e.target.value;

         $.get('/ajaxDisciplina?turma_id=' + turma_id,function(data) {
          console.log(data);
          $('#turma').empty();
          $('#turma').append('<option value="0" disable="true" selected="true"> </option>');
            
            $.each(data, function(index, regenciesObj){
                $('#disciplina').append('<option value="'+ disciplina.id +'">'+ disciplina.nome +'</option>');
            })

        

       });
    });
       </script>

<h1 class="text-success">Frequência </h1>
<?php $turma = 1;?>
<form>

    <div class="row">
            <div class="col-md-4">
                <label for="exampleFormControlInput1"> Turma: *</label>
                <select name="turma" id="turma" class="form-control" >
                    <option value="0" disable="true" selected="true"></option>
                    @foreach(buscar_turma_colaborador($colaborador->id) as $turma) 
                        <option value="{{ $turma->id }}"> {{ $turma->nome_turma }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="exampleFormControlInput1"> Disciplina: *</label>
                <select name="disciplina" id="disciplina" class="form-control" >
                    <option value="0" disable="true" selected="true"> </option>

                </select>
            </div>
           
        </div>
               
</form>
<br>

@endsection
