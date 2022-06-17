<?php
    /*
    ********** DESCRIÇÃO DO DOCUMENTO *************
    * Nome do ficheiro: editar_pessoa.php         *
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
        <form method="post" action="editar_pessoa_sql.php">
            <div class="container px-lg-5">
                <div class="row mx-lg-n5">
                    <div class="col py-3 px-lg-5 border bg-light">
                    <?php 
                        include('basededados.php');
                        $infopessoas = $db->query("SELECT * FROM pessoas WHERE id_pessoas = ".$_GET['n_pessoa']."")->fetch();
                    ?>
                    <h3>Editar Pessoa</h3>
                        <div class="input-group mb-3">
                            <input name="id" type="hidden" class="form-control" value="<?php echo $_GET['n_pessoa'] ?>" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        </div>
                        <div class="input-group mb-3">
                            <input name="nome" value="<?php echo $infopessoas['nome'] ?>" type="text" class="form-control" placeholder="Nome" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        </div>
                        <div class="input-group mb-3">
                            <input name="datanascimento" value="<?php echo $infopessoas['datanascimento'] ?>" type="date" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Data de Nascimento</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input name="sexo" type="text" value="<?php echo $infopessoas['sexo'] ?>" class="form-control" placeholder="Sexo" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        </div>
                        <div class="input-group mb-3">
                            <input name="email" value="<?php echo $infopessoas['email'] ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <div class="input-group mb-3">
                            <input name="tel" value="<?php echo $infopessoas['tel'] ?>" type="text" class="form-control" placeholder="Telemóvel ou Telefone" aria-label="Telemóvel ou Telefone" aria-describedby="basic-addon2">
                        </div>
                        <div class="input-group mb-3">
                            <input name="nif" value="<?php echo $infopessoas['nif'] ?>" type="number" class="form-control" placeholder="NIF" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                        <a class="btn btn-secondary" href="administrador3.php" role="button"><img src="imagens\_ionicons_svg_md-arrow-round-back.svg" alt="Remover Casa" class="voltar">Voltar ao Quarto</a>
                        <button type="submit" class="btn btn-primary">Confirmar Edição</button>
                    </div>
                </div>
            </div>
        </form>
        <br>
    </body>
</html>