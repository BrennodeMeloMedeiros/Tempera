<?php 
session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: index.php");
    exit;
    
};
$type = $_GET['type'];
if($type =='Tag'){
    $filtro = $_GET['Tag'];
    header('location:Home.php?Tag='.$filtro);
}else if($type == 'search'){
    $search = $_POST['searchInput'];
    header('location:Home.php?search='.$search);
}else if($type == 'inscricoes'){
    header('location:Home.php?inscri=true');
}else{
    header('location:Home.php');
}
?>