<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap core CSS -->
    <link href="{{ getenv('APP_URL') }}vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="{{ getenv('APP_URL') }}vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ getenv('APP_URL') }}vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="{{ getenv('APP_URL') }}vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ getenv('APP_URL') }}css/resume.min.css" rel="stylesheet">
    <link href="{{ getenv('APP_URL') }}css/moinho.css" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> TERMO DE USO DE IMAGEM E VOZ </title>

    <?php
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    ?>

    <style>
        body{
            padding-left: 10px !important;
            padding-right: 10px !important;
            padding-top: 10px !important;
        }
        
        .number-section{
            margin-right: 20px !important;
        }

        .number-subsection{
            margin-right: 9px !important;
        }

        .negito{
            margin-left: 5px !important;
            margin-right: 5px !important;
        }

        .table-termo{
            margin-left: 1px !important;
            margin-right: 1px !important;
        }

        .margin-form{
            margin-bottom: 7px;
        }

        a{
            cursor: pointer;
        }
        
    </style>

</head>
<body>
    <div class="row">
        <a class="nav-link js-scroll-trigger col-md-2" href="{{ route('matricula.create') }}">
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
    <div class="container" id="renderPDF">
        <div class="text-center">
            <u class="font-weight-bold">TERMO DE USO DE IMAGEM E VOZ</u>
        </div>
        <br>
        <br>
        <!-- Section 1. -->
        <div class="text-justify">
            <strong class="number-section">1.</strong> Pelo presente instrumento, o <strong>Autorizador</strong> abaixo qualificado e assinado, na qualidade de representante legal da criança, adolescente ou jovem:
            <br>
            <div class="row table-termo">
                <div class="col-1 border-bottom border-top border-left border-dark">
                    <strong>Nome:</strong>
                </div>
                <div class="col-9 border border-dark">
                    {{ $inscrito->nome }}
                </div>
                <div class="col-1 border-bottom border-top border-dark">
                    <strong>Idade:</strong>
                </div>
                <div class="col-1 border border-dark">
                    {{ $inscrito->idade }}
                </div>
            </div>
            doravante denominada simplesmente de <strong>CEDENTE</strong>, autoriza o <strong>INSTITUTO MOINHO CULTURAL SUL-AMERICANO</strong>,  empresa com sede na Cidade de Corumbá, Estado do Mato Grosso do Sul, na Rua Comendador Domingos Sahib, 300 – Bairro Beira Rio, inscrita no CNPJ sob o nº 05.420.357/0001-42, doravante denominada simplesmente <strong>“MOINHO CULTURAL”</strong>, de forma inteiramente gratuita, a título universal, em caráter total, definitivo, irrevogável e irretratável, a utilização de sua  imagem e voz para a fixação destes, pelo <strong>MOINHO CULTURAL</strong>, nas obras audiovisuais impressas por ele produzidas bem como por seus patrocinadores e meio/veículos de comunicação de qualquer área, doravante denominados de <strong>Obra</strong>.
        </div>
        <br>
        <!-- Section 2. -->
        <div class="text-justify">
            <strong class="number-section">2.</strong> Reconhece expressamente o <strong>AUTORIZADOR</strong> que a instituição  <strong>MOINHO CULTURAL</strong>, na qualidade de detentora dos direitos patrimoniais de autor sobre a <strong>Obra</strong> e tendo em vista a autorização efetuada neste Termo, poderá, a seu exclusivo critério, diretamente ou através de terceiros por ela autorizados, utilizar a <strong>Obra</strong> livremente, bem como seus extratos trechos ou partes, podendo, exemplificativamente, adaptá-la para fins de produção de obras audiovisuais novas, obras audiovisuais para fins de exibição em circuito cinematográfico,  obras literárias, eventos artísticos, shows, peças teatrais e/ou peças publicitárias, fixa-la em qualquer tipo de suporte material, utilizá-la, bem como à imagem e voz  para produção de matéria promocional em qualquer tipo de mídia, inclusive impressa, seja para fins de divulgação da <strong>Obra</strong>, para a composição de qualquer produto ligado à mesma (tais como mas não limitados a capas de CD, DVD, “home-video”, DAT, entre outros), assim como produção do “making of” da <strong>Obra</strong>; fixá-la em qualquer tipo de suporte material, tais como películas cinematográficas de qualquer bitola, CD (“compact disc”), CD ROM, CD-I (“compact-disc” interativo), “home video”, DAT (“digital audio tape”), DVD (“digital video disc”) e suportes de computação gráfica em geral, ou armazená-la em banco de dados, exibi-la através de projeção em tela em casas de frequência coletiva ou em locais públicos, com ou sem ingresso pago, transmiti-la via rádio e/ou televisão de qualquer espécie (televisão aberta ou televisão por assinatura, através de todas as formas de transporte de sinal existentes, exemplificativamente UHF, VHF, cabo, MMDS e satélite, bem como independentemente da modalidade de comercialização empregada, incluindo “pay tv”, “pay per view”, “near vídeo on demand” ou “vídeo on demand”, independentemente das características e atributos do sistema de distribuição, abrangendo plataformas analógicas ou digitais, com atributos de interatividade, ou não), adaptá-la para forma de minissérie, comercializá-la ou alugá-la ao público em qualquer suporte material existente, promover ações de merchandising ou veicular propaganda, bem como desenvolver qualquer atividade de licenciamento de produtos e/ou serviços derivados da <strong>Obra</strong>, disseminá-la através da Internet, utilizá-la em parques de diversão, inclusive temáticos, ceder os direitos autorais sobre a <strong>Obra</strong> ou sobre as imagens cuja utilização foi autorizada através deste Termo a terceiros, para qualquer espécie de utilização, produzir novas obras audiovisuais (“re-makes”), utilizar trechos ou extratos da mesma para o desenvolvimento e composição de embalagens, encartes e ou peças publicitárias para a comercialização e divulgação da <strong>Obra</strong> ou, ainda, dar-lhe qualquer outra utilização que proporcione ao <strong>MOINHO CULTURAL</strong> alguma espécie de vantagem econômica.
        <div>
        <br>
        <!-- Section 2.1. -->
        <div class="text-justify">
            <strong class="number-subsection">2.1.</strong> Nenhuma das utilizações previstas no caput desta Cláusula, ou ainda qualquer outra que pretenda o <strong>MOINHO CULTURAL</strong> dar à <strong>Obra</strong> e/ou às imagens cuja utilização foi autorizada através deste Termo, têm limitação de tempo ou de número de vezes, podendo ocorrer no Brasil e/ou no exterior, sem que seja devida ao <strong>AUTORIZADOR</strong> qualquer remuneração adicional.
        </div>
        <br>
        <!-- Section 2.2. -->
        <div class="text-justify">
            <strong class="number-subsection">2.2.</strong> Reserva-se, ainda, ao <strong>INSTITUTO MOINHO CULTURAL SUL-AMERICANO</strong>, a seu exclusivo critério, o direito de não utilizar a participação fixada em razão deste instrumento na <strong>Obra</strong>, mantendo-se integra a presente cessão.
        </div>
        <br>
        <!-- Section 3. -->
        <div class="text-justify">
            <strong class="number-section">3.</strong> O presente instrumento é firmado em caráter irrevogável e irretratável, obrigando-se as partes por si, seus herdeiros e sucessores a qualquer título, ficando eleito o foro da Comarca De Corumbá/MS para dirimir quaisquer dúvidas oriundas deste Termo.
        </div>
        <br>
        <br>
        <!-- Data do Documento -->
        <div class="text-center">
            Corumbá, {{ strftime('%d de %B de %Y', strtotime('today')) }}.
        </div>
        <!-- Preenchimento do Responsável -->
        <!-- Nome -->
        <br>
        <br>
        <div class="margin-form">
            <strong>Nome do Autorizador (Responsável Legal):</strong> {{ $responsavel->nome }}
        </div>
        <!-- Endereço -->
        <div class="margin-form">
            <strong>Endereço:</strong> 
            {{ $endereco_responsavel->rua }} {{ $endereco_responsavel->numero }} {{ $endereco_responsavel->complemento }},
            {{ $endereco_responsavel->bairro }} - {{ $endereco_responsavel->estado }} {{ $endereco_responsavel->cidade }}
        </div>
        <div class="row">
            <!-- RG -->
            <div class="col-6 margin-form">
                <strong>Identidade:</strong> _____________________________________________
            </div>
            <!-- CPF/MF -->
            <div class="col-6 margin-form">
                <strong>CPF/MF:</strong> {{ $responsavel->cpf }}
            </div>
        </div>
        <div>
            <strong>Assinatura do Autorizador:</strong> 
            _____________________________________________________________________________________________________________
        </div>
    </div>
    
    
    <!-- Bootstrap core JavaScript -->
    <script src="{{ getenv('APP_URL') }}vendor/jquery/jquery.min.js"></script>
    <script src="{{ getenv('APP_URL') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ getenv('APP_URL') }}vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ getenv('APP_URL') }}js/resume.min.js"></script>

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