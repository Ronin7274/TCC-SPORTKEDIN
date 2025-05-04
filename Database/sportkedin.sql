-- Criação do schema
CREATE SCHEMA IF NOT EXISTS `sportkedin` DEFAULT CHARACTER SET utf8mb4;
USE `sportkedin`;

-- Tabela Usuario
CREATE TABLE IF NOT EXISTS `Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(40) NOT NULL,
  `CPF` VARCHAR(13) NOT NULL,
  `Telefone` VARCHAR(15) NOT NULL,
  `Endereco` VARCHAR(50) NOT NULL,
  `RG` VARCHAR(15),
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE INDEX `Telefone_UNIQUE` (`Telefone`)
) ENGINE=InnoDB;

-- Tabela Caracteristicas
CREATE TABLE IF NOT EXISTS `Caracteristicas` (
  `idCaracteristicas` INT NOT NULL AUTO_INCREMENT,
  `Esporte` VARCHAR(20) NOT NULL,
  `Funçao` VARCHAR(20) NOT NULL,
  `Area_forte` VARCHAR(15),
  `Pessoa_idPessoa` INT NOT NULL,
  PRIMARY KEY (`idCaracteristicas`),
  INDEX (`Pessoa_idPessoa`),
  CONSTRAINT `fk_Caracteristicas_Pessoa`
    FOREIGN KEY (`Pessoa_idPessoa`) REFERENCES `Usuario` (`idUsuario`)
    ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB;

-- Tabela Clube
CREATE TABLE IF NOT EXISTS `Clube` (
  `idClube` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(45) NOT NULL,
  `Tipo` VARCHAR(10) NOT NULL,
  `CNPJ` VARCHAR(45) NOT NULL,
  `Registro` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idClube`)
) ENGINE=InnoDB;

-- Tabela Peneira
CREATE TABLE IF NOT EXISTS `Peneira` (
  `idPeneira` INT NOT NULL AUTO_INCREMENT,
  `Tipo` VARCHAR(20) NOT NULL,
  `Horario` DATETIME NOT NULL,
  `Local` VARCHAR(20) NOT NULL,
  `descricao` TEXT NOT NULL,
  `horario_fechamento` DATETIME NOT NULL,
  `vagas` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPeneira`)
) ENGINE=InnoDB;

-- Tabela Comentario
CREATE TABLE IF NOT EXISTS `Comentario` (
  `idComentario` INT NOT NULL AUTO_INCREMENT,
  `comentario` TEXT NOT NULL,
  `data` DATE NOT NULL,
  PRIMARY KEY (`idComentario`)
) ENGINE=InnoDB;

-- Relacionamento Comentario com Pessoa
CREATE TABLE IF NOT EXISTS `Comentario_has_Pessoa` (
  `Comentario_idComentario` INT NOT NULL,
  `Pessoa_idPessoa` INT NOT NULL,
  PRIMARY KEY (`Comentario_idComentario`, `Pessoa_idPessoa`),
  FOREIGN KEY (`Comentario_idComentario`) REFERENCES `Comentario` (`idComentario`)
    ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`Pessoa_idPessoa`) REFERENCES `Usuario` (`idUsuario`)
    ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB;

-- Relacionamento Comentario com Clube
CREATE TABLE IF NOT EXISTS `Comentario_has_Clube` (
  `Comentario_idComentario` INT NOT NULL,
  `Clube_idClube` INT NOT NULL,
  PRIMARY KEY (`Comentario_idComentario`, `Clube_idClube`),
  FOREIGN KEY (`Comentario_idComentario`) REFERENCES `Comentario` (`idComentario`)
    ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`Clube_idClube`) REFERENCES `Clube` (`idClube`)
    ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB;

-- Relacionamento Clube com Peneira
CREATE TABLE IF NOT EXISTS `Clube_has_Peneira` (
  `Clube_idClube` INT NOT NULL,
  `Peneira_idPeneira` INT NOT NULL,
  PRIMARY KEY (`Clube_idClube`, `Peneira_idPeneira`),
  FOREIGN KEY (`Clube_idClube`) REFERENCES `Clube` (`idClube`)
    ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`Peneira_idPeneira`) REFERENCES `Peneira` (`idPeneira`)
    ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB;

-- Relacionamento Peneira com Pessoa
CREATE TABLE IF NOT EXISTS `Peneira_has_Pessoa` (
  `Peneira_idPeneira` INT NOT NULL,
  `Pessoa_idPessoa` INT NOT NULL,
  PRIMARY KEY (`Peneira_idPeneira`, `Pessoa_idPessoa`),
  FOREIGN KEY (`Peneira_idPeneira`) REFERENCES `Peneira` (`idPeneira`)
    ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`Pessoa_idPessoa`) REFERENCES `Usuario` (`idUsuario`)
    ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB;
