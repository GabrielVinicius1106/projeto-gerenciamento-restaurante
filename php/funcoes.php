<?php 
function carregaMesa(){
    $lista = '';

    include("conection.php");

    $sql = "SELECT * FROM mesa;";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    if(mysqli_num_rows($result) > 0){
        //carrega as linhas
        foreach($result as $campo){
            $lista .= '<tr>'
                        .'<td>'.$campo['id_mesa'].'</td>'
                        .'<td>'.$campo['capacidade'].'</td>'
                        .'<td><input type="checkbox"></td>'
                    .'</tr>';
        }
    }

    return $lista;
}

function carregaCardapio(){
    
    $lista = '';

    include("conection.php");

    $sql = "SELECT * 
            FROM item;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        
        //Carrega as linhas do cardápio
        foreach($result as $campo){
            $lista .= '<tr>'
                        .'<td>'.$campo['descricao_item'].'</td>'   
                        .'<td>'.$campo['valor_item'].'</td>'
                        .'<td><a href="alterarItem.php"><input type="button" value="Alterar"></a></td>'
                        .'<td><input type="button" value="Excluir"></td>'
                    .'</tr>';
        }
    }

    return $lista;
}

?>