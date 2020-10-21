<?php 
 session_start();


 $link = mysqli_connect("clovis-cartola.czcbeh0esbig.us-east-1.rds.amazonaws.com", "tempera", "Tempera_123", "tempera");



if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else {
        $id = $_SESSION['id_usuario'];
        $query = "delete from tb_lista where id_usuario ={$id}";
        mysqli_query($link,$query);


        foreach($_POST as $ingre){
            $addIngre = "insert into tb_lista (id_usuario, st_nomeIngrediente) values ('{$id}','{$ingre}')";
            mysqli_query($link,$addIngre);           
        };
        header('location:Lista.php');
}

?>