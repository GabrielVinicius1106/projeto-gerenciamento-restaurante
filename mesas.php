
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesas</title>
</head>
<body>
    <?php
     include("php/funcoes.php");
    ?>
    <h1>Bem vindo</h1>
    <table border = 1px> 
      <tr>
         <th>id_mesa</th>
         <th>capacidade</th>
         <th>status_mesa</th>
      </tr>
      <?php 
         echo carregamesas();
      ?>
   </table>
</body>
</html>