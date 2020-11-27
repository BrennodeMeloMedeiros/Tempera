<?php 

$link = mysqli_connect("clovis-cartola.czcbeh0esbig.us-east-1.rds.amazonaws.com", "tempera", "Tempera_123", "tempera");

if(!empty($_POST['ReportOptions']) || !empty($_GET)){
    $idRe = $_GET['idReceita'];
    $idUs = $_GET['idUser'];
    $tipo = $_POST['ReportOptions'];

    $check = "SELECT * FROM tb_denuncias WHERE id_usuario = '$idUs' AND id_receita = '$idRe'";
    $exeCheck = mysqli_query($link,$check);
    if(mysqli_num_rows($exeCheck) == 0){
    $query = "INSERT INTO tb_denuncias (id_usuario, id_receita, st_tipoDenuncia) VALUES ('$idUs','$idRe','$tipo')";
    mysqli_query($link,$query);
    header('location:Agradecimento.php');
    }else{
        header('location:Agradecimento.php');
    }
}else{
    header('location:Home.php');
}
?>