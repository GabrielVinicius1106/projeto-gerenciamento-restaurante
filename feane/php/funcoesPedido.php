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

function carregaPedidosEmAndamento(){

    $lista = '';

    include('conection.php');

    $sql = "SELECT * 
            FROM pedido
            WHERE status_pedido = 'Em andamento';";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        
        //Carrega as linhas do cardápio
        foreach($result as $campo){

            $lista .= '<tr>'
                        .'<td>'.$campo['id_pedido'].'</td>'   
                        .'<td>'.$campo['status_pedido'].'</td>'
                        .'<td>'.$campo['quantidade_pessoas'].'</td>'
                        .'<td>'.$campo['data_pedido'].'</td>'
                        .'<td>'.$campo['mesa_id_mesa'].'</td>'
                    .'</tr>';
        }
    }

    return $lista;
}

function carregaPedidosFechados(){

    $lista = '';

    include('conection.php');

    $sql = "SELECT * 
            FROM pedido
            WHERE status_pedido = 'Fechado';";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        
        //Carrega as linhas do cardápio
        foreach($result as $campo){

            $lista .= '<tr>'
                        .'<td>'.$campo['id_pedido'].'</td>'   
                        .'<td>'.$campo['status_pedido'].'</td>'
                        .'<td>'.$campo['quantidade_pessoas'].'</td>'
                        .'<td>'.$campo['data_pedido'].'</td>'
                        .'<td>'.$campo['mesa_id_mesa'].'</td>'
                    .'</tr>';
        }
    }

    return $lista;
}

function carregaMesas(){

    $lista = '<option value="">Selecione</option>';

    include('conection.php');

    $sql = "SELECT * 
            FROM mesa;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        
        //Carrega as linhas da tabela mesas
        foreach($result as $campo){

            $lista .= '<option value="'.$campo['id_mesa'].'">Mesa &nbsp;'.$campo['id_mesa'].'</option>';
        }
    }

    return $lista;
}

function carregaPedido($idMesa){
    
    include('conection.php');

    $list = '';

    $sql = "SELECT * FROM pedido WHERE mesa_id_mesa = $idMesa
            AND status_pedido = 'Em andamento';";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {
        
        foreach ($result as $campo){
            $list .= '<tr>'
                    .'<td>'.$campo['id_pedido'].'</td>'
                    .'<td>'.$campo['status_pedido'].'</td>'
                    .'<td>'.$campo['quantidade_pessoas'].'</td>'
                    .'<td>'.$campo['data_pedido'].'</td>'
                    .'<td>'.$campo['mesa_id_mesa'].'</td>'
                    .'</tr>';
        }
    }

    return $list;
}

function carregaItensPedido($idPedido){

    $list = '';

    include('conection.php');

    $sql = "SELECT * FROM pedido_item WHERE pedido_id_pedido = $idPedido;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {
        
        $list = '<h1>ITENS</h1>
             <tr>
                <th>ID do Pedido_Item</th>
                <th>Quantidade de Itens</th>
                <th>Observação</th>
                <th>ID do Pedido</th>
                <th>ID do Item</th>
             </tr>';

        foreach ($result as $campo){
            
            $list .= '<tr>'
                    .'<td>ID do Pedido-Item:'.$campo['id_pedido_item'].'</td>'
                    .'<td>Quantidade de Itens:'.$campo['quantidade_itens'].'</td>'
                    .'<td>Observação:'.$campo['obs_item'].'</td>'
                    .'<td>ID do Pedido:'.$campo['pedido_id_pedido'].'</td>'
                    .'<td>ID do Item:'.$campo['item_id_item'].'</td>'
                    .'</tr>';
        }
    }

    return $list;


}

function getIdPedido($idMesa){

    include('conection.php');

    $idPedido = 0;

    $sql = "SELECT id_pedido FROM pedido WHERE mesa_id_mesa = $idMesa";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){

        foreach($result as $campo){
            $idPedido = $campo['id_pedido'];
        }
    }

    return $idPedido;

}

function criarPedido($idMesa, $ocp){

    include('conection.php');

    $sql = "SELECT * FROM pedido WHERE mesa_id_mesa = $idMesa";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) >= 0){

        include('conection.php');

        $sql = "INSERT INTO pedido 
            (`status_pedido`, `quantidade_pessoas`, `data_pedido`, `mesa_id_mesa`) 
            VALUES ( 
                'Em andamento', 
                '".$ocp."', 
                '".date('Y-m-d')."', 
                '".$idMesa."');";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
}

?>