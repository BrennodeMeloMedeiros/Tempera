<?php 
session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: index.php");
    exit;
    
};
$queryUser = "SELECT * from tb_usuario where id_usuario = {$_SESSION['id_usuario']}";
        $exeUser = mysqli_query($link, $queryUser);
        while($row = mysqli_fetch_assoc($exeUser)){
            $foto = $row['imagePerfil'];
        }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Style.css">
    <link rel="stylesheet" type="text/css" href="CSS/SideMenu.css">
    <link rel="stylesheet" type="text/css" href="CSS/Enviada.css">
    <script src="https://kit.fontawesome.com/69a958c39b.js" crossorigin="anonymous"></script>
    <script src="JS\Script.js" defer></script>
    <script src="JS\SideMenu.js"></script>
    
    <title>
        Adicionar Receitas
    </title>

</head>
<body>
    <main id="main">
    <?php 
       include 'SideMenu.php'
       ?>

        <content>
        <div class="Name-Page">
            Receita Enviada!
        </div>
        <div class='Card'>
            <h2 class='blue'>Sua receita foi enviada!</h2>
            <div class="b">
            <a class='Blue-Button' href='Home.php'>Voltar para a Home</a>
            <a class='Blue-Button' href='AddReceitas.php'>Adicionar mais receitas</a>
            </div>
        </div>
        </content>
    </main>
</body>
</html>