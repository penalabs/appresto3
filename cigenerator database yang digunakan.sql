/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - cigenerator
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cigenerator` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `cigenerator`;

/*Table structure for table `bahan_mentah` */

DROP TABLE IF EXISTS `bahan_mentah`;

CREATE TABLE `bahan_mentah` (
  `bahan_mentah_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bahan` varchar(500) DEFAULT NULL,
  `satuan` varchar(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`bahan_mentah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `bahan_mentah` */

insert  into `bahan_mentah`(`bahan_mentah_id`,`nama_bahan`,`satuan`,`stok`) values 
(1,'Lombok','kg',1);

/*Table structure for table `bahan_olahan` */

DROP TABLE IF EXISTS `bahan_olahan`;

CREATE TABLE `bahan_olahan` (
  `bahan_olahan_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bahan` varchar(500) DEFAULT NULL,
  `satuan` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`bahan_olahan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `bahan_olahan` */

insert  into `bahan_olahan`(`bahan_olahan_id`,`nama_bahan`,`satuan`,`stok`) values 
(1,'ayam potong ekor',1,10);

/*Table structure for table `biaya_operasional_cabang` */

DROP TABLE IF EXISTS `biaya_operasional_cabang`;

CREATE TABLE `biaya_operasional_cabang` (
  `biaya_operasional_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_operasional` varchar(500) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `id_users_bendahara` int(11) DEFAULT NULL,
  `resto_id` int(11) DEFAULT NULL,
  `kas_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`biaya_operasional_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `biaya_operasional_cabang` */

insert  into `biaya_operasional_cabang`(`biaya_operasional_id`,`nama_operasional`,`tanggal`,`nominal`,`id_users_bendahara`,`resto_id`,`kas_id`) values 
(2,'Beli wajan','2022-10-15 12:00:00',15000,8,11,6);

/*Table structure for table `biaya_operasional_kanwil` */

DROP TABLE IF EXISTS `biaya_operasional_kanwil`;

CREATE TABLE `biaya_operasional_kanwil` (
  `biaya_operasional_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_operasional` varchar(500) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `id_users_bendahara` int(11) DEFAULT NULL,
  `kanwil_id` int(11) DEFAULT NULL,
  `kas_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`biaya_operasional_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `biaya_operasional_kanwil` */

insert  into `biaya_operasional_kanwil`(`biaya_operasional_id`,`nama_operasional`,`tanggal`,`nominal`,`id_users_bendahara`,`kanwil_id`,`kas_id`) values 
(3,'Bensin','2022-10-15 12:00:00',5000,8,1,5);

/*Table structure for table `gaji` */

DROP TABLE IF EXISTS `gaji`;

CREATE TABLE `gaji` (
  `gaji_id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(10) DEFAULT NULL,
  `nominal` bigint(255) DEFAULT NULL,
  `kas_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`gaji_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `gaji` */

insert  into `gaji`(`gaji_id`,`tanggal`,`nominal`,`kas_id`) values 
(6,'2022-10-15',50,2);

/*Table structure for table `investasi` */

DROP TABLE IF EXISTS `investasi`;

CREATE TABLE `investasi` (
  `investasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_investasi` varchar(100) NOT NULL,
  `nominal` bigint(255) DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `masa_pemanfaatan` int(11) DEFAULT NULL,
  `status` enum('disetujui','belum disetujui') DEFAULT NULL,
  `id_users_bendahara` int(11) NOT NULL,
  `id_users_generalmaanager` int(11) DEFAULT NULL,
  `kas_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`investasi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `investasi` */

insert  into `investasi`(`investasi_id`,`nama_investasi`,`nominal`,`tanggal`,`jumlah`,`masa_pemanfaatan`,`status`,`id_users_bendahara`,`id_users_generalmaanager`,`kas_id`) values 
(4,'Renovasi',5000,'2022-10-01 12:00:00',1,1,NULL,8,7,2),
(5,'Renovasi',5000,'2022-10-01 12:00:00',1,1,NULL,8,7,2),
(6,'beli sendok',100,'2022-10-14 12:00:00',1,1,NULL,8,7,2);

/*Table structure for table `investor` */

DROP TABLE IF EXISTS `investor`;

CREATE TABLE `investor` (
  `investor_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_investor` varchar(100) DEFAULT NULL,
  `alamat_investor` varchar(100) DEFAULT NULL,
  `telp_investor` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`investor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `investor` */

insert  into `investor`(`investor_id`,`nama_investor`,`alamat_investor`,`telp_investor`) values 
(1,'fauzin','fauzin','0965876675'),
(3,'kjdsk','sjkdmk','32832424'),
(4,'sadaddddd','asdsa','33344444');

/*Table structure for table `kanwil` */

DROP TABLE IF EXISTS `kanwil`;

CREATE TABLE `kanwil` (
  `kanwil_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kanwil` varchar(100) DEFAULT NULL,
  `alamat_kanwil` varchar(100) DEFAULT NULL,
  `telp_kanwil` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`kanwil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `kanwil` */

insert  into `kanwil`(`kanwil_id`,`nama_kanwil`,`alamat_kanwil`,`telp_kanwil`) values 
(1,'sambirejo','sambirejo','5464567'),
(2,'ksdkskd','sadmajd','3453'),
(3,'snadna','sjadj','332232332223');

/*Table structure for table `kas` */

DROP TABLE IF EXISTS `kas`;

CREATE TABLE `kas` (
  `kas_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kas` varchar(100) DEFAULT NULL,
  `saldo` bigint(255) DEFAULT NULL,
  PRIMARY KEY (`kas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `kas` */

insert  into `kas`(`kas_id`,`nama_kas`,`saldo`) values 
(2,'Kas Kecil',0),
(4,'Kas Investor',0),
(5,'Kas Bendahara',0),
(6,'KAS CABANG',1000000);

/*Table structure for table `pengadaan_bahan_mentah` */

DROP TABLE IF EXISTS `pengadaan_bahan_mentah`;

CREATE TABLE `pengadaan_bahan_mentah` (
  `pengadaan_bahan_mentah_id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `bahan_mentah_id` int(11) DEFAULT NULL,
  `id_users_logistik` int(11) DEFAULT NULL,
  PRIMARY KEY (`pengadaan_bahan_mentah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengadaan_bahan_mentah` */

insert  into `pengadaan_bahan_mentah`(`pengadaan_bahan_mentah_id`,`tanggal`,`jumlah`,`bahan_mentah_id`,`id_users_logistik`) values 
(1,'2022-10-16 12:00:00',10,1,10);

/*Table structure for table `pengadaan_peralatan` */

DROP TABLE IF EXISTS `pengadaan_peralatan`;

CREATE TABLE `pengadaan_peralatan` (
  `pengadaan_peralatan_id` int(11) NOT NULL AUTO_INCREMENT,
  `peralatan_id` varchar(500) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `harga` varchar(500) DEFAULT NULL,
  `id_users_logistik` int(11) DEFAULT NULL,
  PRIMARY KEY (`pengadaan_peralatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengadaan_peralatan` */

insert  into `pengadaan_peralatan`(`pengadaan_peralatan_id`,`peralatan_id`,`tanggal`,`harga`,`id_users_logistik`) values 
(2,'Wajan','2022-10-16 12:00:00','50000',10),
(3,'1','2022-10-16 12:00:00','50000',10);

/*Table structure for table `pengiriman_bahan_olahan` */

DROP TABLE IF EXISTS `pengiriman_bahan_olahan`;

CREATE TABLE `pengiriman_bahan_olahan` (
  `pengiriman_bahan_olahan_id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `bahan_olahan_id` int(11) DEFAULT NULL,
  `id_users_logistik` int(11) DEFAULT NULL,
  `id_users_produksi` int(11) DEFAULT NULL,
  `status` enum('dikirim','belum dikirim') DEFAULT NULL,
  PRIMARY KEY (`pengiriman_bahan_olahan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengiriman_bahan_olahan` */

insert  into `pengiriman_bahan_olahan`(`pengiriman_bahan_olahan_id`,`tanggal`,`jumlah`,`bahan_olahan_id`,`id_users_logistik`,`id_users_produksi`,`status`) values 
(2,'2022-10-16 12:00:00',1,1,10,12,'dikirim');

/*Table structure for table `pengiriman_peralatan` */

DROP TABLE IF EXISTS `pengiriman_peralatan`;

CREATE TABLE `pengiriman_peralatan` (
  `pengiriman_peralatan_id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `peralatan_id` int(11) DEFAULT NULL,
  `id_users_logistik` int(11) DEFAULT NULL,
  `id_users_adminresto` int(11) DEFAULT NULL,
  `status` enum('dikirim','belum dikirim') DEFAULT NULL,
  PRIMARY KEY (`pengiriman_peralatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengiriman_peralatan` */

insert  into `pengiriman_peralatan`(`pengiriman_peralatan_id`,`tanggal`,`jumlah`,`peralatan_id`,`id_users_logistik`,`id_users_adminresto`,`status`) values 
(1,'2022-10-16 12:00:00',1,1,10,3,'belum dikirim');

/*Table structure for table `penyusutan_investasi` */

DROP TABLE IF EXISTS `penyusutan_investasi`;

CREATE TABLE `penyusutan_investasi` (
  `penusustan_id` int(11) NOT NULL AUTO_INCREMENT,
  `nominal` varchar(500) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `investasi_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`penusustan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `penyusutan_investasi` */

insert  into `penyusutan_investasi`(`penusustan_id`,`nominal`,`tanggal`,`investasi_id`) values 
(1,'1000','2022-10-15 21:07:44',4);

/*Table structure for table `peralatan` */

DROP TABLE IF EXISTS `peralatan`;

CREATE TABLE `peralatan` (
  `peralatan_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_peralatan` varchar(500) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`peralatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `peralatan` */

insert  into `peralatan`(`peralatan_id`,`nama_peralatan`,`stok`) values 
(1,'wajan',50);

/*Table structure for table `resto` */

DROP TABLE IF EXISTS `resto`;

CREATE TABLE `resto` (
  `resto_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_resto` varchar(100) DEFAULT NULL,
  `alamat_resto` varchar(100) DEFAULT NULL,
  `telp_resto` varchar(12) DEFAULT NULL,
  `kanwil_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`resto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `resto` */

insert  into `resto`(`resto_id`,`nama_resto`,`alamat_resto`,`telp_resto`,`kanwil_id`) values 
(11,'samvirejo','samvirejo','4534',1),
(22,'eer','rere','434',1),
(23,'sdad','sada','3443',1);

/*Table structure for table `setoran_kasir` */

DROP TABLE IF EXISTS `setoran_kasir`;

CREATE TABLE `setoran_kasir` (
  `setoran_id` int(11) NOT NULL AUTO_INCREMENT,
  `nominal` varchar(500) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_users_bendahara` int(11) DEFAULT NULL,
  `id_users_kasir` int(11) DEFAULT NULL,
  `status` enum('diterima','belum diterima') DEFAULT NULL,
  PRIMARY KEY (`setoran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `setoran_kasir` */

insert  into `setoran_kasir`(`setoran_id`,`nominal`,`tanggal`,`id_users_bendahara`,`id_users_kasir`,`status`) values 
(1,'5000','2022-10-15 12:00:00',8,9,'belum diterima'),
(2,'1000','2022-10-15 12:00:00',8,9,'diterima');

/*Table structure for table `tbl_hak_akses` */

DROP TABLE IF EXISTS `tbl_hak_akses`;

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_hak_akses` */

insert  into `tbl_hak_akses`(`id`,`id_user_level`,`id_menu`) values 
(15,1,1),
(19,1,2),
(21,2,1),
(24,1,3),
(28,1,3),
(29,2,2),
(30,1,4),
(31,1,5),
(33,1,15),
(34,1,16),
(35,1,17),
(36,3,1),
(37,3,18),
(38,3,19),
(39,3,20),
(40,3,21),
(41,4,1),
(42,4,22),
(43,4,23),
(44,4,24),
(45,1,25),
(46,3,26),
(47,4,27),
(48,4,28),
(49,4,29),
(50,4,30),
(51,4,31),
(52,9,1),
(53,4,32),
(54,4,33),
(55,6,1),
(56,6,34),
(57,6,35),
(58,6,36),
(59,6,37),
(60,6,38),
(61,7,1),
(62,6,39),
(63,2,40),
(64,6,41),
(65,6,42);

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`id_menu`,`title`,`url`,`icon`,`is_main_menu`,`is_aktif`) values 
(1,'KELOLA MENU','kelolamenu','fa fa-server',0,'y'),
(2,'KELOLA PENGGUNA','user','fa fa-user-o',0,'y'),
(3,'Level penguna','userlevel','fa fa-users',0,'y'),
(4,'Welcome','superadmin','fa fa-user-o',0,'y'),
(5,'Investor','investor','fa fa-id-card',0,'y'),
(15,'Kanwil','kanwil','fa fa-id-card',0,'y'),
(16,'Resto','resto','fa fa-id-card',0,'y'),
(17,'Transaksi Kas Investor','transaksi_kas_investor','fa fa-id-card',0,'y'),
(18,'Welcome','generalmanager','fa fa-id-card',0,'y'),
(19,'Kelola Pengguna','user','fa fa-id-card',0,'y'),
(20,'Gaji','gaji','fa fa-id-card',0,'y'),
(21,'Investasi','investasi','fa fa-id-card',0,'y'),
(22,'Welcome','welcome','fa fa-id-card',0,'y'),
(23,'Investasi','investasi_generalmanager','fa fa-id-card',0,'y'),
(25,'KAS','kas','fa fa-id-card',0,'y'),
(26,'KAS','kas','fa fa-id-card',0,'y'),
(27,'KAS','kas','fa fa-id-card',0,'y'),
(28,'Biaya Op Cabang','biaya_operasional_cabang','fa fa-id-card',0,'y'),
(29,'Biaya Op Kanwil','biaya_operasional_kanwil','fa fa-id-card',0,'y'),
(30,'Laporan KAS Cabang','laporan_kas_cabang','fa fa-id-card',0,'y'),
(31,'Setoran kasir','setoran_kasir','fa fa-id-card',0,'y'),
(32,'Laporan LABA RUGI','laporan_laba_rugi','fa fa-id-card',0,'y'),
(33,'Penyusutan Investasi','penyusutan_investasi','fa fa-id-card',0,'y'),
(34,'Pengadaan Perlatan','pengadaan_peralatan','fa fa-id-card',0,'y'),
(36,'Bahan Mentah','bahan_mentah','fa fa-id-card',0,'y'),
(37,'Pengadaan B. Mentah','pengadaan_bahan_mentah','fa fa-id-card',0,'y'),
(38,'Entri bahan Olahan','bahan_olahan','fa fa-id-card',0,'y'),
(39,'Pengiriman bahan olahan','pengiriman_bahan_olahan','fa fa-id-card',0,'y'),
(40,'Entri Pengeluaran Biaya Op','pengeluaran_operasional_cabang','fa fa-id-card',0,'y'),
(41,'Peralatan','peralatan','fa fa-id-card',0,'y'),
(42,'Pengiriman Peralatan','pengiriman_peralatan','fa fa-id-card',0,'y');

/*Table structure for table `tbl_setting` */

DROP TABLE IF EXISTS `tbl_setting`;

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_setting` */

insert  into `tbl_setting`(`id_setting`,`nama_setting`,`value`) values 
(1,'Tampil Menu','ya');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_users`,`full_name`,`email`,`password`,`images`,`id_user_level`,`is_aktif`) values 
(1,'Nuris Akbar M.Kom','nuris.akbar@gmail.com','123456','atomix_user31.png',1,'y'),
(3,'Muhammad hafidz Muzaki','hafid@gmail.com','123456','atomix_user31.png',2,'y'),
(7,'fauzin','fauzin@gmail.com','123456','atomix_user31.png',3,'y'),
(8,'debi','debi@gmail.com','123456','atomix_user31.png',4,'y'),
(9,'irhas','irhas@gmail.com','123456','atomix_user31.png',5,'y'),
(10,'wahyu','wahyu@gmail.com','123456','atomix_user31.png',6,'y'),
(12,'mansyur','mansyur@gmail.com','123456','atomix_user31.png',7,'y');

/*Table structure for table `tbl_user_level` */

DROP TABLE IF EXISTS `tbl_user_level`;

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user_level` */

insert  into `tbl_user_level`(`id_user_level`,`nama_level`) values 
(1,'superadmin'),
(2,'adminresto'),
(3,'generalmanager'),
(4,'bendahara'),
(5,'kasir'),
(6,'logistik'),
(7,'produksi');

/*Table structure for table `transaksi_kas_investor` */

DROP TABLE IF EXISTS `transaksi_kas_investor`;

CREATE TABLE `transaksi_kas_investor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(500) DEFAULT NULL,
  `nominal` bigint(255) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `investor_id` int(11) DEFAULT NULL,
  `kas_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi_kas_investor` */

insert  into `transaksi_kas_investor`(`id`,`tanggal`,`nominal`,`id_users`,`investor_id`,`kas_id`) values 
(15,'2022-10-14 20:10:41',50,1,1,2);

/* Trigger structure for table `gaji` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `pengurangan_saldo_oleh_gaji` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `pengurangan_saldo_oleh_gaji` AFTER INSERT ON `gaji` FOR EACH ROW BEGIN
	UPDATE kas SET saldo=saldo-NEW.nominal
    WHERE kas_id=NEW.kas_id;
END */$$


DELIMITER ;

/* Trigger structure for table `gaji` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_penambahan_saldo_oleh_gaji` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_penambahan_saldo_oleh_gaji` AFTER UPDATE ON `gaji` FOR EACH ROW BEGIN
   IF OLD.nominal < NEW.nominal THEN
	UPDATE kas SET saldo=saldo-OLD.nominal-NEW.nominal
    WHERE kas_id=OLD.kas_id;
    END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `gaji` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_pengurangan_saldo_oleh_gaji` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_pengurangan_saldo_oleh_gaji` AFTER UPDATE ON `gaji` FOR EACH ROW BEGIN
   IF OLD.nominal < NEW.nominal THEN
	UPDATE kas SET saldo=saldo-OLD.nominal-NEW.nominal
    WHERE kas_id=OLD.kas_id;
    END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `gaji` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `penambahan_saldo_oleh_gaji` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `penambahan_saldo_oleh_gaji` AFTER DELETE ON `gaji` FOR EACH ROW BEGIN
	UPDATE kas SET saldo=saldo+OLD.nominal
    WHERE kas_id=OLD.kas_id;
END */$$


DELIMITER ;

/* Trigger structure for table `investasi` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `pengurangan_saldo_oleh_investasi` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `pengurangan_saldo_oleh_investasi` AFTER INSERT ON `investasi` FOR EACH ROW BEGIN
	UPDATE kas SET saldo=saldo-NEW.nominal
    WHERE kas_id=NEW.kas_id;
END */$$


DELIMITER ;

/* Trigger structure for table `investasi` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_penambahan_saldo_oleh_investasi` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_penambahan_saldo_oleh_investasi` AFTER UPDATE ON `investasi` FOR EACH ROW BEGIN
   IF OLD.nominal < NEW.nominal THEN
	UPDATE kas SET saldo=saldo-OLD.nominal-NEW.nominal
    WHERE kas_id=OLD.kas_id;
    END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `investasi` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_pengurangan_saldo_oleh_investasi` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_pengurangan_saldo_oleh_investasi` AFTER UPDATE ON `investasi` FOR EACH ROW BEGIN
   IF OLD.nominal < NEW.nominal THEN
	UPDATE kas SET saldo=saldo-OLD.nominal-NEW.nominal
    WHERE kas_id=OLD.kas_id;
    END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `investasi` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `penambahan_saldo_oleh_investasi` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `penambahan_saldo_oleh_investasi` AFTER DELETE ON `investasi` FOR EACH ROW BEGIN
	UPDATE kas SET saldo=saldo+OLD.nominal
    WHERE kas_id=OLD.kas_id;
END */$$


DELIMITER ;

/* Trigger structure for table `transaksi_kas_investor` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `penambahan_kas_oleh_investor` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `penambahan_kas_oleh_investor` AFTER INSERT ON `transaksi_kas_investor` FOR EACH ROW BEGIN
	UPDATE kas SET saldo=saldo+NEW.nominal
    WHERE kas_id=NEW.kas_id;
END */$$


DELIMITER ;

/* Trigger structure for table `transaksi_kas_investor` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_pengurangan_saldo_oleh_investor` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_pengurangan_saldo_oleh_investor` AFTER UPDATE ON `transaksi_kas_investor` FOR EACH ROW BEGIN
    IF OLD.nominal > NEW.nominal THEN
	UPDATE kas SET saldo=saldo+OLD.nominal-NEW.nominal
    WHERE kas_id=NEW.kas_id;
    END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `transaksi_kas_investor` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_penambahan_saldo_oleh_investor` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_penambahan_saldo_oleh_investor` AFTER UPDATE ON `transaksi_kas_investor` FOR EACH ROW BEGIN
   IF OLD.nominal < NEW.nominal THEN
	UPDATE kas SET saldo=saldo-OLD.nominal-NEW.nominal
    WHERE kas_id=OLD.kas_id;
    END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `transaksi_kas_investor` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `pengurangan_kas_oleh_investor` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `pengurangan_kas_oleh_investor` AFTER DELETE ON `transaksi_kas_investor` FOR EACH ROW BEGIN
	UPDATE kas SET saldo=saldo-OLD.nominal
    WHERE kas_id=OLD.kas_id;
END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
