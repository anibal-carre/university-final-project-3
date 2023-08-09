-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/08/2023 às 17:27
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
-- Banco de dados: `universidad1`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id_calificacion` int(11) NOT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `calificaciones`
--

INSERT INTO `calificaciones` (`id_calificacion`, `id_alumno`, `id_materia`, `calificacion`) VALUES
(1, 9, 1, 90),
(2, 9, 2, 90),
(5, 17, 2, 70),
(32, 18, 1, NULL),
(38, 18, 4, 90),
(39, 18, 11, NULL),
(40, 18, 12, NULL),
(41, 18, 7, 85),
(42, 18, 5, NULL),
(45, 17, 7, 96),
(46, 17, 17, NULL),
(47, 17, 11, NULL),
(48, 17, 5, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre`) VALUES
(1, 'Matemáticas'),
(2, 'Física'),
(4, 'Biologia'),
(5, 'Ingles'),
(7, 'Programación'),
(11, 'Diseño Grafico'),
(12, 'Informatica'),
(16, 'Business'),
(17, 'Educación'),
(18, 'Portuguez');

-- --------------------------------------------------------

--
-- Estrutura para tabela `materias_inscritas`
--

CREATE TABLE `materias_inscritas` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `materias_inscritas`
--

INSERT INTO `materias_inscritas` (`id`, `id_alumno`, `id_materia`) VALUES
(5, 9, 2),
(6, 9, 1),
(7, 17, 2),
(34, 18, 1),
(40, 18, 4),
(41, 18, 11),
(42, 18, 12),
(43, 18, 7),
(44, 18, 5),
(47, 17, 7),
(48, 17, 17),
(49, 17, 11),
(50, 17, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL,
  `matricula` int(10) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `rol` enum('ADMIN','MAESTRO','ALUMNO') DEFAULT NULL,
  `materia_asignada` varchar(100) DEFAULT '0',
  `materias_inscritas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `matricula`, `nombre`, `apellido`, `correo_electronico`, `contrasena`, `direccion`, `fecha_nacimiento`, `rol`, `materia_asignada`, `materias_inscritas`) VALUES
(1, NULL, 'Laura', 'Gómez', 'laura@example.com', 'adminpass', 'Avenida Administración 123', '1985-05-15', 'ADMIN', NULL, '2'),
(2, NULL, 'Daniel', 'Pérez', 'daniel@example.com', 'rootpass', 'Calle Principal 456', '1980-12-01', 'ADMIN', NULL, NULL),
(4, NULL, 'Carlos', 'Hernández', 'carlos@example.com', 'edupass', 'Carretera del Saber 246', '1983-04-17', 'MAESTRO', '2', NULL),
(5, 789014, 'Ana Maria', 'López', 'ana@example.com', 'estupass', 'Calle del Saber 987', '1998-07-19', 'ALUMNO', NULL, NULL),
(6, 345678, 'Juan', 'Martínez', 'juan@example.com', 'sabepass', 'Avenida del Conocimiento 654', '1998-07-03', 'ALUMNO', NULL, NULL),
(7, 901234, 'Laura', 'González', 'laura2@example.com', 'cientificopass', 'Paseo de la Investigación 321', '1997-02-18', 'ALUMNO', NULL, NULL),
(8, 567890, 'Andrés', 'Sánchez', 'andres@example.com', 'curiosopass', 'Camino de la Curiosidad 789', '1996-09-25', 'ALUMNO', '0', NULL),
(9, 210987, 'Valentina', 'Ramírez', 'valentina@example.com', 'aprendizpass', 'Calle del Aprendizaje 456', '1999-01-11', 'ALUMNO', NULL, NULL),
(10, 654321, 'Alejandro', 'Díaz', 'alejandro@example.com', 'conocimientopass', 'Plaza del Saber 123', '2000-06-27', 'ALUMNO', NULL, NULL),
(14, NULL, 'Josef', 'Martinez', 'josef@gmail.com', 'inter', 'Miami 567', '1996-07-25', 'MAESTRO', '4', NULL),
(15, NULL, 'Carlos', 'Medina', 'carlos2@example.com', 'carlos', 'Stanford 554', '1970-07-08', 'MAESTRO', '11', NULL),
(17, 466560, 'Angel', 'Alvarez', 'angel@gmail.com', 'angel', 'Rua São João 468', '2001-07-24', 'ALUMNO', NULL, '2,7,17,11,5'),
(18, 664321, 'Nicole', 'Luz', 'nicole@gmail.com', 'nicole', 'Rua Rio 334', '2002-11-20', 'ALUMNO', NULL, '1,4,11,12,7,5'),
(19, NULL, 'Rodolfo', 'Ramirez', 'rodolfo@gmail.com', 'rodolfo', 'Calle Esperanza 235', '1986-06-08', 'MAESTRO', '17', NULL),
(20, NULL, 'Erica', 'Diaz', 'erica@gmail.com', 'erica', 'Calle Principal 688', '1980-10-21', 'MAESTRO', '0', NULL),
(21, NULL, 'João', 'Da Silva', 'joao@gmail.com', 'joaos', 'Rua São Paulo 709', '1982-06-30', 'MAESTRO', '18', NULL),
(22, NULL, 'Tania', 'Correia', 'tania@gmail.com', 'tania', 'Rua Colorado 555', '1968-11-19', 'MAESTRO', '0', NULL),
(23, NULL, 'Ivan', 'Carreño', 'ivan@gmail.com', 'ivan123', 'Robles 634', '1988-06-21', 'MAESTRO', '7', NULL),
(24, 645800, 'Aroldo', 'Padilla', 'aroldo@gmail.com', 'aroldo', 'Calle Charallave 452', '2002-08-08', 'ALUMNO', '0', NULL),
(25, 325635, 'Luis', 'Garcia', 'luis@gmail.com', 'luis', 'Calle Aguila 457', '2005-07-28', 'ALUMNO', '0', NULL),
(27, 435778, 'Juan', 'Carlos', 'juan@gmail.com', 'juan', 'Plaza 345', '2000-07-03', 'ALUMNO', '0', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Índices de tabela `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Índices de tabela `materias_inscritas`
--
ALTER TABLE `materias_inscritas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `materias_inscritas`
--
ALTER TABLE `materias_inscritas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `usuarios` (`user_id`),
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`);

--
-- Restrições para tabelas `materias_inscritas`
--
ALTER TABLE `materias_inscritas`
  ADD CONSTRAINT `materias_inscritas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `usuarios` (`user_id`),
  ADD CONSTRAINT `materias_inscritas_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
