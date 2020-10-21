<?php 

$type = $_GET['type'];
if($type='Tag'){
    $filtro = $_GET['Tag'];
    header('location:Home.php?Tag='.$filtro);
}
?>