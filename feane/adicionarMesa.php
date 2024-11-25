<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Mesa | Mesa</title>
    <link rel="stylesheet" type="text/css" href="dist/css/elisson.css" />
    <link rel="stylesheet"  href="dist/css/cssBotao.css" />
    
    <?php
    include("php/conection.php");
    include("php/funcoes.php");
    //$id1 = $_GET['id'];
    ?>

</head>
<body>

<form action="php/salvarNovamesa.php<?php //echo $_GET["id"];?>" method="POST">
    <a href="mesas.php">Voltar</a>
    <h1>Adicionar Mesa <?php //echo $id1 ?></h1>
        <div class="container" id="additem">
        <p >Capacidade da mesa:  <input type="number" name="nCap">
            <p><input type="submit" value="Salvar"></p>
                            
        </div>
</form>

</body>
</html>