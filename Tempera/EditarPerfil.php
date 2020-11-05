<?php 
 session_start();
 if(!isset($_SESSION['id_usuario']))
 {
     header("location: index.php");
     exit;
     
 };

 $link = mysqli_connect("clovis-cartola.czcbeh0esbig.us-east-1.rds.amazonaws.com", "tempera", "Tempera_123", "tempera");
   
 if (!$link) {
     echo "Error: Unable to connect to MySQL." . PHP_EOL;
     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
     exit;
 }else {
     $id = $_SESSION['id_usuario'];

     if(isset($_GET['Sair'])){
         $_SESSION['id_usuario'] = null;
         header('location:index.php');
     };
     $query = "SELECT * from tb_usuario where id_usuario = {$id}";
     $exe = mysqli_query($link, $query);
     
     
     while($row = mysqli_fetch_assoc($exe)){
         
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Style.css">
    <link rel='stylesheet' type='text/css' href='CSS/Perfil.css'>
    <link rel="stylesheet" type="text/css" href="CSS/SideMenu.css">
    <script src="JS\Script.js" defer></script>
    <script src="JS\Perfil.js" defer></script>
    <script src="JS\EditarPerfil.js" defer></script>    
    <script src="JS\SideMenu.js" defer></script>
    <title>
        Editar Perfil
    </title>

</head>
<body>
    <main id="main">
       <?php 
       include 'SideMenu.php'
       ?>
        <content>
        <div class="Name-Page">
            Editar Perfil
        </div>
        <div class='Card'>  
            <form action='#' method='POST' id='saveForm'>
                <div class="Top">
                    <label for='newImage' class="Image">
                        <img id='PImage' src="IMAGENS/Me.jpg" alt="">
                        <input type="file" accept="image/*" onchange='viewNewImage()'id="newImage">
                    </label>
                    <div class='align'>
                        <div class="row Editar" id='row1'>
                            <input type="text" placeholder='<?php echo $row{'st_nome'}; ?>' id='name' >
                            <div class='input'> <?php echo $row{'st_email'}; ?></div>
                        </div>
                        <div class="row" id='row2'>
                            <textarea placeholder='Sua bio' class='Editar' spellcheck='false' maxlength='190' rows='4' ></textarea>
                        </div>
                        <div class="row" id='error'></div>
                    </div>
                </div>
                <div class="Bot">
                
                <div class="Button">
                    <button id='save' form='saveForm' class='Blue-Button'>Salvar Alterações</button>
                </div>
            </form>
        </div>
<?php 
     };
    };
?>
        </content>
    </main>
</body>
</html>