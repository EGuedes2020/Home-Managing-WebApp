<?php
    /*
    ********** DESCRIÇÃO DO DOCUMENTO *************
    * Nome do ficheiro: administrador.php         *
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

            a:hover {
                text-decoration: none;
            }

            main {
                margin: 0px 10px 15px 10px;
            }

            .icon {
                float: right;
                height: 25px;
                width: auto;
            }

            .close {
                float: right;
                height: 25px;
                width: auto;
                margin-right: 8px;
                padding-top: 8px;
            }

            .entrar {
                float: left;
            }
            
        </style>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <?php 
            include('basededados.php');
            include('guardarid.php');

            $infofetch = $db->query("SELECT * FROM administradores WHERE id_admin = ".$id."");
            $info = $infofetch->fetch();
        ?>
             <main>
                <div class="table-responsive table-hover">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Casa <a href="adc_casa.php"><button type="button" class="close" aria-label="Close" data-toggle="tooltip" data-placement="right" title="Adicionar Casa"><img src="imagens\_ionicons_svg_md-add-circle.svg" alt="Adicionar Casa" class="icon"></button></a></th>
                                <th scope="col">ID da Casa</th>
                                <th scope="col">Morada</th>
                                <th scope="col">Senha da Casa</th>
                                <th scope="col">Despesas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include('guardarid_casa.php');
                                include('basededados.php');
                                $npc = $db->query("SELECT COUNT(*) as n_linhas FROM casas WHERE id_admin = ".$id."")->fetch();
                                $linhas = $npc['n_linhas'];
                                for ($i=1; $i <= $linhas; $i++) { 
                                        $infocasas = $db->query("SELECT * FROM casas WHERE id_admin = ".$id." AND n_casa_admin = ".$i."")->fetch();
                                        
                                        if ($infocasas['eliminado'] == 0) {
  
                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <form id= "<?php echo $i?>" action="casa_entrar.php" method="POST" class="entrar" data-toggle="tooltip" data-placement="right" title="Entrar na Casa"> 
                                                <input type="hidden" name="n_casa" value="<?php echo $infocasas['id_casas'] ?>">
                                                <input class="btn btn-primary" role="button" type="submit" value="<?php echo $i ?>">
                                            </form>
                                            <form action="eliminar_casa.php" method="POST" class="close">
                                                <input type="hidden" name="n_casa_e" value="<?php echo $infocasas['id_casas'] ?>">
                                                <input role="button" name="submit" type="image" aria-label="Close" src="imagens\_ionicons_svg_ios-trash.svg" alt="Eliminar Casa" class="icon" data-toggle="tooltip" data-placement="right" title="Eliminar Casa"></input>
                                            </form>
                                            <form action="editar_casa.php" method="GET" class="close">
                                                <input type="hidden" name="n_casa_e" value="<?php echo $infocasas['id_casas'] ?>">
                                                <input role="button" name="submit" type="image" aria-label="Close" src="imagens\_ionicons_svg_md-create.svg" alt="Editar Casa" class="icon" data-toggle="tooltip" data-placement="right" title="Editar Casa"></a>
                                            </form>
                                        </th>
                                        </form>
                                        <td><?php echo $infocasas['id_casas'] ?></td>
                                        <td><?php echo $infocasas['morada'] ?></td>
                                        <td><?php echo $infocasas['senha_casa'] ?></td>
                                        <td>
                                            <form action="adc_desp.php" method="GET" class="close">
                                                <input id="<?php echo $i ?>" type="hidden" name="n_casa" value="<?php echo $infocasas['id_casas'] ?>">
                                                <input  value="<?php echo $i ?>" role="button" type="image" name="show" aria-label="Closet" data-toggle="tooltip" data-placement="right" title="Adicionar Despesas" src="imagens\_ionicons_svg_md-add-circle.svg" alt="Adicionar Despesas" class="icon"></button></a>
                                            </form>
                                            <form action="historico_desp_admin.php" method="GET" class="close">
                                                <input type="hidden" name="n_casa" value="<?php echo $infocasas['id_casas'] ?>">
                                                <input role="button" type="image" name="submit" aria-label="Closet" data-toggle="tooltip" data-placement="right" title="Ver Despesas" src="imagens\_ionicons_svg_md-eye.svg" alt="Ver Despesas" class="icon"></button></a>
                                            </form>
                                        </td>
                                    </tr>
                             <?php } } ?>
                        </tbody>
                    </table>
                    
                </div>
        </main>
    </body>
</html>