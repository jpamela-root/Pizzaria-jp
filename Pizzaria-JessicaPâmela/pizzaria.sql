
CREATE TABLE `jessicapamela` (
  `codigo` int(11)PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `primeiroNome` varchar(45) NOT NULL,
  `ultimoNome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `cargo` (
  `codigo` int(11)PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `salarioBase` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `comanda` (
  `codigo` int(11)PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `dataCompra` datetime NOT NULL,
  `formaPagamento` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `codigoFuncionario` int(11) NOT NULL,
  `codigoPizza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `funcionario` (
  `codigo` int(11)PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `dataAdmissao` datetime NOT NULL,
  `status` varchar(45) NOT NULL,
  `codigoCargo` int(11) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `pizza` (
  `codigo` int(11)PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `ingredientes` varchar(100) NOT NULL,
  `valor` float NOT NULL,
  `status` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `funcionario`
  ADD FOREIGN KEY ( `codigoCargo` ) REFERENCES `Funcionario` ( `codigo` );

ALTER TABLE `comanda`
  ADD FOREIGN KEY ( `codigoFuncionario`) REFERENCES `Funcionario` ( `codigo` ),
  ADD FOREIGN KEY ( `codigoPizza` ) REFERENCES `pizza` ( `codigo` );
