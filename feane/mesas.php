<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

$idTipoUsuario = $_SESSION['idTipoUsuario'];

if($idTipoUsuario != 1 && $idTipoUsuario != 2 && $idTipoUsuario != 3 && $idTipoUsuario != 4 && $idTipoUsuario != 5){
    header('location: index.php');
}


include('php/global.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  
    <title>Mesas</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="dist/css/elisson.css" />
    <link rel="stylesheet"  href="dist/css/cssModal.css" />
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
    <h1 style="text-align: center;">Mesas</h1>
    <table id="tableCardapio"> 
        <tr>
            <th>Nr Mesa</th>
            <th>Ocupado</th>
            <th>Reservar</th>
            <th>Editar</th>
            <th>Pedidos</th>
        </tr>
        <?php 
         echo carregaMesa($idTipoUsuario);
         ?>
   </table>
   
   <!-- SCRIPT PARA MODAL DE MESAS -->
   <div id="myModal" class="modal">
       <div class="modal-content">
            <span class="close">&times;</span>
            <form id="modalForm" action="" method="POST">
                <a href="mesas.php">Voltar</a>
                <h1 id="h1_modal">Mesa <span id="mesaId"></span></h1>
                <p>Capacidade Total: <input id="inputModal" type="number" name="nOcp" required></p>
                <p><input id="inputModal" type="submit" value="Salvar"></p>
                <button type="button" id="deleteBtn">Desativar Mesa</button>
            </form> 
        </div>
    </div>  
    
    <!-- SCRIPT PARA MODAL -->
    <script>
    // JavaScript para controlar a abertura e fechamento do modal
    // JavaScript para controlar a abertura e fechamento do modal
    
    var modal = document.getElementById("myModal");
    var btns = document.getElementsByClassName("openModalBtn");
    var span = document.getElementsByClassName("close")[0];
    var mesaIdSpan = document.getElementById("mesaId");
    var modalForm = document.getElementById("modalForm");
    var deleteBtn = document.getElementById("deleteBtn");
    let IDMesa;

    for (let i = 0; i < btns.length; i++) {
        btns[i].onclick = function () {
            mesaId = this.getAttribute("data-id");
            mesaIdSpan.textContent = mesaId; // Exibe o ID no título
            IDMesa = mesaId;
            modalForm.action = "php/salvarmesa.php?id=" + mesaId; // Configura a URL do formulário
            modal.style.display = "block"; // Abre a modal
        };
    }

    span.onclick = function () {
        modal.style.display = "none"; // Fecha a modal
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none"; // Fecha a modal ao clicar fora
        }
    };

    // Ação do botão "Excluir"
    deleteBtn.onclick = function () {
        // alert(mesaId.textContent);
        window.location = "php/excluirMesa.php?id=" + IDMesa;
    };
   </script>

<?php 

if($idTipoUsuario == 1){
    echo '<a href="adicionarMesa.php"><input type="button" class="ajustebotao" value="Adicionar Mesa"></a> ';
}

?>
   
</body>
</html>