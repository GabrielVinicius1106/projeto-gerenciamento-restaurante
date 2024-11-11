<?php 

$operacao = $_GET['operacao'];
$id = $_GET['id'];
$nomeItem = $_POST['nItem'];
$valorItem = (float)$_POST['nValor'];
$tipoItem = $_POST['nCategoria'];
$disponibilidadeItem = $_POST['nDisponibilidade'];

// var_dump($operacao, $id, $nomeItem, $valorItem, $tipoItem, $disponibilidadeItem);
// die();

if ($operacao == 'insert'){
    //Insert
    $sql = "INSERT INTO item (valor_item, descricao_item, disponibilidade, tipo_item_id_tipo_item)
            VALUES (
                ".$valorItem.",
                '".$nomeItem."',
                ".$disponibilidadeItem.",
                ".$tipoItem."
            );";
} else if ($operacao == 'update'){
    // Update
    $sql = "UPDATE item
            SET valor_item = $valorItem, descricao_item = $nomeItem, disponibilidade = $disponibilidadeItem, tipo_item_id_tipo_item = $tipoItem
            WHERE id_item = $id;";

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