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
        document.getElementById("divResultado").innerHTML = "<h1 class='text-warning'>Disciplinas Selecionadas</h1>";
        div = $('#divResultado');
        disciplina.forEach(function(value, index){
            div.append(
            `<div>
                <a title="Excluir Disciplina" class="a">
                    <i 
                        nome="Disciplina"
                        excluir="`+value+`"
                        class="fa fa-trash icon text-danger"
                        onClick="excluirDisciplinas('`+value+`')"
                        aria-hidden="true"
                    ></i>
                </a>
            `+value+"</div><br>");
            console.log(value)
        });
    }

    /*function tamanh(){
        document.getElementById('tamanho').value=array.length;
    }*/
    
    function teste(){
        document.getElementById('test').value=array;
    }

    function excluirDisciplinas(nome){
        posicao = disciplina.indexOf(nome);
        disciplina.pop(posicao);
        array.pop(posicao);
        salva();
    }
    

    

    </script>

    <style type="text/css">
        div.col-md-4{
            margin-top: 14px;
        }
    </style>
@extends('layouts.app')

@section('content')

    
    <form method= "POST" action="{{ route('turma_disciplina.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <input style="display: none" type="text" name="botao" value="{{ $help }}" id="SI" />
                <div class="col-md-6">
                    <h1 class="text-warning">Adicionar Disciplinas</h1>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1">Disciplina</label>
                        </div>
                        <div class="col-md-8">
                            <select name="disciplinaaa" id="disciplinaaa" class="form-control">
                                @foreach($disciplina as $materias) 
                                    <option value="{{ $materias->id }}"> {{ $materias->nome }}, {{ $materias->data }} - {{ $materias->hora }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button onclick="do_bom();" type="button" class="btn btn-outline-success">Adicionar</button>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" name="testando" value="Concluir" id="test" onclick="teste();" class="btn btn-outline-success">
                        </div>
                    </div>
                </div>
            <div class="col-md-6" id="divResultado">   
            </div>
        </div>
    </form>
@endsection

