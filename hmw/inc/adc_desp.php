<?php
    /*
    ********** DESCRIÇÃO DO DOCUMENTO *************
    * Nome do ficheiro: adc_desp.php              *
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
            $text = $_GET['n_casa'];
            $var_str = var_export($text, true);
            $var = "<?php\n\n\$casa_id = $var_str;\n\n?>";
            file_put_contents('guardarid_casa.php', $var);
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

            h5 {
                margin-bottom: 15px;
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
        <form method="post" action="adc_desp_mysql.php">
            <div class="container px-lg-5">
                <div class="row mx-lg-n5">
                    <div class="col py-3 px-lg-5 border bg-light">
                        <h3>Insira as Despesas da Casa</h3>
                        <p>
                        A despesa mensal do quarto será automaticamene adicionada às despesas de cada pessoa.
                        <br>
                        A data do último dia de pagamento é abrigatória.  
                        </p>
                        <input type="hidden" name="n_casa" value="<?php echo $_GET['n_casa'] ?>">
                        <div class="input-group mb-3">
                            <input name="agua"  type="number" class="form-control" placeholder="Água" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">€</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input name="eletricidade" type="number" class="form-control" placeholder="Eletricidade" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">€</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input name="gas" type="number" class="form-control" placeholder="Gás" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">€</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input name="internet" type="number" class="form-control" placeholder="Internet" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">€</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input name="seguranca" type="number" class="form-control" placeholder="Segurança" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">€</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input name="limpeza" type="number" class="form-control" placeholder="Limpeza" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">€</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input name="data_desp" type="date" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        </div>
                        <a class="btn btn-secondary" href="administrador.php" role="button"><img src="imagens\_ionicons_svg_md-arrow-round-back.svg" alt="Remover Casa" class="voltar">Não adicionar</a>
                        <button type="submit" class="btn btn-primary">Submeta as Despesas</button>
                    </div>
                </div>
            </div>
        </form>
        <br>
    </body>
</html>