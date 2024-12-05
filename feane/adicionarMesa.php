<?php

include('php/global.php');

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Mesa | Mesa</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="dist/css/elisson.css" />
    <link rel="stylesheet"  href="dist/css/cssBotao.css" />
    
</head>
<body>

<form action="php/salvarNovamesa.php" method="POST">
    <a href="mesas.php">Voltar</a>
    <h1>Adicionar Mesa <?php //echo $id1 ?></h1>
        <div class="container" id="additem">
        <p >Capacidade da mesa:  <input type="number" name="nCap" min="1" required>
            <p><input type="submit" value="Salvar"></p>
                            
        </div>
</form>

<h1>Mesas Existentes Inativas</h1>
    <table id="tableCardapio"> 
        <tr>
            <th>ID Mesa</th>
            <th>Capacidade</th>
            <th>Ocupacao</th>
            <th>Ativo</th>
            <th>Ativar</th>
        </tr>
        <?php 
         echo carregaMesasInativas();
         ?>
   </table>

</body>
</html>