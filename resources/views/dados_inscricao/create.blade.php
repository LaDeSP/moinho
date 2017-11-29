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
    //copiar essa porra e tentar refazer com nome. pelo menos a inserção dos ... na tela que nem consegui. depois vejo de pegar do BD

    </script>

<!--
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
   //---------------------------------------------------------------------------------------------- começo do 2
/*
    
      
    //copiar essa porra e tentar refazer com nome. pelo menos a inserção dos ... na tela que nem consegui. depois vejo de pegar do BD
    $(document).ready(function () {
    	$.ajaxSetup({
        	headers: {
        	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	}
    	});
	$.ajax({
    	url: '/dados_inscricao/busca',
    	type: 'POST',
    	dataType: 'JSON',
    	data: $('form#profile-form').serialize()
	});
		$('#cpf').blur(function(){ 	//Ao submeter formulário
					var a = <?php //echo busca_nome();?>;
					console.log(a);
					
				});
	});*/
   
    </script>
-->
    


   <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $("input[name='cpf']").blur(function(){
      var $nome = $("input[name='nome']");
      

      $nome.val('Carregando...');
      //$telefone.val('Carregando...');

        $.getJSON(
          'function.php',
          { cpf: $( this ).val() },
          function( json )
          {
            $nome.val( json.nome );
            //$telefone.val( json.telefone );
          }
        );
    });
  });
  </script> -->
<!--possivelmente excluir esse script e o function.php.
ai fazer o update or save  em vez de só save
coisar cpf unico ou não, falaram algo e eu não peguei exatamente. algo de chave primaria-->
    
    </head>


@extends('layouts.app');

@section('content')
    <h1>Adicionar Inscrição</h1>

    <form method= "POST" action="{{ route('dados_inscricao.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-4">

        <span> Nome: <input type="text" name="nome" value="" id="nome"></span></br>
        <span> Data de Nascimento: <input type="date" name="data_nascimento"></span></br>
        <span> CPF: <input name="cpf" type="text" id="cpf" value="" size="10" maxlength="9" /></span></br>
        <span> Nome do Pai: <input type="text" name="nomePai"></span></br>
        <span> Data de Nascimento do Pai: <input type="date" name="data_nascimentoPai"></span></br>
        <span> CPF do Pai: <input type="text" name="cpfPai"></span></br>
        <span> Nome da Mãe: <input type="text" name="nomeMae"></span></br>
        <span> Data de Nascimento da Mãe: <input type="date" name="data_nascimentoMae"></span></br>
        <span> CPF da Mãe: <input type="text" name="cpfMae"></span></br>
        </div>
        <div class="col-md-4">
        <span> Turma: <input type="text" name="turma"></span></br>
        <span> Turno: <input type="text" name="turno"></span></br>
        <span> Observacoes: <input type="text" name="observacoes"></span></br>
        <span> Transporte: <input type="text" name="transporte"></span></br>
        <span> Profissão: <input type="text" name="profissao"></span></br>
        <span> Religião: <input type="text" name="religiao"></span></br>
        <span> Raça: <input type="text" name="raca"></span></br>
        <span> Renda: <input type="number" name="renda"></span></br>
        <span> Quantidade Residência: <input type="number" name="qtd_residencia"></span></br>
        <span> Beneficio Social: <input type="text" name="beneficio_social"></span></br>
        <span> Serie: <input type="text" name="serie"></span></br>
        <span>Escola:
        <select name="escola">
        @foreach($escola as $school) 
            <option value="{{ $school->id }}"> {{ $school->nome_fantasia }} </option>
        @endforeach
        </select> </br>
        </span>
        </div>

        <div class="col-md-4">
        <!-- <form method="get" action=".">
        <label>Cep:
        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" /></label><br />
        <label>Rua:
        <input name="rua" type="text" id="rua" size="60" /></label><br />
        <label>Bairro:
        <input name="bairro" type="text" id="bairro" size="40" /></label><br />
        <label>Cidade:
        <input name="cidade" type="text" id="cidade" size="40" /></label><br />
        <label>Estado:
        <input name="uf" type="text" id="uf" size="2" /></label><br />
      </form>-->
        <span> CEP: <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" /></span></br>
        <span> Rua: <input name="rua" type="text" id="rua" size="60" /></span></br>
        <span> Bairro: <input name="bairro" type="text" id="bairro" size="40" /></span></br>
        <span> Numero: <input type="text" name="numero"></span></br>
        <span> Complemento: <input type="text" name="complemento"></span></br>
        <span> Cidade: <input name="cidade" type="text" id="cidade" size="40" /></span></br>
        <span> Estado: <input name="uf" type="text" id="uf" size="2" /></br>
        <span> Pais: <input type="text" name="pais"></span></br>
        <span> Data de Inscrição: <input type="date" name="data_inscricao"></span></br>
        <span> Data de Avaliação: <input type="date" name="data_avaliacao"></span></br>
        </div>

        <div class="col-md-4">
        <br>
        <span> Número do documento: <input type="text" name="numero_documento"></span></br>
        <span> Tipo do documento: 
        <select name="doc_type">
        @foreach($documento_tipo as $doc_type) 
            <option value="{{ $doc_type->id }}"> {{ $doc_type->nome }} </option>
        @endforeach
        </select>
        </span></br>
        <span> Anotação: <input type="text" name="comentario"></span></br>
        <span> Anexo: <input type="file" name="documento"></span></br>

        <span> Número do documento: <input type="text" name="numero_documento2"></span></br>
        <span> Tipo do documento: 
        <select name="doc_type2">
        @foreach($documento_tipo2 as $doc_type2) 
            <option value="{{ $doc_type2->id }}"> {{ $doc_type2->nome }} </option>
        @endforeach
        </select>
        </span></br>
        <span> Anotação: <input type="text" name="comentario2"></span></br>
        <span> Anexo: <input type="file" name="documento2"></span></br>


        <span> Número do documento: <input type="text" name="numero_documento3"></span></br>
        <span> Tipo do documento: 
        <select name="doc_type3">
        @foreach($documento_tipo3 as $doc_type3) 
            <option value="{{ $doc_type3->id }}"> {{ $doc_type3->nome }} </option>
        @endforeach
        </select>
        </span></br>
        <span> Anotação: <input type="text" name="comentario3"></span></br>
        <span> Anexo: <input type="file" name="documento3"></span></br>






     
        </div>
   

        <input type="submit">
    </form>
@endsection

