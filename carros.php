<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carros</title>
    <link rel="stylesheet" href="assets/css/carros.css">
</head>
<body>
    <div class="header">
    </div>
    <?php
    include('includes/navbar.php');
    ?>
        <h1>Tesla Model S</h1>
    <div class="content">
        <div class="product-container">
        <div class="carousel">
        <img class="product-image" src="assets/img/Tesla1.jpeg" alt="Produto" id="carousel-image">
        <div class="carousel-buttons">
            <button id="prev-button">Anterior</button>
            <button id="next-button">Próxima</button>
        </div>
    </div>

            <div class="product-description">
                <table class="product-description-table">
                    <tr>
                        <th>Característica</th>
                        <th>Detalhe</th>
                    </tr>
                    <tr>
                        <td>Ano</td>
                        <td>2022</td>
                    </tr>
                    <tr>
                        <td>Combustível</td>
                        <td>Elétrico</td>
                    </tr>
                    <tr>
                        <td>Potência</td>
                        <td>1.034cv</td>
                    </tr>
                    <tr>
                        <td>Portas</td>
                        <td>4 portas</td>
                    </tr>
                    <tr>
                        <td>Tração</td>
                        <td>Tração nas quatro rodas</td>
                    </tr>
                    <tr>
                        <td>Câmbio</td>
                        <td>Automático</td>
                    </tr>
                    <tr>
                        <td>Tamanho do porta-malas</td>
                        <td>793 litros</td>
                    </tr>
                    <tr>
                        <td>Tamanho do tanque de combustível</td>
                        <td>Elétrico</td>
                    </tr>
                    <tr>
                        <td>Velocidade máxima</td>
                        <td>322km/h</td>
                    </tr>
                    <tr>
                        <td>Aceleração</td>
                        <td>0-100km/h em 2 segundos</td>
                    </tr>
                    <tr>
                        <td>Consumo</td>
                        <td>647 km</td>
                    </tr>
                </table>
            </div>

            <div class="product-buttons">
                <a class="product-button" href="compra.php">Comprar</a>
                <a class="product-button" href="aluguel.php">Alugar</a>
            </div>

            <div class="product-price">
                <p>R$1.200.000,00</p>
                <p>R$2000,00/dia</p>
            </div>
        </div>
    </div>
    <?php
    include('assets/js/carrosel.php');
    include('includes/footer.php');
    ?>
</body>
</html>