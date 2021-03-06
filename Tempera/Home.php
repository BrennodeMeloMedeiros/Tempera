<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        exit;        
    }

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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Style.css">
    <link rel="stylesheet" type="text/css" href="CSS/SideMenu.css">
    <link rel="stylesheet" type="text/css" href="CSS/Home.css">
    <script src="JS\Script.js" defer></script>
    <script src="JS\SideMenu.js" defer></script>

    <title>Página Inicial</title>

</head>
<body>
    <main id="main">
         <?php 
       include 'SideMenu.php'
       ?>
        
        <content>
            <div class="Name-Page">
                Página Inicial
            </div>
            <?php
    
    $id = $_SESSION['id_usuario'];
    if(isset($_GET['Tag']) ){
        $query = "SELECT *,  case when round((select avg(qnt_estrela) from tb_avaliacao av where av.id_receita = a.id_receita )) is null then 0 else round((select avg(qnt_estrela) from tb_avaliacao av where av.id_receita = a.id_receita )) end as media_avaliacao FROM tb_receita2 as a 
        inner join tb_usuario as b
        ON a.id_usuario = b.id_usuario
        where st_tags ='{$_GET['Tag']}'";

    }else if(isset($_GET['type']) && $_GET['type'] == 'Filtrar'){
    
    $idReceitas = "select distinct id_receita from vw_ver_receitas_geladeira
    where id_usuario = {$id}";
    $exe = mysqli_query($link,$idReceitas);

    $query = "SELECT *, 
    case when round((select avg(qnt_estrela) from tb_avaliacao av where av.id_receita = a.id_receita )) is null then 0 else round((select avg(qnt_estrela) from tb_avaliacao av where av.id_receita = a.id_receita )) end as media_avaliacao FROM tb_receita2 as a 
    inner join tb_usuario as b ON a.id_usuario = b.id_usuario where id_receita IN (";

    $num = mysqli_num_rows($exe);
    $iNum = 1;

    if($num > 0 && $exe != null ){
        while($row = mysqli_fetch_array($exe)){
           if($iNum == $num){
               $query .= $row['id_receita'];
           }else{
               $query .=$row['id_receita'].',';
           };
           // echo "Num={$iNum}   e   Count  = {$num} <br>";
           $iNum++;
        };
    };
    $query .= ")";  
    }else if(isset($_GET['search'])){
        $search = $_GET['search'];
        $query = "

        select a.*, d.st_nome, 
        case when round((select avg(qnt_estrela) 
            from tb_avaliacao av where av.id_receita = a.id_receita )) 
            is null then 0 else round((select avg(qnt_estrela) 
            from tb_avaliacao av where av.id_receita = a.id_receita )) 
            end as media_avaliacao 
        from tb_receita2 as a 
            inner join tb_receita_ingrediente as b 
                ON a.id_receita = b.id_receita 
            inner join tb_ingrediente as c 
                ON b.id_ingrediente = c.id_ingrediente 
            inner join tb_usuario as d 
                ON a.id_usuario = d.id_usuario 
            where a.st_descricao LIKE '%$search%' OR a.st_nome_receita LIKE '%$search%' OR a.st_tags LIKE '%$search%' OR c.st_nomeIngrediente LIKE '%$search%' OR d.st_nome LIKE '%A%'
            GROUP BY id_receita;
      ";
    }else if(isset($_GET['show'])){
        $show = $_GET['show'];
        if($show == 'historico'){
            $query = "
            SELECT DISTINCT b.*, c.st_nome, case when round((select avg(qnt_estrela) from tb_avaliacao av where av.id_receita = a.id_receita )) is null then 0 else round((select avg(qnt_estrela) from tb_avaliacao av where av.id_receita = a.id_receita )) end as media_avaliacao FROM tb_historico as a
            inner join tb_receita2 as b
                ON a.id_receita = b.id_receita 
            inner join tb_usuario as c
                ON b.id_usuario = c.id_usuario
            where a.id_usuario = '{$_SESSION['id_usuario']}';
            ";
        }else{
            $query = "SELECT *,case when round((select avg(qnt_estrela) from tb_avaliacao av where av.id_receita = ava.id_receita )) is null then 0 else round((select avg(qnt_estrela) from tb_avaliacao av where av.id_receita = ava.id_receita )) end as media_avaliacao from tb_avaliacao as ava
            inner join tb_usuario as user 
                ON ava.id_usuario = user.id_usuario
            inner join tb_receita2 as recei
                ON ava.id_receita = recei.id_receita
            where ava.id_usuario = {$id} AND qnt_estrela > 3;
            ";
        };

    }else if(!empty($_GET['inscri'])){
            $query = "
            select *, case when round((select avg(qnt_estrela) from tb_avaliacao av where av.id_receita = a.id_receita )) is null then 0 else round((select avg(qnt_estrela) from tb_avaliacao av where av.id_receita = a.id_receita )) end as media_avaliacao
from tb_receita2 as a 
inner join tb_usuario as b 
    ON a.id_usuario = b.id_usuario
WHERE a.id_usuario IN (SELECT id_usuario from tb_seguir where id_seguidor = $id);
            ";
    }else{
        $query = "SELECT *, 
        case when round((select avg(qnt_estrela) from tb_avaliacao av
                where av.id_receita = a.id_receita 
        )) is null then 0 else round((select avg(qnt_estrela) from tb_avaliacao av
                where av.id_receita = a.id_receita 
        )) end as media_avaliacao FROM tb_receita2 as a
                inner join tb_usuario as b
                    ON a.id_usuario = b.id_usuario
                ORDER BY id_receita DESC  limit 50;";
    };  

    $array_estrela = [
    0 => "<path id='Icon_feather-star' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(352 427.25)' fill='#919191'/>
    <path id='Icon_feather-star-2' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(369.009 427.25)' fill='#919191'/>
    <path id='Icon_feather-star-3' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(386.018 427.25)' fill='#919191'/> 
    <path id='Icon_feather-star-4' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(403.027 427.25)' fill='#919191'/>
    <path id='Icon_feather-star-5' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(420.036 427.25)' fill='#919191'/>"
    ,1=> "<path id=\"Icon_feather-star\" data-name=\"Icon feather-star\" d=\"M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z\" transform=\"translate(352 427.25)\" fill=\"#ffce0c\"/>
    <path id='Icon_feather-star-2' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(369.009 427.25)' fill='#919191'/>
    <path id='Icon_feather-star-3' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(386.018 427.25)' fill='#919191'/> 
    <path id='Icon_feather-star-4' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(403.027 427.25)' fill='#919191'/>
    <path id='Icon_feather-star-5' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(420.036 427.25)' fill='#919191'/>" 
    ,2 => "<path id='Icon_feather-star' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(352 427.25)' fill='#ffce0c'/>
    <path id='Icon_feather-star-2' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(369.009 427.25)' fill='#ffce0c'/>
    <path id='Icon_feather-star-3' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(386.018 427.25)' fill='#919191'/> 
    <path id='Icon_feather-star-4' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(403.027 427.25)' fill='#919191'/>
    <path id='Icon_feather-star-5' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(420.036 427.25)' fill='#919191'/>"
    ,3 => " <path id='Icon_feather-star' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(352 427.25)' fill='#ffce0c'/>
    <path id='Icon_feather-star-2' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(369.009 427.25)' fill='#ffce0c'/>
    <path id='Icon_feather-star-3' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(386.018 427.25)' fill='#ffce0c'/> 
    <path id='Icon_feather-star-4' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(403.027 427.25)' fill='#919191'/>
    <path id='Icon_feather-star-5' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(420.036 427.25)' fill='#919191'/>" 
    
    ,4 => "<path id='Icon_feather-star' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(352 427.25)' fill='#ffce0c'/>
    <path id='Icon_feather-star-2' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(369.009 427.25)' fill='#ffce0c'/>
    <path id='Icon_feather-star-3' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(386.018 427.25)' fill='#ffce0c'/> 
    <path id='Icon_feather-star-4' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(403.027 427.25)' fill='#ffce0c'/>
    <path id='Icon_feather-star-5' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(420.036 427.25)' fill='#919191'/>"
    ,5 => " <path id='Icon_feather-star' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(352 427.25)' fill='#ffce0c'/>
    <path id='Icon_feather-star-2' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(369.009 427.25)' fill='#ffce0c'/>
    <path id='Icon_feather-star-3' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(386.018 427.25)' fill='#ffce0c'/> 
    <path id='Icon_feather-star-4' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(403.027 427.25)' fill='#ffce0c'/>
    <path id='Icon_feather-star-5' data-name='Icon feather-star' d='M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z' transform='translate(420.036 427.25)' fill='#ffce0c'/>"

    ];
$result = mysqli_query($link,$query);
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
                    
                    <?php
                    echo $array_estrela[$row['media_avaliacao']]
                    ?>
                    </g></svg>
                        
                        
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
                       
                        <span id="Duracao">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path id="Caminho_13" data-name="Caminho 13" d="M2.4,2.4A7.263,7.263,0,0,1,8,0a7.263,7.263,0,0,1,5.6,2.4A7.263,7.263,0,0,1,16,8a7.263,7.263,0,0,1-2.4,5.6A7.263,7.263,0,0,1,8,16a7.263,7.263,0,0,1-5.6-2.4A7.984,7.984,0,0,1,0,8,7.263,7.263,0,0,1,2.4,2.4Zm9.2,9.2.933-.933L9.2,7.333,8,2H6.667V8a1.21,1.21,0,0,0,.4.933.466.466,0,0,0,.267.133Z" fill="#2699fb"/></svg>
                        <?php echo $row["st_tempo"];?> min
                        </span>
                        <span id="Autor">
                        <a href="<?php echo "PerfilUsuario.php?id={$row['id_usuario']}"?>">
                            <?php
                            echo $row['st_nome'];
                            ?>
                        </a>
                    </span>
                    </div>
                </div>
            </section>
<?php
    }
}else{
    echo '<h3 id="Error"> Parece que ainda não temos receitas relacionadas a sua pesquisa =( </h3>';
};
?>
                       
        </content>



    </main>

  

</body>
</html>