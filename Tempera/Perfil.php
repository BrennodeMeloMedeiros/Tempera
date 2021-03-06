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
    <link rel="stylesheet" type="text/css" href="CSS/Home.css">
    <script src="JS\Script.js" defer></script>
    <script src="JS\Perfil.js" defer></script>
    <script src="JS\SideMenu.js" defer></script>
    <title>
        Perfil
    </title>

</head>
<body>
    <main id="main">
       <?php 
      
            include 'SideMenu.php';
       ?>
        <content>
        <div class="Name-Page">
            Seu Perfil
        </div>
        <div class='Card'>  
            <div class="Top">
                <div class="Image">
                <img id='PImage' src="<?php 
                    if(isset($image)){
                        echo $image;
                    }else{
                        echo 'IMAGENS/AvatarBeta.png';
                    }
                     ?> 
                    ?>" alt=".">
                </div>
                <div class='align'>
                    <div class="row" id='row1'>
                        <input type="text" placeholder='<?php echo $nomeUser ?>' readonly>
                        <input type="email" placeholder='<?php echo $emailUser; ?>' readonly >
                    </div>
                    <div class="mid">
                        <div class="infos">
                        <?php 
                            $querySeguidores = "SELECT COUNT(*) as Seguidores, (
                                SELECT COUNT(*)
                                FROM tb_seguir
                                WHERE id_seguidor = '$id'
                            ) as Seguindo 
                            from tb_seguir WHERE id_usuario = '$id';";
                            $exeSeguidores = mysqli_query($link, $querySeguidores);
                            while($row = mysqli_fetch_assoc($exeSeguidores)){
                                $seguidores = $row['Seguidores'];
                                $seguindo = $row['Seguindo'];
                            };
                        ?>
                            <span class="Seguidores">Seguidores: <?php echo $seguidores ?></span>
                            <span class="Seguindo">Seguindo: <?php echo $seguindo ?></span>
                        </div>
                    </div>
                    <div class="row" id='row2'>
                        <textarea spellcheck='false' maxlength='190' rows='4' disabled ><?php echo $bio ; ?></textarea>
                    </div>
                </div>
            </div>
          
            <div class="Bot">
                <div class="Minicard">
                    <a href="Home.php?show=favoritos">
                        <p>
                            Favoritos
                            <span id='FavQttd'></span>
                        </p>
                    </a>
                </div>
                
                <div class="Minicard">
                    <a href="Home.php?show=historico">
                        <p>
                            Histórico
                            <span id='FavQttd'></span>
                        </p>
                    </a>
                </div>

            </div>
            <div class="Button">
                <a href='EditarPerfil.php' class='Blue-Button'>Editar Perfil</a>
                <a href='EditarPerfil.php?Sair=Sair' class='Blue-Button'>Sair da Conta</a>
            </div>
            <div id="Receitas">
                <?php
$query =  $query = "SELECT * FROM tb_receita2 as a
inner join tb_usuario as b
on a.id_usuario = b.id_usuario
 where a.id_usuario = '{$_SESSION['id_usuario']}' ORDER BY a.id_receita ASC;";
$result = mysqli_query($link,$query);
// echo $query;
if($result && mysqli_num_rows($result) > 0 )
{
    while($row = mysqli_fetch_array($result))
    {
?>
 <section class="card">
                <img src="<?php echo $row["image"]?>" alt="Sem imagem">
                <div class="card-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="80.615" height="11.865" viewBox="0 0 82.615 13.865">
                <g id="Grupo_39" data-name="Grupo 39" transform="translate(-355 -430.25)">
                    <path id="Icon_feather-star" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(352 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-2" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(403.027 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-3" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(386.018 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-4" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(369.009 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-5" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(420.036 427.25)" fill="#ffce0c"/></g></svg>
                    <span class="Tag" ><?php echo $row["st_tags"];?></span>
                    
                </div>
                <a href="Receita.php?id_receita=<?php echo $row["id_receita"]?>">
                <div class="card-content">
                    <p class="titulo">
                        <b>
                        <?php echo $row["st_nome_receita"];?>
                        </b>
                    </p>
                    <p class="descricao">
                    <?php 
                    echo substr($row["st_descricao"],0,160) ?>...
                    </p>
                </div>
                </a>
                <div class="card-footer">
                    <div class='row'>    
                        <span id="Likes">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17.091" viewBox="0 0 19 17.091"><g id="Grupo_137" data-name="Grupo 137" transform="translate(-784.559 -512.42)"><g id="Symbol_97_151" data-name="Symbol 97 – 151" transform="translate(785.059 512.92)"><path id="Heart" d="M16.586,1.464a4.836,4.836,0,0,0-6.884,0l-.677.677-.677-.677A4.868,4.868,0,0,0,1.464,8.348l7.561,7.561,7.561-7.561a4.836,4.836,0,0,0,0-6.884" transform="translate(-0.025 -0.025)" fill="none" stroke="#95989a" stroke-width="1" fill-rule="evenodd"/></g></g></svg>
                                609
                            </span>
                        <span id="Duracao">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path id="Caminho_13" data-name="Caminho 13" d="M2.4,2.4A7.263,7.263,0,0,1,8,0a7.263,7.263,0,0,1,5.6,2.4A7.263,7.263,0,0,1,16,8a7.263,7.263,0,0,1-2.4,5.6A7.263,7.263,0,0,1,8,16a7.263,7.263,0,0,1-5.6-2.4A7.984,7.984,0,0,1,0,8,7.263,7.263,0,0,1,2.4,2.4Zm9.2,9.2.933-.933L9.2,7.333,8,2H6.667V8a1.21,1.21,0,0,0,.4.933.466.466,0,0,0,.267.133Z" fill="#2699fb"/></svg>
                        <?php echo $row["st_tempo"];?> min
                        </span>
                    </div>
                    <span id="Autor">
                        <a href="<?php echo "PerfilUsuario.php?id={$row['id_usuario']}"?>">
                            <?php 
                            echo $row['st_nome'];
                            ?>
                        </a>
                    </span>
                </div>
            </section>
<?php
    }
}

                
        };
    };
?>
    </div>
        </div>
        </content>
    </main>
</body>
</html>