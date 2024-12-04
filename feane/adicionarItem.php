<?php 

include('php/global.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cárdapio | Adicionar Item</title>
    <link rel="shortcut icon" href="dist/images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="dist/css/elisson.css">
    <link rel="stylesheet"  href="dist/css/cssBotao.css" />

</head>
<body>
    <a href="cardapio.php">Voltar</a>
    <h1>Adicionar Item</h1>

    <div class="container" id="additem">
      <form action="php/crudItem.php?operacao=insert" method="POST" required>
          <p>Nome: <input type="text" name="nItem" required></p>
          <p>Preço: <input type="number" min="0" step=".01" name="nValor" required></p>
          <p>Tipo de Item: 
              <select name="nTipo" id="tipoItem" required>
                  <?php echo carregaTiposItem();?>
              </select>
          <p>Categoria: 
              <span id="categoriaTipo">
              </span>
          </p>
          <p>Disponível:     
              <input type="checkbox" name="nDisponibilidade">
          </p>
          <input type="submit" value="Adicionar">
          <input type="reset" value="Limpar">
      </form>
    </div>

    <script src="dist/js/jquery-3.4.1.min.js"></script>
    
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

</script>

</body>
</html>