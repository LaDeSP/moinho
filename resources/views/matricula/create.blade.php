<script type="text/javascript">
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
  }
  function changeTable(target, id) {
    var a = document.getElementById(id).value;
    console.log(a);
    $(target+' tr').hide();
    if(a === 'all')
    {
        $(target+' tr').show();
    }
    else
    {
        $.each($(target+' [class^="'+a), function(key, value) {
            $(value).show();
        });
    }
  }
</script>

@extends('layouts.app')

@section('content')
    <h1 class="text-success">
        Participantes
    </h1>

    <form method= "POST" action="{{ route('matricula.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <!-- Inscrição -->
                <label for="exampleFormControlInput1">Inscrição</label>
                <select name="inscricao_id" class="form-control">
                    @foreach(busca_inscricao() as $inscricao) 
                        <option value="{{ $inscricao->id }}"> {{ $inscricao->nome }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <!-- Data -->
                <label for="exampleFormControlInput1">Data</label>
                <input type="date" name="data" size="23" class="form-control">
            </div>

            <!-- Segunda Linha -->
            <div class="col-md-4">
                <!-- Período -->
                <label for="exampleFormControlInput1">Período</label>
                <input type="text" name="periodo" size="23" class="form-control">
            </div>
            <div class="col-md-4">
                <!-- Turma -->
                <label for="exampleFormControlInput1">Turma</label>
                <select name="turma_id" class="form-control">
                    @foreach(busca_turma() as $turma) 
                        <option value="{{ $turma->id }}"> {{ $turma->nome_turma }} - {{$turma->ano}} </option><!--aqui tava dando merda pq tava turma_id as turma, dai imprimia a string da função em vez do turma->nome. Assim, imprimia a função toda. Mais algum BO que esqueci -->
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <!-- Status -->
                <label for="exampleFormControlInput1">Status</label>
                <select name="status" class="form-control">
                    @foreach($status as $stat) 
                        <option value="{{ $stat->id }}"> {{ $stat->status }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12">
                <br>
                <button type="submit" class="btn btn-outline-info">Adicionar</button>
            </div>
        </div>
        
        
    </form>


<!-- Listar Matriculas Inrregulares -->
<section class="">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-success text-md-right">
                LISTA DE PARTICIPANTES REGULARES
            </h4>
            <div>
                <center>
                    <select 
                        name="selecao_ano" 
                        id="selecao_ano_regular" 
                        class="form-control" 
                        value="" 
                        onchange="changeTable('.panel-body.regular', 'selecao_ano_regular');"
                    >
                        <option value="all"> Todos </option>
                        @foreach(data_matricula('Regular') as $data)
                            <option value="{{ $data }}">{{ $data }} </option>
                        @endforeach
                    </select>
                </center>
            </div>
            <div class="panel panel-danger" id="body_regular">
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                      <thead class="text-success">
                          <tr>
                              <th >Matrícula</th>
                              <th >Data</th>
                              <th >Participante</th>
                              <th >Turma</th>
                          </tr>
                      </thead>
                      <tbody class="panel-body regular">
                        @foreach($matricula as $mat)
                          <tr class="{{$mat->data }}">
                            @if($mat->status_matricula_id == 1)    
                              @foreach(busca_inscricao2($mat->inscricao_id) as $inscricao)
                              @foreach(busca_dados($inscricao->dados_inscricao_id) as $dados)
                                  @foreach (busca_pessoa($dados->dados_pessoais_id) as $pessoa)
                                    @foreach (buscar_turma($mat->turma_id) as $turma)
                                      @foreach (buscar_nometurma($turma->nome_turma_int) as $nometurma)
                                        <td>{{ $mat->id }}</td>
                                        <td>{{ $mat->data }}</td>
                                        <td>{{ $pessoa->nome}}</td>
                                        <td>{{ $nometurma->nome_turma }} <br> {{ $turma->ano }}</td>
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
            <div><center><button onclick="printDiv('body_regular')" type="button" class="btn btn-outline-info">Imprimir</button></center></div>
            <br>
        </div>
        <div class="col-md-6" style="text-align: left">
            <h4 class="text-danger">
                LISTA DE PARTICIPANTES IRREGULARES
            </h4>
            <div>
                <center>
                    <select 
                        name="selecao_ano" 
                        id="selecao_ano_inrregular" 
                        class="form-control" 
                        value="" 
                        onchange="changeTable('.panel-body.inrregular', 'selecao_ano_inrregular');"
                    >
                        <option value="all"> Todos </option>
                        @foreach(data_matricula('Afastado') as $data)
                            <option value="{{ $data }}">{{ $data }} </option>
                        @endforeach
                    </select>
                </center>
            </div>
            <div class="panel panel-danger" id="body_inrregular">
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead class="text-danger">
                            <tr>
                                <th >Matrícula</th>
                                <th >Data</th>
                                <th >Participante</th>
                                <th >Turma</th>
                            </tr>
                        </thead>
                        <tbody class="panel-body inrregular" >
                            @foreach($matricula as $mat)
                                <tr class="{{ $mat->data }}">
                                    @if($mat->status_matricula_id != 1)    
                                        @foreach(busca_inscricao2($mat->inscricao_id) as $inscricao)<!-- logica é essa. só colocar os campos certos pra impressão e deu-->
                                            @foreach(busca_dados($inscricao->dados_inscricao_id) as $dados)
                                                @foreach (busca_pessoa($dados->dados_pessoais_id) as $pessoa)
                                                    @foreach (buscar_turma($mat->turma_id) as $turma)
                                                        @foreach (buscar_nometurma($turma->nome_turma_int) as $nometurma)
                                                            <td>{{$mat->id }}</td>
                                                            <td>{{ $mat->data }}</td>
                                                            <td>{{ $pessoa->nome}}</td>
                                                            <td>{{ $nometurma->nome_turma }} <br> {{ $turma->ano }}</td>
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
            <div><center><button onclick="printDiv('body_inrregular')" type="button" class="btn btn-outline-info">Imprimir</button></center></div>
            <br>
        </div>
    </div>
</section>
@endsection