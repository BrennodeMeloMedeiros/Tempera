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
  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Style.css">
    <link rel="stylesheet" type="text/css" href="CSS/SideMenu.css">
    <link rel="stylesheet" type="text/css" href="CSS/Doe.css">
    <script src="JS\Script.js" defer></script>
    <script type="text/javascript" src="JS/Doe.js" defer></script>
    <script src="JS\SideMenu.js" defer></script>
    <title>
        Doe
    </title>

</head>
<body>
    <main id="main">
        <?php 
       include 'SideMenu.php'
       ?>
        
        <content>
        <div class="Name-Page">
            Doe
        </div>



        <div class="Card">
         <?php 
      $command = "select * from tb_ong;";

      $exe = mysqli_query($link,$command);

      if($exe){
         while($row = mysqli_fetch_assoc($exe)){
            echo 
            "<section class='Ong-Painel'>
            <p>".$row['st_nome']."</p>
            <img src='' alt='Sem Imagem' >   
            <div class='Ong-Text'>
               <p> ".utf8_encode($row['st_descricao'])."</p>
            </div>

            <div class='Ong-Button'>
               <a href='". $row['st_link'] ."' class='Blue-Button'> Saiba mais </a>
            </div>
         </section>";
         } 
      }else{
         echo "<h2>Parece que ainda não apoiamos nenhuma ONG =( <span> Não se preocupe, isso irá mudar em breve!</span></h2>";
      }
      }
               

         ?>
   
   
        </content>
    </main>
</body>
</html>