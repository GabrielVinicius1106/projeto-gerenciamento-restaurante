<?php 

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

include("funcoes.php");

$_SESSION['logado'] = 1;

$login = $_POST["nUsuario"];
$senha = $_POST["nSenha"];

//$_POST - Valor enviado pelo FORM através da propriedade NAME do elemento HTML 
//$_GET - Valor enviado pelo FORM através da URL
//$_SESSION - Variável criada pelo usuário no PHP

include("conection.php");

$sql = "SELECT * FROM usuario 
        WHERE user = '$login' 
        AND senha = '$senha';";

$resultLogin = mysqli_query($conn,$sql);
mysqli_close($conn);

//Validar se tem retorno do BD
if (mysqli_num_rows($resultLogin) > 0) {  
        
    foreach ($resultLogin as $coluna) {
        
        // Armazena o tipo de usuário em uma variável de SESSÃO
        $_SESSION['idTipoUsuario'] = $coluna['tipo_usuario_id_tipo_usuario'];

        // Seleciona com base na variável de SESSÃO
        switch($_SESSION['idTipoUsuario']){
            case 1:
                // Adiminstrador
                header('location: ../telainicialAdmin.php?idTipoUsuario='.$_SESSION['idTipoUsuario']);
                break;
            case 2:
                // Garçom
                header('location: ../telainicialGarcom.php?idTipoUsuario='.$_SESSION['idTipoUsuario']);
                break;
            case 3:
                // Cozinha
                header('location: ../telainicialCozinha.php?idTipoUsuario='.$_SESSION['idTipoUsuario']);
                break;
            case 4:
                // Copa
                header('location: ../telainicialCopa.php?idTipoUsuario='.$_SESSION['idTipoUsuario']);
                break;
            case 5:
                // Caixa
                header('location: ../telainicialCaixa.php?idTipoUsuario='.$_SESSION['idTipoUsuario']);
                break;
            default:
                // ??? 
                header('location: ../index.php');
                break;
        }
        
    }        

} else{
    //Acessar a tela inicial
    header('location: ../index.php');
} 


?>