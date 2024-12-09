<?php 
session_start();
$idTipoUsuario = $_SESSION['idTipoUsuario'];

if($idTipoUsuario != 2){
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial | Garçom</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">
    <link href="dist/css/cssTelaInicial.css" rel="stylesheet" />
    
</head>
<body id="bodytelainicial">

<?php
include 'header.php';
?>

    <!-- Alerta criativo -->
    <div id="alert-box" class="alert-box">
        <div class="alert-content">
            <img src="dist/images/about-img.png" class="alert-img">
            <div class="alert-text">
                <h2>Bem-vindo!</h2>
                <p>Estamos muito felizes de te ver</p>
                <p>Cantina Pizzaria agradeçe a visita</p>
                <button id="close-alert">Fechar</button>
            </div>
        </div>
    </div>
    <a href="php/validaLogoff.php">Sair</a>
    <h1>Cantina Pizzaria</h1>
    <section class="slider_section">
        <div class="container1">
            <div class="button-container">
                <div class="btn-item">
                    <button id="btn1" class="btn btn-large"><a href="mesas.php"><img src="dist/images/mesa-de-jantar.png" class="img-icone" >Mesas</a></button>
                </div>
                <div class="btn-item">
                    <button id="btn2" class="btn btn-large"><a href="pedidosItemCozinha.php"><img src="dist/images/lista-de-controle.png" class="img-icone" >Pedidos de Item | Cozinha</a></button>
                </div>
                <div class="btn-item">
                    <button id="btn2" class="btn btn-large"><a href="pedidosItemCopa.php"><img src="dist/images/lista-de-controle.png" class="img-icone" >Pedidos de Item | Copa</a></button>
                </div>
                <div class="btn-item">
                    <button id="btn3" class="btn btn-large"><a href="cardapio.php"><img src="dist/images/cardapio.png" class="img-icone" >Cardápio</a></button>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Exibe o alerta na tela
        window.onload = function() {
            setTimeout(function() {
                document.getElementById('alert-box').style.display = 'block';
            }, 500);  // Espera meio segundo antes de mostrar o alerta
        };

        // Fecha o alerta quando o botão é clicado
        document.getElementById('close-alert').onclick = function() {
            document.getElementById('alert-box').style.display = 'none';
        };
    </script>

</body>
</html>
