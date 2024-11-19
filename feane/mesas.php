<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Mesas</title>

    <link rel="stylesheet" type="text/css" href="dist/css/elisson.css" />
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">

    <style>
        /* Estilos básicos para o modal */
        .modal {
            display: none; 
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            color: black;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border-radius: 5px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            text-align: center;
            align-items: center;
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
    <?php
     
     include("php/conection.php");
     include("php/funcoes.php");     

     
    ?>
    
    <a href="telainicialAdmin.php">Voltar</a>
    <h1 style="text-align: center;">Mesas</h1>
    <table id="tableCardapio"> 
      <tr>
         <th>Nr Mesa</th>
         <th>Ocupado</th>
         <th>Reservar</th>
         <th>Editar</th>
      </tr>
      <?php 
         echo carregaMesa();
      ?>
      
   </table>
   <a href="adicionarMesa.php"><input type="button" value="Adicionar Item"></a>


   <div id="myModal" class="modal">
      <div class="modal-content">
         <span class="close">&times;</span>
         <form action="php/salvarmesa.php?id=" method="POST">
            <h1>Mesa</h1>
            <p>Ocupação: <input type="number" name="nOcp" required></p>
            <p><input type="submit" value="Salvar"></p>
            <button type="button" id="deleteBtn">Excluir</button>
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

for (var i = 0; i < btns.length; i++) {
    btns[i].onclick = function () {
        var mesaId = this.getAttribute("data-id");
        mesaIdSpan.textContent = mesaId; // Exibe o ID no título
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
    let currentMesaId = mesaId.textContent;
    window.location = "php/excluirMesa.php?id=" + currentMesaId;
};

   </script>
</body>
</html>