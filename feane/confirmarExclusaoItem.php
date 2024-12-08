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
    <title>Cárdapio | Excluir Item</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="dist/css/elisson.css">

</head>
<body>
    <a href="cardapio.php">Voltar</a>
    <h1>Excluir Item</h1>
    <form action="php/crudItem.php?operacao=delete&id=<?php echo $_GET['id'];?>" method="POST">
        <h3>Deseja realmente EXCLUIR?</h3>
        <p>
            <?php echo carregarItem($_GET['id']);?>
        </p>
        <input type="submit" value="Confirmar">
        <a href="cardapio.php"><input type="button" value="Cancelar"></a>
    </form>
</body>
</html>