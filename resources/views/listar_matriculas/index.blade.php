

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 
<script>
 function do_bom(){
      window.print();
    }
    function teste () {
     var a = document.getElementById('selecao_ano').value;
    $('.panel-body tr').hide();
      $.each($('[class^="'+a), function(key, value) {
     $(value).show();
});
  }
    /*$(function naruto (){
        function () {
            jQuery.ajax({
            type: "GET",
            url: "/contato",
            dataType: "html",
            data: "busca=" + busca,
             
            success: function(response){
            jQuery("#retorno").html(response);
            },
            // quando houver erro
            error: function(){
            alert("Ocorreu um erro durante a requisição");
            }
          });
           
        }
 
        $('#selecao-ano').on('change', function (){
            var ano = $(this).val();
           
            $(dados).each(index, item) {
                if(item.ano == ano)
                    $('#exibir-dados').append(imprime o item);
            }
        });
    });*/

  /* function aaaa(){
    $(document).ready(function(){
      var b = document.getElementById('selecao_ano').value;
      console.log(b);
      
      $.get("/matricula", function(data){
        $.get("/pessoa", function(data4){  
           $.get("/inscricao", function(data2){   
              $.get("/dados", function(data3){
                 $.get("/turma", function(data5){
                   $.get("/nome_turma", function(data6){
                a = $('#teste');
                for (i=0; i<data.length;i++){
                    
                    for (j=0; j<data2.length;j++){

                      for (k=0;k<data3.length;k++){
                          
                        for (l=0;l<data4.length;l++){
                          for (m=0; m<data5.length;m++){
                            for (n=0; n<data6.length;n++){
                              if (data[i].inscricao_id == data2[j].id && data3[k].id==data2[j].dados_inscricao_id && data4[l].id == data3[k].dados_pessoais_id && b == 2017 && data[i].status_matricula_id == 1 && data5[m].id==data[i].turma_id && data5[m].nome_turma_int == data6[n].id){

                            a.append(`
                               <tr> <td> `+ data[i].id + ` </td> <td> `+ data[i].data +  ` </td>  <td> `+ data4[l].nome + `</td> <td> ` + data6[n].nome_turma+`</td> </tr>
                            `); 
                          }
                            }
                          }

                      }
                    }
                }
                  
              }


                

            })  
          })
        })
      })
      })
        })
    })
  }*/

        
      
 
</script>




@extends('layouts.app')

@section('content')
<br>
  <div><center><select name="selecao_ano" id="selecao_ano" class="form-control" onchange="teste();">
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
  </select></center></div>


  <div class="panel panel-info">
    <div class="panel-heading">
    <table>
      <tr class="header">
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
    </tr>
    <td><b>Numero da Matrícula</b></td>
    <td><b>Data da Matrícula</b></td>
    <td><b>Nome do Aluno</b></td>
    <td><b>Turma</b></td>
    </table>

    </div>
      <div class="panel-body" id="teste">
      <table>
      <tr class="header">
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
    </tr>
       <tbody>
      @foreach($matricula as $mat)
        <tr class="{{$mat->data }}">
        
          @if($mat->status_matricula_id == 1)    
            @foreach(busca_inscricao2($mat->inscricao_id) as $inscricao)<!-- logica é essa. só colocar os campos certos pra impressão e deu-->
              @foreach(busca_dados($inscricao->dados_inscricao_id) as $dados)
                @foreach (busca_pessoa($dados->dados_pessoais_id) as $pessoa)
                  @foreach (buscar_turma($mat->turma_id) as $turma)
                    @foreach (buscar_nometurma($turma->nome_turma_int) as $nometurma)
                      <td>{{$mat->id }}</td>
                      <td>{{ $mat->data }}</td>
                      <td>{{ $pessoa->nome}}</td>
                      <td>{{ $nometurma->nome_turma }} - {{ $turma->ano }}</td>
                    @endforeach
                  @endforeach
                @endforeach
              @endforeach
            @endforeach
          @endif
        </tr>
      @endforeach
    </tbody>
   


      </table>
      </div>

      
</form>




<!--<div id="retorno">
  
</div>-->
       
  </div>

