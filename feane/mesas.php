<!DOCTYPE html>
<html lang="pt-br">
<head>
  
    <title>Mesas</title>

    <link rel="stylesheet" href="dist/css/elisson.css" />
    <link rel="stylesheet"  href="dist/css/cssModal.css" />

</head>
<body>
    <?php
     
    //  var_dump($_SESSION['idTipoUsuario']);
    //  die();

     include("php/conection.php");
     include("php/funcoes.php");
    
    ?>
    
    <a href="telainicialAdmin.php">Voltar</a>
    <h1 style="text-align: center;">Mesas</h1>
    <a href="adicionarMesa.php"><input type="button" value="Adicionar Mesa"></a>
    <table id="tableCardapio"> 
        <tr>
            <th>Nr Mesa</th>
            <th>Ocupado</th>
            <th>Reservar</th>
            <th>Editar</th>
            <th>Pedidos</th>
        </tr>
        <?php 
         echo carregaMesa();
         ?>
   </table>

   <!-- SCRIPT PARA MODAL DE MESAS -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="modalForm" action="" method="POST">
                <a href="mesas.php">Voltar</a>
                <h1>Mesa <span id="mesaId"></span></h1>
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
</body>
</html>