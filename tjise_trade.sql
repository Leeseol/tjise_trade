/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50558
Source Host           : localhost:3306
Source Database       : tjise_trade

Target Server Type    : MYSQL
Target Server Version : 50558
File Encoding         : 65001

Date: 2018-01-10 15:35:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `address_id` int(10) NOT NULL AUTO_INCREMENT,
  `address_name` varchar(100) NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of address
-- ----------------------------
INSERT INTO `address` VALUES ('1', '天津市大学软件学院2号楼');
INSERT INTO `address` VALUES ('2', '天津市大学软件学院1号楼');
INSERT INTO `address` VALUES ('3', '天津市大学软件学院3号楼');
INSERT INTO `address` VALUES ('4', '天津市大学软件学院4号楼');
INSERT INTO `address` VALUES ('5', '天津市大学软件学院5号楼');
INSERT INTO `address` VALUES ('6', '天津市大学软件学院6号楼');

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL,
  `admin_pwd` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '颜如月', '12345');
INSERT INTO `admin` VALUES ('3', '张三', '1234');

-- ----------------------------
-- Table structure for bigtype
-- ----------------------------
DROP TABLE IF EXISTS `bigtype`;
CREATE TABLE `bigtype` (
  `bigtype_id` int(10) NOT NULL AUTO_INCREMENT,
  `bigtype_name` varchar(100) NOT NULL,
  `bigtype_info` text NOT NULL,
  PRIMARY KEY (`bigtype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bigtype
-- ----------------------------
INSERT INTO `bigtype` VALUES ('1', '数码', '<p>数码电脑类电子产品</p>');
INSERT INTO `bigtype` VALUES ('2', '文体户外', '文体户外体育用具');
INSERT INTO `bigtype` VALUES ('3', '家具家电', '家具家电用品');
INSERT INTO `bigtype` VALUES ('4', '服装箱包', '各种服装箱包');
INSERT INTO `bigtype` VALUES ('5', '美容保健', '美容保健类产品');
INSERT INTO `bigtype` VALUES ('6', '文体', '<p>文体&nbsp; &nbsp; &nbsp;</p>');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `goods_id` int(10) NOT NULL AUTO_INCREMENT,
  `goods_img` varchar(100) NOT NULL,
  `goods_info` text NOT NULL,
  `goods_name` varchar(100) NOT NULL,
  `goods_price` varchar(100) NOT NULL,
  `goods_data` varchar(100) NOT NULL,
  `goods_ps` varchar(100) NOT NULL,
  `smalltype_id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `examine` varchar(100) DEFAULT NULL,
  `state` varchar(25) NOT NULL DEFAULT '在售',
  PRIMARY KEY (`goods_id`),
  KEY `smalltype_id` (`smalltype_id`),
  KEY `users_id` (`users_id`),
  CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`smalltype_id`) REFERENCES `smalltype` (`smalltype_id`),
  CONSTRAINT `goods_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('15', 'img/fendiye.jpg', '<p>露华浓粉底液30ml，就用了一次，因与肤质不符，原价165现70转出。</p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171105/15098630365226.jpg\" style=\"width: 800px; height: 600px;\"/></p>', '露华浓粉底液', '70', '', '3个月以内', '16', '2', '通过', '在售');
INSERT INTO `goods` VALUES ('16', 'img/liangfu1.jpg', '<p>&nbsp;<span style=\"font-family:微软雅黑, Microsoft YaHei;font-size:24px\"> &nbsp; &nbsp; 我沫凡的洗面奶噢---，要离校了，有需要的宝宝抓紧呦~</span></p><center><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099356746862.png\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099356744840.png\" style=\"\"/></p><p><span style=\"font-family:微软雅黑, Microsoft YaHei;font-size:24px\"></span><br/></p><p></p></center>', '美沫艾莫尔夜茉莉洗面奶', '50', '2017-07-29', '半年以内', '15', '2', '通过', '在售');
INSERT INTO `goods` VALUES ('17', 'img/2.jpg', '<p><span style=\"font-family:微软雅黑, Microsoft YaHei;font-size:18px\">\n &nbsp; &nbsp; &nbsp; 桃心木尤克里里，弦不压手，不打品，保护的很好，原价七八百，现120转出，欲购从速。</span></p>', '尤克里里', '120', '2016-06-01', '1-2年', '22', '2', '通过', '在售');
INSERT INTO `goods` VALUES ('18', 'img/heng10.png', '<p>\n    <span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><span style=\"font-size: 18px;\">水星家纺床上用品四件套，即将离校，能不带走就不带走，低价出售，就用过一次已经洗干净，家里开旅馆的宝宝可以入噢</span></span><br/>\n</p>\n<p>\n    <img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099372554412.png\" style=\"width:700px;height:700px\">\n</p>', '床上用品四件套', '30', '2017-09-22', '3个月以内', '11', '2', '通过', '在售');
INSERT INTO `goods` VALUES ('19', 'img/1509937616(1).jpg', '<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><span style=\"font-size: 18px;\">夏季连衣裙低价出售，本人160，92斤，穿s码，裙子很新，只穿了两次</span></span></p><center><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099379338746.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099379359486.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099379377495.jpg\" style=\"\"/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><span style=\"font-size: 18px;\"></span></span><br/></p><p></p><center>', '夏季连衣裙', '45', '2018-11-01', '1年以内', '12', '2', '通过', '在售');
INSERT INTO `goods` VALUES ('20', 'img/1509938167(1).jpg', '<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;\">25寸，真皮，保养得很好，85新，可放长款钱包和墨镜/化妆包等</span></p><center><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099385899376.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099385907897.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/1509938592259.jpg\" style=\"\"/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;\"></span><br/></p><p></p></center>', 'ALL IN BAG-BK&KL品牌专柜正品手提女包', '70', '2017-07-07', '1-2年', '14', '2', '通过', '在售');
INSERT INTO `goods` VALUES ('21', 'img/1509938792(1).jpg', '<p><span style=\"font-family:微软雅黑, Microsoft YaHei;font-size:18px\">红色绣格小包包，很百搭好看，喜欢的宝宝请致电，细节可详谈</span></p><center><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/1509939154371.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099391578090.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099391598659.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099391615541.jpg\" style=\"\"/></p><p><br/></p><center></center></center>', '2017新款欧美时尚丝绒小香风菱格链条女包绒面单肩斜挎迷你小方包', '35', '2017-10-19', '3个月以内', '14', '2', '通过', '在售');
INSERT INTO `goods` VALUES ('22', 'img/1509940072.jpg', '<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><span style=\"font-size: 18px;\">戴尔笔记本燃7000，95新，低价出售，游戏账号都卖了，笔记本也用不着了，有看中的联系吧，1T硬盘加128G固态，8G内存，鲁大师跑分25000+</span></span></p><center><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099404361014.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099404397709.jpg\" style=\"\"/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><span style=\"font-size: 18px;\"></span></span><br/></p><p></p></center>', '戴尔笔记本燃7000', '5000', '2017-09-27', '1年以内', '3', '2', '通过', '在售');
INSERT INTO `goods` VALUES ('23', 'img/1509945845(1).jpg', '<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><span style=\"font-size: 18px;\">小米头戴式耳机，3个月了，因去外地，可能会留在那里，能处理的就处理掉，95新，原件四五百，现低价出售，需要的朋友赶快联系</span></span></p><center><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099463659681.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099463694911.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099463713553.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099463742213.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099463768494.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099463788572.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099463813215.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099463833481.jpg\" style=\"\"/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><span style=\"font-size: 18px;\"></span></span><br/></p><center>', 'Xiaomi/小米 小米头戴式耳机 电脑耳机游戏音乐语音耳麦', '110', '2017-06-29', '半年以内', '6', '2', '通过', '在售');
INSERT INTO `goods` VALUES ('24', 'img/1509947064(1).jpg', '<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><span style=\"font-size: 18px;\"><span style=\"color: rgb(101, 101, 101); white-space: normal;\">用了一年多，保护的还不错，8成新，原价4000起，现540卖出，有意电联，急出！</span><span style=\"transition-duration: 260ms, initial, initial, initial, initial; transition-timing-function: linear, initial, initial, initial, initial; transition-delay: 0ms, initial, initial, initial, initial; white-space: normal; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><span style=\"transition-duration: 260ms, initial, initial, initial, initial; transition-timing-function: linear, initial, initial, initial, initial; transition-delay: 0ms, initial, initial, initial, initial; font-size: 18px;\"></span></span></span></span><br/><center><p><img src=\"http://localhost/tjise_trade/umeditor/php/upload/20171106/15099477619885.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099477633884.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099477653896.jpg\" style=\"\"/></p><p><br/></p></p></center>', 'Canon/佳能750D单反 蚂蚁摄影 EOS 18-55套机', '540', '2016-08-17', '1-2年', '7', '2', '通过', '在售');
INSERT INTO `goods` VALUES ('25', 'img/1509948045(1).jpg', '<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><span style=\"font-size: 18px;\">实木，95新，刚买没多久，因要离开学校工作而转出，有需要的朋友们请电联，只需10元~</span></span><br/></p><center><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099483359476.gif\">																							</p></center>', '桌上小书架寝室桌面置物简易大学生宿舍收纳床上用书柜迷你省空间', '10', '2017-09-12', '半年以内', '10', '2', '通过', '在售');
INSERT INTO `goods` VALUES ('26', 'img/1509948557(1).jpg', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 0.2em; line-height: 1; font-weight: 700; color: rgb(0, 0, 0); white-space: normal;\"><span style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); outline: 0px; vertical-align: middle; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;\"><a target=\"_blank\" href=\"http://undefined\" style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); outline: 0px; vertical-align: middle;\">Hasee/神舟 战神系列 Z7-KP7D2/GT/G1 GTX1060游戏本笔记本电脑</a>&nbsp;刚买没几个月，有需要的宝宝请致电，详情可以谈，价格可议，性能方面请看下图</span></p><center><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/1509949325351.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099493297580.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/1509949330419.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099493317777.jpg\" style=\"\"/></p><p><img src=\"http://10.96.129.26/tjise_trade/umeditor/php/upload/20171106/15099493338470.jpg\" style=\"\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 0.2em; line-height: 1; font-weight: 700; color: rgb(0, 0, 0); white-space: normal;\"><span style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); outline: 0px; vertical-align: middle; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;\"></span><br/></p><p></p><center>', 'Hasee/神舟 战神系列 Z7-KP7D2/GT/G1 GTX1060游戏本笔记本电脑', '5500', '2017-09-15', '1年以内', '3', '2', '通过', '下线');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `orders_id` int(10) NOT NULL AUTO_INCREMENT,
  `orders_state` varchar(100) DEFAULT NULL,
  `orders_data` varchar(100) DEFAULT NULL,
  `users_id` int(10) NOT NULL,
  `goods_id` int(10) NOT NULL,
  `pay_state` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`orders_id`),
  KEY `users_id` (`users_id`),
  KEY `goods_id` (`goods_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20171083 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('20171026', '已发货', '2017-11-16', '1', '15', '已付款');
INSERT INTO `orders` VALUES ('20171027', '已发货', '2017-11-06', '1', '15', '已付款');
INSERT INTO `orders` VALUES ('20171075', null, '2017-11-08', '2', '26', null);
INSERT INTO `orders` VALUES ('20171076', null, '2017-11-08', '2', '26', null);
INSERT INTO `orders` VALUES ('20171077', null, '2017-11-08', '2', '22', null);
INSERT INTO `orders` VALUES ('20171078', null, '2017-11-08', '1', '26', null);
INSERT INTO `orders` VALUES ('20171080', null, '2017-11-08', '2', '26', null);
INSERT INTO `orders` VALUES ('20171081', '未发货', '2017-11-08', '1', '25', null);
INSERT INTO `orders` VALUES ('20171082', '未发货', '2017-11-09', '1', '26', null);

-- ----------------------------
-- Table structure for smalltype
-- ----------------------------
DROP TABLE IF EXISTS `smalltype`;
CREATE TABLE `smalltype` (
  `smalltype_id` int(10) NOT NULL AUTO_INCREMENT,
  `smalltype_name` varchar(100) NOT NULL,
  `smalltype_info` text NOT NULL,
  `bigtype_id` int(10) NOT NULL,
  PRIMARY KEY (`smalltype_id`),
  KEY `bigtype_id` (`bigtype_id`),
  CONSTRAINT `smalltype_ibfk_1` FOREIGN KEY (`bigtype_id`) REFERENCES `bigtype` (`bigtype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of smalltype
-- ----------------------------
INSERT INTO `smalltype` VALUES ('3', '电脑', '<p>电脑</p>', '1');
INSERT INTO `smalltype` VALUES ('6', '外设', '<p>外部设备</p>', '1');
INSERT INTO `smalltype` VALUES ('7', '数码相机', '<p>数码相机</p>', '1');
INSERT INTO `smalltype` VALUES ('8', '游戏机', '游戏机设备', '1');
INSERT INTO `smalltype` VALUES ('9', '生活家电', '生活家电', '3');
INSERT INTO `smalltype` VALUES ('10', '柜子', '各种柜子', '3');
INSERT INTO `smalltype` VALUES ('11', '床上用品', '各种床垫', '3');
INSERT INTO `smalltype` VALUES ('12', '服装', '服装', '4');
INSERT INTO `smalltype` VALUES ('13', '鞋', '各类鞋', '4');
INSERT INTO `smalltype` VALUES ('14', '箱包', '各类箱包', '4');
INSERT INTO `smalltype` VALUES ('15', '护肤', '护肤产品', '5');
INSERT INTO `smalltype` VALUES ('16', '彩妆', '彩妆产品', '5');
INSERT INTO `smalltype` VALUES ('17', '香水', '各种香水', '5');
INSERT INTO `smalltype` VALUES ('18', '书籍', '各类书籍', '2');
INSERT INTO `smalltype` VALUES ('19', '健身器材', '各类健身器材', '2');
INSERT INTO `smalltype` VALUES ('22', '乐器', '各类乐器', '2');
INSERT INTO `smalltype` VALUES ('23', '体育用品', '各类体育用品', '2');
INSERT INTO `smalltype` VALUES ('24', '手表', '<p>手表</p>', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `users_id` int(10) NOT NULL AUTO_INCREMENT,
  `users_name` varchar(100) NOT NULL,
  `users_pwd` varchar(100) NOT NULL,
  `users_phone` varchar(100) NOT NULL,
  `users_mail` varchar(100) DEFAULT NULL,
  `users_photo` varchar(100) DEFAULT NULL,
  `address_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`users_id`),
  KEY `address_id` (`address_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '颜', '1234', '18222340168', '1808235575@qq.com', 'img/photo1.jpg', '1');
INSERT INTO `users` VALUES ('2', '李雪', '1234', '17822149545', '17822@qq.com', 'img/photo1.jpg', '6');
