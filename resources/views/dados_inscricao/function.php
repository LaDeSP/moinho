
    <?php
  /**
   * função que devolve em formato JSON os dados do cliente
   */
  function retorna( $cpf, $db )
  {
    $sql = "SELECT `nome`
      FROM `pessoa` WHERE `cpf` = '{$cpf}' ";

    $query = $db->query( $sql );

    $arr = Array();
    if( $query->num_rows )
    {
      while( $dados = $query->fetch_object() )
      {
        $arr['nome'] = $dados->nome;
      }
    }
    else
      $arr['nome'] = 'não encontrado';

    return json_encode( $arr );
  }

/* só se for enviado o parâmetro, que devolve os dados */
/*if( isset($_GET['nome']) )
{
  $db = new mysqli('localhost', 'root', '123', 'test');
  echo retorna( filter ( $_GET['nome'] ), $db );
}

function filter( $var ){
  return $var;//a implementação desta, fica a cargo do leitor
}*/?>