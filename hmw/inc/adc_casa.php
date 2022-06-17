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

        <style>

            .col {
                margin: 15px;
                border-radius: 3px;
            }
            
            h5 {
                margin-bottom: 15px;
            }

            a:hover {
                text-decoration: none;
            }

            h3 {
                margin-bottom: 23px;
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
        <form method="post" action="adc_casa_mysql.php">
            <div class="container px-lg-5">
                <div class="row mx-lg-n5">
                    <div class="col py-3 px-lg-5 border bg-light">
                        <h3>Adicione uma Casa</h3>
                        <div class="input-group mb-3">
                            <input name="morada" type="text" class="form-control" placeholder="Morada" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        </div>
                        <input name="pass" type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Senha da Casa" required>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            A senha criada pode ter no máximo 16 caracteres.
                            Esta será a senha que os moradores usarão para entrar na casa.
                        </small>
                        <br>
                        <a class="btn btn-secondary" href="administrador.php" role="button"><img src="imagens\_ionicons_svg_md-arrow-round-back.svg" alt="Remover Casa" class="voltar">Voltar às Casas</a>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </div>
            </div>
        </form>
        <br>
    </body>
</html>