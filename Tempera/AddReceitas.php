<?php

$link = mysqli_connect("clovis-cartola.czcbeh0esbig.us-east-1.rds.amazonaws.com", "tempera", "Tempera_123", "tempera");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
//print_r($_POST);
//die;
if(isset($_POST['Inputname'])){
$nome_receita=$_POST["Inputname"];
$tags=$_POST["Tags"];
$porcoes=$_POST["QtddPorcoes"];
$tempo=$_POST["Time"];
$descricao=$_POST["Preparo"];
$calorias=$_POST["Calorias"];
$ingredientes=$_POST["Ingredientes"];

$sql="insert into tb_receita (txt_descricao, int_calorias, int_porcoes, txt_tags, txt_ingredientes, txt_tempo, txt_nome_receita)
values('" .$descricao. "','" .$calorias. "', '" .$porcoes. "', '" .$tags. "', '" .$ingredientes. "', '" .$tempo. "', '" .$nome_receita. "')"; 

//echo $sql;
//die;

mysqli_query($link,$sql);
}



?>
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
            <form name="Form_receita" autocomplete="off" method="POST" id="NovaReceita" action="AddReceitas.php">
                <div id='Name' class='Input-Row InputDefault' > 
                    <input required  type='text' id='InputName' name='Inputname' placeholder='Nome da receita' >    
                </div>
                <div id='Image-Painel'> 
                    <input type='file' onchange='viewTargetImage()' name='image' id='image' class='Blue-Button'>
                    <label for='image' class='Blue-Button'>Adicionar Foto</label>
                </div>
                 
                <p class='opcional row' style='color:green'>Atenção! Colocar uma imagem ajuda muito na visibilidade da sua receita, mas não é obrigatório.</p> 
                <div id='Inputs-Painel'>
                    <div class='Input-Row' id='Row1'>
                        <!-- Linha de Tempo e Porções  -->
                        <div class='row' id='align'>
                            <div class='row'>
                                <p><i class="fas fa-clock"></i><label for='Time'>Tempo</label></p>
                                <input required pattern='[0-9]{1,3}' maxlength="3" class='Basic-Input' type='text' name='Time' id='Time'>
                                <spam class='desc'>Minutos</spam>
                            </div>
                            <div class='row'>
                                <p><i class="fas fa-weight-hanging"></i><label for='Calorias'>Calorias</label></p>
                                <input  pattern='[0-9]{1,4}' maxlength="4" class='Basic-Input' type='text' name='Calorias' id='Calorias'>
                                <spam class='desc'>Cal</spam>
                            </div>
                            <div class='row'>
                                <p><i class="fas fa-user-friends"></i><label for='Qtdd-Porcoes'>Porções</label></p>
                                <input required type='text' pattern='[0-9]{1,2}' maxlength="2" class='Basic-Input' name='QtddPorcoes' id='Qtdd-Pocoes'>
                                <spam class='desc'>Porções</spam>
                            </div>
                        </div>
                        <span class='opcional row'>Opcional</span> 
                        <span class='opcional warning row'></span>                         
                    </div>

                    <div class='Input-Row' id='Row2'>
                        <div class='row'>
                            
                            <label for='IngredientesText'><i class="fas fa-carrot"></i>Ingredientes</label>
                            <span class='desc'>O formato do texto será mantido na exibição da receita. Escreva de forma organizada.</span>
                            <textarea spellcheck="false" name='Ingredientes' id='IngredientesText'> </textarea>
                        </div>
                    </div>

                    <div class='Input-Row' id='Row3'>
                        <div class='row'>
                            
                            <label for='IngredientesText'><i class="fas fa-concierge-bell"></i>Modo de Preparo</label>
                            <span class='desc'>O formato do texto será mantido na exibição da receita. Escreva de forma organizada.</span>
                            <textarea spellcheck="false" name='Preparo' id='PreparoText'> </textarea>
                        </div>
                    </div>

                    <div class='Input-Row' id='Row4'>
                        <div class='row'>
                            
                            <label for='Tags'><i class="fas fa-tag"></i>Tag</label>
                            <select id='Tags' name='Tags'> 
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

                    <p class='opcional warning row' id='align' name='submitError'></p> 
                </div>
             
            
            </form>

        </div>
        </content>
    </main>
</body>
</html>