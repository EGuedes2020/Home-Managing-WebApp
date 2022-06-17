<?php 

    //Conectar à base de dados
    include('basededados.php');
     
    //VERIFICAR O LOGIN
    include('guardarid.php');
    if ($id == '0') {
        header("Location: index.php");
    }

    try{
        $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE quartos SET eliminado = 1 WHERE id_quartos = ".$_REQUEST['n_quarto_e']."";
        $stmt= $db->prepare($sql);
        $stmt->execute();
    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
    header("Location: administrador2.php");
    
?>