-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 13-Jul-2015 às 20:31
-- Versão do servidor: 5.6.11
-- versão do PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `siscondep`
--
CREATE DATABASE IF NOT EXISTS `siscondep` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `siscondep`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `evento` varchar(200) NOT NULL,
  `dtevento` date NOT NULL,
  `autor` varchar(200) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hora` varchar(5) NOT NULL,
  `conteudo` text NOT NULL,
  `local` varchar(200) NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `evento`, `dtevento`, `autor`, `data`, `hora`, `conteudo`, `local`) VALUES
(8, 'Apresentação de TCC', '2015-07-16', 'Ethielle Ramos Lira', '2015-07-13 03:00:00', '14', 'André Vargas Abs da Cruz', 'LIRA'),
(9, 'Apresentação de TCC', '2015-07-17', 'Adriana Mesquita de Souza', '2015-07-13 03:00:00', '14', 'André Vargas Abs da Cruz', 'LIRA I');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `matricula` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `id_usuario`, `nome`, `matricula`, `email`, `status`) VALUES
(1, 1, 'Ethielle Ramos Lira', 1011317573, 'ethielleramos@gmail.com', 'CURSANDO'),
(2, 2, 'Adriana Mesquita de Souza', 1011317807, 'mesquita.ams@gmail.com', 'CURSANDO'),
(3, 3, 'Gabriel de Souza Lima', 1213331027, 'ga.bri.el@msn.com', 'CURSANDO'),
(4, 4, 'Pedro Mariano Ferrage', 911316776, 'pferrage@gmail.com', 'CURSANDO'),
(5, 5, 'Jessica Felizardo', 1011321221, 'jessica.felizardo@gmail.com', 'CURSANDO'),
(6, 6, 'Liliana Camara de Pasos', 1011411234, 'lcamarapa@gmail.com', 'CURSANDO'),
(7, 7, 'Igor Ramos Lira', 1211317556, 'igor.lira.r@gmail.com', 'REPROVADO'),
(8, 8, 'Carlos Alexandre dos Santos', 1011317231, 'cags1985@gmail.com', 'APROVADO'),
(9, 9, 'Alison Assis', 1011319908, 'alisonaassis@gmail.com', 'CURSANDO'),
(10, 10, 'Diego del Riga', 1011324891, 'diegodelriga@gmail.com', 'CURSANDO'),
(11, 30, 'Alex Firmino', 654321, 'firmino.firmino', 'CURSANDO'),
(12, 31, 'Eliane Vangeloti', 1012452256, 'elianevangeloti@gmail.com', 'CURSANDO'),
(13, 32, 'Valdecir Rodrigues', 910229888, 'valdecirrodrigues@gmail.com', 'CURSANDO'),
(14, 33, 'Bruno Collaro Maravalhas', 1098227887, 'bruno.collaro@gmail.com', 'CURSANDO'),
(15, 34, 'Luiz Carlos Almeida', 1021119887, 'luizcarlos@gmail.com', 'CURSANDO'),
(16, 35, 'Ana Carolina Leandro', 112766554, 'anacarolina@gmail.com', 'CURSANDO'),
(17, 36, 'Thiago Fonseca', 912221339, 'thiago.fonseca@gmail.com', 'CURSANDO'),
(18, 37, 'Thiago Gomes', 1129988776, 'thiago.gomes@gmail.com', 'CURSANDO'),
(19, 38, 'Gustavo Cordeiro dos Santos', 1211346556, 'gcordeiro@gmail.com', 'CURSANDO'),
(20, 39, 'Alan Sousa', 1022343288, 'alan.sousa@gmail.com', 'CURSANDO'),
(21, 46, 'Camila Recoliano', 1211133442, 'crecoliano@gmail.com', 'CURSANDO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE IF NOT EXISTS `arquivo` (
  `id_arquivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_projeto` int(11) NOT NULL,
  `endereco` varchar(300) NOT NULL,
  `dt_inclusao` date NOT NULL,
  `descricao` varchar(250) NOT NULL,
  PRIMARY KEY (`id_arquivo`),
  KEY `id_projeto` (`id_projeto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`id_arquivo`, `id_projeto`, `endereco`, `dt_inclusao`, `descricao`) VALUES
