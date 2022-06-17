<?php 

    //Conectar à base de dados
    include('basededados.php');
    
    //VERIFICAR O LOGIN
    include('guardarid.php');
    include('guardarid_quarto.php');
    if ($id == '0') {
        header("Location: index.php");
    }

    $npc = $db->query("SELECT COUNT(*) as n_linhas FROM pessoas WHERE id_quartos = ".$quarto_id."")->fetch();
    $n_pessoa = $npc['n_linhas'];

    if ($n_pessoa == 0) {
        $n_finalpessoa = 1;
    } else {
       $n_finalpessoa = ++$n_pessoa;
    }

    //Inserir variaveis do post na tabela da base de dados
    $var = [
        'nome' => $_REQUEST['nome'],
        'datanascimento' => $_REQUEST['datanascimento'],
        'sexo' => $_REQUEST['sexo'],
        'email' => $_REQUEST['email'],
        'tel' => $_REQUEST['tel'],
        'nif' => $_REQUEST['nif'],
        'id_quartos' => $quarto_id,
        'n_pessoa_quarto' => $n_finalpessoa
    ];
    $sql = "INSERT INTO pessoas(nome,datanascimento,sexo,email,tel,nif,id_quartos,n_pessoa_quarto) VALUES(:nome,:datanascimento,:sexo,:email,:tel,:nif,:id_quartos,:n_pessoa_quarto)";
    $stmt= $db->prepare($sql);
    $stmt->execute($var);

    if ($stmt->rowCount() == 1) {
        header("Location: administrador3.php");
    } else {
        echo "<div class='alert alert-danger' role='alert'>Não foi possivel adicionar a pessoa, tente outra vez!</div>";
    }

?>