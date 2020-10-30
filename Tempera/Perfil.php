<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: Index.php");
        exit;
        
    };

    $link = mysqli_connect("clovis-cartola.czcbeh0esbig.us-east-1.rds.amazonaws.com", "tempera", "Tempera_123", "tempera");
   
    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
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
       include 'SideMenu.php'
       ?>
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
                    <div class="mid">
                        <div class="infos">
                            <span class="Seguidores">Seguidores: XXX</span>
                            <span class="Seguindo">Seguindo: XXX</span>
                        </div>
                    </div>
                    <div class="row" id='row2'>
                        <textarea spellcheck='false' maxlength='190' rows='4' readonly ></textarea>
                    </div>
                </div>
            </div>
          
            <div class="Bot">
                <div class="Minicard">
                    <p>
                        Favoritos
                        <span id='FavQttd'> +256</span>
                    </p>
                    
                </div>
            </div>
            <div class="Button">
                <a href='EditarPerfil.php' class='Blue-Button'>Editar Perfil</a>
            </div>
            <div id="Receitas">
            <?php
            $query = "SELECT * FROM tb_receita2 ORDER BY id_receita ASC";
$result = mysqli_query($link,$query);
if(mysqli_num_rows($result) > 0)
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
                <a href="receita_teste.php?id_receita=<?php echo $row["id_receita"]?>">
                <div class="card-content">
                    <p class="titulo">
                        <b>
                        <?php echo $row["st_nome_receita"];?>
                        </b>
                    </p>
                    <p class="descricao">
                    <?php 
                    echo substr($row["st_descricao"],1,160) ?>...
                    </p>
                    </a>
                </div>
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
                            Brenno de Melo Medeiros
                        
                    </span>
                </div>
            </section>
<?php
    }
}
?>
                </div>
        </div>
        </content>
    </main>
</body>
</html>