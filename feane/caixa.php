<?php
session_start();
$idTipoUsuario = $_SESSION['idTipoUsuario'];

include('php/global.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <script src="https://kit.fontawesome.com/b33acbe2df.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa | Pedidos</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="dist/css/elisson.css" />

</head>
<body id="bodyCardapio" class="pagina-cardapio">
    <a href="telainicialAdmin.php">Voltar</a>
    <h1>Pedidos Caixa</h1>
    <table id="tableCardapio">
        <thead>
            <tr>
                <th>Status</th>
                <th>ID do Pedido</th>
                <th>Quantidade de Pessoas</th>
                <th>Data do Pedido</th>
                <th>ID da Mesa</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php  echo carregaPedidos(); ?>
        </tbody>    
    </table>
</body>
</html>