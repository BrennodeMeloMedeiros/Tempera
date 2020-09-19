<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Style.css">
    <link rel='stylesheet' type='text/css' href='CSS/Perfil.css'>
    <link rel="stylesheet" type="text/css" href="CSS/SideMenu.css">
    <script src="JS\Script.js"></script>
    <script src="JS\SideMenu.js"></script>
    <title>
        Perfil
    </title>

</head>
<body>
    <main id="main">
        <script>
            ShowSideMenu()
        </script>
        <content>
        <div class="Name-Page">
            Seu Perfil
        </div>
        <div class='Card'>  
            <div class="Top">
                <img src='IMAGENS/Me.jpg' alt='Sua foto de perfil'>
                <label for='Username'>Nome <input readonly type='text' placeholder='Seu Nome' id='Username' class='#'> </label>
                <label for='Useremail'>Email <input readonly type='email' placeholder='seuemail@gmail.com' id='Username' class='#'> </label>
            </div>
            <div class="Bot">
                <div class="Minicard">
                    <span>
                    Favoritos 
                    </span>
                    <img src="IMAGENS/Arroz.jpg" alt="Favoitos" name="favoritos">
                </div>
                <div class="Minicard">
                    <span>
                    Suas receitas
                    </span>
                    <img src="IMAGENS/Pudim.jpg" alt="Receitas" name="Receitas">
                </div>
                <div class="Minicard">
                    <span>
                        Histórico 
                    </span>
                        <img src="IMAGENS/Stro.jpg" alt="Histórico" name="Histórico">
                </div>
            </div>
        </div>
        </content>
    </main>
</body>
</html>