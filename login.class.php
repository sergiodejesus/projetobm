<?php 
class login
{
    private $pdo;

    public function __Construct()
    {
        try
        {
            $this->pdo = new PDO("mysql:dbname=projetobm; host=localhost","root","101914",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }   

        catch(PDOException $e)
        {
            echo "FALHA DE CONEXÃO: " .$e->getMessage();
        }
    }

    public function logar($email, $senha)
    {
        if($this->existeUsuario($email,$senha)==true)
        {
            $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->execute();

            return $sql->fetch();
        }
        else
        {
            return false;
        }
    }
    public function getNome($id)
    {
        $sql = "SELECT nome FROM usuarios WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return $sql->fetch();
    }

    private function existeUsuario($email, $senha)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        if($sql->rowCount() > 0)
        {
           
            return true;
        }
        else
        {
            return false;
        }
    }
}