<div><center><button onclick="do_bom();" type="button" class="btn btn-primary">Imprimir</button></center></div>



 <!--
  <div class="row">
    <div class="col-md-12">
      <table id="myTable">
        <tr class="header">
          <th style="width:70%;"></th>
          <th style="width:30%;"></th>
        </tr>
        <tbody>
        <td><b>Numero da Matrícula</b></td>
        <td><b>Nome do Aluno</b></td>
        
        @foreach($matricula as $mat)

      	<tr>
        @if($mat->status_matricula_id == 1)
       
              
      		@foreach(busca_inscricao2($mat->inscricao_id) as $inscricao)<!-- logica é essa. só colocar os campos certos pra impressão e deu-->
          <!--
      			@foreach(busca_dados($inscricao->dados_inscricao_id) as $dados)
      				@foreach (busca_pessoa($dados->dados_pessoais_id) as $pessoa)
      				 <td>{{$mat->id}}</td>
       				 <td>{{ $pessoa->nome}}</td>

      				@endforeach
      			@endforeach

      			
      		@endforeach
          @endif
      	
     
      </tr>
    @endforeach
    </tbody>
     
      </table>
    </div>
  </div>-->

   <!--a.append(`

 a.append(`

@foreach(busca_matricula_ano(2017) as $mat)
        <tr>
        @if($mat->status_matricula_id == 1)
           @foreach(busca_inscricao2($mat->inscricao_id) as $inscricao) logica é essa. só colocar os campos certos pra impressão e deu
              @foreach(busca_dados($inscricao->dados_inscricao_id) as $dados)
                @foreach (busca_pessoa($dados->dados_pessoais_id) as $pessoa)
                  @foreach (buscar_turma($mat->turma_id) as $turma)
                    @foreach (buscar_nometurma($turma->nome_turma_int) as $nometurma)
                      
                      <td>{{$mat->id }}</td>
                      <td>{{ $mat->data }}</td>
                      <td>{{ $pessoa->nome}}</td>
                      <td>{{ $nometurma->nome_turma }} - {{ $turma->ano }}</td>
                      
                    @endforeach
                  @endforeach
                @endforeach
              @endforeach
            @endforeach
          @endif
        
     
      </tr>
    @endforeach


            `);
            -->

      <!-- JAVASCRIPT ANTIGO ... FUNDIONA PARCIALMENTE, SO TIRAR OS FOREACH        /////////////
        //data = JSON.parse(data);
    /*    var tamanho = data.length;
        for(i = 0; i < data.length; i++){
          if (b == 2017 ){
            a.append(`
              <tr> <td> `+ data[i].id + ` </td> <td> `+ data[i].data + ` </td>  
              @foreach(busca_matricula_ano(2017) as $mat)
                @foreach(busca_inscricao2($mat->inscricao_id) as $inscricao)
                  @foreach(busca_dados($inscricao->dados_inscricao_id) as $dados)
                   @foreach (busca_pessoa($dados->dados_pessoais_id) as $pessoa) 
                    @if($pessoa == `+data[i].id+`)
                      <td> {{ $pessoa->nome}} </td>
                    @endif
                  @endforeach
                 @endforeach
                 @endforeach
               @endforeach<td> 

              `);
          }
         
        }
      });
    });
  };-->

  <!--<script>
    /*$(function naruto (){
        function () {
            jQuery.ajax({
            type: "GET",
            url: "/contato",
            dataType: "html",
            data: "busca=" + busca,
             
            success: function(response){
            jQuery("#retorno").html(response);
            },
            // quando houver erro
            error: function(){
            alert("Ocorreu um erro durante a requisição");
            }
          });
           
        }
 
        $('#selecao-ano').on('change', function (){
            var ano = $(this).val();
           
            $(dados).each(index, item) {
                if(item.ano == ano)
                    $('#exibir-dados').append(imprime o item);
            }
        });
    });*/

    function aaaa(){
    $(document).ready(function(){
      var b = document.getElementById('selecao_ano').value;
      console.log(b);
      
      $.get("/matricula", function(data){
        $.get("/pessoa", function(data4){  
           $.get("/inscricao", function(data2){   
              $.get("/dados", function(data3){
                 $.get("/turma", function(data5){
                   $.get("/nome_turma", function(data6){
                a = $('#teste');
                for (i=0; i<data.length;i++){
                    
                    for (j=0; j<data2.length;j++){

                      for (k=0;k<data3.length;k++){
                          
                        for (l=0;l<data4.length;l++){
                          for (m=0; m<data5.length;m++){
                            for (n=0; n<data6.length;n++){
                              if (data[i].inscricao_id == data2[j].id && data3[k].id==data2[j].dados_inscricao_id && data4[l].id == data3[k].dados_pessoais_id && b == 2017 && data[i].status_matricula_id == 1 && data5[m].id==data[i].turma_id && data5[m].nome_turma_int == data6[n].id){

                            a.append(`
                               <tr> <td> `+ data[i].id + ` </td> <td> `+ data[i].data +  ` </td>  <td> `+ data4[l].nome + `</td> <td> ` + data6[n].nome+`</td> </tr>
                            `); 
                          }
                            }
                          }

                      }
                    }
                }
                  
              }


                

            })  
          })
        })
      })
      })
        })
    })
  }
        
      
 
</script>-->
@endsection
