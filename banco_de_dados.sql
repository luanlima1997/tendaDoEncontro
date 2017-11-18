-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Nov-2017 às 02:21
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
(2, 'Reforços');

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
  `phone` varchar(30) NOT NULL,
  `collectionTitle` varchar(40) NOT NULL,
  `collectionSubtitle` varchar(100) NOT NULL,
  `collectionVideo` varchar(200) NOT NULL,
  `color` varchar(30) DEFAULT NULL,
  `qtEmails` int(50) DEFAULT NULL,
  `acessoLoja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `managerbr`
--

INSERT INTO `managerbr` (`id`, `slide1`, `slide2`, `slide3`, `slideTitle1`, `slideTitle2`, `slideTitle3`, `slideSubtitle1`, `slideSubtitle2`, `slideSubtitle3`, `phone`, `collectionTitle`, `collectionSubtitle`, `collectionVideo`, `color`, `qtEmails`, `acessoLoja`) VALUES
(1, 'CHAMADA1', 'CHAMADA2', 'CHAMADA3', 'Titulo1', 'Titulo2', 'Titulo3', 'subTitulo1', 'subTitulo2', 'subTitulo3', ' +55 (51) 99999-9999', 'Titulo Aqui', 'SubTitulo', 'id video ?', 'amarelo', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `manageres`
--

CREATE TABLE `manageres` (
  `id` int(11) NOT NULL DEFAULT '0',
  `slide1` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `slide2` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `slide3` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `slideTitle1` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `slideTitle2` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `slideTitle3` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `slideSubtitle1` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `slideSubtitle2` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `slideSubtitle3` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(30) CHARACTER SET latin1 NOT NULL,
  `collectionTitle` varchar(40) CHARACTER SET latin1 NOT NULL,
  `collectionSubtitle` varchar(100) CHARACTER SET latin1 NOT NULL,
  `collectionVideo` varchar(200) CHARACTER SET latin1 NOT NULL,
  `color` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `qtEmails` int(50) DEFAULT NULL,
  `acessoLoja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `managereua`
--

CREATE TABLE `managereua` (
  `id` int(11) NOT NULL DEFAULT '0',
  `slide1` varchar(100) DEFAULT NULL,
  `slide2` varchar(100) DEFAULT NULL,
  `slide3` varchar(100) DEFAULT NULL,
  `slideTitle1` varchar(100) DEFAULT NULL,
  `slideTitle2` varchar(100) DEFAULT NULL,
  `slideTitle3` varchar(100) DEFAULT NULL,
  `slideSubtitle1` varchar(100) DEFAULT NULL,
  `slideSubtitle2` varchar(100) DEFAULT NULL,
  `slideSubtitle3` varchar(100) DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `collectionTitle` varchar(40) NOT NULL,
  `collectionSubtitle` varchar(100) NOT NULL,
  `collectionVideo` varchar(200) NOT NULL,
  `color` varchar(30) DEFAULT NULL,
  `qtEmails` int(50) DEFAULT NULL,
  `acessoLoja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `managerbr`
--
ALTER TABLE `managerbr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
