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
 }else {
    $queryUser = "SELECT * from tb_usuario where id_usuario = {$_SESSION['id_usuario']}";
    $exeUser = mysqli_query($link, $queryUser);
    while($row = mysqli_fetch_assoc($exeUser)){
        $foto = $row['imagePerfil'];
    }

    $id = $_SESSION['id_usuario'];

    // ================ Salvar alterações =====================//
  
    function saveInfos($infos) {
    global $id,$link;
        $nome = $infos['Nome'];
        $bio = $infos['Bio'];
        $querySalvarInfos = "UPDATE tb_usuario
        SET st_nome = '{$nome}' , bio = '{$bio}'
        WHERE id_usuario = '{$id}'";

        mysqli_query($link, $querySalvarInfos);
    };

    function createDirectory($img){
    // Pega a váriável $link e $id que estão fora do escopo da função
    global $id,$link;
        // Verifica se já existe um diretório com o id do usuário
        if(!glob("IMAGENS/{$id}")){
            // Se ão existir ele cria o Diretório
            mkdir("IMAGENS/{$id}");
        }else if(glob("IMAGENS/$id/*")){
            // Se o diretório existir e tiver algo dentro dele ele vai apagar tudo
            foreach(glob("IMAGENS/$id/*") as $delete){
                //Pega cada um dos arquivos dentro do diretório e apaga
                unlink($delete);
            }
            }
        // Define o DIretório onde a imagem vai ser upada. 
        //Faz isso tanto pra poder salvar o caminho no Banco quanto pra poder Salvar a imagem na pasta de aarquivos

        $destino = "IMAGENS/{$id}/".$img['imgPerfil']['name'];
        $arquivo_tmp = $_FILES['imgPerfil']['tmp_name'];
        // Salva o arquivo de Imagem no diretório que foi criado/limpo à cima 
        move_uploaded_file($arquivo_tmp, $destino);
        // retorna o $destino onde a imagem foi salva pra poder salvar o mesmo caminho no Banco
        return $destino; 
    };

    function saveImage($img){
        global $id, $link;
        // Verifica se alguma imagem foi de fato upada sem ter nenhum erro
        if($img['error'] == 0){
            // Pegar o diretório onde a imagem foi salva 
            $destino = createDirectory($_FILES);
            $querySalvarImagem = "UPDATE tb_usuario
            SET imagePerfil = '{$destino}'
            WHERE id_usuario = '{$id}'";

            mysqli_query($link,$querySalvarImagem);
        }
    };
    // Verifica se alguma imagem foi upada
    if($_FILES){
        saveImage($_FILES['imgPerfil']);
    }
    // Verifica se o nome ou a Bio foram enviados
    if($_POST){
        // Salva o nome e a Bio outra vez (Eles tendo sido modificados ou não)    
        saveInfos($_POST);
    }

    // ================ Salvar alterações =====================//

    if(isset($_GET['Sair'])){
         $_SESSION['id_usuario'] = null;
         header('location:index.php');
    };
    //  SALVAR DADOS -- FIM --

     $query = "SELECT * from tb_usuario where id_usuario = {$id}";
     $exe = mysqli_query($link, $query);
     
     
     while($row = mysqli_fetch_assoc($exe)){
        $nomeUser = $row{'st_nome'};
        $emailUser = $row{'st_email'};
        $bio =$row{'bio'}; 
        $image = $row['imagePerfil'];
?>
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
            <form method='POST' id='saveForm' action='EditarPerfil.php' enctype="multipart/form-data">
                <div class="Top">
                    <label for='newImage' class="Image">
                        <img id='PImage' src="<?php 
                         if(isset($image)){
                            echo $image;
                        }else{
                            echo 'IMAGENS/AvatarBeta.png';
                        }
                         ?>" alt="">

                         
                        <input type="file" accept=".jpg" name='imgPerfil' form='saveForm' onchange='viewNewImage()' id="newImage">
                    </label>
                    <div class='align'>
                        <div class="row Editar" id='row1'>
                            <input type="text" id='name' name='Nome'value='<?php echo $nomeUser; ?>'>
                            <div class='input'> <?php echo $emailUser; ?></div>
                        </div>
                        <div class="row" id='row2'>
                            <textarea class='Editar' spellcheck='false' placeholder='Conte um pouco sobre você (max: 190 caracteres)' maxlength='190' rows='4' name='Bio'><?php echo $bio; ?></textarea>
                        </div>
                        <div class="row" id='error'></div>
                    </div>
                </div>
                <div class="Bot">
                
                <div class="Button">
                    <a href='Perfil.php' class='Blue-Button' style='background:var(--blue-color);'>Voltar</a>
                    <button id='save' form='saveForm' class='Blue-Button'>Salvar Alterações</button>
                </div>
            </form>
        </div>
<?php 
     };
     };
?>
        </content>
    </main>
</body>
</html>