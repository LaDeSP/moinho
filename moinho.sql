-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 21-Dez-2017 às 17:12
-- Versão do servidor: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.24-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moinho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `advertencia`
--

CREATE TABLE `advertencia` (
  `id` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `tipo_abuso` varchar(1000) DEFAULT NULL,
  `agressor` varchar(1000) DEFAULT NULL,
  `ocorrencia_id` int(11) NOT NULL,
  `nome_advertencia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaborador`
--

CREATE TABLE `colaborador` (
  `id` int(11) NOT NULL,
  `ano_de_ingresso` year(4) DEFAULT NULL,
  `area_atuacao` varchar(45) DEFAULT NULL,
  `pessoa_id` int(11) NOT NULL,
  `tipo_colaborador_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `colaborador`
--

INSERT INTO `colaborador` (`id`, `ano_de_ingresso`, `area_atuacao`, `pessoa_id`, `tipo_colaborador_id`) VALUES
(6, 2012, 'Algoritmo', 190, 1),
(7, 2005, 'Estrutura de Dados', 191, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `numero_fixo` varchar(45) DEFAULT NULL,
  `celular1` varchar(45) DEFAULT NULL,
  `celular2` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `pessoa_id` int(11) DEFAULT NULL,
  `escola_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `numero_fixo`, `celular1`, `celular2`, `email`, `pessoa_id`, `escola_id`) VALUES
(5, '324235323', '523352532', '253532532', 'sesi@sesi.com.br', NULL, NULL),
(6, '532532533', '523532235', '523532325', 'vandoni@vandoni.com', NULL, NULL),
(7, '522523532', '253532523', '253532532', 'joao@joao.com', 184, NULL),
(8, '325532532', '523532532', '523532535', 'jorge@jorge.com', 187, NULL),
(9, '346346643', '634643643', '643643643', 'lucineide@lucineide.com', 190, NULL),
(10, '235352353', '253532523', '523523535', 'barbara@barbara.com', 191, NULL),
(11, '523535325', '235532523', '523535325', 'ele@ele.com', 192, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_inscricao`
--

CREATE TABLE `dados_inscricao` (
  `id` int(11) NOT NULL,
  `turno` varchar(45) DEFAULT NULL,
  `turma` varchar(45) DEFAULT NULL,
  `observacoes` varchar(1000) DEFAULT NULL,
  `transporte` varchar(45) DEFAULT NULL,
  `profissao` varchar(45) DEFAULT NULL,
  `raca` varchar(45) DEFAULT NULL,
  `religiao` varchar(45) DEFAULT NULL,
  `renda` decimal(50,0) DEFAULT NULL,
  `qtd_residencia` int(11) DEFAULT NULL,
  `beneficio_social` varchar(45) DEFAULT NULL,
  `serie` varchar(45) DEFAULT NULL,
  `escola_id` int(11) NOT NULL,
  `dados_pessoais_id` int(11) NOT NULL,
  `mae_id` int(11) NOT NULL,
  `pai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dados_inscricao`
--

INSERT INTO `dados_inscricao` (`id`, `turno`, `turma`, `observacoes`, `transporte`, `profissao`, `raca`, `religiao`, `renda`, `qtd_residencia`, `beneficio_social`, `serie`, `escola_id`, `dados_pessoais_id`, `mae_id`, `pai_id`) VALUES
(56, 'Vespertino', 'Sexto Ano', 'Não', 'Ônibus', 'Não possui', 'Negro', 'Cristão', '4343', 4, 'Não', 'Sexta', 4, 184, 186, 185),
(57, 'Vespertino', 'B', 'Não', 'Ônibus', 'não', 'Negro', 'Ateu', '34523', 4, 'Não', 'Segunda', 3, 187, 189, 188),
(58, 'Vespertino', 'Nao', NULL, 'Onibus', 'Nao', 'Negro', 'Ateu', '443', 3, 'Não', 'Segunda', 4, 192, 194, 193);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `turno` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `sala_de_aula` varchar(45) DEFAULT NULL,
  `colaborador_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `turno`, `nome`, `sala_de_aula`, `colaborador_id`) VALUES
(1, 'Matutino', 'Inteligencia Artificial', '123', 7),
(2, 'Matutino', 'Metodologia Cientifica', 'A45', 7),
(3, 'Matutino', 'Segurança e Auditoria', 'A32', 7),
(4, 'Matutino', 'IHC', 'A23', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento`
--

CREATE TABLE `documento` (
  `id` int(15) NOT NULL,
  `comentario` varchar(100) DEFAULT NULL,
  `url` varchar(100) NOT NULL,
  `numero_documento` int(100) NOT NULL,
  `documento_tipo_id` int(15) NOT NULL,
  `inscricao_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `documento`
--

INSERT INTO `documento` (`id`, `comentario`, `url`, `numero_documento`, `documento_tipo_id`, `inscricao_id`) VALUES
(18, 'não tem', 'documento/p7USYDtQxPD0sN5y3lOEYHXdr77S88QoE2FbqxKT.odt', 1, 1, 51),
(19, 'Não há', 'documento/BuWJ4HrUPlan0UxDr4uKWwGePiZwicaALLyB4NSf.pdf', 1, 2, 51),
(20, NULL, 'documento/zK4HskwWdkPd87dOFAtS4n6c70Y2daMinA98B5EK.odt', 1, 1, 53);

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento_tipo`
--

CREATE TABLE `documento_tipo` (
  `id` int(15) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `documento_tipo`
--

INSERT INTO `documento_tipo` (`id`, `nome`, `descricao`) VALUES
(1, 'CPF', 'Copia do CPF da pessoa'),
(2, 'Comprovante de Residência ', 'Documento que comprova moradia do estudante '),
(3, 'Comprovante de Matrícula ', 'Documento que comprova a matrícula do estudante em uma instituição escolar ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Endereco`
--

CREATE TABLE `Endereco` (
  `id` int(11) NOT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Endereco`
--

INSERT INTO `Endereco` (`id`, `rua`, `bairro`, `numero`, `complemento`, `cep`, `cidade`, `estado`, `pais`) VALUES
(81, 'Rua Ladário', 'Popular Velha', '5325', 'Entre', '79310600', 'Corumbá', NULL, 'Brasil'),
(82, 'Rua Ladário', 'Popular Velha', '545523', 'dgsgs', '79310600', 'Corumbá', NULL, 'Brasil'),
(83, 'Rua Ladário', 'Popular Velha', '757', 'entre', '79310600', 'Corumbá', 'MS', 'Brasil'),
(84, 'Rua Ladário', 'Popular Velha', '5223', 'ENtre', '79310600', 'Corumbá', 'MS', 'Brasil'),
(85, 'Rua Ladário', 'Popular Velha', '870', 'Não', '79310600', 'Corumbá', 'MS', 'Brasil'),
(86, 'Rua Ladário', 'Popular Velha', '768', 'Entre', '79310600', 'Corumbá', 'MS', 'Brasil'),
(87, 'Rua Ladário', 'Popular Velha', '5532', 'Entre', '79310600', 'Corumbá', 'MS', 'Brasil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola`
--

CREATE TABLE `escola` (
  `id` int(11) NOT NULL,
  `nome_fantasia` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `contato_id` int(11) NOT NULL,
  `Endereco_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `escola`
--

INSERT INTO `escola` (`id`, `nome_fantasia`, `nome`, `tipo`, `contato_id`, `Endereco_id`) VALUES
(3, 'SESI', 'Escola do SESI', 'Particular', 5, 81),
(4, 'Vandoni', 'Vandoni - ME', 'Pública', 6, 82);

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `data_inicial` datetime DEFAULT NULL,
  `data_final` datetime DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `situacao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `dia_semana` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `disciplina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `id` int(11) NOT NULL,
  `data_inscricao` datetime DEFAULT NULL,
  `data_avaliacao` datetime DEFAULT NULL,
  `dados_inscricao_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `inscricao`
--

INSERT INTO `inscricao` (`id`, `data_inscricao`, `data_avaliacao`, `dados_inscricao_id`) VALUES
(51, '2017-12-21 00:00:00', '2018-01-05 00:00:00', 56),
(52, '2017-11-28 00:00:00', '2017-12-05 00:00:00', 57),
(53, '2017-11-26 00:00:00', '2017-11-27 00:00:00', 58);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE `matricula` (
  `id` int(11) NOT NULL,
  `turno` varchar(45) DEFAULT NULL,
  `periodo` varchar(45) DEFAULT NULL,
  `inscricao_id` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `turma_id` int(11) NOT NULL,
  `status_matricula_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `matricula`
--

INSERT INTO `matricula` (`id`, `turno`, `periodo`, `inscricao_id`, `data`, `turma_id`, `status_matricula_id`) VALUES
(14, NULL, 'Vespertino', 53, '2017-11-30 00:00:00', 81, 2),
(15, NULL, 'Segundo', 52, '2017-12-06 00:00:00', 77, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nome_advertencia`
--

CREATE TABLE `nome_advertencia` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nome_turma`
--

CREATE TABLE `nome_turma` (
  `id` int(11) NOT NULL,
  `nome_turma` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nome_turma`
--

INSERT INTO `nome_turma` (`id`, `nome_turma`) VALUES
(8, 'Básico I'),
(9, 'Básico II'),
(10, 'Intermediário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `id` int(11) NOT NULL,
  `motivo` varchar(1000) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `participante_id` int(11) NOT NULL,
  `coordenador_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `participante`
--

CREATE TABLE `participante` (
  `id` int(11) NOT NULL,
  `serie` varchar(45) DEFAULT NULL,
  `sala_de_aula` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `matricula_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `participante_evento`
--

CREATE TABLE `participante_evento` (
  `id` int(11) NOT NULL,
  `evento_id` int(11) NOT NULL,
  `participante_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `Endereco_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `cpf`, `data_nascimento`, `Endereco_id`) VALUES
(184, 'Rodrigo Costa', '35235523532', '2013-02-27', 83),
(185, 'Caetano Veloso', '52353253255', '2017-11-28', 83),
(186, 'Jasmin Pereira', '32553235253', '2017-11-27', 83),
(187, 'Jorge da Silva', '35325323535', '2005-03-01', 84),
(188, 'Joana Souza', '23553252552', '1982-03-03', 84),
(189, 'Joana Silva', '25353253253', '1997-02-01', 84),
(190, 'Lucineide Rodrigues', '34663464363', '1993-12-10', 85),
(191, 'Bárbara Barros', '52355325325', '2017-11-27', 86),
(192, 'Marina Almeida', '44343443325', '2017-11-26', 87),
(193, 'Joanna Souza', '53255325353', '2017-11-27', 87),
(194, 'Joao', '44343323253', '2017-11-26', 87);



-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel_evento`
--

CREATE TABLE `responsavel_evento` (
  `id` int(11) NOT NULL,
  `colaborador_id` int(11) NOT NULL,
  `evento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_matricula`
--

CREATE TABLE `status_matricula` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status_matricula`
--

INSERT INTO `status_matricula` (`id`, `status`) VALUES
(1, 'Regular'),
(2, 'Afastado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_colaborador`
--

CREATE TABLE `tipo_colaborador` (
  `id` int(15) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_colaborador`
--

INSERT INTO `tipo_colaborador` (`id`, `nome`) VALUES
(1, 'Professor'),
(2, 'Coordenador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id` int(11) NOT NULL,
  `turno` varchar(45) DEFAULT NULL,
  `nome_turma_int` int(11) NOT NULL,
  `ano` year(4) NOT NULL,
  `periodo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id`, `turno`, `nome_turma_int`, `ano`, `periodo`) VALUES
(77, 'Vespertino', 8, 2018, 'Segundo'),
(78, 'Matutino', 8, 2014, 'Primeiro'),
(79, 'Noturno', 8, 2014, 'Primeiro'),
(80, 'Noturno', 9, 2015, 'Primeiro'),
(81, 'Matutino', 10, 2013, 'Primeiro'),
(82, 'Noturno', 10, 2014, 'Segundo'),
(83, 'Noturno', 10, 2013, 'Segundo'),
(84, 'Segundo', 8, 2013, 'Primeiro'),
(85, 'Vespertino', 8, 2014, 'Segundo'),
(86, 'Segundo', 8, 2012, 'Segundo'),
(87, 'Segundo', 10, 2012, 'Segundo'),
(88, 'Vespertino', 10, 2012, 'Segundo'),
(89, 'Vespertino', 9, 2012, 'Segundo'),
(90, 'Vespertino', 8, 2012, 'Segundo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_disciplina`
--

CREATE TABLE `turma_disciplina` (
  `id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma_disciplina`
--

INSERT INTO `turma_disciplina` (`id`, `turma_id`, `disciplina_id`) VALUES
(64, 90, 1),
(65, 90, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `registration_number`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Maria', 'altaircunha@gmail.com', '$2y$10$.0Ik70cQgQlMu5smPfl3rut0uG753mXL76K84jY28rPvbXr8agv7q', NULL, 'B4v4UyhtedKQYmB8zLGSoRGc2GqjaiLaW9Cy6uGQV7WxMasMlkRxozC1ZXuL', '2017-11-27 12:14:20', '2017-11-27 12:14:20'),
(2, 'krg10', 'krdg10@live.com', '$2y$10$W6.0D91HctE.ANNHGFwh.uCrXE07z6zxndgYkIPb69cHKPwqqiryi', NULL, 'gvtbQjR8S6g6aufz2dhn11GQtg8Y3W87bMlnURGINAmOCArZW9EdLVWWAvKw', '2017-11-27 12:20:52', '2017-11-27 12:20:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertencia`
--
ALTER TABLE `advertencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_advertencia_ocorrencia1_idx` (`ocorrencia_id`),
  ADD KEY `fk_advertencia_nome_advertencia1_idx` (`nome_advertencia_id`);

--
-- Indexes for table `colaborador`
--
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_colaborador_dados_pessoais1_idx` (`pessoa_id`),
  ADD KEY `tipo_colaborador_id` (`tipo_colaborador_id`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contato_pessoa1_idx` (`pessoa_id`),
  ADD KEY `escola_id` (`escola_id`);

--
-- Indexes for table `dados_inscricao`
--
ALTER TABLE `dados_inscricao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dados_inscricao_escola1_idx` (`escola_id`),
  ADD KEY `fk_dados_inscricao_dados_pessoais1_idx` (`dados_pessoais_id`),
  ADD KEY `fk_dados_inscricao_dados_pessoais2_idx` (`mae_id`),
  ADD KEY `fk_dados_inscricao_dados_pessoais3_idx` (`pai_id`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_disciplina_colaborador1_idx` (`colaborador_id`);

--
-- Indexes for table `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documento_tipo_id` (`documento_tipo_id`),
  ADD KEY `inscricao_id` (`inscricao_id`);

--
-- Indexes for table `documento_tipo`
--
ALTER TABLE `documento_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Endereco`
--
ALTER TABLE `Endereco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escola`
--
ALTER TABLE `escola`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_escola_contato1_idx` (`contato_id`),
  ADD KEY `fk_escola_Endereco1_idx` (`Endereco_id`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_horario_disciplina1_idx` (`disciplina_id`);

--
-- Indexes for table `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inscricao_dados_inscricao1_idx` (`dados_inscricao_id`);

--
-- Indexes for table `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_matricula_inscricao1_idx` (`inscricao_id`),
  ADD KEY `fk_matricula_turma1_idx` (`turma_id`),
  ADD KEY `status_matricula_id` (`status_matricula_id`) USING BTREE;

--
-- Indexes for table `nome_advertencia`
--
ALTER TABLE `nome_advertencia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nome_turma`
--
ALTER TABLE `nome_turma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ocorrencia_participante1_idx` (`participante_id`),
  ADD KEY `fk_ocorrencia_colaborador1_idx` (`coordenador_id`);

--
-- Indexes for table `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_participante_matricula1_idx` (`matricula_id`);

--
-- Indexes for table `participante_evento`
--
ALTER TABLE `participante_evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_participante_evento_evento1_idx` (`evento_id`),
  ADD KEY `fk_participante_evento_participante1_idx` (`participante_id`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Endereco_id` (`Endereco_id`);


--
-- Indexes for table `responsavel_evento`
--
ALTER TABLE `responsavel_evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_responsavel_evento_colaborador1_idx` (`colaborador_id`),
  ADD KEY `fk_responsavel_evento_evento1_idx` (`evento_id`);

--
-- Indexes for table `status_matricula`
--
ALTER TABLE `status_matricula`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_colaborador`
--
ALTER TABLE `tipo_colaborador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_turma_nome_turma1_idx` (`nome_turma_int`);

--
-- Indexes for table `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_turma_disciplina_turma1_idx` (`turma_id`),
  ADD KEY `fk_turma_disciplina_disciplina1_idx` (`disciplina_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertencia`
--
ALTER TABLE `advertencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `dados_inscricao`
--
ALTER TABLE `dados_inscricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `documento`
--
ALTER TABLE `documento`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `documento_tipo`
--
ALTER TABLE `documento_tipo`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Endereco`
--
ALTER TABLE `Endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `escola`
--
ALTER TABLE `escola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `nome_turma`
--
ALTER TABLE `nome_turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT for table `status_matricula`
--
ALTER TABLE `status_matricula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tipo_colaborador`
--
ALTER TABLE `tipo_colaborador`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `advertencia`
--
ALTER TABLE `advertencia`
  ADD CONSTRAINT `fk_advertencia_nome_advertencia1` FOREIGN KEY (`nome_advertencia_id`) REFERENCES `nome_advertencia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_advertencia_ocorrencia1` FOREIGN KEY (`ocorrencia_id`) REFERENCES `ocorrencia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `colaborador`
--
ALTER TABLE `colaborador`
  ADD CONSTRAINT `colaborador_ibfk_1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`),
  ADD CONSTRAINT `colaborador_ibfk_2` FOREIGN KEY (`tipo_colaborador_id`) REFERENCES `tipo_colaborador` (`id`);

--
-- Limitadores para a tabela `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `contato_ibfk_1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`),
  ADD CONSTRAINT `contato_ibfk_2` FOREIGN KEY (`escola_id`) REFERENCES `escola` (`id`);

--
-- Limitadores para a tabela `dados_inscricao`
--
ALTER TABLE `dados_inscricao`
  ADD CONSTRAINT `dados_inscricao_ibfk_1` FOREIGN KEY (`dados_pessoais_id`) REFERENCES `pessoa` (`id`),
  ADD CONSTRAINT `dados_inscricao_ibfk_2` FOREIGN KEY (`mae_id`) REFERENCES `pessoa` (`id`),
  ADD CONSTRAINT `dados_inscricao_ibfk_3` FOREIGN KEY (`pai_id`) REFERENCES `pessoa` (`id`),
  ADD CONSTRAINT `dados_inscricao_ibfk_4` FOREIGN KEY (`escola_id`) REFERENCES `escola` (`id`);

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`colaborador_id`) REFERENCES `colaborador` (`id`);

--
-- Limitadores para a tabela `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `documento_ibfk_1` FOREIGN KEY (`documento_tipo_id`) REFERENCES `documento_tipo` (`id`),
  ADD CONSTRAINT `documento_ibfk_2` FOREIGN KEY (`inscricao_id`) REFERENCES `inscricao` (`id`);

--
-- Limitadores para a tabela `escola`
--
ALTER TABLE `escola`
  ADD CONSTRAINT `escola_ibfk_2` FOREIGN KEY (`contato_id`) REFERENCES `contato` (`id`),
  ADD CONSTRAINT `escola_ibfk_3` FOREIGN KEY (`Endereco_id`) REFERENCES `Endereco` (`id`);

--
-- Limitadores para a tabela `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplina` (`id`);

--
-- Limitadores para a tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD CONSTRAINT `inscricao_ibfk_1` FOREIGN KEY (`dados_inscricao_id`) REFERENCES `dados_inscricao` (`id`);

--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`inscricao_id`) REFERENCES `inscricao` (`id`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`),
  ADD CONSTRAINT `matricula_ibfk_3` FOREIGN KEY (`status_matricula_id`) REFERENCES `status_matricula` (`id`);

--
-- Limitadores para a tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD CONSTRAINT `fk_ocorrencia_participante1` FOREIGN KEY (`participante_id`) REFERENCES `participante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `participante_ibfk_1` FOREIGN KEY (`matricula_id`) REFERENCES `matricula` (`id`);

--
-- Limitadores para a tabela `participante_evento`
--
ALTER TABLE `participante_evento`
  ADD CONSTRAINT `fk_participante_evento_evento1` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_participante_evento_participante1` FOREIGN KEY (`participante_id`) REFERENCES `participante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `pessoa_ibfk_1` FOREIGN KEY (`Endereco_id`) REFERENCES `Endereco` (`id`);

-- Limitadores para a tabela `responsavel_evento`
--
ALTER TABLE `responsavel_evento`
  ADD CONSTRAINT `fk_responsavel_evento_evento1` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `responsavel_evento_ibfk_1` FOREIGN KEY (`colaborador_id`) REFERENCES `colaborador` (`id`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`nome_turma_int`) REFERENCES `nome_turma` (`id`);

--
-- Limitadores para a tabela `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  ADD CONSTRAINT `turma_disciplina_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`),
  ADD CONSTRAINT `turma_disciplina_ibfk_2` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplina` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
