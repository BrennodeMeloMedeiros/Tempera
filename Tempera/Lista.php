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
    <link rel="stylesheet" type="text/css" href="CSS/SideMenu.css">
    <link rel="stylesheet" type="text/css" href="CSS/Lista.css">
    <script type="text/javascript" src="JS/Script.js" defer></script>
    <script type="text/javascript" src="JS/Lista.js" defer></script>
    <title>
        Lista de Compras
    </title>

</head> 
<body>
    <main id="main">
        <?php 
       include 'SideMenu.php'   
       ?>
        <content>

        <div class="Name-Page">
            Minha Lista 
        </div>
        
        <div class="Card">
            
        <div id="Button">
                <!-- O PRIMEIRO BOTÃO MANDA AS IFNORMAÇÕES PARA A PÁGINA 'SALVAR.PHP', ENQUANTO A SEGUNDA MANDA PARA A PÁGINA 'EXPORTAR.PHP', AMBAS RECEBEM AS MESMAS INFORMAÇÕES -->
                <button class="Blue-Button" form="formList">Salvar Lista de compras</button>
                <button class="Blue-Button" form="formList" formaction='Exportar.php?Page=Lista-Exportar' >Exportar para a Geladeira</button>
            </div>
        
            <div class="List-Text blue">
                Lista de compras
            </div>
            <div class="List-Aviso">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.177l8.631 15.823h-17.262l8.631-15.823zm0-4.177l-12 22h24l-12-22zm-1 9h2v6h-2v-6zm1 9.75c-.689 0-1.25-.56-1.25-1.25s.561-1.25 1.25-1.25 1.25.56 1.25 1.25-.561 1.25-1.25 1.25z" fill="#F24545"/></svg>
                <span id="Alert-Title">
                    O que é?
                </span>
                <p id="Alert-Text">
                    A lista serve para que você monte o que precisa para as suas próximas compras, dessa forma você mantém de forma mais organizada e prática o que tem ou não em sua geladeira.
                </p>
            </div>
            <div id="List-Content" class="List-Content">
                <form autocomplete="off" method="POST" action="Exportar.php?Page=Lista-Salvar" id="formList">
                
                <?php
                     
                     $link = mysqli_connect("clovis-cartola.czcbeh0esbig.us-east-1.rds.amazonaws.com", "tempera", "Tempera_123", "tempera");

                     if (!$link) {
                         echo "Error: Unable to connect to MySQL." . PHP_EOL;
                         echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                         echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                         exit;
                     }else {
                         $id = $_SESSION['id_usuario'];
                        $query = "select * from tb_lista where id_usuario = {$id}";
                        $result = mysqli_query($link,$query);
                        if(mysqli_num_rows($result) > 0){
                            
                            while($row = mysqli_fetch_array($result)){         
                                $count= $row['id_lista'];                   
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
                </form>
    
                <div id="AddItem" onclick="addItemList()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z" fill="Green"/></svg>
               </div>
               
            </div>
            <datalist id='Ingredientes'> 
            </datalist>
          
          
        </div>
        
        
      <?php 
      
        require 'Validacao.php'

      ?>

      
    
        </content>
    </main>
</body>
</html>