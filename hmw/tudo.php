<?php

    //SEMPRE QUE FOR PARA USAR UMA BASE DE DADOS

            include('basededados.php');

    //COLOCAR ALGUMA COISA NUM FICHEIRO DE TEXTO

            $text = "TEXTO PARA O FICHEIRO";
            $var_str = var_export($text, true);
            $var = "<?php\n\n\$text = $var_str;\n\n?>";
            file_put_contents('NOMEDOFICHEIROTESTE.php', $var);

    //SELECIONAR DE UMA BASE DE DADOS COM VALORES DE UM FORM

            $query = $db->query("SELECT valor FROM tabela WHERE x = z");
            $selectfinal = $query->fetch();
            //selectfinal é agora uma variavel com os valores recebidos do select

    //ATUALIZAR OS VALORES DE UMA BASE DE DADOS

            $data = [
                'name' => $name,
                'surname' => $surname,
                'sex' => $sex,
                'id' => $id,
            ];
            $sql = "UPDATE users SET name=:name, surname=:surname, sex=:sex WHERE id=:id";
            $stmt= $pdo->prepare($sql);
            $stmt->execute($data);

    //INSERIR VALORES NUMA BASE DE DADOS 
    
            $log = $db->prepare('INSERT INTO tabela(valoresnabasededados) VALUES(variaveis)');
            $log->execute();
    
    //IR PARA OUTRA PARTE DO SITE

            header("Location: inicial.php");

        

            <div class="input-group mb-3">
            <select class="form-control" id="exampleFormControlSelect1" name="casa">
                <?php 
                    include('basededados.php');
                    include('guardarid.php');
                    $sql = $db->query("SELECT MAX(id_casas) FROM casas WHERE id_admin = ".$id."")->fetch();
                    $linhas = max($sql);
                    
                    for ($i=1; $i <= $linhas; $i++) { ?>
                    <?php  
                         $query = $db->query("SELECT morada FROM casas WHERE id_admin = ".$id." AND id_casas=".$i."");
                         $morada = $query->fetch();
                         $opc = $morada['morada'];
                    ?>
                    <option value= <?php echo $i; ?> > <?php echo $opc; ?> </option>
                <?php  
                    };
                ?>
?>