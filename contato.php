<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Contato</title>
    <link rel="stylesheet" href="assets/css/taco.css">
</head>
<body>
    <div class="container">
        <h1>Entre em Contato</h1>
        <form action="processar_formulario.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="mensagem" required></textarea>

                <button type="submit">Enviar</button>
                <a href="index.php">Voltar</a>
            </div>
        </form>
    </div>
</body>
</html>
 