<?php 

    $text = $_REQUEST['n_quarto'];
    $var_str = var_export($text, true);
    $var = "<?php\n\n\$quarto_id = $var_str;\n\n?>";
    file_put_contents('guardarid_quarto.php', $var);

    header("Location: administrador3.php");
?>