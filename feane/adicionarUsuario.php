<?php

include('php/global.php');

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuario | Usuarios</title>
    <link rel="stylesheet" type="text/css" href="dist/css/elisson.css" />
    <link rel="stylesheet"  href="dist/css/cssBotao.css" />
</head>
<body>

<form action="php/salvarUsario.php" method="POST">
    <a href="mesas.php">Voltar</a>
    <h1>Adicionar Usuario</h1>
    <div class="container" id="additem">
        <p>Dados pessoais: <input name="nDados" type="text" required></p>
        <p>Tipo de cargo: <input type="number" name="nCargo" required></p>
        <p>Login: <input name="nLogin" type="text" required></p>
        <p>Senha: <input type="number" name="nSenha" required></p>
        <p><input type="submit" value="Salvar"></p>
    </div>
</form>

</body>
</html>