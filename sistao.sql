-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Maio-2021 às 13:51
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
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cities`
--

INSERT INTO `cities` (`id`, `name`, `state`) VALUES
(1, 'Canoas', 'Rio Grande do Sul'),
(2, 'Montenegro', 'Rio Grande do Sul'),
(4, 'Aceguá', 'Rio Grande do Sul'),
(5, 'Água Santa', 'Rio Grande do Sul'),
(6, 'Agudo', 'Rio Grande do Sul'),
(7, 'Ajuricaba', 'Rio Grande do Sul'),
(8, 'Alecrim', 'Rio Grande do Sul'),
(9, 'Alegrete', 'Rio Grande do Sul'),
(10, 'Alegria', 'Rio Grande do Sul'),
(11, 'Almirante Tamandaré do Sul', 'Rio Grande do Sul'),
(12, 'Alpestre', 'Rio Grande do Sul'),
(13, 'Alto Alegre', 'Rio Grande do Sul'),
(14, 'Alto Feliz', 'Rio Grande do Sul'),
(15, 'Alvorada', 'Rio Grande do Sul'),
(16, 'Amaral Ferrador', 'Rio Grande do Sul'),
(17, 'Ametista do Sul', 'Rio Grande do Sul'),
(18, 'André da Rocha', 'Rio Grande do Sul'),
(19, 'Anta Gorda', 'Rio Grande do Sul'),
(20, 'Antônio Prado', 'Rio Grande do Sul'),
(21, 'Arambaré', 'Rio Grande do Sul'),
(22, 'Araricá', 'Rio Grande do Sul'),
(23, 'Aratiba', 'Rio Grande do Sul'),
(24, 'Arroio do Meio', 'Rio Grande do Sul'),
(25, 'Arroio do Padre', 'Rio Grande do Sul'),
(26, 'Arroio do Sal', 'Rio Grande do Sul'),
(27, 'Arroio do Tigre', 'Rio Grande do Sul'),
(28, 'Arroio dos Ratos', 'Rio Grande do Sul'),
(29, 'Arroio Grande', 'Rio Grande do Sul'),
(30, 'Arvorezinha', 'Rio Grande do Sul'),
(31, 'Augusto Pestana', 'Rio Grande do Sul'),
(32, 'Áurea', 'Rio Grande do Sul'),
(33, 'Bagé', 'Rio Grande do Sul'),
(34, 'Balneário Pinhal', 'Rio Grande do Sul'),
(35, 'Barão', 'Rio Grande do Sul'),
(36, 'Barão de Cotegipe', 'Rio Grande do Sul'),
(37, 'Barão do Triunfo', 'Rio Grande do Sul'),
(38, 'Barra do Guarita', 'Rio Grande do Sul'),
(39, 'Barra do Quaraí', 'Rio Grande do Sul'),
(40, 'Barra do Ribeiro', 'Rio Grande do Sul'),
(41, 'Barra do Rio Azul', 'Rio Grande do Sul'),
(42, 'Barra Funda', 'Rio Grande do Sul'),
(43, 'Barracão Barros Cassal', 'Rio Grande do Sul'),
(44, 'Benjamin Constant do Sul', 'Rio Grande do Sul'),
(45, 'Bento Gonçalves', 'Rio Grande do Sul'),
(46, 'Boa Vista das Missões', 'Rio Grande do Sul'),
(47, 'Boa Vista do Buricá', 'Rio Grande do Sul'),
(48, 'Boa Vista do Cadeado', 'Rio Grande do Sul'),
(49, 'Boa Vista do Incra', 'Rio Grande do Sul'),
(50, 'Boa Vista do Sul', 'Rio Grande do Sul'),
(51, 'Bom Jesus', 'Rio Grande do Sul'),
(52, 'Bom Princípio', 'Rio Grande do Sul'),
(53, 'Bom Progresso', 'Rio Grande do Sul'),
(54, 'Bom Retiro do Sul', 'Rio Grande do Sul'),
(55, 'Boqueirão do Leão', 'Rio Grande do Sul'),
(56, 'Bossoroca', 'Rio Grande do Sul'),
(57, 'Bozano', 'Rio Grande do Sul'),
(58, 'Braga', 'Rio Grande do Sul'),
(59, 'Brochier', 'Rio Grande do Sul'),
(60, 'Butiá\r\n', 'Rio Grande do Sul'),
(61, 'Caçapava do Sul', 'Rio Grande do Sul'),
(62, 'Cacequi', 'Rio Grande do Sul'),
(63, 'Cachoeira do Sul', 'Rio Grande do Sul'),
(64, 'Cachoeirinha', 'Rio Grande do Sul'),
(65, 'Cacique Doble', 'Rio Grande do Sul'),
(66, 'Caibaté', 'Rio Grande do Sul'),
(67, 'Caiçara', 'Rio Grande do Sul'),
(68, 'Camaquã', 'Rio Grande do Sul'),
(69, 'Camargo', 'Rio Grande do Sul'),
(70, 'Cambará do Sul', 'Rio Grande do Sul'),
(71, 'Campestre da Serra', 'Rio Grande do Sul'),
(72, 'Campina das Missões', 'Rio Grande do Sul'),
(73, 'Campinas do Sul', 'Rio Grande do Sul'),
(74, 'Campo Bom', 'Rio Grande do Sul'),
(75, 'Campo Novo', 'Rio Grande do Sul'),
(76, 'Campos Borges', 'Rio Grande do Sul'),
(77, 'Candelária', 'Rio Grande do Sul'),
(78, 'Cândido Godói', 'Rio Grande do Sul'),
(79, 'Candiota', 'Rio Grande do Sul'),
(80, 'Canela', 'Rio Grande do Sul'),
(81, 'Canguçu', 'Rio Grande do Sul'),
(82, 'Canoas', 'Rio Grande do Sul'),
(83, 'Canudos do Vale', 'Rio Grande do Sul'),
(84, 'Capão Bonito do Sul', 'Rio Grande do Sul'),
(85, 'Capão da Canoa', 'Rio Grande do Sul'),
(86, 'Capão do Cipó', 'Rio Grande do Sul'),
(87, 'Capão do Leão', 'Rio Grande do Sul'),
(88, 'Capela de Santana', 'Rio Grande do Sul'),
(89, 'Capitão', 'Rio Grande do Sul'),
(90, 'Capivari do Sul', 'Rio Grande do Sul'),
(91, 'Caraá', 'Rio Grande do Sul'),
(92, 'Carazinho', 'Rio Grande do Sul'),
(93, 'Carlos Barbosa', 'Rio Grande do Sul'),
(94, 'Carlos Gomes', 'Rio Grande do Sul'),
(95, 'Casca', 'Rio Grande do Sul'),
(96, 'Caseiros', 'Rio Grande do Sul'),
(97, 'Catuípe', 'Rio Grande do Sul'),
(98, 'Caxias do Sul', 'Rio Grande do Sul'),
(99, 'Centenário', 'Rio Grande do Sul'),
(100, 'Cerrito', 'Rio Grande do Sul'),
(101, 'Cerro Branco', 'Rio Grande do Sul'),
(102, 'Cerro Grande', 'Rio Grande do Sul'),
(103, 'Cerro Grande do Sul', 'Rio Grande do Sul'),
(104, 'Cerro Largo', 'Rio Grande do Sul'),
(105, 'Chapada', 'Rio Grande do Sul'),
(106, 'Charqueadas', 'Rio Grande do Sul'),
(107, 'Charrua', 'Rio Grande do Sul'),
(108, 'Chiapetta', 'Rio Grande do Sul'),
(109, 'Chuí', 'Rio Grande do Sul'),
(110, 'Chuvisca', 'Rio Grande do Sul'),
(111, 'Cidreira', 'Rio Grande do Sul'),
(112, 'Ciríaco', 'Rio Grande do Sul'),
(113, 'Colinas', 'Rio Grande do Sul'),
(114, 'Colorado', 'Rio Grande do Sul'),
(115, 'Condor', 'Rio Grande do Sul'),
(116, 'Constantina', 'Rio Grande do Sul'),
(117, 'Coqueiro Baixo', 'Rio Grande do Sul'),
(118, 'Coqueiros do Sul', 'Rio Grande do Sul'),
(119, 'Coronel Barros', 'Rio Grande do Sul'),
(120, 'Coronel Bicaco', 'Rio Grande do Sul'),
(121, 'Coronel Pilar', 'Rio Grande do Sul'),
(122, 'Cotiporã', 'Rio Grande do Sul'),
(123, 'Coxilha', 'Rio Grande do Sul'),
(124, 'Crissiumal', 'Rio Grande do Sul'),
(125, 'Cristal', 'Rio Grande do Sul'),
(126, 'Cristal do Sul', 'Rio Grande do Sul'),
(127, 'Cruz Alta', 'Rio Grande do Sul'),
(128, 'Cruzaltense', 'Rio Grande do Sul'),
(129, 'Cruzeiro do Sul', 'Rio Grande do Sul'),
(130, 'David Canabarro', 'Rio Grande do Sul'),
(131, 'Derrubadas', 'Rio Grande do Sul'),
(132, 'Dezesseis de Novembro', 'Rio Grande do Sul'),
(133, 'Dilermando de Aguiar', 'Rio Grande do Sul'),
(134, 'Dois Irmãos', 'Rio Grande do Sul'),
(135, 'Dois Irmãos das Missões', 'Rio Grande do Sul'),
(136, 'Dois Lajeados', 'Rio Grande do Sul'),
(137, 'Dom Feliciano', 'Rio Grande do Sul'),
(138, 'Dom Pedrito', 'Rio Grande do Sul'),
(139, 'Dom Pedro de Alcântara', 'Rio Grande do Sul'),
(140, 'Dona Francisca', 'Rio Grande do Sul'),
(141, 'Doutor Maurício Cardoso', 'Rio Grande do Sul'),
(142, 'Doutor Ricardo', 'Rio Grande do Sul'),
(143, ' Eldorado do Sul', 'Rio Grande do Sul'),
(144, 'Encantado', 'Rio Grande do Sul'),
(145, 'Encruzilhada do Sul', 'Rio Grande do Sul'),
(146, 'Engenho Velho', 'Rio Grande do Sul'),
(147, 'Entre-Ijuís', 'Rio Grande do Sul'),
(148, 'Entre Rios do Sul', 'Rio Grande do Sul'),
(149, 'Erebango', 'Rio Grande do Sul'),
(150, 'Erechim', 'Rio Grande do Sul'),
(151, 'Ernestina', 'Rio Grande do Sul'),
(152, 'Erval Grande', 'Rio Grande do Sul'),
(153, 'Erval Seco', 'Rio Grande do Sul'),
(154, 'Esmeralda', 'Rio Grande do Sul'),
(155, 'Esperança do Sul', 'Rio Grande do Sul'),
(156, 'Espumoso', 'Rio Grande do Sul'),
(157, 'Estação', 'Rio Grande do Sul'),
(158, 'Estância Velha', 'Rio Grande do Sul'),
(159, 'Esteio', 'Rio Grande do Sul'),
(160, 'Estrela', 'Rio Grande do Sul'),
(161, 'Estrela Velha', 'Rio Grande do Sul'),
(162, 'Eugênio de Castro', 'Rio Grande do Sul'),
(163, 'Fagundes Varela', 'Rio Grande do Sul'),
(164, 'Farroupilha', 'Rio Grande do Sul'),
(165, 'Faxinal do Soturno', 'Rio Grande do Sul'),
(166, 'Faxinalzinho', 'Rio Grande do Sul'),
(167, 'Fazenda Vilanova', 'Rio Grande do Sul'),
(168, 'Feliz', 'Rio Grande do Sul'),
(169, 'Flores da Cunha', 'Rio Grande do Sul'),
(170, 'Floriano Peixoto', 'Rio Grande do Sul'),
(171, 'Fontoura Xavier', 'Rio Grande do Sul'),
(172, 'Formigueiro', 'Rio Grande do Sul'),
(173, 'Forquetinha', 'Rio Grande do Sul'),
(174, 'Fortaleza dos Valos', 'Rio Grande do Sul'),
(175, 'Frederico Westphalen', 'Rio Grande do Sul'),
(176, 'Garibaldi', 'Rio Grande do Sul'),
(177, 'Garruchos', 'Rio Grande do Sul'),
(178, 'Gaurama', 'Rio Grande do Sul'),
(179, 'General Câmara', 'Rio Grande do Sul'),
(180, 'Gentil', 'Rio Grande do Sul'),
(181, 'Getúlio Vargas', 'Rio Grande do Sul'),
(182, 'Giruá', 'Rio Grande do Sul'),
(183, 'Glorinha', 'Rio Grande do Sul'),
(184, 'Gramado', 'Rio Grande do Sul'),
(185, 'Gramado dos Loureiros', 'Rio Grande do Sul'),
(186, 'Gramado Xavier', 'Rio Grande do Sul'),
(187, 'Gravataí', 'Rio Grande do Sul'),
(188, 'Guabiju', 'Rio Grande do Sul'),
(189, 'Guaíba', 'Rio Grande do Sul'),
(190, 'Guaporé', 'Rio Grande do Sul'),
(191, 'Guarani das Missões', 'Rio Grande do Sul'),
(192, 'Harmonia', 'Rio Grande do Sul'),
(193, 'Herveiras', 'Rio Grande do Sul');

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
(1, 'dudu_duardo', 'dudu', '2021-04-08 18:34:20', '2021-04-08 18:34:20', NULL, 1, 1),
(2, 'lulu_luardo', 'lulu', '2021-04-08 18:34:20', '2021-04-08 18:34:20', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_application`
--

