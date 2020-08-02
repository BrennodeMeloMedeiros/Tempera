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
    <script src="JS\SideMenu.js"></script>
    <title>
        Lista
    </title>

</head>
<body>
    <main id="main">
        <script>
            ShowSideMenu()
        </script>
        <content>

        <div class="Name-Page">
            Minha Lista 
        </div>
        
        <div class="Card">
            
        
            <div class="List-Text blue">
                Lista
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
            <div id="List-Content"class="List-Content">
                
                <div id="0" class="List-Item">
                    <button class="Btn-Del"onclick="Delete()"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" fill="Red"/></svg>
                    </button>
                    <input name="Ingredientes" placeHolder="Insira o Ingrediente" list="Ingredientes" class="Item">
                    <div class="Item-Qtdd">
                        <input type="number" id="Qtdd" value="1" class="Qtdd" min=1 max=99>
                    </div>
                </div>
                <datalist id="Ingredientes">
                    <option value="Ingrediente 1">
                    <option value="Ingrediente 2">
                    <option value="Ingrediente 3">
                    <option value="Ingrediente 4">
                    <option value="Ingrediente 5">
                    <option value="Ingrediente 6">
                    <option value="Ingrediente 7">
                    <option value="Ingrediente 8">
                    <option value="Ingrediente 9">
                    <option value="Ingrediente 10">
                    <option value="Ingrediente 11">
                    <option value="Ingrediente n">
                </datalist>

          
                <div id="AddItem">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z" fill="Green"/></svg>
               </div>
            </div>
            
          
          
          
            <div id="Button">
                <input class="Blue-Button" type="button" value="Exportar para a Geladeira">
            </div>
        </div>
        <script>
        </script>
        </content>
    </main>
</body>
</html>