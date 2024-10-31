<?php 
function carregaCapacidade($id){
    $lista = '';

    include("conection.php");

    $sql = "SELECT capacidade FROM mesa WHERE id_mesa = $id;";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    if(mysqli_num_rows($result) > 0){
        //carrega as linhas
        foreach($result as $campo){
            $lista = $campo['capacidade'];
        }    
    }
    return $lista;
}

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
                        .'<td><a href ="opcoesmesa.php?id='.$campo['id_mesa'].'"><input type="button" value="Editar"></td>
                        '
                    .'</tr>';
        }
    }

    return $lista;
}

function carregaCardapio(){
    
    $lista = '';

    include('conection.php');

    $sql = "SELECT * 
            FROM item;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        
        //Carrega as linhas do cardápio
        foreach($result as $campo){

            if ($campo['disponibilidade'] == 1){
                $disponibilidade = "Disponível";
            } else {
                $disponibilidade = "Indisponível";
            }

            $lista .= '<tr>'
                        .'<td>'.$campo['descricao_item'].'</td>'   
                        .'<td>'.$campo['valor_item'].'</td>'
                        .'<td>'.$disponibilidade.'</td>'
                        .'<td><a href="editarItem.php?id='.$campo['id_item'].'"><input type="button" value="Editar"></a></td>'
                    .'</tr>';
        }
    }

    return $lista;
}

function carregaCategorias(){

    $list = '<select name="nCategoria">
                <option>Selecione</option>';

    include('conection.php');

    $sql = "SELECT *
            FROM tipo_item;";
        
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {
        
        foreach($result as $campo){
            $list .= "<option value='".$campo['id_tipo_item']."'>".$campo['descricao']."</option>";
        }

        $list .= "</select>";

        return $list;
    }
}

function carregaValores($id, $informação){

    $list = '';

    include('conection.php');

    $sql = "SELECT *
            FROM item
            WHERE id_item = ".$id.";";

        
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        
        foreach ($result as $campo){
            
            if ($informação == 'disponibilidade' && $campo[$informação] == 1){
                $list = 'Disponível';
            } else if ($informação == 'disponibilidade' && $campo[$informação] == 0){
                $list = 'Indisponível';
            } else {
                $list = $campo[$informação];
            }

            return $list;
            // var_dump($list);
            // die();
            
        }

    }
}

function getCategoria($id){

    $list = '';

    

}

function carregaCategoriasValores($id, $informação){

    $list = '';

    include('conection.php');

    $sql = "SELECT tipo_item_id_tipo_item
            FROM item
            WHERE id_item = $id;";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        $id_tipo_item = $campo[$informação];
        $list = getCategoria($id_tipo_item);
    }

}
?>