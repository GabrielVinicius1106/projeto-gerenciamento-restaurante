<?php 

function carregaItensCardapio(){

    $list = '<option value="">Selecione</option>';

    include('conection.php');

    $sql = "SELECT * FROM item WHERE disponibilidade = 1;";
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

function getIdMesa($idPedido){
    
    $add = '';

    $sql = "SELECT mesa_id_mesa FROM pedido WHERE id_pedido = $idPedido;";

    include('conection.php');
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if(mysqli_num_rows($result)){
        foreach($result as $campo){
            $add = '<td>'.$campo['mesa_id_mesa'].'</td>';
        }
    }
    return $add;
}

function carregaPedidosItemCozinha(){
    $list = '';

    $sql =  "SELECT *
            FROM pedido_item pi
            INNER JOIN pedido pd
            ON pd.id_pedido = pi.pedido_id_pedido
            INNER JOIN item it
            ON it.id_item = pi.item_id_item
            INNER JOIN tipo_item ti
            ON ti.id_tipo_item = it.tipo_item_id_tipo_item
            WHERE ti.categoria_id_categoria = 1
            AND pi.status_pedido_item = 'Preparando...'
            AND pd.status_pedido = 'Em andamento'
            ORDER BY pi.hora_pedido_item ASC;";
            
    include('conection.php');

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    // var_dump($result);
    // die();

    if (mysqli_num_rows($result) > 0){
        foreach($result as $campo){
            $list .= '<tr>'
                        .'<td>'.$campo['id_pedido_item'].'</td>';

            $list .= getDescricaoItem($campo['item_id_item']);

            $list .=  '<td>'.$campo['obs_item'].'</td>';

            $list .= getIdMesa($campo['pedido_id_pedido']);

            $list .= '<td>'.$campo['pedido_id_pedido'].'</td>'
                    .'<td>'.$campo['item_id_item'].'</td>'
                    .'<td>'.$campo['status_pedido_item'].'</td>'
                    .'<td><a href="php/concluirPedidoItem.php?idPedidoItem='.$campo['id_pedido_item'].'&origem=cozinha"><button type="button" id="id-marcar-concluido"><i class="fa-solid fa-square-check fa-2xl" style="color: #327bb3;"></i></button></a></td>'
                .'</tr>';
        }
    } else {
        $list = '<script>alert("Não há pedidos de itens da Cozinha!")</script>';
    }

    return $list;
}

function carregaPedidosItemCopa(){
    $list = '';

    $sql =  "SELECT *
            FROM pedido_item pi
            INNER JOIN pedido pd
            ON pd.id_pedido = pi.pedido_id_pedido
            INNER JOIN item it
            ON it.id_item = pi.item_id_item
            INNER JOIN tipo_item ti
            ON ti.id_tipo_item = it.tipo_item_id_tipo_item
            WHERE ti.categoria_id_categoria = 2
            AND pi.status_pedido_item = 'Preparando...'
            AND pd.status_pedido = 'Em andamento'
            ORDER BY pi.hora_pedido_item ASC;";
            
    include('conection.php');

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0){
        foreach($result as $campo){
            $list .= '<tr>'
                        .'<td>'.$campo['id_pedido_item'].'</td>';

            $list .= getDescricaoItem($campo['item_id_item']);

            $list .=  '<td>'.$campo['obs_item'].'</td>';

            $list .= getIdMesa($campo['pedido_id_pedido']);

            $list .=   '<td>'.$campo['pedido_id_pedido'].'</td>'
                      .'<td>'.$campo['item_id_item'].'</td>'
                      .'<td>'.$campo['status_pedido_item'].'</td>'
                      .'<td><a href="php/concluirPedidoItem.php?idPedidoItem='.$campo['id_pedido_item'].'&origem=copa"><button type="button" id="id-marcar-concluido"><i class="fa-solid fa-square-check fa-2xl" style="color: #327bb3;"></i></button></a></td>'
                    .'</tr>';
        }
    } else {
        $list = '<script>alert("Não há pedidos de itens da Copa!")</script>';
    }

    return $list;
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

function getDescricaoItem($idItem){

    $add = '';

    include('conection.php');

    $sql = "SELECT descricao_item FROM item WHERE id_item = $idItem;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result)){
        foreach($result as $campo){
            $add = '<td>'.$campo['descricao_item'].'</td>'; 
        }
    }

    return $add;

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
                <th>Item</th>
                <th>Quantidade de Itens</th>
                <th>Observação</th>
                <th>ID do Item</th>
                <th>Status do Item</th>
             </tr>';
        foreach ($result as $campo){

            $list .= '<tr>';
            
            $list .= getDescricaoItem($campo['item_id_item']);
            
            $list .= '<td>'.$campo['quantidade_itens'].'</td>'
                    .'<td>'.$campo['obs_item'].'</td>'
                    .'<td>'.$campo['item_id_item'].'</td>'
                    .'<td>'.$campo['status_pedido_item'].'</td>'
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

function carregaPedidos(){

    $list = '';

    $sql = "SELECT * FROM pedido;";

    include('conection.php');

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if(mysqli_num_rows($result)){
        foreach($result as $campo){
            $list .= '<tr>'
                        .'<td>'.$campo['status_pedido'].'</td>'
                        .'<td>'.$campo['id_pedido'].'</td>'
                        .'<td>'.$campo['quantidade_pessoas'].'</td>'
                        .'<td>'.$campo['data_pedido'].'</td>'
                        .'<td>'.$campo['mesa_id_mesa'].'</td>';

            if($campo['status_pedido']=='Em andamento'){
                $list .= '<td></td>';
            } else {
                $list .= '<td><a href="acessarPedido.php?idPedido='.$campo['id_pedido'].'"><button type="button">Acessar Pedido</button></a></td>';
            }

                $list .= '</tr>';
        }
    }

    return $list;

}

?>