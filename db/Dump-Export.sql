-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Jan-2019 às 03:38
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kzs_jobs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidaturas`
--

CREATE TABLE `candidaturas` (
  `usuario_id` int(11) NOT NULL,
  `vaga_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `candidaturas`
--

INSERT INTO `candidaturas` (`usuario_id`, `vaga_id`) VALUES
(2, 1),
(2, 9),
(4, 1),
(4, 2),
(4, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `experiencias`
--

CREATE TABLE `experiencias` (
  `id` int(11) NOT NULL,
  `local` varchar(120) NOT NULL,
  `descricao` text NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `tipo` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `experiencias`
--

INSERT INTO `experiencias` (`id`, `local`, `descricao`, `usuario_id`, `tipo`) VALUES
(1, 'Universidade Fernando Pessoa', '  Engenharia da InformÃ¡tica  ', 4, 'EDU'),
(2, 'Hospital SÃ£o JoÃ£o', 'Realizado trabalho voluntÃ¡rio no Hospital SÃ£o JoÃ£o, localizado na cidade do Porto. Voluntariado era com crianÃ§as de 2 a 5 anos. ', 4, 'VOL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `endereco` varchar(120) DEFAULT NULL,
  `sexo` char(1) NOT NULL,
  `data_nasc` date NOT NULL,
  `tipo` char(1) NOT NULL,
  `nro_telefone` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `login`, `senha`, `endereco`, `sexo`, `data_nasc`, `tipo`, `nro_telefone`) VALUES
(1, 'Empresa ABC', 'empresa@empresa.com', 'empresa', '$2a$08$Cf1f11ePArKlBJomM0F6a.ZbjhMDCEL68pJ97JHRsyeB3v080L6hO', 'EndereÃ§o da Empresa ABC', 'N', '1990-01-01', 'E', NULL),
(2, 'UsuÃ¡rio ABC', 'usuario@usuario.com', 'usuario', '$2a$08$Cf1f11ePArKlBJomM0F6a.ZbjhMDCEL68pJ97JHRsyeB3v080L6hO', 'EndereÃ§o do usuÃ¡rio ABC', '', '1990-01-01', 'U', NULL),
(3, 'Administrador', 'admin@admin.com', 'admin', '123456', NULL, 'M', '1992-05-12', 'A', NULL),
(4, 'Kevin Zamperetti Schepke', 'kevin.zamperetti92@gmail.com', '', '$2a$08$Cf1f11ePArKlBJomM0F6a.ZbjhMDCEL68pJ97JHRsyeB3v080L6hO', 'Rua Fernando Cortez, 150 apto 102', 'M', '1992-05-12', 'U', 35192502809),
(68, 'RogÃ©rio', 'rogerio@gmail.com', '', '$2a$08$Cf1f11ePArKlBJomM0F6a.ZbjhMDCEL68pJ97JHRsyeB3v080L6hO', 'Rua Nove de Abril, 677 - Porto', 'M', '1990-06-10', 'U', 35199999990),
(69, 'Cristina', 'cristina@gmail.com', '', '$2a$08$Cf1f11ePArKlBJomM0F6a.8hkDBVwbjEj4M.X8f8Mif742BLRbCGO', 'Rua Nove de Abril, 677 - Porto', 'F', '1992-08-06', 'U', 35199999777),
(70, 'Holden RH', 'holden@holden.com', '', '$2a$08$Cf1f11ePArKlBJomM0F6a.ZbjhMDCEL68pJ97JHRsyeB3v080L6hO', 'Avenida Aliados, 1000 - Porto - Portugal', 'N', '2010-03-01', 'E', NULL),
(72, 'Kevin ZS', 'kevin.zamperetti@ulbra.inf.br', '', '$2a$08$Cf1f11ePArKlBJomM0F6a.ZbjhMDCEL68pJ97JHRsyeB3v080L6hO', 'teste', 'M', '1950-01-01', 'U', 92504229);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `descricao` text NOT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  `tipo` varchar(3) NOT NULL,
  `area` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id`, `titulo`, `descricao`, `empresa_id`, `tipo`, `area`) VALUES
(1, 'EstÃ¡gio InformÃ¡tica', 'EstÃ¡gio na Ã¡rea da informÃ¡tica para recÃ©m formados. \r\n\r\nDesejÃ¡vel conhecimento em linguagem de programaÃ§Ã£o Java e banco de dados Oracle.\r\n\r\nHorÃ¡rio Ã  combinar. 30 horas semanais. \r\nDe Segunda Ã  Sexta.', 1, 'EST', NULL),
(2, 'Programador Java JÃºnior', 'Oferecemos Ã³tima oportunidade em empresa de desenvolvimento de softwares.\r\n\r\nDesejÃ¡vel conhecimento comprovado em Java de no mÃ­nimo 1 ano. Conhecimento em banco de dados Oracle Ã© um diferencial.\r\n\r\n40 horas semanais. De Segunda Ã  Sexta.\r\nOrdenado acima do valor do mercado.', 1, 'EMP', NULL),
(6, 'EstÃ¡gio Medicina DentÃ¡ria', ' Procuramos recÃ©m formado para estÃ¡gio e grande hospital privado na cidade do Porto.\r\n\r\nHorÃ¡rio Ã  combinar. 30 horas semanais. \r\nDe Segunda Ã  Sexta. ', 1, 'EST', NULL),
(7, 'EstÃ¡gio Medicina VeterinÃ¡ria', 'EstÃ¡gio em hospital veterinÃ¡rio localizado na cidade de Coimbra.\r\n\r\nProcuramos recÃ©m formados para trabalhar com animais de pequeno e mÃ©dio porte.\r\n\r\nHorÃ¡rio Ã  combinar. 30 horas semanais. \r\nDe Segunda Ã  Sexta.', 1, 'EST', NULL),
(8, 'Trabalho VoluntÃ¡rio em Hospital', 'Estamos a procura de pessoas para trabalho voluntÃ¡rio em um Hospital Infantil, localizado na cidade de Braga.\r\n\r\nAtividades: IrÃ¡ auxiliar na parte de recreaÃ§Ã£o das crianÃ§as, com brincadeiras, passeando no jardim entre outras atividades. \r\n\r\nÃ‰ importante gostar de crianÃ§as.\r\n\r\nInteressados, podem se candidatar no site que entraremos em contato.', 1, 'VOL', NULL),
(9, 'MÃ©dico(a) VeterinÃ¡rio(a) - Medicina DentÃ¡ria', ' Hospital VeterinÃ¡rio do Porto estÃ¡ a procura de um mÃ©dico(a) veterinÃ¡rio(a) com especialidade na Ã¡rea de Medicina DentÃ¡ria de animais de pequeno porte.\r\n\r\nContrataÃ§Ã£o imediata. Ordenado acima do valor do mercado.\r\n\r\nHorÃ¡rio: 48 horas semanais. De segunda Ã  sexta com uma folga na semana. ', 1, 'EMP', NULL),
(11, 'EstÃ¡gio Criminologia', 'Procura-se recÃ©m formado(a) para estÃ¡gio em empresa de advocacia localizada na cidade de Braga.\r\n\r\nOferecemos bolsa auxÃ­lio, alimentaÃ§Ã£o e transporte. \r\n\r\nDe preferÃªncia que resida na cidade de Braga.\r\n\r\nHorÃ¡rio: Segunda Ã  Sexta. Das 10:00 Ã s 16:00\r\n', 70, 'EST', NULL),
(62, 'teste 2', 'teste 2', 1, 'EST', NULL),
(63, 'EstÃ¡gio InformÃ¡tica PHP', 'sasa', 1, 'EST', NULL),
(64, 'Programador Java Pleno', 'Programador Java Pleno', 1, 'EMP', NULL),
(65, 'EstÃ¡gio Medicina VeterinÃ¡ria Fisioterapia', 'EstÃ¡gio Medicina VeterinÃ¡ria Fisioterapia', 1, 'EST', NULL),
(66, 'VoluntÃ¡rio em Fisioterapia', 'VoluntÃ¡rio em Fisioterapia', 1, 'VOL', NULL),
(67, 'Programador Python Junior', 'Programador Python Junior', 1, 'EMP', NULL),
(70, 'teste', 'teste', 1, 'EMP', NULL),
(72, 'Teste de Vaga', 'Teste de Vaga', 1, 'EMP', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidaturas`
--
ALTER TABLE `candidaturas`
  ADD PRIMARY KEY (`usuario_id`,`vaga_id`),
  ADD KEY `vaga_id` (`vaga_id`);

--
-- Indexes for table `experiencias`
--
ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experiencias`
--
ALTER TABLE `experiencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `candidaturas`
--
ALTER TABLE `candidaturas`
  ADD CONSTRAINT `candidaturas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `candidaturas_ibfk_2` FOREIGN KEY (`vaga_id`) REFERENCES `vagas` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `experiencias`
--
ALTER TABLE `experiencias`
  ADD CONSTRAINT `experiencias_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `vagas`
--
ALTER TABLE `vagas`
  ADD CONSTRAINT `vagas_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
