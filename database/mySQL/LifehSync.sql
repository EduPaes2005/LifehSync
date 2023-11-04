-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/11/2023 às 08:06
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
-- Banco de dados: `lifehsync`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `modality` enum('Trabalho','Leitura','Estudo','Outros...') DEFAULT NULL,
  `levelAccess` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `modality`, `levelAccess`) VALUES
(1, 'Edu.paes_', 'eduardo.l.p05@gmail.com', '$2y$10$8CHIyHLPy/0In9R1N5BmVuyYWVpSxi1bHl8.Z64F1VHjkbomd5.Pq', 'Estudo', 0),
(2, 'SIlvana.paes_', 'silvanasilvapaes307@gmail.com', '$2y$10$EnS3pSEMpr2lHIGFOrg99.gK.DAlF.RDnezl/ALJmxFd/QjJYdkcG', 'Trabalho', 0),
(3, 'Paulo_Neves', 'paulloocesar98@gmail.com', '$2y$10$lkgwmK53jATIsGnnMP9zS.dIOtTw3tpZdboUOiUiRMv50pKGVDaqW', 'Trabalho', 0),
(4, 'Manucamillyy', 'manubento1907@gmail.com', '$2y$10$g49HShOowrUJ9D2BNm1/FuRHvN8xfrS95d.gOXudh6c0p1V8JmGDm', 'Leitura', 0),
(5, 'Alexsandra', 'ale@gmail.com', '$2y$10$X07pLJUmqG3OzJsSvHz8hO3cby8dYpOFMeOEGvnm9Jq/KdloLuxfa', 'Estudo', 0),
(6, 'Donatham', 'donathan@gmail.com', '$2y$10$U47Cs76v50d50/UShaE6JuJ9ZZK6RTQCGj9u3CeyOs4iV4MSxkprC', NULL, 0),
(7, 'melissamoll', 'moll@gmail.com', '$2y$10$sYe3wg2nFfx.CI8UGMVd9eRYhAPnBRWB7pasV0Axu4r8WlNHWi83K', 'Trabalho', 0),
(8, 'Teste.123_', 'teste@gmail.com', '$2y$10$ZP5dh/kURgWylN3mIeCo4OznSRyaaz9hjzuusd6sbBnAgQBTaIlmm', NULL, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
