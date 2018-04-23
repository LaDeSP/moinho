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
    <h1 class="text-info"> Alterar Inscrição </h1>
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
                            <input 
                                type="text" 
                                name="nome" 
                                value="{{ $dados_pessoais->nome }}" 
                                id="nome" 
                                size="23" 
                                class="form-control validate is-valid"
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o nome do inscrito
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Data Participante -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.birthdate');?>*</label>
                            <input 
                                type="date" 
                                name="data_nascimento" 
                                value="{{ $dados_pessoais->data_nascimento }}"
                                size="20" 
                                class="form-control validate is-valid"
                                id="data_nascimento" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite a data de nascimento do inscrito
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- CPF Participante -->
                            <label for="exampleFormControlInput1">CPF*</label>
                            <input 
                                name="cpf" 
                                type="text" 
                                id="cpf" 
                                value="{{ $dados_pessoais->cpf }}" 
                                size="23" 
                                maxlength="14" 
                                class="form-control validate is-valid" 
                                onkeyup="verifica_cpf(this.value, this.id);" 
                            />
                        </div>

                        <!-- Pular Linha -->
                        <br>

                        <!-- Dados Responsável -->
                        <div class="col-md-4">
                            <!-- Nome Responsável -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.responsibleName');?> 1*</label>
                            <input 
                                name="nomePai" 
                                type="text" 
                                id="nomePai" 
                                value="{{ $responsavel1->nome }}" 
                                size="23"  
                                class="form-control validate is-valid" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o nome do responsavel 1
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Data Responsável -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.responsibleBirth');?> 1*</label>
                            <input 
                                type="date" 
                                name="data_nascimentoPai" 
                                value="{{ $responsavel1->data_nascimento }}"
                                class="form-control validate is-valid"
                                id="data_nascimentoPai" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite a data de nascimento do responsavel 1
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- CPF Responsável -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cpfResponsible');?> 1*</label>
                            <input 
                                name="cpfPai" 
                                value="{{ $responsavel1->cpf }}"
                                type="text" 
                                size="23" 
                                maxlength="11" 
                                class="form-control validate is-valid" 
                                id="cpfPai" 
                                onkeyup="verifica_cpf(this.value, this.id);" 
                            />
                        </div>


                        <!-- Dados Responsável 2 -->
                        <div class="col-md-4">
                            <!-- Nome Responsável 2 -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.responsibleName');?> 2*</label>
                            <input 
                                name="nomeMae" 
                                type="text" 
                                id="nomeMae" 
                                value="{{ $responsavel2->nome }}" 
                                size="23" 
                                class="form-control validate is-valid" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o nome do responsavel 2
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Data Responsável 2 -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.responsibleBirth');?> 2*</label>
                            <input 
                                type="date" 
                                name="data_nascimentoMae"
                                value="{{ $responsavel2->data_nascimento }}"
                                class="form-control validate is-valid"
                                id="data_nascimentoMae" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite a data de nascimento do responsavel 2
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- CPF Responsável 2 -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cpfResponsible');?>*</label>
                            <input 
                                name="cpfMae" 
                                value="{{ $responsavel2->cpf }}"
                                type="text" 
                                size="23" 
                                maxlength="11" 
                                class="form-control validate is-valid" 
                                id="cpfMae" 
                                onkeyup="verifica_cpf(this.value, this.id);"
                            />
                        </div>

                        

                        <!-- Data da Inscrição e Avaliação -->
                        <div class="col-md-6">
                            <!-- Data de Inscrição -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.inscriptionDate');?>*</label>
                            <input 
                                type="date" 
                                name="data_inscricao" 
                                value="{{ $inscricao->data_inscricao }}"
                                size="23" 
                                class="form-control validate is-valid"
                                id="data_inscricao" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite a data de inscricao
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Data de Avaliação -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.exameDate');?>*</label>
                            <input 
                                type="date" 
                                name="data_avaliacao" 
                                value="{{ $inscricao->data_avaliacao }}"
                                size="23" 
                                class="form-control validate is-valid"
                                id="data_avaliacao" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite a data de avaliação
                            </div>
                        </div>

                        <!-- Profissão -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.profession');?>*</label>
                            <input 
                                type="text" 
                                name="profissao" 
                                value="{{ $dados_inscricao->profissao }}"
                                size="23" 
                                class="form-control validate is-valid"
                                id="profissao" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite a profissão do responsável
                            </div>
                        </div>
                        <!-- Religião -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.religion');?>*</label>
                            <input 
                                name="religiao" 
                                value="{{ $dados_inscricao->religiao }}"
                                type="text" 
                                size="23" 
                                class="form-control validate is-valid"
                                id="religiao" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite a religião do inscrito
                            </div>
                        </div>
                        <!-- Raça -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.race');?>*</label>
                            <input 
                                name="raca" 
                                type="text" 
                                value="{{ $dados_inscricao->raca }}" 
                                size="23" 
                                class="form-control validate is-valid"
                                id="raca" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite a raça do inscrito
                            </div>
                        </div>
                        <!-- Renda -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.income');?>*</label>
                            <input 
                                type="text" 
                                name="renda" 
                                value="{{ $dados_inscricao->renda }}"
                                size="23" 
                                class="form-control validate is-valid"
                                id="renda" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite a renda da família
                            </div>
                        </div>
                        <!-- Quantidade Residência -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.manyResidence');?>*</label>
                            <input 
                                name="qtd_residencia" 
                                value="{{ $dados_inscricao->qtd_residencia }}"
                                type="text" 
                                size="23" 
                                class="form-control validate is-valid"
                                id="qtd_residencia" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite a quantidade de residências da família
                            </div>
                        </div>
                        <!-- Benefício Social -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.socialBenefit');?>*</label>
                            <input 
                                name="beneficio_social" 
                                value="{{ $dados_inscricao->beneficio_social }}"
                                type="text" 
                                size="23" 
                                class="form-control validate is-valid"
                                id="beneficio_social" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o benefício social
                            </div>
                        </div>
                        <!-- Sériel -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.serie');?>*</label>
                            <input 
                                name="serie" 
                                value="{{ $dados_inscricao->serie }}"
                                type="text" 
                                size="23" 
                                class="form-control validate is-valid" 
                                id="serie" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite a serie do inscrito
                            </div>
                        </div>
                        <!-- Escola -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.school');?>*</label>
                            <select name="escola" class="form-control">
                                @foreach($escola as $school) 
                                    <option 
                                        value="{{ $school->id }}"
                                        <?php
                                            if($school->id === $dados_inscricao->escola_id)
                                                echo "selected";
                                        ?>
                                    > {{ $school->nome_fantasia }} </option>
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
                            <input 
                                type="text" 
                                name="turma" 
                                value="{{ $dados_inscricao->turma }}"
                                size="23" 
                                class="form-control validate is-valid"
                                id="turma" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o nome da turma
                            </div>
                        </div>
                        <!-- Turno -->
                        <div class="col-md-4">
                        <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.shift');?>*</label>
                            <select name="turno" class="form-control">
                                <option 
                                    value="morning"
                                    <?php
                                        if(strcmp('morning', $dados_inscricao->turno) === 0)
                                            echo "selected";
                                    ?>
                                > <?php echo Lang::get('validation.attributes.morning');?>  </option>
                                <option 
                                    value="afternoon"
                                    <?php
                                        if(strcmp('afternoon', $dados_inscricao->turno) === 0)
                                            echo "selected";
                                    ?>
                                > <?php echo Lang::get('validation.attributes.afternoon');?> </option>
                           </select>
                        </div>
                        <!-- Transporte -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.transportation');?>*</label>
                            <input 
                                name="transporte" 
                                type="text" 
                                value="{{ $dados_inscricao->transporte }}" 
                                size="23" 
                                maxlength="9" 
                                class="form-control validate is-valid" 
                                id="transporte" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o transporte usado
                            </div>
                        </div>
                        <!-- Observações -->
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.observation');?>*</label>
                            <textarea 
                                name="observacoes" 
                                rows="5"
                            >{{ $dados_inscricao->observacoes }}</textarea>
                        </div>
                        
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <!-- CEP -->
                        <div class="col-md-2">
                            <label for="exampleFormControlInput1">CEP*</label>
                            <input 
                                placeholder="00000-000" 
                                name="cep"
                                type="text" 
                                id="cep" 
                                value="{{ $endereco->cep }}" 
                                size="23" 
                                maxlength="9" 
                                onkeyup="pesquisacep(this.value, this.id);" 
                                class="form-control validate is-valid"
                            />
                        </div>
                        <!-- Rua -->
                        <div class="col-md-5">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.street');?>*</label>
                            <input 
                                name="rua" 
                                value="{{ $endereco->rua }}"
                                type="text" 
                                id="rua" 
                                size="23" 
                                class="form-control validate is-valid" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o nome da rua
                            </div>
                        </div>
                        <!-- Bairro -->
                        <div class="col-md-5">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.neighbourhood');?>*</label>
                            <input 
                                name="bairro" 
                                value="{{ $endereco->bairro }}"
                                type="text" 
                                id="bairro" 
                                size="23" 
                                class="form-control validate is-valid"
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o nome do bairro
                            </div>
                        </div>
                        <!-- Número -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.number');?>*</label>
                            <input 
                                type="text" 
                                name="numero" 
                                value="{{ $endereco->numero }}"
                                size="23" 
                                class="form-control validate is-valid"
                                id="numero" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o numero
                            </div>
                        </div>
                        <!-- Complemento -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.complement');?>*</label>
                            <input 
                                type="text" 
                                name="complemento" 
                                value="{{ $endereco->complemento }}"
                                size="23" 
                                class="form-control validate is-valid"
                                id="compĺemento" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o complemento
                            </div>
                        </div>
                        <!-- Cidade -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.city');?>*</label>
                            <input 
                                name="cidade" 
                                value="{{ $endereco->cidade }}"
                                type="text" 
                                id="cidade" 
                                size="23" 
                                class="form-control validate is-valid"
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite a cidade
                            </div>
                        </div>
                        <!-- Estado -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.state');?>*</label>
                            <input 
                                name="uf" 
                                value="{{ $endereco->estado }}"
                                type="text" 
                                id="uf" 
                                size="23" 
                                class="form-control validate is-valid"
                                id="uf" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o estado
                            </div>
                        </div>
                        <!-- País -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.country');?>*</label>
                            <input 
                                type="text" 
                                name="pais" 
                                value="{{ $endereco->pais }}"
                                size="23" 
                                class="form-control validate is-valid"
                                id="pais" 
                                onkeyup="verifica_vazio(this.value, this.id);"
                            />
                            <div class="invalid-feedback">
                                Por favor, digite o país
                            </div>
                        </div>
                        <!-- Telefone -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.phone');?>*</label>
                            <input 
                                type="text" 
                                name="telefone" 
                                size="23" 
                                class="form-control validate is-valid" 
                                value="{{ $contato->numero_fixo }}" 
                                id="telefone" 
                                onkeyup="verifica_telefone(this.value, this.id);" 
                                maxlength="14"
                            />
                        </div>
                        <!-- Celular 1 -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell');?> 1*</label>
                            <input 
                                type="text" 
                                name="celular1" 
                                size="23" 
                                class="form-control validate is-valid" 
                                value="{{ $contato->celular1 }}" 
                                id="celular1" 
                                onkeyup="verifica_telefone(this.value, this.id);" 
                                maxlength="15"
                            />
                        </div>
                        <!-- Celular 2 -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell');?> 2*</label>
                            <input 
                                type="text" 
                                name="celular2" 
                                size="23" 
                                class="form-control validate is-valid" 
                                value="{{ $contato->celular2 }}" 
                                id="celular2" 
                                onblur="verifica_telefone(this.value, this.id);" 
                                maxlength="15"
                            />
                        </div>
                        <!-- Email -->
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1">Email*</label>
                            <input 
                                type="text" 
                                name="email" 
                                value="{{ $contato->email }}"
                                size="23" 
                                class="form-control validate is-valid"
                                id="email" 
                                onkeyup="verifica_email(this.value, this.id);"
                            />
                        </div>

                        <!-- Submit -->
                        <div class="col-md-4">
                            <button onClick="verifica_campo('validate');" type="submit" class="btn btn-outline-success" id="submit"> Alterar </button>
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
        <br>
        <br>
    </form>
    <h1 class="text-info"> 
        Documentos 
    </h1>
    <div class="text-right">
      <a href="{{ route('documento.edit', $inscricao->id)}}">
        <i class="fa fa-pencil icon text-info" aria-hidden="true"></i>
      </a>
    </div>
    <br>
    <div class="row">
        @foreach($document as $documento)
            @if($documento->inscricao_id === $inscricao->id)
                <div class="col-md-12">
                    <iframe src="/document/{{ $documento->url }}" height="500" width="100%"></iframe>
                </div>
            @endif
        @endforeach
    </div>
    <br>
    <br>
@endsection

