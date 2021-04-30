-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 30-Abr-2021 às 10:45
-- Versão do servidor: 8.0.23-3ubuntu1
-- versão do PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `permissions_id` int NOT NULL
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
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cities`
--

INSERT INTO `cities` (`id`, `name`, `state`) VALUES
(1, 'Canoas', 'Rio Grande do Sul'),
(2, 'Montenegro', 'Rio Grande do Sul');

-- --------------------------------------------------------

--
-- Estrutura da tabela `company`
--

CREATE TABLE `company` (
  `id` int NOT NULL,
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
  `id` int NOT NULL,
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
  `id` int NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint NOT NULL,
  `users_id` int NOT NULL
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
  `applications_id` int NOT NULL,
  `login_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login_application`
--

INSERT INTO `login_application` (`applications_id`, `login_id`) VALUES
(1, 1),
(2, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` int NOT NULL,
  `read` tinyint DEFAULT NULL,
  `write` tinyint DEFAULT NULL,
  `edit` tinyint DEFAULT NULL,
  `update` tinyint DEFAULT NULL,
  `login_id` int NOT NULL,
  `login_users_id` int NOT NULL
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
  `id` int NOT NULL,
  `rank` varchar(45) NOT NULL DEFAULT 'POSTO OU GRADUAÇÃO POR EXTENSO',
  `rankAbbreviation` varchar(45) NOT NULL DEFAULT 'ABREVIAÇÃO DO POSTO OU GRADUAÇÃO',
  `rank_groups_id` int NOT NULL
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
  `id` int NOT NULL,
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
-- Estrutura stand-in para vista `subview`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `subview` (
`login` varchar(100)
,`login_app_id` int
,`login_id` int
,`login_user_id` int
,`password` varchar(255)
,`status` tinyint
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `ultraview`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `ultraview` (
`app_id` int
,`app_name` varchar(150)
,`app_permission_fk` int
,`login` varchar(100)
,`login_app_id` int
,`login_id` int
,`login_user_id` int
,`password` varchar(255)
,`status` tinyint
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login_id` int NOT NULL,
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
  `city_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `departament_id` int NOT NULL,
  `rank_id` int NOT NULL,
  `rank_group_id` int DEFAULT NULL,
  `company_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `login_id`, `name`, `professionalName`, `email`, `born_at`, `motherName`, `fatherName`, `militaryId`, `cpf`, `photoUrl`, `street`, `district`, `city_id`, `created_at`, `updated_at`, `departament_id`, `rank_id`, `rank_group_id`, `company_id`) VALUES
(1, 1, 'EDURADO', 'DUDU ', NULL, NULL, 'DUDA', 'DUDE', '159', 'DUDU', 'DUDU', 'DUDU', 'BAIRRO', 2, '2021-04-08 18:27:29', '2021-04-08 18:27:29', 1, 1, 1, 2),
(2, 2, 'LULU', 'LULU', NULL, NULL, 'LULA', 'LULE', 'LULU', 'LULU', 'LINK PARA STORAGE', 'LULU', 'BAIRRO', 1, '2021-04-08 18:27:29', '2021-04-08 18:27:29', 2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para vista `subview`
--
DROP TABLE IF EXISTS `subview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `subview`  AS SELECT `login`.`id` AS `login_id`, `login`.`login` AS `login`, `login`.`password` AS `password`, `login`.`users_id` AS `login_user_id`, `login`.`status` AS `status`, `login_application`.`applications_id` AS `login_app_id` FROM (`login` left join `login_application` on((`login_application`.`login_id` = `login`.`id`))) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `ultraview`
--
DROP TABLE IF EXISTS `ultraview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ultraview`  AS SELECT `subview`.`login_id` AS `login_id`, `subview`.`login` AS `login`, `subview`.`password` AS `password`, `subview`.`login_user_id` AS `login_user_id`, `subview`.`status` AS `status`, `subview`.`login_app_id` AS `login_app_id`, `applications`.`id` AS `app_id`, `applications`.`name` AS `app_name`, `applications`.`permissions_id` AS `app_permission_fk` FROM (`subview` left join `applications` on((`applications`.`id` = `subview`.`login_app_id`))) ;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `company`
--
ALTER TABLE `company`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `departament`
--
ALTER TABLE `departament`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `rank_groups`
--
ALTER TABLE `rank_groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
