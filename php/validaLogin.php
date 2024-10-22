<?php 

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

include("funcoes.php");

$_SESSION['logado'] = 0;

$login = $_POST["nUsuario"];
$senha = $_POST["nSenha"];

//$_POST - Valor enviado pelo FORM através da propriedade NAME do elemento HTML 
//$_GET - Valor enviado pelo FORM através da URL
//$_SESSION - Variável criada pelo usuário no PHP

include("conection.php");

$sql = "SELECT * FROM usuario "
        ." WHERE login = '$login'"
        ." AND senha = $senha;";

var_dump($sql);
die();

$resultLogin = mysqli_query($conn,$sql);

var_dump($resultLogin);
die();

mysqli_close($conn);




?>