CREATE TABLE `login_application` (
  `applications_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login_application`
--

INSERT INTO `login_application` (`applications_id`, `login_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2);

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
(1, '3º Sargento', '3º Sgt', 2),
(2, 'Cabo', 'Cb', 1);

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
('hYWL7rxhg03ots4wrAwiUf1tGAJEmwrAdWjOCbuk', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicTRrNDlySTJHS0lGOGszdHdNSHBwME5xc3N3S1Q3SGdOMmlpdXdtSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3QvcGFycHMvcHVibGljL2VkaXRfcHJvZmlsZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1620350259);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `subview`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `subview` (
`login_id` int(11)
,`login` varchar(100)
,`password` varchar(255)
,`login_user_id` int(11)
,`status` tinyint(4)
,`login_app_id` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `ultraview`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `ultraview` (
`login_id` int(11)
,`login` varchar(100)
,`password` varchar(255)
,`login_user_id` int(11)
,`status` tinyint(4)
,`login_app_id` int(11)
,`app_id` int(11)
,`app_name` varchar(150)
,`app_permission_fk` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'NOME COMPLETO',
  `professionalName` varchar(45) NOT NULL DEFAULT 'NOME DE GUERRA',
  `email` varchar(200) DEFAULT NULL,
  `born_at` date DEFAULT NULL,
  `motherName` varchar(255) NOT NULL,
  `fatherName` varchar(255) DEFAULT NULL,
  `militaryId` varchar(12) NOT NULL,
  `cpf` varchar(12) NOT NULL,
  `photoUrl` varchar(255) DEFAULT 'LINK PARA STORAGE',
  `street` varchar(255) NOT NULL,
  `district` varchar(100) NOT NULL DEFAULT 'BAIRRO',
  `city_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `departament_id` int(11) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `rank_group_id` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `professionalName`, `email`, `born_at`, `motherName`, `fatherName`, `militaryId`, `cpf`, `photoUrl`, `street`, `district`, `city_id`, `created_at`, `updated_at`, `departament_id`, `rank_id`, `rank_group_id`, `company_id`) VALUES
(1, 'Eduardo Martins', 'Eduardo', 'edu@gmail', '2021-05-19', 'Raquel', 'Ricardo', '159', '87792877555', 'img/avatar5.png', 'av caju', 'caju', 2, '2021-05-07 02:20:36', '2021-04-08 18:27:29', 1, 2, 1, 2),
(2, 'LULU', 'LULU', NULL, NULL, 'LULA', 'LULE', 'LULU', 'LULU', 'LINK PARA STORAGE', 'LULU', 'BAIRRO', 1, '2021-04-08 18:27:29', '2021-04-08 18:27:29', 2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para vista `subview`
--
DROP TABLE IF EXISTS `subview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `subview`  AS SELECT `login`.`id` AS `login_id`, `login`.`login` AS `login`, `login`.`password` AS `password`, `login`.`users_id` AS `login_user_id`, `login`.`status` AS `status`, `login_application`.`applications_id` AS `login_app_id` FROM (`login` left join `login_application` on(`login_application`.`login_id` = `login`.`id`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `ultraview`
--
DROP TABLE IF EXISTS `ultraview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ultraview`  AS SELECT `subview`.`login_id` AS `login_id`, `subview`.`login` AS `login`, `subview`.`password` AS `password`, `subview`.`login_user_id` AS `login_user_id`, `subview`.`status` AS `status`, `subview`.`login_app_id` AS `login_app_id`, `applications`.`id` AS `app_id`, `applications`.`name` AS `app_name`, `applications`.`permissions_id` AS `app_permission_fk` FROM (`subview` left join `applications` on(`applications`.`id` = `subview`.`login_app_id`)) ;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ranks_rank_groups1_idx` (`rank_groups_id`);

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
  ADD KEY `fk_users_rank_groups1_idx` (`rank_id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `rank_groups`
--
ALTER TABLE `rank_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

--
-- Limitadores para a tabela `ranks`
--
ALTER TABLE `ranks`
  ADD CONSTRAINT `fk_ranks_rank_groups1` FOREIGN KEY (`rank_groups_id`) REFERENCES `rank_groups` (`id`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `fk_users_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `fk_users_departament1` FOREIGN KEY (`departament_id`) REFERENCES `departament` (`id`),
  ADD CONSTRAINT `fk_users_rank_groups1` FOREIGN KEY (`rank_id`) REFERENCES `rank_groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
