<?php
    /*
    ********** DESCRIÇÃO DO DOCUMENTO *************
    * Nome do ficheiro: adc_casa.php              *
    * UC: P2                                      *
    * @author Ema Guedes e Manuel Morais          *
    * @version 2.0                                *
    * Data: Janeiro de 2020                       *
    * Descrição: Projeto Prático Final            *
    ***********************************************
    */
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <link rel="stylesheet" href="style.css">
        <title>Home Managing WebApp</title>
        <?php 
        //VERIFICAR O LOGIN
        include('guardarid.php');
        if ($id == '0') {
            header("Location: index.php");
        }
        ?>
        </head>
    <body>
        <header class="site-header">
            <?php include('inc/nav_administrador1.php'); ?>
        </header>
        <main>
            <?php include('inc/adc_casa.php'); ?>
        </main>
    </body>
</html>