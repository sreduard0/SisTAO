-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jul-2021 às 14:08
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
  `link` varchar(255) DEFAULT NULL,
  `permissions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `applications`
--

INSERT INTO `applications` (`id`, `name`, `link`, `permissions_id`) VALUES
(1, 'Despacho', 'http://despacho.3bsup.eb.mil.br/', 1),
(2, 'SISBOL', 'http://sisbol.3bsup.eb.mil.br/', 2),
(3, 'SisTAO', 'http://sistao.3bsup.eb.mil.br/', 1);

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
(1, 'EM'),
(2, 'CCSv'),
(3, '1ª Cia'),
(4, '2ª Cia'),
(5, '3º Cia');

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
(4, 'COMANDANTE'),
(5, 'Cmt Cia - 1ª Cia'),
(6, 'Arrecadação - 1ª Cia'),
(7, 'Sargenteação - 1ª Cia'),
(8, 'Cmt Cia - 2ª Cia\">Cmt Cia - 2ª Cia'),
(9, 'Arrecadação - 2ª Cia'),
(10, 'Sargenteação - 2ª Cia'),
(11, 'LQR/3'),
(12, 'Cmt Cia - 3ª Cia'),
(13, 'Arrecadação - 3ª Cia '),
(14, 'Sargenteação - 3ª Cia'),
(15, 'Almoxarifado'),
(16, 'Aprovisionamento'),
(17, 'Seção Cães de Guerra'),
(18, 'Cmt Cia - CCSv'),
(19, 'Arrecadação - CCSv'),
(20, 'Sargenteação da CCSv'),
(21, 'Seção de Saúde'),
(22, 'Classe I'),
(23, 'Classe II'),
(24, 'Classe III-IX'),
(25, 'Classe VIII'),
(26, 'COST'),
(27, 'Classe V'),
(28, 'Pelotão de Armamento'),
(29, 'Pelotão de Munição'),
(30, 'Escritório de Projetos e Gestão '),
(31, 'Fiscalização Administrativa'),
(32, 'LIAB'),
(33, 'Patrimônio'),
(34, 'Pelotão de Comunicações'),
(35, 'Pelotão de Obras'),
(36, 'Pelotão de Segurança'),
(37, 'Pelotão de Transporte'),
(38, 'Relações Públicas'),
(39, '1ª Seção'),
(40, '2ª Seção'),
(41, '3ª Seção'),
(42, '4ª Seção'),
(43, 'SALC'),
(44, 'Seção Mobilizadora'),
(45, 'Secretaria'),
(46, 'Setor Financeiro'),
(47, 'Setor Pagamento'),
(48, 'SFPC'),
(49, 'Subcomandante'),
(50, 'Suporte Documental');

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
(8, '8779287755', '$2y$10$1uvUhfQPcqLZkNs2m4BDHe3Eha.lGsf3BltCw3cxTcZq1HufTsOcK', '2021-07-04 21:59:32', '2021-07-05 00:53:37', NULL, 1, 6),
(9, '8779287756', '$2y$10$DvukpkP4PRStM10uv2mQU.EgYSITadrtWmvU9nGReTfdoRCy4VhTC', '2021-07-05 11:35:22', '2021-07-05 14:35:22', NULL, 1, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_application`
--

