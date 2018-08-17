<style>
    .a{
        margin-right: 10px;
    }
</style>

<script type="text/javascript">
    var array = `<?php 
        if(isset($ids)){
            echo implode(',', $ids);
        } else {
            echo ' ';
        }
    ?>`;
    array = array.split(',');
    if( array.indexOf(' ') != -1 ){
        array.pop(array.indexOf(' '))
    }
    var disciplina = `<?php 
        if(isset($nomes)){
            echo implode('.', $nomes);
        } else {
            echo ' ';
        }
    ?>`;
    disciplina = disciplina.split('.');
    if( disciplina.indexOf(' ') != -1 ){
        disciplina.pop(disciplina.indexOf(' '))
    }
    function do_bom(){
        a = document.getElementById('disciplinaaa').value;
        b = document.getElementById('disciplinaaa').children[a-1].innerText;
        //disciplina = {id: a};
        //array.push(disciplina);
        if( disciplina.indexOf(b) == -1 ){
            array.push(a);
            disciplina.push(b);
            //window.print(array); //imrpimir tela
            //console.log(disciplina);
            salva();
        }
       
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

    function excluirDisciplinas(nome){
        posicao = disciplina.indexOf(nome);
        disciplina.pop(posicao);
        array.pop(posicao);
        salva();
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
@extends('layouts.app')

@section('content')

    @if( \Session::has('message') )
        <h3 class="alert alert-success alert-dismissible fade show" role="alert">
            {{ \Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </h3>
    @endif

    <form method= "POST" action="{{ route('turma_disciplina.update', $id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        <div class="row">
            <input style="display: none" type="text" name="botao" value="{{ $id }}" id="SI" />
                <div class="col-md-6">
                    <h1 class="text-warning">Adicionar Disciplinas</h1>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1">Disciplina</label>
                        </div>
                        <div class="col-md-8">
                            <select name="disciplinaaa" id="disciplinaaa" class="form-control">
                                @foreach($disciplina as $materias) 
                                    <option value="{{ $materias->id }}">{{ $materias->nome }}, {{ $hora[$materias->id]->dia_semana }} - {{ $hora[$materias->id]->hora }}</option>
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
                @if( isset($disciplina_add) )
                    <h1 class='text-warning'>Disciplinas Selecionadas</h1>
                    @foreach( $disciplina_add as $value )
                        <div>
                            <a title="Excluir Disciplina" class="a disciplina">
                                <i 
                                    nome="Disciplina"
                                    excluir="{{ $value->nome }}"
                                    class="fa fa-trash icon text-danger"
                                    onClick="excluirDisciplinas('{{ $value->nome }}');"
                                    aria-hidden="true"
                                ></i>
                            </a>
                            {{ $value->nome }}, {{ $hora[$materias->id]->dia_semana }} - {{ $hora[$materias->id]->hora }}
                        </div>
                        
                        <br>
                    @endforeach
                @endif
            </div>
        </div>
    </form>
@endsection

