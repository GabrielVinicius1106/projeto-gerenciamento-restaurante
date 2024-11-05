<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }   

    //Funções e conexão por PDO
    include('funcoes.php');
    require_once('conectionPDO.php');

    //Pega o id enviado por GET na URL
    $tipoItem = isset($_GET['tipoItem']) ? $_GET['tipoItem'] : '';
    
    if (! empty($tipoItem)){
        //Monta a lista no banco
        echo getCategoriaItem($tipoItem);
    }

    //Função para montar a lista filtrada
    function getCategoriaItem($idTipo){
        //Conexão PDO
        $pdo = Conectar();

        //Consulta SQL
        $sql = "SELECT ca.descricao_categoria AS Descricao
                FROM tipo_item ti
                INNER JOIN categoria ca
                ON ca.id_categoria = ti.categoria_id_categoria
                WHERE ti.id_tipo_item = $idTipo;";

        //Executar por PDO
        $stm = $pdo->prepare($sql);
        $stm->execute();

        //sleep(1);
        //Converte o resultado em JSON antes de retornar para a página
        echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));        
        
        //Encerra a conexão PDO
        $pdo = null;
    }

?>