CREATE TABLE `login_application` (
  `applications_id` int(11) NOT NULL,
  `profileType` int(2) DEFAULT 0,
  `notification` int(2) DEFAULT 0,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login_application`
--

INSERT INTO `login_application` (`applications_id`, `profileType`, `notification`, `login_id`) VALUES
(1, 1, 1, 1),
(1, 0, 0, 9),
(3, 1, 1, 1),
(3, 0, 0, 9);

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
('EisnGaSXAp42YVEO0BCzykQLYqESO0W9p3Ndtqyn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '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czo3OiJjaXR5X2lkIjtpOjE5NDtzOjM6ImNlcCI7aTo5MjQ4MDAwMDtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIxLTA3LTA1IDEwOjUxOjU2IjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIxLTA3LTAyIDE0OjE2OjAxIjtzOjEwOiJkZWxldGVkX2F0IjtOO3M6MTQ6ImRlcGFydGFtZW50X2lkIjtpOjU7czo3OiJyYW5rX2lkIjtpOjEzO3M6MTM6InJhbmtfZ3JvdXBfaWQiO2k6MTtzOjEwOiJjb21wYW55X2lkIjtpOjI7fXM6MTE6IgAqAG9yaWdpbmFsIjthOjI1OntzOjI6ImlkIjtpOjE7czo0OiJuYW1lIjtzOjE1OiJFZHVhcmRvIE1hcnRpbnMiO3M6MTY6InByb2Zlc3Npb25hbE5hbWUiO3M6NzoiRWR1YXJkbyI7czo1OiJlbWFpbCI7czo5OiJlZHVAZ21haWwiO3M6NjoicGhvbmUxIjtpOjUxOTgwMjA0NTk1O3M6NjoicGhvbmUyIjtpOjUxOTgwNDIzMzY1O3M6NzoiYm9ybl9hdCI7czoxMDoiMjAyMS0wNi0yMyI7czoxMDoibW90aGVyTmFtZSI7czo2OiJSYXF1ZWwiO3M6MTA6ImZhdGhlck5hbWUiO3M6MTU6IlJpY2FyZG8gTWFydGlucyI7czoxMDoibWlsaXRhcnlJZCI7czozOiIxNTkiO3M6NzoiaWR0X21pbCI7aTo4Nzc5Mjg3NzU1O3M6ODoicGhvdG9VcmwiO3M6NjE6ImltZy9pbWdfcHJvZmlsZXMvMS9pbWdfcHJvZmlsZV91c2VyXzEtMDEtMDctMjAyMS0xMi0wNy0xMS5wbmciO3M6MTM6ImJhY2tncm91bmRVcmwiO3M6MjY6ImltZy9pbWdfYmFja2dyb3VuZC9iZzYucG5nIjtzOjY6InN0cmVldCI7czo3OiJhdiBjYWp1IjtzOjEyOiJob3VzZV9udW1iZXIiO2k6NTI7czo4OiJkaXN0cmljdCI7czo0OiJjYWp1IjtzOjc6ImNpdHlfaWQiO2k6MTk0O3M6MzoiY2VwIjtpOjkyNDgwMDAwO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjEtMDctMDUgMTA6NTE6NTYiO3M6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', 1625509560),
('J7Zmjwjp8VvuHsXhWoTtW0KwenpRsZHTOxIJhqaH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQUJtRkd2UjgzU3NLWTFOVUdUSTh2MURBOENnYlE1NVk4eTZ6MkFjYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9kZXNwYWNoby4zYnN1cC5lYi5taWwuYnIvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1625488117),
('plGqh6DV9UmWFQKzLJrApiYE5beC1PFByhBmpzSN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '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czo3OiJjaXR5X2lkIjtpOjE5NDtzOjM6ImNlcCI7aTo5MjQ4MDAwMDtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIxLTA3LTA1IDEwOjUxOjU2IjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIxLTA3LTAyIDE0OjE2OjAxIjtzOjEwOiJkZWxldGVkX2F0IjtOO3M6MTQ6ImRlcGFydGFtZW50X2lkIjtpOjU7czo3OiJyYW5rX2lkIjtpOjEzO3M6MTM6InJhbmtfZ3JvdXBfaWQiO2k6MTtzOjEwOiJjb21wYW55X2lkIjtpOjI7fXM6MTE6IgAqAG9yaWdpbmFsIjthOjI1OntzOjI6ImlkIjtpOjE7czo0OiJuYW1lIjtzOjE1OiJFZHVhcmRvIE1hcnRpbnMiO3M6MTY6InByb2Zlc3Npb25hbE5hbWUiO3M6NzoiRWR1YXJkbyI7czo1OiJlbWFpbCI7czo5OiJlZHVAZ21haWwiO3M6NjoicGhvbmUxIjtpOjUxOTgwMjA0NTk1O3M6NjoicGhvbmUyIjtpOjUxOTgwNDIzMzY1O3M6NzoiYm9ybl9hdCI7czoxMDoiMjAyMS0wNi0yMyI7czoxMDoibW90aGVyTmFtZSI7czo2OiJSYXF1ZWwiO3M6MTA6ImZhdGhlck5hbWUiO3M6MTU6IlJpY2FyZG8gTWFydGlucyI7czoxMDoibWlsaXRhcnlJZCI7czozOiIxNTkiO3M6NzoiaWR0X21pbCI7aTo4Nzc5Mjg3NzU1O3M6ODoicGhvdG9VcmwiO3M6NjE6ImltZy9pbWdfcHJvZmlsZXMvMS9pbWdfcHJvZmlsZV91c2VyXzEtMDEtMDctMjAyMS0xMi0wNy0xMS5wbmciO3M6MTM6ImJhY2tncm91bmRVcmwiO3M6MjY6ImltZy9pbWdfYmFja2dyb3VuZC9iZzYucG5nIjtzOjY6InN0cmVldCI7czo3OiJhdiBjYWp1IjtzOjEyOiJob3VzZV9udW1iZXIiO2k6NTI7czo4OiJkaXN0cmljdCI7czo0OiJjYWp1IjtzOjc6ImNpdHlfaWQiO2k6MTk0O3M6MzoiY2VwIjtpOjkyNDgwMDAwO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjEtMDctMDUgMTA6NTE6NTYiO3M6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', 1625745889),
('seLIdRiTaMJsctTecf5RZqFFKUAwYsTr3Vy0px0M', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '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czo3OiJjaXR5X2lkIjtpOjE5NDtzOjM6ImNlcCI7aTo5MjQ4MDAwMDtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIxLTA3LTA1IDEwOjUxOjU2IjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIxLTA3LTAyIDE0OjE2OjAxIjtzOjEwOiJkZWxldGVkX2F0IjtOO3M6MTQ6ImRlcGFydGFtZW50X2lkIjtpOjU7czo3OiJyYW5rX2lkIjtpOjEzO3M6MTM6InJhbmtfZ3JvdXBfaWQiO2k6MTtzOjEwOiJjb21wYW55X2lkIjtpOjI7fXM6MTE6IgAqAG9yaWdpbmFsIjthOjI1OntzOjI6ImlkIjtpOjE7czo0OiJuYW1lIjtzOjE1OiJFZHVhcmRvIE1hcnRpbnMiO3M6MTY6InByb2Zlc3Npb25hbE5hbWUiO3M6NzoiRWR1YXJkbyI7czo1OiJlbWFpbCI7czo5OiJlZHVAZ21haWwiO3M6NjoicGhvbmUxIjtpOjUxOTgwMjA0NTk1O3M6NjoicGhvbmUyIjtpOjUxOTgwNDIzMzY1O3M6NzoiYm9ybl9hdCI7czoxMDoiMjAyMS0wNi0yMyI7czoxMDoibW90aGVyTmFtZSI7czo2OiJSYXF1ZWwiO3M6MTA6ImZhdGhlck5hbWUiO3M6MTU6IlJpY2FyZG8gTWFydGlucyI7czoxMDoibWlsaXRhcnlJZCI7czozOiIxNTkiO3M6NzoiaWR0X21pbCI7aTo4Nzc5Mjg3NzU1O3M6ODoicGhvdG9VcmwiO3M6NjE6ImltZy9pbWdfcHJvZmlsZXMvMS9pbWdfcHJvZmlsZV91c2VyXzEtMDEtMDctMjAyMS0xMi0wNy0xMS5wbmciO3M6MTM6ImJhY2tncm91bmRVcmwiO3M6MjY6ImltZy9pbWdfYmFja2dyb3VuZC9iZzYucG5nIjtzOjY6InN0cmVldCI7czo3OiJhdiBjYWp1IjtzOjEyOiJob3VzZV9udW1iZXIiO2k6NTI7czo4OiJkaXN0cmljdCI7czo0OiJjYWp1IjtzOjc6ImNpdHlfaWQiO2k6MTk0O3M6MzoiY2VwIjtpOjkyNDgwMDAwO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjEtMDctMDUgMTA6NTE6NTYiO3M6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', 1625675721),
('Tuk54YQDdbmuqPp9n3GZsAHPzRJyb4TgBjPbSEOt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDFNa1M3WHU4S3VvcE1aNU5YUlRwTnVubWNqQ2F6RXRlYjQ0THk2WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9zaXN0YW8uM2JzdXAuZWIubWlsLmJyL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625684821);

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
(1, 'Eduardo Martins', 'Eduardo', 'edu@gmail', 51980204595, 51980423365, '2021-06-23', 'Raquel', 'Ricardo Martins', '159', 8779287755, 'img/img_profiles/1/img_profile_user_1-01-07-2021-12-07-11.png', 'img/img_background/bg6.png', 'av caju', 52, 'caju', 194, 92480000, '2021-07-05 13:51:56', '2021-07-02 17:16:01', NULL, 5, 13, 1, 2),
(2, 'LULU', 'LULU', NULL, NULL, NULL, NULL, 'LULA', 'LULE', 'LULU', 0, 'img/img_profiles/2/img_profile_user_2-01-07-2021-12-07-39.png', NULL, 'LULU', 85, 'BAIRRO', 1, NULL, '2021-07-05 13:52:02', '2021-07-02 17:13:19', NULL, 5, 12, 2, 1),
(5, 'jjhhjhjhjhjh', 'Kaisar', 'eeeeeeeeeeeee@gnail', 88888888888, 51980423365, '2021-06-23', 'vvvvvvvvvvvvvvvvvvv', 'vvvvvvvvvvvvvvvvvvvv', '130', 8779287755, 'img/img_profiles/5/img_profile_user_5-04-07-2021-23-07-26.png', 'img/img_background/bg6.png', 'dddddd', 111, 'dddd', 19, 88888888, '2021-07-05 13:52:50', '2021-07-05 16:52:50', NULL, 34, 9, NULL, 1),
(6, 'ktkuktyuktyuktyk', 'hkyukukuk', 'dyjtyjy@gthrthty', 0, 51980423365, '2021-06-22', 'ytkuktyuktyuk', 'ytuktyktyktyukyk', '000', 8779287755, 'img/img_profiles/6/img_profile_user_6-04-07-2021-21-07-21.png', 'img/img_background/bg3.jpg', 'tkuykyuktyutyuktyukytukyukyukytuky', 111, 'ktyuktyuktyk', 16, 92480000, '2021-07-05 13:52:08', '2021-07-05 00:53:37', NULL, 6, 8, NULL, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);
 
--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT de tabela `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `departament`
--
ALTER TABLE `departament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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

