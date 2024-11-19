<?php 

include('php/funcoes.php');
include("php/funcoesPedido.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos | Criar Pedido</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="dist/css/elisson.css">

</head>
<body>
    <a href="pedidos.php">Voltar</a>
    <h1>Criar Pedido</h1>
    <form action="php/crudPedido.php?operacao=insert" method="POST" required>
      <p>Status do Pedido: 
        <select name="nStatusPedido" id="">
          <option value="">Selecione</option>
          <option value="Em andamento">Em andamento</option>
          <option value="Fechado">Fechado</option>
        </select>
      </p>
      <p>Quantidade de Pessoas: <input type="number" min="1" step="1" name="nQuantidadePessoas" required></p>
      <p>Data do Pedido: <input name="nDataPedido" type="date"></p>
      <p>ID da Mesa 
        <select name="nIdMesa" id="">
          <?php 
            echo carregaMesas();
          ?>
        </select>
      </p>
      <input type="submit" value="Criar">
      <input type="reset" value="Limpar">
      <a href="pedidos.php"><input type="button" value="Cancelar"></a>
    </form>

    <!-- <script src="dist/js/jquery-3.4.1.min.js"></script>
    
<script>
  //== Inicialização
  $(document).ready(function() {

    //Lista dinâmica com Ajax

    $('#tipoItem').on('change',function(){
			//Pega o valor selecionado na lista 1
      var tipoItem  = $('#tipoItem').val();
      
      //Prepara a lista 2 filtrada
      var txtCategoria = '';

      //Valida se teve seleção na lista 1
      if(tipoItem != "" && tipoItem != "0"){
        
        //Vai no PHP consultar dados para a lista 2
        $.getJSON('php/carregaCategoriaItem.php?tipoItem='+tipoItem,
        function (dados) {  
          
          //Carrega a primeira option
          txtCategoria = '';                  
          
          //Valida o retorno do PHP para montar a lista 2

          if (dados.length > 0){        
              
            //Se tem dados, monta a lista 2
            $.each(dados, function(i, obj){
                txtCategoria = "&nbsp;&nbsp;"+obj.Descricao;	                            
            })

            // alert(txtCategoria);

            //Marca a lista 2 como required e mostra os dados filtrados					
            $('#categoriaTipo').html(txtCategoria).show();
          }else{
            
            //Não encontrou itens para a lista 2
            txtCategoria = '';
            $('#categoriaTipo').html(txtCategoria).show();
          }
        })                
      }else{
        //Sem seleção na lista 1 não consulta
        txtCategoria = '';
        $('#categoriaTipo').html(txtCategoria).show();
      }		
    });
  
  });

</script> -->

</body>
</html>