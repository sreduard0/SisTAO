-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Ago-2021 às 21:25
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
  `fullName` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `special` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `applications`
--

INSERT INTO `applications` (`id`, `name`, `fullName`, `link`, `special`, `created_at`, `updated_at`) VALUES
(1, 'Despacho', 'Fila de despacho', 'http://despacho.3bsup.eb.mil.br/', NULL, '2021-07-28 17:26:36', '2021-07-28 17:26:36'),
(2, 'SISBOL', 'Sisma de Boletins', 'http://sisbol.3bsup.eb.mil.br/', 2, '2021-07-28 17:26:36', '2021-08-09 18:54:23'),
(4, 'SCLE', 'Sistema de Controle de Licitações e Empenhos', 'http://scle.3bsup.eb.mil.br/', NULL, '2021-07-28 17:26:36', '2021-08-09 19:39:29'),
(6, 'SisTAO', 'Sistema de Tático de Apoio Operacional ', 'http://sistao.3bsup.eb.mil.br/', 1, '2021-07-28 17:26:36', '2021-07-28 17:26:36'),
(9, 'SPED', 'Sistema Protocolo Eletronico do Exército', 'http://sped.3bsup.eb.mil.br', 2, '2021-07-28 20:41:12', '2021-08-10 04:17:21');

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
(8, 'Cmt Cia - 2ª Cia'),
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `theme` int(11) DEFAULT 0,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `login`, `password`, `created_at`, `updated_at`, `deleted_at`, `status`, `theme`, `users_id`) VALUES
(3, 'eduardo', '$2y$10$eKA62oD1vmOLZnLiERk4.uC7I3nqd1DSql2ZFAMjPd0PmeAiTaN/K', '2021-08-10 18:48:09', '2021-08-10 21:48:09', NULL, 1, 1, 1),
(46, '5151515151', '$2y$10$N4Ujq76umd9j.QH/MoC6nuQktDh3clsgeWnSyLsWismuhtIsx3LQq', '2021-08-18 04:12:31', '2021-08-18 07:12:31', NULL, 1, 1, 46);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_application`
--

CREATE TABLE `login_application` (
  `id` int(11) NOT NULL,
  `applications_id` int(11) NOT NULL,
  `profileType` int(2) DEFAULT 0,
  `notification` int(2) DEFAULT 0,
  `login_id` int(11) NOT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login_application`
--

