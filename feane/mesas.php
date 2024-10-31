
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesas</title>

    <link rel="stylesheet" href="dist/css/global.css">

</head>
<body>
    <?php
     include("php/funcoes.php");
    ?>
    <a href="telainicial.php">Voltar</a>
    <h1>Mesas</h1>
    <table> 
      <tr>
         <th>Nr Mesa</th>
         <th>Capacidade</th>
         <th>Ocupado</th>
         <th>Editar</th>
      </tr>
      <?php 
         echo carregaMesa();
      ?>
   </table>
</body>
</html>