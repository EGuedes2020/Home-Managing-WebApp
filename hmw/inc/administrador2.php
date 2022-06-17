<?php
    /*
    ********** DESCRIÇÃO DO DOCUMENTO *************
    * Nome do ficheiro: administrador2.php        *
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

            .voltar {
                float: left;
                height: 25px;
                width: auto;
                margin-right: 8px;
            }

            .icon {
                float: right;
                height: 25px;
                width: auto;
            }

            .entrar {
                float: left;
            }

            .close {
                float: right;
                height: 25px;
                width: auto;
                margin-right: 8px;
                padding-top: 8px;
            }

        </style>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <main>
                 <div class="table-responsive table-hover">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Quarto<a href="adc_quarto.php"><button type="button" class="close" aria-label="Close"><img src="imagens\_ionicons_svg_md-add-circle.svg" alt="Adicionar Quarto" class="icon"></button></a></th>
                                <th scope="col">Preço</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Nº Camas</th>
                                <th scope="col">Nº Pessoas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include('guardarid_casa.php');
                                include('basededados.php');
                                $npc = $db->query("SELECT COUNT(*) as n_linhas FROM quartos WHERE id_casas = ".$casa_id."")->fetch();
                                $linhas = $npc['n_linhas'];
                                for ($i=1; $i <= $linhas; $i++) { 
                            ?>
                                    <?php 
                                    $infoquartos = $db->query("SELECT * FROM quartos WHERE id_casas = ".$casa_id." AND n_quarto_casa = ".$i."")->fetch();
                                    $n_pessoas = $db->query("SELECT COUNT(*) as n_pessoas FROM pessoas WHERE id_quartos = ".$infoquartos['id_quartos']." AND eliminado = 0")->fetch();

                                    if ($infoquartos['eliminado'] == 0) {
                                    ?>

                                    <tr>
                                        <th scope="row">
                                            <form id= "<?php echo $i?>" action="quarto_entrar.php" method="POST" class="entrar" data-toggle="tooltip" data-placement="right" title="Entrar no Quarto"> 
                                                <input type="hidden" name="n_quarto" value="<?php echo $infoquartos['id_quartos'] ?>">
                                                <input class="btn btn-primary" role="button" type="submit" value="<?php echo $i; ?>">
                                            </form>
                                            <form action="eliminar_quarto.php" method="POST" class="close">
                                                <input type="hidden" name="n_quarto_e" value="<?php echo $infoquartos['id_quartos'] ?>">
                                                <input role="button" name="submit" type="image" aria-label="Close" src="imagens\_ionicons_svg_ios-trash.svg" alt="Eliminar Quarto" class="icon" data-toggle="tooltip" data-placement="right" title="Eliminar Quarto"></input>
                                            </form >
                                            <form action="editar_quarto.php" method="GET" class="close">
                                                <input type="hidden" name="n_quarto" value="<?php echo $infoquartos['id_quartos'] ?>">    
                                                <input role="button" name="submit" type="image" aria-label="Close" src="imagens\_ionicons_svg_md-create.svg" alt="Editar Casa" class="icon" data-toggle="tooltip" data-placement="right" title="Editar Quarto"></a>
                                            </form>
                                        </th>
                                        <td><?php echo $infoquartos['preço']; ?>€</td>
                                        <td><?php echo $infoquartos['nome']; ?></td>
                                        <td><?php echo $infoquartos['n_camas']; ?></td>
                                        <td><?php echo $n_pessoas['n_pessoas']; ?></td>                                       
                            <?php }};?>
                        </tbody>
                    </table>
                </div>
            <a class="btn btn-secondary" href="administrador.php" role="button"><img src="imagens\_ionicons_svg_md-arrow-round-back.svg" alt="Remover Casa" class="voltar">Voltar às Casas</a>
        </main>
    </body>
</html>