<?php
    /*
    ********** DESCRIÇÃO DO DOCUMENTO *************
    * Nome do ficheiro: footer_admin.php          *
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
        
	    <link rel="stylesheet" href="style.css">
        <title>Home Managing WebApp</title>

        <style>
            
            footer {
                margin-left: 10px;
                margin-right: 10px;
            }

            .card-header {
                background-color: #011638;
            }

            span {
                float: right;
            }

            .card-1 {
                display: inline-block;
                width: 49.8%;
                min-width: 450px;
                margin-bottom: 10px;
                margin-left: auto;
                margin-right: auto;
            }

            .card-2 {
                display: inline-block;
                width: 49.8%;
                min-width: 450px;
                margin-bottom: 10px;
                margin-left: auto;
                margin-right: auto;
                float: right;
            }

            .close {
                float: right;
                height: 25px;
                width: auto;
            }

        </style>

    </head>
    <body>
    <?php 
    
        include('basededados.php');
        include('guardarid.php');

        $info = $db->query("SELECT * FROM administradores WHERE id_admin = ".$id."")->fetch();
        $countcasas = $db->query("SELECT count(*) FROM casas WHERE id_admin = ".$id." AND eliminado = 0")->fetchColumn();

        
    ?>
        <footer>
            
                <div class="card-deck">
                    <div class="card">
                        <h5 class="card-header text-white">Administrador<span class="badge badge-warning" data-toggle="tooltip" data-placement="right" title="Número de Identificação">Nº <?php echo $id; ?> </span></h5>
                        <div class="card-body bg-light">
                        <form action="editar_admin.php" method="GET" class="close">
                            <input type="hidden" name="id" value="<?php echo $id ?>">    
                            <input role="button" name="submit" type="image"  src="imagens\_ionicons_svg_md-create.svg" alt="Editar Administrador" class="icon" data-toggle="tooltip" data-placement="right" title="Editar Administrador"></a>
                        </form>
                            <h5 class="card-title"><?php echo $info['nome']; ?></h5>
                            <p class="card-text">
                            <?php echo $info['datanascimento']; ?>
                            <br>
                            <?php echo $info['sexo']; ?>
                            <br>
                            <?php echo $info['email']; ?>
                            <br>
                            NIF <span class="badge badge-primary badge-pill"><?php echo $info['nif']; ?></span>
                            <br>
                            Telemóvel/Telefone <span class="badge badge-primary badge-pill"><?php echo $info['tel']; ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <h5 class="card-header text-white">Casas</h5>
                        <div class="card-body bg-light">
                            <h5 class="card-title">Informações Gerais</h5>
                            <p class="card-text">
                                Número de Casas <span class="badge badge-primary badge-pill"><?php echo $countcasas; ?></span>
                                <br>
                                <br>
                                Criadores da WebApp: 
                                <br>
                                    - Manuel Morais
                                <br>
                                    - Ema Guedes
                            </p>
                        </div>
                    </div>
                </div>
           
        <footer>
    </body>
</html>