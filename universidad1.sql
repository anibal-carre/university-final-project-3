-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/08/2023 às 21:05
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `university1`
--
CREATE DATABASE IF NOT EXISTS `university1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `university1`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `alumnos_materias`
--
-- Criação: 05/08/2023 às 13:53
--

CREATE TABLE `alumnos_materias` (
  `alumno_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `maestros_materias`
--
-- Criação: 05/08/2023 às 13:53
--

CREATE TABLE `maestros_materias` (
  `maestro_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `materias`
--
-- Criação: 05/08/2023 às 13:53
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas`
--
-- Criação: 05/08/2023 às 13:54
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  `materia_id` int(11) DEFAULT NULL,
  `nota` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--
-- Criação: 05/08/2023 às 13:53
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `rol` enum('Administrador','Maestro','Alumno') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `direccion`, `fecha_nacimiento`, `rol`) VALUES
(1, 'Laura', 'Gómez', 'laura@example.com', 'adminpass', 'Avenida Administración 123', '1985-05-15', ''),
(2, 'Daniel', 'Pérez', 'daniel@example.com', 'rootpass', 'Calle Principal 456', '1980-12-01', ''),
(3, 'María', 'Rodríguez', 'maria@example.com', 'profesorpass', 'Plaza Maestros 789', '1978-08-22', 'Maestro'),
(4, 'Carlos', 'Hernández', 'carlos@example.com', 'edupass', 'Carretera del Saber 246', '1983-04-17', 'Maestro'),
(5, 'Ana', 'López', 'ana@example.com', 'estupass', 'Calle del Saber 987', '1995-11-09', 'Alumno'),
(6, 'Juan', 'Martínez', 'juan@example.com', 'sabepass', 'Avenida del Conocimiento 654', '1998-07-03', 'Alumno'),
(7, 'Laura', 'González', 'laura2@example.com', 'cientificopass', 'Paseo de la Investigación 321', '1997-02-18', 'Alumno'),
(8, 'Andrés', 'Sánchez', 'andres@example.com', 'curiosopass', 'Camino de la Curiosidad 789', '1996-09-25', 'Alumno'),
(9, 'Valentina', 'Ramírez', 'valentina@example.com', 'aprendizpass', 'Calle del Aprendizaje 456', '1999-01-11', 'Alumno'),
(10, 'Alejandro', 'Díaz', 'alejandro@example.com', 'conocimientopass', 'Plaza del Saber 123', '2000-06-27', 'Alumno');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alumnos_materias`
--
ALTER TABLE `alumnos_materias`
  ADD PRIMARY KEY (`alumno_id`,`materia_id`),
  ADD KEY `materia_id` (`materia_id`);

--
-- Índices de tabela `maestros_materias`
--
ALTER TABLE `maestros_materias`
  ADD PRIMARY KEY (`maestro_id`,`materia_id`),
  ADD KEY `materia_id` (`materia_id`);

--
-- Índices de tabela `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno_id` (`alumno_id`),
  ADD KEY `materia_id` (`materia_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `alumnos_materias`
--
ALTER TABLE `alumnos_materias`
  ADD CONSTRAINT `alumnos_materias_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `alumnos_materias_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`);

--
-- Restrições para tabelas `maestros_materias`
--
ALTER TABLE `maestros_materias`
  ADD CONSTRAINT `maestros_materias_ibfk_1` FOREIGN KEY (`maestro_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `maestros_materias_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`);

--
-- Restrições para tabelas `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
