@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <h1 class="text-success">
                Perfil                
                </h1>
                @if( isset($message) )
                    <h3 class="alert alert-success">
                            {{ $message }}
                    </h3>
                @endif
            </div>
           
    <div class="row">
         <div class="col-md-5">
                
                <form onkeyup="verifica_submit('validate');" class="form-horizontal col-md-12" method="POST" action="{{ route('user.store') }}">
                        {{ csrf_field() }}
                        <div class="col-md-10">
                            <h3 class="text-success">
                                Dados de Acesso
                            </h3>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <div>
                                <label for="email" >E-Mail</label>
                                <input id="emailAcesso" type="email" class="form-control" name="email" 
                                value="{{ Auth::user()->email }}" required autofocus readonly>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" >Senha</label>

                            <div  onkeyup="confirmar_password(this.value, 'password', 'password-confirm');">
                                <input id="passwordAcesso" type="password" class="form-control validate" name="password" 
                                onkeyup="verifica_password(this.value, this.id);" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" >Confirme a senha</label>
                            <div >
                                <input id="password-confirmAcesso" type="password" class="form-control validate" name="password_confirmation" 
                                onkeyup="confirmar_password(this.value, 'password', this.id);" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                                <div class="invalid-feedback">
                                    Por favor, digite a senha correspondente
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-outline-danger" id="submitAcesso" disabled> Trocar a senha </button>
                        </div>
                    </form>


        </div>
        @if( isset($colaborador) )
         <div class="col-md-6">
                <h3 class="text-success">
                        Informações Pessoais
                </h3>
                <form 
                    onkeyup="verifica_submit('validate');" 
                    method="POST" 
                    action="{{ route('colaborador.update', $colaborador->id) }}" 
                    enctype="multipart/form-data"
                > {{ csrf_field() }} <input name="_method" type="hidden" value="PUT">
        <div id="carouselExampleControls" class="carousel slide" data-wrap="false" data-interval="100000">
                <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <div class="row">
                    <!-- Dados do Colaborador -->
                    <div class="col-md-10">
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
                        <div class="col-md-10">
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
                        <div class="col-md-10">
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
                        <div class="col-md-10">
                            <!-- Telefone do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.phone'); ?>*</label>
                            <input 
                                type="text" 
                                name="telefone" 
                                value="{{ $contato->numero_fixo }}"
                                size="23" 
                                class="form-control is-valid validate" 
                                onkeyup="verifica_telefone(this.value, this.id);" 
                                id="telefone" 
                                maxlength="15"
                            />
                        </div>
                        <div class="col-md-10">
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
                        <div class="col-md-10">
                            <!-- Celular 2 do Colaborador -->
                            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.cell'); ?> 2</label>
                            <input 
                                type="text" 
                                name="celular2" 
                                value="{{ $contato->celular2 }}"
                                size="23" 
                                class="form-control" 
                                id="celular2" 
                                maxlength="15"
                            />
                            </div>
                        </div>
                    </div>
                     <div class="carousel-item">
                        <div class="row">
                                <div class="col-md-12">
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
                                    <div class="col-md-12">
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
                                    <div class="col-md-12">
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
                                    <div class="col-md-4">
                                        <!-- Número do Colaborador -->
                                        <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.number');?></label>
                                        <input 
                                            type="text" 
                                            name="numero" 
                                            value="{{ $endereco->numero }}"
                                            size="20" 
                                            class="form-control"
                                            id="numero" 
                                        />
                                        <div class="invalid-feedback">
                                            Por favor, digite o numero da residência
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <!-- Complemento -->
                                        <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.complement');?></label>
                                        <input 
                                            type="text" 
                                            name="complemento" 
                                            value="{{ $endereco->complemento }}"
                                            size="20" 
                                            class="form-control"
                                            id="complemento" 
                                        />
                                        <div class="invalid-feedback">
                                            Por favor, digite o complemento
                                        </div>
                                    </div>
                                    <div class="col-md-12">
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
                                    <div class="col-md-12">
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
                                    <div class="col-md-12">
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
                                    <input type="text" name="email" value="{{ $user->email }}" size="23" id="email" style="display: none;"/>
                                    <input type="number" min="1950" max="2018" value="{{ $colaborador->ano_ingreco }}" style="display: none;" name="ano_ingresso" size="20" id="ano_ingresso" />
                                    <input type="text" name="area_atuacao" value="{{ $colaborador->area_atuacao }}" style="display: none;" size="20" id="area_atuacao"/>
                                    <select name="tipo_colaborador" class="form-control" style="display: none;">
                                            <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                    </select>
                                    
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-outline-success" id="submit"> Alterar </button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" id="previous" role="button" data-slide="prev" style="right: 50%">
                <i class="fa fa-arrow-left fa-lg text-success icon" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" id="next" role="button" data-slide="next">
                <i class="fa fa-arrow-right fa-lg text-success icon" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
        @endif
         </div>
                
        
@endsection

<script src="/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        total_slide = 2
    });
</script>