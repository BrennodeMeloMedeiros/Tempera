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
        $valava = "SELECT * FROM tb_avaliacao where id_usuario = '{$_SESSION['id_usuario']}' and id_receita = '$idReceita'";
        $exe = mysqli_query($link,$valava);
       if($row=mysqli_fetch_assoc($exe))
       {
        $estrela = $_POST['estrela'];
        $result_avaliacos = "UPDATE tb_avaliacao SET qnt_estrela = '$estrela' where id_usuario = '{$_SESSION['id_usuario']}' and id_receita = '$idReceita' ";
        $resultado_avaliacos = mysqli_query($link, $result_avaliacos);
       }
       else
       {
        $estrela = $_POST['estrela'];
        $result_avaliacos = "INSERT INTO tb_avaliacao (id_usuario,id_receita,qnt_estrela) VALUES ('{$_SESSION['id_usuario']}','$idReceita','$estrela')";
        $resultado_avaliacos = mysqli_query($link, $result_avaliacos);
      }
    }



    $sql = "SELECT SUM(qnt_estrela) FROM tb_avaliacao WHERE id_receita = '$idReceita'";
    $gio = mysqli_query($link,$sql);
    while($row=mysqli_fetch_assoc($gio)){
        $soma = $row['SUM(qnt_estrela)'];
    }
    $sql = "SELECT COUNT(*) FROM tb_avaliacao WHERE id_receita = '$idReceita'";
    $gio = mysqli_query($link,$sql);
    while($row=mysqli_fetch_assoc($gio)){
        $pessoas = $row['COUNT(*)'];
    }

    if($soma == 0 || $pessoas == 0){
        $divisao = 0;
    }else {
        $divisao = $soma / $pessoas;
    }
    $QtdEstrelas = round($divisao);


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
    <script src="JS\VisuReceita.js" defer></script>
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
                            function loadStars(num){
                                const stars = document.querySelectorAll('input[name=estrela]')
                                targetStar = stars[num]  
                                targetStar.checked = true
                            
                            }
                            loadStars(<?php echo $QtdEstrelas; ?>)
                        </script>                            
                    </div>
                    <div class="col noBG">
                            <button onclick='showReport()' id='reportButton' class="Blue-Button" style='background:red;' >Denunciar</button>
                            <form action="Denuncia.php?idReceita=<?php echo $idReceita?>&idUser=<?php echo $_SESSION['id_usuario']?>" method='POST' id='denuncia'>
                                <select name="ReportOptions" id="ReportOptions">
                                    <option value="">Qual o Motivo da Denúncia?</option>
                                    <option value="Conteúdo Ofensivo">Conteúdo Ofensivo</option>
                                    <option value="Receita má intencionada">Receita má intencionada</option>
                                    <option value="Informações incompletas">Informações incompletas</option>
                                </select>
                                <button type='submit' class="Blue-Button" style='background:red;font-size:0.5rem;font-weight:bold;' >Enviar Denuncia</button>
                            </form>

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
                <div class="row">
                    <div class="col">
                        <p>Tag</p>
                        <span><?php echo $tag?></span>
                    </div>
                    <div class="col">
                        <p>Nome do autor</p>
                        <span><?php echo $autor ?></span>
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
