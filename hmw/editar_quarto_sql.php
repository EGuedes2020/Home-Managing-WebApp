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
        'preco' => $_REQUEST['preco'],
        'n_camas' => $_REQUEST['n_camas'],
        'id' => $quarto_id
    ];
    $sql = "UPDATE quartos SET nome = :nome, preço = :preco, n_camas = :n_camas WHERE id_quartos = :id;";
    $stmt= $db->prepare($sql);
    $stmt->execute($data);

    if ($stmt->rowCount() == 1) {
       header("Location: administrador2.php");
    } else {
        echo "<div class='alert alert-danger' role='alert'>Não foi possivel editar o quarto, tente outra vez!</div>";
    }

?>