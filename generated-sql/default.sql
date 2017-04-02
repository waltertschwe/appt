
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`
(
    `user_id` INTEGER NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME,
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- appointments
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `appointments`;

CREATE TABLE `appointments`
(
    `appointment_id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_id` INTEGER NOT NULL,
    `appointment_date_time` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL,
    `upated_at` DATETIME,
    PRIMARY KEY (`appointment_id`),
    INDEX `appointments_fi_72218f` (`user_id`),
    CONSTRAINT `appointments_fk_72218f`
        FOREIGN KEY (`user_id`)
        REFERENCES `users` (`user_id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
