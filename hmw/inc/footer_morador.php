<?php
    /*
    ********** DESCRIÇÃO DO DOCUMENTO *************
    * Nome do ficheiro: footer_morador.php        *
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
                margin-bottom: 10px;
                margin-left: auto;
                margin-right: auto;
            }

            .card-2 {
                display: inline-block;
                width: 49.8%;
                margin-bottom: 10px;
                margin-left: auto;
                margin-right: auto;
                float: right;
            }

        </style>
    </head>
    <body>
        <?php 
            include('basededados.php');
            include('guardarid_casa.php');

            $id_admin = $db->query("SELECT id_admin FROM casas WHERE id_casas = ".$casa_id."")->fetch();
            $info = $db->query("SELECT * FROM administradores WHERE id_admin = ".$id_admin['id_admin']."")->fetch();
            $infocasa = $db->query("SELECT * FROM casas WHERE id_casas = ".$casa_id."")->fetch();

            //QUANTAS PESSOAS ESTÃO NUMA CASA
            $npc = $db->query("SELECT COUNT(*) as n_linhas FROM quartos WHERE id_casas = ".$casa_id."")->fetch();
            $n_quartos = $npc['n_linhas'];
            $n_pessoas_casa=0;

            for ($i=1; $i <= $n_quartos; $i++) { 

                $infoquartos = $db->query("SELECT * FROM quartos WHERE id_casas = ".$casa_id." AND n_quarto_casa = ".$i."")->fetch();

                //n pessoas no quarto
                $n_pessoas = $db->query("SELECT COUNT(*) as n_pessoas FROM pessoas WHERE id_quartos = ".$infoquartos['id_quartos']." AND eliminado = 0")->fetchColumn();
              

                for ($x=1; $x <= $n_pessoas; $x++) { 

                    $n_pessoas_casa++;
                
                }

            }
            
        ?>
        <footer>
            <form>
                <div class="card-deck">
                    <div class="card">
                        <h5 class="card-header text-white">Administrador</h5>
                        <div class="card-body bg-light">
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
                        <h5 class="card-header text-white">Casa<span class="badge badge-warning" data-toggle="tooltip" data-placement="left" title="Número de Identificação da Casa">Nº <?php echo $infocasa['id_casas'] ?></span></h5>
                        <div class="card-body bg-light">
                            <h5 class="card-title"><?php echo $infocasa['morada'] ?></h5>
                            <p class="card-text">
                                Número de Quartos <span class="badge badge-primary badge-pill"><?php echo $n_quartos ?></span>
                                <br>
                                Número de Pessoas <span class="badge badge-primary badge-pill"><?php echo $n_pessoas_casa ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        <footer>
    </body>
</html>