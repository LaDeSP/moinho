<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/resume.min.css" rel="stylesheet">
    <link href="/css/moinho.css" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Relatorio </title>


    <style>
        body{
            padding-left: 10px !important;
            padding-right: 10px !important;
            padding-top: 10px !important;
        }
        table{
            font-size: 10px;
        }
        a:hover{
            cursor:pointer;
        }
        #titulo{
            display: inline;
        }
        #relatorio{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        $nome = 'nome';
        $cont = 0;
    ?>
    <div class="row">
        <a class="nav-link js-scroll-trigger col-md-2" href="{{ route('relatorio.index')}}">
            <h4 class="blue">
                <i class="fa fa-angle-left" aria-hidden="true"></i> Voltar
            </h4>
        </a>
        <a class="nav-link js-scroll-trigger col-md-2" onclick="getPDF()">
            <h4 class="red">
                <i class="fa fa-download" aria-hidden="true"></i> Gerar pdf
            </h4>
        </a>
    </div>
    <input id="nomeRelatorio" type="text" class="d-none" value="{{ $report_name }}"/>
    <input id="dataRelatorio" type="text" class="d-none" value="{{ $data }}"/>
    <div id="renderPDF">
        <h2 id="relatorio">
            <img class="logo" src="/img/moinho.png" alt="INSTITUTO MOINHO CULTURAL SUL AMERICANO">
            Relatório: {{ $report_name }}
        </h2>
        <h3>
            Data da criação: {{ $dataReport }}
        </h3>
        @foreach($query as $array)
            <div class="card" >
                <div class="card-body row">
                    @foreach($columns as $column)
                        <?php
                            $array = (array) $array;
                        ?>
                        @if($cont == 0)
                            <div class="card-title col-sm-12"> <h4 class="text-secondary" id="titulo"> {{ $column->nome }}: </h4> <strong> {{ $array[ str_replace(' ', '_', $column->nome) ] }} </strong> </div>
                        @else
                            <div class="card-text col-sm-3"> <h6 class="text-secondary">{{ $column->nome }}:</h6> {{ $array[ str_replace(' ', '_', $column->nome) ] }}</div>
                        @endif
                        <?php
                            $cont++;
                        ?>
                    @endforeach
                </div>
                <?php
                    $cont = 0;
                ?>
            </div>
            <br>
        @endforeach
    </div>
    
    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="/js/resume.min.js"></script>

    <!-- Div to PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            cache_width = $('#renderPDF').width(); //Criado um cache do CSS
            a4 = [ 595.28, 841.89]; // Widht e Height de uma folha a4
        });
        function getPDF(){
                // Pegar o nome do relatório
                nome = $('#nomeRelatorio').val();
                data = $('#dataRelatorio').val();
                // Setar o width da div no formato a4
                $("#renderPDF").width((a4[0]*1.33333) -80).css('max-width','none');

                // Aqui ele cria a imagem e cria o pdf
                html2canvas($('#renderPDF'), {
                    onrendered: function(canvas) {
                        var img = canvas.toDataURL("image/png",1.0);  
                        var doc = new jsPDF({unit:'px', format:'a4'});
                        doc.addImage(img, 'JPEG', 20, 20);
                        doc.save(nome+'Relatório'+data+'.pdf');
                        //Retorna ao CSS normal
                        $('#renderPDF').width(cache_width);
                    }
                });
            }
    </script>
</body>
</html>