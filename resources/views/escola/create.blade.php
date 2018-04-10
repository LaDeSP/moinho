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
@extends('layouts.app')

@section('content')
    <h1 class="text-success"><?php echo Lang::get('conteudo.addSchool'); ?> </h1>

    <form method= "POST" action="{{ route('escola.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <!-- Dados Escola -->
            <div class="col-md-4">
                <!-- Nome da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name'); ?></label>
                <input type="text" name="nome" size="23" class="form-control">
            </div>
            <div class="col-md-4">
                <!-- Nome Fantasia da Escola -->
                <label for="exampleFormControlInput1">Nome Fantasia</label>
                <input type="text" name="nome_fantasia" size="23" class="form-control">
            </div>
            <div class="col-md-4">
                <!-- Tipo da Escola -->
                <label for="exampleFormControlInput1">Tipo</label>
                <input type="text" name="tipo" size="23" class="form-control">
            </div>

            <!-- Meios de Comunicação -->
            <div class="col-md-3">
                <!-- Telefone da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.phone'); ?></label>
                <input type="text" name="telefone" size="23" class="form-control" value="" onblur="verifica_telefone(this.value); " maxlength="9" >
            </div>
            <div class="col-md-3">
                <!-- Celular 1 da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell'); ?>  1</label>
                <input type="text" name="celular1" size="23" class="form-control" value="" onblur="verifica_telefone(this.value); " maxlength="9">
            </div>
            <div class="col-md-3">
                <!-- Celular 2 da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell'); ?>  2</label>
                <input type="text" name="celular2" size="23" class="form-control" value="" onblur="verifica_telefone(this.value); " maxlength="9">
            </div>
            <div class="col-md-3">
                <!-- Email da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.email');?></label>
                <input type="text" name="email" size="23" class="form-control">
            </div>

            <!-- Localização da Escola -->
            <div class="col-md-3">
                <!-- CEP da Escola -->
                <label for="exampleFormControlInput1">CEP</label>
                <input name="cep" type="text" id="cep" value="" size="23" maxlength="9"
                onblur="pesquisacep(this.value);" class="form-control"/>
            </div>
            <div class="col-md-3">
                <!-- Rua da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.street');?></label>
                <input name="rua" type="text" id="rua" size="23" class="form-control"/>
            </div>
            <div class="col-md-3">
                <!-- Bairro da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.neighbourhood');?></label>
                <input name="bairro" type="text" id="bairro" size="23" class="form-control"/>
            </div>
            <div class="col-md-3">
                <!-- Numero da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.number');?></label>
                <input type="text" name="numero" size="23" class="form-control">
            </div>
            <div class="col-md-3">
                <!-- Complemento da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.complement');?></label>
                <input type="text" name="complemento" size="23" class="form-control">
            </div>
            <div class="col-md-3">
                <!-- Cidade da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.city');?></label>
                <input name="cidade" type="text" id="cidade" size="23" class="form-control" />
            </div>
            <div class="col-md-3">
                <!-- Estado da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.state');?></label>
                <input name="estado" type="text" id="estado" size="23" class="form-control" />
            </div>
            <div class="col-md-3">
                <!-- País da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.country');?></label>
                <input type="text" name="pais" size="23" class="form-control">
            </div>
            <div class="col-md-3">
                <!-- Submit -->
                <button type="submit" class="btn btn-outline-info" id="submit"><?php echo Lang::get('conteudo.add');?></button>
            </div>
        </div>
    </form>
@endsection

