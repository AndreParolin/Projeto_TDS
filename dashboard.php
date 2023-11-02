<?php
session_start();

if (!isset($_SESSION['nome'])) {
    header("Location: ../index.php");
    exit();
}

$login = $_SESSION['nome'];

require_once('classe/Crud.php');
require_once('database/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$crud = new CrudProduto($db);

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            $crud->create($_POST);
            // Redirecionar para index.php após a criação bem-sucedida
            header("Location: index.php");
            exit();
            break;
        case 'read':
            $rows = $crud->read();
            break;
        default:
            $rows = $crud->read();
            break;
    }

} else {
    $rows = $crud->read();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard ADM</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div>
        <h1>Painel de Controle do ADM</h1>
        <p>Seja bem-vindo, <?php echo $login; ?></p>
        <a href="logout.php">Sair</a>

        <form method="POST" action="?action=create" enctype="multipart/form-data">

            <label for="nome_produto">Nome do Produto</label>
            <input type="text" name="nome_produto" required>

            <label for="ano">Ano</label>
            <input type="number" name="ano" required>

            <label for="combustivel">Combustível</label>
            <input type="text" name="combustivel" required>

            <label for="potencia">Potência</label>
            <input type="text" name="potencia" required>

            <label for="portas">Portas</label>
            <select name="portas">
                <option value="4 Portas">4 Portas</option>
                <option value="2 Portas">2 Portas</option>
            </select>

            <label for="tracao">Tração</label>
            <input type="text" name="tracao" required>

            <label for="cambio">Câmbio</label>
            <input type="text" name="cambio" required>

            <label for="porta_malas">Tamanho do Porta-malas</label>
            <input type="text" name="porta_malas" required>

            <label for="tanque">Tamanho do Tanque de Combustível</label>
            <input type="text" name="tanque" required>

            <label for="velocidade">Velocidade</label>
            <input type="text" name="velocidade" required>

            <label for="aceleracao">Aceleração</label>
            <input type="text" name="aceleracao" required>

            <label for="consumo">Consumo</label>
            <input type="text" name="consumo" required>

            <label for="qt_produtos">Quantidade do Produto</label>
            <input type="number" name="qt_produtos" required>

            <label for="marca">Marca</label>
            <input type="text" name="marca" required>

            <label for="foto_produto">Foto do Produto</label>
            <input type="file" name="foto_produto" required>

            <label for="preco">Preço</label>
            <input type="text" name="preco" required>

            <button type="submit">Cadastrar</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome do Produto</th>
                    <th>Ano</th>
                    <th>Combustível</th>
                    <th>Potência</th>
                    <th>Portas</th>
                    <th>Tração</th>
                    <th>Câmbio</th>
                    <th>Tamanho do Porta-malas</th>
                    <th>Tamanho do Tanque de Combustível</th>
                    <th>Velocidade</th>
                    <th>Aceleração</th>
                    <th>Consumo</th>
                    <th>Quantidade do Produto</th>
                    <th>Marca</th>
                    <th>Foto do Produto</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($rows)) {
                    foreach ($rows as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['id_produto'] . "</td>";
                        echo "<td>" . $row['nome_produto'] . "</td>";
                        echo "<td>" . $row['ano'] . "</td>";
                        echo "<td>" . $row['combustivel'] . "</td>";
                        echo "<td>" . $row['potencia'] . "</td>";
                        echo "<td>" . $row['portas'] . "</td>";
                        echo "<td>" . $row['tracao'] . "</td>";
                        echo "<td>" . $row['cambio'] . "</td>";
                        echo "<td>" . $row['porta_malas'] . "</td>";
                        echo "<td>" . $row['tanque'] . "</td>";
                        echo "<td>" . $row['velocidade'] . "</td>";
                        echo "<td>" . $row['aceleracao'] . "</td>";
                        echo "<td>" . $row['consumo'] . "</td>";
                        echo "<td>" . $row['qt_produtos'] . "</td>";
                        echo "<td>" . $row['marca'] . "</td>";
                        echo "<td>" . $row['foto_produto'] . "</td>";
                        echo "<td>" . $row['preco'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='17'>Não há registros a serem exibidos.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

        <?php include_once('includes/footer.php'); ?>
	
</body>
</html>