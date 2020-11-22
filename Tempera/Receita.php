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


if(!empty($_GET['id_receita'])){
    $idReceita = $_GET['id_receita'];
   
    function getLikeDB(){
        global $idReceita, $link;
        $queryLike = "SELECT * FROM tb_likes 
        WHERE id_usuario = '{$_SESSION['id_usuario']}' 
        AND id_receita = '{$idReceita}'";
        $getLikes = mysqli_query($link, $queryLike);
        $row = mysqli_fetch_array($getLikes);
        if(mysqli_num_rows($getLikes) > 0){
            $heart = true;
        }else{
            // O cara não deu Like
            $heart = false;
        };     
        return $heart;
    };
   


    if(!empty($_POST['newComment'])){
         if(strlen($_POST['newComment']) <= 385){
            $queryAdicionarComentario = "INSERT INTO tb_comentarios (st_textoComentario, id_usuario)
            VALUES ('{$_POST['newComment']}','{$_SESSION['id_usuario']}');";
            $exe = mysqli_query($link, $queryAdicionarComentario);
            $queryId='SELECT LAST_INSERT_ID()'; 
            $getIdComentario = mysqli_query($link,$queryId);
            while($row = mysqli_fetch_array($getIdComentario)){
                $idComentario = $row['LAST_INSERT_ID()'];
            }
            
            $queryRelacionarComentario = "INSERT INTO tb_comentarios_receitas (id_comentario, id_receita)
            VALUES ('{$idComentario}','{$idReceita}');";
            $exe = mysqli_query($link, $queryRelacionarComentario);
        }
    }


    if(!empty($_POST['estrela'])){
        $estrela = $_POST['estrela'];
        
        $result_avaliacos = "INSERT INTO tb_receita2 where id_receita = '$idReceita' (qnt_estrela) VALUES ('$estrela')";
        $resultado_avaliacos = mysqli_query($link, $result_avaliacos);
    }


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
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="CSS/Stars.css">
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
                    
                  

                    <form id="EstrelasEnviar" method="POST" action="" enctype="multipart/form-data">
                        <div class="estrelas">
                            <?php 
                            
                            ?>
                            <input type="radio" id="vazio" name="estrela" value="" checked>

                            <label for="estrela_um"><i class="fa"></i></label>
                            <input type="radio" id="estrela_um" name="estrela" value="1">

                            <label for="estrela_dois"><i class="fa"></i></label>
                            <input type="radio" id="estrela_dois" name="estrela" value="2">

                            <label for="estrela_tres"><i class="fa"></i></label>
                            <input type="radio" id="estrela_tres" name="estrela" value="3">

                            <label for="estrela_quatro"><i class="fa"></i></label>
                            <input type="radio" id="estrela_quatro" name="estrela" value="4">

                            <label for="estrela_cinco"><i class="fa"></i></label>
                            <input type="radio" id="estrela_cinco" name="estrela" value="5">
                        </div>
                    </form>
              <script>
                    const estrelas = document.querySelectorAll('input[name=estrela]')
                    const formularioEstrelas = document.querySelector("form#EstrelasEnviar") 

                    for(estrela of estrelas){
                        estrela.addEventListener('click', ()=>{
                        formularioEstrelas.submit()
                    })
                    }
                    </script>


                    </div>
                    <div class="col noBG">
                    <?php
                        $like = getLikeDB();
                        if($like){
                            $color = "red";
                            $heart = true;
                        }else{
                            $color = "none";
                            $heart = false;
                        }
                        echo $like;
                    ?>
                        <form action="Back-Receita.php?id=<?php echo "{$idReceita}&like={$heart}"?>" id='Like' method='POST'>
                        
                            <svg id='likeButton'xmlns="http://www.w3.org/2000/svg" width="19" height="17.091" viewBox="0 0 19 17.091">
                                <g id="Grupo_137" data-name="Grupo 137" transform="translate(-784.559 -512.42)">
                                    <g id="Symbol_97_151" data-name="Symbol 97 – 151" transform="translate(785.059 512.92)">
                                        <path id="Heart" d="M16.586,1.464a4.836,4.836,0,0,0-6.884,0l-.677.677-.677-.677A4.868,4.868,0,0,0,1.464,8.348l7.561,7.561,7.561-7.561a4.836,4.836,0,0,0,0-6.884" transform="translate(-0.025 -0.025)" 
                                        fill="<?php echo $color; ?>"  stroke="#95989a" stroke-width="1" fill-rule="evenodd"/>
                                    </g>
                                </g>
                            </svg>
                            <input id='likeValue' name='likeValue' type="hidden" value='0'>
                        </form>
                    </div>
                    <script>
                        const likeButton = document.querySelector('#likeButton')
                        likeButton.addEventListener('click', ()=>{
                            document.querySelector('form#Like').submit()
                        })
                    </script>
                    
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
               
                <div id='Comments'>
                <?php 
                $queryPegarComentarios = "select a.st_textoComentario, a.id_usuario, c.st_nome 
                from tb_comentarios as a
                inner join tb_comentarios_receitas as b
                 ON a.id_comentario = b.id_comentario
                 inner join tb_usuario as c
                  ON a.id_usuario = c.id_usuario
                  WHERE b.id_receita = '{$idReceita}';
                ";

                $exe = mysqli_query($link, $queryPegarComentarios);
                while($row = mysqli_fetch_array($exe)){
                    echo "<div class='Comment-Box'>
                        <a href='PerfilUsuario.php?id={$row['id_usuario']}'>
                        <p class='name'>{$row['st_nome']}</p></a>
                        <p class='text'>{$row['st_textoComentario']}</p>
                    </div>
                    ";
                }
                ?> 
                </div>
                
                <form id='formNewComment' spellcheck='false' action="" method='POST'>
                    <label for="newCommentBox">Adicione um comentário</label>
                    <textarea name="newComment" placeholder='Max:385 Caracteres' maxlength="385" id="newCommentBox"></textarea>
                    <div class='row'>
                        <button type='submit' class='Blue-Button'> Enviar Comentário</button>
                    </div>
                </form>

            </div>
        
            <?php 
            
        }else{
            header('location:Error.php');
        };
    }else{
        header('location:Home.php');
    }
            ?>
        </content>
    </main>
</body>
</html>
