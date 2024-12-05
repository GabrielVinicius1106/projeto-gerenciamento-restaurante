<?php

include('php/global.php');
$idMesa = $_GET['id'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opções | Mesa</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="dist/css/elisson.css" />
    <link rel="stylesheet"  href="dist/css/cssBotao.css" />
</head>
<body>

<form action="php/salvarocupacao.php?id=<?php echo $idMesa; ?>" method="POST">
    <a href="mesas.php">Voltar</a>
    <h1>Mesa <?php echo $idMesa ?></h1>
        <div class="container" id="additem">
        <p >Quantidade de pessoas :  <input type="number" name="nInput" min="1" max="<?php echo carregaCapacidade($idMesa);?>" required>
            <p><input type="submit" value="Salvar"></p>                
        </div>
</form>

</body>
</html>
