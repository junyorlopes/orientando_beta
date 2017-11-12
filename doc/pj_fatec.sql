-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Dez-2016 às 21:03
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pj_fatec`
--
CREATE DATABASE IF NOT EXISTS `pj_fatec` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pj_fatec`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE IF NOT EXISTS `adm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `users_id`) VALUES
(1, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `duracao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `duracao`) VALUES
(2, 'Analise e Desenvolvimento de sitema', 6),
(3, 'Agronegocio', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `docentes`
--

CREATE TABLE IF NOT EXISTS `docentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `especialidade` varchar(45) DEFAULT NULL,
  `cursos_id` int(11) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`users_id`),
  KEY `fk_docentes_cursos1_idx` (`cursos_id`),
  KEY `fk_docentes_users1_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `docentes`
--

INSERT INTO `docentes` (`id`, `especialidade`, `cursos_id`, `users_id`) VALUES
(2, 'Programação orientada a OBJ.', 2, 2),
(3, 'Programador', 2, 4),
(4, 'Cannabis', 3, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacoes`
--

CREATE TABLE IF NOT EXISTS `formacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `tipo` varchar(200) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `instituicao` varchar(255) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_formacoes_users1_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `formacoes`
--

INSERT INTO `formacoes` (`id`, `nome`, `tipo`, `ano`, `instituicao`, `users_id`) VALUES
(1, 'Ciência da Computação', 'Graduação', 1999, 'Universidade do Oeste Paulista', 2),
(2, 'Ciência da Computação', 'Mestrado', 1999, 'Universidade do Oeste Paulista', 2),
(3, 'Ciência da Computação', 'Graduação', 2019, 'FATEC', 4),
(4, 'Plantas alucinoginas', 'Graduação', 2033, 'FATEC', 5),
(5, 'Cannabis', 'Mestrado', 2033, 'FATEC', 5),
(6, 'metodos de cultivos', 'Doutorado', 2033, 'FATEC', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `idpedido` int(11) NOT NULL AUTO_INCREMENT,
  `ra` varchar(45) DEFAULT NULL,
  `nome` varchar(70) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `nomeprojeto` varchar(120) DEFAULT NULL,
  `mensagem` varchar(2000) DEFAULT NULL,
  `doc` varchar(100) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `fk_pedido_users1_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`idpedido`, `ra`, `nome`, `data`, `nomeprojeto`, `mensagem`, `doc`, `users_id`, `email`, `status`) VALUES
(1, '123456789', 'Igor henrique Martin dos santos', '2016-12-01', 'Segurança da infomação e seus beneficios', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut mattis diam, non fermentum est. Aenean est ligula, scelerisque eu tortor vitae, luctus vehicula nunc. Etiam tincidunt orci quis dolor porta, accumsan luctus velit varius. Etiam eget dui leo. Mauris ultrices nec dolor eget maximus. Donec nec malesuada est. Pellentesque nec ex pulvinar, dignissim arcu quis, fermentum quam. Integer placerat, leo sit amet feugiat ultrices, nisi felis imperdiet est, at rutrum urna ante quis odio. In non odio sit amet lacus placerat pharetra vel sit amet mauris. Mauris dignissim augue at sagittis scelerisque. Fusce pulvinar, odio et eleifend volutpat, purus magna semper tellus, sed porta massa purus nec orci. Duis convallis ipsum sem. Phasellus auctor dolor pretium sollicitudin consectetur. ', 'dde8d745d55137d8ab4b761f68ed17d6.pdf', 2, 'igor.henriquems@hotmail.com', 1),
(2, '123456789', 'Igor henrique Martin dos santos', '2016-12-01', 'Segurança', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut mattis diam, non fermentum est. Aenean est ligula, scelerisque eu tortor vitae, luctus vehicula nunc. Etiam tincidunt orci quis dolor porta, accumsan luctus velit varius. Etiam eget dui leo. Mauris ultrices nec dolor eget maximus. Donec nec malesuada est. Pellentesque nec ex pulvinar, dignissim arcu quis, fermentum quam. Integer placerat, leo sit amet feugiat ultrices, nisi felis imperdiet est, at rutrum urna ante quis odio. In non odio sit amet lacus placerat pharetra vel sit amet mauris. Mauris dignissim augue at sagittis scelerisque. Fusce pulvinar, odio et eleifend volutpat, purus magna semper tellus, sed porta massa purus nec orci. Duis convallis ipsum sem. Phasellus auctor dolor pretium sollicitudin consectetur. ', '47e8a18939ada226325e8688848c4df8.pdf', 2, 'igor.henriquems@hotmail.com', 1),
(3, '123456789', 'Igor henrique Martin dos santos', '2016-12-01', 'Segurança', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut mattis diam, non fermentum est. Aenean est ligula, scelerisque eu tortor vitae, luctus vehicula nunc. Etiam tincidunt orci quis dolor porta, accumsan luctus velit varius. Etiam eget dui leo. Mauris ultrices nec dolor eget maximus. Donec nec malesuada est. Pellentesque nec ex pulvinar, dignissim arcu quis, fermentum quam. Integer placerat, leo sit amet feugiat ultrices, nisi felis imperdiet est, at rutrum urna ante quis odio. In non odio sit amet lacus placerat pharetra vel sit amet mauris. Mauris dignissim augue at sagittis scelerisque. Fusce pulvinar, odio et eleifend volutpat, purus magna semper tellus, sed porta massa purus nec orci. Duis convallis ipsum sem. Phasellus auctor dolor pretium sollicitudin consectetur. ', 'c0912389878120d2f87771bc710bdcab.pdf', 2, 'igor.henriquems@hotmail.com', 1),
(4, '54864765465', 'Igor henrique', '2016-12-01', 'vmhgfvhggfd', 'ccfggfddsf', '4eb2dee60a8ea4c6c4f643e464c2107e.pdf', 2, 'igor.henriquems@gmail.com', 0),
(5, '54864765465', 'Igor henrique', '2016-12-02', 'teste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce venenatis porta sem non dapibus. Donec non nunc elementum, aliquam urna eget, eleifend tellus. Duis non felis lectus. Nunc pharetra libero ut viverra feugiat. Nullam vel massa ex. In tempor urna vitae sem fringilla facilisis. Sed lacinia congue lacus a interdum.', '35ae531555c36756da6e9085e7e1fd2d.pdf', 4, 'igor.henriquems@gmail.com', 1),
(6, '54864765465', 'Igor henrique', '2016-12-02', 'teste', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut mattis diam, non fermentum est. Aenean est ligula, scelerisque eu tortor vitae, luctus vehicula nunc. Etiam tincidunt orci quis dolor porta, accumsan ', 'b3b62770414c43fb71c11574b3a67e09.docx', 4, 'igor.henriquems@gmail.com', 1),
(7, '54864765465', 'Igor henrique', '2016-12-02', 'teste', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut mattis diam, non fermentum est. Aenean est ligula, scelerisque eu tortor vitae, luctus vehicula nunc. Etiam tincidunt orci quis dolor porta, accumsan ', '1be16cc8b3df4ba4209d2faf9670ac8e.docx', 4, 'igor.henriquems@gmail.com', 0),
(8, '54864765465', 'Igor henrique', '2016-12-02', 'teste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce venenatis porta sem non dapibus. Donec non nunc elementum, aliquam urna eget, eleifend tellus. Duis non felis lectus. Nunc pharetra libero ut viverra feugiat. Nullam vel massa ex. In tempor urna vitae sem fringilla facilisis. Sed lacinia congue lacus a interdum.', 'c0dc8485081092a86594541306f1b792.pdf', 4, 'igor.henriquems@gmail.com', 1),
(9, '54864765465', 'Carlos ', '2016-12-02', 'teste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet maximus velit. Aliquam erat volutpat. Donec efficitur, nibh sed sodales lobortis, nibh augue feugiat tortor, sed tincidunt ex elit vestibulum urna. Pellentesque rhoncus elementum ultricies. Donec sit amet posuere justo. Quisque vitae auctor ligula. Quisque suscipit risus nec libero congue auctor. Integer at mauris quis mi malesuada commodo. Aenean sed viverra nisi. Cras varius et diam vel ultrices.', '177e264061f66b144c999bb6cef1d5a1.pdf', 5, 'igor.henriquems@gmail.com', 1),
(10, '54864765465', 'Igor henrique', '2016-12-02', 'servidor de rede', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet maximus velit. Aliquam erat volutpat. Donec efficitur, nibh sed sodales lobortis, nibh augue feugiat tortor, sed tincidunt ex elit vestibulum urna. Pellentesque rhoncus elementum ultricies. Donec sit amet posuere justo. Quisque vitae auctor ligula. Quisque suscipit risus nec libero congue auctor. Integer at mauris quis mi malesuada commodo. Aenean sed viverra nisi. Cras varius et diam vel ultrices.', '9ab3f518b80926c6b2880cc1dc1c1b6c.pdf', 5, 'igor.henriquems@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesquisa`
--

CREATE TABLE IF NOT EXISTS `pesquisa` (
  `idpesquisa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`idpesquisa`,`users_id`),
  KEY `fk_pesquisas_users1_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `pesquisa`
--

INSERT INTO `pesquisa` (`idpesquisa`, `nome`, `users_id`) VALUES
(1, 'Engenharia de software', 2),
(2, 'programação orientada a objetos', 2),
(3, 'Redes', 2),
(4, 'Rede', 4),
(5, 'Rede', 4),
(6, 'Cannabis', 5),
(7, 'Plantas', 5),
(8, 'ervas', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `img`, `senha`, `nivel`) VALUES
(1, 'adm', 'adm@adm', NULL, '123', 1),
(2, 'Igor henrique', 'igor.henriquems@gmail.com', NULL, '123', 2),
(4, 'Fernando', 'fernando@fernando', 'c9212c6293c467cf6daa2573fd501322.jpg', '123', 2),
(5, 'teste', 'teste@teste', 'f18faad172e37885c6b7b57cdd43cdc8.jpg', '123', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinculos`
--

CREATE TABLE IF NOT EXISTS `vinculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alunos_ra` varchar(15) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `resposta` varchar(2000) DEFAULT NULL,
  `idpedido` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vinculos_pedido1_idx` (`idpedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `vinculos`
--

INSERT INTO `vinculos` (`id`, `alunos_ra`, `data`, `status`, `resposta`, `idpedido`) VALUES
(1, NULL, '2016-12-01', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut mattis diam, non fermentum est. Aenean est ligula, scelerisque eu tortor vitae, luctus vehicula nunc. Etiam tincidunt orci quis dolor porta, accumsan luctus velit varius. Etiam ege', 1),
(5, NULL, '2016-12-01', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut mattis diam, non fermentum est. Aenean est ligula, scelerisque', 2),
(9, NULL, '2016-12-01', 0, 'a, scelerisque eu tortor vitae, luctus vehicula nunc. Etiam tincidunt orci quis dolor porta, accumsan luctus velit varius. Etiam eget dui leo. Mauris ultrices nec dolor eget maximus. Donec nec malesuada est. Pellentesque nec ex pulvinar, digni', 3),
(10, NULL, '2016-12-02', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 5),
(11, NULL, '2016-12-02', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce venenatis porta sem non dapibus. Donec non nunc elementum, aliquam urna eget, eleifend tellus. Duis non felis lectus. Nunc pharetra libero ut viverra feugiat. Nullam vel', 8),
(12, NULL, '2016-12-02', 1, 'ok', 6),
(13, NULL, '2016-12-02', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet maximus velit. Aliquam erat volutpat. Donec efficitur', 9),
(14, NULL, '2016-12-02', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet maximus', 10);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `fk_docentes_cursos1` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_docentes_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `formacoes`
--
ALTER TABLE `formacoes`
  ADD CONSTRAINT `fk_formacoes_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pesquisa`
--
ALTER TABLE `pesquisa`
  ADD CONSTRAINT `fk_pesquisas_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `vinculos`
--
ALTER TABLE `vinculos`
  ADD CONSTRAINT `fk_vinculos_pedido1` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
