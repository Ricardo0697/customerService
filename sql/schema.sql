CREATE DATABASE IF NOT EXISTS `task_db`;
USE `task_db`;

-- @todo create customers table
CREATE TABLE customers (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  firstName varchar(100),
  lastName varchar(100),
  phone varchar(10),
  PRIMARY KEY (id)
) ENGINE=InnoDB;

-- @todo create addresses table
CREATE TABLE addresses (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  customerId int(10) UNSIGNED,
  address varchar(255),
  PRIMARY KEY (id)
) ENGINE=InnoDB;

-- @todo setup the foreign key constraints
ALTER TABLE addresses ADD
  FOREIGN KEY customer (customerId) REFERENCES customers (id) ON DELETE CASCADE ON UPDATE CASCADE;

