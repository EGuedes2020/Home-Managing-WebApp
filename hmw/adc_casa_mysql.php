<?php 
    //VERIFICAR O LOGIN
    include('guardarid.php');
    if ($id == '0') {
        header("Location: index.php");
    }
  
    //Conectar à base de dados
    include('basededados.php');

    $npc = $db->query("SELECT COUNT(*) as n_linhas FROM casas WHERE id_admin = ".$id."")->fetch();
    $n_casas = $npc['n_linhas'];

    if ($n_casas == 0) {
        $n_final = 1;
        
    } else {
       $n_final = ++$n_casas;
    }


    //Inserir variaveis do post na tabela da base de dados
    $var = [
        'morada' => $_REQUEST['morada'],
        'pass' => $_REQUEST['pass'],
        'n_casas' => $n_final
    ];
    $sql = "INSERT INTO casas(morada,senha_casa,id_admin,n_casa_admin) VALUES(:morada,:pass,".$id.",:n_casas)";
    $stmt= $db->prepare($sql);
    $stmt->execute($var);

    if ($stmt->rowCount() == 1) {
        header("Location: administrador.php");
    } else {
        echo "<div class='alert alert-danger' role='alert'>Não foi possivel adicionar uma casa, tente outra vez!</div>";
    }

?>