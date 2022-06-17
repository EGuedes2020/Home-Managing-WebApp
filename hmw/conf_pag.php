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
    $sql = "UPDATE despesas SET conf_pago=1 WHERE id_despesas = ".$_REQUEST['n_despesa']."";
    $stmt= $db->prepare($sql);
    $stmt->execute();
    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
    header("Location:historico_desp_admin.php");
?>
