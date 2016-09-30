-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Set-2016 às 15:43
-- Versão do servidor: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memeland`
--
CREATE DATABASE IF NOT EXISTS `memeland` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `memeland`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_memes`
--

DROP TABLE IF EXISTS `tb_memes`;
CREATE TABLE IF NOT EXISTS `tb_memes` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `descricao` text,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_memes`
--

INSERT INTO `tb_memes` (`id`, `nome`, `descricao`, `url`) VALUES
(1, 'rageguy', 'personagem zangado gritando ffffffuuuuuu', 'http://i0.kym-cdn.com/entries/icons/original/000/000/063/Picture_2_c.jpg'),
(2, 'challenge accepted', 'Desafio Aceito', 'http://vignette2.wikia.nocookie.net/animaljam/images/d/d2/Challenge-accepted.png/revision/latest?cb=20140928111255');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
