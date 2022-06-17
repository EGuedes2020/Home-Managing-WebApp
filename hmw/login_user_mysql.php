<?php 

    //Conectar à base de dados
    include('basededados.php');

    $id = $_REQUEST['id'];
    $pass = $_REQUEST['pass'];

    $query = $db->query("SELECT senha_casa FROM casas WHERE id_casas = ".$id."")->fetch();

    if ($pass == $query['senha_casa']) {

        $text = $id;
        $var_str = var_export($text, true);
        $var = "<?php\n\n\$casa_id = $var_str;\n\n?>";
        file_put_contents('guardarid_casa.php', $var);

        $_SESSION['id'] = $id;

        header("Location: morador.php");
    }else {
        echo "A palavra passe está errada, tente outra vez";
    }

?>