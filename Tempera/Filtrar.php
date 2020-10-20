<?php 

$pesquisa = $_POST['searchInput'];

if(!$pesquisa){
    header('location:Home.php');
}else{
    $query = '';
};

?>