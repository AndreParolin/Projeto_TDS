<?php
session_start();

require_once('classe/Usuario.php');
require_once('database/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$classUsuario = new Usuario($db);

if(isset($_POST['logar'])){
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    

    if($classUsuario->logar($login, $senha)){
        if($classUsuario->verificarAdm($login)){
            $_SESSION['nome'] = $login;
            $_SESSION['adm'] = true; 
            header("Location: dashboard.php");
            exit();
        }else{
            $_SESSION['nome'] = $login;
            header("Location: index.php");
            exit();
        }
       
    }else{
        echo "<script>alert('Login inválido')</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="assets/css/taco.css">
</head>
<body>
    <div>
        <h1>Login</h1>
        <form action="" method="post">

            <label for="login">Email ou Nome </label>
            <input type="text" name="login" required>

            <label for="senha">Senha</label>
            <input type="password" name="senha" required>

            <button type="submit" name="logar">Logar</button>

        </form>
        <a href="cadastro.php">Criar conta</a>
        <a href="recuperar_senha.php">Esqueci minha senha</a>
        <a href="index.php">Voltar a página inicial</a>
    </div>

</body>
</html>