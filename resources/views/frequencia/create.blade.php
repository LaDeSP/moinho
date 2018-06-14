<?php 

use PHP\test;

$data = date("Y/m/d");
$data = str_replace("/","-",$data);

?>
@extends('layouts.app')

@section('content')
<style>
     input[type=checkbox] {
  transform: scale(1.5);
}

</style>

<h1 class="text-success">Frequência </h1>
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
<form id="formRecebimento" method="POST" >
        {{ csrf_field() }}

    <div class="row">
            <div class="col-md-4">
                <label for="exampleFormControlInput1"> Turma: *</label>
                <select name="turma" id="turma" onchange="habilitaBtn()" class="form-control" >
                    <option value="0" disable="true" selected="true"></option>
                    @foreach(buscar_turma_colaborador($colaborador->id) as $turma) 
                        <option value="{{ $turma->turma_id }}"> {{ $turma->nome_turma }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="exampleFormControlInput1"> Disciplina: *</label>
                <select name="disciplina" id="disciplina" onchange="habilitaBtn()" class="form-control" >
                    <option value="0" disable="true" selected="true"> </option>
                </select>
            </div>
            <div class="col-md-2"><br>
                <button type="submit" class="btn btn-outline-danger" id="pesquisar" disabled >Pesquisar</button>
            </div>
        </div>
    </form>

    <form id="salvarFrequencia" method="POST" action="{{ route('frequencia.store') }}" enctype="multipart/form-data" novalidate >
        {{ csrf_field() }}
            <div class="col-md-4">
                    <label for="exampleFormControlInput1" hidden="hidden" id="disci">Disciplina</label>

                <label for="exampleFormControlInput1">Data da Frequência*</label>
                            <input type="date" name="data" size="23"  class="form-control validate" 
                id="data" value="{{$data}}" onkeyup="verifica_vazio(this.value, this.id);" >
                    <div class="invalid-feedback">
                        Por favor, digite a data da Frequência.
                    </div>
                </div>
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
              <tr>
                <th scope="row" id="matricula"></th>
                <td id="nome"></td>
                <td id="presenca"> </td>
                <td id="justificativa"></td>
              </tr>
           
            </tbody>
          </table>
           
            
               
           <div class="col-md-2"><br>
                <button type="submit" class="btn btn-outline-danger"> Salvar</button>
            </div> 
        </form>
        

<br>

@endsection

<script src="/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
  
        $(document).ready(function(){  
        $('#turma').on('change', function(e){
                       
                console.log(e);
                var turma_id = e.target.value;
            $.get('/frequencia/ajaxDisciplina/' + turma_id ,function(data){
                
          $('#disciplina').empty();
          $('#disciplina').append('<option value="0" disable="true" selected="true"> </option>');
         

                console.log(data)
                $.each(data, function(index, disciplina){
                   $('#disciplina').append('<option value="'+ disciplina.disciplina_id +'">'+ disciplina.nome +'</option>');
                })
            });
        });

    });    
    

    function habilitaBtn () {
            var disciplina = document.getElementById("disciplina").value; //disciplina
            var turma = document.getElementById("turma").value; //turma

            if(disciplina != 0 && turma != 0)
            {
                //if(!document.getElementById('pesquisar').disabled) 
                document.getElementById('pesquisar').disabled=false;  
                
                $(document).ready(function(){  
                    $('#formRecebimento').submit(function(e){
                        e.preventDefault();
                        var form = $(this);
                        $.get('/frequencia/ajaxParticipantes/' + turma + disciplina ,function(data){
                            $('#disci').empty();
                            $('#disci').append('<input type="text" name="disci" value="'+ disciplina+'"/>')

                            console.log(data);               
                            $('#formRecebimento').empty();
                            
                            $.each(data, function(index, frequencia){
                                 $('#matricula').append('<input value='+ frequencia.matricula +' name="matricula[]" class="d-none">'+ frequencia.matricula +'<br></input> ');
                                 $('#nome').append(''+ frequencia.nome +'<br></input>');
                                 $('#presenca').append('<input value="'+frequencia.matricula+'" class="freq" type="checkbox" >  <label for="presenca"></label> <br>');
                                 $('#justificativa').append('<textarea name="justificativa[]" class="just" id_matricula="'+frequencia.matricula+'" rows="1" type="text" > </textarea>  <label for="justificativa"></label>');
                                 $('#presenca').append('<input name="presenca[]" id="'+frequencia.matricula+'presenca" value="0" type="text" class="d-none"/>');
                            })

                        });
                    });
                });  
                           
            }
            else
            {
                //if(document.getElementById('pesquisar').disabled) 
                document.getElementById('pesquisar').disabled=true;
            }
           
        }         
    
   // });
   $(document).on('change', '.freq', function(e){
        console.log(e.target.value+'presenca');
        console.log(e.target.checked);
        console.log(e.target);
        if(e.target.checked == true)
            $('#'+e.target.value+'presenca')[0].attributes.value.value = 1;
        else
            $('#'+e.target.value+'presenca')[0].attributes.value.value = 0;
    });

    $(document).on('blur', '.just', function(e){
        console.log(e.target.value);
        console.log(e.target.attributes.id_matricula.value);
       
    });

    
</script>

