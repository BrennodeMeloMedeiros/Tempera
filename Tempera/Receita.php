<?php 
session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: index.php");
    exit;
    
};
$link = mysqli_connect("clovis-cartola.czcbeh0esbig.us-east-1.rds.amazonaws.com", "tempera", "Tempera_123", "tempera");
$queryUser = "SELECT * from tb_usuario where id_usuario = {$_SESSION['id_usuario']}";
$exeUser = mysqli_query($link, $queryUser);
while($row = mysqli_fetch_assoc($exeUser)){
        $foto = $row['imagePerfil'];
};


if($_GET){
    $idReceita = $_GET['id_receita'];
    $queryBuscarReceita = 
    "select 
    a.*, b.st_nome
    from tb_receita2 a 
    inner join tb_usuario b
        ON a.id_usuario = b.id_usuario
    where id_receita = '{$idReceita}';";

    $queryRegistrarHistorico = 
    "
    INSERT INTO tb_historico (id_receita, id_usuario)
    VALUES ({$idReceita}, {$_SESSION['id_usuario']})
    ";
    $exe = mysqli_query($link,$queryRegistrarHistorico);

    $exe = mysqli_query($link,$queryBuscarReceita);
    if(mysqli_num_rows($exe) > 0 ){
        while($row = mysqli_fetch_assoc($exe)){
          $nomeReceita = $row['st_nome_receita'];
          $descricaoReceita = $row['st_descricao'];
          $calorias = $row['int_calorias'];
          $tempo = $row['st_tempo'];
          $porcoes = $row['int_porcoes'];
          $autor = $row['st_nome'];
          $idAutor = $row['id_usuario'];
          $tag = $row['st_tags'];
          $imagem = $row['image'];
        };

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Style.css">
    <link rel="stylesheet" type="text/css" href="CSS/Receita.css">
    <link rel="stylesheet" type="text/css" href="CSS/SideMenu.css">
    <script src="JS\Script.js" defer></script>
    <script src="JS\SideMenu.js"></script>
    <title>
        Receita
    </title>

</head>
<body>
    <main id="main">
        <?php 
           include 'SideMenu.php'
       ?>
        <content>
        <div class="Name-Page">
            Receita
        </div>
            <div class="Card">
                <h3><?php echo $nomeReceita; ?></h3>
                <img src='<?php echo $imagem;?>' alt='A receita não possui uma imagem =(' id="ImagemReceita"></img>
                
                <div class="row">
                    <div class="col noBG">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80.615" height="11.865" viewBox="0 0 82.615 13.865">
                        <g id="Grupo_39" data-name="Grupo 39" transform="translate(-355 -430.25)">
                        <path id="Icon_feather-star" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(352 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-2" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(403.027 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-3" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(386.018 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-4" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(369.009 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-5" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(420.036 427.25)" fill="#ffce0c"/></g></svg>
                    </div>
                    <div class="col noBG">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17.091" viewBox="0 0 19 17.091"><g id="Grupo_137" data-name="Grupo 137" transform="translate(-784.559 -512.42)"><g id="Symbol_97_151" data-name="Symbol 97 – 151" transform="translate(785.059 512.92)"><path id="Heart" d="M16.586,1.464a4.836,4.836,0,0,0-6.884,0l-.677.677-.677-.677A4.868,4.868,0,0,0,1.464,8.348l7.561,7.561,7.561-7.561a4.836,4.836,0,0,0,0-6.884" transform="translate(-0.025 -0.025)" fill="none" stroke="#95989a" stroke-width="1" fill-rule="evenodd"/></g></g></svg>
                    </div>
                    
                </div>

                <div class="row">
                <div class="col">
                        <p>Tag</p>
                        <span><?php echo $tag?></span>
                    </div>
                    <div class="col">
                        <p>Nome do autor</p>
                        <span><?php echo $autor ?></span>
                    </div>
                    <div class="col">
                        <p>Likes</p>
                        <span>678</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Tempo</p>
                        <span><?php echo $tempo?></span>
                    </div>
                    <div class="col">
                        <p>Calorias</p>
                        <span><?php echo $calorias?></span>
                    </div>
                    <div class="col">
                        <p>Porções</p>
                        <span><?php echo $porcoes?></span>
                    </div>
                </div>
                <div class="PainelReceita">
                <div class="row">
                    <p class='Title'> Ingredientes</p>
                </div>
                <?php 
                    $queryBuscarIngredientes = 
                    "select a.id_ingrediente, a.id_receita, b.st_nomeIngrediente 
                    from tb_receita_ingrediente a
                    inner join tb_ingrediente b
                        ON a.id_ingrediente = b.id_ingrediente
                        where a.id_receita = '{$idReceita}';";
                    $exe = mysqli_query($link, $queryBuscarIngredientes);
                    while($row = mysqli_fetch_array($exe)){
                        echo " <div id='{$row['id_ingrediente']}'class='ingreCols'>
                        ".utf8_encode($row['st_nomeIngrediente'])."
                        </div>    
                        ";
                    }
                
                ?>
                </div>
                <div class="PainelReceita">
                <div class="row">
                    <p class='Title'>Modo de Preparo</p>
                </div>
                <div id="textPreparo">
                <?php echo $descricaoReceita?>
                </div>
                </div>
            </div>
            <?php 
            
        }else{
            echo 'Parece que a Receita não pode ser encontrado =(';
        };
    }else{
        header('location:Home.php');
    }
            ?>
        </content>
    </main>
</body>
</html>
