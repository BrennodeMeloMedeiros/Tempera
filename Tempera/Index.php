<!DOCTYPE html>
<?php
    require_once 'CLASSES/usuarios.php';
    $u = new USUARIO;
?>
<html lang="pt-br">
<head>
<!--=================================== Head ===================================-->
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS\Style.css">
    <link rel="stylesheet" type="text/css" href="CSS\Login.css">
    <script src="JS\Script.js"></script>
    <script src="JS\Login.js" defer></script>

    <title>Login & Cadastro</title>
<!--=================================== Head ===================================-->    
</head>
<body>
<!--=================================== Card ===================================-->
    <main class="card blue"> 
        <header>
            <p><strong> Cadastrar </strong></p>
            <img id="logo" src="/Tempera_V2/IMAGENS/Logo_Tempera.png">
            <p><strong> Logar </strong></p>
        </header>
        <content>
            <form autocomplete="off" id="Cadastro" method="POST">
                <div class="inputParent">
                    <input required type="Email" placeHolder="Email" name="RegisterEmail">
                    <span class="msgError"></span>
                </div>
                <div class="inputParent" >
                    <input required type="Text" placeHolder="Nome" pattern=".{0,25}"name="RegisterName">
                    <span class="msgError"></span>
                </div>
                <div class="inputParent" >  
                    <input required type="Password" placeHolder="Senha" pattern=".{6,}" name="RegisterPassword" id="rpd"> 
                    <span class="msgError"></span>
                </div>
                <div class="inputParent" >
                    <input required type="Password" placeHolder="Confirmar Senha" name="ConfirmPassword" id="rpdConfim">
                    <span class="msgError"></span>
                </div>
            </form>
            <div id="row"></div>
            <form autocomplete="off" id="Login" method="POST">
                <div class="inputParent">
                    <input required type="Email" placeHolder="Email" name="LoginEmail">
                    <span class="msgError"></span>
                </div>
                <div class="inputParent">
                    <input required type="Password" placeHolder="Senha" name="LoginPassword">
                    <span class="msgError"></span>
                </div>
            </form>
        </content>
        <footer>
            <button id="PressCadastro" form="Cadastro">Cadastrar</button>
            <button id="PressLogin" form="Login">Logar</button>
        </footer>
    </main>
<!--=================================== Card ===================================-->

<!--=================================== Back ===================================-->
<?php
if (isset($_POST["RegisterName"]))
{
    $nome = addslashes($_POST['RegisterName']);
    $email = addslashes($_POST['RegisterEmail']);
    $senha = addslashes($_POST['RegisterPassword']);
    $confirmarSenha = addslashes($_POST['ConfirmPassword']); 

    if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
    {
        $u->conectar("tempera","clovis-cartola.czcbeh0esbig.us-east-1.rds.amazonaws.com","tempera","Tempera_123");
        if($u->msgErro == "")
        {
            if($senha == $confirmarSenha)
            {
                if($u->cadastrar($nome,$email,$senha))
                {
                    header('Location:Home.php');
                }
                else
                {
                    ?>
                   <script>
                      Email2Error();
                 </script>
                    <?php
                }
            }
            else
            {
                ?>
                <div class="msg-erro">
                Confirme a senha corretamente!
                </div>
                <script>
                      ConfirmError();
                 </script>
                <?php   
            }
        }
        else
        {
            ?>
            <div class="msg-erro">
                <?php echo "Erro: ".$u->msgErro;?>
            </div>
            <?php
        }
    }
    else
    {
         ?> 
        <script>
                CampError();
        </script>
        <?php
    }
};

if (isset($_POST['LoginEmail']))
{   
    $email = addslashes($_POST['LoginEmail']);
    $senha = addslashes($_POST['LoginPassword']);
    if(!empty($email) && !empty($senha))
    {
        $u->conectar("tempera","clovis-cartola.czcbeh0esbig.us-east-1.rds.amazonaws.com","tempera","Tempera_123");
        if($u->msgErro == "")
        {
            if($u->logar($email, $senha))
            {
               header('Location:Home.php');
            }
            else
            {
            ?> 
            <script>
                    EmailError();
            </script>
            <?php 
            }
        }
        else
        {
            ?>
            <div class="msg-erro">
                <?php echo "Erro: ".$u->msgErro;?>
            </div>
            <?php
        }
    }else
    {
        ?> 
        <script>
                CampError();
        </script>
        <?php 
    }
};
?>

</body>
</html>