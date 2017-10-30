@extends('layouts.app');

@section('content')
  <form class="" action="{{ route('organizations.store') }}" method="post">
    {{ csrf_field() }}
    <div>
        <div class="col-md-4">
          <div class="form-group">
            <span> Nome: <input type="text" name="name"> </span>
          </div>
          <div class="form-group">
            <span> Nome fantasia: <input type="text" name="fantasy_name"> </span>
          </div>
          <div class="form-group">
            <span> Razão social: <input type="text" name="social_reason"> </span>
          </div>
          <div class="form-group">
            <span> CNPJ: <input type="text" name="cnpj"> </span>
          </div>
          <div class="form-group">
            <span> Inscrição estadual: <input type="text" name="state_inscription"> </span>
          </div>
          <div class="form-group">
          </div>
          <span> Data da ultima visita: <input type="date" name="last_visit_date"> </span>
        </div>
        <div class="form-group">
          <span> Responsavel: <input type="text" name="name"> </span>
        </div>
        <div class="form-group">
          <span> CPF: <input type="text" name="cpf"> </span>
        </div>
        <div class="form-group">
          <span> RG: <input type="text" name="rg"> </span>
        </div>


        <div class="col-md-4">
          <div class="form-group">
            <span> Rua: <input type="text" name="street"> </span>
          </div>
          <div class="form-group">
            <span> Bairro: <input type="text" name="neighborhood"> </span>
          </div>
          <div class="form-group">
            <span> Complemento: <input type="text" name="complement"> </span>
          </div>
          <div class="form-group">
            <span> CEP: <input type="text" name="zip_code"> </span>
          </div>
          <div class="form-group">
            <span> Cidade: <input type="text" name="city"> </span>
          </div>
          <div class="form-group">
            <span> Estado: <input type="text" name="state"> </span>
          </div>
          <div class="form-group">
            <span> País: <input type="text" name="country"> </span>
          </div>
        </div>
        <div class="col-md-4">

          <div class="form-group">
            <span>Telefone: <input type="text" name="phone"> </span>
          </div>
          <div class="form-group">
            <span>Celular: <input type="text" name="cel_phone"> </span>
          </div>
          <div class="form-group">
            <span>E-mail: <input type="text" name="email"> </span>
          </div>
        </div>
      </div>
  <div>
    <input type="submit">
  </div>
  <div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    aaaaaaaaaaaaaaaaaaaa
  </div>

  </form>

@endsection
