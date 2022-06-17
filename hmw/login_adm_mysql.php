<?php 

    //Conectar à base de dados
    include('basededados.php');

    $id = $_REQUEST['id'];
    $pass = $_REQUEST['pass'];

    $query = $db->query("SELECT senha_admin FROM administradores WHERE id_admin = ".$id."")->fetch();

    if ($pass == $query['senha_admin']) {

        $text = $id;
        $var_str = var_export($text, true);
        $var = "<?php\n\n\$id = $var_str;\n\n?>";
        file_put_contents('guardarid.php', $var);

        header("Location: administrador.php");
    }else {
        echo "A palavra passe está errada, tente outra vez";
    };

?>