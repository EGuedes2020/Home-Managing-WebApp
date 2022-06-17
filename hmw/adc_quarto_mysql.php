<?php 

    //Conectar à base de dados
    include('basededados.php');
     
    //VERIFICAR O LOGIN
    include('guardarid.php');
    include('guardarid_casa.php');
    if ($id == '0') {
        header("Location: index.php");
    }

    $npc = $db->query("SELECT COUNT(*) as n_linhas FROM quartos WHERE id_casas = ".$casa_id."")->fetch();
    
    $n_quarto = $npc['n_linhas'];

  
    if ($n_quarto == 0) {
        $n_final = 1;
    } else {
       $n_final = ++$n_quarto;
    }

    //Inserir variaveis do post na tabela da base de dados
    $var = [
        'nome' => $_REQUEST['nome'],
        'preco' => $_REQUEST['preco'],
        'n_camas' => $_REQUEST['n_camas'],
        'casa' => $casa_id,
        'n_quarto_casa' => $n_final
    ];
    $sql = "INSERT INTO quartos(nome,preço,n_camas,id_casas,n_quarto_casa) VALUES(:nome,:preco,:n_camas,:casa,:n_quarto_casa)";
    $stmt= $db->prepare($sql);
    $stmt->execute($var);

    if ($stmt->rowCount() == 1) {
        header("Location: administrador2.php");
    } else {
        echo "<div class='alert alert-danger' role='alert'>Não foi possivel adicionar o quarto, tente outra vez!</div>";
    }

?>