-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Nov-2017 às 13:49
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tendadoencontro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'tendadoencontro2017@gmail.com', '9bcbedea4ac741e2dcd60eff17b01d67864a88f0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `location` varchar(300) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `categorys` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorys`
--

INSERT INTO `categorys` (`id`, `categorys`) VALUES
(1, 'Festas'),
(2, 'Reforcos'),
(3, 'Brincadeiras'),
(4, 'Cursos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `managerbr`
--

CREATE TABLE `managerbr` (
  `id` int(11) NOT NULL,
  `slide1` varchar(100) DEFAULT NULL,
  `slide2` varchar(100) DEFAULT NULL,
  `slide3` varchar(100) DEFAULT NULL,
  `slideTitle1` varchar(100) DEFAULT NULL,
  `slideTitle2` varchar(100) DEFAULT NULL,
  `slideTitle3` varchar(100) DEFAULT NULL,
  `slideSubtitle1` varchar(100) DEFAULT NULL,
  `slideSubtitle2` varchar(100) DEFAULT NULL,
  `slideSubtitle3` varchar(100) DEFAULT NULL,
  `phone` varchar(100) NOT NULL,
  `donationTitle` varchar(100) NOT NULL,
  `donationSubtitle` varchar(100) NOT NULL,
  `color` varchar(30) DEFAULT NULL,
  `qtEmails` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `managerbr`
--

INSERT INTO `managerbr` (`id`, `slide1`, `slide2`, `slide3`, `slideTitle1`, `slideTitle2`, `slideTitle3`, `slideSubtitle1`, `slideSubtitle2`, `slideSubtitle3`, `phone`, `donationTitle`, `donationSubtitle`, `color`, `qtEmails`) VALUES
(1, 'Partilhe a vida conosco', 'Colabore Conosco', 'Conheça os nossos eventos', 'Estamos esperando você!', 'Ajude a Tenda do Encontro', 'Feitos para você', 'Conheça a nossa galeria de fotos', 'Juntos pela vida!', 'São mais de 5 eventos especiais para você!', '(51) 3091 - 2267 | (51) 99729 - 0399 | (51) 99955 - 8770', 'Contribui Conosco', 'Doações para: Associação Laura Vicuna - Agência: 4896 / Conta: 130000 12-2', 'azul', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `manageres`
--

CREATE TABLE `manageres` (
  `id` int(11) NOT NULL,
  `slide1` varchar(100) DEFAULT NULL,
  `slide2` varchar(100) DEFAULT NULL,
  `slide3` varchar(100) DEFAULT NULL,
  `slideTitle1` varchar(100) DEFAULT NULL,
  `slideTitle2` varchar(100) DEFAULT NULL,
  `slideTitle3` varchar(100) DEFAULT NULL,
  `slideSubtitle1` varchar(100) DEFAULT NULL,
  `slideSubtitle2` varchar(100) DEFAULT NULL,
  `slideSubtitle3` varchar(100) DEFAULT NULL,
  `phone` varchar(100) NOT NULL,
  `donationTitle` varchar(100) NOT NULL,
  `donationSubtitle` varchar(100) NOT NULL,
  `color` varchar(30) DEFAULT NULL,
  `qtEmails` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `manageres`
--

INSERT INTO `manageres` (`id`, `slide1`, `slide2`, `slide3`, `slideTitle1`, `slideTitle2`, `slideTitle3`, `slideSubtitle1`, `slideSubtitle2`, `slideSubtitle3`, `phone`, `donationTitle`, `donationSubtitle`, `color`, `qtEmails`) VALUES
(1, 'CHAMADA1', 'CHAMADA2', 'CHAMADA3', 'Titulo1', 'Titulo2', 'Titulo3', 'subTitulo1', 'subTitulo2', 'subTitulo3', ' +55 (51) 99999-9999', 'Titulo Aqui', 'SubTitulo', 'amarelo', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `managereua`
--

CREATE TABLE `managereua` (
  `id` int(11) NOT NULL,
  `slide1` varchar(100) DEFAULT NULL,
  `slide2` varchar(100) DEFAULT NULL,
  `slide3` varchar(100) DEFAULT NULL,
  `slideTitle1` varchar(100) DEFAULT NULL,
  `slideTitle2` varchar(100) DEFAULT NULL,
  `slideTitle3` varchar(100) DEFAULT NULL,
  `slideSubtitle1` varchar(100) DEFAULT NULL,
  `slideSubtitle2` varchar(100) DEFAULT NULL,
  `slideSubtitle3` varchar(100) DEFAULT NULL,
  `phone` varchar(100) NOT NULL,
  `donationTitle` varchar(100) NOT NULL,
  `donationSubtitle` varchar(100) NOT NULL,
  `color` varchar(30) DEFAULT NULL,
  `qtEmails` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `managereua`
--

INSERT INTO `managereua` (`id`, `slide1`, `slide2`, `slide3`, `slideTitle1`, `slideTitle2`, `slideTitle3`, `slideSubtitle1`, `slideSubtitle2`, `slideSubtitle3`, `phone`, `donationTitle`, `donationSubtitle`, `color`, `qtEmails`) VALUES
(1, 'CHAMADA1', 'CHAMADA2', 'CHAMADA3', 'Titulo1', 'Titulo2', 'Titulo3', 'subTitulo1', 'subTitulo2', 'subTitulo3', ' +55 (51) 99999-9999', 'Titulo Aqui', 'SubTitulo', 'amarelo', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `texto` varchar(500) DEFAULT NULL,
  `data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managerbr`
--
ALTER TABLE `managerbr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manageres`
--
ALTER TABLE `manageres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managereua`
--
ALTER TABLE `managereua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `managerbr`
--
ALTER TABLE `managerbr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `manageres`
--
ALTER TABLE `manageres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `managereua`
--
ALTER TABLE `managereua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
