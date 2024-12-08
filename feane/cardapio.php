<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}
$idTipoUsuario = $_SESSION['idTipoUsuario'];
    
include('php/global.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="dist/css/elisson.css" />
    
                
    
</head>
<body id="bodyCardapio" class="pagina-cardapio">
        <?php switch($idTipoUsuario){

        case 1:
            echo "<a href='telainicialAdmin.php'>Voltar</a>";
            break;
        case 2: 
            echo "<a href='telainicialGarcom.php'>Voltar</a>";
            break;
        case 3:
            echo "<a href='telainicialCozinha.php'>Voltar</a>";
            break;
        case 4:
            echo "<a href='telainicialCopa.php'>Voltar</a>";
            break;
        case 5:
            echo "<a href='telainicialCaixa.php'>Voltar</a>";
            break;
        default:
            echo "<a href='php/validaLogoff.php'>Voltar para Login</a>";
            break;
        } 
        ?>
    <!-- <a href="telainicialAdmin.php">Voltar</a> -->
    <h1>Cardápio</h1>
    <table id="tableCardapio">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Valor Unitário</th>
                <th>Disponibilidade</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php echo carregaCardapio(); ?>
        </tbody>    
    </table>
    
    <?php 
    
    if($idTipoUsuario == 1){
        echo '<a href="adicionarItem.php"><input class="ajustebotao" type="button" value="Adicionar Item"></a>';
    }
    
    ?>
    
</body>
</html>