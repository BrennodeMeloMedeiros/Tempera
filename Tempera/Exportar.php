<?php 

session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: index.php");
    exit;
    
} ;
$link = mysqli_connect("clovis-cartola.czcbeh0esbig.us-east-1.rds.amazonaws.com", "tempera", "Tempera_123", "tempera");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else {
    $id = $_SESSION['id_usuario'];
        
    function validarIngredientes($ingrediente){
        global $link, $id;
        $viewTable = "select * from tb_geladeira where st_nomeIngrediente = '{$ingrediente}' and id_usuario = '{$id}'";
        $execute = mysqli_query($link,$viewTable);
        if(!mysqli_num_rows($execute)){
            $query = "insert into tb_geladeira(id_usuario,st_nomeIngrediente) values('{$id}','{$ingrediente}')";
            mysqli_query($link, $query);
        }
    }

    function limparLista($ingrediente){
        global $link, $id;
        $deleteQuery= "delete from tb_lista where id_usuario = '{$id}'";
        mysqli_query($link,$deleteQuery);
    }

    function adicionarLista($ingrediente){
        global $link, $id;
        $addIngre = "insert into tb_lista (id_usuario, st_nomeIngrediente) values ('{$id}','{$ingrediente}')";
        mysqli_query($link,$addIngre);
    }

    foreach($_POST as $ingre){
        if($_GET['Page'] == 'Lista-Salvar'){
            adicionarLista($ingre);
        }else if($_GET['Page'] == 'Lista-Exportar'){
            validarIngredientes($ingre);
            limparLista($ingre);
        };
        
    
    }   
    header('location:Lista.php');                

}
?>

