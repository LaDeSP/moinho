<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
<<<<<<< HEAD
    <!--<title>{{ config('app.name', 'Moinho Cultural') }}</title>-->
    <title>Moinho Cultural</title>
=======
    <title>{{ config('app.name', 'Laravel') }}</title>
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab

    <!-- Styles -->
    <style>
    .c{
    	float: right;
    }
    .g {//ul
        list-style-type: none;
        margin: 0px;
        padding: 5px;
        overflow: hidden;
<<<<<<< HEAD
        background-color: #ffffff;
=======
        background-color: #98cee0;
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
        font-size: 15px;

    }
    li a {
        display: block;
        color: black;
        text-align: center;
        padding: 14px 30px;
        text-decoration: none;
    }
    .k {
        float: left;
    }
    li a:hover {
<<<<<<< HEAD
        color:  #FF4500; 
=======
        background-color: #ddeff5;
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
    }
    .a{
      margin-top: 50px;
      margin-right: 80px;
      float: center;
    }
      .b{
        margin-top: 100px;
      }
      .f{//div
         margin-top: 0px;
         color: black;
         font-size:50px;
      	 background-color: white;
<<<<<<< HEAD
         
      }
      #SI {
    background-color:rgba(0, 0, 0, 0);
    color:white;
    border: none;
    outline:none;
    height:30px;
    transition:height 1s;
    -webkit-transition:height 1s;
}
#SI:focus {
    height:50px;
    font-size:16px;
}

=======
      }
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<<<<<<< HEAD
  <br><br><br><br><!--<br><br><br><br>-->
=======
  <br><br><br><br><br><br><br><br>
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="f">
            <left>  <a href="/home"> <img src="{{url('logo_moinho.png')}}" alt="logo" width="150" height="100"></a> </left>
<<<<<<< HEAD
            <!--<img class="c" src="{{url('selosim.jpg')}}" alt="logo" width="100" height="100">-->
            <label><center> Moinho Cultural</center></label>
          </div>
          <div>
            <ul class="g">
            <li class="k"><a href="{{ route('escola.create')}}">Escola</a></li>
            <li class="k"><a href="{{ route('dados_inscricao.create')}}">Inscrição</a></li>
            <li class="k"><a href="{{ route('matricula.create')}}">Matricula</a></li>
            <li class="k"><a href="{{ route('turma.create')}}">Turma</a></li>
            <!--<li class="k"><a href="{{ route('NomeTurma.create')}}">Nova Turma</a></li>-->
            <li class="k"><a href="{{ route('listar_matriculas.index')}}">Matriculas Regulares</a></li>
            <li class="k"><a href="{{ route('lista_matriculas_irregulares.index')}}">Matriculas Irregulares</a></li>
            <li class="k"><a href="{{ route('colaborador.create')}}">Colaborador</a></li>
            <li class="k"><a href="{{ route('disciplina.create')}}">Disciplina</a></li>
=======
            <img class="c" src="{{url('selosim.jpg')}}" alt="logo" width="100" height="100">
            Aaaaaaaaaaaaaaaa
          </div>
          <ul class="g">
            <li class="k"><a href="{{ route('escola.create')}}">Escolas</a></li>
            <li class="k"><a href="{{ route('dados_inscricao.create')}}">Inscrição</a></li>
            <li class="k"><a href="{{ route('matricula.create')}}">Matricula</a></li>
            <li class="k"><a href="{{ route('turma.create')}}">Turma</a></li>
            <li class="k"><a href="{{ route('NomeTurma.create')}}">Nova Turma</a></li>
            <li class="k"><a href="{{ route('listar_matriculas.index')}}">Matriculas Regulares</a></li>
            <li class="k"><a href="{{ route('lista_matriculas_irregulares.index')}}">Matriculas Irregulares</a></li>
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
            @if(!Auth::guest())
              <li class="k"><a href="/auth/logout">Logout</a></li>
            @endif
          </ul>

<<<<<<< HEAD
          </div>
          </nav>
          <br> <br> <br>
          


       <!--  </nav>
       background-color: #98cee0;
      background-color: #ddeff5;

      -->
=======


        </nav>
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
