<?php
session_start();

require_once('classe/Usuario.php');
require_once('database/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$classUsuario = new Usuario($db);


$produtos = [];

$query = "SELECT * FROM produtos ";
$result = $db->query($query);

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $produtos[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="assets/css/princ.css">
</head>

<div class="header"></div>
<body>
<?php
include('includes/navbar.php');
?>

<div class="search-bar">
    <input type="text" class="search-input" id="search-input" placeholder="Pesquisar...">
    <button class="search-button" onclick="performSearch()">Pesquisar</button>
</div>
<div class="main-container">
<div class="container product-container">
    <div class="row">
        <?php
        foreach ($produtos as $produto) {
            echo '<div class="product-box">';
            echo '<img src="' . $produto["foto_produto"] . '" alt="' . $produto["nome_produto"] . '">';
            echo '<h2>' . $produto["nome_produto"] . '</h2>';
            echo '<h3>' . "R$" . $produto['preco'] . '</h3>';
            echo '<a href="carro.php?id_produto=' . $produto["id_produto"] . '">Visualizar Produto</a>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<?php
include("includes/footer.php");
?>
</div>
</body>
</html>
