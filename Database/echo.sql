-- MySQL Workbench Synchronization
-- Generated: 2022-06-30 10:44
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Felipe

CREATE TABLE IF NOT EXISTS `echo`.`chamados` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `km_rodado` DOUBLE NOT NULL,
  `data` DATE NOT NULL,
  `funcionario_id` INT(11) NOT NULL,
  `veiculo_id` INT(11) NOT NULL,
  `usuario_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_chamados_funcionarios_idx` (`funcionario_id` ASC),
  INDEX `fk_chamados_veiculos_idx` (`veiculo_id` ASC),
  INDEX `fk_chamados_usuario_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_chamados_funcionarios`
    FOREIGN KEY (`funcionario_id`)
    REFERENCES `echo`.`funcionarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_chamados_usuario`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `echo`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_chamados_veiculos`
    FOREIGN KEY (`veiculo_id`)
    REFERENCES `echo`.`veiculos` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `echo`.`funcionarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `usuario_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `CPJ é um campo unico` (`cpf` ASC),
  INDEX `fk_funcionarios_usuario_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_funcionarios_usuario`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `echo`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `echo`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cnpj` VARCHAR(18) NOT NULL,
  `razao_social` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `CNPJ é um campo unico` (`cnpj` ASC),
  UNIQUE INDEX `Email é um campo unico` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `echo`.`veiculos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `placa` VARCHAR(45) NOT NULL,
  `modelo` VARCHAR(45) NOT NULL,
  `marca` VARCHAR(45) NOT NULL,
  `autonomia` VARCHAR(45) NOT NULL,
  `usuario_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `Placa é um campo unico` (`placa` ASC),
  INDEX `fk_usuario_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_veiculos_usuario`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `echo`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8 COLLATE = utf8_unicode_ci;
