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

<h1> Relatórios </h1>
<div class="row">
    <select class="form-control col-md-4" name="report" id="report">
        <option value="vazio">Selecione o tipo de relatório</option>
        @foreach($reports as $report)
            <option value="{{ $report->id }}"> {{ $report->nome }} </option>
        @endforeach
    </select>
</div>
<div id="selects" class="row">
</div>
<form action="" id="form">
    <h4> Filtros </h1>
    <div class"list-group" id="list">
        
    </div>
</form>

@endsection

<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/js/jsrender.min.js"></script>
<script>
    cont = 0;

    $(document).ready(function(){
        $('#report').on('change', function(e){
            id = e.target.value;
            if(id != 'vazio'){
                if($('#column').length){
                    console.log('sim');
                    excluir('column');
                    $('#list').empty();
                }
                select = `
                    <select class="form-control col-md-3" name="column" id="column">
                        <option value="vazio"> Selecione o campo </option>
                    </select>
                `;
                $('#selects').empty();
                $('#selects').append(select);
                $.get('/reports/'+id+'/column', function(data, status){
                    //console.log(data);
                    data.forEach(function(item, index){
                        //console.log(item);
                        $('#column').append('<option value="'+item.id+'">'+item.nome+'</option>')
                    });
                });
            }
            else{
                $('#selects').empty();
                $('#list').empty();
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
                $.get('/reports/'+id+'/condition', function(data, status){
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
        $(document).on('click', '#add', function(e){
            condition = $('#condition option:selected');
            input = $('#input');
            column = $('#column option:selected');
            console.log(condition.val());
            console.log(condition.text());
            console.log(input.val());
            //Verificar se ja existe um filtro igual
            $('#list').append(`
                <div class="list-group-item list-group-item-action" id="`+cont+`">
                    `+column.text()+` `+condition.text()+` `+input.val()+` 
                    <button onclick="excluir('`+cont+`')" class="btn btn-outline-danger float-right">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                </div>
            `);
            cont++;
        });
    });

</script>
