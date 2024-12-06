<?php
session_start();
$idTipoUsuario = $_SESSION['idTipoUsuario'];

include('php/global.php');
$id1 = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar | Mesas</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet"  href="dist/css/cssBotao.css" />

    <style>
        /* Estilos básicos para o modal */
        .modal {
            display: none; /* Escondido por padrão */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<!-- Botão para abrir o modal -->
<button id="openModalBtn">Editar</button>

<!-- Estrutura do modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="php/salvarmesa.php?id=<?php echo $_GET["id"];?>" method="POST">
            <a href="mesas.php">Voltar</a>
            <h1>Mesa <?php echo $id1 ?></h1>
            <p>Ocupação: <input type="number" name="nOcp" min="1" required></p>
            <p><input type="submit" value="Salvar"></p>
        </form>
    </div>
</div>

<script>
    // JavaScript para controlar a abertura e fechamento do modal
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("openModalBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>


