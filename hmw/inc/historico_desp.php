<?php
    /*
    ********** DESCRIÇÃO DO DOCUMENTO *************
    * Nome do ficheiro: historico_desp.php        *
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

        if (isset($_GET['n_casa']) == 1) {
            
            $text = $_GET['n_casa'];
            $var_str = var_export($text, true);
            $var = "<?php\n\n\$casa_id = $var_str;\n\n?>";
            file_put_contents('guardarid_casa.php', $var);
            

        }
        include('guardarid_casa.php');
        ?>
        <style>

            main {
                margin: 0px 10px 15px 10px;
            }

        </style>

    </head>
    <body>
        <main>
                <div class="table-responsive table-hover">
                    <table class="table table-bordered"> 
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Moradores</th>
                                <th scope="col">Quarto</th>
                                <th scope="col">Água</th>
                                <th scope="col">Eletricidade</th>
                                <th scope="col">Gás</th>
                                <th scope="col">Internet</th>
                                <th scope="col">Segurança</th>
                                <th scope="col">Limpeza</th>
                                <th scope="col">Data de Publicação</th>
                                <th scope="col">Ultimo de Pagamento</th>
                                <th scope="col">Total a Pagar</th>
                                <th scope="col">Pago</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php   
                            include('basededados.php');
                            $npc = $db->query("SELECT COUNT(*) as n_linhas FROM despesas WHERE id_casas = ".$casa_id."")->fetch();
                            $linhas = $npc['n_linhas'];
                            for ($i=1; $i <= $linhas; $i++) {
                                
                                    $infodespesas = $db->query("SELECT * FROM despesas WHERE id_casas = ".$casa_id." AND n_mesmacasa =".$i."")->fetch();
                                    
                                    if ( $infodespesas['casa_ou_pessoa'] == 0) {
                                        $casaoupessoa = "casa";  
                                        $infocasas = $db->query("SELECT * FROM casas WHERE id_casas= ".$infodespesas['id_casas']."")->fetch();
                                        if ($infocasas['eliminado'] == 0) {      
                                    ?>
                                            <tr class="bg-primary text-white">
                                                <th scope="row"><?php echo $casaoupessoa ?></th>
                                                <td></td>
                                                <td><?php echo $infodespesas['d_agua'] ?></td>
                                                <td><?php echo $infodespesas['d_eletricidade'] ?></td>
                                                <td><?php echo $infodespesas['d_gas'] ?></td>
                                                <td><?php echo $infodespesas['d_net'] ?></td>
                                                <td><?php echo $infodespesas['d_seguranca'] ?></td>
                                                <td><?php echo $infodespesas['d_limpeza'] ?></td>
                                                <td><?php echo $infodespesas['d_data_ins'] ?></td>
                                                <td><?php echo $infodespesas['d_data_pagar'] ?></td>
                                                <td><?php echo $infodespesas['d_total'] ?></td>
                                            </tr>

                                <?php }
                                } else { 
                                     $infopessoas = $db->query("SELECT * FROM pessoas WHERE id_pessoas = ".$infodespesas['id_pessoas']."")->fetch();
                                     $infoquartos = $db->query("SELECT * FROM quartos WHERE id_quartos = ".$infopessoas['id_quartos']."")->fetch();
                                     if ($infopessoas['eliminado'] == 0) {
                                         if ($infoquartos['eliminado'] == 0) {
                                             
                                        
                                     
                                    ?>
                                        
                                <tr>
                                    <th scope="row"><?php echo $infopessoas['nome'] ?></th>
                                    <td><?php echo $infoquartos['preço'] ?>€</td>
                                    <td><?php echo $infodespesas['d_agua'] ?></td>
                                    <td><?php echo $infodespesas['d_eletricidade'] ?></td>
                                    <td><?php echo $infodespesas['d_gas'] ?></td>
                                    <td><?php echo $infodespesas['d_net'] ?></td>
                                    <td><?php echo $infodespesas['d_seguranca'] ?></td>
                                    <td><?php echo $infodespesas['d_limpeza'] ?></td>
                                    <td><?php echo $infodespesas['d_data_ins'] ?></td>
                                    <td><?php echo $infodespesas['d_data_pagar'] ?></td>
                                    <td><?php echo $infodespesas['d_total'] ?></td>
                                    <td><?php
                                                    if ($infodespesas['conf_pago'] == 0) {
                                                ?>
                                                <form id= "<?php $infodespesas['id_despesas']?>" action="conf_pag.php" method="POST"> 
                                                    <input type="hidden" name="n_despesa" value="<?php echo $infodespesas['id_despesas'] ?>">
                                                    <input class="btn btn-primary" role="button" type="submit" value="Confirmar que foi pago">
                                                </form>
                                                <?php
                                                    }else {
                                                        echo "Despesa Paga!";
                                                    }
                                                ?></td>
                                    
                                </tr>
                        
                            <?php  }}}} ?>
                        </tbody>
                    </table>
                </div>
        </main>
    </body>
</html>

