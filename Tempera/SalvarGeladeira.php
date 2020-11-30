<?php 
session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: index.php");
    exit;
    
};

 $link = mysqli_connect("clovis-cartola.czcbeh0esbig.us-east-1.rds.amazonaws.com", "tempera", "Tempera_123", "tempera");

function salvar() {
    global $link;
    $id = $_SESSION['id_usuario'];
    $query = "delete from tb_geladeira where id_usuario ={$id}";
    mysqli_query($link,$query);

    foreach($_POST as $ingre){
        $addIngre = "insert into tb_geladeira (id_usuario, st_nomeIngrediente) values ('{$id}','{$ingre}')";
        mysqli_query($link,$addIngre);           
    };
}

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else {
    if($_GET['Funcao'] == 'Salvar'){
      salvar();
    }else if($_GET['Funcao'] == 'Filtrar'){
       salvar();
       header('location:Home.php?type=Filtrar');

    }else{
        header('location:Geladeira.php');
    }
}

?>