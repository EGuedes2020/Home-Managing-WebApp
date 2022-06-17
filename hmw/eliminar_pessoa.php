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
        $sql = "UPDATE pessoas SET eliminado = 1 WHERE id_pessoas = ".$_REQUEST['n_pessoa']."";
        $stmt= $db->prepare($sql);
        $stmt->execute();
        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }    
        header("Location: administrador3.php");
?>