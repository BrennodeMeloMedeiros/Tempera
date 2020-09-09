<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Style.css">
    <link rel="stylesheet" type="text/css" href="CSS/SideMenu.css">
    <link rel="stylesheet" type="text/css" href="CSS/AddReceita.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/69a958c39b.js" crossorigin="anonymous"></script>
    <script src="JS\Script.js"></script>
    <script src="JS\AddReceita.js" defer></script>
    <script src="JS\SideMenu.js"></script>
    
    <title>
        Adicionar Receitas
    </title>

</head>
<body>
    <main id="main">
        <script>
            ShowSideMenu()
        </script>

        <content>
        <div class="Name-Page">
            Adicionar Receitas
        </div>
        <div class='Card'>
            <form autocomplete="off" method="POST" id="NovaReceita">
                <div id='Name' class='Input-Row InputDefault' > 
                    <input type='text' id='InputName' placeholder='Nome da receita' >    
                </div>
                <div id='Image-Painel'> 
                    <input type='file' onchange='viewTargetImage()' name='image' id='image' class='Blue-Button'>
                    <label for='image' class='Blue-Button'>Adicionar Foto</label>
                </div>
                 
                <p class='opcional row' style='color:red'>Atenção! Colocar uma imagem ajuda muito na visibilidade da sua receita, mas não é obrigatório.</p> 
                <div id='Inputs-Painel'>
                    <div class='Input-Row' id='Row1'>
                        <!-- Linha de Tempo e Porções  -->
                        <div class='row'>
                            <p><i class="fas fa-clock"></i><label for='Time'>Tempo</label></p>
                            <input pattern='[0-9]{1,3}' maxlength="3" class='Basic-Input' type='text' name='Time' id='Time'>
                            <spam class='desc'>Minutos</spam>
                        </div>
                        <div class='row'>
                            <p><i class="fas fa-weight-hanging"></i><label for='Time'>Calorias</label></p>
                            <input pattern='[0-9]{1,4}' maxlength="4" class='Basic-Input' type='text' name='Calorias' id='Calorias'>
                            <spam class='desc'>Cal</spam>
                        </div>
                        <div class='row'>
                            <p><i class="fas fa-user-friends"></i><label for='Qtdd-Porcoes'>Porções</label></p>
                            <input type='text' pattern='[0-9]{1,2}' maxlength="2" class='Basic-Input' name='Qtdd-Porcoes' id='Qtdd-Pocoes'>
                            <spam class='desc'>Porções</spam>
                        </div>
                    </div>
                    <span class='opcional row'>Opcional</span> 

                    <div class='Input-Row' id='Row2'>
                        <div class='row'>
                            
                            <label for='IngredientesText'><i class="fas fa-carrot"></i>Ingredientes</label>
                            <span class='desc'>O formato do texto será mantido na exibição da receita. Escreva de forma organizada.</span>
                            <textarea spellcheck="false" id='IngredientesText'> </textarea>
                        </div>
                    </div>

                    <div class='Input-Row' id='Row3'>
                        <div class='row'>
                            
                            <label for='IngredientesText'><i class="fas fa-concierge-bell"></i>Modo de Preparo</label>
                            <span class='desc'>O formato do texto será mantido na exibição da receita. Escreva de forma organizada.</span>
                            <textarea spellcheck="false" id='PreparoText'> </textarea>
                        </div>
                    </div>

                    <div class='Input-Row' id='Row4'>
                        <div class='row'>
                            
                            <label for='Tags'><i class="fas fa-tag"></i>Tag</label>
                            <select id='Tags'> 
                                <option value='Tag0'>Selecione uma Tag</option>
                                <option value='Tag1'>Carnes</option>
                                <option value='Tag2'>Fitness</option>
                                <option value='Tag3'>Vegetariano</option>
                                <option value='Tag4'>Massas</option>
                                <option value='Tag5'>Molhos</option>
                            </select>
                        </div>
                    </div>
                    <div class='Input-Row' id='Row5'>
                        <div class='row'>
                            <button class='Blue-Button' form='NovaReceita'>Enviar Receita</button>
                        </div>
                    </div>
                </div>
             
            
            </form>

        </div>
        </content>
    </main>
</body>
</html>