INSERT INTO `login_application` (`id`, `applications_id`, `profileType`, `notification`, `login_id`, `updated_at`, `created_at`) VALUES
(106, 6, 1, 1, 1, '2021-08-11 12:18:03.000000', '2021-08-11 12:18:03.000000'),
(152, 1, 0, 1, 46, '2021-08-18 06:57:31.000000', '2021-08-18 06:57:31.000000'),
(153, 2, 3, 1, 46, '2021-08-18 06:57:31.000000', '2021-08-18 06:57:31.000000'),
(154, 4, 0, 1, 46, '2021-08-18 06:57:31.000000', '2021-08-18 06:57:31.000000'),
(155, 6, 0, 1, 46, '2021-08-18 06:57:31.000000', '2021-08-18 06:57:31.000000'),
(157, 1, 1, 1, 1, '2021-08-18 16:29:37.000000', '2021-08-18 16:29:37.000000'),
(158, 2, 3, 1, 1, '2021-08-18 16:29:37.000000', '2021-08-18 16:29:37.000000'),
(159, 4, 0, 1, 1, '2021-08-18 16:29:37.000000', '2021-08-18 16:29:37.000000'),
(160, 9, 3, 1, 1, '2021-08-18 16:29:37.000000', '2021-08-18 16:29:37.000000');

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
('ecEJQ2PwfNCi6sQ8XafoAx3rpSBfW9k4ChRCvhTF', NULL, '10.26.199.60', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:89.0) Gecko/20100101 Firefox/89.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibzNJV1BBTThqcWcwV2REOUVueWtuY2hUb3YwYWh2WkpGM01NZnI2YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHA6Ly8xMC4yNi4xOTcuMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1629313016),
('Fp0dy7XNfOggAjfkRbfg8UHTa9sH9WFO7c2VTL03', NULL, '10.26.199.60', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:89.0) Gecko/20100101 Firefox/89.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0VaTndEcDBjc0JaYTRoMDNmOGFycnpnNGlWdDVxc2l0NHpaTDNDbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMC4yNi4xOTcuMC9yZWdpc3RlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1629313026),
('FZGl02Hkve6S3zVHAgNLXwajQAqFT4Qw6LBnrawh', NULL, '10.26.199.60', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:89.0) Gecko/20100101 Firefox/89.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoibnJ3WWF1MjF5WW5Yc3lSdXo1MktYWElPQVdyNzBMRlZSMktLZ0s3bSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1629313093),
('i6vMlNe3FGGsM1UsXUGqLdCpKOoOAbT7j7r5Hgyy', NULL, '10.26.199.60', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:89.0) Gecko/20100101 Firefox/89.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidmRsalA0SWhPOUprVFFtT1QxVlBHRjZ0S3Aza1hyanhPTmhjZUxYUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHA6Ly8xMC4yNi4xOTcuMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1629313005),
('IFmTKPiIPxMvDfgap6C8ZM1U0S9BfmtGQmUsTLCJ', NULL, '10.26.199.60', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:89.0) Gecko/20100101 Firefox/89.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNWNORlJtSkxxMWtOd2VxekVxWE0zTThMczh4VGRXazdheG5sc1U5aSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xMC4yNi4xOTcuMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1629313005),
('jZCQBRKPw8RH71iZieWaIRsJgoVW0TFMvGrLLFL0', NULL, '10.26.199.60', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:89.0) Gecko/20100101 Firefox/89.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDFmZ1R0SzZTbUttVDlqekhNV1pZMFZ2M2lxU1RhTXpEQmZXWFc1SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xMC4yNi4xOTcuMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1629313016),
('tQzX6YEG2sFZCELZ5f4wviUEXttoc3pA6uK1SkMw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTo2OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MzoiaHR0cDovL3Npc3Rhby4zYnN1cC5lYi5taWwuYnIvcmVnaXN0ZXIvbGlzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJVQTd3M3V5Y2thVDgxdldhUDByeHo0bjRrN2FPTDFrRkM0bkJjY2FMIjtzOjY6IlNpc1RBTyI7YTozOntzOjExOiJwcm9maWxlVHlwZSI7aToxO3M6MTI6Im5vdGlmaWNhdGlvbiI7aToxO3M6NzoibG9naW5JRCI7aToxO31zOjQ6InVzZXIiO2E6NTp7czoyOiJpZCI7aToxO3M6NDoibmFtZSI7czoxNToiRWR1YXJkbyBNYXJ0aW5zIjtzOjE2OiJwcm9mZXNzaW9uYWxOYW1lIjtzOjc6IkVkdWFyZG8iO3M6NToiZW1haWwiO3M6OToiZWR1QGdtYWlsIjtzOjQ6InJhbmsiO3M6MjoiQ2IiO31zOjU6InRoZW1lIjtpOjE7fQ==', 1629314675),
('X0OiRqTwm2NU8aCua7cFX32BYHYhoPJ0A7yn5Mwd', NULL, '10.26.199.60', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:89.0) Gecko/20100101 Firefox/89.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZXZzdGVVbHBtc205dG8wQzlRdUtPNzVBUUZtekI5ekhLRThLZ3ZIUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xMC4yNi4xOTcuMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1629313075);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `professionalName` varchar(45) DEFAULT NULL,
  `motherName` varchar(255) DEFAULT NULL,
  `fatherName` varchar(255) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone1` bigint(13) DEFAULT NULL,
  `phone2` bigint(13) DEFAULT NULL,
  `born_at` date DEFAULT NULL,
  `militaryId` varchar(12) DEFAULT NULL,
  `idt_mil` bigint(14) DEFAULT NULL,
  `photoUrl` varchar(255) DEFAULT NULL,
  `backgroundUrl` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `house_number` bigint(6) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `professionalName`, `motherName`, `fatherName`, `email`, `phone1`, `phone2`, `born_at`, `militaryId`, `idt_mil`, `photoUrl`, `backgroundUrl`, `street`, `house_number`, `district`, `city_id`, `cep`, `created_at`, `updated_at`, `deleted_at`, `departament_id`, `rank_id`, `rank_group_id`, `company_id`) VALUES
(1, 'Eduardo Martins', 'Eduardo', 'teste', NULL, 'edu@gmail', 51980204595, 51980423365, '2021-06-23', '159', 6666666666, 'img/img_profiles/1/img_profile_user_1-11-08-2021-13-08-18.png', 'img/img_background/bg6.png', 'av caju', 52, 'caju', 194, 92480000, '2021-08-11 13:19:55', '2021-08-11 16:19:55', NULL, 5, 13, 1, 2),
(46, 'Predro Pedroso', 'Pedro', NULL, NULL, 'pedro@pedro.com', NULL, NULL, NULL, NULL, 5151515151, 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-08-18 04:00:10', '2021-08-18 07:00:10', NULL, 22, 13, NULL, 2);

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
-- Índices para tabela `login_application`
--
ALTER TABLE `login_application`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `login_application`
--
ALTER TABLE `login_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
