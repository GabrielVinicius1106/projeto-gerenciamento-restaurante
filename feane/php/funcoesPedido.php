<?php 

function carregaItens(){

    $list = '<option value="">Selecione</option>';

    include('conection.php');

    $sql = "SELECT * FROM item;";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    if(mysqli_num_rows($result) > 0){
        
        //Carrega as linhas
        foreach($result as $campo){
            $list .= "<option value='".$campo['id_item']."'>".$campo['descricao_item']."</option>";
        }    
    }
    return $list;

}


?>