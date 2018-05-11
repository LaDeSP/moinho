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
    <h1 class="text-info"><?php echo Lang::get('conteudo.addInscription');?></h1>
    <div style="margin-bottom: 20px">
        <a href="{{ url('/relatorio_inscricao')}}"  class="btn btn-outline-info"><?php echo Lang::get('conteudo.inscriptionReport');?></a>
    </div>
    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('dados_inscricao.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div id="carouselExampleControls" class="carousel slide" data-wrap="false" data-interval="100000">
            <div class="carousel-inner" >
                <div class="carousel-item active">
                    <div class="row">
                        <!-- Dados Participante -->
                        <div class="col-md-4">
                            <!-- Nome Participante -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name');?>*</label>
                            <input type="text" name="nome" value="" id="nome" size="23" class="form-control validate"
                            onkeyup="verifica_vazio(this.value, this.id);">
                            <div class="invalid-feedback">
                                Por favor, digite o nome do inscrito
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Data Participante -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.birthdate');?>*</label>
                            <input type="date" name="data_nascimento" size="20" class="form-control validate"
                            id="data_nascimento" onkeyup="verifica_vazio(this.value, this.id);">
                            <div class="invalid-feedback">
                                Por favor, digite a data de nascimento do inscrito
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- CPF Participante -->
                            <label for="exampleFormControlInput1">CPF*</label>
                            <input name="cpf" type="text" id="cpf" value="" size="23" maxlength="14" class="form-control validate" 
                            onkeyup="verifica_cpf(this.value, this.id);" />
                        </div>

                        <!-- Pular Linha -->
                        <br>

                        <!-- Dados Responsável -->
                        <div class="col-md-4">
                            <!-- Nome Responsável -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.responsibleName');?> 1*</label>
                            <input name="nomePai" type="text" id="nomePai" value="" size="23"  class="form-control validate" 
                            onkeyup="verifica_vazio(this.value, this.id);">
                            <div class="invalid-feedback">
                                Por favor, digite o nome do responsavel 1
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Data Responsável -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.responsibleBirth');?> 1*</label>
                            <input type="date" name="data_nascimentoPai" class="form-control validate"
                            id="data_nascimentoPai" onkeyup="verifica_vazio(this.value, this.id);">
                            <div class="invalid-feedback">
                                Por favor, digite a data de nascimento do responsavel 1
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- CPF Responsável -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cpfResponsible');?> 1*</label>
                            <input name="cpfPai" type="text" size="23" maxlength="11" class="form-control validate" 
                            id="cpfPai" onkeyup="verifica_cpf(this.value, this.id);" />
                        </div>


                        <!-- Dados Responsável 2 -->
                        <div class="col-md-4">
                            <!-- Nome Responsável 2 -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.responsibleName');?> 2*</label>
                            <input name="nomeMae" type="text" id="nomeMae" value="" size="23" class="form-control validate" 
                            onkeyup="verifica_vazio(this.value, this.id);">
                            <div class="invalid-feedback">
                                Por favor, digite o nome do responsavel 2
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Data Responsável 2 -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.responsibleBirth');?> 2*</label>
                            <input type="date" name="data_nascimentoMae" class="form-control validate"
                            id="data_nascimentoMae" onkeyup="verifica_vazio(this.value, this.id);">
                            <div class="invalid-feedback">
                                Por favor, digite a data de nascimento do responsavel 2
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- CPF Responsável 2 -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cpfResponsible');?>*</label>
                            <input name="cpfMae" type="text" size="23" maxlength="11" class="form-control validate" 
                            id="cpfMae" onkeyup="verifica_cpf(this.value, this.id);" />
                        </div>

                        

                        <!-- Data da Inscrição e Avaliação -->
                        <div class="col-md-6">
                            <!-- Data de Inscrição -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.inscriptionDate');?>*</label>
                            <input type="date" name="data_inscricao" size="23" class="form-control validate"
                            id="data_inscricao" onkeyup="verifica_vazio(this.value, this.id);">
                            <div class="invalid-feedback">
                                Por favor, digite a data de inscricao
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Data de Avaliação -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.exameDate');?>*</label>
                            <input type="date" name="data_avaliacao" size="23" class="form-control validate"
                            id="data_avaliacao" onkeyup="verifica_vazio(this.value, this.id);">
                            <div class="invalid-feedback">
                                Por favor, digite a data de avaliação
                            </div>
                        </div>

                        <!-- Profissão -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.profession');?>*</label>
                            <input type="text" name="profissao" size="23" class="form-control validate"
                            id="profissao" onkeyup="verifica_vazio(this.value, this.id);">
                            <div class="invalid-feedback">
                                Por favor, digite a profissão do responsável
                            </div>
                        </div>
                        <!-- Religião -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.religion');?>*</label>
                            <input name="religiao" type="text" size="23" class="form-control validate"
                            id="religiao" onkeyup="verifica_vazio(this.value, this.id);"/>
                            <div class="invalid-feedback">
                                Por favor, digite a religião do inscrito
                            </div>
                        </div>
                        <!-- Raça -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.race');?>*</label>
                            <input name="raca" type="text" value="" size="23" class="form-control validate"
                            id="raca" onkeyup="verifica_vazio(this.value, this.id);"/>
                            <div class="invalid-feedback">
                                Por favor, digite a raça do inscrito
                            </div>
                        </div>
                        <!-- Renda -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.income');?>*</label>
                            <input type="text" name="renda" size="23" class="form-control validate"
                            id="renda" onkeyup="verifica_vazio(this.value, this.id);"/>
                            <div class="invalid-feedback">
                                Por favor, digite a renda da família
                            </div>
                        </div>
                        <!-- Quantidade Residência -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.manyResidence');?>*</label>
                            <input name="qtd_residencia" type="text" size="23" class="form-control validate"
                            id="qtd_residencia" onkeyup="verifica_vazio(this.value, this.id);"/>
                            <div class="invalid-feedback">
                                Por favor, digite a quantidade de residências da família
                            </div>
                        </div>
                        <!-- Benefício Social -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.socialBenefit');?>*</label>
                            <input name="beneficio_social" type="text" size="23" class="form-control validate"
                            id="beneficio_social" onkeyup="verifica_vazio(this.value, this.id);"/>
                            <div class="invalid-feedback">
                                Por favor, digite o benefício social
                            </div>
                        </div>
                        <!-- Sériel -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.serie');?>*</label>
                            <input name="serie" type="text" size="23" class="form-control validate" 
                            id="serie" onkeyup="verifica_vazio(this.value, this.id);"/>
                            <div class="invalid-feedback">
                                Por favor, digite a serie do inscrito
                            </div>
                        </div>
                        <!-- Escola -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.school');?>*</label>
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
                        <!-- Turma -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.grade');?>*</label>
                            <input type="text" name="turma" size="23" class="form-control validate"
                            id="turma" onkeyup="verifica_vazio(this.value, this.id);">
                            <div class="invalid-feedback">
                                Por favor, digite o nome da turma
                            </div>
                        </div>
                        <!-- Turno -->
                        <div class="col-md-4">
                        <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.shift');?>*</label>
                            <select name="turno" class="form-control">
                                <option value="morning"> <?php echo Lang::get('validation.attributes.morning');?>  </option>
                                <option value="afternoon"> <?php echo Lang::get('validation.attributes.afternoon');?> </option>
                           </select>
                        </div>
                        <!-- Transporte -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.transportation');?>*</label>
                            <input name="transporte" type="text" value="" size="23" maxlength="9" class="form-control validate" 
                            id="transporte" onkeyup="verifica_vazio(this.value, this.id);"/>
                            <div class="invalid-feedback">
                                Por favor, digite o transporte usado
                            </div>
                        </div>
                        <!-- Observações -->
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.observation');?>*</label>
                            <textarea class="form-control" name="observacoes" rows="5"></textarea>
                        </div>
                        
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <!-- CEP -->
                        <div class="col-md-2">
                            <label for="exampleFormControlInput1">CEP*</label>
                            <input placeholder="00000-000" name="cep" type="text" id="cep" value="" size="23" maxlength="9" 
                            onkeyup="pesquisacep(this.value, this.id);" class="form-control validate"/>
                        </div>
                        <!-- Rua -->
                        <div class="col-md-5">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.street');?>*</label>
                            <input name="rua" type="text" id="rua" size="23" class="form-control validate" 
                            onkeyup="verifica_vazio(this.value, this.id);"/>
                            <div class="invalid-feedback">
                                Por favor, digite o nome da rua
                            </div>
                        </div>
                        <!-- Bairro -->
                        <div class="col-md-5">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.neighbourhood');?>*</label>
                            <input name="bairro" type="text" id="bairro" size="23" class="form-control validate"
                            onkeyup="verifica_vazio(this.value, this.id);"/>
                            <div class="invalid-feedback">
                                Por favor, digite o nome do bairro
                            </div>
                        </div>
                        <!-- Número -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.number');?>*</label>
                            <input type="text" name="numero" size="23" class="form-control validate"
                            id="numero" onkeyup="verifica_vazio(this.value, this.id);">
                            <div class="invalid-feedback">
                                Por favor, digite o numero
                            </div>
                        </div>
                        <!-- Complemento -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.complement');?>*</label>
                            <input type="text" name="complemento" size="23" class="form-control validate"
                            id="compĺemento" onkeyup="verifica_vazio(this.value, this.id);">
                            <div class="invalid-feedback">
                                Por favor, digite o complemento
                            </div>
                        </div>
                        <!-- Cidade -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.city');?>*</label>
                            <input name="cidade" type="text" id="cidade" size="23" class="form-control validate"
                            onkeyup="verifica_vazio(this.value, this.id);"/>
                            <div class="invalid-feedback">
                                Por favor, digite a cidade
                            </div>
                        </div>
                        <!-- Estado -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.state');?>*</label>
                            <input name="uf" type="text" id="uf" size="23" class="form-control validate"
                            id="uf" onkeyup="verifica_vazio(this.value, this.id);"/>
                            <div class="invalid-feedback">
                                Por favor, digite o estado
                            </div>
                        </div>
                        <!-- País -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.country');?>*</label>
                            <input type="text" name="pais" size="23" class="form-control validate"
                            id="pais" onkeyup="verifica_vazio(this.value, this.id);"/>
                            <div class="invalid-feedback">
                                Por favor, digite o país
                            </div>
                        </div>
                        <!-- Telefone -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.phone');?>*</label>
                            <input type="text" name="telefone" size="23" class="form-control validate" value="" 
                            id="telefone" onkeyup="verifica_telefone(this.value, this.id); " maxlength="14">
                        </div>
                        <!-- Celular 1 -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell');?> 1*</label>
                            <input type="text" name="celular1" size="23" class="form-control validate" value="" 
                            id="celular1" onkeyup="verifica_telefone(this.value, this.id); " maxlength="16">
                        </div>
                        <!-- Celular 2 -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell');?> 2*</label>
                            <input type="text" name="celular2" size="23" class="form-control validate" value="" 
                            id="celular2" onblur="verifica_telefone(this.value, this.id); " maxlength="16">
                        </div>
                        <!-- Email -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1">Email*</label>
                            <input type="text" name="email" size="23" class="form-control validate"
                            id="email" onkeyup="verifica_email(this.value, this.id);">
                        </div>

                        <!-- Submit -->
                        <div class="col-md-4">
                            <button onClick="verifica_campo('validate');" type="submit" class="btn btn-outline-danger" id="submit" disabled><?php echo Lang::get('conteudo.add');?></button>
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
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            <input
                type="text"
                class="form-control" 
                value=""
                placeholder="Pesquisa"
                onKeyUp="changeListGroup('.filtro', this.value);"
            >
            </input>  
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-info" onClick="changeListGroup('.filtro', 'all');" >Todos</button>
        </div>
    </div>
    <div class="list-group">
        <div class="row">
            @foreach(busca_inscricao() as $array)
                <div class="col-md-4 {{ $array->serie }} {{ $array->turma }} {{ $array->raca }} {{ str_replace(' ', '_', $array->nome) }} filtro">
                    <span href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $array->nome }}</h5>
                            <small>
                                <a href="{{ route('dados_inscricao.edit', $array->id)}}" id="{{ $array->id }}">
                                    <i class="fa fa-pencil icon text-info" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('dados_inscricao.show', $array->id)}}" id="{{ $array->id }}">
                                    <i class="fa fa-eye icon text-info" aria-hidden="true"></i>
                                </a>
                            </small>
                        </div>
                        <small>{{ $array->raca }}</small>
                        <br>
                        <small>{{ $array->turma }}</small>,
                        <small>{{ ucfirst($array->turno) }}</small>,
                        <small>{{ $array->serie }}</small>
                        <br>
                        <small>{{ $array->observacoes }}</small>
                    </span>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    <br>
@endsection

