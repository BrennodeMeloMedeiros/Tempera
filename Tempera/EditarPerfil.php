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
        if(isset($_FILES['imgPerfil'])
            || isset($_POST['Nome'])
            || isset($_POST['Bio'])){
            
            if($_FILES['imgPerfil']['error'] == 0){
                $nomePasta = substr_replace($_FILES['imgPerfil']['name'],"", -4);  
                $destinoInicial = 'IMAGENS/'.$id.'/';
                if(!glob("IMAGENS/{$id}")){
                    mkdir($destinoInicial);
                }else if(glob("IMAGENS/{$id}/*")){
                    foreach(glob("IMAGENS/{$id}/*") as $delete){
                        unlink($delete);
                    }
                }
                $destino = $destinoInicial.$_FILES['imgPerfil']['name'];
                $arquivo_tmp = $_FILES['imgPerfil']['tmp_name'];
                move_uploaded_file($arquivo_tmp, $destino);
                $novaFoto = $destino;
            }
            global $destino;
            $novoNome = $_POST['Nome'];
            $novaBio = $_POST['Bio'];
        
            $queryAtualizarPerfil = "UPDATE tb_usuario 
            SET 
            st_nome = '{$novoNome}', bio = '{$novaBio}', imagePerfil = ' {$novaFoto}'
            WHERE id_usuario = '{$id}'";
            echo $queryAtualizarPerfil;
            mysqli_query($link,$queryAtualizarPerfil);

        }else{
        // Mensagem de Erro
    }

     if(isset($_GET['Sair'])){
         $_SESSION['id_usuario'] = null;
         header('location:index.php');
     };
     $query = "SELECT * from tb_usuario where id_usuario = {$id}";
     $exe = mysqli_query($link, $query);
     
     
     while($row = mysqli_fetch_assoc($exe)){
         
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
                        if($row['imagePerfil'] != null){
                            echo $row['imagePerfil'];
                        }else{
                            echo 'IMAGENS/AvatarBeta.png';
                        }
                         ?>" alt="">

                         
                        <input value='<?php 
                        if(isset($row['imagePerfil'])){
                            echo $row['imagePerfil'];
                        }else{
                            echo 'IMAGENS/AvatarBeta.png';
                        }
                        ?>' type="file" accept="image/*" name='imgPerfil' form='saveForm' onchange='viewNewImage()' id="newImage">
                    </label>
                    <div class='align'>
                        <div class="row Editar" id='row1'>
                            <input type="text" id='name' name='Nome'value='<?php echo $row{'st_nome'}; ?>'>
                            <div class='input'> <?php echo $row{'st_email'}; ?></div>
                        </div>
                        <div class="row" id='row2'>
                            <textarea class='Editar' spellcheck='false' placeholder='Conte um pouco sobre você (max: 190 caracteres)' maxlength='190' rows='4' name='Bio'><?php echo $row{'bio'}; ?></textarea>
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
    //   };
     };
    };
?>
        </content>
    </main>
</body>
</html>