<?php

Class Usuario
{
    private $pdo;
    public $msgErro = "";
    Public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario, $senha);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }                
       
    }  

    Public function cadastrar($nome, $email, $senha)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id_usuario FROM tb_usuario WHERE st_email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false;
        }
        else
        {
        $sql = $pdo->prepare("INSERT INTO tb_usuario (st_nome, st_email, st_senha) VALUE (:n, :e, :s )");

        $sql->bindValue(":n",$nome);
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        $dado = $sql->fetch();
        session_start();
        $_SESSION['id_usuario'] = $dado['id_usuario'];
        return true;
        }
    }

    Public function logar($email, $senha)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id_usuario FROM tb_usuario WHERE st_email = :e AND st_senha = :s");

        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            //entrando no sistema(sessão)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; 
        }
        else
        {
            return false;
        }
    }
}
?>