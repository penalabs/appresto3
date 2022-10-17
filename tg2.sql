`cigenerator`DELIMITER $$

USE `cigenerator`$$

DROP TRIGGER /*!50032 IF EXISTS */ `NewTrigger`$$

CREATE
    /*!50017 DEFINER = 'root'@'localhost' */
    TRIGGER `NewTrigger` AFTER INSERT ON `transaksi_kas_investor` 
    FOR EACH ROW 
UPDATE kas k
   SET k.saldo = 
    (SELECT SUM(nominal) 
       FROM transaksi_kas_investor
      WHERE kas_id = k.kas_id)
 WHERE k.kas_id = NEW.kas_id;
$$

DELIMITER ;