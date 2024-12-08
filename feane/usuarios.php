<?php
if(session_status() !== PHP_SESSION_ACTIVE){
   session_start();
}
$idTipoUsuario = $_SESSION['idTipoUsuario'];

include('php/global.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>

<link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="dist/css/elisson.css" />

</head>
<body>
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
<!-- <a href="telaInicialAdmin.php">Voltar</a> -->
<h1 style="text-align: center;">Usuários</h1>

<table id="tableCardapio"> 
      <tr>
         <th>Usuarios</th>
         <th>Cargo</th>
         <th>Login</th>
         <th>Senha</th>
         <th>Editar</th>
      </tr>
      <?php 
         echo carregaUsuario();
         ?>


<a href="adicionarUsuario.php"><input type="button" class="ajustebotao" value="Adicionar Usuario"></a>
</body>
</html>