<?php 
session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: index.php");
    exit;
    
};
$type = $_GET['type'];
if($type='Tag'){
    $filtro = $_GET['Tag'];
    header('location:Home.php?Tag='.$filtro);
}else if($type = 'Geladeira'){
select * from vw_ver_receitas_geladeira;
}else{
    header('location:Home.php')
}
?>