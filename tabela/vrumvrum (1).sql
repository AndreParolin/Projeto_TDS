-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/11/2023 às 01:13
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vrumvrum`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `ano` int(4) NOT NULL,
  `combustivel` varchar(255) NOT NULL,
  `potencia` varchar(255) NOT NULL,
  `portas` varchar(255) NOT NULL,
  `tracao` varchar(255) NOT NULL,
  `cambio` varchar(255) NOT NULL,
  `porta_malas` varchar(255) NOT NULL,
  `tanque` varchar(255) NOT NULL,
  `velocidade` varchar(255) NOT NULL,
  `aceleracao` varchar(255) NOT NULL,
  `consumo` varchar(255) NOT NULL,
  `qt_produtos` int(10) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `foto_produto` varchar(255) NOT NULL,
  `preco` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `ano`, `combustivel`, `potencia`, `portas`, `tracao`, `cambio`, `porta_malas`, `tanque`, `velocidade`, `aceleracao`, `consumo`, `qt_produtos`, `marca`, `foto_produto`, `preco`) VALUES
(1, 'Tesla Model S', 2022, 'Elétrico', '1.034cv', '4 Portas', 'Tração nas quatro rodas', 'Automático', '793 Litros', 'Elétrico', '322km/h', '0-100km/h em 2s', '647km', 7, 'Tesla', 'foto_produtos/Tesla1.jpeg', '1.200.000,00'),
(2, 'Toyota Corolla', 2023, 'Gasolina', '169cv', '4 Portas', 'Dianteira', 'Automático', '470 Litros', '50 Litros', '210km/h', '0-100km/h em 9s', '12km/l cidade - 16km/l estrada', 23, 'Toyota', 'foto_produtos/Toyota_Corolla.jpg', '150.000,00'),
(3, 'Ford Mustang', 2023, 'Gasolina', '450cv', '2 Portas', 'Traseira', 'Automático de 10 marchas', '382 Litros', '61 Litros', '250km/h', '0-100km/h em 5s', '9km/l cidade - 11km/l estrada', 12, 'Ford', 'foto_produtos/Ford_Mustang.jpg', '579.999,99'),
(4, 'BMW X5 xDrive40i', 2023, 'Gasolina', '335cv', '4 Portas', 'Integral', 'Automático de 8 velocidades', '650 Litros', '83 Litros', '240km/h', '0 a 100km/h em 5,3s', '9km/l na cidade - 12km/l na estrada', 2, 'BMW', 'foto_produtos/BWM_X5_xDrive40i.jpg', '649.950,00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vrumvrum`
--

CREATE TABLE `vrumvrum` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idade` int(3) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `adm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vrumvrum`
--

INSERT INTO `vrumvrum` (`id`, `nome`, `email`, `idade`, `cpf`, `senha`, `adm`) VALUES
(8, 'André Coelho Parolin', 'andreparolin15@hotmail.com', 28, '14232842722', '$2y$10$t/rfj9CXzww8hYEtoPJf4eQMF.2yQWieQD34dZTmyJBIiDCELzZaW', 1),
(9, 'Henrique da Silva', 'henriquesilva@hotmail.com', 21, '12345678910', '$2y$10$0dsnbU7AG38/h.t8b0sQm.9OkU9pNl9FSRB8ihqb6fhroBGZ6kAAm', 0),
(10, 'Gregory Desiderio de Oliveira ', 'gregorydesederio@gmail.com', 18, '09588568935', '$2y$10$IudGjIgKoM2pHy.VDpAL0uvHb53PfREfeX6TpRI.EUkDpBYsdOYVu', 0),
(11, 'Pedro Andrade', 'pedroandrade@hotmail.com', 32, '10987654321', '$2y$10$sY9YU6EkGNC4usBkL.9iL.DUaLu5hjdsGbRbJ.omHiMHk9pa8f32q', 0),
(12, 'Luis', 'luis@hotmail.com', 21, '14232842722', '$2y$10$JhgUDF.Xvub6FGC5xwQ4..Bqmjfs5Mg36B2WW/Kg0Rdfy8FvX29yO', 0),
(13, 'Stuart Little', 'stuart@hotmail.com', 32, '34287607912', '$2y$10$hSa2x02fFmgyNXfhNjNzuuZPff5gCl6KhLkjrq0uAyLtjb1x0d1uW', 0),
(15, 'Rafael Oliveira', 'rafa777@gmail.com', 21, '11122233344', '$2y$10$IQyLX9QCsTfwCJjM/NcTvuubu.pgT86BOtcEQXRtdmW773dvRhMb.', 0),
(16, 'Luander Farinha', 'niko@gmail.com', 33, '44433322211', '$2y$10$17zXFyJr4HHXHcL8GYkaQOoqSHPqC89nIF7Nv7s7pqS/zHlNA7Uya', 0),
(17, 'Juan dos Santos', 'juan@gmail.com', 2323, '22211133344', '$2y$10$PccUQFr3sihVf780aRtL7Oqg5GsilDZ/Jlk3Flp1WMPYosfmGSDMa', 0),
(18, 'Gustavo', 'gus@email.com', 34, '33344411122', '$2y$10$3e6DjiyHNJnFBnziNJFpZ.9E4crS//FKSrxLtVljJoFuPSjN/Gqoq', 0),
(19, 'Salamaleko', 'sala@sala.com', 89, '44433322211', '$2y$10$.X5jDXZmQOr6anwou/uBBu8av15aARTVNw3aKVFSyZijyHI5rKj8y', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `vrumvrum`
--
ALTER TABLE `vrumvrum`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `vrumvrum`
--
ALTER TABLE `vrumvrum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
