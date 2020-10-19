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
                            <input type="text" placeholder='Nome do usuário' id='name' >
                            <div class='input'> Email do usuário</div>
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
        </content>
    </main>
</body>
</html>