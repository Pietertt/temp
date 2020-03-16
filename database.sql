CREATE TABLE `user` (
  `id` INT PRIMARY KEY,
  `email` TINYTEXT,
  `BSN` INT NOT NULL,
  `firstname` TINYTEXT,
  `lastname` TINYTEXT,
  `gender` TINYTEXT,
  `tnumber` TINYTEXT,
  `banknum` TINYTEXT,
  `income` INT,
  `partner` INT
);

CREATE TABLE `debt` (
  `id` INT PRIMARY KEY,
  `user` INT,
  `s` INT,
  `desc` TEXT
);

CREATE TABLE `hypotheeken` (
  `id` INT PRIMARY KEY,
  `user` INT,
  `status` TINYTEXT,
  `info` TEXT,
  `date` DATE,
  `last_update` DATE,
  `notes` INT
);

CREATE TABLE `H_note` (
  `id` INT PRIMARY KEY,
  `date` DATE,
  `text` TEXT,
  `read` TINYINT,
  `sender` INT
);

CREATE TABLE `QA` (
  `id` INT PRIMARY KEY,
  `question` TINYTEXT,
  `answer` TEXT
);

CREATE TABLE `genID` (
  `id` INT PRIMARY KEY
);

ALTER TABLE `debt` ADD FOREIGN KEY (`user`) REFERENCES `user` (`id`);

ALTER TABLE `hypotheeken` ADD FOREIGN KEY (`user`) REFERENCES `user` (`id`);

ALTER TABLE `hypotheeken` ADD FOREIGN KEY (`notes`) REFERENCES `H_note` (`id`);

ALTER TABLE `H_note` ADD FOREIGN KEY (`sender`) REFERENCES `user` (`id`);
