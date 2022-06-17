-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 23-Jan-2020 às 18:41
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmw`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE IF NOT EXISTS `administradores` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `datanascimento` date NOT NULL,
  `senha_admin` varchar(18) NOT NULL,
  `sexo` text NOT NULL,
  `email` text NOT NULL,
  `tel` int(9) NOT NULL,
  `nif` int(9) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`id_admin`, `nome`, `datanascimento`, `senha_admin`, `sexo`, `email`, `tel`, `nif`) VALUES
(15, 'Manuel Morais', '2000-10-09', 'admin', 'Masculino', 'xmeetulol@gmail.com', 918063333, 123123123);

-- --------------------------------------------------------

--
-- Estrutura da tabela `casas`
--

DROP TABLE IF EXISTS `casas`;
CREATE TABLE IF NOT EXISTS `casas` (
  `id_casas` int(11) NOT NULL AUTO_INCREMENT,
  `morada` text NOT NULL,
  `senha_casa` varchar(18) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `n_casa_admin` int(11) NOT NULL DEFAULT '1',
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_casas`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `casas`
--

INSERT INTO `casas` (`id_casas`, `morada`, `senha_casa`, `id_admin`, `n_casa_admin`, `eliminado`) VALUES
(25, 'Rua Adolfo Loureiro N 14 / 16 ', 'adolfo', 15, 1, 0),
(26, 'Rua Teste Numero 3', '123', 15, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

DROP TABLE IF EXISTS `despesas`;
CREATE TABLE IF NOT EXISTS `despesas` (
  `id_despesas` int(11) NOT NULL AUTO_INCREMENT,
  `d_agua` double NOT NULL,
  `d_gas` double NOT NULL,
  `d_eletricidade` double NOT NULL,
  `d_seguranca` double NOT NULL,
  `d_net` double NOT NULL,
  `d_limpeza` double NOT NULL,
  `d_total` double NOT NULL,
  `d_data_ins` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_data_pagar` date NOT NULL,
  `d_data_pago` date DEFAULT NULL,
  `conf_pago` tinyint(1) DEFAULT '0',
  `id_pessoas` int(11) DEFAULT NULL,
  `casa_ou_pessoa` tinyint(1) NOT NULL DEFAULT '0',
  `id_casas` int(11) NOT NULL,
  `n_despesa_pc` int(11) NOT NULL DEFAULT '1',
  `n_mesmacasa` int(11) DEFAULT '1',
  PRIMARY KEY (`id_despesas`),
  KEY `id_pessoas` (`id_pessoas`),
  KEY `id_casas` (`id_casas`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`id_despesas`, `d_agua`, `d_gas`, `d_eletricidade`, `d_seguranca`, `d_net`, `d_limpeza`, `d_total`, `d_data_ins`, `d_data_pagar`, `d_data_pago`, `conf_pago`, `id_pessoas`, `casa_ou_pessoa`, `id_casas`, `n_despesa_pc`, `n_mesmacasa`) VALUES
(13, 50, 10, 10, 10, 10, 10, 100, '2020-01-23 18:00:14', '2020-10-10', NULL, 0, NULL, 0, 25, 1, 1),
(14, 16.67, 3.33, 3.33, 3.33, 3.33, 3.33, 83.33, '2020-01-23 18:00:14', '2020-10-10', NULL, 0, 19, 1, 25, 1, 2),
(15, 16.67, 3.33, 3.33, 3.33, 3.33, 3.33, 73.33, '2020-01-23 18:00:14', '2020-10-10', NULL, 0, 21, 1, 25, 1, 3),
(16, 16.67, 3.33, 3.33, 3.33, 3.33, 3.33, 63.33, '2020-01-23 18:00:14', '2020-10-10', NULL, 0, 22, 1, 25, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
CREATE TABLE IF NOT EXISTS `pessoas` (
  `id_pessoas` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `datanascimento` date NOT NULL,
  `nif` int(9) NOT NULL,
  `tel` int(9) NOT NULL,
  `email` text NOT NULL,
  `id_quartos` int(11) NOT NULL,
  `sexo` text NOT NULL,
  `n_pessoa_quarto` int(11) NOT NULL DEFAULT '1',
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pessoas`),
  KEY `id_quartos` (`id_quartos`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id_pessoas`, `nome`, `datanascimento`, `nif`, `tel`, `email`, `id_quartos`, `sexo`, `n_pessoa_quarto`, `eliminado`) VALUES
(19, 'Ricardo Araujo', '1999-03-10', 123123123, 911123123, 'ricardo@email.com', 26, 'Masculino', 1, 0),
(20, 'Rita Cardoso', '1998-02-09', 123123123, 911231233, 'xrita@gmail.com', 26, 'Feminino', 2, 1),
(21, 'Miguel Nogueira', '1999-03-02', 123123123, 918063123, 'xmeetulol@gmail.com', 27, 'Masculino', 1, 0),
(22, 'Carolina Rodrigues', '1999-01-13', 123123123, 911123123, 'carolinarodrigues@gmail.com', 28, 'Feminino', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quartos`
--

DROP TABLE IF EXISTS `quartos`;
CREATE TABLE IF NOT EXISTS `quartos` (
  `id_quartos` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `preço` double NOT NULL,
  `n_camas` int(11) NOT NULL,
  `id_casas` int(11) NOT NULL,
  `n_quarto_casa` int(11) NOT NULL DEFAULT '1',
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_quartos`),
  KEY `id_casas` (`id_casas`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quartos`
--

INSERT INTO `quartos` (`id_quartos`, `nome`, `preço`, `n_camas`, `id_casas`, `n_quarto_casa`, `eliminado`) VALUES
(26, 'Quarto Grande', 50, 1, 25, 1, 0),
(27, 'Quarto Medio', 40, 2, 25, 2, 0),
(28, 'Quarto Pequeno', 30, 1, 25, 3, 0);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `casas`
--
ALTER TABLE `casas`
  ADD CONSTRAINT `casas_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `administradores` (`id_admin`);

--
-- Limitadores para a tabela `despesas`
--
ALTER TABLE `despesas`
  ADD CONSTRAINT `despesas_ibfk_1` FOREIGN KEY (`id_pessoas`) REFERENCES `pessoas` (`id_pessoas`),
  ADD CONSTRAINT `despesas_ibfk_2` FOREIGN KEY (`id_casas`) REFERENCES `casas` (`id_casas`);

--
-- Limitadores para a tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD CONSTRAINT `pessoas_ibfk_1` FOREIGN KEY (`id_quartos`) REFERENCES `quartos` (`id_quartos`);

--
-- Limitadores para a tabela `quartos`
--
ALTER TABLE `quartos`
  ADD CONSTRAINT `quartos_ibfk_1` FOREIGN KEY (`id_casas`) REFERENCES `casas` (`id_casas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
