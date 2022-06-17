<?php
    /*
    ********** DESCRIÇÃO DO DOCUMENTO *************
    * Nome do ficheiro: index.php                 *
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
        <title>Bem-vindo à Home Managing WebApp</title>
        <meta name="author" content="Ema Guedes e Manuel Morais">
        <meta name="DC.date.created" content="2020-01-20"/>
        <meta name="DC.date.modified" content="2020-01-23"/>
        <meta name="description" content="Aplicação Web que facilita na gestão das despesas da casa">
        <meta name="Keywords" content="despesas, despesas partilhadas, casas partilhadas, casas estudantes, gestão de casas, casas, apartamentos, apartamentos partilhados, gestão de apartamentos">
        <?php 
            $text = 0;
            $var_str = var_export($text, true);
            $var = "<?php\n\n\$id = $var_str;\n\n?>";
            file_put_contents('guardarid.php', $var);
        ?>
        <style>

            body{
                background-color: #011638;
            }

            h3 {
                margin-bottom: 23px;
            }

            .col {
                margin: 15px;
                border-radius: 3px;
            }

            .logo {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 40%;
                min-width: 500px;
            }

            .form-check {
                margin-bottom: 16px;
            }

        </style>
    </head>
    <body>
        <img  class="logo" src="imagens\logo.png" alt="Home Managing WebApp">
        <div class="container px-lg-5">
            <div class="row mx-lg-n5">
                <div class="col py-3 px-lg-5 border bg-light">
                    <form method="post" action="login_adm_mysql.php">
                        <h3>Entrar como Administrador</h3>
                        <div class="input-group mb-3">
                            <input name="id" type="number" class="form-control" placeholder="Número de identificação" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="form-group">
                            <input name="pass" type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Senha" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>
                <div class="col py-3 px-lg-5 border bg-light">
                    <form method="post" action="login_user_mysql.php">
                        <h3>Entrar na casa</h3>
                        <div class="input-group mb-3">
                            <input name="id" type="number" class="form-control" placeholder="Número de identificação da casa" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="form-group">
                            <input name="pass" type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Senha" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
        <form method="post" action="registar_mysql.php">
            <div class="container px-lg-5">
                <div class="row mx-lg-n5">
                    <div class="col py-3 px-lg-5 border bg-light">
                        <h3>Registe-se como Administrador</h3>
                        <div class="input-group mb-3">
                            <input name="nome" type="text" class="form-control" placeholder="Nome" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        </div>
                        <div class="input-group mb-3">
                            <input name="datanascimento" type="date" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Data de Nascimento</span>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="Masculino" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Masculino
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="Feminino">
                            <label class="form-check-label" for="exampleRadios2">
                                Feminino
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="Outro Sexo">
                            <label class="form-check-label" for="exampleRadios2">
                                Outro
                            </label>
                        </div>
                        <div class="input-group mb-3">
                            <input name="nif" type="number" class="form-control" placeholder="NIF" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        </div>
                        <div class="input-group mb-3">
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <div class="input-group mb-3">
                            <input name="tel" type="text" class="form-control" placeholder="Telemóvel ou Telefone" aria-label="Telemóvel ou Telefone" aria-describedby="basic-addon2">
                        </div>
                        <input name="password" type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Senha do Administrador" required>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            A senha criada pode ter no máximo 16 caracteres.
                        </small>
                        <br>
                        <button type="submit" class="btn btn-primary">Registe-se</button>
                    </div>
                </div>
            </div>
        </form>
        <br>
    </body>
</html>