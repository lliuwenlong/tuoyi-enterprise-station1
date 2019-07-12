SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

DROP TABLE IF EXISTS `#xyh#_abc`;
CREATE TABLE IF NOT EXISTS `#xyh#_abc` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `remark` varchar(50) DEFAULT '',
  `width` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `height` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `setting` varchar(200) NOT NULL DEFAULT '',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '类型',
  `num` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '调用数',
  `items` smallint(4) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#xyh#_abc` (`id`, `name`, `remark`, `width`, `height`, `setting`, `type`, `num`, `items`) VALUES(1, '首页幻灯', '首页', 722, 257, '<loop><li><a href=\"{$url}\"><img src=\"{$content}\" width=\"{$width}\" height=\"{$height}\" /></a></li></loop>', 2, 2, 2);

DROP TABLE IF EXISTS `#xyh#_abc_detail`;
CREATE TABLE IF NOT EXISTS `#xyh#_abc_detail` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL DEFAULT '',
  `content` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(200) NOT NULL DEFAULT '',
  `start_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `end_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `aid` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sort` smallint(5) NOT NULL DEFAULT '0',
  `status` tinyint(1) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#xyh#_abc_detail` (`id`, `title`, `content`, `url`, `start_time`, `end_time`, `aid`, `sort`, `status`) VALUES(1, '图片1', 'http://img9.xyhcms.com/banner/p1.jpg', '#', '2014-11-18 10:00:00', '2030-12-31 10:00:00', 1, 1, 1);
INSERT INTO `#xyh#_abc_detail` (`id`, `title`, `content`, `url`, `start_time`, `end_time`, `aid`, `sort`, `status`) VALUES(2, '图片2', 'http://img9.xyhcms.com/banner/p2.jpg', '#', '2014-11-18 10:00:00', '2030-12-31 10:00:00', 1, 1, 1);


DROP TABLE IF EXISTS `#xyh#_active`;
CREATE TABLE IF NOT EXISTS `#xyh#_active` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '类型',
  `code` varchar(11) NOT NULL DEFAULT '' COMMENT '激活码',
  `expire` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `#xyh#_admin`;
CREATE TABLE IF NOT EXISTS `#xyh#_admin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '登录名',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `encrypt` varchar(6) NOT NULL DEFAULT '',
  `department` varchar(255) DEFAULT '' COMMENT '部门',
  `realname` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `user_type` tinyint(4) NOT NULL DEFAULT '0',
  `login_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `login_ip` varchar(30) NOT NULL DEFAULT '' COMMENT '登录IP',
  `is_lock` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '锁定状态',
  `login_num` int(11) DEFAULT '0' COMMENT '登录次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='网站后台管理员表';

DROP TABLE IF EXISTS `#xyh#_announce`;
CREATE TABLE IF NOT EXISTS `#xyh#_announce` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `start_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '开始时间',
  `end_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '结束时间',
  `post_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '添加时间',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#xyh#_announce` (`id`, `title`, `content`, `start_time`, `end_time`, `post_time`, `status`) VALUES(1, '手机版网站开通', '<p>手机版网站开通，用手机版网站开通手机访问http://demo.0871k.com 即可访问手机站</p>', '1970-01-01 08:00:00', '2018-04-30 08:36:00', '2014-04-02 08:36:54', 1);

