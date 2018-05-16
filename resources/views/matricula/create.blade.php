<script type="text/javascript">
  
</script>

@extends('layouts.app')

@section('content')
    <h1 class="text-success"> 
    <?php echo Lang::get('conteudo.enrolment'); ?>
    </h1>

    <!-- Criar matricula -->
    @permission('criar-matricula')
    <form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('matricula.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <!-- Inscrição -->
                <label for="exampleFormControlInput1">  <?php echo Lang::get('conteudo.registration'); ?>*</label>
                <select name="inscricao_id" class="form-control">
                    @foreach(busca_nome_inscrito() as $inscricao) 
                        <option value="{{ $inscricao->id }}"> {{ $inscricao->nome }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <!-- Data -->
                <label for="exampleFormControlInput1"> <?php echo Lang::get('conteudo.dateRegistration'); ?>*</label>
                <input type="date" name="data" size="23" id="data" class="form-control validate"
                onkeyup="verifica_vazio(this.value, this.id);">
            </div>

            <!-- Segunda Linha -->
            <div class="col-md-4">
                <!-- Turno -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.shift');?>*</label>
                <select name="turno" class="form-control">
                    <option value="morning"> <?php echo Lang::get('validation.attributes.morning');?>  </option>
                    <option value="afternoon"> <?php echo Lang::get('validation.attributes.afternoon');?> </option>
                </select>
            </div>
            <div class="col-md-4">
                <!-- Turma -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.turma'); ?>*</label>
                <select name="turma_id" class="form-control">
                    @foreach(busca_turma() as $turma) 
                        <option value="{{ $turma->id }}"> {{ $turma->nome_turma }} - {{$turma->ano}} </option><!--aqui tava dando merda pq tava turma_id as turma, dai imprimia a string da função em vez do turma->nome. Assim, imprimia a função toda. Mais algum BO que esqueci -->
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <!-- Status -->
                <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.status'); ?>*</label>
                <select name="status" class="form-control">
                    @foreach($status as $stat) 
                        <option value="{{ $stat->id }}"> {{ $stat->status }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12">
                <br>
                <button id="submit" type="submit" class="btn btn-outline-danger" disabled><?php echo Lang::get('conteudo.add'); ?></button>
            </div>
        </div>
    </form>
    @endpermission

<section class="">
    <div class="row">
        @permission('ver-matriculas-regulares')
        <div class="col-md-6">
            <h4 class="text-success text-md-right">
                <?php echo Lang::get('conteudo.listRegular'); ?>            
            </h4>
            <div class="row">
                <div class="col-md-8">
                    <input
                        type="text"
                        name="selecao_ano" 
                        id="selecao_ano_regular" 
                        class="form-control" 
                        value=""
                        placeholder="Pesquisa"
                        onKeyUp="changeListGroup('.filtro1', this.value);"
                    >
                    </input>  
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-success" onClick="changeListGroup('.filtro1', 'all');" >Todos</button>
                </div>
            </div>
            <br>
            <div class="list-group" id="body_regular">
                @foreach($matricula as $mat)
                    <div class="lista">
                        @if($mat->status_matricula_id == 1 && date('Y', strtotime($mat->data)) >= date('Y'))    
                            @foreach(busca_inscricao2($mat->inscricao_id) as $inscricao)
                                @foreach(busca_dados($inscricao->dados_inscricao_id) as $dados)
                                    @foreach (busca_pessoa($dados->dados_pessoais_id) as $pessoa)
                                        @foreach (buscar_turma($mat->turma_id) as $turma)
                                            @foreach (buscar_nometurma($turma->nome_turma_id) as $nometurma)
                                                <div 
                                                    class="{{ date('d/m/Y', strtotime($mat->data)) }} {{ $turma->ano }} {{ str_replace(' ', '_', $pessoa->nome) }} {{ str_replace(' ', '_', $nometurma->nome_turma) }} filtro1"
                                                    id="{{ $mat->id }}"
                                                >
                                                    <span href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                                        <div class="d-flex w-100 justify-content-between">
                                                            <h5 class="mb-1">{{ $pessoa->nome }}</h5>
                                                            <small>
                                                                @permission('criar-matricula')
                                                                    <a href="{{ route('matricula.edit', $mat->id)}}">
                                                                        <i class="fa fa-pencil icon text-success" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="{{ route('matricula.show', $mat->id)}}">
                                                                        <i class="fa fa-eye icon text-success" aria-hidden="true"></i>
                                                                    </a>
                                                                @endpermission
                                                            </small>
                                                        </div>
                                                        <small>{{ ucfirst($nometurma->nome_turma) }}</small>,
                                                        <small>{{ $turma->ano }}</small>
                                                        <br>
                                                        <small>Data: {{ date('d/m/Y', strtotime($mat->data)) }}</small>
                                                    </span>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </div>
            <br>
            <div><center><button onclick="printDiv('body_regular')" type="button" class="btn btn-outline-info"><?php echo Lang::get('conteudo.print'); ?></button></center></div>
            <br>
        </div>
        @endpermission

        <!-- Listar Matriculas Irregulares -->
        @permission('ver-matriculas-irregulares')
        <div class="col-md-6" style="text-align: left">
            <h4 class="text-danger">
                <?php echo Lang::get('conteudo.listIrregular'); ?>
            </h4> 
            <div class="row">
                <div class="col-md-8">
                    <input
                        type="text"
                        name="selecao_ano" 
                        id="selecao_ano_regular" 
                        class="form-control" 
                        value=""
                        placeholder="Pesquisa"
                        onKeyUp="changeListGroup('.filtro2', this.value);"
                    >
                    </input>  
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-success" onClick="changePesquisa('.filtro2', 'all');" >Todos</button>
                </div>
            </div>
            <br>
            <div class="list-group" id="body_inrregular">
                @foreach($matricula as $mat)
                    <div class="lista">
                        @if($mat->status_matricula_id != 1 && date('Y', strtotime($mat->data)) >= date('Y'))    
                            @foreach(busca_inscricao2($mat->inscricao_id) as $inscricao)<!-- logica é essa. só colocar os campos certos pra impressão e deu-->
                                @foreach(busca_dados($inscricao->dados_inscricao_id) as $dados)
                                    @foreach (busca_pessoa($dados->dados_pessoais_id) as $pessoa)
                                        @foreach (buscar_turma($mat->turma_id) as $turma)
                                            @foreach (buscar_nometurma($turma->nome_turma_id) as $nometurma)
                                            <div 
                                                class="{{ date('d/m/Y', strtotime($mat->data)) }} {{ $turma->ano }} {{ str_replace(' ', '_', $pessoa->nome) }} {{ str_replace(' ', '_', $nometurma->nome_turma) }} filtro2"
                                                id="{{ $mat->id }}"
                                            >
                                                <span href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h5 class="mb-1">{{ $pessoa->nome }}</h5>
                                                        <small>
                                                            @permission('criar-matricula')
                                                                <a href="{{ route('matricula.edit', $mat->id)}}">
                                                                    <i class="fa fa-pencil icon text-success" aria-hidden="true"></i>
                                                                </a>
                                                                <a href="{{ route('matricula.show', $mat->id)}}">
                                                                    <i class="fa fa-eye icon text-success" aria-hidden="true"></i>
                                                                </a>
                                                            @endpermission
                                                        </small>
                                                    </div>
                                                    <small>{{ ucfirst($nometurma->nome_turma) }}</small>,
                                                    <small>{{ $turma->ano }}</small>
                                                    <br>
                                                    <small>Data: {{ date('d/m/Y', strtotime($mat->data)) }}</small>
                                                </span>
                                            </div>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </div>
            <br>
            <div><center><button onclick="printDiv('body_inrregular')" type="button" class="btn btn-outline-info"><?php echo Lang::get('conteudo.print'); ?></button></center></div>
            <br>
        </div>
        @endpermission
    </div>
</section>
@endsection

<script src="/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        paginacao( {{$count}} , 24 );
    });
</script>