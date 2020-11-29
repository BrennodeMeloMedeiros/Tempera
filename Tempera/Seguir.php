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
    
    $queryConsultarSeguidor = "SELECT * FROM tb_seguir WHERE id_usuario = '$idUser' AND id_seguidor = '$id'";
    $exe = mysqli_query($link, $queryConsultarSeguidor);
    
    if(mysqli_num_rows($exe) > 0){
        $query = "DELETE FROM tb_seguir  WHERE id_usuario = '$idUser' AND id_seguidor = '$id' ";
    }else{
        $query = "INSERT INTO `tempera`.`tb_seguir` (`id_usuario`, `id_seguidor`) VALUES ('{$idUser}', '{$id}');";
    }

    mysqli_query($link,$query);
}

seguir();
$idUser = $_GET['id'];
header("location: PerfilUsuario.php?id=$idUser");
?>