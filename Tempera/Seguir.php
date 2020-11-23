<?php
session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: index.php");
    exit;
    
};

 $link = mysqli_connect("clovis-cartola.czcbeh0esbig.us-east-1.rds.amazonaws.com", "tempera", "Tempera_123", "tempera");

function seguir() {
    global $link;
    $id = $_SESSION['id_usuario'];
    $idUser = $_GET['id'];
    $queryAddFollow = "INSERT INTO `tempera`.`tb_seguir` (`id_usuario`, `id_seguidor`) VALUES ('{$id}', '{$idUser}');";
    mysqli_query($link,$queryAddFollow);
 }
$query = "";
seguir();
$idUser = $_GET['id'];
header("location: PerfilUsuario.php?id=$idUser");
?>