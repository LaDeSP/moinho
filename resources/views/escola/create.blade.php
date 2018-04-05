<?php 

use PHP\test;
?>

<html>
    <head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
      
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos./
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
    function verifica_telefone(telefone){
        var validatel = /^[0-9]{9}$/;
            if(validatel.test(telefone)) {
            }
            else{
                alert("Formato de telefone inválido");
               // document.getElementById('cpf').value=("");
            }

    }
   

    </script>
    </head>
@extends('layouts.app');

@section('content')
    <h1>Inscrever Escolas</h1>

    <form method= "POST" action="{{ route('escola.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-4">
         <table>
            <tr>
                <td><label>Nome: </label></td>
                <td><input type="text" name="nome" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Nome Fantasia: </label></td>
                <td><input type="text" name="nome_fantasia" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Tipo: </label></td>
                <td><input type="text" name="tipo" size="23" class="form-control"></td>
            </tr>
       </table>
        
        </div>
        <div class="col-md-4">
        <table>
            <tr>
                <td><label>Telefone: </label></td>
                <td><input type="text" name="telefone" size="23" class="form-control" value="" onblur="verifica_telefone(this.value); " maxlength="9" ></td>
            </tr>
            <tr>
                <td><label>Celular 1: </label></td>
                <td><input type="text" name="celular1" size="23" class="form-control" value="" onblur="verifica_telefone(this.value); " maxlength="9"></td>
            </tr>
            <tr>
                <td><label>Celular 2: </label></td>
                <td><input type="text" name="celular2" size="23" class="form-control" value="" onblur="verifica_telefone(this.value); " maxlength="9"></td>
            </tr>
            <tr>
                <td><label>Email: </label></td>
                <td><input type="text" name="email" size="23" class="form-control"></td>
            </tr>
       </table>

       
        </div>

        <div class="col-md-4">
        <table>
            <tr>
                <td><label>CEP: </label></td>
                <td><input name="cep" type="text" id="cep" value="" size="23" maxlength="9"
               onblur="pesquisacep(this.value);" class="form-control"/></td>
            </tr>
            <tr>
                <td><label>Rua: </label></td>
                <td><input name="rua" type="text" id="rua" size="23" class="form-control"/></td>
            </tr>
            <tr>
                <td><label>Bairro: </label></td>
                <td><input name="bairro" type="text" id="bairro" size="23" class="form-control"/></td>
            </tr>
            <tr>
                <td><label>Numero: </label></td>
                <td><input type="text" name="numero" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Complemento: </label></td>
                <td><input type="text" name="complemento" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Cidade: </label></td>
                <td> <input name="cidade" type="text" id="cidade" size="23" class="form-control" /></td>
            </tr>
            <tr>
                <td><label>Estado: </label></td>
                <td> <input name="uf" type="text" id="uf" size="23" class="form-control" /></td>
            </tr>
            <tr>
                <td><label>País: </label></td>
                <td><input type="text" name="pais" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><input type="submit" class="btn-success"></td>
            </tr>
            </table>
     
        </div>
   

        
    </form>
@endsection

