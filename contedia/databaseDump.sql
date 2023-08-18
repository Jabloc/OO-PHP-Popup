CREATE TABLE `form_data` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `dropdown` VARCHAR(10) NULL,
  `checkbox` VARCHAR(10) NULL,
  `email` VARCHAR(100) NOT NULL,
  `file_upload` VARCHAR(100) NOT NULL,
  `radio_option` VARCHAR(10) NULL,
  PRIMARY KEY (`id`)
);
