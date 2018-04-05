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

    function verifica_cpf(cpf){
        var validacpf = /^[0-9]{11}$/;
            if(validacpf.test(cpf)) {
            }
            else{
                alert("Formato de CPF inválido");
              //  document.getElementById('cpf').value=("");
            }

    }
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
         <table>
            <tr>
                <td><label>Nome: </label></td>
                <td><input type="text" name="nome" value="" id="nome" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Data de Nascimento: </label></td>
                <td><input type="date" name="data_nascimento" size="20" class="form-control"></td>
            </tr>
            <tr>
                <td><label>CPF: </label></td>
                <td><input name="cpf" type="text" id="cpf" value="" size="23" maxlength="11" class="form-control" onblur="verifica_cpf(this.value);" /></td>
            </tr>
            <tr>
                <td><label>Nome do Responsável: </label></td>
                <td><input name="nomePai" type="text" id="nomePai" value="" size="23"  class="form-control" /></td>
            </tr>
            <tr>
                <td><label>Data de Nascimento do Responsável: </label></td>
                <td> <input type="date" name="data_nascimentoPai" class="form-control"></td>
            </tr>
            <tr>
                <td><label>CPF do Responsável: </label></td>
                <td><input name="cpfPai" type="text" size="23" maxlength="11" class="form-control" onblur="verifica_cpf(this.value);" /></td>
            </tr>
             <tr>
                <td><label>Nome do Responsável: </label></td>
                <td><input name="nomeMae" type="text" id="cpf" value="" size="23" class="form-control" /></td>
            </tr>
            <tr>
                <td><label>Data de Nascimento do Responsável: </label></td>
                <td> <input type="date" name="data_nascimentoMae" class="form-control"></td>
            </tr>
            <tr>
                <td><label>CPF do Responsável: </label></td>
                <td><input name="cpfMae" type="text" size="23" maxlength="11" class="form-control" onblur="verifica_cpf(this.value);" /></td>
            </tr>
            <tr>
                <td><label>Data de Inscrição: </label></td>
                <td><input type="date" name="data_inscricao" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Data de Avaliação: </label></td>
                <td><input type="date" name="data_avaliacao" size="23" class="form-control"></td>
            </tr>

        </table>
        <br>
        
            <br>
        <!--<span> Nome: <input type="text" name="nome" value="" id="nome"></span></br>
        <span> Data de Nascimento: <input type="date" name="data_nascimento"></span></br>
        <span> CPF: <input name="cpf" type="text" id="cpf" value="" size="10" maxlength="9" /></span></br>
        <span> Nome do Pai: <input type="text" name="nomePai"></span></br>
        <span> Data de Nascimento do Pai: <input type="date" name="data_nascimentoPai"></span></br>
        <span> CPF do Pai: <input type="text" name="cpfPai"></span></br>
        <span> Nome da Mãe: <input type="text" name="nomeMae"></span></br>
        <span> Data de Nascimento da Mãe: <input type="date" name="data_nascimentoMae"></span></br>
        <span> CPF da Mãe: <input type="text" name="cpfMae"></span></br>-->
        </div>
        <div class="col-md-4">
         <table>
            <tr>
                <td><label>Turma: </label></td>
                <td><input type="text" name="turma" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Turno: </label></td>
                <td><input type="text" name="turno" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Observações: </label></td>
                <td><input type="text" name="observacoes" size="23" class="form-control" /></td>
            </tr>
            <tr>
                <td><label>Transporte: </label></td>
                <td><input name="transporte" type="text" value="" size="23" maxlength="9" class="form-control" /></td>
            </tr>
            <tr>
                <td><label>Profissão: </label></td>
                <td> <input type="text" name="profissao" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Religião: </label></td>
                <td><input name="religiao" type="text" size="23" class="form-control"/></td>
            </tr>
             <tr>
                <td><label>Raça: </label></td>
                <td><input name="raca" type="text" value="" size="23" class="form-control"/></td>
            </tr>
            <tr>
                <td><label>Renda: </label></td>
                <td> <input type="text" name="renda" size="23" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Quantidade Residência: </label></td>
                <td><input name="qtd_residencia" type="text" size="23" class="form-control"/></td>
            </tr>
            <tr>
                <td><label>Benefício Social: </label></td>
                <td><input name="beneficio_social" type="text" size="23" class="form-control"/></td>
            </tr>
            <tr>
                <td><label>Série: </label></td>
                <td><input name="serie" type="text" size="23" class="form-control" /></td>
            </tr>
            <tr>
                <td><label>Escola: </label></td>
                <td><select name="escola" class="form-control">
                    @foreach($escola as $school) 
                        <option value="{{ $school->id }}"> {{ $school->nome_fantasia }} </option>
                    @endforeach
                    </select></td>
            </tr>


        </table>

        <!--<span> Turma: <input type="text" name="turma"></span></br>
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
        </span>-->
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
           <table>
            <tr>
                <td><label>CEP: </label></td>
                <td><input name="cep" type="text" id="cep" value="" size="23" maxlength="9"
               onblur="pesquisacep(this.value);" class="form-control"/></td>
            </tr>
            <tr>
                <td><label>Rua: </label></td>
                <td><input name="rua" type="text" id="rua" size="23" class="form-control" /></td>
            </tr>
            <tr>
                <td><label>Bairro: </label></td>
                <td><input name="bairro" type="text" id="bairro" size="23" class="form-control" /></td>
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
                <td><label>Telefone: </label></td>
                <td><input type="text" name="telefone" size="23" class="form-control" value="" onblur="verifica_telefone(this.value); " maxlength="9"></td>
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
            
            <tr>
                <td><input type="submit" class="btn-success"></td>
            </tr>







          


        </table>
        <!--<span> CEP: <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" /></span></br>
        <span> Rua: <input name="rua" type="text" id="rua" size="60" /></span></br>
        <span> Bairro: <input name="bairro" type="text" id="bairro" size="40" /></span></br>
        <span> Numero: <input type="text" name="numero"></span></br>
        <span> Complemento: <input type="text" name="complemento"></span></br>
        <span> Cidade: <input name="cidade" type="text" id="cidade" size="40" /></span></br>
        <span> Estado: <input name="uf" type="text" id="uf" size="2" /></br>
        <span> Pais: <input type="text" name="pais"></span></br>
        <span> Data de Inscrição: <input type="date" name="data_inscricao"></span></br>
        <span> Data de Avaliação: <input type="date" name="data_avaliacao"></span></br>-->
        </div>

        <!--<div class="col-md-4">

        <table>
            <tr>
                <td><label>Número do Documento: </label></td>
                <td><input type="text" name="numero_documento" size="23"></td>
            </tr>
            <tr>
                <td><label>Tipo do Documento: </label></td>
                <td><select name="doc_type">
                    @foreach($documento_tipo as $doc_type) 
                        <option value="{{ $doc_type->id }}"> {{ $doc_type->nome }} </option>
                    @endforeach
                    </select></td>
            </tr>
            <tr>
                <td><label>Anotação: </label></td>
                <td><input type="text" name="comentario" size="23"></td>
            </tr>
            <tr>
                <td><label>Anexo: </label></td>
                <td><input type="file" name="documento" size="23"></td>
            </tr>
            <tr>
                <td><label>Número do Documento: </label></td>
                <td><input type="text" name="numero_documento2" size="23"></td>
            </tr>
            <tr>
                <td><label>Tipo do Documento: </label></td>
                <td><select name="doc_type2">
                    @foreach($documento_tipo2 as $doc_type2) 
                        <option value="{{ $doc_type2->id }}"> {{ $doc_type2->nome }} </option>
                    @endforeach
                    </select></td>
            </tr>
            <tr>
                <td><label>Anotação: </label></td>
                <td><input type="text" name="comentario2" size="23"></td>
            </tr>
            <tr>
                <td><label>Anexo: </label></td>
                <td><input type="file" name="documento2" size="23"></td>
            </tr>
            <tr>
                <td><label>Número do Documento: </label></td>
                <td><input type="text" name="numero_documento3" size="23"></td>
            </tr>
            <tr>
                <td><label>Tipo do Documento: </label></td>
                <td><select name="doc_type3">
                    @foreach($documento_tipo3 as $doc_type3) 
                        <option value="{{ $doc_type3->id }}"> {{ $doc_type3->nome }} </option>
                    @endforeach
                    </select></td>
            </tr>
            <tr>
                <td><label>Anotação: </label></td>
                <td><input type="text" name="comentario3" size="23"></td>
            </tr>
            <tr>
                <td><label>Anexo: </label></td>
                <td><input type="file" name="documento3" size="23"></td>
            </tr>
            </table>
            

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






     
        </div>-->
   

        
    </form>
@endsection

