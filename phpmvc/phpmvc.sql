/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : phpmvc

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-07-21 04:13:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `nrp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES ('1', 'Jodie Branch', '1909790749', 'jodiebranch@gmail.com', 'Guru');
INSERT INTO `mahasiswa` VALUES ('2', 'Victoria Hawkins', '3648611739', 'victoriahawkins@gmail.com', 'Dokter');
INSERT INTO `mahasiswa` VALUES ('3', 'Tobias Stokes', '2513686756', 'tobiasstokes@gmail.com', 'Tentara');
INSERT INTO `mahasiswa` VALUES ('4', 'Omar Dodson', '1622598871', 'omardodson@gmail.com', 'Polisi');
INSERT INTO `mahasiswa` VALUES ('5', 'Sadie Lang', '571934395', 'sadielang@gmail.com', 'Pilot');
INSERT INTO `mahasiswa` VALUES ('6', 'Courtney Winters', '7991875669', 'courtneywinters@gmail.com', 'Pramugari');
INSERT INTO `mahasiswa` VALUES ('7', 'Cesar Velez', '8243575467', 'cesarvelez@gmail.com', 'Pemadam Kebakaran');
INSERT INTO `mahasiswa` VALUES ('8', 'Audrey Compton', '7242250636', 'audreycompton@gmail.com', 'Pembersih Jendela Gedung');
INSERT INTO `mahasiswa` VALUES ('9', 'Rachael House', '1480527084', 'rachaelhouse@gmail.com', 'Nelayan');
INSERT INTO `mahasiswa` VALUES ('10', 'Paige Bolton', '5675883820', 'paigebolton@gmail.com', 'Sopir');
INSERT INTO `mahasiswa` VALUES ('11', 'Rick Floyd', '3937838156', 'rickfloyd@gmail.com', 'Pemasang Atap');
INSERT INTO `mahasiswa` VALUES ('12', 'Hannah Curtis', '2661539626', 'hannahcurtis@gmail.com', 'Pekerja Konstruksi');
INSERT INTO `mahasiswa` VALUES ('13', 'Lina Blevins', '1494183970', 'linablevins@gmail.com', 'Para Penebang Pohon');
INSERT INTO `mahasiswa` VALUES ('14', 'Antonia Bradford', '9486301280', 'antoniabradford@gmail.com', 'Lineman');
INSERT INTO `mahasiswa` VALUES ('15', 'Theodore Alvarado', '2948954797', 'theodorealvarado@gmail.com', 'Pemain Sirkus');
INSERT INTO `mahasiswa` VALUES ('16', 'Cory Brown', '6285870454', 'corybrown@gmail.com', 'Stuntman');
INSERT INTO `mahasiswa` VALUES ('17', 'Von Gilmore', '2582488183', 'vongilmore@gmail.com', 'Pilot Di Daerah Terpencil');
INSERT INTO `mahasiswa` VALUES ('18', 'Alisa Sanford', '4054829864', 'alisasanford@gmail.com', 'Pendamping Pendaki Gunung Evrest');
INSERT INTO `mahasiswa` VALUES ('19', 'Eliseo Carrillo', '2526685076', 'eliseocarrillo@gmail.com', 'Smoke Jumpers');
INSERT INTO `mahasiswa` VALUES ('20', 'Gail Bender', '468936097', 'gailbender@gmail.com', 'Tukang Las di Bawah Laut');
