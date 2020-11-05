<?php 
   
   session_start();
   if(!isset($_SESSION['id_usuario']))
   {
       header("location: index.php");
       exit;
       
   };
   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Style.css">
    <link rel='stylesheet' type="text/css" href="CSS/Geladeira.css">
    <link rel="stylesheet" type="text/css" href="CSS/SideMenu.css">
    <script src="JS\Script.js" defer></script>
    <script src="JS\Geladeira.js" defer></script>
    <script src="JS\SideMenu.js" defer></script>


    <title>Geladeira</title>

</head>
<body>
    <main id="main">
        <?php 
       include 'SideMenu.php'
       ?>
        <content>
        <div class="Name-Page">
            Geladeira
        </div>
        <div class="Card">
            <div class='top'>
                <div class="fridgeTitle blue"> 
                    Geladeira 
                </div>
                <div class="Button">
                    <button form='formList' class="Blue-Button" formaction='SalvarGeladeira.php?Funcao=Filtrar'>Filtrar por ingredientes</button>
                    <button form='formList' class="Blue-Button">Salvar alterações</button>
                </div>
            </div>
            <div class='bot'>
                <form method='POST' action="SalvarGeladeira.php?Funcao=Salvar" id="formList">  
                    <div id="AddItem" onclick="addItemList()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z" fill="Green"/></svg>
                   </div>
                    <div class="fridgeContent">
                        <?php
                     

                            $link = mysqli_connect("clovis-cartola.czcbeh0esbig.us-east-1.rds.amazonaws.com", "tempera", "Tempera_123", "tempera");



                            if (!$link) {
                                echo "Error: Unable to connect to MySQL." . PHP_EOL;
                                echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                                echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                                exit;
                            }else {
                                $id = $_SESSION['id_usuario'];
                               $query = "select * from tb_geladeira where id_usuario = {$id}";
                               $result = mysqli_query($link,$query);
                               if(mysqli_num_rows($result) > 0){
                                
                                   while($row = mysqli_fetch_array($result)){
                                       $count= $row['id_geladeira'];                   
                                        echo '<div id="item-'.$count.'" class="List-Item">
                                        <div class="Btn-Del" onclick="removeItem('.$count.')"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" fill="Red"/></svg>
                                        </div>
                                        <input list="Ingredientes" name="Ingredientes'.$count.'" value="'.$row['st_nomeIngrediente'].'" type="text" placeHolder="Insira o Ingrediente" class="Item">
                                        </div>';
                                    }
                               }
                            }

                        
                        ?>
                    </div> 
                    <datalist id='Ingredientes'> 
                     </datalist>
                </form>
            </div>

        </div>
     
      <?php 
      
        require 'Validacao.php'

      ?>

        </content>
        
    </main>
</body>
</html>