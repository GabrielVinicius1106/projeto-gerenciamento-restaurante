<?php 

$operacao = $_GET['operacao'];
$id = $_GET['id'];
$nomeItem = $_POST['nItem'];
$valorItem = (float)$_POST['nValor'];
$categoriaItem = $_POST['nCategoria'];
$disponibilidadeItem = $_POST['nDisponibilidade'];

if ($operacao == 'insert'){
    //Insert
    $sql = "INSERT INTO item (valor_item, descricao_item, disponibilidade, tipo_item_id_tipo_item)
            VALUES (
                ".$valorItem.",
                '".$nomeItem."',
                ".$disponibilidadeItem.",
                ".$categoriaItem."
            );";
} else if ($operacao == 'update'){
    // Update
    
} else if ($operacao == 'delete'){
    // Delete
    $sql = "DELETE FROM item
            WHERE id_item = $id;";
}

include('conection.php');

$result = mysqli_query($conn, $sql);
mysqli_close($conn);

header("location: ../cardapio.php");

?>