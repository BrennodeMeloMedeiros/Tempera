<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Style.css">
    <link rel='stylesheet' type='text/css' href='CSS/Perfil.css'>
    <link rel="stylesheet" type="text/css" href="CSS/SideMenu.css">
    <script src="JS\Script.js"></script>
    <script src="JS\Perfil.js" defer></script>
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
                <div class="Image">
                    <img id='PImage' src="IMAGENS/Me.jpg" alt=".">
                </div>
                <div class='align'>
                    <div class="row" id='row1'>
                        <input type="text" placeholder='Nome do usuário' readonly>
                        <input type="email" placeholder='Email do usuário' readonly>
                    </div>
                    <div class="row" id='row2'>
                        <textarea spellcheck='false' maxlength='190' rows='4' readonly ></textarea>
                    </div>
                </div>
            </div>
            <div class="mid">
                <div class="infos">
                    <span class="Seguidores">Seguidores: XXX</span>
                    <span class="Seguindo">Seguindo: XXX</span>
                </div>
            </div>
            <div class="Bot">
                <div class="Minicard">
                    <p>
                        Favoritos
                        <span id='FavQttd'> +256</span>
                    </p>
                    
                </div>
                <div class="Minicard">
                    <p>
                        Histórico
                        <span id='HistQttd'> +256</span>
                    </p>
                    
                </div>
                <div class="Minicard">
                    <p>
                        Postagens
                        <span id='PostQttd'> +256</span>
                    </p>
                    
                </div>
            </div>
            <div class="Button">
                <a href='EditarPerfil.php' class='Blue-Button'>Editar Perfil</a>
            </div>
        </div>
        </content>
    </main>
</body>
</html>