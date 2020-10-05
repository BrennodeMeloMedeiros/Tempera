<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Style.css">
    <link rel='stylesheet' type="text/css" href="CSS/Geladeira.css">
    <link rel="stylesheet" type="text/css" href="CSS/SideMenu.css">
    <script src="JS\Script.js"></script>
    <script src="JS\Geladeira.js" defer></script>
    <script src="JS\SideMenu.js"></script>


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
                    <button form='formList' class="Blue-Button" formaction='FiltrarGeladeira.php' >Filtrar por ingredientes</button>
                    <button form='formList' class="Blue-Button">Salvar alterações</button>
                </div>
            </div>
            <div class='bot'>
                <form method='POST' action="" id="formList">  
                    <div id="AddItem" onclick="addItemList()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z" fill="Green"/></svg>
                   </div>
                    <div class="fridgeContent">
                        
                    </div> 
                    
                </form>
            </div>

        </div>

        </content>
    </main>
</body>
</html>