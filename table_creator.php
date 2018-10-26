<?php

//User Authoriztion table
CREATE TABLE `hms`.`user_authoriztion` ( `username` VARCHAR(12) NOT NULL , `password` VARCHAR(32) NOT NULL , `account_type` ENUM('Admin','Registration','Doctor','Pharmacy') NOT NULL , `status` ENUM('Out','In') NOT NULL , `last_login` DATETIME NOT NULL , PRIMARY KEY (`username`(12)) ) ENGINE = InnoDB;

//Profile Table
CREATE TABLE `hms`.`profile` ( `user_id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(56) NOT NULL , `email` VARCHAR(56) NOT NULL , `phone` VARCHAR(13) NULL , `address` VARCHAR(255) NULL , `content` VARCHAR(255) NULL , `image` VARCHAR(255) NOT NULL , `department` VARCHAR(60) NOT NULL , `availability` ENUM('Available','Leave') NOT NULL , `type` ENUM('Admin','Registration','Doctor','Pharmacy') NOT NULL , `username` VARCHAR(12) NOT NULL , PRIMARY KEY (`user_id`) , UNIQUE `username` (`name`(12)) ) ENGINE = InnoDB;

//Patient Info Table
CREATE TABLE `hms`.`patient_info` ( `patient_id` VARCHAR(12) NOT NULL , `name` VARCHAR(55) NOT NULL , `father_name` VARCHAR(55) NULL , `age` INT(4) NOT NULL , `blood_group` ENUM('A+','B+','AB+','O+','A-','B-','AB-','O-') NULL , `remarks` VARCHAR(255) NOT NULL , PRIMARY KEY (`patient_id`) ) ENGINE = InnoDB;

//Reg Patient Table
CREATE TABLE `hms`.`reg_patient` ( `registration` INT(15) NOT NULL AUTO_INCREMENT , `patient_id` VARCHAR(15) NOT NULL , `doctor_id` VARCHAR(15) NOT NULL , `doctor_name` VARCHAR(55) NOT NULL , `date` DATE NOT NULL , `time` TIME NOT NULL , PRIMARY KEY (`registration`) , UNIQUE `patient_id` (`patient_id`) ) ENGINE = InnoDB;

//Prescription Table
CREATE TABLE `hms`.`prescription` ( `patient_id` VARCHAR(15) NOT NULL , `registration` INT(15) NOT NULL , `medicine_data` INT(15) NOT NULL AUTO_INCREMENT , `test` VARCHAR(255) NULL , `diagnosis` VARCHAR(255) NOT NULL , `date` DATE NOT NULL , `time` TIME NOT NULL , `status` ENUM('Doctor','Pharmacy','Isuue') NOT NULL , PRIMARY KEY (`medicine_data`) , UNIQUE `registration` (`registration`) ) ENGINE = InnoDB;

//Prescribed Medicine Table
CREATE TABLE `hms`.`prescribed_medicine` ( `medicine_data` INT(15) NOT NULL , `fromm` ENUM('Store','Others') NOT NULL , `unit` ENUM('TB','TU','SYP','CP') NOT NULL , `brand` VARCHAR(60) NOT NULL , `generic` VARCHAR(255) NOT NULL , `schedule` ENUM('1 OD','1 BD','LA','SOS','STAT') NOT NULL , `days` INT NOT NULL , `advise` ENUM('Before Meal','After Meal','With Meal') NOT NULL , `quantity` INT NOT NULL , `medicine_id` INT NOT NULL ) ENGINE = InnoDB;

//Medicine Inventory Table
CREATE TABLE `hms`.`medicine_inventory` ( `medicine_id` INT(15) NOT NULL AUTO_INCREMENT , `type` ENUM('TB','TU','CP','SYP') NOT NULL , `brand` VARCHAR(60) NOT NULL , `generic` VARCHAR(255) NOT NULL , `quantity` INT NOT NULL , `expiry` DATE NOT NULL , `store_number` INT NOT NULL , `date` DATE NOT NULL , `time` TIME NOT NULL , PRIMARY KEY (`medicine_id`) ) ENGINE = InnoDB;

//Refer Table
CREATE TABLE `hms`.`refer` ( `registration` INT(15) NOT NULL , `from_doctor` VARCHAR(25) NOT NULL , `to_doctor` VARCHAR(25) NOT NULL , `remarks` VARCHAR(255) NOT NULL , `date` DATE NOT NULL , `time` TIME NOT NULL ) ENGINE = InnoDB;

//Cross Refer Table
CREATE TABLE `hms`.`cross_refer` ( `registration` INT(15) NOT NULL , `refer_to` VARCHAR(99) NOT NULL , `department` VARCHAR(99) NOT NULL , `reason` VARCHAR(255) NOT NULL , `remarks` VARCHAR(255) NOT NULL , `from_doctor` VARCHAR(25) NOT NULL , `date` DATE NOT NULL , `time` TIME NOT NULL ) ENGINE = InnoDB;


//SAMPLE INSERTS

//User Authorization
INSERT INTO `hms`.`user_authoriztion` (`username`, `password`, `account_type`, `status`, `last_login`) VALUES ('superadmin', MD5('1234567'), 'Admin', 'Out', '2015-07-09 19:33:14'), ('superdoctor', '1234567', 'Doctor', 'Out', '2015-07-09 19:34:07');
INSERT INTO `hms`.`user_authoriztion` (`username`, `password`, `account_type`, `status`, `last_login`) VALUES ('superreg', MD5('1234567'), 'Registration', 'Out', '2015-07-09 19:36:00'), ('superpharm', MD5('1234567'), 'Pharmacy', 'Out', '2015-07-09 19:37:00');

//Profile
INSERT INTO `hms`.`profile` (`user_id`, `name`, `email`, `phone`, `address`, `content`, `image`, `department`, `availability`, `type`, `username`) VALUES (NULL, 'Super Admin', 'super@email.com', '9876543210', 'Super Admin''s Address', 'I am a lovely Guy.', 'no image', 'Admin', 'Available', 'Admin', 'superadmin'), (NULL, 'Super Doctor', 'doctor@email.com', '9988776655', 'Super Doctor Address', 'Doctor content goes here', 'no image', 'Doctor Department', 'Available', 'Doctor', 'superdoctor');
INSERT INTO `hms`.`profile` (`user_id`, `name`, `email`, `phone`, `address`, `content`, `image`, `department`, `availability`, `type`, `username`) VALUES (NULL, 'Super Registration', 'reg@email.com', '7788994455', 'Super Registration Address', 'The content goes here....', 'No Image', 'Registration Desk Dept', 'Available', 'Registration', 'superreg'), (NULL, 'Super Pharmacy', 'pharm@email.com', '8899774455', 'Super Pharmacy Address', 'The content of pharmacy profile goes here.', 'No Image', 'Medical Pharmacy', 'Available', 'Pharmacy', 'superpharm');

//Patient Info
INSERT INTO `hms`.`patient_info` (`patient_id`, `name`, `father_name`, `age`, `blood_group`, `remarks`) VALUES ('PA1234', 'Super Patient', 'Super Father', '24', 'AB+', 'No remarks from now.');

//Reg Patient
INSERT INTO `hms`.`reg_patient` (`registration`, `patient_id`, `doctor_id`, `doctor_name`, `date`, `time`) VALUES (NULL, 'PA1234', 'superdoctor', 'Super Doctor', '2015-07-09', '19:49:23');

//Prescription
INSERT INTO `hms`.`prescription` (`patient_id`, `registration`, `medicine_data`, `test`, `diagnosis`, `date`, `time`, `status`) VALUES ('PA1234', '1', '1', NULL, 'THE_DIAGNOSIS', '2015-07-09', '19:53:00', 'Issue');

//Prescribed Data
INSERT INTO `hms`.`prescribed_medicine` (`medicine_data`, `fromm`, `unit`, `brand`, `generic`, `schedule`, `days`, `advise`, `quantity`, `medicine_id`) VALUES ('1', 'Store', 'TB', 'THE BRAND', 'Some Generic', '1 OD', '7', 'With Meal', '15', '1'), ('1', 'Others', 'SYP', 'Another Brand', 'Syrup', 'SOS', '1', 'After Meal', '1', '2');

//Medicine Inventory
INSERT INTO `hms`.`medicine_inventory` (`medicine_id`, `type`, `brand`, `generic`, `quantity`, `expiry`, `store_number`, `date`, `time`) VALUES ('1', 'TB', 'Some brand', 'some generic', '65', '2016-06-17', '123', '2015-07-09', '20:00:00'), ('2', 'SYP', 'Another Brand', 'Syrup', '50', '2016-10-13', '111', '2015-07-09', '20:01:00');


