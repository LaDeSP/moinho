<style>
    select{
        margin-left: 10px !important;
    }
    input{
        margin-left: 10px !important;
    }
    button{
        margin-left: 10px !important;        
    }
</style>

@extends('layouts.app')

@section('content')

@if( \Session::has('error') )
    <h3 class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ \Session::get('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </h3>
@endif

<h1 class="text-info"> Relatórios </h1>
<label for="" class="text-secondary"> Escolha um relatório para poder gera-ló.</label>
<div class="row">
    <select class="form-control col-md-4" name="report" id="report">
        <option value="vazio">Selecione o tipo de relatório</option>
        @if( isset($reports) )
            @foreach($reports as $report)
                <option value="{{ $report->id }}"> {{ $report->nome }} </option>
            @endforeach
        @endif
    </select>
</div>

<div id="selects" class="row">
</div>

<div id="campos" class="row">
</div>

<form method= "POST" action="/reports/create" enctype="multipart/form-data" class="row">
    {{ csrf_field() }}
    <div class="col-md-3">
        <select class="form-control" name="tipo_relatorio" id="tipo_relatorio" style="display: inline">
            <option value="0"> CSV </option>
            <option value="1"> PDF </option>
        </select>
    </div>
    <div class="col-md-8">
        <button type="submit" class="btn btn-outline-danger " id="generate_report" disabled> Gerar Relatório </button>    
    </div>   
    <div class="col-md-6">
        <h4> Filtros </h4>
        <label for="" class="text-secondary">Se não houver nenhum filtro adicionado, o relatório será gerado sem filtros.</label>        
        <div class"list-group" id="list"> 
        </div>
    </div>
    <div class="col-md-6">
        <h4> Campos </h4>
        <label for="" class="text-secondary" >Se não houver nenhum campo adicionado, todos os campos apareceram no relatório. A ordem altera o relatório.</label>
        <div class"list-group" id="listCampos">
        </div>
    </div>
</form>

@endsection

<script src="{{ getenv('APP_URL') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ getenv('APP_URL') }}/js/jsrender.min.js"></script>
<script>
    cont = 0;

    $(document).ready(function(){
        $('#report').on('change', function(e){
            id = e.target.value;
            if(id != 'vazio'){
                if($('#column').length){
                    excluir('column');
                }
                $('#list').empty();
                $('#listCampos').empty();
                select = `
                    <label for="" class="text-secondary col-md-12"> Selecione algum campo para poder criar um filtro.</label>
                    <select class="form-control col-md-3" name="column" id="column">
                        <option value="vazio"> Selecione o campo </option>
                    </select>
                `;
                $('#selects').empty();
                $('#selects').append(select);
                $('#list').append('<input name="id_report" class="col-md-3 form-control d-none" value="'+id+'" type="number"/>');                
                $.get('{{ getenv('APP_URL') }}/reports/'+id+'/column', function(data, status){
                    element = $('#column');
                    data.forEach(function(item, index){
                        element.append('<option value="'+item.id+'">'+item.nome+'</option>')
                    });
                });

                select = `
                    <label for="" class="text-secondary col-md-12"> Selecione todos os campos que deseja no relatório.</label>
                    <br>
                    <select class="form-control col-md-3" name="select" id="select">
                        <option value="vazio"> Selecione o campo </option>
                    </select>
                `;
                $('#campos').empty();
                $('#campos').append(select);
                $.get('{{ getenv('APP_URL') }}/reports/'+id+'/column', function(data, status){
                    element = $('#select');
                    data.forEach(function(item, index){
                        element.append('<option value="'+item.id+'">'+item.nome+'</option>')
                    });
                });
                $('#campos').append(`<button id="addCampo" type="submit" class="btn btn-outline-success"> Adicionar </button>`);                
            }
            else{
                $('#selects').empty();
                $('#list').empty();
                $('#listCampos').empty();
                $('#campos').empty();
            }
        });

        $(document).on('change', '#column', function(e){
            id = e.target.value;
            if(id != 'vazio'){
                if($('#condition').length){
                    excluir('condition');
                    excluir('input');
                    excluir('add');
                }
                var select = `
                    <select class="form-control col-md-3" name="condition" id="condition">
                        <option value="vazio"> Selecione a condição </option>
                    </select>
                `;
                $('#selects').append(select);
                $.get('{{ getenv('APP_URL') }}/reports/'+id+'/condition', function(data, status){
                    //console.log(data);
                    var input;
                    data.forEach(function(item, index){
                        //console.log(item);
                        $('#condition').append('<option value="'+item.id+'">'+item.nome+'</option>')
                        input = item.input;
                        //console.log(input);
                    });
                    $('#selects').append('<input class="col-md-3 form-control" id="input" type="'+input+'"/>');
                    $('#selects').append(`<button id="add" type="submit" class="btn btn-outline-danger" disabled> Adicionar </button>`);
                });
                
            }else{
                excluir('condition');
                excluir('input');                
                excluir('add');                
            }
        });

        $('#selects').on('change', function(e){
            condition = $('#condition');
            input = $('#input');
            if(condition.length && input.val() != '' && condition.val() != 'vazio'){
                add = $('#add');
                add.removeAttr('disabled');
                add.removeClass('btn-outline-danger');
                add.addClass('btn-outline-success');
            } else{
                if($('#add').length){
                    add = $('#add');                    
                    add.attr('disabled', '');
                    add.removeClass('btn-outline-success');
                    add.addClass('btn-outline-danger');
                }            
            }
        });

        $('#report').on('change', function(e){
            condition = $('#report');
            if(condition.val() != 'vazio'){
                add = $('#generate_report');
                add.removeAttr('disabled');
                add.removeClass('btn-outline-danger');
                add.addClass('btn-outline-success');
            } else{
                if($('#report').length){
                    add = $('#generate_report');                    
                    add.attr('disabled', '');
                    add.removeClass('btn-outline-success');
                    add.addClass('btn-outline-danger');
                }            
            }
        });

        $(document).on('click', '#add', function(e){
            condition = $('#condition option:selected');
            input = $('#input');
            column = $('#column option:selected');
            data = input.val();
            if(input.attr('type') == 'date'){
                data = new Date(data);
                data = data.getDate()+`/`+( data.getMonth()+1 )+`/`+data.getFullYear();
            }
            $('#list').append(`
                <div class="list-group-item list-group-item-action" id="`+cont+`">
                    `+column.text()+` `+condition.text()+` `+data+` 
                    <button onclick="excluir('`+cont+`')" class="btn btn-outline-danger float-right">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                    <input name="id_conlumn[]" class="col-md-3 form-control d-none" value="`+column.val()+`" type="number"/>
                    <input name="id_condition[]" class="col-md-3 form-control d-none" value="`+condition.val()+`" type="number"/>
                    <input name="input_condition[]" class="col-md-3 form-control d-none" value="`+input.val()+`" type="text"/>
                </div>
            `);
            cont++;
        });

        $(document).on('click', '#addCampo', function(e){
            select = $('#select option:selected');
            $('#listCampos').append(`
                <div class="list-group-item list-group-item-action" id="select`+cont+`">
                    `+select.text()+` 
                    <button onclick="excluir('select`+cont+`')" class="btn btn-outline-danger float-right">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                    <input name="id_select[]" class="col-md-3 form-control d-none" value="`+select.val()+`" type="number"/>
                </div>
            `);
            cont++;
        });
    });

</script>
