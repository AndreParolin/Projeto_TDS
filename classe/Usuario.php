<?php

use PSpell\Config;

include('database/conexao.php');

$db = new Conexao();

class Usuario{
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function cadastrar($nome, $email, $idade, $cpf, $senha, $confSenha){
        
        if($senha === $confSenha){

            $verificarExistente = $this->verificarExistente($email);
            if($verificarExistente){
                print "<script>alert('Email de usuario ja cadastrado!')</script>";
                return false;
            }

            $senhaCrip = password_hash($senha, PASSWORD_DEFAULT);

            $query = "INSERT vrumvrum (nome, email ,idade, cpf, senha) VALUES (?,?,?,?,?)";

            $stmt= $this->conn->prepare($query);
            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $idade);
            $stmt->bindValue(4, $cpf);
            $stmt->bindValue(5, $senhaCrip);
            $result = $stmt->execute();

            return $result;
            
        }

    }

    public function verificarExistente($email){
        $query = "SELECT COUNT(*) FROM vrumvrum WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1,$email);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }

    public function logar($login, $senha){
        $query = "SELECT * FROM vrumvrum WHERE email = :email OR nome = :nome ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':email', $login);
        $stmt->bindValue(':nome', $login);
        $stmt->execute();

        if($stmt->rowCount() == 1){
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($senha, $usuario['senha'])){
                return true;
            }
        }

        return false;
    }


    public function verificarAdm($login){
        $query = "SELECT adm FROM vrumvrum WHERE  email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':email', $login);
        $stmt->execute();

        if($stmt->rowCount() == 1){
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario['adm'] == 1;
        }

        return false;

    }
}
    ?>