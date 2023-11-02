<?php
require_once('classe/Usuario.php');
require_once('database/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$classUsuario = new Usuario($db);

if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $confSenha = $_POST['confSenha'];

    // Verifique se a senha atende aos requisitos
    if (strlen($senha) < 8 || !preg_match('/[0-9]/', $senha) || !preg_match('/[!@#$%^&*()_+{}":;<>,.?~]/', $senha)) {
        print "<script> alert('A senha deve ter no mínimo 8 caracteres, pelo menos um número e pelo menos um caractere especial.')</script>";
    } else {
        // A senha atende aos requisitos, prossiga com o cadastro
        if($classUsuario->cadastrar($nome, $email, $idade, $cpf, $senha, $confSenha)){
            print "<script> alert('Cadastro efetuado com sucesso!'); window.location = 'login.php';</script>";
        } else {
            print "<script> alert('Erro ao Cadastrar')</script>";
        }
        
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
    <link rel="stylesheet" href="assets/css/taco.css">
</head>
<body>
    <div>
    <h1>Cadastro</h1>

    <form action="" method="POST">
         
        <label for="nome">Nome Completo</label>
        <input type="text" name="nome" required>

        <label for="email">Email</label>
        <input type="email" name="email" required>

        <label for="idade">Idade</label>
        <input type="number" name="idade" required>

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" required>

        <label for="senha">Senha</label>
        <input type="password" name="senha" required>

        <label for="confSenha">Confirmar Senha</label>
        <input type="password" name="confSenha" required>

        <button type="submit" name="cadastrar">Cadastrar</button>        
    </form>
    <a href="login.php">Voltar à tela de login</a>
    <a href="index.php">Voltar a página inicial</a>
    </div>
</body>
</html>