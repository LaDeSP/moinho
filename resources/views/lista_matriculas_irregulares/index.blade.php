<script type="text/javascript">
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


</script>
@extends('layouts.app')

@section('content')
<br>
 <div><center><select name="selecao_ano" id="selecao_ano" class="form-control" value="" onchange="teste();">
 <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
  </select></center></div>
  <div class="panel panel-danger">
    <div class="panel-heading">
    <table>
      <tr class="header">
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
            <th style="width:243px;"></th>
    </tr>
    <th><b>Numero da Matrícula</b></th>
    <th><b>Data da Matrícula</b></th>
    <th><b>Nome do Aluno</b></th>
    <th><b>Turma</b></th>
    </table>

    </div>
      <div class="panel-body">
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
        
          @if($mat->status_matricula_id != 1)    
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
       
  </div>
    <div><center><button onclick="do_bom();" type="button" class="btn btn-primary">Imprimir</button></center></div>
  
  




<!--

<br><br><br>
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
        @if($mat->status_matricula_id != 1)
       
              
      		@foreach(busca_inscricao2($mat->inscricao_id) as $inscricao) logica é essa. só colocar os campos certos pra impressão e deu
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
  </div>
@endsection
