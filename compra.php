<?php
if (isset($_GET['id_produto'])) {
    $id_produto = $_GET['id_produto'];
    
    // Verifique se o botão de cancelamento foi clicado
    if (isset($_POST['cancelar'])) {
        // Redirecione de volta para carro.php com id_produto na URL
        header("Location: carro.php?id_produto=" . $id_produto);
        exit; // Encerre o script para garantir que o redirecionamento ocorra.
    }
} else {
    // Lida com o caso em que o id_produto não está definido na URL.
    echo "ID de produto não encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
    <link rel="stylesheet" href="assets/css/asas.css">
</head>
<body>
    <div class="container">
    <div class="imagem-esquerda"></div>
    <div class="conteudo">
        <form action="" method="post">
            <label for="">Nome</label>
            <input type="text" name="nome" required>

            <label for="">Email</label>
            <input type="text" name="nome" required>

            <label for="">CPF</label>
            <input type="text" name="nome" required>

            <label for="">CNH</label>
            <input type="text" name="nome" required>

            <label for="">Idade:</label>
            <select name="idade" id="idade" required>
                <option value="-">-</option>
                <option value="18-20">18-20</option>
                <option value="21-24">21-24</option>
                <option value="25+">25+</option>
            </select>

            <label for="">Forma de Pagamento:</label>
            <select name="pagar" id="pagar" required>
                <option value="-">-</option>
                <option value="pix">Pix</option>
                <option value="debito">Débito</option>
                <option value="credito">Crédito</option>
                <option value="boleto">Boleto</option>
            </select>

            <input type="submit" value="Comprar" name="comprar">
            <a href="carro.php?id_produto=<?php echo $id_produto; ?>">Cancelar</a>
        </form>
    </div>
    </div>
</body>
</html>