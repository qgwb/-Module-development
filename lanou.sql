/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50720
Source Host           : localhost:3306
Source Database       : lanou

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2018-03-28 21:07:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for citizen
-- ----------------------------
DROP TABLE IF EXISTS `citizen`;
CREATE TABLE `citizen` (
  `Cit_ID` varchar(255) NOT NULL,
  `Cit_name` varchar(255) DEFAULT NULL,
  `Cit_phone` varchar(255) DEFAULT NULL,
  `Cit_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Cit_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of citizen
-- ----------------------------
INSERT INTO `citizen` VALUES ('111', '金浩楠', '15858267897', 'zucc');
INSERT INTO `citizen` VALUES ('112', '蒋家骏', '15858266626', '蔡马新村');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `Order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cit_ID` varchar(255) DEFAULT NULL,
  `Rec_ID` varchar(255) DEFAULT NULL,
  `Type_ID` varchar(255) DEFAULT NULL,
  `Typedetail_ID` varchar(255) DEFAULT NULL,
  `Order_money` double DEFAULT NULL,
  `Order_time` varchar(255) DEFAULT NULL,
  `Order_other` varchar(255) DEFAULT NULL,
  `Order_state` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Order_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('1', '112', '222', '2001', '3002', '2', '2018-01-19', '废纸箱', '交易成功');
INSERT INTO `order` VALUES ('2', '112', '222', '2002', '2201', null, '2018-02-28', null, '待回收');

-- ----------------------------
-- Table structure for order_type
-- ----------------------------
DROP TABLE IF EXISTS `order_type`;
CREATE TABLE `order_type` (
  `Type_ID` varchar(8) NOT NULL,
  `Typedetail_ID` varchar(255) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `count` double DEFAULT NULL,
  PRIMARY KEY (`Type_ID`,`Order_ID`,`Typedetail_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_type
-- ----------------------------
INSERT INTO `order_type` VALUES ('2001', '3002', '1', '4');

-- ----------------------------
-- Table structure for place
-- ----------------------------
DROP TABLE IF EXISTS `place`;
CREATE TABLE `place` (
  `Place_ID` varchar(8) NOT NULL,
  `Place_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Place_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of place
-- ----------------------------
INSERT INTO `place` VALUES ('1001', 'zucc');
INSERT INTO `place` VALUES ('1002', '蔡马新村');

-- ----------------------------
-- Table structure for recycle
-- ----------------------------
DROP TABLE IF EXISTS `recycle`;
CREATE TABLE `recycle` (
  `Rec_ID` varchar(255) NOT NULL,
  `Rec_name` varchar(255) DEFAULT NULL,
  `Rec_phone` varchar(255) DEFAULT NULL,
  `Rec_placeID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Rec_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of recycle
-- ----------------------------
INSERT INTO `recycle` VALUES ('222', '厉佩强', '15858266626', '1001');
INSERT INTO `recycle` VALUES ('223', '黄鹏羽', '13966667777', '1002');

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `Type_id` int(8) NOT NULL,
  `Type_name` varchar(20) NOT NULL,
  PRIMARY KEY (`Type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('2001', '废纸');
INSERT INTO `type` VALUES ('2002', '废塑料');
INSERT INTO `type` VALUES ('2003', '废旧电池');
INSERT INTO `type` VALUES ('2004', '废金属');
INSERT INTO `type` VALUES ('2005', '小电器');
INSERT INTO `type` VALUES ('2006', '电视机');
INSERT INTO `type` VALUES ('2007', '电冰箱');
INSERT INTO `type` VALUES ('2008', '洗衣机');
INSERT INTO `type` VALUES ('2009', '空调');
INSERT INTO `type` VALUES ('2010', '电脑');
INSERT INTO `type` VALUES ('2011', '手机');
INSERT INTO `type` VALUES ('2012', '厨房五金');
INSERT INTO `type` VALUES ('2013', '报废车辆');
INSERT INTO `type` VALUES ('2014', '废旧纺织品');
INSERT INTO `type` VALUES ('2015', '其他');

-- ----------------------------
-- Table structure for typedetail
-- ----------------------------
DROP TABLE IF EXISTS `typedetail`;
CREATE TABLE `typedetail` (
  `Typedetail_id` int(8) NOT NULL,
  `Type_id` int(8) NOT NULL,
  `Typedetail_name` varchar(20) NOT NULL,
  `Typedetail_price` double(20,2) NOT NULL,
  `Typedetail_unit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Typedetail_id`),
  KEY `Type_id` (`Type_id`),
  CONSTRAINT `Type_id` FOREIGN KEY (`Type_id`) REFERENCES `type` (`Type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of typedetail
-- ----------------------------
INSERT INTO `typedetail` VALUES ('3001', '2001', '废报纸', '0.80', 'kg');
INSERT INTO `typedetail` VALUES ('3002', '2001', '废纸箱', '0.50', 'kg');
INSERT INTO `typedetail` VALUES ('3003', '2001', '废书纸', '0.60', 'kg');
INSERT INTO `typedetail` VALUES ('3011', '2002', '塑料瓶', '1.60', 'kg');
INSERT INTO `typedetail` VALUES ('3012', '2002', '薄膜/保鲜袋', '0.50', 'kg');
INSERT INTO `typedetail` VALUES ('3013', '2002', '塑料玩具', '0.50', 'kg');
INSERT INTO `typedetail` VALUES ('3014', '2002', '塑料容器', '0.50', 'kg');
INSERT INTO `typedetail` VALUES ('3015', '2002', '其他塑料制品', '0.10', 'kg');
INSERT INTO `typedetail` VALUES ('3021', '2003', '一次性电池', '0.10', '节');
INSERT INTO `typedetail` VALUES ('3022', '2003', '充电电池', '0.10', '节');
INSERT INTO `typedetail` VALUES ('3031', '2004', '废钢铁', '0.30', 'kg');
INSERT INTO `typedetail` VALUES ('3032', '2004', '铜制品', '10.00', 'kg');
INSERT INTO `typedetail` VALUES ('3033', '2004', '铜线铜缆', '7.00', 'kg');
INSERT INTO `typedetail` VALUES ('3034', '2004', '铁质易拉罐', '0.30', 'kg');
INSERT INTO `typedetail` VALUES ('3035', '2004', '铝制易拉罐', '0.06', '个');
INSERT INTO `typedetail` VALUES ('3036', '2004', '铝制品', '3.00', 'kg');
INSERT INTO `typedetail` VALUES ('3037', '2004', '铝合金', '2.00', 'kg');
INSERT INTO `typedetail` VALUES ('3038', '2004', '铝线铝缆', '2.00', 'kg');
INSERT INTO `typedetail` VALUES ('3039', '2004', '废不锈钢', '1.00', 'kg');
INSERT INTO `typedetail` VALUES ('3041', '2005', '传真机', '1.00', 'kg');
INSERT INTO `typedetail` VALUES ('3042', '2005', '激光打印机', '1.00', 'kg');
INSERT INTO `typedetail` VALUES ('3043', '2005', '喷墨打印机', '1.00', 'kg');
INSERT INTO `typedetail` VALUES ('3044', '2005', '针式打印机', '1.00', 'kg');
INSERT INTO `typedetail` VALUES ('3045', '2005', '复印机', '1.00', 'kg');
INSERT INTO `typedetail` VALUES ('3046', '2005', '电话座机', '0.60', 'kg');
INSERT INTO `typedetail` VALUES ('3047', '2005', 'MP3/MP4', '0.40', 'kg');
INSERT INTO `typedetail` VALUES ('3048', '2005', '电动麻将机', '5.00', '台');
INSERT INTO `typedetail` VALUES ('3049', '2005', 'DVD/音响设备', '0.40', 'kg');
INSERT INTO `typedetail` VALUES ('3050', '2005', '掌上/平板电脑', '0.40', 'kg');
INSERT INTO `typedetail` VALUES ('3051', '2005', '网络硬件设备', '0.40', 'kg');
INSERT INTO `typedetail` VALUES ('3052', '2005', '插线板', '0.40', 'kg');
INSERT INTO `typedetail` VALUES ('3053', '2005', '吹风机', '0.40', 'kg');
INSERT INTO `typedetail` VALUES ('3054', '2005', '取暖器', '0.40', 'kg');
INSERT INTO `typedetail` VALUES ('3055', '2005', '加湿器', '0.40', 'kg');
INSERT INTO `typedetail` VALUES ('3056', '2005', '相机/录像机', '0.40', 'kg');
INSERT INTO `typedetail` VALUES ('3061', '2006', '黑白CRT', '28.00', '台');
INSERT INTO `typedetail` VALUES ('3062', '2006', '彩色CRT', '28.00', '台');
INSERT INTO `typedetail` VALUES ('3063', '2006', '液晶', '13.00', '台');
INSERT INTO `typedetail` VALUES ('3064', '2006', 'CRT监视器', '32.00', '台');
INSERT INTO `typedetail` VALUES ('3065', '2006', '液晶监视器', '15.00', '台');
INSERT INTO `typedetail` VALUES ('3071', '2007', '冰箱', '38.00', '台');
INSERT INTO `typedetail` VALUES ('3072', '2007', '冰柜冷藏柜', '32.00', '台');
INSERT INTO `typedetail` VALUES ('3081', '2008', '波轮双缸', '35.00', '台');
INSERT INTO `typedetail` VALUES ('3082', '2008', '全自动', '35.00', '台');
INSERT INTO `typedetail` VALUES ('3083', '2008', '滚筒', '35.00', '台');
INSERT INTO `typedetail` VALUES ('3084', '2008', '单缸洗衣机', '14.00', '台');
INSERT INTO `typedetail` VALUES ('3085', '2008', '迷你型/脱水机', '14.00', '台');
INSERT INTO `typedetail` VALUES ('3091', '2009', '窗机', '70.00', '台');
INSERT INTO `typedetail` VALUES ('3092', '2009', '挂机', '70.00', '台');
INSERT INTO `typedetail` VALUES ('3093', '2009', '柜机', '70.00', '台');
INSERT INTO `typedetail` VALUES ('3101', '2010', 'CRT分体式电脑', '46.00', '台');
INSERT INTO `typedetail` VALUES ('3102', '2010', '液晶电脑(成套)', '34.00', '台');
INSERT INTO `typedetail` VALUES ('3103', '2010', '笔记本电脑', '30.00', '台');
INSERT INTO `typedetail` VALUES ('3104', '2010', '液晶一体机', '30.00', '台');
INSERT INTO `typedetail` VALUES ('3105', '2010', 'CRT显示器', '22.00', '台');
INSERT INTO `typedetail` VALUES ('3106', '2010', '液晶显示器', '10.00', '台');
INSERT INTO `typedetail` VALUES ('3107', '2010', '电脑主机', '20.00', '台');
INSERT INTO `typedetail` VALUES ('3111', '2011', '智能手机', '2.00', '台');
INSERT INTO `typedetail` VALUES ('3112', '2011', '普通手机', '2.00', '台');
INSERT INTO `typedetail` VALUES ('3113', '2011', '小灵通', '2.00', '台');
INSERT INTO `typedetail` VALUES ('3114', '2011', '对讲机', '2.00', '台');
INSERT INTO `typedetail` VALUES ('3115', '2011', '大哥大', '2.00', '台');
INSERT INTO `typedetail` VALUES ('3121', '2012', '电热水器', '0.20', 'kg');
INSERT INTO `typedetail` VALUES ('3122', '2012', '燃/煤气灶', '0.50', 'kg');
INSERT INTO `typedetail` VALUES ('3123', '2012', '水壶', '0.40', 'kg');
INSERT INTO `typedetail` VALUES ('3124', '2012', '燃气热水器', '0.80', 'kg');
INSERT INTO `typedetail` VALUES ('3125', '2012', '吸油烟机', '0.80', 'kg');
INSERT INTO `typedetail` VALUES ('3126', '2012', '消毒机/柜', '0.40', 'kg');
INSERT INTO `typedetail` VALUES ('3127', '2012', '其他厨房五金', '0.40', 'kg');
INSERT INTO `typedetail` VALUES ('3131', '2013', '报废摩托车', '80.00', '台');
INSERT INTO `typedetail` VALUES ('3132', '2013', '报废电动车', '40.00', '台');
INSERT INTO `typedetail` VALUES ('3133', '2013', '报废汽车', '300.00', '吨');
INSERT INTO `typedetail` VALUES ('3134', '2013', '废自行车', '0.30', 'kg');
INSERT INTO `typedetail` VALUES ('3135', '2013', '平衡车', '0.50', 'kg');
INSERT INTO `typedetail` VALUES ('3141', '2014', '废衣物', '0.30', 'kg');
INSERT INTO `typedetail` VALUES ('3142', '2014', '鞋帽', '0.30', 'kg');
INSERT INTO `typedetail` VALUES ('3143', '2014', '床上用品', '0.30', 'kg');
INSERT INTO `typedetail` VALUES ('3144', '2014', '地毯', '0.30', 'kg');
INSERT INTO `typedetail` VALUES ('3145', '2014', '其他纺织品', '0.30', 'kg');
INSERT INTO `typedetail` VALUES ('3151', '2015', '废玻璃瓶', '0.10', '个');
INSERT INTO `typedetail` VALUES ('3152', '2015', '废啤酒瓶', '0.10', '个');
INSERT INTO `typedetail` VALUES ('3153', '2015', '网线', '0.10', 'kg');
INSERT INTO `typedetail` VALUES ('3154', '2015', '橡胶制品', '1.00', '个');
