<?php
 session_start();
 if(!isset($_SESSION['id_usuario']))
 {
     header("location: index.php");
     exit;
     
 };

$link = mysqli_connect("clovis-cartola.czcbeh0esbig.us-east-1.rds.amazonaws.com", "tempera", "Tempera_123", "tempera");



if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
$queryUser = "SELECT * from tb_usuario where id_usuario = {$_SESSION['id_usuario']}";
        $exeUser = mysqli_query($link, $queryUser);
        while($row = mysqli_fetch_assoc($exeUser)){
            $foto = $row['imagePerfil'];
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
$ingredientes="#";
$imagem=$_FILES['image']['name'];

$id = $_SESSION['id_usuario'];
// Pega a quantidade de valores do $_POST
$elementsNum = count($_POST);
// Define a quantidade de ingredientes dentro do $_POST
$targetElements= $elementsNum - 7;

$queryAdicionarReceita = "insert into tb_receita2 (st_descricao, int_calorias, int_porcoes, st_tags, st_ingredientes, st_tempo, st_nome_receita, image, id_usuario)
values('" .$descricao. "','" .$calorias. "', '" .$porcoes. "', '" .$tags. "', '" .$ingredientes. "', '" .$tempo. "', '" .$nome_receita. "', '" .$imagem. "','" .$id."')"; 
mysqli_query($link,$queryAdicionarReceita);
//echo $queryAdicionarReceita.'<br>';
$destino = '' . $_FILES['image']['name'];
$arquivo_tmp = $_FILES['image']['tmp_name'];
move_uploaded_file($arquivo_tmp, $destino);

$queryId = "SELECT LAST_INSERT_ID()";

$idReceita = mysqli_query($link,$queryId);

if(mysqli_num_rows($idReceita) > 0){
    $row = mysqli_fetch_array($idReceita);
    global $targetElements;
    
    for($i = 0; $i <= $targetElements; $i++){
         $nameIngre = "Ingredientes{$i}";

         $Ingre = $_POST[$nameIngre];
         $queryAdicionarIngredientes =  "insert into tb_receita_ingrediente (id_receita, id_ingrediente) 
                                        SELECT u.id_receita, ingre.id_ingrediente
                                            from tb_receita2 as u 
                                            inner join tb_ingrediente as ingre
                                            ON (ingre.id_ingrediente = id_ingrediente)
                                        WHERE ingre.st_nomeIngrediente = '{$Ingre}' AND u.id_receita = '{$row['LAST_INSERT_ID()']}';";
        // echo $queryAdicionarIngredientes.'<br>'; 
        mysqli_query($link,$queryAdicionarIngredientes);        
    };
    
}


header('location:ReceitaEnviada.php');

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

    
    <title>
        Adicionar Receitas
    </title>

</head>
<body>
    <main id="main">
        <?php 
       include 'SideMenu.php'
       ?>

        <content>
        <div class="Name-Page">
            Adicionar Receitas
        </div>
        <div class='Card'>
            <form name="Form_receita" autocomplete="off" method="POST" id="NovaReceita" enctype="multipart/form-data" action="AddReceitas.php">
                <div id='Name' class='Input-Row InputDefault' > 
                    <input required  type='text' id='InputName' name='Inputname' placeholder='Nome da receita' >    
                </div>
                <div id='Image-Painel'> 
                    <input type='file' accept="image/*" onchange='viewTargetImage()' name='image' id='image' class='Blue-Button'>
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
                        <div class='row' id='ListForm'>
                            
                            <label for='IngredientesText'><i class="fas fa-carrot"></i>Ingredientes</label>
                            <div id="AddItem" onclick="addItemList()">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z" fill="Green"/></svg>
                            </div>
                        </div>
                        <datalist id='Ingredientes'> 
                         </datalist>
          
                    </div>

                    <div class='Input-Row' id='Row3'>
                        <div class='row'>
                            
                            <label for='IngredientesText'><i class="fas fa-concierge-bell"></i>Modo de Preparo</label>
                            <span class='desc'>Recomenda-se que coloque a medida dos Ingredientes abaixo</span>
                            <textarea spellcheck="false" name='Preparo' id='PreparoText'> </textarea>
                        </div>
                    </div>

                    <div class='Input-Row' id='Row4'>
                        <div class='row'>
                            
                            <label for='Tags'><i class="fas fa-tag"></i>Tag</label>
                            <select id='Tags' name='Tags'> 
                                <option value='Tag0'>Selecione uma Tag</option>
                                <option value='Carnes'>Carnes</option>
                                <option value='Fitness'>Fitness</option>
                                <option value='Vegetariano'>Vegetariano</option>
                                <option value='Massas'>Massas</option>
                                <option value='Molhos'>Molhos</option>
                                <option value='Salada'>Saladas</option>
                                <option value='Sobremesas'>Sobremesas</option>
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
        <script type='text/javascript'>
        // Limita as opções de escolha do Datalist de acordo com o Banco de Ingredientes
            <?php
            if(!$link){
                echo "Error: Unable to connect to MySql" . PHP_EOL;
                echo "Debugging errno:" . mysqli_connect_errno() . PHP_EOL;
                echo "Error: Unable to connect to MySql" . mysqli_connect_error() . PHP_EOL;
                exit;
            }else{

            $getUsuarios = 'select DISTINCT st_nomeIngrediente from tb_ingrediente';
            $executeLine = mysqli_query($link, $getUsuarios);

            ?> 
            var js_array = [<?php while($row = mysqli_fetch_assoc($executeLine)){ echo utf8_encode("'{$row['st_nomeIngrediente']}',"); };?>]
            const datalist = document.querySelector('datalist')

            function addOption(item, index){
                let option = document.createElement("option")
                let optionText = option.innerText = item
                option.value = item
                datalist.appendChild(option)
            }

            js_array.forEach(addOption)

            <?php
            }
            ?>
        // Verifica se algum Ingrediente está repetido 

        function verificarRepetição(){
            const listItems = document.querySelectorAll('.List-Item');
            let errorItem = false
            
            for(list of listItems) {
                // list = div do item 
                const firstValue = list.querySelector('.Item').value // Input da div, ou seja, onde está o valor do item 
                const firstId = list.id // Id do input 

                const inputsArray = List.querySelectorAll('.Item') // Pega todos o itens da lista denovo 
            //Pega os valores de todos os itens e checka se algum deles, que não o próprio, é igual a outro 
                for(input of inputsArray){
                const secondValue = input.value
                const secondId = input.parentNode.id
                
                    if(firstId != secondId && firstValue == secondValue){
                        errorItem = true
                    } else if(!firstValue){
                        errorItem = true
                    } else{
                    }
                } 

            }
            return errorItem
        }


        // Valida o valor do Input da Datalist (Verifica se o valor existe no Banco ou não)

        const objeto = {}
        js_array.forEach(item =>{
            objeto[item] = item
        } )
        function comecarValidacao(){
            const form = document.querySelector('#ListForm')
            const inputs = form.querySelectorAll('input.Item')
            let achouIngrediente = true
            for(input of inputs){
                const ingrediente = input.value
                const buscarIngrediente = objeto[ingrediente]
                if(!buscarIngrediente){
                   achouIngrediente = false
                   input.parentNode.style.borderBottom = '2px solid red'
                   input.parentNode.style.borderLeft = '2px solid red'
                }else{
                    input.parentNode.style.borderBottom = '1px solid #919191'
                    input.parentNode.style.borderLeft = 'none'                    
                }
            } 
            return achouIngrediente
        }
 
         addEventListener('submit',
         (e)=> {
            const existeIngrediente = comecarValidacao()
            const ingredienteRepetido = verificarRepetição()
            if(!existeIngrediente){
                e.preventDefault()
                alert('Algum dos ingredientes que você colocou não existe em nossa tabela, porfavor verifique os campos e remova')
            }else if (ingredienteRepetido){
                e.preventDefault()
                alert('Parece que algum item está repetido, porfavor retire-o da lista')
            }else{
            
            }
        })
        

        </script>
    </main>
</body>
</html>