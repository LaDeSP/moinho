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
                document.getElementById('cpf').value=("");
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
    <h1 class="text-danger"><?php echo Lang::get('conteudo.addCollaborator'); ?></h1>

    <!-- Relatório -->
    <div style="margin-bottom: 20px">
        <!-- Adicionar filtros -->
        <a href="{{ url('/relatorio_colaborador')}}"  class="btn btn-outline-info"><?php echo Lang::get('conteudo.employeeReport'); ?> </a>
    </div>

    <form method= "POST" action="{{ route('colaborador.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div id="carouselExampleControls" class="carousel slide" data-wrap="false" data-interval="100000">
            <div class="carousel-inner" >
                <div class="carousel-item active">
                    <div class="row">
                        <!-- Dados do Colaborador -->
                        <div class="col-md-4">
                            <!-- Nome Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name'); ?></label>
                            <input type="text" name="nome" value="" id="nome" size="23" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <!-- Data de Nascimento Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.birthdate'); ?></label>
                            <input type="date" name="data_nascimento" size="20" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <!-- CPF do Colaborador -->
                            <label for="exampleFormControlInput1">CPF</label>
                            <input name="cpf" type="text" id="cpf" value="" size="23" maxlength="11" class="form-control" onblur="verifica_cpf(this.value);" />
                        </div>
                        <div class="col-md-4">
                            <!-- Telefone do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.phone'); ?></label>
                            <input type="text" name="telefone" size="23" class="form-control" value="" onblur="verifica_telefone(this.value); " maxlength="9">
                        </div>
                        <div class="col-md-4">
                            <!-- Celular 1 do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell'); ?> 1</label>
                            <input type="text" name="celular1" size="23" class="form-control" onblur="verifica_telefone(this.value); " maxlength="9">
                        </div>
                        <div class="col-md-4">
                            <!-- Celular 2 do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell'); ?> 2</label>
                            <input type="text" name="celular2" size="23" class="form-control" onblur="verifica_telefone(this.value); " maxlength="9">
                        </div>
                        
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <!-- Dados do Colaborador -->
                        <div class="col-md-3">
                            <!-- CEP do Colaborador -->
                            <label for="exampleFormControlInput1">CEP</label>
                            <input placeholder="xxxxx-xxx" name="cep" type="text" id="cep" value="" size="20" maxlength="9"
                            onblur="pesquisacep(this.value);" class="form-control" />
                        </div>
                        <div class="col-md-3">
                            <!-- Rua do Colaborador -->
                            <label for="exampleFormControlInput1">Rua</label>
                            <input name="rua" type="text" id="rua" size="20" class="form-control" />
                        </div>
                        <div class="col-md-3">
                            <!-- Bairro do Colaborador -->
                            <label for="exampleFormControlInput1">Bairro</label>
                            <input name="bairro" type="text" id="bairro" size="20" class="form-control" />
                        </div>
                        <div class="col-md-3">
                            <!-- Número do Colaborador -->
                            <label for="exampleFormControlInput1">Número</label>
                            <input type="text" name="numero" size="20" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <!-- Complemento -->
                            <label for="exampleFormControlInput1">Complemento</label>
                            <input type="text" name="complemento" size="20" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <!-- Cidade do Colaborador -->
                            <label for="exampleFormControlInput1">Cidade</label>
                            <input name="cidade" type="text" id="cidade" size="20" class="form-control" />
                        </div>
                        <div class="col-md-3">
                            <!-- Estado do Colaborador -->
                            <label for="exampleFormControlInput1">Estado</label>
                            <input name="uf" type="text" id="uf" size="20" class="form-control" />
                        </div>
                        <div class="col-md-3">
                            <!-- País do Colaborador -->
                            <label for="exampleFormControlInput1">País</label>
                            <input type="text" name="pais" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Email do Colaborador -->
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="text" name="email" size="23" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <!-- Ano de Ingresso do Colaborador -->
                            <label for="exampleFormControlInput1">Ano de Ingresso</label>
                            <input type="text" name="ano_ingresso" size="20" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <!-- Área de Atuação -->
                            <label for="exampleFormControlInput1">Área de Atuação</label>
                            <input type="text" name="area_atuacao" size="20" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <!-- Tipo de Colaborador -->
                            <label for="exampleFormControlInput1">Área de Atuação</label>
                            <select name="tipo_colaborador" class="form-control">
                                @foreach($tipo as $tipo_col) 
                                <option value="{{ $tipo_col->id }}"> {{ $tipo_col->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-8"></div>
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

