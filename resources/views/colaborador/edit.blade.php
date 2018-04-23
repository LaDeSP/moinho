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
    <h1 class="text-danger"> Alterar Colaborador </h1>

    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('colaborador.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div id="carouselExampleControls" class="carousel slide" data-wrap="false" data-interval="100000">
            <div class="carousel-inner" >
                <div class="carousel-item active">
                    <div class="row">
                        <!-- Dados do Colaborador -->
                        <div class="col-md-4">
                            <!-- Nome Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name'); ?>*</label>
                            <input 
                                type="text" 
                                name="nome" 
                                value="{{ $pessoa->nome }}" 
                                id="nome" 
                                size="23" 
                                class="form-control validate is-valid"
                                id="nome" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o nome do colaborador
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Data de Nascimento Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.birthdate'); ?>*</label>
                            <input 
                                type="date" 
                                name="data_nascimento" 
                                value="{{ $pessoa->data_nascimento }}"
                                size="20" 
                                class="form-control validate is-valid"
                                id="data_nascimento" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite a data de nascimento do colaborador
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- CPF do Colaborador -->
                            <label for="exampleFormControlInput1">CPF*</label>
                            <input 
                                name="cpf" 
                                type="text" 
                                id="cpf" 
                                value="{{ $pessoa->cpf }}" 
                                size="23" 
                                maxlength="14" 
                                class="form-control validate is-valid" 
                                onkeyup="verifica_cpf(this.value, this.id);" 
                            />
                        </div>
                        <div class="col-md-4">
                            <!-- Telefone do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.phone'); ?>*</label>
                            <input 
                                type="text" 
                                name="telefone" 
                                value="{{ $contato->numero_fixo }}"
                                size="23" 
                                class="form-control validate is-valid" 
                                id="telefone" 
                                onkeyup="verifica_telefone(this.value, this.id);" 
                                maxlength="15"
                            />
                        </div>
                        <div class="col-md-4">
                            <!-- Celular 1 do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell'); ?> 1*</label>
                            <input 
                                type="text" 
                                name="celular1" 
                                value="{{ $contato->celular1 }}"
                                size="23" 
                                class="form-control validate is-valid" 
                                id="celular1" 
                                onkeyup="verifica_telefone(this.value, this.id);" 
                                maxlength="15"
                            />
                        </div>
                        <div class="col-md-4">
                            <!-- Celular 2 do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell'); ?> 2*</label>
                            <input 
                                type="text" 
                                name="celular2" 
                                value="{{ $contato->celular2 }}"
                                size="23" 
                                class="form-control validate is-valid" 
                                id="celular2" 
                                onkeyup="verifica_telefone(this.value, this.id);" 
                                maxlength="15"
                            />
                        </div>
                        
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <!-- Dados do Colaborador -->
                        <div class="col-md-3">
                            <!-- CEP do Colaborador -->
                            <label for="exampleFormControlInput1">CEP*</label>
                            <input 
                                name="cep" 
                                type="text" 
                                value="{{ $endereco->cep }}"
                                id="cep" 
                                size="20" 
                                maxlength="9"
                                onkeyup="pesquisacep(this.value, this.id);" 
                                class="form-control validate is-valid" 
                            />
                        </div>
                        <div class="col-md-3">
                            <!-- Rua do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.street');?>*</label>
                            <input 
                                name="rua" 
                                value="{{ $endereco->rua }}"
                                type="text" 
                                id="rua" 
                                size="20" 
                                onkeyup="verifica_vazio(this.value, this.id);" 
                                class="form-control validate is-valid"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o nome da rua
                            </div>
                        </div>
                        <div class="col-md-3">
                            <!-- Bairro do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.neighbourhood');?>*</label>
                            <input 
                                name="bairro" 
                                value="{{ $endereco->bairro }}"
                                type="text" 
                                id="bairro" 
                                size="20" 
                                onkeyup="verifica_vazio(this.value, this.id);" 
                                class="form-control validate is-valid"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o nome do bairro
                            </div>
                        </div>
                        <div class="col-md-3">
                            <!-- Número do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.number');?>*</label>
                            <input 
                                type="text" 
                                name="numero" 
                                value="{{ $endereco->numero }}"
                                size="20" 
                                class="form-control validate is-valid"
                                id="numero" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o numero da residência
                            </div>
                        </div>
                        <div class="col-md-3">
                            <!-- Complemento -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.complement');?>*</label>
                            <input 
                                type="text" 
                                name="complemento" 
                                value="{{ $endereco->complemento }}"
                                size="20" 
                                class="form-control validate is-valid"
                                id="complemento" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o complemento
                            </div>
                        </div>
                        <div class="col-md-3">
                            <!-- Cidade do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.city');?>*</label>
                            <input 
                                name="cidade" 
                                value="{{ $endereco->cidade }}"
                                type="text" 
                                id="cidade" 
                                size="20" 
                                class="form-control validate is-valid"
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o nome da cidade
                            </div>
                        </div>
                        <div class="col-md-3">
                            <!-- Estado do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.state');?>*</label>
                            <input 
                                name="uf" 
                                value="{{ $endereco->estado }}"
                                type="text" 
                                id="uf" 
                                size="20" 
                                class="form-control validate is-valid" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o nome do estado
                            </div>
                        </div>
                        <div class="col-md-3">
                            <!-- País do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.country');?>*</label>
                            <input 
                                type="text" 
                                name="pais" 
                                value="{{ $endereco->pais }}"
                                class="form-control validate is-valid"
                                id="pais" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o nome do país
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Email do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.email');?>*</label>
                            <input 
                                type="text" 
                                name="email"
                                value="{{ $user->email }}"
                                size="23" 
                                class="form-control validate is-valid"
                                id="email" 
                                onkeyup="verifica_email(this.value, this.id);"
                            />
                        </div>
                        <div class="col-md-4">
                            <!-- Ano de Ingresso do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.enrrollmentTime');?>*</label>
                            <input 
                                type="number" 
                                min="1950" 
                                max="2018" 
                                value="{{ $colaborador->ano_ingreco }}" 
                                name="ano_ingresso" 
                                size="20" 
                                class="form-control validate is-valid"
                                id="ano_ingresso" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                        </div>
                        <div class="col-md-4">
                            <!-- Área de Atuação -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.occupationArea');?>*</label>
                            <input 
                                type="text" 
                                name="area_atuacao" 
                                value="{{ $colaborador->area_atuacao }}"
                                size="20" 
                                class="form-control validate is-valid"
                                id="area_atuacao" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                        </div>
                        <div class="col-md-4">
                            <!-- Tipo de Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.typeCollaborator');?>*</label>
                            <select name="tipo_colaborador" class="form-control">
                                @foreach($tipo as $tipo_col) 
                                    <option 
                                        value="{{ $tipo_col->id }}"
                                        <?php
                                            if($tipo_col->id === $colaborador->tipo_colaborador_id)
                                                echo "selected"
                                        ?>
                                    >{{ ucfirst($tipo_col->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-outline-success" id="submit"> Alterar </button>
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

