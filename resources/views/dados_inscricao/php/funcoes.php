<?php

require_once('readJson.php');

function select($path){
	$resultado = SelectMySQL($path);
	$param = array();
	while($row = $resultado->fetch(PDO::FETCH_OBJ)){
		array_push($param, $row);
	}
	return $param;
}

function SelectMySQL($select){
	$info = bdInfo('info.json');
	$user = $info->db_USERNAME;
	$pass = $info->db_PASSWORD;
	$dbh = new PDO('mysql:host='.$info->db_HOST.';dbname='.$info->db_DATABASE, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	return $dbh->query($select);
}

class Consultar{
	public $select = "";

	public function SELECT($in)
	{
		$this->select =  "SELECT ".$in." ";
	}

	public function FROM($from)
	{
		$this->select = $this->select."FROM ".$from." ";
	}

	public function WHERE($where)
	{
		$this->select = $this->select."WHERE ".$where." ";
	}

	public function COMBINE($desc, $table, $collumn1, $collumn2)
	{
		$this->select = $this->select." JOIN ".$table." ON ".$collumn1." = ".$collumn2." ";
	}

	public function FINALIZE()
	{
		$this->select = $this->select.";";
		$query =  select($this->select);
		$this->select = "";
		return $query;
	}
}

class Inserir{

	public $insert = "";
	public $cont = 0;
	public $qntValue = 0;
	public $collumn;
	public $data;

	public function INSERT($table, $collumn)
	{
		$this->collumn = $collumn;
		$this->insert =  "INSERT INTO ".$table." (";
		foreach ($collumn as $key) {
			$this->insert = $this->insert.$key.',';
			$this->cont++;
		}
		$this->insert = substr($this->insert, 0, -1);
		$this->insert = $this->insert.")";
		$this->insert =  $this->insert." VALUES (";
		foreach ($collumn as $key) {
			$this->insert = $this->insert.':'.$key.',';
			$this->cont++;
		}
		$this->insert = substr($this->insert, 0, -1);
		$this->insert = $this->insert.")";
	}

    public function VALUE($values)
    {
      	$info = bdInfo('info.json');
		$user = $info->db_USERNAME;
		$pass = $info->db_PASSWORD;
		$dbh = new PDO('mysql:host='.$info->db_HOST.';dbname='.$info->db_DATABASE, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
		$values = $this->Key($values);
		$dbh->prepare($this->insert)->execute($values);
        unset($dbh);
	}

	public function Key($values)
	{
		$dados = array();
		for ($i = 0; $i < count($this->collumn); $i++) {
			$dados[$this->collumn[$i]] = $values[$i];
		}
		return $dados;
	}

	public function clean()
	{
		$this->insert = '';
		$this->cont = 0;
		$this->qntValue = 0;
	}
}

class Atualizar{
	public $update = '';
	public $cont = 0;
	public $qntValue = 0;
	public $collumn;
	public $where;
	public $data;

	public function UPDATE($table, $collumn)
	{
		$this->collumn = $collumn;
		$this->update =  "UPDATE ".$table." SET ";
		foreach ($collumn as $key) {
			$this->update = $this->update.$key.' = :'.$key.' AND';
			$this->cont++;
		}
		$this->update = substr($this->update, 0, -3);
	}

	public function WHERE($collumn)
	{
		$this->update =  $this->update."WHERE ";
		$this->where = $collumn;
		foreach ($collumn as $key) {
			$this->update = $this->update.$key.' = :'.$key.' AND ';
			$this->cont++;
		}
		$this->update = substr($this->update, 0, -4);
	}
	public function VALUE($values)
    {
      	$info = bdInfo('info.json');
		$user = $info->db_USERNAME;
		$pass = $info->db_PASSWORD;
		$dbh = new PDO('mysql:host='.$info->db_HOST.';dbname='.$info->db_DATABASE, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
		$values = $this->Key($values);
		$dbh->prepare($this->update)->execute($values);
	}
	public function Key($values)
	{
		//var_dump($values);
		$cont = 0;
		$dados = array();
		for ($i = 0; $i < count($this->collumn); $i++) {
			$dados[$this->collumn[$i]] = $values[$i];
			$cont++;
		}
		for ($i = 0; $i < count($this->where); $i++) {
			$dados[$this->where[$i]] = $values[$cont + $i];
		}
		//var_dump($dados);
		return $dados;
	}
}

class Deletar{
	public $delete = "";
	public $cont = 0;
	public $qntValue = 0;
	public $collumn;
	public $where;
	public $data;

	public function DELETE($in)
	{
		$this->delete =  "DELETE FROM ".$in." ";
	}

	public function WHERE($collumn)
	{
		$this->delete =  $this->delete."WHERE ";
		$this->where = $collumn;
		foreach ($collumn as $key) {
			$this->delete = $this->delete.$key.' = :'.$key.' AND ';
			$this->cont++;
		}
		$this->delete = substr($this->delete, 0, -4);
	}
	public function VALUE($values)
    {
      	$info = bdInfo('info.json');
		$user = $info->db_USERNAME;
		$pass = $info->db_PASSWORD;
		$dbh = new PDO('mysql:host='.$info->db_HOST.';dbname='.$info->db_DATABASE, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
		$values = $this->Key($values);
		$dbh->prepare($this->delete)->execute($values);
	}
	public function Key($values)
	{
		//var_dump($values);
		$dados = array();
		for ($i = 0; $i < count($this->where); $i++) {
			$dados[$this->where[$i]] = $values[$i];
		}
		//var_dump($dados);
		return $dados;
	}
}

$consulta = new Consultar();
$insercao = new Inserir();
$atualizar = new Atualizar();
$deletar = new Deletar();