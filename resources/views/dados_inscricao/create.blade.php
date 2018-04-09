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

</head>
@extends('layouts.app')

@section('content')
    <h1 class="text-info"><?php echo Lang::get('conteudo.addInscription');?></h1>
    <div style="margin-bottom: 20px">
        <a href="{{ url('/relatorio_inscricao')}}"  class="btn btn-outline-info">Baixar - Relatório de Inscrição</a>
    </div>
    <form method= "POST" action="{{ route('dados_inscricao.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div id="carouselExampleControls" class="carousel slide" data-wrap="false" data-interval="100000">
            <div class="carousel-inner" >
                <div class="carousel-item active">
                    <div class="row">
                        <!-- Dados Participante -->
                        <div class="col-md-4">
                            <!-- Nome Participante -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name');?></label>
                            <input type="text" name="nome" value="" id="nome" size="23" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <!-- Data Participante -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.birthdate');?></label>
                            <input type="date" name="data_nascimento" size="20" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <!-- CPF Participante -->
                            <label for="exampleFormControlInput1">CPF</label>
                            <input name="cpf" type="text" id="cpf" value="" size="23" maxlength="11" class="form-control" onblur="verifica_cpf(this.value);" />
                        </div>

                        <!-- Pular Linha -->
                        <br>

                        <!-- Dados Responsável -->
                        <div class="col-md-4">
                            <!-- Nome Responsável -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.responsibleName');?></label>
                            <input name="nomePai" type="text" id="nomePai" value="" size="23"  class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <!-- Data Responsável -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.responsibleDate');?></label>
                            <input type="date" name="data_nascimentoPai" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <!-- CPF Responsável -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cpfResponsible');?></label>
                            <input name="cpfPai" type="text" size="23" maxlength="11" class="form-control" onblur="verifica_cpf(this.value);" />
                        </div>


                        <!-- Dados Responsável 2 -->
                        <div class="col-md-4">
                            <!-- Nome Responsável 2 -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.responsibleName');?></label>
                            <input name="nomeMae" type="text" id="cpf" value="" size="23" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <!-- Data Responsável 2 -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.responsibleDate');?></label>
                            <input type="date" name="data_nascimentoMae" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <!-- CPF Responsável 2 -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cpfResponsible');?></label>
                            <input name="cpfMae" type="text" size="23" maxlength="11" class="form-control" onblur="verifica_cpf(this.value);" />
                        </div>

                        <!-- Data da Inscrição e Avaliação -->
                        <div class="col-md-6">
                            <!-- Data de Inscrição -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.inscriptionDate');?></label>
                            <input type="date" name="data_inscricao" size="23" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <!-- Data de Avaliação -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.exameDate');?></label>
                            <input type="date" name="data_avaliacao" size="23" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <!-- Turma -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.grade');?></label>
                            <input type="text" name="turma" size="23" class="form-control">
                        </div>
                        <!-- Turno -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.shift');?></label>
                            <input type="text" name="turma" size="23" class="form-control">
                        </div>
                        <!-- Transporte -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.transportation');?></label>
                            <input name="transporte" type="text" value="" size="23" maxlength="9" class="form-control" />
                        </div>
                        <!-- Observações -->
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.observation');?></label>
                            <textarea name="observacoes" rows="5"></textarea>
                        </div>
                        <!-- Profissão -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.profession');?></label>
                            <input type="text" name="profissao" size="23" class="form-control">
                        </div>
                        <!-- Religião -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.religion');?></label>
                            <input name="religiao" type="text" size="23" class="form-control"/>
                        </div>
                        <!-- Raça -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.race');?></label>
                            <input name="raca" type="text" value="" size="23" class="form-control"/>
                        </div>
                        <!-- Renda -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.income');?></label>
                            <input type="text" name="renda" size="23" class="form-control">
                        </div>
                        <!-- Quantidade Residência -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.manyResidence');?></label>
                            <input name="qtd_residencia" type="text" size="23" class="form-control"/>
                        </div>
                        <!-- Benefício Social -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.socialBenefit');?></label>
                            <input name="beneficio_social" type="text" size="23" class="form-control"/>
                        </div>
                        <!-- Benefício Social -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.socialBenefit');?></label>
                            <input name="beneficio_social" type="text" size="23" class="form-control"/>
                        </div>
                        <!-- Sériel -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.grade');?></label>
                            <input name="serie" type="text" size="23" class="form-control" />
                        </div>
                        <!-- Escola -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.school');?></label>
                            <select name="escola" class="form-control">
                                @foreach($escola as $school) 
                                    <option value="{{ $school->id }}"> {{ $school->nome_fantasia }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <!-- CEP -->
                        <div class="col-md-2">
                            <label for="exampleFormControlInput1">CEP</label>
                            <input placeholder="xxxxx-xxx" name="cep" type="text" id="cep" value="" size="23" maxlength="9" onblur="pesquisacep(this.value);" class="form-control"/>
                        </div>
                        <!-- Rua -->
                        <div class="col-md-5">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.street');?></label>
                            <input name="rua" type="text" id="rua" size="23" class="form-control" />
                        </div>
                        <!-- Bairro -->
                        <div class="col-md-5">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.neighbourhood');?></label>
                            <input name="bairro" type="text" id="bairro" size="23" class="form-control" />
                        </div>
                        <!-- Número -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.number');?></label>
                            <input type="text" name="numero" size="23" class="form-control">
                        </div>
                        <!-- Complemento -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.complement');?></label>
                            <input type="text" name="complemento" size="23" class="form-control">
                        </div>
                        <!-- Cidade -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.city');?></label>
                            <input name="uf" type="text" id="cidade" size="23" class="form-control" />
                        </div>
                        <!-- Estado -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.state');?></label>
                            <input name="uf" type="text" id="uf" size="23" class="form-control" />
                        </div>
                        <!-- País -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.country');?></label>
                            <input type="text" name="pais" size="23" class="form-control"/>
                        </div>
                        <!-- Telefone -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.phone');?></label>
                            <input type="text" name="telefone" size="23" class="form-control" value="" onblur="verifica_telefone(this.value); " maxlength="9">
                        </div>
                        <!-- Celular 1 -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell');?> 1</label>
                            <input type="text" name="celular1" size="23" class="form-control" value="" onblur="verifica_telefone(this.value); " maxlength="9">
                        </div>
                        <!-- Celular 2 -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell');?> 2</label>
                            <input type="text" name="celular2" size="23" class="form-control" value="" onblur="verifica_telefone(this.value); " maxlength="9">
                        </div>
                        <!-- Email -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="text" name="email" size="23" class="form-control">
                        </div>

                        <!-- Submit -->
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-outline-info" id="submit">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="right: 50%">
                <i class="fa fa-arrow-left fa-lg text-success icon" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <i class="fa fa-arrow-right fa-lg text-success icon" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </form>
@endsection

