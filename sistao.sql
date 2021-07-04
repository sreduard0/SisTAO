-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Jul-2021 às 21:04
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `permissions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `applications`
--

INSERT INTO `applications` (`id`, `name`, `permissions_id`) VALUES
(1, 'sped', 1),
(2, 'SISBOL', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cities`
--

INSERT INTO `cities` (`id`, `name`, `state`, `updated_at`, `created_at`) VALUES
(1, 'Canoas', 'RS', NULL, NULL),
(2, 'Montenegro', 'RS', NULL, NULL),
(4, 'Aceguá', 'RS', '2021-05-25 01:45:39', NULL),
(5, 'Água Santa', 'RS', '2021-05-25 01:45:39', NULL),
(6, 'Agudo', 'RS', '2021-05-25 01:45:39', NULL),
(7, 'Ajuricaba', 'RS', '2021-05-25 01:45:39', NULL),
(8, 'Alecrim', 'RS', '2021-05-25 01:45:39', NULL),
(9, 'Alegrete', 'RS', '2021-05-25 01:45:39', NULL),
(10, 'Alegria', 'RS', '2021-05-25 01:45:39', NULL),
(11, 'Almirante Tamandaré do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(12, 'Alpestre', 'RS', '2021-05-25 01:45:39', NULL),
(13, 'Alto Alegre', 'RS', '2021-05-25 01:45:39', NULL),
(14, 'Alto Feliz', 'RS', '2021-05-25 01:45:39', NULL),
(15, 'Alvorada', 'RS', '2021-05-25 01:45:39', NULL),
(16, 'Amaral Ferrador', 'RS', '2021-05-25 01:45:39', NULL),
(17, 'Ametista do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(18, 'André da Rocha', 'RS', '2021-05-25 01:45:39', NULL),
(19, 'Anta Gorda', 'RS', '2021-05-25 01:45:39', NULL),
(20, 'Antônio Prado', 'RS', '2021-05-25 01:45:39', NULL),
(21, 'Arambaré', 'RS', '2021-05-25 01:45:39', NULL),
(22, 'Araricá', 'RS', '2021-05-25 01:45:39', NULL),
(23, 'Aratiba', 'RS', '2021-05-25 01:45:39', NULL),
(24, 'Arroio do Meio', 'RS', '2021-05-25 01:45:39', NULL),
(25, 'Arroio do Padre', 'RS', '2021-05-25 01:45:39', NULL),
(26, 'Arroio do Sal', 'RS', '2021-05-25 01:45:39', NULL),
(27, 'Arroio do Tigre', 'RS', '2021-05-25 01:45:39', NULL),
(28, 'Arroio dos Ratos', 'RS', '2021-05-25 01:45:39', NULL),
(29, 'Arroio Grande', 'RS', '2021-05-25 01:45:39', NULL),
(30, 'Arvorezinha', 'RS', '2021-05-25 01:45:39', NULL),
(31, 'Augusto Pestana', 'RS', '2021-05-25 01:45:39', NULL),
(32, 'Áurea', 'RS', '2021-05-25 01:45:39', NULL),
(33, 'Bagé', 'RS', '2021-05-25 01:45:39', NULL),
(34, 'Balneário Pinhal', 'RS', '2021-05-25 01:45:39', NULL),
(35, 'Barão', 'RS', '2021-05-25 01:45:39', NULL),
(36, 'Barão de Cotegipe', 'RS', '2021-05-25 01:45:39', NULL),
(37, 'Barão do Triunfo', 'RS', '2021-05-25 01:45:39', NULL),
(38, 'Barra do Guarita', 'RS', '2021-05-25 01:45:39', NULL),
(39, 'Barra do Quaraí', 'RS', '2021-05-25 01:45:39', NULL),
(40, 'Barra do Ribeiro', 'RS', '2021-05-25 01:45:39', NULL),
(41, 'Barra do Rio Azul', 'RS', '2021-05-25 01:45:39', NULL),
(42, 'Barra Funda', 'RS', '2021-05-25 01:45:39', NULL),
(43, 'Barracão Barros Cassal', 'RS', '2021-05-25 01:45:39', NULL),
(44, 'Benjamin Constant do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(45, 'Bento Gonçalves', 'RS', '2021-05-25 01:45:39', NULL),
(46, 'Boa Vista das Missões', 'RS', '2021-05-25 01:45:39', NULL),
(47, 'Boa Vista do Buricá', 'RS', '2021-05-25 01:45:39', NULL),
(48, 'Boa Vista do Cadeado', 'RS', '2021-05-25 01:45:39', NULL),
(49, 'Boa Vista do Incra', 'RS', '2021-05-25 01:45:39', NULL),
(50, 'Boa Vista do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(51, 'Bom Jesus', 'RS', '2021-05-25 01:45:39', NULL),
(52, 'Bom Princípio', 'RS', '2021-05-25 01:45:39', NULL),
(53, 'Bom Progresso', 'RS', '2021-05-25 01:45:39', NULL),
(54, 'Bom Retiro do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(55, 'Boqueirão do Leão', 'RS', '2021-05-25 01:45:39', NULL),
(56, 'Bossoroca', 'RS', '2021-05-25 01:45:39', NULL),
(57, 'Bozano', 'RS', '2021-05-25 01:45:39', NULL),
(58, 'Braga', 'RS', '2021-05-25 01:45:39', NULL),
(59, 'Brochier', 'RS', '2021-05-25 01:45:39', NULL),
(60, 'Butiá\r\n', 'RS', '2021-05-25 01:45:39', NULL),
(61, 'Caçapava do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(62, 'Cacequi', 'RS', '2021-05-25 01:45:39', NULL),
(63, 'Cachoeira do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(64, 'Cachoeirinha', 'RS', '2021-05-25 01:45:39', NULL),
(65, 'Cacique Doble', 'RS', '2021-05-25 01:45:39', NULL),
(66, 'Caibaté', 'RS', '2021-05-25 01:45:39', NULL),
(67, 'Caiçara', 'RS', '2021-05-25 01:45:39', NULL),
(68, 'Camaquã', 'RS', '2021-05-25 01:45:39', NULL),
(69, 'Camargo', 'RS', '2021-05-25 01:45:39', NULL),
(70, 'Cambará do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(71, 'Campestre da Serra', 'RS', '2021-05-25 01:45:39', NULL),
(72, 'Campina das Missões', 'RS', '2021-05-25 01:45:39', NULL),
(73, 'Campinas do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(74, 'Campo Bom', 'RS', '2021-05-25 01:45:39', NULL),
(75, 'Campo Novo', 'RS', '2021-05-25 01:45:39', NULL),
(76, 'Campos Borges', 'RS', '2021-05-25 01:45:39', NULL),
(77, 'Candelária', 'RS', '2021-05-25 01:45:39', NULL),
(78, 'Cândido Godói', 'RS', '2021-05-25 01:45:39', NULL),
(79, 'Candiota', 'RS', '2021-05-25 01:45:39', NULL),
(80, 'Canela', 'RS', '2021-05-25 01:45:39', NULL),
(81, 'Canguçu', 'RS', '2021-05-25 01:45:39', NULL),
(82, 'Canoas', 'RS', '2021-05-25 01:45:39', NULL),
(83, 'Canudos do Vale', 'RS', '2021-05-25 01:45:39', NULL),
(84, 'Capão Bonito do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(85, 'Capão da Canoa', 'RS', '2021-05-25 01:45:39', NULL),
(86, 'Capão do Cipó', 'RS', '2021-05-25 01:45:39', NULL),
(87, 'Capão do Leão', 'RS', '2021-05-25 01:45:39', NULL),
(88, 'Capela de Santana', 'RS', '2021-05-25 01:45:39', NULL),
(89, 'Capitão', 'RS', '2021-05-25 01:45:39', NULL),
(90, 'Capivari do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(91, 'Caraá', 'RS', '2021-05-25 01:45:39', NULL),
(92, 'Carazinho', 'RS', '2021-05-25 01:45:40', NULL),
(93, 'Carlos Barbosa', 'RS', '2021-05-25 01:45:40', NULL),
(94, 'Carlos Gomes', 'RS', '2021-05-25 01:45:40', NULL),
(95, 'Casca', 'RS', '2021-05-25 01:45:40', NULL),
(96, 'Caseiros', 'RS', '2021-05-25 01:45:40', NULL),
(97, 'Catuípe', 'RS', '2021-05-25 01:45:40', NULL),
(98, 'Caxias do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(99, 'Centenário', 'RS', '2021-05-25 01:45:40', NULL),
(100, 'Cerrito', 'RS', '2021-05-25 01:45:40', NULL),
(101, 'Cerro Branco', 'RS', '2021-05-25 01:45:40', NULL),
(102, 'Cerro Grande', 'RS', '2021-05-25 01:45:40', NULL),
(103, 'Cerro Grande do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(104, 'Cerro Largo', 'RS', '2021-05-25 01:45:40', NULL),
(105, 'Chapada', 'RS', '2021-05-25 01:45:40', NULL),
(106, 'Charqueadas', 'RS', '2021-05-25 01:45:40', NULL),
(107, 'Charrua', 'RS', '2021-05-25 01:45:40', NULL),
(108, 'Chiapetta', 'RS', '2021-05-25 01:45:40', NULL),
(109, 'Chuí', 'RS', '2021-05-25 01:45:40', NULL),
(110, 'Chuvisca', 'RS', '2021-05-25 01:45:40', NULL),
(111, 'Cidreira', 'RS', '2021-05-25 01:45:40', NULL),
(112, 'Ciríaco', 'RS', '2021-05-25 01:45:40', NULL),
(113, 'Colinas', 'RS', '2021-05-25 01:45:40', NULL),
(114, 'Colorado', 'RS', '2021-05-25 01:45:40', NULL),
(115, 'Condor', 'RS', '2021-05-25 01:45:40', NULL),
(116, 'Constantina', 'RS', '2021-05-25 01:45:40', NULL),
(117, 'Coqueiro Baixo', 'RS', '2021-05-25 01:45:40', NULL),
(118, 'Coqueiros do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(119, 'Coronel Barros', 'RS', '2021-05-25 01:45:40', NULL),
(120, 'Coronel Bicaco', 'RS', '2021-05-25 01:45:40', NULL),
(121, 'Coronel Pilar', 'RS', '2021-05-25 01:45:40', NULL),
(122, 'Cotiporã', 'RS', '2021-05-25 01:45:40', NULL),
(123, 'Coxilha', 'RS', '2021-05-25 01:45:40', NULL),
(124, 'Crissiumal', 'RS', '2021-05-25 01:45:40', NULL),
(125, 'Cristal', 'RS', '2021-05-25 01:45:40', NULL),
(126, 'Cristal do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(127, 'Cruz Alta', 'RS', '2021-05-25 01:45:40', NULL),
(128, 'Cruzaltense', 'RS', '2021-05-25 01:45:40', NULL),
(129, 'Cruzeiro do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(130, 'David Canabarro', 'RS', '2021-05-25 01:45:40', NULL),
(131, 'Derrubadas', 'RS', '2021-05-25 01:45:40', NULL),
(132, 'Dezesseis de Novembro', 'RS', '2021-05-25 01:45:40', NULL),
(133, 'Dilermando de Aguiar', 'RS', '2021-05-25 01:45:40', NULL),
(134, 'Dois Irmãos', 'RS', '2021-05-25 01:45:40', NULL),
(135, 'Dois Irmãos das Missões', 'RS', '2021-05-25 01:45:40', NULL),
(136, 'Dois Lajeados', 'RS', '2021-05-25 01:45:40', NULL),
(137, 'Dom Feliciano', 'RS', '2021-05-25 01:45:40', NULL),
(138, 'Dom Pedrito', 'RS', '2021-05-25 01:45:40', NULL),
(139, 'Dom Pedro de Alcântara', 'RS', '2021-05-25 01:45:40', NULL),
(140, 'Dona Francisca', 'RS', '2021-05-25 01:45:40', NULL),
(141, 'Doutor Maurício Cardoso', 'RS', '2021-05-25 01:45:40', NULL),
(142, 'Doutor Ricardo', 'RS', '2021-05-25 01:45:40', NULL),
(143, ' Eldorado do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(144, 'Encantado', 'RS', '2021-05-25 01:45:40', NULL),
(145, 'Encruzilhada do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(146, 'Engenho Velho', 'RS', '2021-05-25 01:45:40', NULL),
(147, 'Entre-Ijuís', 'RS', '2021-05-25 01:45:40', NULL),
(148, 'Entre Rios do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(149, 'Erebango', 'RS', '2021-05-25 01:45:40', NULL),
(150, 'Erechim', 'RS', '2021-05-25 01:45:40', NULL),
(151, 'Ernestina', 'RS', '2021-05-25 01:45:40', NULL),
(152, 'Erval Grande', 'RS', '2021-05-25 01:45:40', NULL),
(153, 'Erval Seco', 'RS', '2021-05-25 01:45:40', NULL),
(154, 'Esmeralda', 'RS', '2021-05-25 01:45:40', NULL),
(155, 'Esperança do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(156, 'Espumoso', 'RS', '2021-05-25 01:45:40', NULL),
(157, 'Estação', 'RS', '2021-05-25 01:45:40', NULL),
(158, 'Estância Velha', 'RS', '2021-05-25 01:45:40', NULL),
(159, 'Esteio', 'RS', '2021-05-25 01:45:40', NULL),
(160, 'Estrela', 'RS', '2021-05-25 01:45:40', NULL),
(161, 'Estrela Velha', 'RS', '2021-05-25 01:45:40', NULL),
(162, 'Eugênio de Castro', 'RS', '2021-05-25 01:45:40', NULL),
(163, 'Fagundes Varela', 'RS', '2021-05-25 01:45:40', NULL),
(164, 'Farroupilha', 'RS', '2021-05-25 01:45:40', NULL),
(165, 'Faxinal do Soturno', 'RS', '2021-05-25 01:45:40', NULL),
(166, 'Faxinalzinho', 'RS', '2021-05-25 01:45:40', NULL),
(167, 'Fazenda Vilanova', 'RS', '2021-05-25 01:45:40', NULL),
(168, 'Feliz', 'RS', '2021-05-25 01:45:40', NULL),
(169, 'Flores da Cunha', 'RS', '2021-05-25 01:45:40', NULL),
(170, 'Floriano Peixoto', 'RS', '2021-05-25 01:45:40', NULL),
(171, 'Fontoura Xavier', 'RS', '2021-05-25 01:45:40', NULL),
(172, 'Formigueiro', 'RS', '2021-05-25 01:45:40', NULL),
(173, 'Forquetinha', 'RS', '2021-05-25 01:45:40', NULL),
(174, 'Fortaleza dos Valos', 'RS', '2021-05-25 01:45:40', NULL),
(175, 'Frederico Westphalen', 'RS', '2021-05-25 01:45:40', NULL),
(176, 'Garibaldi', 'RS', '2021-05-25 01:45:40', NULL),
(177, 'Garruchos', 'RS', '2021-05-25 01:45:40', NULL),
(178, 'Gaurama', 'RS', '2021-05-25 01:45:40', NULL),
(179, 'General Câmara', 'RS', '2021-05-25 01:45:40', NULL),
(180, 'Gentil', 'RS', '2021-05-25 01:45:40', NULL),
(181, 'Getúlio Vargas', 'RS', '2021-05-25 01:45:40', NULL),
(182, 'Giruá', 'RS', '2021-05-25 01:45:40', NULL),
(183, 'Glorinha', 'RS', '2021-05-25 01:45:40', NULL),
(184, 'Gramado', 'RS', '2021-05-25 01:45:40', NULL),
(185, 'Gramado dos Loureiros', 'RS', '2021-05-25 01:45:40', NULL),
(186, 'Gramado Xavier', 'RS', '2021-05-25 01:45:40', NULL),
(187, 'Gravataí', 'RS', '2021-05-25 01:45:40', NULL),
(188, 'Guabiju', 'RS', '2021-05-25 01:45:40', NULL),
(189, 'Guaíba', 'RS', '2021-05-25 01:45:40', NULL),
(190, 'Guaporé', 'RS', '2021-05-25 01:45:40', NULL),
(191, 'Guarani das Missões', 'RS', '2021-05-25 01:45:40', NULL),
(192, 'Harmonia', 'RS', '2021-05-25 01:45:40', NULL),
(193, 'Herveiras', 'RS', '2021-05-25 01:45:40', NULL),
(194, 'Nova Santa Rita', 'RS', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `company`
--

INSERT INTO `company` (`id`, `name`) VALUES
(1, '3º Cia'),
(2, 'CCSv');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departament`
--

CREATE TABLE `departament` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `departament`
--

INSERT INTO `departament` (`id`, `name`) VALUES
(1, 'Pel Com'),
(2, 'Com Soc');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `login`, `password`, `created_at`, `updated_at`, `deleted_at`, `status`, `users_id`) VALUES
(1, 'eduardo', '$2y$10$Q3OsmCqPJ9aSk0VGE21NVOUpYzUmkZ6uI3nOncXSuN6YbJ5J/h5C6', '2021-06-15 03:29:11', '2021-06-15 06:29:11', NULL, 1, 1),
(2, 'lulu_luardo', 'lulu', '2021-04-08 18:34:20', '2021-04-08 18:34:20', NULL, 1, 2),
(3, '0000000000', '$2y$10$GI/m94eWNyCQjc03pnU.TONIWEMuHoTwJR95oZ8Ao7xclFN1p2pii', '2021-06-28 20:09:39', '2021-06-28 20:09:39', NULL, 1, 4),
(4, '8779287755', '$2y$10$k2iqMqrMCO/hnZdiYK8bW.ZmUwrm5GJplZnLuYcKp9jIRz.ChCBcW', '2021-06-28 21:26:05', '2021-06-28 21:26:05', NULL, 1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_application`
--

CREATE TABLE `login_application` (
  `applications_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_01_185548_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `read` tinyint(4) DEFAULT NULL,
  `write` tinyint(4) DEFAULT NULL,
  `edit` tinyint(4) DEFAULT NULL,
  `update` tinyint(4) DEFAULT NULL,
  `login_id` int(11) NOT NULL,
  `login_users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `read`, `write`, `edit`, `update`, `login_id`, `login_users_id`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 0, 1, 1, 0, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ranks`
--

CREATE TABLE `ranks` (
  `id` int(11) NOT NULL,
  `rank` varchar(45) NOT NULL DEFAULT 'POSTO OU GRADUAÇÃO POR EXTENSO',
  `rankAbbreviation` varchar(45) NOT NULL DEFAULT 'ABREVIAÇÃO DO POSTO OU GRADUAÇÃO',
  `rank_groups_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ranks`
--

INSERT INTO `ranks` (`id`, `rank`, `rankAbbreviation`, `rank_groups_id`) VALUES
(1, 'General', 'Gen', 1),
(2, 'Coronel', 'Cel', 1),
(3, 'Tenente Coronel', 'TC', 1),
(4, 'Major', 'Maj', 1),
(5, 'Capitão', 'Cap', 1),
(6, '1º Tenente', '1º Ten', 1),
(7, '2º Tenente', '2º Ten', 1),
(8, 'Aspirante', 'Asp', 2),
(9, 'Sub Tenente', 'ST', 2),
(10, '1º Sargento', '1º Sgt', 2),
(11, '2º Sargento', '2º Sgt', 2),
(12, '3º Sargento', '3º Sgt', 2),
(13, 'Cabo', 'Cb', 2),
(14, 'Soldado', 'Sd', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rank_groups`
--

CREATE TABLE `rank_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rank_groups`
--

INSERT INTO `rank_groups` (`id`, `name`) VALUES
(1, 'Oficial'),
(2, 'Praça');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('yqnCkDHJwqDqty5UiZ7TCLJJqmO1g6szbnm4HFon', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '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', 1625236403);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'NOME COMPLETO',
  `professionalName` varchar(45) NOT NULL DEFAULT 'NOME DE GUERRA',
  `email` varchar(200) DEFAULT NULL,
  `phone1` bigint(13) DEFAULT NULL,
  `phone2` bigint(13) DEFAULT NULL,
  `born_at` date DEFAULT NULL,
  `motherName` varchar(255) NOT NULL,
  `fatherName` varchar(255) DEFAULT NULL,
  `militaryId` varchar(12) NOT NULL,
  `idt_mil` bigint(14) DEFAULT NULL,
  `photoUrl` varchar(255) DEFAULT 'LINK PARA STORAGE',
  `backgroundUrl` varchar(255) DEFAULT NULL,
  `street` varchar(255) NOT NULL,
  `house_number` bigint(6) DEFAULT NULL,
  `district` varchar(100) NOT NULL DEFAULT 'BAIRRO',
  `city_id` int(11) DEFAULT NULL,
  `cep` int(9) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `departament_id` int(11) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `rank_group_id` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `professionalName`, `email`, `phone1`, `phone2`, `born_at`, `motherName`, `fatherName`, `militaryId`, `idt_mil`, `photoUrl`, `backgroundUrl`, `street`, `house_number`, `district`, `city_id`, `cep`, `created_at`, `updated_at`, `deleted_at`, `departament_id`, `rank_id`, `rank_group_id`, `company_id`) VALUES
(1, 'Eduardo Martins', 'Eduardo', 'edu@gmail', 51980204595, 51980423365, '2021-06-23', 'Raquel', 'Ricardo Martins', '159', 8779287755, 'img/img_profiles/1/img_profile_user_1-01-07-2021-12-07-11.png', 'img/img_background/bg6.png', 'av caju', 52, 'caju', 194, 92480000, '2021-07-02 14:16:47', '2021-07-02 17:16:01', NULL, 1, 13, 1, 2),
(2, 'LULU', 'LULU', NULL, NULL, NULL, NULL, 'LULA', 'LULE', 'LULU', 0, 'img/img_profiles/2/img_profile_user_2-01-07-2021-12-07-39.png', NULL, 'LULU', 85, 'BAIRRO', 1, NULL, '2021-07-02 14:13:19', '2021-07-02 17:13:19', '2021-07-02', 2, 12, 2, 1),
(3, 'dfvdfvdvf', '0htttttttt', 'csdcsd@ertrthertertb', 0, 0, '2021-05-05', 'dfvdfvdfv', 'dsfvsdfv', '000', 0, 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'ffffffffffff', 0, 'fffffffffffffffff', 19, 0, '2021-07-02 14:12:30', '2021-07-02 17:12:30', '2021-07-02', 2, 11, NULL, 2),
(4, 'ggggggggggggggg', 'Jairo', 'sthrsrthrt@ffffff', 88888888880, 88888888880, '2021-06-22', 'fffffffffffffffffffffffffffffff', 'fffffffffffffffffffffffffffffffffff', '011', 8888888888, 'img/img_profiles/4/img_profile_user_4-01-07-2021-12-07-52.png', 'img/img_background/bg3.jpg', 'jjjjjjjjjjjjjjjjjjjjjjjjjj', 111, 'kjjjjjjjjjjjjjjjjjjjj', 18, 92480000, '2021-07-01 13:11:05', '2021-07-01 15:06:52', NULL, 1, 10, NULL, 1),
(5, 'vvvvvvvvvvvvvvvvvvvvvvvvvvvv', 'Kaisar', 'eeeeeeeeeeeee@gnail', 88888888888, 51980423365, '2021-06-23', 'vvvvvvvvvvvvvvvvvvv', 'vvvvvvvvvvvvvvvvvvvv', '130', 8779287755, 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'dddddd', 111, 'dddd', 19, 88888888, '2021-07-01 14:28:34', '2021-07-01 17:28:34', NULL, 1, 9, NULL, 1),
(6, 'ktkuktyuktyuktyk', 'hkyukukuk', 'dyjtyjy@gthrthty', 0, 51980423365, '2021-06-22', 'ytkuktyuktyuk', 'ytuktyktyktyukyk', '000', 8779287755, 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'tkuykyuktyutyuktyukytukyukyukytuky', 111, 'ktyuktyuktyk', 16, 92480000, '2021-07-02 14:31:58', '2021-07-02 17:31:39', NULL, 1, 8, NULL, 1),
(12, 'EDUARDO MARTINS', 'EDUARDO MARTINS', 'edumart.lindo@gmail.com', 0, 0, '2021-06-22', 'EDUARDO MARTINS', 'EDUARDO MARTINS', '000', 8888888888, 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Maria Rita', 2000, 'yukyukyuk', 17, 92480000, '2021-07-02 14:28:45', '2021-07-02 17:28:45', '2021-07-02', 1, 14, NULL, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_applications_permissions1_idx` (`permissions_id`);

--
-- Índices para tabela `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `departament`
--
ALTER TABLE `departament`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_login_users1_idx` (`users_id`);

--
-- Índices para tabela `login_application`
--
ALTER TABLE `login_application`
  ADD PRIMARY KEY (`applications_id`,`login_id`),
  ADD KEY `fk_login_application_login1_idx` (`login_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_permissions_login1_idx` (`login_id`,`login_users_id`);

--
-- Índices para tabela `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `rank_groups`
--
ALTER TABLE `rank_groups`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_city_idx` (`city_id`),
  ADD KEY `fk_users_departament1_idx` (`departament_id`),
  ADD KEY `fk_users_company1_idx` (`company_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT de tabela `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `departament`
--
ALTER TABLE `departament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `rank_groups`
--
ALTER TABLE `rank_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `fk_applications_permissions1` FOREIGN KEY (`permissions_id`) REFERENCES `permissions` (`id`);

--
-- Limitadores para a tabela `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_login_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `login_application`
--
ALTER TABLE `login_application`
  ADD CONSTRAINT `fk_login_application_applications1` FOREIGN KEY (`applications_id`) REFERENCES `applications` (`id`),
  ADD CONSTRAINT `fk_login_application_login1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`);

--
-- Limitadores para a tabela `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `fk_permissions_login1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
