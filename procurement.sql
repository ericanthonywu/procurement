/*
Navicat mysqli Data Transfer

Source Server         : 127.1.0.0
Source Server Version : 100132
Source Host           : localhost:3306
Source Database       : procurement

Target Server Type    : mysqli
Target Server Version : 100132
File Encoding         : 65001

Date: 2018-11-27 23:13:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ads
-- ----------------------------
DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inv` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `sms` varchar(20) DEFAULT NULL,
  `wa` varchar(20) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `transfer` varchar(20) DEFAULT NULL,
  `transaksi` varchar(20) DEFAULT NULL,
  `order` varchar(20) DEFAULT NULL,
  `sales` varchar(20) DEFAULT NULL,
  `net_sales` varchar(20) DEFAULT NULL,
  `biaya_iklan` varchar(20) DEFAULT NULL,
  `cpl` varchar(20) DEFAULT NULL,
  `harga_beli` varchar(20) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `toko` int(11) DEFAULT NULL,
  `kode` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ads
-- ----------------------------

-- ----------------------------
-- Table structure for auth
-- ----------------------------
DROP TABLE IF EXISTS `auth`;
CREATE TABLE `auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `st` varchar(1) DEFAULT NULL,
  `lv` int(1) DEFAULT NULL,
  `toko` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of auth
-- ----------------------------
INSERT INTO `auth` VALUES ('1', 'ramadhani', 'ramadhani@procurement', 'BB2l+L9GYZr2G3Ao2/Y7RE8GAmeT6YTSlrfMinU3a6E=', 'Ramadhani', '1', '1', '1');
INSERT INTO `auth` VALUES ('2', 'asterindo', 'asterindo@procurement', 't+qm896DhfMFBLiTUjThIEZ69AcyFeUo+Wcpmqht2ek=', 'Asterindo', '1', '1', '2');
INSERT INTO `auth` VALUES ('3', 'admin_asterindo', 'admin_asterindo@procurement.com', '1i0YhCGJFWoOnvTkBabFGOOXUTkTuIeD0DcWKckA1KI=', 'Admin Asterindo', '1', '2', '2');
INSERT INTO `auth` VALUES ('4', 'advertiser_asterindo', 'advertiser_asterindo@procurement.com', 'wBSsC+HUS+X2veL392v8v6DUNgZLNgTdLMreOnjX3Zw=', 'Advertiser Asterindo', '1', '3', '2');
INSERT INTO `auth` VALUES ('5', 'cs_asterindo', 'cs_asterindo@procurement.com', 'FDwnLmdmXi8k10IiEqFFl7rp593x/Ciu55VUvnhus/U=', 'CS Asterindo', '1', '4', '2');
INSERT INTO `auth` VALUES ('6', 'admin_ramadhani', 'admin_ramadhani@procurement.com', '1IkakcQTK4ck5Hv0IxfyRSeKX3J25MJfX+XRVjLter0=', 'Admin Ramadhani', '1', '2', '1');
INSERT INTO `auth` VALUES ('7', 'advertiser_ramadhani', 'advertiser_ramadhani@procurement.com', 'Pxlvd03X3hotgQ2AGLdsF+zDvPIz9csEoLFuxpzToas=', 'Advertiser Ramadhani', '1', '3', '1');
INSERT INTO `auth` VALUES ('8', 'cs_ramadhani', 'cs_ramadhani@procurement.com', '5w4nx+S7xQcyqcIWVy6yefc3WOy35waPLy4U7tj5YjA=', 'CS Ramadhani', '1', '4', '1');
INSERT INTO `auth` VALUES ('9', 'cs_ayu', 'cs_ayu@procurement.com', 'EP0+sXWJDXtHymPPP2l22T1GThJ/j+AbU1jAvNtu9Pc=', 'CS Ayu', '1', '4', '1');

-- ----------------------------
-- Table structure for bank
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rekening` varchar(30) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `toko` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bank
-- ----------------------------
INSERT INTO `bank` VALUES ('1', 'Tunai', 'Cash', 'Cash', null, null, '1');
INSERT INTO `bank` VALUES ('2', 'Tunai', 'Cash', 'Cash', null, null, '2');

-- ----------------------------
-- Table structure for bonus
-- ----------------------------
DROP TABLE IF EXISTS `bonus`;
CREATE TABLE `bonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `karyawan` int(11) DEFAULT NULL,
  `bonus_order` varchar(20) DEFAULT NULL,
  `bonus_sales` varchar(20) DEFAULT NULL,
  `bonus_konversi` varchar(20) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `toko` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bonus
-- ----------------------------

-- ----------------------------
-- Table structure for cicilan
-- ----------------------------
DROP TABLE IF EXISTS `cicilan`;
CREATE TABLE `cicilan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inv` varchar(30) DEFAULT NULL,
  `cicilan` varchar(20) DEFAULT NULL,
  `sisa` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cicilan
-- ----------------------------

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` int(1) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `provinsi` int(11) DEFAULT NULL,
  `nama_prov` varchar(50) DEFAULT NULL,
  `kota` int(11) DEFAULT NULL,
  `nama_kota` varchar(50) DEFAULT NULL,
  `kecamatan` bigint(20) DEFAULT NULL,
  `nama_kecamatan` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(7) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `line` char(20) DEFAULT NULL,
  `bbm` char(10) DEFAULT NULL,
  `alamat` text,
  `toko` int(11) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('1', '1', 'Abdul', '1', 'Bali', '114', 'Denpasar', '1574', 'Denpasar Selatan', '0', '081236391375', 'abdul@abdul.abdul', 'abdulabdul', 'abdulabdul', 'denpasar', '1', 'ramadhani', '2018-11-26');
INSERT INTO `customer` VALUES ('2', '1', 'kosim', '2', 'Bangka Belitung', '27', 'Bangka', '427', 'Belinyu', '0', '081802281628', 'kosim@kosim.kosim', 'kosimkosim', 'kosim', 'bangka', '1', 'ramadhani', '2018-11-26');

-- ----------------------------
-- Table structure for detail_order
-- ----------------------------
DROP TABLE IF EXISTS `detail_order`;
CREATE TABLE `detail_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inv` varchar(30) DEFAULT NULL,
  `produk` int(11) DEFAULT NULL,
  `harga_beli` varchar(20) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `jumlah` varchar(10) DEFAULT NULL,
  `diskon` varchar(15) DEFAULT NULL,
  `subtotal` varchar(20) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `toko` int(11) DEFAULT NULL,
  `jenis` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_order
-- ----------------------------

-- ----------------------------
-- Table structure for expenses
-- ----------------------------
DROP TABLE IF EXISTS `expenses`;
CREATE TABLE `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(100) DEFAULT NULL,
  `harga` char(20) DEFAULT NULL,
  `jumlah` char(10) DEFAULT NULL,
  `note` text,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `toko` int(11) DEFAULT NULL,
  `kode` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of expenses
-- ----------------------------

-- ----------------------------
-- Table structure for gaji
-- ----------------------------
DROP TABLE IF EXISTS `gaji`;
CREATE TABLE `gaji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `karyawan` int(11) DEFAULT NULL,
  `total_sales` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `gaji_pokok` varchar(20) DEFAULT NULL,
  `uang_makan` varchar(20) DEFAULT NULL,
  `tunjangan` varchar(20) DEFAULT NULL,
  `bonus` varchar(20) DEFAULT NULL,
  `gaji_bersih` varchar(20) DEFAULT NULL,
  `ongkir` varchar(20) DEFAULT NULL,
  `sanksi` varchar(20) DEFAULT NULL,
  `pinjaman` varchar(20) DEFAULT NULL,
  `totalpenerimaan` varchar(20) DEFAULT NULL,
  `totalpotongan` varchar(20) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `toko` int(11) DEFAULT NULL,
  `kode` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gaji
-- ----------------------------

-- ----------------------------
-- Table structure for jenis_produk
-- ----------------------------
DROP TABLE IF EXISTS `jenis_produk`;
CREATE TABLE `jenis_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `toko` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jenis_produk
-- ----------------------------
INSERT INTO `jenis_produk` VALUES ('1', 'Barang Stok Sendiri', 'ramadhani', '2018-11-11', '1');
INSERT INTO `jenis_produk` VALUES ('2', 'Barang Supplier Lain', 'ramadhani', '2018-11-11', '1');

-- ----------------------------
-- Table structure for kategori_produk
-- ----------------------------
DROP TABLE IF EXISTS `kategori_produk`;
CREATE TABLE `kategori_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `toko` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategori_produk
-- ----------------------------
INSERT INTO `kategori_produk` VALUES ('1', 'Kategori 1', 'ramadhani', '2018-11-26', '1');
INSERT INTO `kategori_produk` VALUES ('2', 'Kategori 2', 'ramadhani', '2018-11-26', '1');

-- ----------------------------
-- Table structure for notif
-- ----------------------------
DROP TABLE IF EXISTS `notif`;
CREATE TABLE `notif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judulnotif` varchar(100) DEFAULT NULL,
  `isinotif` text,
  `tipenotif` varchar(1) DEFAULT NULL,
  `st` varchar(1) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `kategori` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of notif
-- ----------------------------

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inv` varchar(30) DEFAULT NULL,
  `cs` varchar(20) DEFAULT NULL,
  `pemesan` int(11) DEFAULT NULL,
  `kepada` int(11) DEFAULT NULL,
  `pengirim` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `note` text,
  `expedisi` varchar(20) DEFAULT NULL,
  `paket` varchar(20) DEFAULT NULL,
  `berat` varchar(10) DEFAULT NULL,
  `ongkir` varchar(12) DEFAULT NULL,
  `asuransi` varchar(12) DEFAULT NULL,
  `keterangan` text,
  `nominal` varchar(12) DEFAULT NULL,
  `diskon` varchar(20) DEFAULT NULL,
  `total_order` varchar(20) DEFAULT NULL,
  `status_bayar` int(1) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `nominal_bayar` varchar(20) DEFAULT NULL,
  `sisa_bayar` varchar(20) DEFAULT NULL,
  `bank` int(11) DEFAULT NULL,
  `no_resi` varchar(255) DEFAULT NULL,
  `status_resi` int(11) DEFAULT NULL,
  `toko` int(11) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `status_print` varchar(1) DEFAULT NULL,
  `bayar_supplier` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for produk
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` int(11) DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  `nama` char(100) DEFAULT NULL,
  `keterangan` text,
  `berat` char(10) DEFAULT NULL,
  `diskon` char(3) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `spesifikasi` char(30) DEFAULT NULL,
  `harga_beli` char(12) DEFAULT NULL,
  `harga_jual_normal` char(12) DEFAULT NULL,
  `harga_jual_reseller` char(12) DEFAULT NULL,
  `harga_jual_dropship` char(12) DEFAULT NULL,
  `harga_agen_khusus` char(12) DEFAULT NULL,
  `harga_pasukan` char(12) DEFAULT NULL,
  `rentang_awal` char(3) DEFAULT NULL,
  `rentang_akhir` char(3) DEFAULT NULL,
  `harga_satuan` char(12) DEFAULT NULL,
  `stock` int(112) NOT NULL,
  `st_diskon` int(1) DEFAULT NULL,
  `st_grosir` int(1) DEFAULT NULL,
  `publish` int(1) DEFAULT NULL,
  `st_stok` int(1) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `toko` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES ('1', '2', '1', 'Headphone', 'Headphone mahal', '1', '0', null, '123123', '0', '1500000', '1500000', '1500000', '1500000', '1500000', '', '', '', '0', '0', '0', '0', '0', 'ramadhani', '2018-11-26', '1');
INSERT INTO `produk` VALUES ('2', '1', '2', 'Ear Phone', 'Ear Phone Samsung', '1', '0', null, '321321', '1500000', '1500000', '1500000', '1500000', '1500000', '1500000', '', '', '', '1000', '0', '0', '0', '0', 'ramadhani', '2018-11-26', '1');

-- ----------------------------
-- Table structure for punishment
-- ----------------------------
DROP TABLE IF EXISTS `punishment`;
CREATE TABLE `punishment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text,
  `sanksi` int(11) DEFAULT NULL,
  `jumlahwaktusanksi` int(11) DEFAULT NULL,
  `satuanwaktu` varchar(20) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `toko` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of punishment
-- ----------------------------
INSERT INTO `punishment` VALUES ('1', 'Tidak Hadir Tanpa Keterangan', '20000', '1', 'hari', 'ramadhani', '2018-11-21', '1');
INSERT INTO `punishment` VALUES ('2', 'Slow Respon (Respon >= 11 menit)', '500', '1', 'menit', 'ramadhani', '2018-11-21', '1');
INSERT INTO `punishment` VALUES ('3', 'Slow Respon >= 60 menit', '50500', '1', 'hari', 'ramadhani', '2018-11-21', '1');
INSERT INTO `punishment` VALUES ('4', 'Tidak FU Terhadap 3 Jenis Leads Sesuai Jadwal FU', '500', '1', 'menit', 'ramadhani', '2018-11-21', '1');
INSERT INTO `punishment` VALUES ('5', 'NO RESPON di Jadwal Slow Respon', '30000', '1', 'hari', 'ramadhani', '2018-11-21', '1');
INSERT INTO `punishment` VALUES ('6', 'Tidak Hadir Tanpa Keterangan', '20000', '1', 'hari', 'asterindo', '2018-11-21', '2');
INSERT INTO `punishment` VALUES ('7', 'Slow Respon (Respon >= 11 menit)', '500', '1', 'menit', 'asterindo', '2018-11-21', '2');
INSERT INTO `punishment` VALUES ('8', 'Slow Respon >= 60 menit', '50500', '1', 'hari', 'asterindo', '2018-11-21', '2');
INSERT INTO `punishment` VALUES ('9', 'Tidak FU Terhadap 3 Jenis Leads Sesuai Jadwal FU', '500', '1', 'menit', 'asterindo', '2018-11-21', '2');
INSERT INTO `punishment` VALUES ('10', 'NO RESPON di Jadwal Slow Respon', '30000', '1', 'hari', 'asterindo', '2018-11-21', '2');

-- ----------------------------
-- Table structure for report
-- ----------------------------
DROP TABLE IF EXISTS `report`;
CREATE TABLE `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(30) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `gross_sales` varchar(20) DEFAULT NULL,
  `net_sales` varchar(20) DEFAULT NULL,
  `expenses` varchar(20) DEFAULT NULL,
  `transaksi` varchar(20) DEFAULT NULL,
  `item_terjual` varchar(20) DEFAULT NULL,
  `ongkir` varchar(20) DEFAULT NULL,
  `diskon` varchar(20) DEFAULT NULL,
  `harga_beli` varchar(20) DEFAULT NULL,
  `gross_profit` varchar(20) DEFAULT NULL,
  `net_profit` varchar(20) DEFAULT NULL,
  `toko` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of report
-- ----------------------------

-- ----------------------------
-- Table structure for reward
-- ----------------------------
DROP TABLE IF EXISTS `reward`;
CREATE TABLE `reward` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_reward` varchar(50) DEFAULT NULL,
  `bonus` int(11) DEFAULT NULL,
  `bonus_sales` int(11) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `toko` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reward
-- ----------------------------
INSERT INTO `reward` VALUES ('1', 'Sales dari Iklan', '5000', '10000', 'ramadhani', '2018-11-21', '1');
INSERT INTO `reward` VALUES ('2', 'Sales dari Database/Repeat Order (Bukan Dari Iklan', '10000', '20000', 'ramadhani', '2018-11-21', '1');
INSERT INTO `reward` VALUES ('3', 'Rating Konversi >= 30%', '5000', '5000', 'ramadhani', '2018-11-21', '1');
INSERT INTO `reward` VALUES ('4', 'Rating Order >= 1,5', '10000', '5000', 'ramadhani', '2018-11-21', '1');
INSERT INTO `reward` VALUES ('5', 'Sales dari Iklan', '5000', '10000', 'asterindo', '2018-11-21', '2');
INSERT INTO `reward` VALUES ('6', 'Sales dari Database/Repeat Order (Bukan Dari Iklan', '10000', '20000', 'asterindo', '2018-11-21', '2');
INSERT INTO `reward` VALUES ('7', 'Rating Konversi >= 30%', '5000', '5000', 'asterindo', '2018-11-21', '2');
INSERT INTO `reward` VALUES ('8', 'Rating Order >= 1,5', '10000', '5000', 'asterindo', '2018-11-21', '2');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'Owner');
INSERT INTO `role` VALUES ('2', 'Admin');
INSERT INTO `role` VALUES ('3', 'Advertiser');
INSERT INTO `role` VALUES ('4', 'Customer Service');

-- ----------------------------
-- Table structure for sanksi
-- ----------------------------
DROP TABLE IF EXISTS `sanksi`;
CREATE TABLE `sanksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `karyawan` int(11) DEFAULT NULL,
  `punishment` int(11) DEFAULT NULL,
  `nominal` varchar(20) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `toko` int(11) DEFAULT NULL,
  `waktu` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sanksi
-- ----------------------------

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `asal` int(11) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` text,
  `keterangan` text,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `toko` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES ('1', 'PT. AAA', '1', 'Aceh Barat', '0', '-', '-', 'ramadhani', '2018-11-26', '1');

-- ----------------------------
-- Table structure for toko
-- ----------------------------
DROP TABLE IF EXISTS `toko`;
CREATE TABLE `toko` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `deskripsi` text,
  `foto` varchar(255) DEFAULT NULL,
  `expired` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of toko
-- ----------------------------
INSERT INTO `toko` VALUES ('1', 'Ramadhani Store', '0', '0', 'Belum Ada Deskripsi', 'toko-ramadhani.png', null);
INSERT INTO `toko` VALUES ('2', 'PT. Asterindo', '0', '0', 'Belum Ada Deskripsi', 'toko-ramadhani.png', null);

-- ----------------------------
-- View structure for v_ads
-- ----------------------------
DROP VIEW IF EXISTS `v_ads`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_ads` AS SELECT
Sum(email) AS total_email,
Sum(sms) AS total_sms,
Sum(wa) AS total_wa,
Sum(telp) AS total_telp,
Sum(transfer) AS total_transfer,
Sum(transaksi) AS total_transaksi,
Sum(`order`) AS total_order,
Sum(sales) AS total_sales,
Sum(biaya_iklan) AS total_bi,
Sum(cpl) AS total_cpl,
created_by AS created_by,
created_date AS created_date,
toko AS toko,
id AS id,
SUM(net_sales) AS net_sales,
SUM(harga_beli) AS harga_beli,
SUM(net_sales)-SUM(harga_beli) AS total_gp
FROM
	`ads`
GROUP BY
	created_date ;

-- ----------------------------
-- View structure for v_ads_cs
-- ----------------------------
DROP VIEW IF EXISTS `v_ads_cs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_ads_cs` AS SELECT
Sum(email) AS total_email,
Sum(sms) AS total_sms,
Sum(wa) AS total_wa,
Sum(telp) AS total_telp,
Sum(transfer) AS total_transfer,
Sum(transaksi) AS total_transaksi,
Sum(`order`) AS total_order,
Sum(sales) AS total_sales,
Sum(biaya_iklan) AS total_bi,
Sum(cpl) AS total_cpl,
created_by AS created_by,
created_date AS created_date,
toko AS toko,
id AS id,
SUM(net_sales) AS net_sales,
SUM(harga_beli) AS harga_beli,
SUM(net_sales)-SUM(harga_beli) AS total_gp
FROM
	`ads`
GROUP BY
	created_by,created_date ;

-- ----------------------------
-- View structure for v_bank
-- ----------------------------
DROP VIEW IF EXISTS `v_bank`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_bank` AS SELECT
bank.rekening,
bank.nama,
bank.bank,
Sum(orders.total_order) AS total_order,
orders.toko,
tanggal_bayar AS tanggal,
DAYNAME(tanggal_bayar) AS nama_hari,
CASE DAYOFWEEK(tanggal_bayar)
		WHEN 1 THEN 'Minggu'
		WHEN 2 THEN 'Senin'
		WHEN 3 THEN 'Selasa'
		WHEN 4 THEN 'Rabu'
		WHEN 5 THEN 'Kamis'
		WHEN 6 THEN 'Jumat'
		WHEN 7 THEN 'Sabtu'
END AS nama_hari_indo,
DAY (tanggal_bayar) AS hari,
MONTH (tanggal_bayar) AS bulan,
YEAR (tanggal_bayar) AS tahun
FROM
	orders
INNER JOIN bank ON orders.bank = bank.id
GROUP BY
bank.nama ;

-- ----------------------------
-- View structure for v_best_customer
-- ----------------------------
DROP VIEW IF EXISTS `v_best_customer`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_best_customer` AS SELECT
Count(orders.id) AS total_order,
Sum(report.item_terjual) AS jumlah,
customer.nama,
customer.nama_prov,
customer.nama_kota,
customer.nama_kecamatan,
customer.kode_pos,
customer.hp,
customer.email,
customer.line,
customer.bbm,
customer.alamat,
orders.toko,
orders.created_by,
orders.created_date,
orders.tanggal as tanggal,
DAY(orders.tanggal) AS hari,
MONTH(orders.tanggal) AS bulan,
YEAR(orders.tanggal) AS tahun
FROM
orders
INNER JOIN report ON orders.inv = report.kode
INNER JOIN customer ON orders.pemesan = customer.id
GROUP BY
customer.nama,orders.tanggal
ORDER BY
report.item_terjual DESC ;

-- ----------------------------
-- View structure for v_best_customer_location
-- ----------------------------
DROP VIEW IF EXISTS `v_best_customer_location`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_best_customer_location` AS SELECT
Count(orders.id) AS total_order,
Sum(report.item_terjual) AS jumlah,
customer.nama,
customer.nama_prov,
customer.nama_kota,
customer.nama_kecamatan,
customer.kode_pos,
customer.hp,
customer.email,
customer.line,
customer.bbm,
customer.alamat,
orders.toko,
orders.created_by,
orders.created_date,
orders.tanggal as tanggal,
DAY(orders.tanggal) AS hari,
MONTH(orders.tanggal) AS bulan,
YEAR(orders.tanggal) AS tahun
FROM
orders
INNER JOIN report ON orders.inv = report.kode
INNER JOIN customer ON orders.pemesan = customer.id 
GROUP BY
customer.nama_kota,orders.tanggal
ORDER BY
report.item_terjual DESC ;

-- ----------------------------
-- View structure for v_best_customer_service
-- ----------------------------
DROP VIEW IF EXISTS `v_best_customer_service`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_best_customer_service` AS SELECT
Count(orders.id) AS total_order,
Sum(report.item_terjual) AS jumlah,
orders.toko,
orders.created_by,
orders.created_date,
orders.tanggal as tanggal,
DAY(orders.tanggal) AS hari,
MONTH(orders.tanggal) AS bulan,
YEAR(orders.tanggal) AS tahun,
auth.nama
FROM
orders
INNER JOIN report ON orders.inv = report.kode
INNER JOIN auth ON orders.cs = auth.username
GROUP BY
auth.nama,orders.tanggal
ORDER BY
report.item_terjual DESC ;

-- ----------------------------
-- View structure for v_best_produk
-- ----------------------------
DROP VIEW IF EXISTS `v_best_produk`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_best_produk` AS SELECT
orders.toko,
orders.created_by,
orders.created_date,
SUM(detail_order.jumlah) AS best_produk,
orders.tanggal as tanggal,
DAY(orders.tanggal) AS hari,
MONTH(orders.tanggal) AS bulan,
YEAR(orders.tanggal) AS tahun,
produk.nama
FROM
orders
INNER JOIN detail_order ON orders.inv = detail_order.inv
INNER JOIN produk ON detail_order.produk = produk.id
GROUP BY
produk.nama,orders.tanggal
ORDER BY
detail_order.jumlah DESC ;

-- ----------------------------
-- View structure for v_dashboard
-- ----------------------------
DROP VIEW IF EXISTS `v_dashboard`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_dashboard` AS SELECT
DAY(tanggal) AS hari,
MONTH(tanggal) AS bulan,
YEAR(tanggal) AS tahun,
SUM(item_terjual) AS total_produk,
SUM(net_sales)-SUM(harga_beli) AS gross_profit,
toko
FROM
report 
GROUP BY
tanggal ;

-- ----------------------------
-- View structure for v_detail_produk
-- ----------------------------
DROP VIEW IF EXISTS `v_detail_produk`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `v_detail_produk` AS SELECT
detail_order.inv,
detail_order.harga_beli,
detail_order.harga,
detail_order.jumlah,
detail_order.diskon,
detail_order.subtotal,
detail_order.id,
detail_order.created_by,
detail_order.created_date,
detail_order.toko,
produk.jenis,
produk.nama as nama_produk,
produk.kategori,
produk.berat,
produk.keterangan,
produk.diskon as diskon_produk,
produk.harga_beli as harga_beli_produk,
produk.harga_jual_normal,
produk.harga_jual_reseller,
produk.stock
FROM
detail_order
INNER JOIN produk ON detail_order.produk = produk.id ;

-- ----------------------------
-- View structure for v_gaji
-- ----------------------------
DROP VIEW IF EXISTS `v_gaji`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `v_gaji` AS SELECT
gaji.id,
gaji.karyawan,
gaji.total_sales,
gaji.tanggal,
gaji.gaji_pokok,
gaji.uang_makan,
gaji.tunjangan,
gaji.bonus,
gaji.gaji_bersih,
gaji.ongkir,
gaji.sanksi,
gaji.pinjaman,
gaji.totalpenerimaan,
gaji.totalpotongan,
gaji.created_by,
gaji.created_date,
gaji.toko,
auth.username,
auth.email,
auth.nama
FROM
gaji
INNER JOIN auth ON gaji.karyawan = auth.id ;

-- ----------------------------
-- View structure for v_kurir
-- ----------------------------
DROP VIEW IF EXISTS `v_kurir`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_kurir` AS SELECT
expedisi,
paket,
toko,
created_by,
tanggal AS tanggal,
DAY(tanggal) AS hari,
MONTH(tanggal) AS bulan,
YEAR(tanggal) AS tahun,
SUM(ongkir) AS total_ongkir
FROM
orders 
GROUP BY
expedisi ;

-- ----------------------------
-- View structure for v_order
-- ----------------------------
DROP VIEW IF EXISTS `v_order`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_order` AS SELECT
orders.id AS id,
orders.inv AS inv,
customer.nama AS nama_pemesan,
customer.nama_prov AS prov_pemesan,
customer.nama_kota AS kota_pemesan,
customer.nama_kecamatan AS kecamatan_pemesan,
customer.kode_pos AS kode_pos_pemesan,
customer.hp AS hp_pemesan,
customer.email AS email_pemesan,
customer.line AS line_pemesan,
customer.bbm AS bbm_pemesan,
customer.alamat AS alamat_pemesan,
supplier.nama AS nama_pengirim,
supplier.kota AS kota_pengirim,
supplier.telp AS telp_pengirim,
supplier.alamat AS alamat_pengirim,
supplier.keterangan AS keterangan_pengirim,
orders.tanggal AS tanggal_order,
orders.note AS note_order,
orders.expedisi AS ekspedisi_order,
orders.paket AS paket_order,
orders.berat AS berat_order,
orders.ongkir AS ongkir_order,
orders.asuransi AS asuransi_order,
orders.keterangan AS keterangan_order,
orders.nominal AS nominal_order,
orders.diskon AS diskon_order,
orders.total_order AS totalorder,
orders.status_bayar AS st_bayar,
orders.tanggal_bayar AS tanggal_bayar,
orders.nominal_bayar AS nominal_bayar,
orders.sisa_bayar AS sisa_bayar,
orders.bank AS bank_order,
orders.no_resi AS resi,
orders.status_resi AS st_resi,
orders.toko AS toko,
orders.created_by AS created_by,
orders.created_date AS created_date,
orders.pemesan AS pemesan,
orders.kepada AS kepada,
orders.pengirim AS pengirim,
bank.rekening AS rekening,
bank.nama AS nama,
bank.bank AS bank,
orders.status_print AS status_print,
orders.cs
FROM
	(
		(
			(
				`orders`
				JOIN `customer` ON (
					(
						`orders`.`pemesan` = `customer`.`id`
					)
				)
			)
			JOIN `supplier` ON (
				(
					`orders`.`pengirim` = `supplier`.`id`
				)
			)
		)
		JOIN `bank` ON (
			(
				`orders`.`bank` = `bank`.`id`
			)
		)
	) ;

-- ----------------------------
-- View structure for v_report
-- ----------------------------
DROP VIEW IF EXISTS `v_report`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_report` AS SELECT
	tanggal AS tanggal,
	DAYNAME(tanggal) AS nama_hari,
	CASE DAYOFWEEK(tanggal)
				WHEN 1 THEN 'Minggu'
				WHEN 2 THEN 'Senin'
				WHEN 3 THEN 'Selasa'
				WHEN 4 THEN 'Rabu'
				WHEN 5 THEN 'Kamis'
				WHEN 6 THEN 'Jumat'
				WHEN 7 THEN 'Sabtu'
	END AS nama_hari_indo,
	DAY (tanggal) AS hari,
	MONTH (tanggal) AS bulan,
	YEAR (tanggal) AS tahun,
	SUM(gross_sales) AS gross_sales,
	SUM(net_sales) AS net_sales,
	SUM(expenses) AS expenses,
	SUM(transaksi) AS transaksi,
	SUM(item_terjual) AS total_produk,
	SUM(ongkir) AS ongkir,
	SUM(diskon) AS diskon,
	SUM(harga_beli) AS harga_beli,
	SUM(net_sales) - SUM(harga_beli) AS gross_profit,
	SUM(net_sales) - SUM(harga_beli) - SUM(expenses) AS net_profit,
	toko
FROM
	report 
GROUP BY
tanggal ;

-- ----------------------------
-- View structure for v_sanksi
-- ----------------------------
DROP VIEW IF EXISTS `v_sanksi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_sanksi` AS SELECT
sanksi.id,
sanksi.tanggal,
sanksi.karyawan,
sanksi.punishment,
sanksi.nominal,
sanksi.created_by,
DAY(sanksi.created_date) AS tgl,
MONTH(sanksi.created_date) AS bulan,
YEAR(sanksi.created_date) AS tahun,
sanksi.waktu,
auth.nama,
auth.username,
punishment.keterangan,
punishment.sanksi,
punishment.jumlahwaktusanksi,
punishment.satuanwaktu,
sanksi.toko
FROM
sanksi
INNER JOIN auth ON sanksi.karyawan = auth.id
INNER JOIN punishment ON sanksi.punishment = punishment.id ;
SET FOREIGN_KEY_CHECKS=1;
