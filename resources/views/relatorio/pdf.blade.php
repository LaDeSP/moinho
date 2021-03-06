<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap core CSS -->
    <link href="{{ getenv('APP_URL') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="{{ getenv('APP_URL') }}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ getenv('APP_URL') }}/vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="{{ getenv('APP_URL') }}/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ getenv('APP_URL') }}/css/resume.min.css" rel="stylesheet">
    <link href="{{ getenv('APP_URL') }}/css/moinho.css" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ $report_name }} </title>


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
        .relatorio{
            text-align: center;
        }
        .card-text{
            margin-top: 20px;
        }
    </style>

</head>
<body>
    <?php
        $nome = 'nome';
        $cont = 0;
        $contador = 2;
    ?>
    <div class="row">
        <a class="nav-link js-scroll-trigger col-md-2" href="{{ route('relatorio.index')}}">
            <h4 class="blue">
                <i class="fa fa-angle-left" aria-hidden="true"></i> Voltar
            </h4>
        </a>
        <a class="nav-link js-scroll-trigger col-md-2" onclick="printDiv('renderPDF')">
            <h4 class="red">
                <i class="fa fa-download" aria-hidden="true"></i> Gerar pdf
            </h4>
        </a>
    </div>
    <input id="nomeRelatorio" type="text" class="d-none" value="{{ $report_name }}"/>
    <input id="dataRelatorio" type="text" class="d-none" value="{{ $data }}"/>
    <div id="renderPDF">
        <div id="1">
            <h2 class="relatorio" id="0">
                <img class="logo" src="{{ getenv('APP_URL') }}/img/moinho.png" alt="INSTITUTO MOINHO CULTURAL SUL AMERICANO">
            </h2>
            <h2 class="relatorio" >
                Relatório: {{ $report_name }}
            </h2>
            <h3>
                Data da criação: {{ $dataReport }}
            </h3>
        </div>
        @foreach($query as $array)
            <div class="card" id="{{ $contador }}">
                <div class="card-body row">
                    @foreach($columns as $key => $column)
                        <?php
                            $array = (array) $array;
                        ?>
                        @if($cont == 0)
                            <div class="card-title col-sm-12" align="justify"> <h4 class="text-secondary" id="titulo"> {{ $column->nome }}: </h4> <strong> {{ $array[ str_replace(' ', '_', $column->nome) ] }} </strong> </div>
                        @else
                            <div class="card-text 
                                <?php
                                    $length = strlen( $array[ str_replace(' ', '_', $column->nome) ] ) / 60;
                                    if( $length >= 2 &&  $length <= 4)
                                        echo 'col-sm-6';
                                    else
                                        if($length > 4)
                                            echo 'col-sm-12';
                                        else
                                            echo 'col-sm-3';
                                ?>" align="justify"> <h6 class="text-secondary"> {{ $column->nome }}:</h6>
                                <?php
                                    if( $array[ str_replace(' ', '_', $column->nome) ] === NULL )
                                        echo "Não há registro";
                                    else {
                                        $val = $array[ str_replace(' ', '_', $column->nome) ];
                                        $data = date('d/m/Y', strtotime( $val ));
                                        $dataOriginal = date('Y-m-d', strtotime($val));
                                        if($dataOriginal === $val){
                                            echo $data;
                                        } else{
                                            $data = date('d/m/Y H:i', strtotime( $val ));
                                            $dataOriginal = date('Y-m-d H:i:s', strtotime($val));
                                            if($dataOriginal === $val){
                                                echo $data;
                                            }
                                            else
                                                echo $array[ str_replace(' ', '_', $column->nome) ];
                                        }
                                    }
                                ?>
                            </div>
                        @endif
                        <?php
                            $cont++;
                        ?>
                    @endforeach
                </div>
                <?php
                    $cont = 0;
                    $contador++;
                ?>
            </div>
            <br>
        @endforeach
    </div>
    
    <!-- Bootstrap core JavaScript -->
    <script src="{{ getenv('APP_URL') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ getenv('APP_URL') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ getenv('APP_URL') }}/js/resume.min.js"></script>

    <!-- Div to PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            cache_width = $('#renderPDF').width(); //Criado um cache do CSS
            a4 = [ 595.28, 841.89]; // Widht e Height de uma folha a4

            // Pegar o nome do relatório
            nome = $('#nomeRelatorio').val();
            data = $('#dataRelatorio').val();

            // Setar o width da div no formato a4
            $("#renderPDF").width((a4[0]*1.33333) -80).css('max-width','none');

            //Criar uma instancia do jsPDF
            doc = new jsPDF({unit:'px', format:'a4'});

            //testes
            render = $('#renderPDF')[0];

            //console.log($('#renderPDF')[0].children);
            height = 20;
            contador = 0;

            html2canvas( render.children[0] , {
                timeout: 100,
                onrendered: function(canvas) {
                    if(height + canvas.height > 700){
                        doc.addPage();
                        height = 20;
                    }
                    //console.log(height);
                    console.log(canvas.height);
                    //console.log(' ');
                    var img = canvas.toDataURL("image/png", 1.0);
                    doc.addImage(img, 'JPEG', 20, height);
                    height += canvas.height;
                    if(canvas.height > 170){
                        if(canvas.height > 170 && canvas.height < 400){
                            height -= 90;
                            console.log('entrou 1');
                        }
                        if(canvas.height > 400){
                            height -= 220;
                            console.log('entrou 2');
                        }
                        console.log('entrou 3 '+canvas.height);
                    }
                    console.log(height);
                }
            })
            $('#renderPDF').width(cache_width);
        });
        function getPDF(){
            $("#renderPDF").width((a4[0]*1.33333) -80).css('max-width','none');
            
            for(i = 1; i < render.childElementCount; i++){
                if(render.children[i].innerHTML !== ''){
                    //console.log(render.children[i]);
                    html2canvas( render.children[i] , {
                        timeout: 100,
                        onrendered: function(canvas) {
                            if(height + canvas.height > 700){
                                doc.addPage();
                                height = 20;
                            }
                            //console.log(height);
                            //console.log(canvas.height);
                            //console.log(' ');
                            var img = canvas.toDataURL("image/png", 1.0);
                            doc.addImage(img, 'JPEG', 20, height);
                            height += canvas.height;
                            if(canvas.height > 170){
                                if(canvas.height > 170 && canvas.height < 300){
                                    height -= 90;
                                }
                                if(canvas.height > 400){
                                    height -= 220;
                                }
                            }
                        }
                    })
                }
            }
            //doc.addImage(img, 'JPEG', 20, 20);
            setTimeout(function(){
                console.log(height);
                doc.save(nome+' Relatório '+data+'.pdf')
            }, 5000);

            //Retorna ao CSS normal
            $('#renderPDF').width(cache_width);
        }
    </script>
</body>
</html>