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
        
    
   

    </script>
</head>
@extends('layouts.app')

@section('content')
    <h1 class="text-success"> Alterar Escola </h1>

    <form 
        onkeyup="verifica_submit('validate');" 
        method="POST" 
        action="{{ route('escola.update', $escola->id) }}" 
        enctype="multipart/form-data" 
        class="needs-validation" 
        novalidate
    >
        <input name="_method" type="hidden" value="PUT">
        {{ csrf_field() }}
        <div class="row">
            <!-- Dados Escola -->
            <div class="col-md-4">
                <!-- Nome da Escola -->
                <label for="exampleFormControlInput1">
                    <?php echo Lang::get('validation.attributes.name'); ?>*
                </label>
                <input 
                    type="text" 
                    name="nome" 
                    value="{{ $escola->nome }}"
                    size="23" 
                    class="form-control validate is-valid"
                    id="nome" 
                    onkeyup="verifica_vazio(this.value, this.id);" 
                    require
                />
                <div class="invalid-feedback">
                    Por favor, digite o nome da escola
                </div>
            </div>
            <div class="col-md-4">
                <!-- Nome Fantasia da Escola -->
                <label for="exampleFormControlInput1">Nome Fantasia*</label>
                <input 
                    type="text" 
                    name="nome_fantasia"
                    value="{{ $escola->nome_fantasia }}"
                    size="23" 
                    class="form-control validate is-valid"
                    id="nome_fantasia" 
                    onkeyup="verifica_vazio(this.value, this.id); " 
                    require
                />
                <div class="invalid-feedback">
                    Por favor, digite o nome fantasia da escola
                </div>
            </div>
            <div class="col-md-4">
                <!-- Tipo da Escola -->
                <label for="exampleFormControlInput1">Tipo*</label>
                <select name="tipo" id="Tipo" class="form-control" require>
                    <option 
                        value="Particular"
                        <?php
                            if(strcmp($escola->tipo, 'Particular') === 0)
                                echo("selected");
                        ?>
                    >Particular</option>
                    <option 
                        value="Federal"
                        <?php
                            if(strcmp($escola->tipo, 'Federal') === 0)
                                echo("selected");
                        ?>
                    >Federal</option>
                    <option 
                        value="Estadual"
                        <?php
                            if(strcmp($escola->tipo, 'Estadual') === 0)
                                echo("selected");
                        ?>
                    >Estadual</option>
                    <option 
                        value="Municipal"
                        <?php
                            if(strcmp($escola->tipo, 'Municipal') === 0)
                                echo("selected");
                        ?>
                    >Municipal</option>
                </select>
            </div>

            <!-- Meios de Comunicação -->
            <div class="col-md-3">
                <!-- Telefone da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.phone'); ?>*</label>
                <input 
                    type="text" 
                    name="telefone" 
                    size="23" 
                    class="form-control validate is-valid" 
                    value="{{ $contato->numero_fixo }}" 
                    id="telefone" 
                    onkeyup="verifica_telefone(this.value, this.id);" 
                    maxlength="15" 
                    require
                />
            </div>
            <div class="col-md-3">
                <!-- Celular 1 da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell'); ?>  1*</label>
                <input 
                    type="text" 
                    name="celular1" 
                    size="23" 
                    class="form-control validate is-valid" 
                    value="{{ $contato->celular1 }}" 
                    id="celular1" 
                    onkeyup="verifica_telefone(this.value, this.id);"  
                    maxlength="15" 
                    require
                />
            </div>
            <div class="col-md-3">
                <!-- Celular 2 da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell'); ?>  2*</label>
                <input 
                    type="text" 
                    name="celular2" 
                    size="23" 
                    class="form-control validate is-valid" 
                    value="{{ $contato->celular2 }}" 
                    id="celular2" 
                    onkeyup="verifica_telefone(this.value, this.id);"  
                    maxlength="15" 
                    require
                />
            </div>
            <div class="col-md-3">
                <!-- Email da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.email');?>*</label>
                <input 
                    type="text" 
                    name="email"
                    value="{{ $contato->email }}"
                    size="23" 
                    class="form-control validate is-valid"
                    id="email" 
                    onkeyup="verifica_email(this.value, this.id);"
                >
            </div>

            <!-- Localização da Escola -->
            <div class="col-md-3">
                <!-- CEP da Escola -->
                <label for="exampleFormControlInput1">CEP</label>
                <input 
                    name="cep" 
                    type="text" 
                    id="cep" 
                    value="{{ $endereco->cep }}" 
                    size="23" 
                    maxlength="9"
                    onkeyup="pesquisacep(this.value, this.id);" 
                    class="form-control validate is-valid" 
                    require
                />
            </div>
            <div class="col-md-3">
                <!-- Rua da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.street');?>*</label>
                <input 
                    value="{{ $endereco->rua }}" 
                    name="rua" 
                    type="text" 
                    size="23" 
                    class="form-control validate is-valid"
                    id="rua" 
                    onkeyup="verifica_vazio(this.value, this.id);"
                    require
                />
                <div class="invalid-feedback">
                    Por favor, digite o nome da rua
                </div>
            </div>
            <div class="col-md-3">
                <!-- Bairro da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.neighbourhood');?>*</label>
                <input 
                    value="{{ $endereco->bairro }}" 
                    name="bairro" 
                    type="text" 
                    id="bairro" 
                    size="23" 
                    class="form-control validate is-valid"
                    onkeyup="verifica_vazio(this.value, this.id);" 
                    require
                />
                <div class="invalid-feedback">
                    Por favor, digite o nome do bairro
                </div>
            </div>
            <div class="col-md-3">
                <!-- Numero da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.number');?></label>
                <input 
                    value="{{ $endereco->numero }}"  
                    type="text" 
                    name="numero" 
                    size="23" 
                    class="form-control"
                    id="numero" 
                />
                <div class="invalid-feedback">
                    Por favor, digite o numero da escola
                </div>
            </div>
            <div class="col-md-3">
                <!-- Complemento da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.complement');?></label>
                <input 
                    value="{{ $endereco->complemento }}" 
                    type="text" 
                    name="complemento" 
                    size="23" 
                    class="form-control"
                    id="complemento" 
                />
                <div class="invalid-feedback">
                    Por favor, digite o complemento
                </div>
            </div>
            <div class="col-md-3">
                <!-- Cidade da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.city');?>*</label>
                <input 
                    value="{{ $endereco->cidade }}"  
                    name="cidade"  
                    type="text" 
                    id="cidade" 
                    size="23" 
                    class="form-control validate is-valid" 
                    onkeyup="verifica_vazio(this.value, this.id);" 
                    require
                />
                <div class="invalid-feedback">
                    Por favor, digite o nome da cidade
                </div>
            </div>
            <div class="col-md-3">
                <!-- Estado da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.state');?>*</label>
                <input 
                    value="{{ $endereco->estado }}"  
                    name="estado" 
                    type="text" 
                    id="uf" 
                    size="23" 
                    class="form-control validate is-valid" 
                    onkeyup="verifica_vazio(this.value, this.id);" 
                    require
                />
                <div class="invalid-feedback">
                    Por favor, digite o nome do estado
                </div>
            </div>
            <div class="col-md-3">
                <!-- País da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.country');?>*</label>
                <input 
                    value="{{ $endereco->pais }}"  
                    type="text" 
                    name="pais" 
                    size="23" 
                    class="form-control validate is-valid"
                    id="pais" 
                    onkeyup="verifica_vazio(this.value, this.id);" 
                    require
                />
                <div class="invalid-feedback">
                    Por favor, digite o nome do pais
                </div>
            </div>
            <div class="col-md-3">
                <!-- Submit -->
                <button onClick="verifica_campo('validate');" type="submit" class="btn btn-outline-success " id="submit"> Salvar </button>
            </div>
        </div>
    </form>
@endsection

