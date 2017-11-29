
    <?php

   
    if(isset($_POST['cpf']) and isset($_POST['nome'])) {
      
      $a = DB::table('pessoa')->where('cpf', '=', $_POST['cpf'])->get();

      if (!empty($a)) {
        $b = json_decode($a);
        
        echo $a;
      }
    }?>