DROP TABLE IF EXISTS `#xyh#_area`;
CREATE TABLE IF NOT EXISTS `#xyh#_area` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `sname` varchar(10) NOT NULL DEFAULT '' COMMENT '简称',
  `ename` varchar(50) NOT NULL DEFAULT '',
  `pid` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1, '北京市', '北京', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2, '上海市', '上海', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3, '天津市', '天津', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(4, '重庆市', '重庆', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(5, '广东省', '广东', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6, '福建省', '福建', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(7, '浙江省', '浙江', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(8, '江苏省', '江苏', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(9, '山东省', '山东', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(10, '辽宁省', '辽宁', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(11, '江西省', '江西', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(12, '四川省', '四川', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(13, '陕西省', '陕西', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(14, '湖北省', '湖北', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(15, '河南省', '河南', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(16, '河北省', '河北', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(17, '山西省', '山西', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(18, '内蒙古', '内蒙古', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(19, '吉林省', '吉林', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(20, '黑龙江', '黑龙江', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(21, '安徽省', '安徽', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(22, '湖南省', '湖南', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(23, '广西', '广西', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(24, '海南省', '海南', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(25, '云南省', '云南', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(26, '贵州省', '贵州', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(27, '西藏', '西藏', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(28, '甘肃省', '甘肃', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(29, '宁夏区', '宁夏区', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(30, '青海省', '青海', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(31, '新疆', '新疆', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(32, '香港', '香港', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(33, '澳门', '澳门', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(34, '台湾省', '台湾', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(60, '海外', '海外', '', 0, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(101, '东城区', '东城区', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(102, '西城区', '西城区', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(103, '崇文区', '崇文区', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(104, '宣武区', '宣武区', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(105, '朝阳区', '朝阳区', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(106, '海淀区', '海淀区', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(107, '丰台区', '丰台区', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(108, '石景山区', '石景山区', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(109, '门头沟区', '门头沟区', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(110, '房山区', '房山区', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(111, '通州区', '通区', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(112, '顺义区', '顺义区', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(113, '昌平区', '昌平区', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(114, '大兴区', '大兴区', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(115, '平谷县', '平谷县', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(116, '怀柔县', '怀柔县', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(117, '密云县', '密云县', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(118, '延庆县', '延庆县', '', 1, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(201, '黄浦区', '黄浦区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(202, '卢湾区', '卢湾区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(203, '徐汇区', '徐汇区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(204, '长宁区', '长宁区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(205, '静安区', '静安区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(206, '普陀区', '普陀区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(207, '闸北区', '闸北区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(208, '虹口区', '虹口区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(209, '杨浦区', '杨浦区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(210, '宝山区', '宝山区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(211, '闵行区', '闵行区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(212, '嘉定区', '嘉定区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(213, '浦东新区', '浦东新区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(214, '松江区', '松江区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(215, '金山区', '金山区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(216, '青浦区', '青浦区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(217, '南汇区', '南汇区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(218, '奉贤区', '奉贤区', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(219, '崇明县', '崇明县', '', 2, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(301, '和平区', '和平区', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(302, '河东区', '河东区', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(303, '河西区', '河西区', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(304, '南开区', '南开区', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(305, '河北区', '河北区', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(306, '红桥区', '红桥区', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(307, '塘沽区', '塘沽区', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(308, '汉沽区', '汉沽区', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(309, '大港区', '大港区', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(310, '东丽区', '东丽区', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(311, '西青区', '西青区', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(312, '北辰区', '北辰区', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(313, '津南区', '津南区', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(314, '武清区', '武清区', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(315, '宝坻区', '宝坻区', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(316, '静海县', '静海县', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(317, '宁河县', '宁河县', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(318, '蓟县', '蓟县', '', 3, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(401, '渝中区', '渝中区', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(402, '大渡口区', '大渡口区', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(403, '江北区', '江北区', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(404, '沙坪坝区', '沙坪坝区', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(405, '九龙坡区', '九龙坡区', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(406, '南岸区', '南岸区', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(407, '北碚区', '北碚区', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(408, '万盛区', '万盛区', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(409, '双桥区', '双桥区', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(410, '渝北区', '渝北区', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(411, '巴南区', '巴南区', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(412, '万州区', '万区', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(413, '涪陵区', '涪陵区', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(414, '黔江区', '黔江区', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(415, '永川市', '永川', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(416, '合川市', '合川', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(417, '江津市', '江津', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(418, '南川市', '南川', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(419, '长寿县', '长寿县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(420, '綦江县', '綦江县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(421, '潼南县', '潼南县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(422, '荣昌县', '荣昌县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(423, '璧山县', '璧山县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(424, '大足县', '大足县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(425, '铜梁县', '铜梁县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(426, '梁平县', '梁平县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(427, '城口县', '城口县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(428, '垫江县', '垫江县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(429, '武隆县', '武隆县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(430, '丰都县', '丰都县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(431, '奉节县', '奉节县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(432, '开县', '开县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(433, '云阳县', '云阳县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(434, '忠县', '忠县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(435, '巫溪县', '巫溪县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(436, '巫山县', '巫山县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(437, '石柱县', '石柱县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(438, '秀山县', '秀山县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(439, '酉阳县', '酉阳县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(440, '彭水县', '彭水县', '', 4, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(501, '广州市', '广州', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(502, '深圳市', '深圳', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(503, '珠海市', '珠海', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(504, '汕头市', '汕头', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(505, '韶关市', '韶关', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(506, '河源市', '河源', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(507, '梅州市', '梅州', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(508, '惠州市', '惠州', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(509, '汕尾市', '汕尾', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(510, '东莞市', '东莞', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(511, '中山市', '中山', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(512, '江门市', '江门', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(513, '佛山市', '佛山', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(514, '阳江市', '阳江', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(515, '湛江市', '湛江', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(516, '茂名市', '茂名', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(517, '肇庆市', '肇庆', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(518, '清远市', '清远', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(519, '潮州市', '潮州', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(520, '揭阳市', '揭阳', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(521, '云浮市', '云浮', '', 5, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(601, '福州市', '福州', '', 6, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(602, '厦门市', '厦门', '', 6, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(603, '三明市', '三明', '', 6, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(604, '莆田市', '莆田', '', 6, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(605, '泉州市', '泉州', '', 6, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(606, '漳州市', '漳州', '', 6, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(607, '南平市', '南平', '', 6, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(608, '龙岩市', '龙岩', '', 6, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(609, '宁德市', '宁德', '', 6, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(701, '杭州市', '杭州', '', 7, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(702, '宁波市', '宁波', '', 7, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(703, '温州市', '温州', '', 7, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(704, '嘉兴市', '嘉兴', '', 7, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(705, '湖州市', '湖州', '', 7, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(706, '绍兴市', '绍兴', '', 7, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(707, '金华市', '金华', '', 7, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(708, '衢州市', '衢州', '', 7, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(709, '舟山市', '舟山', '', 7, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(710, '台州市', '台州', '', 7, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(711, '丽水市', '丽水', '', 7, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(801, '南京市', '南京', '', 8, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(802, '徐州市', '徐州', '', 8, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(803, '连云港市', '连云港', '', 8, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(804, '淮安市', '淮安', '', 8, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(805, '宿迁市', '宿迁', '', 8, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(806, '盐城市', '盐城', '', 8, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(807, '扬州市', '扬州', '', 8, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(808, '泰州市', '泰州', '', 8, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(809, '南通市', '南通', '', 8, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(810, '镇江市', '镇江', '', 8, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(811, '常州市', '常州', '', 8, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(812, '无锡市', '无锡', '', 8, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(813, '苏州市', '苏州', '', 8, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(901, '济南市', '济南', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(902, '青岛市', '青岛', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(903, '淄博市', '淄博', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(904, '枣庄市', '枣庄', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(905, '东营市', '东营', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(906, '潍坊市', '潍坊', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(907, '烟台市', '烟台', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(908, '威海市', '威海', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(909, '济宁市', '济宁', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(910, '泰安市', '泰安', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(911, '日照市', '日照', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(912, '莱芜市', '莱芜', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(913, '德州市', '德州', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(914, '临沂市', '临沂', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(915, '聊城市', '聊城', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(916, '滨州市', '滨州', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(917, '菏泽市', '菏泽', '', 9, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1001, '沈阳市', '沈阳', '', 10, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1002, '大连市', '大连', '', 10, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1003, '鞍山市', '鞍山', '', 10, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1004, '抚顺市', '抚顺', '', 10, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1005, '本溪市', '本溪', '', 10, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1006, '丹东市', '丹东', '', 10, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1007, '锦州市', '锦州', '', 10, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1008, '葫芦岛市', '葫芦岛', '', 10, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1009, '营口市', '营口', '', 10, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1010, '盘锦市', '盘锦', '', 10, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1011, '阜新市', '阜新', '', 10, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1012, '辽阳市', '辽阳', '', 10, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1013, '铁岭市', '铁岭', '', 10, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1014, '朝阳市', '朝阳', '', 10, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1101, '南昌市', '南昌', '', 11, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1102, '景德镇市', '景德镇', '', 11, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1103, '萍乡市', '萍乡', '', 11, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1104, '新余市', '新余', '', 11, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1105, '九江市', '九江', '', 11, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1106, '鹰潭市', '鹰潭', '', 11, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1107, '赣州市', '赣州', '', 11, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1108, '吉安市', '吉安', '', 11, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1109, '宜春市', '宜春', '', 11, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1110, '抚州市', '抚州', '', 11, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1111, '上饶市', '上饶', '', 11, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1201, '成都市', '成都', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1202, '自贡市', '自贡', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1203, '攀枝花市', '攀枝花', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1204, '泸州市', '泸州', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1205, '德阳市', '德阳', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1206, '绵阳市', '绵阳', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1207, '广元市', '广元', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1208, '遂宁市', '遂宁', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1209, '内江市', '内江', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1210, '乐山市', '乐山', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1211, '南充市', '南充', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1212, '宜宾市', '宜宾', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1213, '广安市', '广安', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1214, '达州市', '达州', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1215, '巴中市', '巴中', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1216, '雅安市', '雅安', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1217, '眉山市', '眉山', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1218, '资阳市', '资阳', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1219, '阿坝州', '阿坝', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1220, '甘孜州', '甘孜', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1221, '凉山州', '凉山', '', 12, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3114, '西安市', '西安', '', 13, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1302, '铜川市', '铜川', '', 13, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1303, '宝鸡市', '宝鸡', '', 13, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1304, '咸阳市', '咸阳', '', 13, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1305, '渭南市', '渭南', '', 13, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1306, '延安市', '延安', '', 13, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1307, '汉中市', '汉中', '', 13, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1308, '榆林市', '榆林', '', 13, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1309, '安康市', '安康', '', 13, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1310, '商洛地区', '商洛地区', '', 13, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1401, '武汉市', '武汉', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1402, '黄石市', '黄石', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1403, '襄樊市', '襄樊', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1404, '十堰市', '十堰', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1405, '荆州市', '荆州', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1406, '宜昌市', '宜昌', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1407, '荆门市', '荆门', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1408, '鄂州市', '鄂州', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1409, '孝感市', '孝感', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1410, '黄冈市', '黄冈', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1411, '咸宁市', '咸宁', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1412, '随州市', '随州', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1413, '仙桃市', '仙桃', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1414, '天门市', '天门', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1415, '潜江市', '潜江', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1416, '神农架', '神农架', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1417, '恩施州', '恩施', '', 14, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1501, '郑州市', '郑州', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1502, '开封市', '开封', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1503, '洛阳市', '洛阳', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1504, '平顶山市', '平顶山', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1505, '焦作市', '焦作', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1506, '鹤壁市', '鹤壁', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1507, '新乡市', '新乡', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1508, '安阳市', '安阳', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1509, '濮阳市', '濮阳', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1510, '许昌市', '许昌', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1511, '漯河市', '漯河', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1512, '三门峡市', '三门峡', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1513, '南阳市', '南阳', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1514, '商丘市', '商丘', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1515, '信阳市', '信阳', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1516, '周口市', '周口', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1517, '驻马店市', '驻马店', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1518, '济源市', '济源', '', 15, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1601, '石家庄市', '石家庄', '', 16, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1602, '唐山市', '唐山', '', 16, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1603, '秦皇岛市', '秦皇岛', '', 16, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1604, '邯郸市', '邯郸', '', 16, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1605, '邢台市', '邢台', '', 16, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1606, '保定市', '保定', '', 16, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1607, '张家口市', '张家口', '', 16, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1608, '承德市', '承德', '', 16, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1609, '沧州市', '沧州', '', 16, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1610, '廊坊市', '廊坊', '', 16, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1611, '衡水市', '衡水', '', 16, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1701, '太原市', '太原', '', 17, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1702, '大同市', '大同', '', 17, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1703, '阳泉市', '阳泉', '', 17, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1704, '长治市', '长治', '', 17, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1705, '晋城市', '晋城', '', 17, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1706, '朔州市', '朔州', '', 17, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1707, '晋中市', '晋中', '', 17, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1708, '忻州市', '忻州', '', 17, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1709, '临汾市', '临汾', '', 17, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1710, '运城市', '运城', '', 17, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1711, '吕梁地区', '吕梁地区', '', 17, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1801, '呼和浩特', '呼和浩特', '', 18, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1802, '包头市', '包头', '', 18, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1803, '乌海市', '乌海', '', 18, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1804, '赤峰市', '赤峰', '', 18, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1805, '通辽市', '通辽', '', 18, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1806, '鄂尔多斯', '鄂尔多斯', '', 18, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1807, '乌兰察布', '乌兰察布', '', 18, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1808, '锡林郭勒', '锡林郭勒', '', 18, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1809, '呼伦贝尔', '呼伦贝尔', '', 18, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1810, '巴彦淖尔', '巴彦淖尔', '', 18, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1811, '阿拉善盟', '阿拉善盟', '', 18, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1812, '兴安盟', '兴安盟', '', 18, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1901, '长春市', '长春', '', 19, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1902, '吉林市', '吉林', '', 19, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1903, '四平市', '四平', '', 19, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1904, '辽源市', '辽源', '', 19, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1905, '通化市', '通化', '', 19, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1906, '白山市', '白山', '', 19, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1907, '松原市', '松原', '', 19, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1908, '白城市', '白城', '', 19, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(1909, '延边州', '延边', '', 19, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2001, '哈尔滨市', '哈尔滨', '', 20, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2002, '齐齐哈尔', '齐齐哈尔', '', 20, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2003, '鹤岗市', '鹤岗', '', 20, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2004, '双鸭山市', '双鸭山', '', 20, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2005, '鸡西市', '鸡西', '', 20, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2006, '大庆市', '大庆', '', 20, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2007, '伊春市', '伊春', '', 20, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2008, '牡丹江市', '牡丹江', '', 20, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2009, '佳木斯市', '佳木斯', '', 20, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2010, '七台河市', '七台河', '', 20, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2011, '黑河市', '黑河', '', 20, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2012, '绥化市', '绥化', '', 20, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2013, '大兴安岭', '大兴安岭', '', 20, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2101, '合肥市', '合肥', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2102, '芜湖市', '芜湖', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2103, '蚌埠市', '蚌埠', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2104, '淮南市', '淮南', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2105, '马鞍山市', '马鞍山', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2106, '淮北市', '淮北', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2107, '铜陵市', '铜陵', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2108, '安庆市', '安庆', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2109, '黄山市', '黄山', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2110, '滁州市', '滁州', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2111, '阜阳市', '阜阳', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2112, '宿州市', '宿州', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2113, '巢湖市', '巢湖', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2114, '六安市', '六安', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2115, '亳州市', '亳州', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2116, '宣城市', '宣城', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2117, '池州市', '池州', '', 21, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2201, '长沙市', '长沙', '', 22, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2202, '株州市', '株州', '', 22, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2203, '湘潭市', '湘潭', '', 22, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2204, '衡阳市', '衡阳', '', 22, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2205, '邵阳市', '邵阳', '', 22, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2206, '岳阳市', '岳阳', '', 22, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2207, '常德市', '常德', '', 22, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2208, '张家界市', '张家界', '', 22, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2209, '益阳市', '益阳', '', 22, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2210, '郴州市', '郴州', '', 22, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2211, '永州市', '永州', '', 22, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2212, '怀化市', '怀化', '', 22, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2213, '娄底市', '娄底', '', 22, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2214, '湘西州', '湘西', '', 22, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2301, '南宁市', '南宁', '', 23, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2302, '柳州市', '柳州', '', 23, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2303, '桂林市', '桂林', '', 23, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2304, '梧州市', '梧州', '', 23, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2305, '北海市', '北海', '', 23, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2306, '防城港市', '防城港', '', 23, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2307, '钦州市', '钦州', '', 23, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2308, '贵港市', '贵港', '', 23, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2309, '玉林市', '玉林', '', 23, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2310, '南宁地区', '南宁地区', '', 23, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2311, '柳州地区', '柳地区', '', 23, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2312, '贺州地区', '贺地区', '', 23, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2313, '百色地区', '百色地区', '', 23, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2314, '河池地区', '河池地区', '', 23, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2401, '海口市', '海口', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2402, '三亚市', '三亚', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2403, '五指山市', '五指山', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2404, '琼海市', '琼海', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2405, '儋州市', '儋州', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2406, '琼山市', '琼山', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2407, '文昌市', '文昌', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2408, '万宁市', '万宁', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2409, '东方市', '东方', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2410, '澄迈县', '澄迈县', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2411, '定安县', '定安县', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2412, '屯昌县', '屯昌县', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2413, '临高县', '临高县', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2414, '白沙县', '白沙县', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2415, '昌江县', '昌江县', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2416, '乐东县', '乐东县', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2417, '陵水县', '陵水县', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2418, '保亭县', '保亭县', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2419, '琼中县', '琼中县', '', 24, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2501, '昆明市', '昆明', '', 25, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2502, '曲靖市', '曲靖', '', 25, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2503, '玉溪市', '玉溪', '', 25, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2504, '保山市', '保山', '', 25, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2505, '昭通市', '昭通', '', 25, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2506, ' 普洱市', ' 普洱', '', 25, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2507, '临沧市', '临沧', '', 25, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2508, '丽江市', '丽江', '', 25, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2509, '文山州', '文山', '', 25, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2510, '红河州', '红河', '', 25, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2511, '西双版纳', '西双版纳', '', 25, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2512, '楚雄州', '楚雄', '', 25, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2513, '大理州', '大理', '', 25, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2514, '德宏州', '德宏', '', 25, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2515, '怒江州', '怒江', '', 25, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2516, '迪庆州', '迪庆', '', 25, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2601, '贵阳市', '贵阳', '', 26, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2602, '六盘水市', '六盘水', '', 26, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2603, '遵义市', '遵义', '', 26, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2604, '安顺市', '安顺', '', 26, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2605, '铜仁地区', '铜仁地区', '', 26, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2606, '毕节地区', '毕节地区', '', 26, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2607, '黔西南州', '黔西南', '', 26, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2608, '黔东南州', '黔东南', '', 26, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2609, '黔南州', '黔南', '', 26, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2701, '拉萨市', '拉萨', '', 27, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2702, '那曲地区', '那曲地区', '', 27, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2703, '昌都地区', '昌都地区', '', 27, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2704, '山南地区', '山南地区', '', 27, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2705, '日喀则', '日喀则', '', 27, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2706, '阿里地区', '阿里地区', '', 27, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2707, '林芝地区', '林芝地区', '', 27, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2801, '兰州市', '兰州', '', 28, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2802, '金昌市', '金昌', '', 28, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2803, '白银市', '白银', '', 28, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2804, '天水市', '天水', '', 28, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2805, '嘉峪关市', '嘉峪关', '', 28, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2806, '武威市', '武威', '', 28, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2807, '定西地区', '定西地区', '', 28, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2808, '平凉地区', '平凉地区', '', 28, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2809, '庆阳地区', '庆阳地区', '', 28, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2810, '陇南地区', '陇南地区', '', 28, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2811, '张掖地区', '张掖地区', '', 28, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2812, '酒泉地区', '酒泉地区', '', 28, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2813, '甘南州', '甘南', '', 28, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2814, '临夏州', '临夏', '', 28, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2901, '银川市', '银川', '', 29, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2902, '石嘴山市', '石嘴山', '', 29, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2903, '吴忠市', '吴忠', '', 29, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(2904, '固原市', '固原', '', 29, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3001, '西宁市', '西宁', '', 30, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3002, '海东地区', '海东地区', '', 30, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3003, '海北州', '海北', '', 30, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3004, '黄南州', '黄南', '', 30, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3005, '海南州', '海南', '', 30, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3006, '果洛州', '果洛', '', 30, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3007, '玉树州', '玉树', '', 30, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3008, '海西州', '海西', '', 30, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3101, '乌鲁木齐', '乌鲁木齐', '', 31, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3102, '克拉玛依', '克拉玛依', '', 31, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3103, '石河子市', '石河子', '', 31, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3104, '吐鲁番', '吐鲁番', '', 31, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3105, '哈密地区', '哈密地区', '', 31, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3106, '和田地区', '和田地区', '', 31, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3107, '阿克苏', '阿克苏', '', 31, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3108, '喀什地区', '喀什地区', '', 31, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3109, '克孜勒苏', '克孜勒苏', '', 31, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3110, '巴音郭楞', '巴音郭楞', '', 31, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3111, '昌吉州', '昌吉', '', 31, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3112, '博尔塔拉', '博尔塔拉', '', 31, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3113, '伊犁州', '伊犁', '', 31, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3201, '香港岛', '香港岛', '', 32, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3202, '九龙', '九龙', '', 32, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3203, '新界', '新界', '', 32, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3301, '澳门半岛', '澳门半岛', '', 33, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3302, '离岛', '离岛', '', 33, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3401, '台北市', '台北', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3402, '高雄市', '高雄', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3403, '台南市', '台南', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3404, '台中市', '台中', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3405, '金门县', '金门县', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3406, '南投县', '南投县', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3407, '基隆市', '基隆', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3408, '新竹市', '新竹', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3409, '嘉义市', '嘉义', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3410, '新北市', '新北', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3411, '宜兰县', '宜兰县', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3412, '新竹县', '新竹县', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3413, '桃园县', '桃园县', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3414, '苗栗县', '苗栗县', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3415, '彰化县', '彰化县', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3416, '嘉义县', '嘉义县', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3417, '云林县', '云林县', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3418, '屏东县', '屏东县', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3419, '台东县', '台东县', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3420, '花莲县', '花莲县', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(3421, '澎湖县', '澎湖县', '', 34, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6001, '美国', '美国', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6002, '英国', '英国', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6003, '法国', '法国', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6004, '俄罗斯', '俄罗斯', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6005, '加拿大', '加拿大', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6006, '巴西', '巴西', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6007, '澳大利亚', '澳大利亚', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6008, '印尼', '印尼', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6009, '马来西亚', '马来西亚', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6010, '新加坡', '新加坡', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6011, '菲律宾', '菲律宾', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6012, '越南', '越南', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6013, '印度', '印度', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6014, '日本', '日本', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6015, '韩国', '韩国', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6016, '泰国', '泰国', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6017, '缅甸', '缅甸', '', 60, 0);
INSERT INTO `#xyh#_area` (`id`, `name`, `sname`, `ename`, `pid`, `sort`) VALUES(6018, '其他', '其他', '', 60, 0);

DROP TABLE IF EXISTS `#xyh#_article`;
CREATE TABLE IF NOT EXISTS `#xyh#_article` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `short_title` varchar(100) NOT NULL DEFAULT '' COMMENT '副标题',
  `color` char(10) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `copyfrom` varchar(30) NOT NULL DEFAULT '',
  `author` varchar(30) NOT NULL DEFAULT '',
  `keywords` varchar(50) DEFAULT '' COMMENT '关键字',
  `litpic` varchar(150) NOT NULL DEFAULT '' COMMENT '缩略图',
  `content` text COMMENT '内容',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要描述',
  `publish_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `update_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `click` smallint(6) UNSIGNED NOT NULL DEFAULT '0' COMMENT '点击数',
  `cid` int(10) UNSIGNED NOT NULL COMMENT '分类ID',
  `point` int(10) UNSIGNED NOT NULL DEFAULT '100' COMMENT '权重[越大越前]',
  `comment_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '允许评论',
  `flag` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '属性',
  `jump_url` varchar(200) NOT NULL DEFAULT '',
  `delete_status` int(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '1回收站',
  `audit_status` int(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT '审核状态[0未审核,1通过]',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `aid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'admin',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#xyh#_attachment`;
CREATE TABLE IF NOT EXISTS `#xyh#_attachment` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL DEFAULT '' COMMENT '原文件名',
  `file_path` varchar(200) NOT NULL DEFAULT '',
  `file_type` smallint(6) NOT NULL DEFAULT '1',
  `file_size` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `has_litpic` tinyint(1) NOT NULL DEFAULT '1',
  `upload_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `aid` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#xyh#_attachment` (`id`, `title`, `file_path`, `file_type`, `file_size`, `has_litpic`, `upload_time`, `aid`, `user_id`) VALUES(1, '53391ad0dbbbc.jpg', 'img1/20171124/5a182c74096b9.jpg', 1, 69350, 1, '2017-11-24 22:28:04', 1, 0);

DROP TABLE IF EXISTS `#xyh#_attachment_index`;
CREATE TABLE IF NOT EXISTS `#xyh#_attachment_index` (
  `att_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `arc_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `model_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `desc` varchar(20) NOT NULL DEFAULT '',
  KEY `att_id` (`att_id`) USING BTREE,
  KEY `arc_id` (`arc_id`) USING BTREE,
  KEY `model_id` (`model_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#xyh#_auth_group`;
CREATE TABLE IF NOT EXISTS `#xyh#_auth_group` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT '',
  `description` varchar(200) DEFAULT '' COMMENT '描述',
  `status` tinyint(3) UNSIGNED DEFAULT '0',
  `rules` text,
  `department_id` int(11) DEFAULT '0' COMMENT '部门ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `#xyh#_auth_group` (`id`, `title`, `description`, `status`, `rules`, `department_id`) VALUES(1, '总经理', '总经理', 1, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,115,116,117,118,119,120,121,122,123,124,125', 0);

DROP TABLE IF EXISTS `#xyh#_auth_group_access`;
CREATE TABLE IF NOT EXISTS `#xyh#_auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) UNSIGNED NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#xyh#_auth_group_access` (`uid`, `group_id`) VALUES(1, 1);

DROP TABLE IF EXISTS `#xyh#_auth_rule`;
CREATE TABLE IF NOT EXISTS `#xyh#_auth_rule` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',
  `name` varchar(80) NOT NULL DEFAULT '' COMMENT '规则唯一英文标识',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '规则中文描述',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型[1支持表达式]',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效(0:无效,1:有效)',
  `pid` mediumint(8) UNSIGNED NOT NULL DEFAULT '0' COMMENT '父id',
  `condition` varchar(100) NOT NULL DEFAULT '' COMMENT '规则附加条件',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(1, 'Manage/Public', '公共', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(2, 'Manage/MenuA1', '常规管理(1级菜单)', 1, 1, 1, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(3, 'Manage/MenuA2', '模块管理(1级菜单)', 1, 1, 1, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(4, 'Manage/MenuA3', '系统设置(1级菜单)', 1, 1, 1, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(5, 'Manage/MenuA4', '其他管理(1级菜单)', 1, 1, 1, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(6, 'Manage/MenuB1', '内容管理(2级菜单)', 1, 1, 1, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(7, 'Manage/MenuB2', '快捷面板(2级菜单)', 1, 1, 1, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(8, 'Manage/MenuB3', '内置模块(2级菜单)', 1, 1, 1, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(9, 'Manage/MenuB4', '其他模块(2级菜单)', 1, 1, 1, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(10, 'Manage/MenuB5', '扩展管理(2级菜单)', 1, 1, 1, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(11, 'Manage/Category', '栏目管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(12, 'Manage/Category/index', '列表', 1, 1, 11, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(13, 'Manage/Category/add', '添加', 1, 1, 11, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(14, 'Manage/Category/edit', '修改', 1, 1, 11, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(15, 'Manage/Category/del', '删除', 1, 1, 11, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(16, 'Manage/Category/sort', '排序', 1, 1, 11, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(17, 'Manage/Auth', '管理员权限', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(18, 'Manage/Auth/indexOfUser', '用户列表', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(19, 'Manage/Auth/addUser', '添加用户', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(20, 'Manage/Auth/editUser', '编辑用户', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(21, 'Manage/Auth/delUser', '删除用户', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(22, 'Manage/Auth/updateStatusOfUser', '锁定用户', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(23, 'Manage/Auth/index', ' 职位列表', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(24, 'Manage/Auth/addGroup', '添加职位', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(25, 'Manage/Auth/editGroup', '修改职位', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(26, 'Manage/Auth/updateGroup', '职位状态设置', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(27, 'Manage/Auth/access', '权限设置', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(28, 'Manage/Auth/rule', '规则列表', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(29, 'Manage/Auth/addRule', '添加规则', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(30, 'Manage/Auth/editRule', '修改规则', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(31, 'Manage/Auth/delRule', '删除规则', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(32, 'Manage/Department/index', '部门列表', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(33, 'Manage/Department/add', '添加部门', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(34, 'Manage/Department/edit', '修改部门', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(35, 'Manage/Department/del', '删除部门', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(36, 'Manage/System', '系统设置', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(37, 'Manage/System/site', '网站设置', 1, 1, 36, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(38, 'Manage/System/url', '伪静态缓存设置', 1, 1, 36, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(39, 'Manage/System/clearCache', '清除缓存', 1, 1, 36, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(40, 'Manage/System/online', '在线客服', 1, 1, 36, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(41, 'Manage/ClearHtml', '静态缓存', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(42, 'Manage/ClearHtml/all', '一键更新全站', 1, 1, 41, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(43, 'Manage/ClearHtml/home', '更新首页', 1, 1, 41, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(44, 'Manage/ClearHtml/lists', '更新栏目', 1, 1, 41, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(45, 'Manage/ClearHtml/shows', '更新文档', 1, 1, 41, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(46, 'Manage/ClearHtml/special', '更新专题', 1, 1, 41, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(47, 'Manage/Personal', '我的账户', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(48, 'Manage/Personal/index', '修改资料', 1, 1, 47, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(49, 'Manage/Personal/pwd', '修改密码', 1, 1, 47, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(50, 'Manage/Member', '会员管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(51, 'Manage/Member/index', '会员列表', 1, 1, 50, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(52, 'Manage/Member/add', '添加会员', 1, 1, 50, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(53, 'Manage/Member/edit', '修改会员', 1, 1, 50, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(54, 'Manage/Member/del', '删除会员', 1, 1, 50, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(55, 'Manage/Membergroup/index', '会员组列表', 1, 1, 50, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(56, 'Manage/Membergroup/add', '添加会员组', 1, 1, 50, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(57, 'Manage/Membergroup/edit', '修改会员组', 1, 1, 50, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(58, 'Manage/Membergroup/del', '删除会员', 1, 1, 50, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(59, 'Manage/Model', '模型管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(60, 'Manage/Model/add', '添加', 1, 1, 59, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(61, 'Manage/Model/edit', '修改', 1, 1, 59, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(62, 'Manage/Model/del', '删除', 1, 1, 59, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(63, 'Manage/Model/sort', '排序', 1, 1, 59, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(64, 'Manage/Menu', '菜单管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(65, 'Manage/Menu/index', '列表', 1, 1, 64, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(66, 'Manage/Menu/add', '添加', 1, 1, 64, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(67, 'Manage/Menu/edit', '修改', 1, 1, 64, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(68, 'Manage/Menu/del', '删除', 1, 1, 64, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(69, 'Manage/Menu/sort', '排序', 1, 1, 64, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(70, 'Manage/Menu/qk', '快捷面板', 1, 1, 64, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(71, 'Manage/Database', '数据库管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(72, 'Manage/Database/index', '数据表列表', 1, 1, 71, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(73, 'Manage/Database/optimize', '数据表优化', 1, 1, 71, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(74, 'Manage/Database/repair', '数据表修复', 1, 1, 71, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(75, 'Manage/Database/backup', '数据库备份', 1, 1, 71, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(76, 'Manage/Database/restore', '还原管理', 1, 1, 71, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(77, 'Manage/Database/restoreData', '数据恢复', 1, 1, 71, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(78, 'Manage/Database/delSqlFiles', '删除文件', 1, 1, 71, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(79, 'Manage/Itemgroup', '联动组管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(80, 'Manage/Itemgroup/index', '列表', 1, 1, 79, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(81, 'Manage/Itemgroup/add', '添加', 1, 1, 79, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(82, 'Manage/Itemgroup/edit', '修改', 1, 1, 79, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(83, 'Manage/Itemgroup/del', '删除', 1, 1, 79, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(84, 'Manage/Iteminfo', '联动管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(85, 'Manage/Iteminfo/index', '列表', 1, 1, 84, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(86, 'Manage/Iteminfo/add', '添加', 1, 1, 84, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(87, 'Manage/Iteminfo/edit', '修改', 1, 1, 84, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(88, 'Manage/Iteminfo/del', '删除', 1, 1, 84, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(89, 'Manage/Iteminfo/sort', '排序', 1, 1, 84, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(90, 'Manage/Area', '区域管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(91, 'Manage/Area/index', '列表', 1, 1, 90, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(92, 'Manage/Area/add', '添加', 1, 1, 90, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(93, 'Manage/Area/edit', '修改', 1, 1, 90, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(94, 'Manage/Area/del', '删除', 1, 1, 90, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(95, 'Manage/Area/sort', '排序', 1, 1, 90, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(96, 'Manage/Area/createJsArea', '生成JS', 1, 1, 90, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(97, 'Manage/Meta', '数据元管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(98, 'Manage/Meta/index', '列表', 1, 1, 97, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(99, 'Manage/Meta/add', '添加', 1, 1, 97, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(100, 'Manage/Meta/edit', '修改', 1, 1, 97, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(101, 'Manage/Meta/del', '删除', 1, 1, 97, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(102, 'Manage/Attachment', '已上传文件管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(103, 'Manage/Attachment/index', '列表', 1, 1, 102, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(104, 'Manage/Attachment/del', '删除', 1, 1, 102, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(105, 'Manage/Templets', '模板管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(106, 'Manage/Templets/index', '列表', 1, 1, 105, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(107, 'Manage/Templets/add', '添加', 1, 1, 105, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(108, 'Manage/Templets/edit', '修改', 1, 1, 105, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(109, 'Manage/Templets/del', '删除', 1, 1, 105, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(110, 'Manage/Block', '自由块管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(111, 'Manage/Block/index', '列表', 1, 1, 110, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(112, 'Manage/Block/add', '添加', 1, 1, 110, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(113, 'Manage/Block/edit', '修改', 1, 1, 110, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(114, 'Manage/Block/del', '删除', 1, 1, 110, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(115, 'Manage/Abc', '广告管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(116, 'Manage/Abc/index', '广告位列表', 1, 1, 115, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(117, 'Manage/Abc/add', '添加广告位', 1, 1, 115, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(118, 'Manage/Abc/edit', '修改广告位', 1, 1, 115, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(119, 'Manage/Abc/del', '删除广告位', 1, 1, 115, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(120, 'Manage/Abc/getcode', '获取广告代码', 1, 1, 115, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(121, 'Manage/Abc/detail', '广告列表', 1, 1, 115, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(122, 'Manage/Abc/addDetail', '添加广告', 1, 1, 115, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(123, 'Manage/Abc/editDetail', '修改广告', 1, 1, 115, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(124, 'Manage/Abc/delDetail', '删除广告', 1, 1, 115, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(125, 'Manage/Abc/sort', '广告排序', 1, 1, 115, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(126, 'Manage/Special', '专题管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(127, 'Manage/Special/index', '列表', 1, 1, 126, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(128, 'Manage/Special/add', '添加', 1, 1, 126, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(129, 'Manage/Special/edit', '修改', 1, 1, 126, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(130, 'Manage/Special/del', '删除', 1, 1, 126, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(131, 'Manage/Special/trach', '回收站', 1, 1, 126, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(132, 'Manage/Special/restore', '还原', 1, 1, 126, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(133, 'Manage/Special/clear', '彻底删除', 1, 1, 126, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(134, 'Manage/Announce', '公告管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(135, 'Manage/Announce/index', '列表', 1, 1, 134, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(136, 'Manage/Announce/add', '添加', 1, 1, 134, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(137, 'Manage/Announce/edit', '修改', 1, 1, 134, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(138, 'Manage/Announce/del', '删除', 1, 1, 134, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(139, 'Manage/Link', '友情链接', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(140, 'Manage/Link/index', '列表', 1, 1, 139, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(141, 'Manage/Link/add', '添加', 1, 1, 139, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(142, 'Manage/Link/edit', '修改', 1, 1, 139, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(143, 'Manage/Link/del', '删除', 1, 1, 139, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(144, 'Manage/Guestbook', '留言本管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(145, 'Manage/Guestbook/index', '列表', 1, 1, 144, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(146, 'Manage/Guestbook/add', '添加', 1, 1, 144, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(147, 'Manage/Guestbook/reply', '回复', 1, 1, 144, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(148, 'Manage/Guestbook/del', '删除', 1, 1, 144, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(149, 'Manage/Comment', '评论管理', 1, 1, 0, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(150, 'Manage/Comment/index', '列表', 1, 1, 149, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(151, 'Manage/Comment/edit', '编辑', 1, 1, 149, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(152, 'Manage/Comment/del', '删除', 1, 1, 149, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(153, 'Manage/System/index', '配置项管理', 1, 1, 36, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(154, 'Manage/System/add', '添加配置项', 1, 1, 36, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(155, 'Manage/System/edit', '修改配置项', 1, 1, 36, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(156, 'Manage/System/del', '删除配置项', 1, 1, 36, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(157, 'Manage/System/sort', '配置项排序', 1, 1, 36, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(158, 'Manage/Auth/categoryAccess', '职位栏目权限', 1, 1, 17, '');
INSERT INTO `#xyh#_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `condition`) VALUES(159, 'Manage/Membergroup/categoryAccess', '会员组栏目权限', 1, 1, 50, '');

DROP TABLE IF EXISTS `#xyh#_category`;
CREATE TABLE IF NOT EXISTS `#xyh#_category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '栏目分类名称',
  `ename` varchar(200) NOT NULL DEFAULT '' COMMENT '别名',
  `cat_pic` varchar(150) NOT NULL DEFAULT '',
  `pid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上级分类',
  `model_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '所属模型',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '类别',
  `seo_title` varchar(50) NOT NULL DEFAULT '',
  `keywords` varchar(50) DEFAULT '' COMMENT '关键字',
  `description` varchar(255) DEFAULT '' COMMENT '关键字',
  `template_category` varchar(60) NOT NULL DEFAULT '',
  `template_list` varchar(60) NOT NULL DEFAULT '',
  `template_show` varchar(60) NOT NULL DEFAULT '',
  `style` varchar(70) DEFAULT '' COMMENT 'css样式class',
  `content` text COMMENT '内容',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '显示',
  `sort` smallint(6) NOT NULL DEFAULT '100' COMMENT '排序',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目分类表';

DROP TABLE IF EXISTS `#xyh#_category_access`;
CREATE TABLE IF NOT EXISTS `#xyh#_category_access` (
  `cat_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `role_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `flag` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `action` varchar(30) NOT NULL DEFAULT '',
  KEY `catid` (`cat_id`),
  KEY `roleid` (`role_id`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#xyh#_comment`;
CREATE TABLE IF NOT EXISTS `#xyh#_comment` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `model_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `agent` varchar(255) NOT NULL DEFAULT '',
  `post_time` datetime NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `pid` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `post_id` (`post_id`) USING BTREE,
  KEY `model_id` (`model_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#xyh#_config`;
CREATE TABLE IF NOT EXISTS `#xyh#_config` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '标识',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `remark` varchar(100) NOT NULL DEFAULT '' COMMENT '说明',
  `t_value` varchar(150) NOT NULL DEFAULT '' COMMENT 'html元素类型',
  `type_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT '类型',
  `group_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT '分组',
  `s_value` text COMMENT '值',
  `sort` smallint(3) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `type_id` (`type_id`) USING BTREE,
  KEY `group_id` (`group_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(1, 'CFG_WEBNAME', '网站名称', '', '', 2, 1, '#web_name#', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(2, 'CFG_WEBURL', '网站域名', '', '', 2, 1, '#web_url#', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(3, 'CFG_WEBTITLE', '网站标题', '站点首页title(SEO)的设置', '', 2, 1, '#web_name#', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(4, 'CFG_KEYWORDS', '站点关键词', '', '', 2, 1, '#web_name#', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(5, 'CFG_DESCRIPTION', '站点描述', '', 'textarea', 3, 1, '', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(6, 'CFG_THEMESTYLE', '模板风格', '', 'select\r\n__CFG_THEMESTYLE__', 2, 1, '#web_style#', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(7, 'CFG_COOKIE_ENCODE', 'cookie加密码', '', '', 2, 1, '#web_cookie_code#', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(8, 'CFG_POWERBY', '网站版权信息', '', 'textarea', 3, 1, '', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(9, 'CFG_STATS', '网站统计', '', 'textarea', 3, 1, '', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(10, 'CFG_BEIAN', '网站备案号', '', '', 2, 1, '', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(11, 'CFG_ADDRESS', '联系地址', '', '', 2, 1, '昆明北京路', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(12, 'CFG_PHONE', '联系电话', '', '', 2, 1, '0871-66666', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(13, 'CFG_WEBSITE_CLOSE', '关闭网站', '', 'radio\r\n1:::是\r\n0:::否', 4, 2, '0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(14, 'CFG_WEBSITE_CLOSE_INFO', '关站提示', '', 'textarea', 3, 2, '站点维护中，请稍等一会...', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(15, 'CFG_MOBILE_AUTO', '手机版开启', '', 'radio\r\n1:::是\r\n0:::否', 4, 2, '1', 1);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(16, 'CFG_EMAIL_FROM', '发件邮箱地址', '', '', 2, 3, 'ddend@qq.com', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(17, 'CFG_EMAIL_FROM_NAME', '发件人名称', '', '', 2, 3, '站名', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(18, 'CFG_EMAIL_HOST', 'STMP服务器', '', '', 2, 3, 'smtp.exmail.qq.com', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(19, 'CFG_EMAIL_PORT', '服务器端口', '', '', 1, 3, '25', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(20, 'CFG_EMAIL_LOGINNAME', '邮箱帐号', '', '', 2, 3, 'ddend@qq.com', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(21, 'CFG_EMAIL_PASSWORD', '邮箱密码', '', '', 2, 3, '123zstQhz4', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(22, 'CFG_BADWORD', '禁用词语', '', 'textarea', 3, 2, '艾滋病|中国共产党|111111111', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(23, 'CFG_FEEDBACK_GUEST', '允许匿名评论', '', 'radio\r\n1:::是\r\n0:::否', 4, 2, '1', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(24, 'CFG_MEMBER_OPEN', '开启会员功能', '', 'radio\r\n1:::是\r\n0:::否', 4, 5, '1', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(25, 'CFG_MEMBER_VERIFYEMAIL', ' 开启邮件验证', '', 'radio\r\n1:::是\r\n0:::否', 4, 5, '0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(26, 'CFG_MEMBER_NOTALLOW', '禁止使用的昵称', '', 'textarea', 3, 5, 'www,bbs,ftp,mail,user,users,admin,administrator,xyhcms', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(27, 'CFG_UPLOAD_MAXSIZE', '允许上传大小', 'KB', '', 1, 4, '2048', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(28, 'CFG_IMGTHUMB_SIZE', '缩略图组尺寸', '长X高，长X0(固定宽度)，一个尺寸一行，如：300X300 600X0', 'textarea', 5, 4, '300X300\r\n600X0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(29, 'CFG_IMGTHUMB_TYPE', '缩略图生成方式', '固定大小截取 ,原图等比例缩略', 'radio\r\n0:::原图等比例缩略\r\n1:::固定大小截取', 4, 4, '0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(30, 'CFG_CLICK_NUM_INIT', '文档点击数初始化', '', 'radio\r\n1:::固定\r\n0:::随机', 1, 6, '0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(31, 'CFG_UPLOAD_ROOTPATH', '上传根目录', '', '', 2, 4, './uploads/', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(32, 'CFG_UPLOAD_FILE_EXT', '允许附件类型', '', 'textarea', 3, 4, 'jpg,gif,png,jpeg,txt,doc,docx,xls,ppt,zip,rar,mp3', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(33, 'CFG_UPLOAD_IMG_EXT', '允许图片类型', '带缩略图的图片', '', 2, 4, 'jpg,gif,png,jpeg', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(34, 'CFG_VERIFY_REGISTER', '开启注册验证码', '', 'radio\r\n1:::是\r\n0:::否', 4, 2, '0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(35, 'CFG_VERIFY_LOGIN', '开启登录验证码', '', 'radio\r\n1:::是\r\n0:::否', 4, 2, '0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(36, 'CFG_VERIFY_GUESTBOOK', '开启留言板验证码', '', 'radio\r\n1:::是\r\n0:::否', 4, 2, '1', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(37, 'CFG_VERIFY_REVIEW', '开启评论验证码', '', 'radio\r\n1:::是\r\n0:::否', 4, 2, '1', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(38, 'CFG_SQL_FILESIZE', 'sql文件大小', '备份数据库，值不可太大，否则会导致内存溢出备份、恢复失败，合理大小在512K~10M间，建议3M一卷。单位字节,5M=5*1024*1024=5242880', '', 1, 6, '5242880', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(39, 'CFG_DOWNLOAD_HIDE', '隐藏下载地址', '', 'radio\r\n1:::是\r\n0:::否', 4, 4, '1', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(40, 'CFG_MOBILE_THEMESTYLE', '手机模板风格', '', 'select\r\n__CFG_MOBILE_THEMESTYLE__', 2, 2, '#web_style#', 1);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(41, 'HOME_URL_MODEL', 'URL模式', '', 'radio\r\n0:::普通模式\r\n1:::PATHINFO模式\r\n2:::REWRITE模式(需要URL_REWRITE支持)\r\n3:::兼容模式', 1, 900, '3', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(42, 'HOME_URL_PATHINFO_DEPR', '参数分割符', '针对PATHINFO模式,默认为&quot;/&quot;,如改为&quot;-&quot;：http://www.xyhcms.com/index.php/List-index-id-1', '', 2, 900, '/', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(43, 'HOME_URL_ROUTER_ON', '开启路由', '开启URL路由(路由规则不熟悉的不要乱改)', 'radio\r\n1:::是\r\n0:::否', 4, 900, '0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(44, 'HOME_URL_ROUTE_RULES', '路由规则', '路由规则不熟悉的不要乱改', 'textarea', 5, 900, 'Mobile$:::Mobile/Index/index\r\nSpecial/:id\\d:::Special/shows\r\nTag/:tname\\w:::Tag/shows\r\n:e/p/:p\\d:::List/index\r\n:e/:id\\d:::Show/index\r\n/^(\\w+)$/:::List/index?e=:1', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(45, 'HOME_HTML_CACHE_ON', '开启电脑版缓存', '开启电脑版缓存', 'radio\r\n1:::是\r\n0:::否', 4, 900, '0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(46, 'MOBILE_HTML_CACHE_ON', '开启手机版缓存', '', 'radio\r\n1:::是\r\n0:::否', 4, 900, '0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(47, 'HTML_CACHE_INDEX_ON', '首页缓存', '', 'radio\r\n1:::是\r\n0:::否', 4, 900, '1', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(48, 'HTML_CACHE_INDEX_TIME', '首页缓存时间', '首页缓存时间', '', 1, 900, '1200', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(49, 'HTML_CACHE_LIST_ON', '栏目缓存', '', 'radio\r\n1:::是\r\n0:::否', 4, 900, '1', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(50, 'HTML_CACHE_LIST_TIME', '栏目缓存时间', '栏目缓存时间', '', 1, 900, '0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(51, 'HTML_CACHE_SHOW_ON', '文章缓存', '', 'radio\r\n1:::是\r\n0:::否', 4, 900, '1', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(52, 'HTML_CACHE_SHOW_TIME', '文章缓存时间', '', '', 1, 900, '0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(53, 'HTML_CACHE_SPECIAL_ON', '专题缓存', '', 'radio\r\n1:::是\r\n0:::否', 4, 900, '0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(54, 'HTML_CACHE_SPECIAL_TIME', '专题缓存时间', '专题缓存时间', '', 1, 900, '0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(55, 'ONLINE_CFG_MODE', '客服显示状态', '', 'radio\r\n1:::显示\r\n0:::隐藏', 4, 901, '1', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(56, 'ONLINE_CFG_STYLE', '客服样式', '', 'select\r\n__ONLINE_CFG_STYLE__', 2, 901, 'blue', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(57, 'ONLINE_CFG_H', '水平位置', '设置水平显示位置', 'radio\r\n0:::左对齐\r\n1:::右对齐\r\n2:::水平居中', 1, 901, '1', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(58, 'ONLINE_CFG_H_MARGIN', '与边界的距离', '水平位置与边界的距离(像素)', '', 1, 901, '0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(59, 'ONLINE_CFG_V', '垂直位置', '', 'radio\r\n0:::顶部对齐\r\n1:::底部对齐\r\n2:::垂直居中', 1, 901, '2', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(60, 'ONLINE_CFG_V_MARGIN', '与边界的距离', '垂直位置与边界的距离(像素)', '', 1, 901, '0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(61, 'ONLINE_CFG_QQ', 'QQ号码', '一行一个QQ号(QQ:::说明)', 'textarea', 5, 901, '销售咨询:::307299635\r\n售后服务:::307299635', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(62, 'ONLINE_CFG_WANGWANG', '旺旺号码', '一行一个旺旺号(旺旺:::说明)', 'textarea', 5, 901, '在线旺旺:::7bucn', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(63, 'ONLINE_CFG_PHONE_ON', '显示电话', '', 'radio\r\n1:::显示\r\n0:::隐藏', 4, 901, '1', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(64, 'ONLINE_CFG_PHONE', '电话号码', '一行一个电话号码(电话号码:::说明)', 'textarea\r\n', 5, 901, '销售热线:::6525411\r\n技术支持:::6525412', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(65, 'ONLINE_CFG_GUESTBOOK_ON', '显示留言链接', '显示留言链接', 'radio\r\n1:::显示\r\n0:::隐藏', 2, 901, '1', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(66, 'ONLINE_CFG_QQ_PARAM', 'QQ参数', 'QQ参数。不熟悉的，请不要动', 'textarea', 3, 901, '<a target=\"_blank\" href=\"http://wpa.qq.com/msgrd?v=3&uin=[客服号]&site=qq&menu=yes\" class=\"xyh-online-item\"><em class=\"xyh-online-ico-qq\"> </em>[客服说明]</a>', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(67, 'ONLINE_CFG_WANGWANG_PARAM', '旺旺参数', 'QQ参数。不熟悉的，请不要动', 'textarea', 3, 901, '<a target=\"_blank\" href=\"http://www.taobao.com/webww/ww.php?ver=3&touid=[客服号]&siteid=cntaobao&status=1&charset=utf-8\" class=\"xyh-online-item\"><em class=\"xyh-online-ico-wangwang\"> </em>[客服说明]</a>', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(68, 'CFG_IMAGE_WATER_ON', '上传图片加水印', '水印开启，同时会影响到缩略图', 'radio\r\n1:::开启\r\n0:::关闭', 4, 4, '0', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(69, 'CFG_IMAGE_WATER_FILE', '水印图片文件', '', 'file@ad', 2, 4, '/uploads/abc1/20171102/59fa9a98da71f.png', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(70, 'CFG_IMAGE_WATER_POSITION', '水印位置', '', 'radio\r\n1:::顶部居左\r\n2:::顶部居中\r\n3:::顶部居右\r\n4:::左边居中\r\n5:::图片中心\r\n6:::右边居中\r\n7:::底部居左\r\n8:::底部居中\r\n9:::底部居右\r\n', 1, 4, '9', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(71, 'CFG_IMAGE_WATER_DIAPHANEITY', '水印透明度', '透明度0~100之间，超小超透明', 'text', 1, 4, '100', 0);
INSERT INTO `#xyh#_config` (`id`, `name`, `title`, `remark`, `t_value`, `type_id`, `group_id`, `s_value`, `sort`) VALUES(72, 'CFG_IMAGE_WATER_IGNORE_WIDTH', '加水印最小宽度', '上传的图片宽度小于最小宽度(像素)，则不再添加水印。全部添加水印，请填写0', '', 2, 4, '300', 0);

DROP TABLE IF EXISTS `#xyh#_copyfrom`;
CREATE TABLE IF NOT EXISTS `#xyh#_copyfrom` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sitename` varchar(30) NOT NULL DEFAULT '',
  `siteurl` varchar(200) NOT NULL DEFAULT '',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#xyh#_department`;
CREATE TABLE IF NOT EXISTS `#xyh#_department` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '部门名称',
  `pid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上级部门',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '描述',
  `sorting` int(10) UNSIGNED DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `#xyh#_department` (`id`, `name`, `pid`, `description`, `sorting`) VALUES(1, '网络部', 0, '网络部', 0);
INSERT INTO `#xyh#_department` (`id`, `name`, `pid`, `description`, `sorting`) VALUES(3, '销售部', 0, '销售', 1);
INSERT INTO `#xyh#_department` (`id`, `name`, `pid`, `description`, `sorting`) VALUES(4, '美工部', 1, '美工', 0);

DROP TABLE IF EXISTS `#xyh#_free_block`;
CREATE TABLE IF NOT EXISTS `#xyh#_free_block` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `remark` varchar(200) NOT NULL DEFAULT '' COMMENT '说明',
  `content` text COMMENT '内容',
  `block_type` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#xyh#_free_block` (`id`, `name`, `remark`, `content`, `block_type`) VALUES(1, 'Introduction', '', '<p>网络科技有限公司成立于2007年。是一家集科研、生产、开发、销售为一体的互联网产业高新技术企业。 我公司在全国与多个大型门户网站保持密切技术合作与往来；并且与全国多所高校合作，开发与研究互联网深度产品，取得了不错的研究成果，获得良好的好评</p>', 3);

DROP TABLE IF EXISTS `#xyh#_guestbook`;
CREATE TABLE IF NOT EXISTS `#xyh#_guestbook` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `tel` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `homepage` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(15) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `post_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `reply_time` datetime DEFAULT NULL COMMENT '更新时间',
  `status` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `private_flag` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '悄悄话',
  `content` text,
  `reply` text,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#xyh#_guestbook` (`id`, `username`, `tel`, `email`, `homepage`, `qq`, `ip`, `post_time`, `reply_time`, `status`, `private_flag`, `content`, `reply`, `user_id`) VALUES(1, '小平', '', '', '', '', '112.115.215.93', '2014-03-31 13:35:41', '2017-11-24 21:35:16', 1, 0, '网站不错，很喜欢！！！', '谢谢支持！', 0);
INSERT INTO `#xyh#_guestbook` (`id`, `username`, `tel`, `email`, `homepage`, `qq`, `ip`, `post_time`, `reply_time`, `status`, `private_flag`, `content`, `reply`, `user_id`) VALUES(2, '明明', '', '', '', '', '112.115.192.30', '2014-04-01 15:38:26', '2017-11-24 21:35:24', 1, 0, '蓝色很大气，模板很好看！', NULL, 0);

DROP TABLE IF EXISTS `#xyh#_item_group`;
CREATE TABLE IF NOT EXISTS `#xyh#_item_group` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `remark` varchar(20) DEFAULT '',
  `status` tinyint(1) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#xyh#_item_group` (`id`, `name`, `remark`, `status`) VALUES(1, 'flagtype', '文档属性', 0);
INSERT INTO `#xyh#_item_group` (`id`, `name`, `remark`, `status`) VALUES(2, 'blocktype', '自由块类别', 0);
INSERT INTO `#xyh#_item_group` (`id`, `name`, `remark`, `status`) VALUES(3, 'softtype', '软件类型', 0);
INSERT INTO `#xyh#_item_group` (`id`, `name`, `remark`, `status`) VALUES(4, 'softlanguage', '软件语言', 0);
INSERT INTO `#xyh#_item_group` (`id`, `name`, `remark`, `status`) VALUES(5, 'star', '星座', 0);
INSERT INTO `#xyh#_item_group` (`id`, `name`, `remark`, `status`) VALUES(6, 'animal', '生肖', 0);
INSERT INTO `#xyh#_item_group` (`id`, `name`, `remark`, `status`) VALUES(7, 'education', '教育程度', 0);
INSERT INTO `#xyh#_item_group` (`id`, `name`, `remark`, `status`) VALUES(8, 'configgroup', '配置分组', 0);
INSERT INTO `#xyh#_item_group` (`id`, `name`, `remark`, `status`) VALUES(9, 'configtype', '配置变量类型', 0);

DROP TABLE IF EXISTS `#xyh#_item_info`;
CREATE TABLE IF NOT EXISTS `#xyh#_item_info` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `group` varchar(20) NOT NULL,
  `value` int(11) NOT NULL DEFAULT '0',
  `pid` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sort` smallint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(1, '图片', 'flagtype', 1, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(2, '头条', 'flagtype', 2, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(3, '推荐', 'flagtype', 4, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(4, '特荐', 'flagtype', 8, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(5, '幻灯', 'flagtype', 16, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(6, '跳转', 'flagtype', 32, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(7, '其他', 'flagtype', 64, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(8, '文字', 'blocktype', 1, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(9, '图片', 'blocktype', 2, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(10, '丰富', 'blocktype', 3, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(11, '国产', 'softtype', 1, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(12, '中文版', 'softlanguage', 1, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(13, '英文版', 'softlanguage', 2, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(14, '多语言版', 'softlanguage', 3, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(15, '白羊座', 'star', 1, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(16, '金牛座', 'star', 2, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(17, '双子座', 'star', 3, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(18, '巨蟹座', 'star', 4, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(19, '狮子座', 'star', 5, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(20, '处女座', 'star', 6, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(21, '天枰座', 'star', 7, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(22, '天蝎座', 'star', 8, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(23, '射手座', 'star', 9, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(24, '摩羯座', 'star', 10, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(25, '水瓶座', 'star', 11, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(26, '双鱼座', 'star', 12, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(27, '鼠', 'animal', 1, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(28, '牛', 'animal', 2, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(29, '虎', 'animal', 3, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(30, '兔', 'animal', 4, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(31, '龙', 'animal', 5, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(32, '蛇', 'animal', 6, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(33, '马', 'animal', 7, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(34, '羊', 'animal', 8, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(35, '猴', 'animal', 9, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(36, '鸡', 'animal', 10, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(37, '狗', 'animal', 11, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(38, '猪', 'animal', 12, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(39, '小学', 'education', 1, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(40, '初中', 'education', 2, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(41, '高中/中专', 'education', 3, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(42, '大学专科', 'education', 4, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(43, '大学本科', 'education', 5, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(44, '硕士', 'education', 6, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(45, '博士以上', 'education', 7, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(46, '站点配置', 'configgroup', 1, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(47, '核心配置', 'configgroup', 2, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(48, '邮箱配置', 'configgroup', 3, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(49, '上传配置', 'configgroup', 4, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(50, '会员配置', 'configgroup', 5, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(51, '其他配置', 'configgroup', 6, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(52, '数字', 'configtype', 1, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(53, '字符', 'configtype', 2, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(54, '文本', 'configtype', 3, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(55, '布尔(真假)', 'configtype', 4, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(56, '数组', 'configtype', 5, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(57, '伪静态/缓存', 'configgroup', 900, 0, 0);
INSERT INTO `#xyh#_item_info` (`id`, `name`, `group`, `value`, `pid`, `sort`) VALUES(58, '在线客服', 'configgroup', 901, 0, 0);

DROP TABLE IF EXISTS `#xyh#_link`;
CREATE TABLE IF NOT EXISTS `#xyh#_link` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `is_check` tinyint(1) NOT NULL DEFAULT '1' COMMENT '首页|内页',
  `post_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `sort` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `#xyh#_link` (`id`, `name`, `url`, `logo`, `description`, `is_check`, `post_time`, `sort`) VALUES(1, '行云海CMS', 'http://www.xyhcms.com', '', '', 0, '2014-03-31 16:40:03', 1);
INSERT INTO `#xyh#_link` (`id`, `name`, `url`, `logo`, `description`, `is_check`, `post_time`, `sort`) VALUES(2, '行云海软件', 'http://www.0871k.com', '', '', 0, '2014-03-31 16:40:03', 1);
INSERT INTO `#xyh#_link` (`id`, `name`, `url`, `logo`, `description`, `is_check`, `post_time`, `sort`) VALUES(3, '许愿网', 'http://www.yuanabc.com', '', '', 1, '2014-03-31 16:40:03', 1);

DROP TABLE IF EXISTS `#xyh#_member`;
CREATE TABLE IF NOT EXISTS `#xyh#_member` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `encrypt` varchar(6) NOT NULL DEFAULT '',
  `nickname` varchar(20) DEFAULT '',
  `amount` decimal(8,2) UNSIGNED NOT NULL DEFAULT '0.00' COMMENT '总金额',
  `score` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '积分',
  `face` varchar(60) NOT NULL DEFAULT '' COMMENT '头像',
  `reg_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `login_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `login_ip` varchar(20) DEFAULT '',
  `login_num` int(10) UNSIGNED DEFAULT '0',
  `group_id` int(10) UNSIGNED DEFAULT '0',
  `message` tinyint(1) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_lock` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#xyh#_member_detail`;
CREATE TABLE IF NOT EXISTS `#xyh#_member_detail` (
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sex` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `realname` varchar(30) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '1980-01-01',
  `province` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `area` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `address` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(12) NOT NULL DEFAULT '',
  `tel` varchar(15) NOT NULL DEFAULT '',
  `mobile` varchar(15) NOT NULL DEFAULT '',
  `animal` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `star` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `blood` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `marital` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `education` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `vocation` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `income` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `maxim` varchar(100) NOT NULL DEFAULT '',
  `update_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#xyh#_member_group`;
CREATE TABLE IF NOT EXISTS `#xyh#_member_group` (
  `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `rank` smallint(6) NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `sort` tinyint(3) UNSIGNED DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#xyh#_member_group` (`id`, `name`, `description`, `rank`, `status`, `sort`) VALUES(1, '游客', '', 0, 0, 0);
INSERT INTO `#xyh#_member_group` (`id`, `name`, `description`, `rank`, `status`, `sort`) VALUES(2, '注册会员', '', 10, 0, 0);
INSERT INTO `#xyh#_member_group` (`id`, `name`, `description`, `rank`, `status`, `sort`) VALUES(3, '中级会员', '', 30, 0, 0);

DROP TABLE IF EXISTS `#xyh#_menu`;
CREATE TABLE IF NOT EXISTS `#xyh#_menu` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `pid` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `quick` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '显示',
  `sort` smallint(6) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(1, '常规管理', 'Manage/MenuA1', 0, 0, 1, 1);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(2, '模块扩展', 'Manage/MenuA2', 0, 0, 1, 2);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(3, '系统设置', 'Manage/MenuA3', 0, 0, 1, 3);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(4, '扩展管理', 'Manage/MenuA4', 0, 0, 1, 4);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(5, '栏目管理', 'Manage/Category', 1, 0, 1, 11);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(6, '内容管理', 'Manage/MenuB1', 1, 0, 1, 12);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(7, '快捷面板', 'Manage/MenuB2', 1, 0, 1, 13);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(8, '栏目管理', 'Manage/Category/index', 5, 0, 1, 111);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(9, '内置模块', 'Manage/MenuB3', 2, 0, 1, 21);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(10, '自由块管理', 'Manage/FreeBlock/index', 9, 0, 1, 211);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(11, '广告管理', 'Manage/Abc/index', 9, 1, 1, 212);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(12, '专题管理', 'Manage/Special/index', 9, 0, 1, 213);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(13, '公告管理', 'Manage/Announce/index', 9, 1, 1, 214);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(14, '友情链接', 'Manage/Link/index', 9, 1, 1, 215);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(15, '留言本管理', 'Manage/Guestbook/index', 9, 1, 1, 216);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(16, '评论管理', 'Manage/Comment/index', 9, 1, 1, 217);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(17, '系统设置', 'Manage/System', 3, 0, 1, 31);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(18, '会员管理', 'Manage/Member', 3, 0, 1, 34);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(19, '管理员管理', 'Manage/Auth', 3, 0, 1, 35);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(20, '网站设置', 'Manage/System/site', 17, 0, 1, 311);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(21, '伪静态|缓存设置', 'Manage/System/url', 17, 0, 1, 312);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(22, '清除系统缓存', 'Manage/System/clearCache', 17, 1, 1, 316);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(23, '在线客服设置', 'Manage/System/online', 17, 0, 1, 313);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(24, '更新静态缓存', 'Manage/ClearHtml/index', 17, 0, 1, 317);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(30, '会员管理', 'Manage/Member/index', 18, 0, 1, 331);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(31, '会员组管理', 'Manage/MemberGroup/index', 18, 0, 1, 332);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(32, '系统用户管理', 'Manage/Auth/indexOfUser', 19, 0, 1, 341);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(33, '职位权限', 'Manage/Auth/index', 19, 0, 1, 342);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(34, '部门管理', 'Manage/Department/index', 19, 0, 1, 343);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(35, '扩展管理', 'Manage/MenuB5', 4, 0, 1, 41);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(36, '我的账户', 'Manage/Personal', 3, 0, 1, 33);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(37, '模型管理', 'Manage/Model/index', 35, 0, 1, 411);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(38, '菜单管理', 'Manage/Menu/index', 35, 0, 1, 412);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(39, '数据库管理', 'Manage/Database/index', 35, 0, 1, 413);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(40, '联动管理', 'Manage/ItemGroup/index', 35, 0, 1, 414);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(41, '区域管理', 'Manage/Area/index', 35, 0, 1, 415);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(42, '修改我的信息', 'Manage/Personal/index', 36, 0, 1, 421);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(43, '修改密码', 'Manage/Personal/pwd', 36, 0, 1, 422);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(44, '其他模块', 'Manage/MenuB4', 2, 0, 1, 22);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(45, '已传文件管理', 'Manage/Attachment/index', 35, 0, 1, 416);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(46, '数据预留--', 'Manage/Index/index', 35, 0, 0, 417);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(47, '模板管理', 'Manage/Templets/index', 35, 0, 1, 428);
INSERT INTO `#xyh#_menu` (`id`, `name`, `url`, `pid`, `quick`, `status`, `sort`) VALUES(48, 'Tag管理', 'Manage/Tag/index', 9, 0, 1, 214);

DROP TABLE IF EXISTS `#xyh#_model`;
CREATE TABLE IF NOT EXISTS `#xyh#_model` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `table_name` varchar(30) NOT NULL DEFAULT '',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `template_category` varchar(60) NOT NULL DEFAULT '',
  `template_list` varchar(60) NOT NULL DEFAULT '',
  `template_show` varchar(60) NOT NULL DEFAULT '',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#xyh#_model` (`id`, `name`, `description`, `table_name`, `status`, `template_category`, `template_list`, `template_show`, `sort`) VALUES(1, '文章模型', '', 'article', 1, '', 'List_article.html', 'Show_article.html', 1);
INSERT INTO `#xyh#_model` (`id`, `name`, `description`, `table_name`, `status`, `template_category`, `template_list`, `template_show`, `sort`) VALUES(2, '单页模型', '', 'page', 1, '', 'List_page.html', 'Show_page.html', 2);
INSERT INTO `#xyh#_model` (`id`, `name`, `description`, `table_name`, `status`, `template_category`, `template_list`, `template_show`, `sort`) VALUES(3, '产品模型', '', 'product', 1, '', 'List_product.html', 'Show_product.html', 3);
INSERT INTO `#xyh#_model` (`id`, `name`, `description`, `table_name`, `status`, `template_category`, `template_list`, `template_show`, `sort`) VALUES(4, '图片模型', '', 'picture', 1, '', 'List_picture.html', 'Show_picture.html', 4);
INSERT INTO `#xyh#_model` (`id`, `name`, `description`, `table_name`, `status`, `template_category`, `template_list`, `template_show`, `sort`) VALUES(5, '软件下载模型', '', 'soft', 1, '', 'List_soft.html', 'Show_soft.html', 5);

DROP TABLE IF EXISTS `#xyh#_order_action`;
CREATE TABLE IF NOT EXISTS `#xyh#_order_action` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水号',
  `order_id` varchar(30) NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '订单状态',
  `distribution_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '配送状态',
  `pay_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '支付状态',
  `aid` int(10) NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '',
  `publish_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orderid` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#xyh#_order_detail`;
CREATE TABLE IF NOT EXISTS `#xyh#_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(30) DEFAULT NULL COMMENT '订单ID',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `market_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `num` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#xyh#_order_info`;
CREATE TABLE IF NOT EXISTS `#xyh#_order_info` (
  `order_id` varchar(30) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `pay_id` tinyint(2) NOT NULL DEFAULT '1' COMMENT '支付方式',
  `express_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '邮费/运费',
  `prdouct_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '产品总价格',
  `total_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '总价格',
  `consignee` varchar(30) DEFAULT '' COMMENT '收件人',
  `address` varchar(255) NOT NULL DEFAULT '',
  `zip` int(10) NOT NULL DEFAULT '0',
  `tel` varchar(60) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `remark` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `order_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '订单状态',
  `distribution_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '配送状态',
  `pay_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '支付状态',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `confirm_time` datetime DEFAULT NULL COMMENT '确认时间',
  `pay_time` datetime DEFAULT NULL COMMENT '支付时间',
  `distribution_time` datetime DEFAULT NULL COMMENT '配送时间',
  PRIMARY KEY (`order_id`),
  KEY `add_time` (`add_time`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#xyh#_picture`;
CREATE TABLE IF NOT EXISTS `#xyh#_picture` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `color` char(10) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `keywords` varchar(50) DEFAULT '' COMMENT '关键字',
  `litpic` varchar(150) NOT NULL DEFAULT '' COMMENT '缩略图',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要描述',
  `publish_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `update_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `copyfrom` varchar(100) NOT NULL DEFAULT '' COMMENT '来源',
  `template` varchar(30) NOT NULL DEFAULT '' COMMENT '模板',
  `picture_urls` text COMMENT '图片地址',
  `content` text COMMENT '内容',
  `click` smallint(6) UNSIGNED NOT NULL DEFAULT '0' COMMENT '点击数',
  `cid` int(10) UNSIGNED NOT NULL COMMENT '分类ID',
  `point` int(10) UNSIGNED NOT NULL DEFAULT '100' COMMENT '权重[越大越前]',
  `comment_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '允许评论',
  `flag` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '属性',
  `jump_url` varchar(200) NOT NULL DEFAULT '',
  `delete_status` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '1回收站',
  `audit_status` int(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT '审核状态[0未审核,1通过]',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `aid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'admin',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#xyh#_product`;
CREATE TABLE IF NOT EXISTS `#xyh#_product` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `color` char(10) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `keywords` varchar(50) DEFAULT '' COMMENT '关键字',
  `litpic` varchar(150) NOT NULL DEFAULT '' COMMENT '缩略图',
  `picture_urls` text COMMENT '图片地址',
  `content` text COMMENT '内容',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要描述',
  `publish_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `update_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `market_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `brand` varchar(50) NOT NULL DEFAULT '' COMMENT '品牌',
  `units` varchar(50) NOT NULL DEFAULT '' COMMENT '单位',
  `specification` varchar(50) NOT NULL DEFAULT '' COMMENT '规格',
  `click` smallint(6) UNSIGNED NOT NULL DEFAULT '0' COMMENT '点击数',
  `cid` int(10) UNSIGNED NOT NULL COMMENT '分类ID',
  `point` int(10) UNSIGNED NOT NULL DEFAULT '100' COMMENT '权重[越大越前]',
  `comment_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '允许评论',
  `flag` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '属性',
  `jump_url` varchar(200) NOT NULL DEFAULT '',
  `delete_status` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '1回收站',
  `audit_status` int(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT '审核状态[0未审核,1通过]',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `aid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'admin',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#xyh#_search_all`;
CREATE TABLE IF NOT EXISTS `#xyh#_search_all` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `arc_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '文档id',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `litpic` varchar(150) NOT NULL DEFAULT '' COMMENT '缩略图',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要描述',
  `jump_url` varchar(200) NOT NULL DEFAULT '',
  `publish_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `cid` int(10) UNSIGNED NOT NULL COMMENT '分类ID',
  `model_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '模型id',
  `point` int(10) UNSIGNED NOT NULL DEFAULT '100' COMMENT '权重[越大越前]',
  `delete_status` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '1回收站',
  `audit_status` int(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT '审核状态[0未审核,1通过]',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#xyh#_soft`;
CREATE TABLE IF NOT EXISTS `#xyh#_soft` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `color` char(10) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `keywords` varchar(50) DEFAULT '' COMMENT '关键字',
  `litpic` varchar(150) NOT NULL DEFAULT '' COMMENT '缩略图',
  `picture_urls` text,
  `content` text COMMENT '内容',
  `update_log` text COMMENT '更新日志',
  `down_link` text COMMENT '下载地址',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要描述',
  `publish_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `update_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `version` varchar(20) NOT NULL DEFAULT '' COMMENT '版本号',
  `soft_type` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '软件类型',
  `copy_type` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '授权形式',
  `language` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '语言',
  `os` varchar(100) NOT NULL DEFAULT '' COMMENT '运行环境',
  `file_size` varchar(10) NOT NULL DEFAULT '' COMMENT '文件大小',
  `official_url` varchar(100) NOT NULL DEFAULT '' COMMENT '官方网站',
  `click` smallint(6) UNSIGNED NOT NULL DEFAULT '0' COMMENT '点击数',
  `cid` int(10) UNSIGNED NOT NULL COMMENT '分类ID',
  `point` int(10) UNSIGNED NOT NULL DEFAULT '100' COMMENT '权重[越大越前]',
  `comment_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '允许评论',
  `flag` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '属性',
  `jump_url` varchar(200) NOT NULL DEFAULT '',
  `delete_status` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '1回收站',
  `audit_status` int(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT '审核状态[0未审核,1通过]',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `aid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'admin',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#xyh#_special`;
CREATE TABLE IF NOT EXISTS `#xyh#_special` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `short_title` varchar(100) NOT NULL DEFAULT '' COMMENT '副标题',
  `color` char(10) NOT NULL DEFAULT '',
  `author` varchar(30) NOT NULL DEFAULT '',
  `keywords` varchar(50) DEFAULT '' COMMENT '关键字',
  `litpic` varchar(150) NOT NULL DEFAULT '' COMMENT '缩略图',
  `description` varchar(255) NOT NULL DEFAULT '',
  `publish_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '发布时间',
  `update_time` datetime NOT NULL DEFAULT '1900-01-01 00:00:00' COMMENT '更新时间',
  `content` text COMMENT '内容',
  `click` smallint(6) UNSIGNED NOT NULL DEFAULT '0' COMMENT '点击数',
  `cid` int(10) UNSIGNED NOT NULL COMMENT '分类ID',
  `point` int(10) UNSIGNED NOT NULL DEFAULT '100' COMMENT '权重[越大越前]',
  `comment_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '允许评论',
  `flag` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '属性',
  `jump_url` varchar(200) NOT NULL DEFAULT '',
  `delete_status` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '1回收站',
  `audit_status` int(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT '审核状态[0未审核,1通过]',
  `filename` varchar(60) DEFAULT '',
  `template` varchar(60) NOT NULL DEFAULT '',
  `aid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'admin',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#xyh#_tag`;
CREATE TABLE IF NOT EXISTS `#xyh#_tag` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(30) NOT NULL DEFAULT '',
  `num` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '文档数',
  `hit` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '点击数',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '100' COMMENT '排序',
  `add_time` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#xyh#_tag_index`;
CREATE TABLE IF NOT EXISTS `#xyh#_tag_index` (
  `tag_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `arc_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `cid` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `model_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '模型id',
  PRIMARY KEY (`tag_id`,`arc_id`,`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;