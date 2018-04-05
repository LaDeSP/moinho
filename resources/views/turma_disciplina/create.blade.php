<script type="text/javascript">
    var array = [];
    var disciplina = [];
    function do_bom(){
        a = document.getElementById('disciplinaaa').value;
        b = document.getElementById('disciplinaaa').children[a-1].innerText;
        //disciplina = {id: a};
        //array.push(disciplina);
        array.push(a);
        disciplina.push(b);
       //window.print(array); //imrpimir tela
       //console.log(disciplina);
       salva();
       
    }

    function salva(){
        var i=0;
        var div = document.getElementById("divResultado");
       // for (i=0; i<array.length; i=i+1){
          /*  console.log(array[i].id);
            div.innerHTML = "<h1>" + "Lista de Disciplinas:" +"</h1>"+ "\n" + array[i].id + "\n"*/
            //document.getElementById("divResultado").innerHTML = array.join(" ");
            //document.getElementById("divResultado").innerHTML = JSON.stringify(array);

      //  }
        document.getElementById("divResultado").innerHTML = "<h1>Disciplinas Selecionadas:</h1>" + "\n" + disciplina.join("<br>");
    }

    /*function tamanh(){
        document.getElementById('tamanho').value=array.length;
    }*/
    
    function teste(){
        document.getElementById('test').value=array;
    }


    

    </script>

    <style type="text/css">
        div.col-md-4{
            margin-top: 14px;
        }
    </style>
@extends('layouts.app');

@section('content')
    

    <form method= "POST" action="{{ route('turma_disciplina.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" name="botao" value="{{ $help }}" id="SI" >
        <div class="col-md-4">
        <h1>Cadastrar Disciplinas da Turma {{ $help }} </h1>
        <table>
            <tr>
                <td><label>Disciplina: </label></td>
                <td><select name="disciplinaaa" id="disciplinaaa" class="form-control">
                    @foreach($disciplina as $materias) 
                        <option value="{{ $materias->id }}"> {{ $materias->nome }} </option>
                    @endforeach
                    </select></td>
                     <td><button onclick="do_bom();" type="button" class="btn btn-primary">Adicionar</button></td>
            </tr>
           <!-- <tr>
                <td><button onclick="do_bom();" type="button" class="btn btn-primary">Adicionar</button></td>
            </tr>-->
            <tr>
                <td><input type="submit" name="testando" value="Submit" id="test" onclick="teste();" class="btn-success"></td>
            </tr>
        </table>


        </div>
        <div class="col-md-4" id="divResultado">
        
        </div>

       
      
        
    
       

        
    </form>
@endsection

