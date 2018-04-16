@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h1 class="text-success">
                    Trocar senha
                </h1>
                @if( isset($message) )
                    <h3 class="alert alert-success">
                            {{ $message }}
                    </h3>
                @endif

                <div class="panel-body row">
                    <form onkeyup="verifica_submit('validate');" class="form-horizontal col-md-12" method="POST" action="{{ route('user.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" 
                                value="{{ Auth::user()->email }}" required autofocus readonly>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control validate" name="password" 
                                onkeyup="verifica_password(this.value, this.id);" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirme a senha</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control validate" name="password_confirmation" 
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

                        <button type="submit" class="btn btn-outline-danger" id="submit" disabled> Trocar a senha </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
