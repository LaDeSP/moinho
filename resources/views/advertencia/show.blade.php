<?php 

use PHP\test;

?>

<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>

</head>
@extends('layouts.app')

@section('content')
<?php 

                 $ocorrencia = busca_ocorrencia_participante($advertencia->ocorrencia_id);
?>
<h1 class="text-warning"> Visualizar Advertência </h1>
    <div class="text-right">
        <a href="{{ route('advertencia.edit', $id)}}">
            <i class="fa fa-pencil icon text-warning" aria-hidden="true"></i>
        </a>
    </div>
    <form onkeyup="verifica_submit('validate');" id="myForm" method= "POST" action="{{ route('escola.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-md-4">
                
                <label for="exampleFormControlInput1">
                    <?php echo Lang::get('validation.attributes.name'); ?> do participante:
                </label>
                        <input type="text" name="participante_id" size="23" class="form-control validate"
                    id="nome" value="{{$advertencia->ocorrencia_id}}" disabled hidden> <!-- id da ocorrencia (ocorrencia.id) -->
                        <input type="text" name="nomeParticipante" size="23" class="form-control validate"
                        id="nome" value="{{$ocorrencia[0]->nome_participante}}" Disabled>
            </div>
            <div class="col-md-2">
                    <label for="exampleFormControlInput1">Tipo:</label>
                        <select name="tipo" class="form-control" disabled>
                                @foreach($t as $tipo_geral) 
                                <option 
                                    value="{{ $tipo_geral->id }}"
                                    <?php
                                        if($advertencia->tipo_ocorrencia_advertencia === $tipo_geral->id)
                                            echo("selected");
                                    ?>
                                > {{ $tipo_geral->nome}} </option>
                            @endforeach                 
                        </select>                                
            </div>
            <div class="col-md-5">
                   <label for="exampleFormControlInput1">Data da Advertência: <small><b>(data que será colocada no termo)</b></small></label>
                               <input type="date" name="data" size="23" class="form-control"
                               id="data" value="{{$advertencia->data_advertencia}}" disabled>
                               <div class="invalid-feedback">
                                   Por favor, digite a data da ocorrência
                             </div>
            </div>

        </div>
            <div class="row">
                <div class="col-md-4">
                        <!-- Nome do Agressor -->
                        <label for="exampleFormControlInput1"><?php echo Lang::get('validation.attributes.name');?> do agressor: <small><b>(opcional)</b></small></label>
                    <input type="text" name="nome" value="{{$advertencia->agressor}}" id="nome" size="23" class="form-control" disabled>
                </div>
                            <div class="col-md-4">
                                    <!-- Chamar Responsável -->
                                    <label for="exampleFormControlInput1">Providências: *</label>
                                            <select name="providencia" class="form-control" disabled>
                                               <?php 
                                                    switch($advertencia->providencia) {
                                                        case 0:
                                                        echo("<option value=\"0\"> </option>");
                                                        break;
                                                        case 2:
                                                        echo("<option value=\"2\"> Notificação </option>");
                                                        break;
                                                        case 3:
                                                        echo("<option value=\"3\"> Assinatura do Responsável </option>");
                                                        break;
                                                        case 1:
                                                        echo("<option value=\"1\"> Assinatura e Presença do Responsável </option>");
                                                    }
                                               ?>
                                            </select>
                            </div>
                <div class="col-md-4" style="margin-top:20px; ">
                    <label id="chamar" for="exampleFormControlInput1"> </label>
                    @if ($advertencia->providencia === 1)
                        <button onclick="printDiv('printA');" class="btn btn-warning"><i class="fa fa-download" ></i> Imprimir </button>            
                    @endif
                    @if ($advertencia->providencia === 2)
                        <button onclick="printDiv('printB');" class="btn btn-warning"><i class="fa fa-download" ></i> Imprimir </button>            
                    @endif
                    @if ($advertencia->providencia === 3)
                        <button onclick="printDiv('printC');" class="btn btn-warning"><i class="fa fa-download" ></i> Imprimir </button>            
                    @endif
                </div>
            </div>
                    <div class="row">
                            <div class="col-md-4">
                                    <label for="exampleFormControlInput1">Advertência gerada por:  {{$pessoa->nome}} </label>
                                    <input type="text" name="Colaborador" size="23" class="form-control validate"
                                    id="Colaborador" value="{{$colaborador->id}}" hidden> 
                            </div>
                    </div>
                <div class="row">
                    <div class="col-md-12">
                            <label for="exampleFormControlInput1">Observação:<small> <b>(opcional) poderá ser colocado no termo da advertência</b></small></label>
                    <textarea name="observacao" rows="4" disabled> {{$advertencia->observacao}}</textarea>
                    </div>
                </div>
                @permission('excluir-advertencias')
                <div class="text-right">
                    <a class="excluirRegistro" title="Excluir Advertência">
                        <i 
                            url="/advertencia/remove/{{ $id }}" 
                            nome="Advertência" 
                            class="fa fa-trash icon text-warning" 
                            aria-hidden="true"
                        ></i>
                    </a>
                </div>
                @endpermission
            </form>
            <div class="col-md-10" >
                <div class="row">
                <table >
                    <tr>
                    <th> 
                    <h3 class="text-danger"> Ocorrência associada </h3>
               <!-- Imprimir a ocorrência que resultou na advertência -->
                   <div class="row">
                       <div class="col-md-4">
                       Data da ocorrencia: {{ date('d/m/Y', strtotime($ocorrencia[0]->data_ocorrencia))}}
                       </div>
                       <div class="col-md-2">
                               Tipo: {{$ocorrencia[0]->tipo}}
                       </div>
                       <div class="col-md-4">
                        <!-- Encontrar o colaborador que gerou a ocorrencia -->
                        <?php $teste = busca_colaborador_gerou_ocorrencia($advertencia->ocorrencia_id);
                        ?>
                               Ocorrência gerada por: {{$teste[0]->nome }}
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-md-8">
                           Motivo: {{$ocorrencia[0]->motivo_ocorrencia}}
                       </div>
                    </div>    
                    </th>
                    </tr>
                </table>
                </div>
           </div>
        </div>
        @if ($advertencia->providencia === 1)
           <div class="col-md-10" id="printA">
                <div class="row">
                     <table >
                             <tr>
                               <th> 
                         <div class="row" >
                             <div style="text-align:center" class="col-md-9">
                                     <h2> Termo de Advertência</h2>
                             </div>
                             <div style="text-align:right" class="col-md-3">
                             <img class="logo" src="/img/moinho.png" alt="INSTITUTO MOINHO CULTURAL SUL AMERICANO" style="width:150px;height:100px; align:right;">
 
                         </div>
                         <div class="row">
                                 <div class="col-md-12">
                                   <p>  Sres. Pais ou Responsáveis,</p>
                                   <p style="text-align:justify">
                                        O Instituto Moinho Cultural Sul – Americano comunica que a/o participante <b>{{$ocorrencia[0]->nome_participante}} </b>
                                        está <b>ADVERTIDA/O</b> e necessitamos de vossa presença para tratarmos de tal assunto. 
                                        Participante recebeu orientações por/pela(o) <b>coordenação</b>. Informamos que a entrada do(a) mesmo(a) fica 
                                        condicionada à <b>assinatura e presença dos responsáveis</b>. 
                                        </p> 
                                   <p style="text-align:center">
                                             Ciente, _______________________________________________________________.
                                     </p>
                                     <p >
                                            Maiores informações: 3231-8436 / 9988-4338
                                    </p>
                                     <p style="text-align:center">
                                             <b>Instituto Moinho Cultural Sul - Americano</b><br>
                                             Corumbá, {{ date('d/m/Y', strtotime($advertencia->data_advertencia)) }}.
                                     </p>
                                 </div>
                         </div>
                      </th>
                   </tr>
                 </table>
                </div>
           </div>
        @endif
        @if ($advertencia->providencia === 2)

           <div class="col-md-10" id="printB"> 
                <div class="row">
                     <table >
                             <tr>
                               <th> 
                         <div class="row" >
                             <div style="text-align:center" class="col-md-9">
                                     <h2> Termo de Advertência </h2>
                             </div>
                             <div style="text-align:right" class="col-md-3">
                             <img class="logo" src="/img/moinho.png" alt="INSTITUTO MOINHO CULTURAL SUL AMERICANO" style="width:150px;height:100px; align:right;">
 
                         </div>
                         <div class="row">
                                 <div class="col-md-12">
                                   <p>  Sres. Pais ou Responsáveis,</p>
                                     <p style="text-align:justify">
                                    Fica advertido nesta data <b>{{ date('d/m/Y', strtotime($advertencia->data_advertencia)) }}</b>, o participante <b>{{$ocorrencia[0]->nome_participante}}</b>.
                                    O motivo é {{$advertencia->observacao}} Pedimos a sua colaboração.
                                   
                                     </p><br>
                                     <p style="text-align:center">
                                             Ciente, _______________________________________________________________.
                                     </p>
                                     <p >
                                            Maiores informações: 3231-8436 / 9988-4338
                                    </p>
                                     <p style="text-align:center">
                                             <b>Instituto Moinho Cultural Sul - Americano</b><br>
                                             Corumbá, {{ date('d/m/Y', strtotime($advertencia->data_advertencia)) }}.
                                     </p>
                                 </div>
                         </div>
                      </th>
                   </tr>
                 </table>
                </div>
           </div>
           @endif
           @if ($advertencia->providencia === 3)
           <div class="col-md-10" id="printC"> 
                    <div class="row">
                         <table >
                                 <tr>
                                   <th> 
                             <div class="row" >
                                 <div style="text-align:center" class="col-md-9">
                                         <h2> Termo de Advertência </h2>
                                 </div>
                                 <div style="text-align:right" class="col-md-3">
                                 <img class="logo" src="/img/moinho.png" alt="INSTITUTO MOINHO CULTURAL SUL AMERICANO" style="width:150px;height:100px; align:right;">
     
                             </div>
                             <div class="row">
                                     <div class="col-md-12">
                                       <p>  Sres. Pais ou Responsáveis,</p>
                                       <p style="text-align:justify">
                                            O Instituto Moinho Cultural Sul – Americano comunica que a participante <b>{{$ocorrencia[0]->nome_participante}}</b>
                                            está advertida/o por descumprir as regras da Instituição. Participante recebeu orientações por/pela(o) <b>Coordenação</b>. Estamos
                                            disposição para maiores esclarecimentos. <b>Não é necessária a presença, apenas a assinatura de ciência.</b>
                                            </p> 
                                       <p style="text-align:center">
                                                 Ciente, _______________________________________________________________.
                                         </p>
                                         <p >
                                                Maiores informações: 3231-8436 / 9988-4338
                                        </p>
                                         <p style="text-align:center">
                                                 <b>Instituto Moinho Cultural Sul - Americano</b><br>
                                                 Corumbá, {{ date('d/m/Y', strtotime($advertencia->data_advertencia)) }}.
                                         </p>
                                     </div>
                             </div>
                          </th>
                       </tr>
                     </table>
                    </div>
           </div>
           @endif
        @endsection
        <style>
                table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                margin-left: 120px;
                margin-right: 50px;
                padding: 25px 25px 25px 25px;
            }
            p{
                font-family: Arial, Helvetica, sans-serif;
                font-size: 13pt;
                font-weight: normal;
                color: black;
            }
                       
            </style>

<script src="/moinho/public/vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript">
     

           $(document).ready(function(){
                cache_width = $('#pdf').width(); //Criado um cache do CSS
                a4 = [ 595.28, 841.89]; // Widht e Height de uma folha a4
            });
        
        function getPDF(){
                
                // Setar o width da div no formato a4
                $("#pdf").width((a4[0]*1.33333) -80).css('max-width','none');

                // Aqui ele cria a imagem e cria o pdf
                html2canvas($('#pdf'), {
                    onrendered: function(canvas) {
                        var img = canvas.toDataURL("image/png",1.0);  
                        var doc = new jsPDF({unit:'px', format:'a4'});
                        doc.addImage(img, 'JPEG', 20, 20);
                        doc.save('advertencia.pdf');
                        //Retorna ao CSS normal
                        $('#pdf').width(cache_width);
                    }
                });
            }

        function GerarDoc() {
           $('#myForm').submit(function(e){
                e.preventDefault();
                //getPDF();
                printDiv('pdf');
        
            });
       }

        </script>
