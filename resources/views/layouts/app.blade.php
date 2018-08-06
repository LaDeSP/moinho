<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-1791578-38"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-1791578-38');
    </script>

    <!-- Custom styles for this template -->
    <link href="/css/resume.min.css" rel="stylesheet">
    <link href="/css/moinho.css" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!--<title>{{ config('app.name', 'Moinho Cultural') }}</title>-->
    <title>Moinho Cultural</title>

    <style>
        .scroll {
            height: 100vh;// or change to whatever you want 
            overflow: scroll;
            overflow-x: hidden;
        }
        a{
            color: #343a40;

        }
        a:hover {
            cursor: pointer;
        }
       
    </style>

</head>
<body>
    <!-- Novo Front -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-light fixed-top" id="sideNav">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars text-dark" aria-hidden="true"></i>
      </button>
      <div class="collapse navbar-collapse" data-spy="scroll" data-target="#sub-menu" id="navbarSupportedContent">
        <ul class="navbar-nav" id="sub-menu" style="text-align: center; overflow: visible;">
            <div class="scroll">
                @if(Auth::guest())
                    <li class="nav-item ">
                        <a href="#page-top" class="js-scroll-trigger">
                        <img class="logo" src="/img/moinho.png" alt="INSTITUTO MOINHO CULTURAL SUL AMERICANO">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn nav-link" data-toggle="collapse" href="#login" role="button" aria-expanded="false" aria-controls="collapseExample"> 
                            <h4 class="blue"> <i class="fa fa-sign-in" aria-hidden="true"> </i> Login</h4> 
                        </a>
                        <div class="collapse drop-login" id="login">
                            <div class="container">
                                <form class="subheading " method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <!-- Campo Email -->
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Entre com o seu email">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Campo Senha -->
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" required placeholder="Senha">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Campo Lembre-me e Submit -->
                                    <div class="form-check">
                                        <button type="submit" class="btn btn-info"><?php echo Lang::get('auth.login');?> </button>
                                         </div>
                                    
                                </form>
                                <br>
                            </div>
                        </div>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="http://www.moinhocultural.org.br/">
                        <h4 class="red">
                            <i class="fa fa-ravelry" aria-hidden="true"></i> Site
                        </h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#Evento">
                            <h4 class="yellow">
                                <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo Lang::get('conteudo.event');?> 
                            </h4>
                        </a>
                    </li>
                @endif
                @if(!Auth::guest())
                    <li class="nav-item ">
                        <a class="js-scroll-trigger" href="{{ route('home')}}">
                            <img class="logo" src="/img/moinho.png" alt="INSTITUTO MOINHO CULTURAL SUL AMERICANO">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger"href="{{ route('home')}}">
                            <h4 class="yellow">
                                <i class="fa fa-home" aria-hidden="true"></i><?php echo Lang::get('conteudo.home');?> 
                            </h4>
                        </a>
                    </li>
                    <!-- Link para estudantes/participantes-->
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('frequencia.create')}}">
                            <h4 class="green">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i> Frequência 
                            </h4>
                        </a>
                    </li>
                    @permission('ver-inscricao')
                    <!-- Link para inscrição-->
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('dados_inscricao.create')}}">
                            <h4 class="blue">
                                <i class="fa fa-sign-in" aria-hidden="true"></i> <?php echo Lang::get('conteudo.registration');?> 
                            </h4>
                        </a>
                    </li>
                    @endpermission

                    @permission('ver-matricula')
                    <!-- Link para matricula-->
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('matricula.create')}}">
                            <h4 class="green">
                                <i class="fa fa-user-plus" aria-hidden="true"></i><?php echo Lang::get('conteudo.enrolment');?> 
                            </h4>
                        </a>
                    </li>
                    @endpermission


                    @permission('ver-colaborador')
                    <!-- Link para colaborador -->
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('colaborador.create')}}">
                            <h4 class="red">
                                <i class="fa fa-handshake-o" aria-hidden="true"></i> <?php echo Lang::get('conteudo.contributors');?> 
                            </h4>
                        </a>
                    </li>
                    @endpermission

                    @permission('ver-turma')
                    <!-- Link para turma -->
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('turma.create')}}">
                            <h4 class="yellow">
                                <i class="fa fa-list" aria-hidden="true"></i>  <?php echo Lang::get('conteudo.grade');?> 
                            </h4>
                        </a>
                    </li>
                    @endpermission

                    @permission('ver-escola')
                    <!-- Link para escola -->
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('escola.create')}}">
                            <h4 class="green">
                                <i class="fa fa-university" aria-hidden="true"></i> <?php echo Lang::get('conteudo.school');?> 
                            </h4>
                        </a>
                    </li>
                    @endpermission

                    @permission('ver-disciplina')
                    <!-- Link para disciplina -->
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('disciplina.create')}}">
                            <h4 class="blue">
                                <i class="fa fa-book" aria-hidden="true"></i> <?php echo Lang::get('conteudo.schoolSubject');?> 
                            </h4>
                        </a>
                    </li>
                    @endpermission
                    

                    <!--<li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('NomeTurma.create')}}">Nova Turma</a></li>-->
                    <!-- Colocar tudo no tela de Matricula
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('listar_matriculas.index')}}">Matriculas Regulares</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('lista_matriculas_irregulares.index')}}">Matriculas Irregulares</a></li>
                    -->
                    @permission('ver-ocorrencias')
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('ocorrencia.create')}}">
                            <h4 class="red">
                                <i class="fa fa-commenting" aria-hidden="true"></i> Ocorrência
                            </h4>
                        </a>
                    </li>
                    @endpermission
                    
                    @permission('ver-advertencias')
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('advertencia.create')}}">
                            <h4 class="yellow">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Advertência
                            </h4>
                        </a>
                    </li>
                    @endpermission
                    @endif
               
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{ route('evento.create')}}">
                        <h4 class="green">
                            <i class="fa fa-calendar" aria-hidden="true"></i> Evento
                        </h4>
                    </a>
                </li>
            </div>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">
    
           
        
        <div class="d-flex flex-row-reverse">
            @if(!Auth::guest())
            <div class="p-2">
                <a class="nav-link js-scroll-trigger" href="/auth/logout">
                    <h4 class="red">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <?php echo Lang::get('conteudo.logOut');?>
                    </h4>
                </a>
            </div>
            <div class="p-2">
                <a class="nav-link js-scroll-trigger" href="{{ route('user.create') }}">
                    <h4 class="blue">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        {{{ Auth::user()->name }}}
                    </h4>
                </a>
            </div>
            @endif
            <div class="p-2">
                <div class="nav-item dropdown">
                    <h4 >
                        <a class="nav-link dropdown-toggle green" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="lang fa fa-language" aria-hidden="true"></i>
                            <?php echo Lang::get('conteudo.language');?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('lang', ['es']) }}"> <?php echo Lang::get('conteudo.spanish');?></a>
                                <a class="dropdown-item" href="{{ url('lang', ['pt']) }}"><?php echo Lang::get('conteudo.portuguese');?></a>
                               <!-- <a class="dropdown-item" href="{{ url('lang', ['en']) }}"><php echo Lang::get('conteudo.english');?></a>-->
                        </div>
                    </h4>
                </div>
            </div>
        </div>

    @if(Auth::guest())
        <section class="resume-section p-3 p-lg-5 d-flex d-column row" id="Sobre" >
            <div class="col-sm-11">
                <h1 class="mb-0 ">
                    Instituto
                    <span class="text-success" > Moinho </span>
                    <span class="text-info" > Cultural </span>
                    <span class="text-danger" > Sul </span>
                    <span class="text-warning" > Americano </span> 
                </h1>
                <div class="subheading mb-5">
                    Rua Comendador Domingos Sahib, 300 | Porto Geral | Corumbá/MS - Brasil | 
                    <span class="text-danger" > +55 (67) 3231 8436 </span>
                </div>
                <p class="mb-5">
                    O Instituto Moinho Cultural Sul-Americano (IMC) é uma instituição não governamental, sem fins lucrativos, que tem como missão a diminuição da vulnerabilidade de crianças e adolescentes em região de fronteira através do acesso a bens culturais e conhecimento tecnológico. Atende hoje 290 crianças e adolescentes dos municípios de Corumbá, Ladário/MS, e das cidades bolivianas de Puerto Suarez e Puerto Quijarro, com aulas diárias de música, dança, tecnologia, apoio escolar, idiomas, educação ambiental e patrimonial, no contraturno da escola regular em um ciclo com oito anos de duração. Os familiares dos participantes e a Comunidade participam de cursos de geração de renda e economia criativa promovidos pela instituição. Em 2015, com onze anos de atividades ininterruptas, o Moinho inspirou duas cidades Ladário/MS e Puerto Suarez/Bolívia a criar Projetos de Políticas Públicas baseadas nas ações desenvolvidas pelo Moinho. Além disso, vários participantes foram absorvidos pelo mercado de trabalho não só nas áreas fins da instituição, como também em outros cursos superiores, influenciados pela formação cidadã aqui adquirida.
                </p>
            </div>
            <ul class="list-inline list-social-icons mb-0 col-sm-1">
                <li class="list-inline-item">
                    <a href="https://www.facebook.com/IMCultural/?ref=hl">
                    <span class="fa-stack fa-lg facebook">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.youtube.com/channel/UCLq5EXr1orgvK1H3SzSmo2g">
                    <span class="fa-stack fa-lg youtube">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                </li>
            </ul>
        </section>
        <section class="resume-section p-3 p-lg-5 d-flex d-column" id="Evento">
            <div class="row"> 
                <div class="col-12">
                    <h1 class="text-warning">
                        Eventos 
                    </h1>
                    <h3>
                        Ainda em andamento
                    </h3>
                </div>
            </div>
        </section>
    @endif
    </div>

    <!-- Antigo Front -->
    <div id="app" class="container">
        @yield('content')
    </div>
    
    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="/js/resume.min.js"></script>

   
</body>
</html>
