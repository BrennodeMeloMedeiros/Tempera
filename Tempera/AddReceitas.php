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

    // $destino = '' . $_FILES['image']['name'];
    // $arquivo_tmp = $_FILES['image']['tmp_name'];

     
    $queryAdicionarReceita = "insert into tb_receita2 (st_descricao, int_calorias, int_porcoes, st_tags, st_ingredientes, st_tempo, st_nome_receita, id_usuario)
    values('{$descricao}', '{$calorias}', '{$porcoes}','{$tags}','{$ingredientes}','{$tempo}', '{$nome_receita}','{$id}')";
    mysqli_query($link,$queryAdicionarReceita);
    // echo $queryAdicionarReceita;


    function createDirectory($img){
        global $idReceita,$link;
        if(!glob("IMAGENS/RECEITAS/{$idReceita}")){
            mkdir("IMAGENS/RECEITAS/{$idReceita}");
            }else if(glob("IMAGENS/RECEITAS/$idReceita/*")){
                foreach(glob("IMAGENS/RECEITAS/$idReceita/*") as $delete){
                    unlink($delete);
                }
            }

            $destino = "IMAGENS/RECEITAS/{$idReceita}/".$img['image']['name'];
            $arquivo_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($arquivo_tmp, $destino);
            return $destino;
        };
    function saveImage($img){
        global $idReceita, $link; 
        if($img['error'] == 0){
            $destino = createDirectory($_FILES);
            $querySalvarImagem = "UPDATE tb_receita2
            SET image = '{$destino}'
            WHERE id_receita = '{$idReceita}'";
            mysqli_query($link,$querySalvarImagem);
        }
    };
    // Pega o Id da receita recem registrada
    $queryId = "SELECT LAST_INSERT_ID()";
    $getId = mysqli_query($link,$queryId);
    while($row = mysqli_fetch_array($getId)){
        $idReceita = $row['LAST_INSERT_ID()'];
    }
   
    saveImage($_FILES['image']);


   
    foreach($_POST['idIngrediente'] as $idIngrediente){
        $query = "INSERT INTO tb_receita_ingrediente (id_receita,id_ingrediente)
                    VALUES ($idReceita,{$idIngrediente})";
        $exe = mysqli_query($link,$query);
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
// ###############################################################################################
            <?php
            if(!$link){
                echo "Error: Unable to connect to MySql" . PHP_EOL;
                echo "Debugging errno:" . mysqli_connect_errno() . PHP_EOL;
                echo "Error: Unable to connect to MySql" . mysqli_connect_error() . PHP_EOL;
                exit;
            }else{
            // query que pega o Nome e o Id de cada ingrediente no Banco
            $getUsuarios = 'select st_nomeIngrediente, id_ingrediente from tb_ingrediente group by st_nomeIngrediente';
            $executeLine = mysqli_query($link, $getUsuarios);

            ?>

            // Objeto que vai conter o Nome e o Id de todos os ingredientes
            ingredientesObj = {
                 <?php 
                 // pega o nome do Ingrediente no banco e salva ele, assim como o seu Id, 
                 // num objeto JS
              while($row = mysqli_fetch_assoc($executeLine)){
                   echo utf8_encode("'{$row['st_nomeIngrediente']}':'{$row['id_ingrediente']}', ");
               };
              ?>
            }         
            
            const datalist = document.querySelector('datalist')
            // Função que vai adicionar todos os ingredientes ao Datalist
            function addOption(id,nome){
                let option = document.createElement("option")
                option.value = nome
                option.name = id
                datalist.appendChild(option)
            }
            // Para cara ingrediente que há no Banco ele executa a função
            // de adicionar no datalist
            for(ingres of Object.keys(ingredientesObj)){
                // envia o id do ingrediente e o nome dele
                addOption(ingredientesObj[ingres], ingres)
            }
            <?php
            }
            ?>
// ###############################################################################################
            // Muda o Name do input para o Id do ingrediente selecionado

            
            const validarIngrediente = () =>{
                const ingredientesLista =  document.querySelector('div#ListForm')
                const ingredientes = ingredientesLista.querySelectorAll('input.Item')
                let invalidar = false
                for(ingre of ingredientes){                    
                    let encontrado = false
                    const value = ingre.value

                    for(ingreDB of Object.keys(ingredientesObj)){
                        if(ingreDB == value){
                            encontrado = true
                        }else if(value == "" ||value == " " ){
                            
                        }
                    }
                    if(encontrado == false){
                        ingre.parentNode.style.border = '1px solid red'
                        ingre.parentNode.style.background = "var(--blue-white)"
                        ingre.style.background = "var(--blue-white)"
                        invalidar = true
                    }else{
                        ingre.style.background = "#FFF"
                        ingre.parentNode.style.background = "#FFF"
                        ingre.parentNode.style.border = ''
                        ingre.parentNode.style.borderBottom = '1px solid #919191'
                    }
                }            
                return invalidar;

            }
            
            const adicionarEvento = (name) =>{
                // pega todos os itens da lista de Ingrediente
                let listInputs = form.querySelectorAll('input.Item')
                for(input of listInputs){
                    // se o input for o que acabou de ser Adicionado então ele
                    // adiciona nele o EventListener, assim não causa repetição
                    if(input.name == name){
                        input.addEventListener('change', (event) =>{
                            targetInput = event.target
                            criarHiddenInput(targetInput)
                        })
                        input.addEventListener('blur', (event) =>{
                            targetInput = event.target
                            criarHiddenInput(targetInput)
                        })
                    }
                      
                }     
            }
            
            const criarHiddenInput = (Input) => {
                targetInput = form.querySelector(`input[name=${Input.name}]`)
                    
                    
                const idForm = document.querySelector('form#NovaReceita')
                const hiddenInputs = idForm.querySelectorAll('input[type=hidden]')

                const id = ingredientesObj[targetInput.value]
                if(id){
                    let trocarIngre = false
                    let hiddenExistente = false
                    for(input of hiddenInputs){
                        if(input.class == targetInput.value){
                            hiddenExistente = true
                        }else if (input.id == targetInput.name){
                            hiddenInput.class = Input.value
                            input.name = "idIngrediente[]"
                            input.value = id
                            input.id = Input.name
                            trocarIngre = true
                        }
                    }

                    if(!hiddenExistente && !trocarIngre){
       
                        let hiddenInput = document.createElement("input")

                        hiddenInput.setAttribute('type', 'hidden')
                        // Seta o value do Input como o Id do ingrediente
                        hiddenInput.value = id
                        hiddenInput.class = Input.value
                        // Seta o Name como o Nome do ingrediente
                        hiddenInput.name = "idIngrediente[]"
                        // Sera o id com o valor do 'name' do input que criou o HiddenInput 
                        hiddenInput.id = Input.name
                        idForm.appendChild(hiddenInput)
                    }
                }
            }


            const deletarHiddenInput = (nomeIngrediente)=>{
                // Deleta o Hidden input que tem id iquivalente ao nomeIngrediente
                
                const idForm = document.querySelector('form#NovaReceita')
                const hiddenInputs = idForm.querySelectorAll('input[type=hidden]')
                for(input of hiddenInputs){    
                    console.log(nomeIngrediente)
                    if(input.class == nomeIngrediente){
                        const itemTarget = idForm.querySelector(`input[name='${input.name}']`) 
                        itemTarget.parentNode.removeChild(itemTarget)
                    }
                }
            }
        </script>
    </main>
</body>
</html>