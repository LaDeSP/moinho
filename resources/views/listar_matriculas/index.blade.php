
@extends('layouts.app')

@section('content')
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
        @if($mat->status_matricula_id == 1)
       
              
      		@foreach(busca_inscricao2($mat->inscricao_id) as $inscricao)<!-- logica é essa. só colocar os campos certos pra impressão e deu-->
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
