<?php 

use PHP\test;
$cont = 1;
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
    <h1 class="text-success"><?php echo Lang::get('conteudo.school'); ?> </h1>

    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('escola.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        {{ csrf_field() }}
        <div class="row">
            <!-- Dados Escola -->
            <div class="col-md-4">
                <!-- Nome da Escola -->
                <label for="exampleFormControlInput1">
                    <?php echo Lang::get('validation.attributes.name'); ?>*
                </label>
                <input type="text" name="nome" size="23" class="form-control validate"
                id="nome" onkeyup="verifica_vazio(this.value, this.id);" require>
                <div class="invalid-feedback">
                    Por favor, digite o nome da escola
                </div>
            </div>
            <div class="col-md-4">
                <!-- Nome Fantasia da Escola -->
                <label for="exampleFormControlInput1">Nome Fantasia*</label>
                <input type="text" name="nome_fantasia" size="23" class="form-control validate"
                id="nome_fantasia" onkeyup="verifica_vazio(this.value, this.id); " require>
                <div class="invalid-feedback">
                    Por favor, digite o nome fantasia da escola
                </div>
            </div>
            <div class="col-md-4">
                <!-- Tipo da Escola -->
                <label for="exampleFormControlInput1">Tipo*</label>
                <select name="tipo" id="Tipo" class="form-control" require>
                      <option value="Municipal">Municipal</option>
                      <option value="Estadual">Estadual</option>
                      <option value="Particular">Particular</option>
                      <option value="Federal">Federal</option>
                      <option value="Outro">Outro...</option>
                </select>
            </div>

            <!-- Meios de Comunicação -->
            <div class="col-md-3">
                <!-- Telefone da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.phone'); ?>*</label>
                <input type="text" name="telefone" size="23" class="form-control validate" value="" 
                    id="telefone" onkeyup="verifica_telefone(this.value, this.id); " maxlength="15" require>
            </div>
            <div class="col-md-3">
                <!-- Celular 1 da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell'); ?>  1*</label>
                <input type="text" name="celular1" size="23" class="form-control validate" value="" 
                id="celular1" onkeyup="verifica_telefone(this.value, this.id); "  maxlength="15" require>
            </div>
            <div class="col-md-3">
                <!-- Celular 2 da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell'); ?>  2</label>
                <input type="text" name="celular2" size="23" class="form-control " value="" 
                id="celular2"  maxlength="15" require>
            </div>
            <div class="col-md-3">
                <!-- Email da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.email');?>*</label>
                <input type="text" name="email" size="23" class="form-control validate"
                id="email" onkeyup="verifica_email(this.value, this.id);">
            </div>

            <!-- Localização da Escola -->
            <div class="col-md-3">
                <!-- CEP da Escola -->
                <label for="exampleFormControlInput1">CEP*</label>
                <input name="cep" type="text" id="cep" value="" size="23" maxlength="9"
                onkeyup="pesquisacep(this.value, this.id);" class="form-control validate" require/>
            </div>
            <div class="col-md-3">
                <!-- Rua da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.street');?>*</label>
                <input value="" name="rua" type="text" size="23" class="form-control validate"
                id="rua" onkeyup="verifica_vazio(this.value, this.id); " require/>
                <div class="invalid-feedback">
                    Por favor, digite o nome da rua
                </div>
            </div>
            <div class="col-md-3">
                <!-- Bairro da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.neighbourhood');?>*</label>
                <input value="" name="bairro" type="text" id="bairro" size="23" class="form-control validate"
                onkeyup="verifica_vazio(this.value, this.id); " require/>
                <div class="invalid-feedback">
                    Por favor, digite o nome do bairro
                </div>
            </div>
            <div class="col-md-3">
                <!-- Numero da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.number');?></label>
                <input value="" type="text" name="numero" size="23" class="form-control"
                id="numero"/>
                <div class="invalid-feedback">
                    Por favor, digite o numero da escola
                </div>
            </div>
            <div class="col-md-3">
                <!-- Complemento da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.complement');?></label>
                <input value="" type="text" name="complemento" size="23" class="form-control"
                id="complemento" require>
                <div class="invalid-feedback">
                    Por favor, digite o complemento
                </div>
            </div>
            <div class="col-md-3">
                <!-- Cidade da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.city');?>*</label>
                <input value="" name="cidade"  type="text" id="cidade" size="23" class="form-control validate" 
                onkeyup="verifica_vazio(this.value, this.id); " require/>
                <div class="invalid-feedback">
                    Por favor, digite o nome da cidade
                </div>
            </div>
            <div class="col-md-3">
                <!-- Estado da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.state');?>*</label>
                <input value="" name="estado" type="text" id="uf" size="23" class="form-control validate" 
                onkeyup="verifica_vazio(this.value, this.id); " require/>
                <div class="invalid-feedback">
                    Por favor, digite o nome do estado
                </div>
            </div>
            <div class="col-md-3">
                <!-- País da Escola -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.country');?>*</label>
                <input value="" type="text" name="pais" size="23" class="form-control validate"
                id="pais" onkeyup="verifica_vazio(this.value, this.id); " require>
                <div class="invalid-feedback">
                    Por favor, digite o nome do pais
                </div>
            </div>
            <div class="col-md-3">
                <!-- Submit -->
                <button onClick="verifica_campo('validate');" type="submit" class="btn btn-outline-danger " id="submit" disabled><?php echo Lang::get('conteudo.add');?></button>
            </div>
        </div>
    </form>

    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            <input
                type="text"
                class="form-control" 
                value=""
                placeholder="Pesquisa"
                onKeyUp="changeListGroup('.filtro', this.value);" id='search'
            >
            </input>  
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-success" onClick="changeSearch('search', '');" >Todos</button>
        </div>
    </div>
    <br>
    <div class="list-group">
        <div class="row">
            @foreach(buscar_escola() as $array)
                <div
                    <?php
                        if($cont >= 25){
                            echo " style='display: none' ";
                        }
                    ?> 
                    class="isvalid col-md-4 {{ $array->tipo }} {{ str_replace(' ', '_', $array->cidade) }} {{ str_replace(' ', '_', $array->nome) }} filtro"
                >
                    <span href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $array->nome }}</h5>
                            <small>
                                <a href="{{ route('escola.edit', $array->escola_id)}}">
                                    <i class="fa fa-pencil icon text-success" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('escola.show', $array->escola_id)}}">
                                    <i class="fa fa-eye icon text-success" aria-hidden="true"></i>
                                </a>
                            </small>
                        </div>
                        <small>Tipo: {{ $array->tipo }}</small>
                        <br>
                        <small>{{ $array->cidade }}</small>, 
                        <small>{{ $array->rua }}</small>
                        <small>{{ $array->numero }}</small>
                    </span>
                </div>
                <?php
                    $cont++;
                ?>  
            @endforeach
        </div>
    </div>
    <nav aria-label="..." id='pagination'>
    </nav>
    <br>
    <br>
@endsection

<script src="{{ getenv('APP_URL') }}/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        //paginacao( 20, 1 );
        paginacao( {{ $count }}, 24 );
    });
</script>