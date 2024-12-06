<?php 
session_start();
$idTipoUsuario = $_SESSION['idTipoUsuario'];

if($_GET['idTipoUsuario']){
    $idTipoUsuario = $_GET['idTipoUsuario'];
}   

// var_dump($_SESSION['idTipoUsuario']);
// die();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial | Administração</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">
    <link href="dist/css/cssTelaInicial.css" rel="stylesheet" />
</head>
<body id="bodytelainicial">

    <!-- Alerta criativo -->
    <div id="alert-box" class="alert-box" style="display: none;">
        <div class="alert-content">
            <img src="dist/images/about-img.png" class="alert-img">
            <div class="alert-text">
                <h2>Bem-vindo!</h2>
                <p>Estamos muito felizes de te ver</p>
                <p>Cantina Pizzaria agradece a visita</p>
                <button id="close-alert">Fechar</button>
            </div>
        </div>
    </div>

    <h1>Cantina Pizzaria</h1>
    <section class="slider_section">
        <div class="container1">
            <div class="button-container">
                <div class="btn-item">
                    <button id="btn1" class="btn btn-large"><a href="mesas.php">Mesas</a></button>
                </div>
                <div class="btn-item">
                    <button id="btn2" class="btn btn-large"><a href="pedidosItemCozinha.php">Pedidos de Item | Cozinha</a></button>
                </div>
                <div class="btn-item">
                    <button id="btn2" class="btn btn-large"><a href="pedidosItemCopa.php">Pedidos de Item | Copa</a></button>
                </div>
                <div class="btn-item">
                    <button id="btn3" class="btn btn-large"><a href="cardapio.php">Cardápio</a></button>
                </div>
                <div class="btn-item">
                    <button id="btn4" class="btn btn-large">Caixa</button>
                </div>
                <div class="btn-item">
                    <button id="btn5" class="btn btn-large"><a href="usuarios.php">Usuários</a></button>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Função para verificar se o alerta já foi exibido
        window.onload = function() {
            // Verifica no sessionStorage se o alerta já foi mostrado
            if (!sessionStorage.getItem('alertShown')) {
                setTimeout(function() {
                    document.getElementById('alert-box').style.display = 'block';
                }, 500);  // Exibe o alerta após meio segundo

                // Marca o alerta como exibido na sessão
                sessionStorage.setItem('alertShown', 'true');
            }
        };

        // Fecha o alerta quando o botão é clicado
        document.getElementById('close-alert').onclick = function() {
            document.getElementById('alert-box').style.display = 'none';
        };
    </script>
</body>
</html>