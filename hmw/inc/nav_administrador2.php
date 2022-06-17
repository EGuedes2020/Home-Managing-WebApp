<?php
    /*
    ********** DESCRIÇÃO DO DOCUMENTO *************
    * Nome do ficheiro: nav_administrador2.php    *
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

        <style>
        
            .d-flex {
                background-color: #011638;
            }

            a {
                color: white;
            }        

        </style>
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal text-white"><a class="text-white" href="administrador.php">Home Managing WebApp<a></h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <?php
                    include('guardarid_casa.php');

                    if ( $casa_id == 0) {             
                        ?>                     
                            <a class="text-white" href="#">Casa: <?php echo $_GET['n_casa']; ?></a>
                <?php
                    }else{
                ?>
                <a class="text-white" href="#">Casa: <?php echo $casa_id; ?></a>
                    <?php }?>
                <a class="p-2 text-primary" href="index.php">Sair</a>
            </nav>
        </div>
    </body>
</html>