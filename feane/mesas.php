<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Mesas</title>

    <link rel="stylesheet" type="text/css" href="dist/css/elisson.css" />
   
</head>
<body>
    <?php
     include("php/funcoes.php");
    ?>
    <a href="telainicial.php">Voltar</a>
    <h1 style="text-align: center;">Mesas</h1>
    <div class="container">
    <table id="tableCardapio" > 
      <tr>
         <th>Nr Mesa</th>
         <th>Ocupado</th>
         <th>Ocupar</th>
         <th>Fazer pedido</th>
      </tr>
      <?php 
         echo carregaMesa();
      ?>
   </table>
</div>
</body>
</html>
