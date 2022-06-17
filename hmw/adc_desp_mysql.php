<?php 
    
    //VERIFICAR O LOGIN
    include('guardarid.php');
    if ($id == '0') {
        header("Location: index.php");
    }

    //Conectar à base de dados
    include('basededados.php');
    include('guardarid_casa.php');
                
            

            $npc = $db->query("SELECT COUNT(*) as n_linhas FROM despesas WHERE id_casas = ".$casa_id." AND id_pessoas IS NULL")->fetch();
            
            $n_quarto = $npc['n_linhas'];

        
            if ($n_quarto == 0) {
                $n_final = 1;
            } else {
            $n_final = ++$n_quarto;
            }

            $npc = $db->query("SELECT COUNT(*) as n_linhasx FROM despesas WHERE id_casas = ".$casa_id."")->fetch();
            
            $n_despcasa = $npc['n_linhasx'];

        
            if ($n_despcasa == 0) {
                $n_finalx = 1;
            } else {
            $n_finalx = ++$n_despcasa;
            }

            //calcular o total das dispesas da casa
            $total = $_REQUEST['agua'] + $_REQUEST['eletricidade'] + $_REQUEST['gas'] + $_REQUEST['internet'] + $_REQUEST['seguranca'] + $_REQUEST['limpeza'];
            //Inserir variaveis do post na tabela da base de dados
            $var = [
                'agua' => $_REQUEST['agua'],
                'eletricidade' => $_REQUEST['eletricidade'],
                'gas' => $_REQUEST['gas'],
                'internet' => $_REQUEST['internet'],
                'seguranca' => $_REQUEST['seguranca'],
                'limpeza' => $_REQUEST['limpeza'],
                'total' => $total,
                'data_desp' => $_REQUEST['data_desp']
            ];
            try{
            $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO despesas(d_total,d_agua,d_gas,d_eletricidade,d_net,d_seguranca,d_limpeza,d_data_pagar,id_casas,n_despesa_pc,n_mesmacasa) VALUES(:total,:agua,:gas,:eletricidade,:internet,:seguranca,:limpeza,:data_desp,".$casa_id.",".$n_final.",".$n_finalx.")";
            $stmt= $db->prepare($sql);
            $stmt->execute($var);
            }catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }


            //QUANTAS PESSOAS ESTÃO NUMA CASA
            $npc = $db->query("SELECT COUNT(*) as n_linhas FROM quartos WHERE id_casas = ".$casa_id."")->fetch();
            $n_quartos = $npc['n_linhas'];
            $n_pessoas_casa=0;

            for ($i=1; $i <= $n_quartos; $i++) { 

                $infoquartos = $db->query("SELECT * FROM quartos WHERE id_casas = ".$casa_id." AND n_quarto_casa = ".$i."")->fetch();

                if ($infoquartos['eliminado'] == 0) {
               
                        //n pessoas no quarto
                        $npc = $db->query("SELECT COUNT(*) as n_pessoas FROM pessoas WHERE id_quartos = ".$infoquartos['id_quartos']."")->fetch();
                        $n_pessoas = $npc['n_pessoas'];

                        
                        for ($x=1; $x <= $n_pessoas; $x++) { 

                            $infopessoas = $db->query("SELECT * FROM pessoas WHERE id_quartos = ".$infoquartos['id_quartos']." AND n_pessoa_quarto = ".$x."")->fetch();
                        
                            if ($infopessoas['eliminado'] == 0) {
                                $n_pessoas_casa++;
                            }    
                        
                        }
                }

            }

            if ($n_pessoas_casa > 0 ) {

                $despesa_total_pessoa = round($total / $n_pessoas_casa,2);
                $despesa_agua_pessoa = round($_REQUEST['agua'] / $n_pessoas_casa,2);
                $despesa_eletr_pessoa = round($_REQUEST['eletricidade'] / $n_pessoas_casa,2);
                $despesa_gas_pessoa = round($_REQUEST['gas'] / $n_pessoas_casa,2);
                $despesa_net_pessoa = round($_REQUEST['internet'] / $n_pessoas_casa,2);
                $despesa_segur_pessoa = round($_REQUEST['seguranca'] / $n_pessoas_casa,2);
                $despesa_limp_pessoa = round($_REQUEST['limpeza'] / $n_pessoas_casa,2);

                
                for ($y=1; $y <= $n_quartos; $y++) { 

                    $infoquartos = $db->query("SELECT * FROM quartos WHERE id_casas = ".$casa_id." AND n_quarto_casa = ".$y."")->fetch();

                    if ($infoquartos['eliminado'] == 0) {

                            $npc = $db->query("SELECT COUNT(*) as n_pessoas FROM pessoas WHERE id_quartos = ".$infoquartos['id_quartos']."")->fetch();
                            $n_pessoas = $npc['n_pessoas'];

                            $npc = $db->query("SELECT COUNT(*) as n_pessoas_neli FROM pessoas WHERE id_quartos = ".$infoquartos['id_quartos']." AND eliminado = 0")->fetch();
                            $n_pessoas_neli = $npc['n_pessoas_neli'];

                            for ($z=1; $z <= $n_pessoas; $z++) { 

                                $infopessoas = $db->query("SELECT * FROM pessoas WHERE id_quartos = ".$infoquartos['id_quartos']." AND n_pessoa_quarto = ".$z."")->fetch();

                                if ($infopessoas['eliminado'] == 0) {

                                    $despesa_total_pessoa += ($infoquartos['preço'] / $n_pessoas_neli);
                                    $npc = $db->query("SELECT COUNT(*) as n_linhas FROM despesas WHERE id_pessoas = ".$infopessoas['id_pessoas']." AND id_casas=".$casa_id."")->fetch();
                                    $n_quarto = $npc['n_linhas'];
                            
                                    $npc = $db->query("SELECT COUNT(*) as n_linhasy FROM despesas WHERE id_casas = ".$casa_id."")->fetch();
            
                                    $n_despcasa = $npc['n_linhasy'];
                        
                                
                                    if ($n_despcasa == 0) {
                                        $n_finaly = 1;
                                    } else {
                                    $n_finaly = ++$n_despcasa;
                                    }

                                    $var = [
                                        'agua' => $despesa_agua_pessoa,
                                        'eletricidade' => $despesa_eletr_pessoa,
                                        'gas' => $despesa_gas_pessoa,
                                        'internet' => $despesa_net_pessoa,
                                        'seguranca' => $despesa_segur_pessoa,
                                        'limpeza' => $despesa_limp_pessoa,
                                        'total' => $despesa_total_pessoa,
                                        'data_desp' => $_REQUEST['data_desp']
                                    ];
                                    try{
                                        $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql = "INSERT INTO despesas(d_total,d_agua,d_gas,d_eletricidade,d_net,d_seguranca,d_limpeza,d_data_pagar,id_casas,casa_ou_pessoa,id_pessoas,n_despesa_pc,n_mesmacasa) VALUES(:total,:agua,:gas,:eletricidade,:internet,:seguranca,:limpeza,:data_desp,".$casa_id.", 1,".$infopessoas['id_pessoas'].",".$n_final.",".$n_finaly.")";
                                        $stmt= $db->prepare($sql);
                                        $stmt->execute($var);
                                    }catch(PDOException $e){
                                            echo $sql . "<br>" . $e->getMessage();
                                    }
                                    $despesa_total_pessoa -= ($infoquartos['preço'] / $n_pessoas_neli);
                                }
                            }
                    }

                }
                if ($stmt->rowCount() == 1) {

                    header("Location: administrador.php");
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Não foi possivel adicionar a despesa, tente outra vez!</div>";
                }
            }
            header("Location: administrador.php");

?>