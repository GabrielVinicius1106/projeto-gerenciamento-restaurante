<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    
<?php
      include("php/conection.php");
      include("php/funcoes.php");
?>

<a href="telainicialAdmin.php">Voltar</a>

<table> 
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
<a href="adicionarUsuario.php"><input type="button" value="Adicionar Usuario"></a>

</body>
</html>