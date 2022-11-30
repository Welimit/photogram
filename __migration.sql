-- pulled on 11/20/2022 Migrations
ALTER TABLE `addons` ADD COLUMN `sec_email` VARCHAR(256) NULL;


ALTER TABLE `authdb`.`users` 
ADD CONSTRAINT `id`
  FOREIGN KEY (`id`)
  REFERENCES `authdb`.`addons` (`id`)
  ON DELETE RESTRICT
  ON UPDATE NO ACTION;
