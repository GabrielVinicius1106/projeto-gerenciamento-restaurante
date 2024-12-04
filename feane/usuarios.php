<?php

include('php/global.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>

<link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="dist/css/elisson.css" />


</head>
<body>
<a href="telaInicialAdmin.php">Voltar</a>
<h1 style="text-align: center;">Usuários</h1>
<a href="adicionarUsuario.php"><input type="button" value="Adicionar Usuario"></a>

<table id="tableCardapio"> 
      <tr>
         <th>Nr Usuario</th>
         <th>Dados</th>
         <th>Cargo</th>
         <th>Login</th>
         <th>Senha</th>
         <th>Editar</th>
      </tr>
      <?php 
         echo carregaUsuario();
      ?>

</body>
</html>