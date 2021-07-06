CREATE DATABASE IF NOT EXISTS `DBHoldUp`;
CREATE TABLE IF NOT EXISTS DBHoldUp.banquier (
    id int auto_increment NOT NULL,
    Mail varchar(50) NOT NULL,
    Password varchar(50) NOT NULL,
    CONSTRAINT banquier_PK PRIMARY KEY (id)
);
CREATE TABLE IF NOT EXISTS DBHoldUp.client (
    id INT auto_increment NOT NULL,
    iban varchar(27) NULL,
    banquierid INT NOT NULL,
    genre BOOL NOT NULL COMMENT 'FALSE=M TRUE=F',
    nom varchar(50) NOT NULL,
    prenom varchar(50) NOT NULL,
    adresse varchar(100) NOT NULL,
	codepostal INT(5) NOT NULL,
	ville varchar(50) NOT NULL,
	naissance DATE NOT NULL,
	mail varchar(50) NOT NULL,
	pass varchar(50) NOT NULL,
	pi TEXT NOT NULL,
	suppress TEXT NULL,
    CONSTRAINT client_PK PRIMARY KEY (id),
    CONSTRAINT client_FK FOREIGN KEY (banquierid) REFERENCES banquier(id)
);
CREATE TABLE DBHoldUp.token (
    token varchar(300) NOT NULL,
    clientid INT NULL,
    banquierid INT NULL,
    type SET("client","banquier","passForget") NOT NULL,
    expirationTime TIMESTAMP NOT NULL,
    date_added DATETIME DEFAULT NOW() NOT NULL,
    id INT auto_increment NOT NULL,
    CONSTRAINT token_PK PRIMARY KEY (id),
    CONSTRAINT token_FK FOREIGN KEY (clientid) REFERENCES DBHoldUp.client(id) ON DELETE CASCADE,
    CONSTRAINT token_FK_1 FOREIGN KEY (banquierid) REFERENCES DBHoldUp.banquier(id) ON DELETE CASCADE
);
CREATE TABLE DBHoldUp.beneficiaire (
    id INT auto_increment NOT NULL,
    clientid INT NOT NULL,
    iban varchar(27) NOT NULL,
    valid DATETIME DEFAULT null NULL,
    CONSTRAINT beneficiaire_PK PRIMARY KEY (id),
    CONSTRAINT beneficiaire_FK FOREIGN KEY (clientid) REFERENCES DBHoldUp.client(id) ON DELETE CASCADE
);
CREATE TABLE DBHoldUp.compte (
    id INT auto_increment NOT NULL,
    clientid INT NOT NULL,
    libelle varchar(50) NOT NULL,
    debit DECIMAL(10,2) NULL,
    credit DECIMAL(10,2) NULL,
    `date` DATETIME DEFAULT NOW() NULL,
    solde DECIMAL(10,2) NOT NULL,
    CONSTRAINT compte_PK PRIMARY KEY (id),
    CONSTRAINT compte_FK FOREIGN KEY (clientid) REFERENCES DBHoldUp.client(id) ON DELETE CASCADE
);