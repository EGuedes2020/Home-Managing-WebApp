<?php 

    $text = $_REQUEST['n_casa'];
    $var_str = var_export($text, true);
    $var = "<?php\n\n\$casa_id = $var_str;\n\n?>";
    file_put_contents('guardarid_casa.php', $var);

    header("Location: administrador2.php");
?>