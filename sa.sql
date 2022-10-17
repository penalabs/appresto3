DELIMITER $$

USE `cigenerator`$$

DROP TRIGGER /*!50032 IF EXISTS */ `pengurangan_kas_gaji`$$

CREATE
    /*!50017 DEFINER = 'root'@'localhost' */
    TRIGGER `pengurangan_kas_gaji` AFTER INSERT ON `gaji` 
    FOR EACH ROW 
UPDATE kas k
   SET k.saldo = 
    (SELECT SUM(nominal) 
       FROM gaji
      WHERE kas_id = k.kas_id)
 WHERE k.kas_id = NEW.kas_id;
$$

DELIMITER ;