<?php 

    //Conectar à base de dados
    include('basededados.php');
    
    //VERIFICAR O LOGIN
    include('guardarid.php');
    include('guardarid_casa.php');
    if ($id == '0') {
        header("Location: index.php");
    }

    $data = [
        'morada' => $_REQUEST['morada'],
        'pass' => $_REQUEST['pass'],
        'id' => $casa_id
    ];
    $sql = "UPDATE casas SET morada = :morada, senha_casa = :pass WHERE id_casas = :id;";
    $stmt= $db->prepare($sql);
    $stmt->execute($data);

    if ($stmt->rowCount() == 1) {
       header("Location: administrador.php");
       echo $_REQUEST['morada'];
       echo $_REQUEST['pass'];
       echo $casa_id;

    } else {
        echo "<div class='alert alert-danger' role='alert'>Não foi possivel adicionar a pessoa, tente outra vez!</div>";
        echo $_REQUEST['morada'];
        echo $_REQUEST['pass'];
        echo $casa_id;
    }

?>