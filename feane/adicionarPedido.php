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
    <link rel="stylesheet"  href="dist/css/cssBotao.css" />

</head>
<body>
    <a href="pedidos.php">Voltar</a>
    <h1>Criar Pedido</h1>
    <form action="php/crudPedido.php?operacao=insert" method="POST">
      <p>Status do Pedido: 
        <select name="nStatusPedido" id="" required>
          <option value="">Selecione</option>
          <option value="Em andamento">Em andamento</option>
          <option value="Fechado">Fechado</option>
        </select>
      </p>
      <p>Data do Pedido: <input name="nDataPedido" type="date" required></p>
      <p>ID da Mesa 
        <select name="nIdMesa" id="idMesa" required>
          <?php 
             echo carregaMesas();
          ?>
        </select>
      </p>
      <p>Quantidade de Pessoas: <input type="number" min="1" step="1" max="" name="nQuantidadePessoas" required></p>
      <input type="submit" value="Criar">
      <input type="reset" value="Limpar">
      <a href="pedidos.php"><input type="button" value="Cancelar"></a>
    </form>

    <script src="dist/js/jquery-3.4.1.min.js"></script>
    
<script>
  //== Inicialização
  $(document).ready(function() {

    //Lista dinâmica com Ajax

    $('#idMesa').on('change',function(){
			
      //Pega o valor selecionado na lista de Mesas
      var idMesa  = $('#idMesa').val();
      
      //Inicializa a variável para máximo de pessoas
      var maxPessoas = 0;

      //Valida se teve seleção na lista de Mesas
      if(idMesa != "" && idMesa != "0"){
        
        //Vai no PHP consultar capacidade da mesa
        $.getJSON('php/carregaCapacidadeMesa.php?idMesa='+idMesa,
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
        // Sem seleção na lista 1 não consulta
        txtCategoria = '';
        $('#categoriaTipo').html(txtCategoria).show();
      }		
    });
  
  });

</script>

</body>
</html>