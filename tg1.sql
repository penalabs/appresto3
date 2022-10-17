CREATE TRIGGER NewTrigger3
AFTER INSERT
ON transaksi_kas_investor FOR EACH ROW
UPDATE kas
SET saldo = saldo + new.nominal;