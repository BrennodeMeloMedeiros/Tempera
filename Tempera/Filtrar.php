<?php 
session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: Index.php");
    exit;
    
};
$type = $_GET['type'];
if($type='Tag'){
    $filtro = $_GET['Tag'];
    header('location:Home.php?Tag='.$filtro);
}
?>