    <?php 

    //Conectar à base de dados
    include('basededados.php');

    //Inserir variaveis do post na tabela da base de dados
    $var = [
        'nome' => $_REQUEST['nome'],
        'datanascimento' => $_REQUEST['datanascimento'],
        'pass' => $_REQUEST['password'],
        'sexo' => $_REQUEST['sexo'],
        'email' => $_REQUEST['email'],
        'tel' => $_REQUEST['tel'],
        'nif' => $_REQUEST['nif']
    ];
    $sql = "INSERT INTO administradores(nome,datanascimento,senha_admin,sexo,email,tel,nif) VALUES(:nome,:datanascimento,:pass,:sexo,:email,:tel,:nif)";
    $stmt= $db->prepare($sql);
    $stmt->execute($var);

    if ($stmt->rowCount() == 1) {
        
        $last_id = $db->lastInsertId();
        $text = $last_id;
        $var_str = var_export($text, true);
        $var = "<?php\n\n\$id = $var_str;\n\n?>";
        file_put_contents('guardarid.php', $var);


        header("Location: administrador.php");

    } else {
        echo "<div class='alert alert-danger' role='alert'>Não foi possivel registar, tente outra vez!</div>";
    }

?>