<?php 
session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: Index.php");
    exit;
    
};

 $link = mysqli_connect("clovis-cartola.czcbeh0esbig.us-east-1.rds.amazonaws.com", "tempera", "Tempera_123", "tempera");



if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else {
    if($_GET['Funcao'] == 'Salvar'){
        $id = $_SESSION['id_usuario'];
        $query = "delete from tb_geladeira where id_usuario ={$id}";
        mysqli_query($link,$query);

        foreach($_POST as $ingre){
            $addIngre = "insert into tb_geladeira (id_usuario, st_nomeIngrediente) values ('{$id}','{$ingre}')";
            mysqli_query($link,$addIngre);           
        };
    }else if($_GET['Funcao'] == 'Filtrar'){
        $url = 'location:Home.php?';
        foreach($_POST as $Ingre){
            $url = $url.$Ingre."=".$Ingre."&";
        };
        header($url);            
    }else{
        header('location:Geladeira.php');
    }
   //header('location:Geladeira.php');
}

?>