(1, 3, 'P003_001.pdf', '2015-07-08', 'Arquivo Preliminar - Ideia'),
(3, 1, 'P001_002.docx', '2015-07-12', 'Proposta do TCC'),
(4, 11, 'P011_004.pdf', '2015-07-13', 'Ideia Inicial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `situacao` varchar(15) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_usuario`, `usuario`, `senha`, `tipo`, `situacao`) VALUES
(1, 'ethielle.lira', '123456AA', 'A', 'ativo'),
(2, 'adriana.mesquita', '123456AA', 'A', 'ATIVO'),
(3, 'gabriel.lima', '123456AA', 'A', 'ativo'),
(4, 'pedro.ferrage', '123456AA', 'A', 'ativo'),
(5, 'jessica.felizardo', '123456AA', 'A', 'ativo'),
(6, 'liliana.camara', '123456AA', 'A', 'ativo'),
(7, 'igor.lira', '123456AA', 'A', 'inativo'),
(8, 'carlos.alexandre', '123456AA', 'A', 'ATIVO'),
(9, 'alison.assis', '123456AA', 'A', 'ATIVO'),
(10, 'diego.riga', '123456AA', 'A', 'ativo'),
(11, 'andre.vargas', '123456AA', 'P', 'ativo'),
(12, 'rosana.paz', '123456AA', 'P', 'ativo'),
(13, 'carlos.lemos', '123456AA', 'P', 'ativo'),
(14, 'frederico.sauer', '123456AA', 'P', 'ativo'),
(15, 'marcelo.porto', '123456AA', 'P', 'ativo'),
(16, 'admin', 'root', 'C', 'ativo'),
(19, 'fabiano,saldanha', '123456AA', 'P', 'ATIVO'),
(20, 'karla.figueiredo', '123456AA', 'P', 'ATIVO'),
(30, 'alex.firmino', '123456AA', 'A', 'INATIVO'),
(31, 'eliane.vangeloti', '123456AA', 'A', 'ATIVO'),
(32, 'valdecir.rodrigues', '123456AA', 'A', 'ATIVO'),
(33, 'bruno.collaro', '123456AA', 'A', 'ATIVO'),
(34, 'luiz.carlos', '123456AA', 'A', 'ATIVO'),
(35, 'carolina.leandro', '123456AA', 'A', 'ATIVO'),
(36, 'thiago.fonseca', '123456AA', 'A', 'ATIVO'),
(37, 'thiago.gomes', '123456AA', 'A', 'ATIVO'),
(38, 'gustavo.cordeiro', '123456AA', 'A', 'ATIVO'),
(39, 'allan.sousa', '123456AA', 'A', 'ATIVO'),
(40, 'denis,cople', '123456AA', 'P', 'ATIVO'),
(41, 'dilza.szwarcman', '123456AA', 'P', 'ATIVO'),
(42, 'mauro.gil', '123456AA', 'P', 'ATIVO'),
(43, 'rogerio.espindola', '123456AA', 'P', 'ATIVO'),
(44, 'jose.luiz', '123456AA', 'P', 'ATIVO'),
(45, 'giancarlo.costa', '123456AA', 'P', 'ATIVO'),
(46, 'camila.recoliano', '123456AA', 'A', 'ATIVO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `id_projeto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nota` varchar(500) NOT NULL,
  `dt_nota` date NOT NULL,
  PRIMARY KEY (`id_nota`),
  KEY `id_projeto` (`id_projeto`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `nota`
--

INSERT INTO `nota` (`id_nota`, `id_projeto`, `id_usuario`, `nota`, `dt_nota`) VALUES
(1, 3, 8, 'Professor, quando podemos marcar um reunião para apresentar a documentação preliminar', '2015-06-01'),
(2, 3, 13, 'Dia 8/6, segunda, pode ser?', '2015-06-02'),
(6, 3, 8, 'Professor, boa tarde.\r\nAnexei um arquivo preliminar com um ideia de TCC.\r\nTem como avaliar se é aplicável?', '2015-06-08'),
(7, 3, 13, 'Farei a analise em breve, por favor aguarde alguns dias.\r\n', '2015-06-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `id_professor` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `matricula` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id_professor`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id_professor`, `id_usuario`, `nome`, `matricula`, `email`, `status`) VALUES
(1, 11, 'André Vargas Abs da Cruz', 5001367, 'ac4791@gmail.com', 'LESSIONANDO'),
(2, 14, 'Frederico Sauer', 5501237, 'fsauer@gmail.com', 'LESSIONANDO'),
(3, 12, 'Rosana Paz', 5001162, 'rosanapazf@gmail.com', 'COORDENACAO'),
(4, 13, 'Carlos Alberto Lemos', 5001654, 'carlos.lemos@gmail.com', 'FERIAS'),
(5, 15, 'Marcelo Porto', 4005455, 'mporto@gmail.com', 'LESSIONANDO'),
(8, 19, 'Fabiano Saldanha Gomes de Oliveira', 509872, 'fabiano,saldanha@gmail.com', 'LESSIONANDO'),
(9, 20, 'Karla Figueiredo', 500986, 'karla.figueiredo@gmail.com', 'LESSIONANDO'),
(19, 40, 'Denis Gonçalves Cople ', 500356, 'deniscople@gmail.com', 'LESSIONANDO'),
(20, 41, 'Dilza de Mattos Szwarcman', 509887, 'dilza.szwarcman@gmail.com', 'LESSIONANDO'),
(21, 42, 'Mauro Cesar Cantarino Gil', 509987, 'maurogil@gmail.com', 'LESSIONANDO'),
(22, 43, 'Rogério Pinto Espí­ndola', 500988, 'rogerio.espindola@gmail.com', 'LESSIONANDO'),
(23, 44, 'José Luiz dos Anjos Rosa', 500982, 'jluizrosa@gmail.com', 'LESSIONANDO'),
(24, 45, 'Giancarlo Cordeiro da Costa', 5002112, 'gian.costa@gmail.com', 'LESSIONANDO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE IF NOT EXISTS `projeto` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_coorientador` int(11) NOT NULL,
  `sigla` varchar(250) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id_projeto`),
  KEY `id_aluno` (`id_aluno`),
  KEY `id_professor` (`id_professor`),
  KEY `id_coorientador` (`id_coorientador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id_projeto`, `id_aluno`, `id_professor`, `id_coorientador`, `sigla`, `nome`, `status`) VALUES
(1, 1, 1, 1, 'SisConDeP', 'Sistema de controle e desenvolvimento de projetos', 'EM DESENVOLVIMENTO'),
(2, 2, 1, 3, 'SisBPF', 'Sistema de Busca de projetos finais', 'EM DESENVOLVIMENTO'),
(3, 8, 4, 1, 'SAAB', 'SISTEMA DE ANALISE DE AMOSTRAS BIOQUIMICAS', 'FINALIZADO'),
(11, 4, 1, 19, 'TESTE', 'TESTESTESTESTESTESTESTES', 'EM APROVAÇÃO'),
(13, 15, 8, 19, 'SAEF', 'SISTEMA DE ANÁLISE ECONÔMICA FINANCEIRA', 'EM APROVAÇÃO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recomendado`
--

CREATE TABLE IF NOT EXISTS `recomendado` (
  `id_recomendado` int(11) NOT NULL AUTO_INCREMENT,
  `id_professor` int(11) NOT NULL,
  `assunto` varchar(500) NOT NULL,
  `area` varchar(100) NOT NULL,
  `caminho_artigo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_recomendado`),
  KEY `id_professor` (`id_professor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `recomendado`
--

INSERT INTO `recomendado` (`id_recomendado`, `id_professor`, `assunto`, `area`, `caminho_artigo`) VALUES
(1, 4, 'PLANEJAMENTO E PROJETO DE REDES DE COMPUTADORES', 'Redes e Infraestrutura', 'rec_001.pdf'),
(3, 4, 'REDES WIMESH LOCAIS', 'Redes e Infraestrutura', 'rec_003.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `regras`
--

CREATE TABLE IF NOT EXISTS `regras` (
  `id_regra` int(11) NOT NULL AUTO_INCREMENT,
  `regra` varchar(25) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `caminho_arquivo` varchar(500) NOT NULL,
  PRIMARY KEY (`id_regra`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `regras`
--

INSERT INTO `regras` (`id_regra`, `regra`, `descricao`, `caminho_arquivo`) VALUES
(1, 'Inicial', 'Regras básicas do tcc', 'regra_005.pdf'),
(2, 'Complementar', 'Regra Complementar do Tcc', 'regra_002.pdf'),
(3, 'Termo', 'Termo de compromisso', 'regra_003.pdf'),
(4, 'Termo', 'Termo de Defesa', 'regra_004.pdf'),
(6, 'Proposta e Regras', 'Base para a proposta e detalhes do TCC', 'regra_005.pdf');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD CONSTRAINT `arquivo_ibfk_1` FOREIGN KEY (`id_projeto`) REFERENCES `projeto` (`id_projeto`);

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `projeto_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`),
  ADD CONSTRAINT `projeto_ibfk_2` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`),
  ADD CONSTRAINT `projeto_ibfk_3` FOREIGN KEY (`id_coorientador`) REFERENCES `professor` (`id_professor`);

--
-- Limitadores para a tabela `recomendado`
--
ALTER TABLE `recomendado`
  ADD CONSTRAINT `recomendado_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
