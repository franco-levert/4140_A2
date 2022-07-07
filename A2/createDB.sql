-- -----------------------------------------------------
-- Schema levert
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema levert
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `levert` DEFAULT CHARACTER SET utf8 ;
USE `levert` ;

-- -----------------------------------------------------
-- Table `levert`.`Clients652`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `levert`.`Clients652` (
  `clientId652` INT NOT NULL AUTO_INCREMENT,
  `clientCity652` VARCHAR(45) NULL,
  `dollarsOnOrder652` FLOAT NULL,
  `clientStatus652` VARCHAR(45) NULL,
  `clientName652` VARCHAR(45) NULL,
  `clientCompPassword652` VARCHAR(45) NULL,
  `moneyOwed652` FLOAT NULL,
  PRIMARY KEY (`clientId652`));


-- -----------------------------------------------------
-- Table `levert`.`Parts652`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `levert`.`Parts652` (
  `partNo652` INT NOT NULL AUTO_INCREMENT,
  `partDescription652` VARCHAR(45) NULL,
  `QoH652` INT NULL,
  `partName652` VARCHAR(45) NULL,
  `currentPrice652` FLOAT NULL,
  PRIMARY KEY (`partNo652`));


-- -----------------------------------------------------
-- Table `levert`.`PO652`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `levert`.`PO652` (
  `poNO652` INT NOT NULL AUTO_INCREMENT,
  `datePO652` DATE NULL,
  `status652` VARCHAR(45) NULL,
  `Clients652_clientId652` INT NOT NULL,
  PRIMARY KEY (`poNO652`),
  INDEX `fk_PO652_Clients652_idx` (`Clients652_clientId652` ASC),
  CONSTRAINT `fk_PO652_Clients652`
    FOREIGN KEY (`Clients652_clientId652`)
    REFERENCES `levert`.`Clients652` (`clientId652`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `levert`.`Lines652`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `levert`.`Lines652` (
  `lineNO652` INT NOT NULL,
  `numOfUnits652` INT NULL,
  `linePrice652` FLOAT NULL,
  `PO652_poNO652` INT NOT NULL,
  `Parts652_partNo652` INT NOT NULL,
  PRIMARY KEY (`lineNO652`, `PO652_poNO652`),
  INDEX `fk_Lines652_PO6521_idx` (`PO652_poNO652` ASC),
  INDEX `fk_Lines652_Parts6521_idx` (`Parts652_partNo652` ASC),
  CONSTRAINT `fk_Lines652_PO6521`
    FOREIGN KEY (`PO652_poNO652`)
    REFERENCES `levert`.`PO652` (`poNO652`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Lines652_Parts6521`
    FOREIGN KEY (`Parts652_partNo652`)
    REFERENCES `levert`.`Parts652` (`partNo652`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);