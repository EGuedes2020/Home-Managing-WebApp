<?php 

    //Conectar à base de dados
    include('basededados.php');
    
    //VERIFICAR O LOGIN
    include('guardarid.php');
    include('guardarid_casa.php');
   
    $text = $_REQUEST['idad'];
    $var_str = var_export($text, true);
    $var = "<?php\n\n\$id = $var_str;\n\n?>";
    file_put_contents('guardarid.php', $var);

    $data = [
        'nome' => $_REQUEST['nome'],
        'sexo' => $_REQUEST['sexo'],
        'nif' => $_REQUEST['nif'],
        'email' => $_REQUEST['email'],
        'tel' => $_REQUEST['tel'],
        'pass' => $_REQUEST['password'],
        'datan' => $_REQUEST['datanascimento'],
        'id' => $_REQUEST['idad']
    ];
    $sql = "UPDATE administradores SET nome = :nome, senha_admin = :pass, sexo = :sexo, email = :email, nif = :nif, tel = :tel, datanascimento = :datan WHERE id_admin = :id;";
    $stmt= $db->prepare($sql);
    $stmt->execute($data);

    if ($stmt->rowCount() == 1) {
       header("Location: administrador.php");
    } else {
        echo "<div class='alert alert-danger' role='alert'>Não foi possivel editar o administrador, tente outra vez!</div>";
    }

?>