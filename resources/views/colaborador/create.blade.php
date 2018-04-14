<?php 

use PHP\test;
?>

<html>
    <head>
 	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script>
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

    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('colaborador.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div id="carouselExampleControls" class="carousel slide" data-wrap="false" data-interval="100000">
            <div class="carousel-inner" >
                <div class="carousel-item active">
                    <div class="row">
                        <!-- Dados do Colaborador -->
                        <div class="col-md-4">
                            <!-- Nome Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name'); ?></label>
                            <input type="text" name="nome" value="" id="nome" size="23" class="form-control validate"
                            id="nome" onkeyup="verifica_vazio(this.value, this.id);">
                            <div class="invalid-feedback">
                                Por favor, digite o nome do colaborador
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Data de Nascimento Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.birthdate'); ?></label>
                            <input type="date" name="data_nascimento" size="20" class="form-control validate"
                            id="data_nascimento" onkeyup="verifica_vazio(this.value, this.id);">
                            <div class="invalid-feedback">
                                Por favor, digite a data de nascimento do colaborador
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- CPF do Colaborador -->
                            <label for="exampleFormControlInput1">CPF</label>
                            <input name="cpf" type="text" id="cpf" value="" size="23" maxlength="14" 
                            class="form-control validate" onkeyup="verifica_cpf(this.value, this.id);" />
                        </div>
                        <div class="col-md-4">
                            <!-- Telefone do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.phone'); ?></label>
                            <input type="text" name="telefone" size="23" class="form-control validate" 
                            id="telefone" onkeyup="verifica_telefone(this.value, this.id); " maxlength="15">
                        </div>
                        <div class="col-md-4">
                            <!-- Celular 1 do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell'); ?> 1</label>
                            <input type="text" name="celular1" size="23" class="form-control validate" 
                            id="celular1" onkeyup="verifica_telefone(this.value, this.id); " maxlength="15">
                        </div>
                        <div class="col-md-4">
                            <!-- Celular 2 do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell'); ?> 2</label>
                            <input type="text" name="celular2" size="23" class="form-control validate" 
                            id="celular2" onkeyup="verifica_telefone(this.value, this.id); " maxlength="15">
                        </div>
                        
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <!-- Dados do Colaborador -->
                        <div class="col-md-3">
                            <!-- CEP do Colaborador -->
                            <label for="exampleFormControlInput1">CEP</label>
                            <input name="cep" type="text" id="cep" size="20" maxlength="9"
                            onkeyup="pesquisacep(this.value, this.id);" class="form-control validate" />
                        </div>
                        <div class="col-md-3">
                            <!-- Rua do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.street');?></label>
                            <input name="rua" type="text" id="rua" size="20" 
                            onkeyup="verifica_vazio(this.value, this.id);" class="form-control validate"/>
                        </div>
                        <div class="col-md-3">
                            <!-- Bairro do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.neighbourhood');?></label>
                            <input name="bairro" type="text" id="bairro" size="20" 
                            onkeyup="verifica_vazio(this.value, this.id);" class="form-control validate"/>
                        </div>
                        <div class="col-md-3">
                            <!-- Número do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.number');?></label>
                            <input type="text" name="numero" size="20" class="form-control validate"
                            id="numero" onkeyup="verifica_vazio(this.value, this.id);">
                        </div>
                        <div class="col-md-3">
                            <!-- Complemento -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.complement');?></label>
                            <input type="text" name="complemento" size="20" class="form-control validate"
                            id="complemento" onkeyup="verifica_vazio(this.value, this.id);">
                        </div>
                        <div class="col-md-3">
                            <!-- Cidade do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.city');?></label>
                            <input name="cidade" type="text" id="cidade" size="20" class="form-control validate"
                            onkeyup="verifica_vazio(this.value, this.id);"/>
                        </div>
                        <div class="col-md-3">
                            <!-- Estado do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.state');?></label>
                            <input name="uf" type="text" id="uf" size="20" class="form-control validate" 
                            onkeyup="verifica_vazio(this.value, this.id);"/>
                        </div>
                        <div class="col-md-3">
                            <!-- País do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.country');?></label>
                            <input type="text" name="pais" class="form-control validate"
                            id="pais" onkeyup="verifica_vazio(this.value, this.id);">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Email do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.email');?></label>
                            <input type="text" name="email" size="23" class="form-control validate"
                            id="email" onkeyup="verifica_email(this.value, this.id);">
                        </div>
                        <div class="col-md-4">
                            <!-- Ano de Ingresso do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.enrrollmentTime');?></label>
                            <input type="number" min="1950" max="2018" value="2018" name="ano_ingresso" size="20" class="form-control validate is-valid"
                            id="ano_ingresso" onkeyup="verifica_vazio(this.value, this.id);">
                        </div>
                        <div class="col-md-4">
                            <!-- Área de Atuação -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.occupationArea');?></label>
                            <input type="text" name="area_atuacao" size="20" class="form-control validate"
                            id="area_atuacao" onkeyup="verifica_vazio(this.value, this.id);">
                        </div>
                        <div class="col-md-4">
                            <!-- Tipo de Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.typeCollaborator');?></label>
                            <select name="tipo_colaborador" class="form-control">
                                @foreach($tipo as $tipo_col) 
                                <option value="{{ $tipo_col->id }}"> {{ $tipo_col->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-outline-danger" id="submit" disabled><?php echo Lang::get('conteudo.add');?></button>
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

