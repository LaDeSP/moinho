<?php

require_once('funcoes.php');

//Fazer uma consulta no banco de dados blog, na tabela post
$consulta->SELECT("*"); $consulta->FROM('pessoa'); $b = $consulta->FINALIZE();
var_dump($b);
//Fazer um insert no bando de dados blog, na tabela tipo
//$insercao->INSERT('tipo', array('Mudanca')); $insercao->VALUE(array('criação')); $insercao->clean();

//Fazer uma atualização no banco de dados blog, na tabela tipo
//$atualizar->UPDATE('tipo', array('Mudanca')); $atualizar->WHERE(array('id')); $atualizar->VALUE(array('deletado', 33));

//Fazer uma exclusão no banco de dados blog, na tabela tipo
//$deletar->DELETE('tipo'); $deletar->WHERE(array('id')); $deletar->VALUE(array(2));

//Criar uma nova Objeto para fazer a consulta
//$cons = new Consultar();
//var_dump($cons);

//Criar uma nova Objeto para fazer a inserção de dados na tabela
//$ins = new Inserir();
//var_dump($ins);

//Criar um novo Objeto para fazer a atualização de dados na tabela
//$atu = new Atualizar();
//var_dump($atu);

//Criar um novo Objeto para fazer a exclusão de dados na tabela
//$del = new Deletar();
//var_dump($del);