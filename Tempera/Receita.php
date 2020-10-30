<?php 
session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: Index.php");
    exit;
    
};
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Style.css">
    <link rel="stylesheet" type="text/css" href="CSS/Receita.css">
    <link rel="stylesheet" type="text/css" href="CSS/SideMenu.css">
    <script src="JS\Script.js" defer></script>
    <script src="JS\SideMenu.js"></script>
    <title>
        Receita
    </title>

</head>
<body>
    <main id="main">
        <?php 
           include 'SideMenu.php'
       ?>
        <content>
        <div class="Name-Page">
            Receita
        </div>
            <div class="Card">
                <h3>Nome da Receita</h3>
                <img src='' alt='A receita não possui uma imagem =(' id="ImagemReceita"></img>
                <div class="row">
                <div class="col">
                        <p>Tag</p>
                        <span>Salada</span>
                    </div>
                    <div class="col">
                        <p>Nome do autor</p>
                        <span>Brenno de Melo Medeiros</span>
                    </div>
                    <div class="col">
                        <p>Likes</p>
                        <span>678</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Tempo</p>
                        <span>25 min</span>
                    </div>
                    <div class="col">
                        <p>Calorias</p>
                        <span>9999</span>
                    </div>
                    <div class="col">
                        <p>Porções</p>
                        <span>678</span>
                    </div>
                </div>
                <div id="ingredientes">

                </div>
                <div id="Preparo">

        </div>
            </div>
        </content>
    </main>
</body>
</html>
