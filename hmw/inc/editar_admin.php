<?php
    /*
    ********** DESCRIÇÃO DO DOCUMENTO *************
    * Nome do ficheiro: editar_admin.php          *
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

            h3 {
                margin-bottom: 23px;
            }

            .col {
                margin: 15px;
                border-radius: 3px;
            }

            .form-check {
                margin-bottom: 16px;
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
        <form method="GET" action="editar_admin_sql.php">
            <div class="container px-lg-5">
                <div class="row mx-lg-n5">
                    <div class="col py-3 px-lg-5 border bg-light">
                        <?php 
                            include('basededados.php');
                            $info = $db->query("SELECT * FROM administradores WHERE id_admin = ".$_GET['id']."")->fetch();
                        ?>
                        <h3>Editar Administrador</h3>
                        <div class="input-group mb-3">
                            <input name="idad" type="hidden" class="form-control" value="<?php echo $_GET['id'] ?>" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        </div>
                        <div class="input-group mb-3">
                            <input name="nome" type="text" class="form-control" placeholder="Nome" value="<?php echo $info['nome'] ?>" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        </div>
                        <div class="input-group mb-3">
                            <input name="datanascimento"  value="<?php echo $info['datanascimento'] ?>" type="date" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Data de Nascimento</span>
                            </div>
                        </div>
                        <?php if( $info['sexo']="Masculino") { ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="Masculino" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Masculino
                                </label>
                            </div>
                        <?php }else { ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="Masculino">
                                <label class="form-check-label" for="exampleRadios1">
                                    Masculino
                                </label>
                            </div>
                        <?php }?>
                        <?php if( $info['sexo']="Feminino") { ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="Feminino" checked>
                                <label class="form-check-label" for="exampleRadios2">
                                    Feminino
                                </label>
                            </div>
                        <?php }else { ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="Feminino">
                                <label class="form-check-label" for="exampleRadios2">
                                    Feminino
                                </label>
                            </div>
                        <?php }?>
                        <?php if( $info['sexo']="Outro Sexo") { ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="Outro Sexo" checked>
                            <label class="form-check-label" for="exampleRadios2">
                                Outro
                            </label>
                        </div>
                        <?php }else { ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="Outro Sexo" >
                            <label class="form-check-label" for="exampleRadios2">
                                Outro
                            </label>
                        </div>
                        <?php }?>
                        <div class="input-group mb-3">
                            <input name="nif" value="<?php echo $info['nif']?>" type="number" class="form-control" placeholder="NIF" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        </div>
                        <div class="input-group mb-3">
                            <input name="email" value="<?php echo $info['email']?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <div class="input-group mb-3">
                            <input name="tel" value="<?php echo $info['tel']?>" type="text" class="form-control" placeholder="Telemóvel ou Telefone" aria-label="Telemóvel ou Telefone" aria-describedby="basic-addon2">
                        </div>
                        <input name="password" type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Senha do Administrador" required>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            A senha criada pode ter no máximo 16 caracteres.
                        </small>
                        <br>
                        <a class="btn btn-secondary" href="administrador.php" role="button"><img src="imagens\_ionicons_svg_md-arrow-round-back.svg" alt="Remover Casa" class="voltar">Voltar às Casas</a>
                        <button type="submit" class="btn btn-primary">Confirmar Edição</button>
                    </div>
                </div>
            </div>
        </form>
        <br>
    </body>
</html>