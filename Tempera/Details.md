== Código HTML padrão parar todas as páginas: ==

//morra por favor apenas cesse sua vida, eu teodeio ss

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Style.css">
    <link rel="stylesheet" type="text/css" href="CSS/SideMenu.css">
    <script src="JS\Script.js"></script>
    <script src="JS\SideMenu.js"></script>
    <title>
        ****Nome da Página****
    </title>

</head>
<body>
    <main id="main">
        <?php 
           include 'SideMenu.php'
       ?>
        <content>
        <div class="Name-Page">
            ****Nome da Página****
        </div>
            *
            *
            *
            *
            Conteúdo da página
            *
            *
            *
            *
        </content>
    </main>
</body>
</html>


- Tudo que precisa ser adicionado como elemento único da página, ou seja, tudo que não o faz parte do SideMenu, cabeçalho e Top Usuários/Top Receitas deve ser colocado dentro da tag "<Content>" e estilizado na página css própria para a página em questão ("NomeDaPágina.CSS"). 

- O "include 'SideMenu.php'" é o que garante que todas as páginas que necessitam do side menu o tenham, o código que ele executa se encontra e m"SIdeMenu.php" e sua estilizaçãp está em "SideMenu.css"

- A Div de classe "Name-Page" deve conter somente o nome da página que irá aparecer em todo o superior da área de Content, a estilização dela já está predefinida.

- As tags a seguir não sevem ser usadas dentro de um documento HTML que contenha a função de ShowSideMenu:
-- Aside
-- Content
-- Main
-- Header
-- Footer


    * Caso alguma dessas tags seja usada pode ocorrer um conflito com a Definição de Dispay Grid ("SideMenu.CSS") *
















































