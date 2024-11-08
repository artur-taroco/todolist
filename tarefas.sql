-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/11/2024 às 05:14
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tarefas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL,
  `nomeTarefa` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `statusTarefa` enum('pendente','em andamento','concluido') NOT NULL,
  `data_criacao` datetime DEFAULT current_timestamp(),
  `data_limite` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `nomeTarefa`, `descricao`, `statusTarefa`, `data_criacao`, `data_limite`) VALUES
(1, 'Estudar Laravel', 'Aplicar os conhecimentos de sala do curso de quinta feira.', 'em andamento', '2024-11-08 01:14:03', '2024-11-15 18:00:00'),
(2, 'Me divertir', 'Começar o dia jogando meu league of legends de cada dia, e tomar um belo cafe da manha(apenas depois do lol).', 'pendente', '2024-11-08 01:14:03', '2024-11-10 12:00:00'),
(3, 'Finalizar trabalho do professor Valdir', 'Completar o trabalho para ser entregue amanhã.', 'concluido', '2024-11-08 01:14:03', '2024-11-08 17:52:00'),
(4, 'Estudar para a prova', 'Fazer atividades, ler os slides e ajudar meus amigos com dificuldades nessa materia.', 'em andamento', '2024-11-08 01:14:03', '2024-11-29 20:13:00'),
(5, 'Construir um silo', 'Utilizar os materiais de construção para construir um silo em minha fazenda', 'pendente', '2024-11-08 01:14:03', '2024-11-25 10:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
