@extends('layouts.app')

@section('content')

<h1 class="text-success"> 
    Visualizar matricula
</h1>

<div class="text-right">
  <a href="{{ route('matricula.edit', $id)}}">
      <i class="fa fa-pencil icon text-success" aria-hidden="true"></i>
  </a>
</div>

<form onkeyup="verifica_submit('validate');" method= "POST" action="{{ route('matricula.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-6">
            <!-- Inscrição -->
            <label for="exampleFormControlInput1">  <?php echo Lang::get('conteudo.registration'); ?>*</label>
            <select name="inscricao_id" class="form-control" disabled>
                @foreach(busca_nome_inscrito() as $inscricao) 
                    <option 
                        value="{{ $inscricao->id }}"
                        <?php 
                            if($matricula->inscricao_id === $inscricao->id)
                                echo 'selected';
                        ?>
                    > {{ $inscricao->nome }} </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <!-- Data -->
            <label for="exampleFormControlInput1"> <?php echo Lang::get('conteudo.dateRegistration'); ?>*</label>
            <input
                value="{{ $matricula->data }}"
                type="date" 
                name="data" 
                size="23" 
                id="data" 
                class="form-control validate"
                onkeyup="verifica_vazio(this.value, this.id);"
                disabled
            />
        </div>

        <!-- Segunda Linha -->
        <div class="col-md-4">
            <!-- Turno -->
            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.shift');?>*</label>
            <select name="turno" class="form-control" disabled>
                <option 
                    value="morning"
                    <?php 
                        if(strcmp($matricula->turno, "morning") === 0)
                            echo 'selected';
                    ?>
                > <?php echo Lang::get('validation.attributes.morning');?>  </option>
                <option 
                    value="afternoon"
                    <?php 
                        if(strcmp($matricula->turno, "afternoon") === 0)
                            echo 'selected';
                    ?>
                > <?php echo Lang::get('validation.attributes.afternoon');?> </option>
            </select>
        </div>
        <div class="col-md-4">
            <!-- Turma -->
            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.turma'); ?>*</label>
            <select name="turma_id" class="form-control" disabled>
                @foreach(busca_turma() as $turma) 
                    <option 
                        value="{{ $turma->id }}"
                        <?php 
                            if($matricula->turma_id === $turma->id)
                                echo 'selected';
                        ?>
                    > {{ $turma->nome_turma }} - {{$turma->ano}} </option><!--aqui tava dando merda pq tava turma_id as turma, dai imprimia a string da função em vez do turma->nome. Assim, imprimia a função toda. Mais algum BO que esqueci -->
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <!-- Status -->
            <label for="exampleFormControlInput1"><?php echo Lang::get('conteudo.status'); ?>*</label>
            <select name="status" class="form-control" disabled>
                @foreach($status as $stat) 
                    <option 
                        value="{{ $stat->id }}"
                        <?php 
                            if($matricula->status_matricula_id === $stat->id)
                                echo 'selected';
                        ?>
                    > {{ $stat->status }}</option>
                @endforeach
            </select>
        </div>
    </div>
</form>

@endsection