<<<<<<< HEAD
<?php
 
function bdInfo($path)
{
	//arrumar o diretorio do local do arquivo
	$path = '../'.$path;

	// Atribui o conteúdo do arquivo para variável $arquivo
	$arquivo = file_get_contents($path);

	// Decodifica o formato JSON e retorna um Objeto
	$json = json_decode($arquivo);
	 
	// Retornar as informações do banco de dados
	// Obs: posição 0 é a posição do banco de dados
	return $json[0];
=======
<?php
 
function bdInfo($path)
{
	//arrumar o diretorio do local do arquivo
	$path = '../'.$path;

	// Atribui o conteúdo do arquivo para variável $arquivo
	$arquivo = file_get_contents($path);

	// Decodifica o formato JSON e retorna um Objeto
	$json = json_decode($arquivo);
	 
	// Retornar as informações do banco de dados
	// Obs: posição 0 é a posição do banco de dados
	return $json[0];
>>>>>>> e15b13fc87d3094c1cb5b1a030eddaee0b9133ab
}