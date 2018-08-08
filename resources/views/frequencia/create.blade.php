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
<form id="formRecebimento" onkeyup="verifica_submit('validate');"  method="POST" enctype="multipart/form-data" novalidate >
        {{ csrf_field() }}
    <div class="row">
            <div class="col-md-4">
                <label for="exampleFormControlInput1"> Turma: *</label>
                <select name="turma" id="turma" onchange="habilitaBtn()" class="form-control" >
                    <option value="0" disable="true" selected="true"></option>
                    @if( isset($colaborador->id) )
                        @foreach(buscar_turma_colaborador($colaborador->id) as $turma) 
                            <option value="{{ $turma->turma_id }}"> {{ $turma->nome_turma }} </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-4">
                <label for="exampleFormControlInput1"> Disciplina: *</label>
                <select name="disciplina" id="disciplina" onchange="habilitaBtn()" class="form-control" >
                    <option value="0" disable="true" selected="true"> </option>
                </select>
            </div>
            <div class="col-md-4">
               

            <label for="exampleFormControlInput1">Data da Frequência*</label>
                        <input type="date" name="data" size="23"  class="form-control is-valid validate" 
            id="data" value="{{$data}}" onkeyup="verifica_vazio(this.value, this.id);" >
                <div class="invalid-feedback">
                    Por favor, digite a data da Frequência.
                </div>
            </div>

            <div class="col-md-2"><br>
                <button type="submit" class="btn btn-outline-danger"  id="submit" disabled  onclick="verificar();" id="pesquisar" >Pesquisar</button>
            </div>
        </div>
    </form>
<div class="frequencia" id ="frequencia" style="visibility: hidden">
    <form id="salvarFrequencia" method="POST" action="{{ route('frequencia.store') }}" onkeyup="verifica_submit('validate');"enctype="multipart/form-data" novalidate >
        {{ csrf_field() }}
        <label for="exampleFormControlInput1" id="nova" ></label>
        <label for="exampleFormControlInput1" id="disc"></label>
        <label for="exampleFormControlInput1" id="turm"></label>
        
    <table class="table" id="tabelaAluno" >
            <thead class="table-success">
              <tr>
                <th scope="col">Matricula</th>
                <th scope="col">Nome</th>
                <th scope="col">Presença 
                 <input type=checkbox name="selall" onClick="CheckAll()"><span id="checar">Marcar todos</span><br>
    
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
        
                <button type="submit" id="submit" onclick="verificar();" class="btn btn-outline-danger"> Salvar</button>
            </div> 
        </form>
    <br>
</div>
@endsection

<script src="/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
  
     
  $(document).ready(function(){  

        $('#turma').on('change', function(e){ //se mudar turma ativa aqui
            $('#disciplina').append('<option value="0" disable="true" selected="true"> </option>');

                  var turma_id = e.target.value;

                console.log(turma_id);
            $.get('/frequencia/ajaxDisciplina/' + turma_id ,function(data){

                $('#disciplina').empty();
                $('#disciplina').append('<option value="0" disable="true" selected="true"> </option>');
         
                $.each(data, function(index, disciplina){
                   $('#disciplina').append('<option value="'+ disciplina.disciplina_id +'">'+ disciplina.nome +'</option>');
                })
                
            });
        });
    });

    function habilitaBtn () {
            var disciplina = document.getElementById("disciplina").value; //disciplina
            var turma = document.getElementById("turma").value; //turma

                console.log(disciplina);

            if(disciplina != 0 && turma != 0)
            {
                document.getElementById('pesquisar').disabled=false;  
                //if(!document.getElementById('pesquisar').disabled) 
                
            }
            else
            {
                //if(document.getElementById('pesquisar').disabled) 
                document.getElementById('pesquisar').disabled=true;
            }
        }         
        
    function verificar(){

            var disciplina = document.getElementById("disciplina").value; //disciplina
            var data = document.getElementById("data").value; 
            var turma = document.getElementById("turma").value; 
            console.log("data",data);
            console.log("disciplina",disciplina);
            console.log("turma",turma);

            console.log("/frequencia/ajaxVerifica/"+turma+disciplina+data);
            //antes de gerar a lista, precisamos validar se já existe lançamento
            $.get('/frequencia/ajaxVerifica/'+ turma +'/'+disciplina+'/'+ data ,function(data){            
                console.log(data)
                if(data == 1) //imprime quando a consulta retorna vazio
                    console.log("NOVO LANÇAMENTO");
                else{
                    
                    console.log("Já existe consulta, vai para view editar");
                    console.log(data[0].frequencia_id);
                    window.location.href = "/frequencia/"+data[0].frequencia_id+"/edit";
                }
            });
    }
        $(document).ready(function(){  

            $("#checkTodos").click(function(){
                $('input:checkbox').prop('checked', $(this).prop('checked'));
            });
            
            $('#formRecebimento').submit(function(e){

                document.getElementById('frequencia').style.visibility = 'visible';  

                var disciplina = document.getElementById("disciplina").value; //disciplina
                var turma = document.getElementById("turma").value; //turma
                data =  document.getElementById("data").value;

                    $('#nova').append('<input name="novaData" type="text" value="'+data+'" hidden>');            
                    $('#disc').append('<input type="text" name="disci" value="'+ disciplina +'"hidden>');
                    $('#turm').append('<input type="text" name="turm" value="'+ turma +'"hidden>');


                        e.preventDefault();
                                        $('#formRecebimento').empty();

                        $.get('/frequencia/ajaxParticipantes/' + turma + disciplina ,function(data){

                            $.each(data, function(index, frequencia){

                                 $('#matricula').append('<input value='+ frequencia.matricula +' name="matricula[]" class="d-none">'+ frequencia.matricula +'<br></input> ');
                                 $('#nome').append(''+ frequencia.nome +'<br></input>');
                                 $('#presenca').append('<input value="'+frequencia.matricula+'" class="freq" type="checkbox" name="check[]">  <label for="presenca"></label> <br>');
                                 $('#justificativa').append('<textarea name="justificativa[]" class="just" id_matricula="'+frequencia.matricula+'" rows="1" type="text" > </textarea>  <label for="justificativa"></label>');
                                 $('#presenca').append('<input name="presenca[]" id="'+frequencia.matricula+'presenca" value="0" type="text" class="d-none"/>');
                            });
                           
                        });
                    });
        });  
       
        
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
    function CheckAll() { 
   for (var i=0;i<document.formRecebimento.elements.length;i++) {
        var x = document.formRecebimento.elements[i];
        if (x.name == 'check[]') { 
            x.checked = document.formRecebimento.selall.checked;
            } 
        }
        if (cont == 0){    
            var elem = document.getElementById("checar");
            elem.innerHTML = "Desmarcar todos";
            cont = 1;
        } else {
            var elem = document.getElementById("checar");
            elem.innerHTML = "Marcar todos";
            cont = 0;
        }

} 
   
    
</script>

