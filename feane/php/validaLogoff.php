<?php 
if(session_status() !== PHP_SESSION_ACTIVE){
  session_start();
}

$_SESSION['logado'] = 0;
$_SESSION['idTipoUsuario'] = 0;
session_destroy();

header('location: ../');

?>