<?php
    /*
    ********** DESCRIÇÃO DO DOCUMENTO *************
    * Nome do ficheiro: editar_quarto.php         *
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
            $text = $_GET['n_quarto'];
            $var_str = var_export($text, true);
            $var = "<?php\n\n\$quarto_id = $var_str;\n\n?>";
            file_put_contents('guardarid_quarto.php', $var);
        ?>

        <style>

            a:hover {
                text-decoration: none;
            }

            h3 {
                margin-bottom: 23px;
            }

            .col {
                margin: 15px;
                border-radius: 3px;
            }

            .voltar {
                float: left;
                height: 25px;
                width: auto;
                margin-right: 8px;
            }

        </style>
    </head>
    <body>
        <form method="post" action="editar_quarto_sql.php">
            <div class="container px-lg-5">
                <div class="row mx-lg-n5">
                    <div class="col py-3 px-lg-5 border bg-light">
                    <?php 
                        include('basededados.php');
                        $infoquartos = $db->query("SELECT * FROM quartos WHERE id_quartos = ".$_GET['n_quarto']."")->fetch();
                    ?>
                    <h3>Editar Quarto</h3>    
                    
                        <div class="input-group mb-3">
                            <input name="nome" value="<?php echo $infoquartos['nome'] ?>" type="text" class="form-control" placeholder="Descrição do quarto" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        </div>
                        <div class="input-group mb-3">
                            <input name="preco" value="<?php echo $infoquartos['preço'] ?>" step="0.01" min="0" type="number" class="form-control" placeholder="Preço" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">€</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input name="n_camas" value="<?php echo $infoquartos['n_camas'] ?>" type="number" class="form-control" placeholder="Número de Camas" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        </div>
                        <a class="btn btn-secondary" href="administrador2.php" role="button"><img src="imagens\_ionicons_svg_md-arrow-round-back.svg" alt="Remover Casa" class="voltar">Voltar à Casa</a>
                        <button type="submit" class="btn btn-primary">Adicione</button>
                    </div>
                </div>
            </div>
        </form>
        <br>
    </body>
</html>