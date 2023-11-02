<?php
session_start();

require_once('classe/Usuario.php');
require_once('database/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$classUsuario = new Usuario($db);

$produto = null;

// Verifica se um ID de produto foi passado via GET
if (isset($_GET['id_produto'])) {
    $id_produto = $_GET['id_produto'];

    // Armazena o ID do produto na sessão
    $_SESSION['id_produto'] = $id_produto;

    // Consulta SQL para buscar informações do produto pelo ID
    $sql = "SELECT * FROM produtos WHERE id_produto = :id_produto";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_produto', $id_produto);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Produto não encontrado.";
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>
    <link rel="stylesheet" href="assets/css/carros.css">
</head>
<div class="header"></div>
<body>
    <?php
    include('includes/navbar.php')
    ?>

    <div class="product-container">
        <h1><?php echo $produto['nome_produto'];?></h1>

        <div class="carousel-container">
            <button id="prev-button"></button>
            <img id="carousel-image" src="assets/img/Toyota_Corolla.jpg" alt="Imagem do Produto">
            <button id="next-button"></button>
            <div class="hint">Passe as imagens</div>
        </div>


        <table>
            <div class="product-table">
            <tr><th>Característica</th><th>Detalhe</th></tr>
                <tr><th>Ano:</th><td><?php echo $produto['ano']; ?></td></tr>
                <tr><th>Combustível:</th><td><?php echo $produto['combustivel']; ?></td></tr>
                <tr><th>Potência:</th><td><?php echo $produto['potencia']; ?></td></tr>
                <tr><th>Portas:</th><td><?php echo $produto['portas']; ?></td></tr>
                <tr><th>Tração:</th><td><?php echo $produto['tracao']; ?></td></tr>
                <tr><th>Câmbio:</th><td><?php echo $produto['cambio']; ?></td></tr>
                <tr><th>Tamanho do Porta-malas:</th><td><?php echo $produto['porta_malas']; ?></td></tr>
                <tr><th>Velocidade:</th><td><?php echo $produto['velocidade']; ?></td></tr>
                <tr><th>Aceleração:</th><td><?php echo $produto['aceleracao']; ?></td></tr>
                <tr><th>Consumo:</th><td><?php echo $produto['consumo']; ?></td></tr>
                <tr><th>Marca:</th><td><?php echo $produto['marca']; ?></td></tr>
            </div>
        </table>
        <div class="product-buttons">
        <a class="product-button" href="compra.php?id_produto=<?php echo $produto['id_produto']; ?>">Comprar</a>
        <a class="product-button" href="aluguel.php?id_produto=<?php echo $produto['id_produto']; ?>">Alugar</a>

        </div>
        
        <div class="product-price">
            <p><?php echo "R$" . $produto['preco'] ?></p>
            <p>R$2000,00/dia</p>
        </div>
    </div>
    <?php
    include('includes/footer.php')
    ?>

<script>
    const images = ["Toyota_Corolla.jpg", "Toyota_Corolla_2.jfif", "Toyota_Corolla_3.jfif"];
    let currentIndex = 0;

    const prevButton = document.getElementById("prev-button");
    const nextButton = document.getElementById("next-button");
    const carouselImage = document.getElementById("carousel-image");

    function updateImage() {
        carouselImage.src = `assets/img/${images[currentIndex]}`;
    }

    prevButton.addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateImage();
    });

    nextButton.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % images.length;
        updateImage();
    });
</script>
<script>
    const hint = document.querySelector('.hint');
const carouselContainer = document.querySelector('.carousel-container');

carouselContainer.addEventListener('mousemove', (e) => {
    hint.style.display = 'block';

    const containerRect = carouselContainer.getBoundingClientRect();
    const leftOffset = e.clientX - containerRect.left - hint.clientWidth / 2;
    const topOffset = e.clientY - containerRect.top - hint.clientHeight - 10;

    hint.style.left = leftOffset + 'px';
    hint.style.top = topOffset + 'px';
});

carouselContainer.addEventListener('mouseout', () => {
    hint.style.display = 'none';
});
</script>
<script>
    <?php
    if (isset($_GET['id_produto'])) {
    $id_produto = $_GET['id_produto'];
    
    // Armazena o id_produto na memória local (localStorage)
    echo '<script>';
    echo 'localStorage.setItem("id_produto", ' . $id_produto . ');';
    echo '</script>';
    }
    ?>
</script>

</body>
</html>