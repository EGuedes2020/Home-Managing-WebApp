<?php
    /*
    ********** DESCRIÇÃO DO DOCUMENTO *************
    * Nome do ficheiro: administrador3.php        *
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
                                <th scope="col">Pessoa<a href="adc_pessoa.php"><button type="button" class="close" aria-label="Close"><img src="imagens\_ionicons_svg_md-add-circle.svg" alt="Adicionar Pessoa" class="icon"></button></a></th>
                                <th scope="col">Nome</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Data de Nascimento</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telemóvel ou Telefone</th>
                                <th scope="col">NIF</th>
                                <th scope="col">Quarto</th>
                                <th scope="col">Despesas</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                include('guardarid_quarto.php');
                                include('basededados.php');
                                $npc = $db->query("SELECT COUNT(*) as n_linhas FROM pessoas WHERE id_quartos = ".$quarto_id."")->fetch();
                                $linhas = $npc['n_linhas'];
                                for ($i=1; $i <= $linhas; $i++) { 
                                ?>
                                        <?php 
                                            $infopessoas = $db->query("SELECT * FROM pessoas WHERE id_quartos = ".$quarto_id." AND n_pessoa_quarto = ".$i."")->fetch();
                                            $npc = $db->query("SELECT COUNT(*) as ult_despesa FROM despesas WHERE id_pessoas = ".$infopessoas['id_pessoas']."")->fetch();
                                            $ult_despesa = $npc['ult_despesa'];
                                            $infoultdespesa = $db->query("SELECT * FROM despesas WHERE id_pessoas = ".$infopessoas['id_pessoas']." AND n_despesa_pc = ".$ult_despesa."")->fetch();
                                            if ($infopessoas['eliminado'] == 0) {
                                        ?>

                                        

                                        <tr>
                                            <th scope="row">
                                                <?php echo $i ?>
                                                <form action="eliminar_pessoa.php" method="POST" class="close">
                                                        <input type="hidden" name="n_pessoa" value="<?php echo $infopessoas['id_pessoas'] ?>">
                                                        <input role="button" name="submit" type="image" aria-label="Close" src="imagens\_ionicons_svg_ios-trash.svg" alt="Eliminar Quarto" class="icon" data-toggle="tooltip" data-placement="right" title="Eliminar Quarto"></input>
                                                </form >
                                                <form action="editar_pessoa.php" method="GET" class="close">
                                                        <input type="hidden" name="n_pessoa" value="<?php echo $infopessoas['id_pessoas'] ?>">    
                                                        <input role="button" name="submit" type="image" aria-label="Close" src="imagens\_ionicons_svg_md-create.svg" alt="Editar Casa" class="icon" data-toggle="tooltip" data-placement="right" title="Editar Quarto"></a>
                                                </form>
                                            </th>
                                            <td><?php echo $infopessoas['nome'] ?></td>
                                            <td><?php echo $infopessoas['sexo'] ?></td>
                                            <td><?php echo $infopessoas['datanascimento'] ?></td>
                                            <td><?php echo $infopessoas['email'] ?></td>
                                            <td><?php echo $infopessoas['tel'] ?></td>
                                            <td><?php echo $infopessoas['nif'] ?></td>
                                            <td><?php echo $quarto_id ?></td>
                                            <td><?php if ($infoultdespesa['d_total'] ==""){
                                                        echo "Não tem despesas!";}else {
                                                            echo $infoultdespesa['d_total'];
                                                        }
                                            ?></td>
                                        
                                           
                                            
                                        </tr>
                                            <?php }} ?>
                            
                        </tbody>
                    </table>
                </div>
           
            <a class="btn btn-secondary" href="administrador2.php" role="button"><img src="imagens\_ionicons_svg_md-arrow-round-back.svg" alt="Remover Casa" class="voltar">Voltar à Casa</a>
        </main>
    </body>
</html>