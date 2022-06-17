<?php 

    //Conectar à base de dados
    include('basededados.php');
    
    //VERIFICAR O LOGIN
    include('guardarid.php');
    include('guardarid_casa.php');
    include('guardarid_quarto.php');
    if ($id == '0') {
        header("Location: index.php");
    }

    $data = [
        'nome' => $_REQUEST['nome'],
        'datanascimento' => $_REQUEST['datanascimento'],
        'sexo' => $_REQUEST['sexo'],
        'id' => $_REQUEST['id'],
        'email' => $_REQUEST['email'],
        'tel' => $_REQUEST['tel'],
        'nif' => $_REQUEST['nif'],
    ];
    $sql = "UPDATE pessoas SET nome = :nome, datanascimento = :datanascimento, nif = :nif, tel = :tel, sexo = :sexo, email = :email WHERE id_pessoas = :id;";
    $stmt= $db->prepare($sql);
    $stmt->execute($data);

    if ($stmt->rowCount() == 1) {
       header("Location: administrador3.php");
    } else {
        echo "<div class='alert alert-danger' role='alert'>Não foi possivel editar o quarto, tente outra vez!</div>";
    }

?>