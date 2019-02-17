-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013-12-22 15:38:54
-- 服务器版本: 5.5.34
-- PHP 版本: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `tank`
--

-- --------------------------------------------------------

--
-- 表的结构 `storm_albums`
--

CREATE TABLE IF NOT EXISTS `storm_albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aname` varchar(32) NOT NULL COMMENT '名称',
  `ades` varchar(512) NOT NULL COMMENT '简介',
  `aid` int(11) NOT NULL COMMENT '所属分类',
  `acover` int(11) NOT NULL COMMENT '封面图id',
  `atime` int(11) NOT NULL COMMENT '创建时间',
  `asort` int(11) NOT NULL COMMENT '排序标记',
  PRIMARY KEY (`id`),
  KEY `aid` (`aid`,`acover`,`asort`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='图册表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `storm_albums`
--

INSERT INTO `storm_albums` (`id`, `aname`, `ades`, `aid`, `acover`, `atime`, `asort`) VALUES
(2, '测试', '测试相册\r\n\r\n  测试', 1, 20, 1386478624, 20),
(3, '商业测试', '商业\r\n\r\n测试', 2, 0, 1386478942, 10);

-- --------------------------------------------------------

--
-- 表的结构 `storm_albumsclass`
--

CREATE TABLE IF NOT EXISTS `storm_albumsclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(32) NOT NULL COMMENT '名称',
  `csort` int(4) NOT NULL COMMENT '排序',
  `ctime` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='相册类型表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `storm_albumsclass`
--

INSERT INTO `storm_albumsclass` (`id`, `cname`, `csort`, `ctime`) VALUES
(1, '别墅', 10, 1386465681),
(2, '商业', 3, 1386465850);

-- --------------------------------------------------------

--
-- 表的结构 `storm_artclass`
--

CREATE TABLE IF NOT EXISTS `storm_artclass` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `classname` varchar(20) NOT NULL COMMENT '类型名称',
  `pid` tinyint(4) NOT NULL COMMENT '父级id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章分类表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `storm_artclass`
--

INSERT INTO `storm_artclass` (`id`, `classname`, `pid`) VALUES
(1, '项目动态', 1),
(2, '媒体报道', 2),
(3, '时事纵横', 3);

-- --------------------------------------------------------

--
-- 表的结构 `storm_article`
--

CREATE TABLE IF NOT EXISTS `storm_article` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `arttype` varchar(32) NOT NULL COMMENT '文章类型',
  `arttitle` varchar(256) NOT NULL COMMENT '文章标题',
  `artauthor` varchar(32) NOT NULL COMMENT '作者',
  `artsource` varchar(256) NOT NULL COMMENT '文章来源',
  `outlink` varchar(256) NOT NULL COMMENT '外链地址',
  `arttime` datetime NOT NULL COMMENT '文章发布时间',
  `artthumb` varchar(512) NOT NULL COMMENT '文章示意图',
  `indexthumb` varchar(512) NOT NULL COMMENT '首页缩略图',
  `artdes` varchar(512) NOT NULL COMMENT '文章简述',
  `artcontent` text NOT NULL COMMENT '文章正文',
  `artuptop` tinyint(2) NOT NULL COMMENT '置顶',
  `artaudit` tinyint(2) NOT NULL COMMENT '审核',
  `artfirst` tinyint(2) NOT NULL COMMENT '头条',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章表' AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `storm_article`
--

INSERT INTO `storm_article` (`id`, `arttype`, `arttitle`, `artauthor`, `artsource`, `outlink`, `arttime`, `artthumb`, `indexthumb`, `artdes`, `artcontent`, `artuptop`, `artaudit`, `artfirst`) VALUES
(1, '1', '测试', 'admin', '百度', 'http://www.baidu.com', '2010-09-27 12:00:12', '', '', '1234564646', '1234564646dddd', 0, 0, 0),
(2, '1', '测试', 'admin', '百度', 'http://www.baidu.com', '2010-09-27 12:00:12', '', '', '1234564646', '1234564646dddd', 0, 0, 0),
(3, '1', '测试', 'admin', '百度', 'http://www.baidu.com', '2010-09-27 12:00:12', '', '', '1234564646', '1234564646dddd', 0, 1, 0),
(5, '1', '测试', 'admin', '百度', 'http://www.baidu.com', '2010-09-27 12:00:12', '', '', '1234564646', '1234564646dddd', 0, 0, 0),
(7, '1', '测试', 'admin', '百度', 'http://www.baidu.com', '2010-09-27 12:00:12', '<img src="http://localhost/utf8/demo/attached/20110929131942_10406.jpg" alt="" border="0" /><br />', '', '1234564646', '1234564646dddd', 1, 0, 1),
(8, '2', '测试', 'admin', '百度', 'http://www.baidu.com', '2010-09-27 12:00:12', '', '', '1234564646', '1234564646dddd', 0, 0, 0),
(9, '2', '测试', 'admin', '百度', 'http://www.baidu.com', '2010-09-27 12:00:12', '', '', '1234564646', '1234564646dddd', 0, 0, 0),
(10, '2', '测试', 'admin', '百度', 'http://www.baidu.com', '2010-09-27 12:00:12', '', '', '1234564646', '1234564646dddd', 0, 0, 0),
(11, '2', '测试11', 'admin', '百度', 'http://www.baidu.com', '2010-09-27 12:00:12', '', '', '1234564646', '1234564646dddd', 1, 1, 0),
(12, '2', '测试', 'admin', '百度', 'http://www.baidu.com', '2010-09-27 12:00:12', '', '', '1234564646', '1234564646dddd', 0, 0, 0),
(13, '2', '测试', 'admin', '百度', 'http://www.baidu.com', '2010-09-27 12:00:12', '', '', '1234564646', '1234564646dddd', 0, 1, 0),
(14, '2', '测试', 'admin', '百度', 'http://www.baidu.com', '2010-09-27 12:00:12', '', '', '1234564646', '1234564646dddd', 0, 0, 0),
(15, '2', '测试', 'admin', '网易', 'http://www.163.com', '2010-09-27 12:00:12', '', '', '1234564646', '1234564646dddd', 0, 0, 0),
(16, '1', '原-时事纵横', 'admin', '腾讯', 'http://www.qq.com', '2010-09-27 12:00:12', '', '', '1234564646', '<p>1234564646dddd</p>\r\n<p>&nbsp;</p>\r\n<p>发达的的的啊的</p>\r\n<p>大的大的大 </p>', 0, 1, 1),
(18, '2', '测试18', 'admin', '网易', 'http://www.163.com', '2010-09-27 12:00:12', '', '', '1234564646', '1234564646dddd', 0, 1, 0),
(19, '2', '测试', 'admin', '网易', 'http://www.163.com', '2010-09-27 12:00:12', '', '', '1234564646', '1234564646dddd', 0, 0, 0),
(20, '2', '测试', 'admin', '网易', 'http://www.163.com', '2010-09-27 12:00:12', '', '', '1234564646', '1234564646dddd', 0, 1, 0),
(21, '2', '测试', 'admin', '网易', 'http://www.163.com', '2010-09-27 12:00:12', '', '', '1234564646ddfadfd', '<p>1234564646dddd</p>\r\n<p>&nbsp;</p>\r\n<p>d</p>\r\n<p>&nbsp;fad </p>', 0, 1, 0),
(22, '2', '测试', 'admin', '网易', 'http://www.163.com', '2010-09-27 12:00:12', '', '', '1234564646', '1234564646dddd', 0, 0, 0),
(23, '1', 'xheditor测试', 'storm', '', '', '2011-05-30 10:48:26', '', '', '', 'xheditor测试xheditor测试xheditor测试', 0, 1, 0),
(24, '2', '100', 'storm', '', '', '2011-07-27 11:01:55', '', '', '100100', '<p>100100100</p>\r\n<p>&nbsp;</p>\r\n<p>100100</p>', 0, 0, 0),
(25, '1', '呵呵-2011-09-29', 'admin', 'w', 'w', '2011-09-29 11:09:39', '<img src="http://localhost/utf8/demo/attached/20110929110951_87277.jpg" alt="" border="0" /><br />', '', 'ddfda', '<p>&nbsp;</p>\r\n<p>d</p>\r\n<p>afd</p>\r\n<p>&nbsp;</p>\r\n<p>ad</p>\r\n<p>&nbsp;</p>\r\n<p>d</p>\r\n<p>fd</p>', 0, 1, 0),
(26, '3', '二〇一三年十一月二十四日', 'admin', '', '', '2013-11-24 14:29:44', '', '', '二〇一三年十一月二十四日', '2013-11-24', 0, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `storm_authgroup`
--

CREATE TABLE IF NOT EXISTS `storm_authgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL COMMENT '权限组名称',
  `grouplist` varchar(1024) NOT NULL COMMENT '当前组所拥有权限列表',
  `groupsum` int(8) NOT NULL COMMENT '当前组成员数量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户权限组表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `storm_authgroup`
--

INSERT INTO `storm_authgroup` (`id`, `groupname`, `grouplist`, `groupsum`) VALUES
(1, '超级管理员', '6,8,7,10,9,11,12,14,15', 2),
(4, '资料管理员', '', 1),
(5, '商品管理员', '', 1),
(6, '招聘专员', '11,12,13,14,15', 1);

-- --------------------------------------------------------

--
-- 表的结构 `storm_authnode`
--

CREATE TABLE IF NOT EXISTS `storm_authnode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nodename` varchar(128) CHARACTER SET utf8mb4 NOT NULL COMMENT '名称',
  `nodemark` varchar(128) CHARACTER SET utf8mb4 NOT NULL COMMENT '识别标记',
  `nodedes` varchar(256) CHARACTER SET utf8mb4 NOT NULL COMMENT '简述',
  `nodefid` int(11) NOT NULL COMMENT '父节点',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='权限节点表' AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `storm_authnode`
--

INSERT INTO `storm_authnode` (`id`, `nodename`, `nodemark`, `nodedes`, `nodefid`) VALUES
(10, '置顶文章', 'arttop', '置顶文章', 7),
(9, '发布文章', 'artauth', '发布文章', 7),
(8, '文章类别管理', 'articlesclass', '文章类别管理', 6),
(7, '文章列表', 'articleslist', '文章列表', 6),
(6, '文章管理', 'articles', '文章管理', 0),
(11, '招聘管理', 'zhaopin', '招聘管理', 0),
(12, '招聘列表', 'recmg', '招聘列表', 11),
(13, '默认', 'default', '默认', 0),
(14, '添加招聘', 'recedit', '添加招聘', 11),
(15, '招聘类别管理', 'recclass', '招聘类别管理', 11);

-- --------------------------------------------------------

--
-- 表的结构 `storm_coe`
--

CREATE TABLE IF NOT EXISTS `storm_coe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coedate` varchar(128) NOT NULL COMMENT '事件日期',
  `coecontent` varchar(512) NOT NULL COMMENT '事件内容',
  `coeyearid` int(11) NOT NULL COMMENT '所属年份',
  `coeupdate` datetime NOT NULL COMMENT '发布时间',
  `coestate` tinyint(4) NOT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='公司大事记内容' AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `storm_coe`
--

INSERT INTO `storm_coe` (`id`, `coedate`, `coecontent`, `coeyearid`, `coeupdate`, `coestate`) VALUES
(23, '二〇一三年十一月二十四日', '地方的', 15, '2013-11-24 15:39:21', 0),
(3, '2004年1月1日', '2004年1月1日2004年1月1日', 2, '2011-08-03 13:10:10', 1),
(4, '2005年1月1日', '2005年1月1日2005年1月1日', 3, '2011-08-03 13:10:21', 0),
(5, '2006年1月1日', '2006年1月1日2006年1月1日', 4, '2011-08-03 13:10:30', 1),
(6, '2007年1月1日', '2007年1月1日2007年1月1日', 5, '2011-08-03 13:10:44', 1),
(7, '2009年1月1日', '2009年1月1日2009年1月1日', 7, '2011-08-03 13:10:54', 1),
(8, '2010年1月1日', '2010年1月1日2010年1月1日', 8, '2011-08-03 13:11:04', 1),
(9, '2011年1月1日', '2011年1月1日2011年1月1日2011年1月1日2011年1月1日2011年1月1日2011年1月1日2011年1月1日2011年1月1日2011年1月1日2011年1月1日2011年1月1日2011年1月1日2011年1月1日2011年1月1日2011年1月1日2011年1月1日2011年1月1日2011年1月1日2011年1月1日', 9, '2011-08-03 13:11:15', 1),
(11, '2010年1月2号', '2010年1月2号2010年1月2号', 8, '2011-08-03 16:40:35', 1),
(12, '2010年1月3号', '2010年1月3号2010年1月2号', 8, '2011-08-03 16:40:35', 1),
(13, '2010年1月4号', '2010年1月4号2010年1月2号', 8, '2011-08-03 16:40:35', 1),
(14, '2010年1月5号', '2010年1月5号2010年1月2号', 8, '2011-08-03 16:40:35', 1),
(15, '2010年1月6号', '2010年1月6号2010年1月2号', 8, '2011-08-03 16:40:35', 1),
(16, '2010年1月7号', '2010年1月7号2010年1月2号', 8, '2011-08-03 16:40:35', 1),
(17, '2011年1月2号', '2011年1月2号2010年1月2号', 9, '2011-08-03 16:40:35', 1),
(18, '2011年1月3号', '2011年1月3号2010年1月2号', 9, '2011-08-03 16:40:35', 1),
(19, '2011年1月4号', '2011年1月4号2010年1月2号', 9, '2011-08-03 16:40:35', 0),
(20, '2011年1月5号', '2011年1月5号2010年1月2号', 9, '2011-08-03 16:40:35', 1),
(21, '2011年1月6号', '2011年1月6号2010年1月2号', 9, '2011-08-03 16:40:35', 1),
(22, '2011年9月27日', '鈤哈哈', 9, '2011-09-27 14:41:10', 1);

-- --------------------------------------------------------

--
-- 表的结构 `storm_coeclass`
--

CREATE TABLE IF NOT EXISTS `storm_coeclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coeyear` varchar(64) NOT NULL COMMENT '年份',
  `markid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='公司大事记年份' AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `storm_coeclass`
--

INSERT INTO `storm_coeclass` (`id`, `coeyear`, `markid`) VALUES
(1, '2003', 1),
(2, '2004', 2),
(3, '2005', 3),
(4, '2006', 4),
(5, '2007', 5),
(6, '2008', 6),
(7, '2009', 7),
(8, '2010', 8),
(9, '2011', 9),
(10, '2012', 10),
(11, '2013', 11),
(12, '2014', 12),
(13, '2015', 13),
(14, '2016', 14),
(15, '2017', 15),
(16, '2018', 16),
(17, '2019', 17),
(18, '2020', 18),
(19, '2021', 19);

-- --------------------------------------------------------

--
-- 表的结构 `storm_files`
--

CREATE TABLE IF NOT EXISTS `storm_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filepath` varchar(256) NOT NULL COMMENT '文件路径',
  `filename` varchar(256) NOT NULL COMMENT '名称',
  `fileext` varchar(32) NOT NULL COMMENT '扩展名',
  `filesize` varchar(32) NOT NULL COMMENT '文件大小',
  `filedes` varchar(512) NOT NULL COMMENT '简述',
  `uptime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uptime` (`uptime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='资料上传下载' AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `storm_files`
--

INSERT INTO `storm_files` (`id`, `filepath`, `filename`, `fileext`, `filesize`, `filedes`, `uptime`) VALUES
(18, '../attached/down/jpg_1dfdb6fb00c98503350af9418cc9b051_59520.jpg', 'dxcz2013-12-06哈哈', 'jpg', '14KB', 'dxcz.jpg\r\n\r\n    哈哈哈', 1386334591),
(16, '../attached/down/jpg_1dfdb6fb00c98503350af9418cc9b051_44892.jpg', 'd50', 'jpg', '5KB', 'd50.jpg', 1386334591),
(14, '../attached/down/jpg_1dfdb6fb00c98503350af9418cc9b051_36332.jpg', 'd20', 'jpg', '5KB', 'd20.jpg', 1386334591);

-- --------------------------------------------------------

--
-- 表的结构 `storm_honour`
--

CREATE TABLE IF NOT EXISTS `storm_honour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hondate` varchar(64) NOT NULL COMMENT '获得荣誉时间',
  `honct` varchar(256) NOT NULL COMMENT '荣誉内容',
  `honupdate` datetime NOT NULL COMMENT '更新时间',
  `honstate` tinyint(4) NOT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='集团荣誉表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `storm_honour`
--

INSERT INTO `storm_honour` (`id`, `hondate`, `honct`, `honupdate`, `honstate`) VALUES
(2, '2011-09-27', '2011-09-27 11:10:50', '2011-09-27 11:10:43', 1),
(3, '二〇一三年十一月二十四日', '2013年11月24日', '2013-11-24 15:57:22', 1);

-- --------------------------------------------------------

--
-- 表的结构 `storm_ipaddress`
--

CREATE TABLE IF NOT EXISTS `storm_ipaddress` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `ipaddress` varchar(64) NOT NULL COMMENT 'ip地址',
  `iptype` tinyint(2) NOT NULL COMMENT '类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='ip限制' AUTO_INCREMENT=262 ;

--
-- 转存表中的数据 `storm_ipaddress`
--

INSERT INTO `storm_ipaddress` (`id`, `ipaddress`, `iptype`) VALUES
(1, '127.0.0.1', 1),
(2, '124.126.0.0', 1),
(3, '124.126.0.1', 1),
(4, '124.126.0.2', 1),
(5, '124.126.0.3', 1),
(6, '124.126.0.4', 1),
(7, '124.126.0.5', 1),
(8, '124.126.0.6', 1),
(9, '124.126.0.7', 1),
(10, '124.126.0.8', 1),
(11, '124.126.0.9', 1),
(12, '124.126.0.10', 1),
(13, '124.126.0.11', 1),
(14, '124.126.0.12', 1),
(15, '124.126.0.13', 1),
(16, '124.126.0.14', 1),
(17, '124.126.0.15', 1),
(18, '124.126.0.16', 1),
(19, '124.126.0.17', 1),
(20, '124.126.0.18', 1),
(21, '124.126.0.19', 1),
(22, '124.126.0.20', 1),
(23, '124.126.0.21', 1),
(24, '124.126.0.22', 1),
(25, '124.126.0.23', 1),
(26, '124.126.0.24', 1),
(27, '124.126.0.25', 1),
(28, '124.126.0.26', 1),
(29, '124.126.0.27', 1),
(30, '124.126.0.28', 1),
(31, '124.126.0.29', 1),
(32, '124.126.0.30', 1),
(33, '124.126.0.31', 1),
(34, '124.126.0.32', 1),
(35, '124.126.0.33', 1),
(36, '124.126.0.34', 1),
(37, '124.126.0.35', 1),
(38, '124.126.0.36', 1),
(39, '124.126.0.37', 1),
(40, '124.126.0.38', 1),
(41, '124.126.0.39', 1),
(42, '124.126.0.40', 1),
(43, '124.126.0.41', 1),
(44, '124.126.0.42', 1),
(45, '124.126.0.43', 1),
(46, '124.126.0.44', 1),
(47, '124.126.0.45', 1),
(48, '124.126.0.46', 1),
(49, '124.126.0.47', 1),
(50, '124.126.0.48', 1),
(51, '124.126.0.49', 1),
(52, '124.126.0.50', 1),
(53, '124.126.0.51', 1),
(54, '124.126.0.52', 1),
(55, '124.126.0.53', 1),
(56, '124.126.0.54', 1),
(57, '124.126.0.55', 1),
(58, '124.126.0.56', 1),
(59, '124.126.0.57', 1),
(60, '124.126.0.58', 1),
(61, '124.126.0.59', 1),
(62, '124.126.0.60', 1),
(63, '124.126.0.61', 1),
(64, '124.126.0.62', 1),
(65, '124.126.0.63', 1),
(66, '124.126.0.64', 1),
(67, '124.126.0.65', 1),
(68, '124.126.0.66', 1),
(69, '124.126.0.67', 1),
(70, '124.126.0.68', 1),
(71, '124.126.0.69', 1),
(72, '124.126.0.70', 1),
(73, '124.126.0.71', 1),
(74, '124.126.0.72', 1),
(75, '124.126.0.73', 1),
(76, '124.126.0.74', 1),
(77, '124.126.0.75', 1),
(78, '124.126.0.76', 1),
(79, '124.126.0.77', 1),
(80, '124.126.0.78', 1),
(81, '124.126.0.79', 1),
(82, '124.126.0.80', 1),
(83, '124.126.0.81', 1),
(84, '124.126.0.82', 1),
(85, '124.126.0.83', 1),
(86, '124.126.0.84', 1),
(87, '124.126.0.85', 1),
(88, '124.126.0.86', 1),
(89, '124.126.0.87', 1),
(90, '124.126.0.88', 1),
(91, '124.126.0.89', 1),
(92, '124.126.0.90', 1),
(93, '124.126.0.91', 1),
(94, '124.126.0.92', 1),
(95, '124.126.0.93', 1),
(96, '124.126.0.94', 1),
(97, '124.126.0.95', 1),
(98, '124.126.0.96', 1),
(99, '124.126.0.97', 1),
(100, '124.126.0.98', 1),
(101, '124.126.0.99', 1),
(102, '124.126.0.100', 1),
(103, '124.126.0.101', 1),
(104, '124.126.0.102', 1),
(105, '124.126.0.103', 1),
(106, '124.126.0.104', 1),
(107, '124.126.0.105', 1),
(108, '124.126.0.106', 1),
(109, '124.126.0.107', 1),
(110, '124.126.0.108', 1),
(111, '124.126.0.109', 1),
(112, '124.126.0.110', 1),
(113, '124.126.0.111', 1),
(114, '124.126.0.112', 1),
(115, '124.126.0.113', 1),
(116, '124.126.0.114', 1),
(117, '124.126.0.115', 1),
(118, '124.126.0.116', 1),
(119, '124.126.0.117', 1),
(120, '124.126.0.118', 1),
(121, '124.126.0.119', 1),
(122, '124.126.0.120', 1),
(123, '124.126.0.121', 1),
(124, '124.126.0.122', 1),
(125, '124.126.0.123', 1),
(126, '124.126.0.124', 1),
(127, '124.126.0.125', 1),
(128, '124.126.0.126', 1),
(129, '124.126.0.127', 1),
(130, '124.126.0.128', 1),
(131, '124.126.0.129', 1),
(132, '124.126.0.130', 1),
(133, '124.126.0.131', 1),
(134, '124.126.0.132', 1),
(135, '124.126.0.133', 1),
(136, '124.126.0.134', 1),
(137, '124.126.0.135', 1),
(138, '124.126.0.136', 1),
(139, '124.126.0.137', 1),
(140, '124.126.0.138', 1),
(141, '124.126.0.139', 1),
(142, '124.126.0.140', 1),
(143, '124.126.0.141', 1),
(144, '124.126.0.142', 1),
(145, '124.126.0.143', 1),
(146, '124.126.0.144', 1),
(147, '124.126.0.145', 1),
(148, '124.126.0.146', 1),
(149, '124.126.0.147', 1),
(150, '124.126.0.148', 1),
(151, '124.126.0.149', 1),
(152, '124.126.0.150', 1),
(153, '124.126.0.151', 1),
(154, '124.126.0.152', 1),
(155, '124.126.0.153', 1),
(156, '124.126.0.154', 1),
(157, '124.126.0.155', 1),
(158, '124.126.0.156', 1),
(159, '124.126.0.157', 1),
(160, '124.126.0.158', 1),
(161, '124.126.0.159', 1),
(162, '124.126.0.160', 1),
(163, '124.126.0.161', 1),
(164, '124.126.0.162', 1),
(165, '124.126.0.163', 1),
(166, '124.126.0.164', 1),
(167, '124.126.0.165', 1),
(168, '124.126.0.166', 1),
(169, '124.126.0.167', 1),
(170, '124.126.0.168', 1),
(171, '124.126.0.169', 1),
(172, '124.126.0.170', 1),
(173, '124.126.0.171', 1),
(174, '124.126.0.172', 1),
(175, '124.126.0.173', 1),
(176, '124.126.0.174', 1),
(177, '124.126.0.175', 1),
(178, '124.126.0.176', 1),
(179, '124.126.0.177', 1),
(180, '124.126.0.178', 1),
(181, '124.126.0.179', 1),
(182, '124.126.0.180', 1),
(183, '124.126.0.181', 1),
(184, '124.126.0.182', 1),
(185, '124.126.0.183', 1),
(186, '124.126.0.184', 1),
(187, '124.126.0.185', 1),
(188, '124.126.0.186', 1),
(189, '124.126.0.187', 1),
(190, '124.126.0.188', 1),
(191, '124.126.0.189', 1),
(192, '124.126.0.190', 1),
(193, '124.126.0.191', 1),
(194, '124.126.0.192', 1),
(195, '124.126.0.193', 1),
(196, '124.126.0.194', 1),
(197, '124.126.0.195', 1),
(198, '124.126.0.196', 1),
(199, '124.126.0.197', 1),
(200, '124.126.0.198', 1),
(201, '124.126.0.199', 1),
(202, '124.126.0.200', 1),
(203, '124.126.0.201', 1),
(204, '124.126.0.202', 1),
(205, '124.126.0.203', 1),
(206, '124.126.0.204', 1),
(207, '124.126.0.205', 1),
(208, '124.126.0.206', 1),
(209, '124.126.0.207', 1),
(210, '124.126.0.208', 1),
(211, '124.126.0.209', 1),
(212, '124.126.0.210', 1),
(213, '124.126.0.211', 1),
(214, '124.126.0.212', 1),
(215, '124.126.0.213', 1),
(216, '124.126.0.214', 1),
(217, '124.126.0.215', 1),
(218, '124.126.0.216', 1),
(219, '124.126.0.217', 1),
(220, '124.126.0.218', 1),
(221, '124.126.0.219', 1),
(222, '124.126.0.220', 1),
(223, '124.126.0.221', 1),
(224, '124.126.0.222', 1),
(225, '124.126.0.223', 1),
(226, '124.126.0.224', 1),
(227, '124.126.0.225', 1),
(228, '124.126.0.226', 1),
(229, '124.126.0.227', 1),
(230, '124.126.0.228', 1),
(231, '124.126.0.229', 1),
(232, '124.126.0.230', 1),
(233, '124.126.0.231', 1),
(234, '124.126.0.232', 1),
(235, '124.126.0.233', 1),
(241, '124.126.0.239', 1),
(242, '124.126.0.240', 1),
(243, '124.126.0.241', 1),
(244, '124.126.0.242', 1),
(245, '124.126.0.243', 1),
(246, '124.126.0.244', 1),
(247, '124.126.0.245', 1),
(249, '124.126.0.247', 1),
(250, '124.126.0.248', 1),
(251, '124.126.0.249', 1),
(252, '124.126.0.250', 1),
(253, '124.126.0.251', 1),
(254, '124.126.0.252', 1),
(255, '124.126.0.253', 1),
(258, '124.126.0.254', 1),
(259, '124.126.0.255', 1),
(260, '124.126.0.234', 1),
(261, '124.126.0.235', 1);

-- --------------------------------------------------------

--
-- 表的结构 `storm_log`
--

CREATE TABLE IF NOT EXISTS `storm_log` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(32) NOT NULL COMMENT '操作者',
  `ipaddress` varchar(32) NOT NULL COMMENT 'IP地址',
  `logintime` datetime NOT NULL COMMENT '上次登录时间',
  `caozuo` varchar(128) NOT NULL COMMENT '操作',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='log表' AUTO_INCREMENT=70 ;

--
-- 转存表中的数据 `storm_log`
--

INSERT INTO `storm_log` (`id`, `username`, `ipaddress`, `logintime`, `caozuo`) VALUES
(53, 'admin', '127.0.0.1', '2013-12-02 19:16:39', '登录成功'),
(52, 'admin', '127.0.0.1', '2013-12-01 14:57:47', '登录成功'),
(51, 'test33', '127.0.0.1', '2013-12-01 14:22:18', '登录成功'),
(50, 'admin', '127.0.0.1', '2013-12-01 12:02:46', '登录成功'),
(28, 'admin', '127.0.0.1', '2011-09-28 10:06:30', '登录成功'),
(29, 'storm', '127.0.0.1', '2011-09-28 13:55:18', '登录成功'),
(30, 'storm', '127.0.0.1', '2011-09-28 14:25:42', '登录成功'),
(31, 'admin', '127.0.0.1', '2011-09-28 17:58:43', '登录成功'),
(32, 'admin', '127.0.0.1', '2011-09-29 10:14:15', '登录成功'),
(33, 'admin', '127.0.0.1', '2013-11-24 11:23:28', '登录成功'),
(34, 'admin', '127.0.0.1', '2013-11-24 12:44:04', '登录成功'),
(49, 'admin', '127.0.0.1', '2013-11-24 17:40:56', '登录成功'),
(36, 'admin', '127.0.0.1', '2013-11-24 12:44:20', '登录成功'),
(48, 'admin', '127.0.0.1', '2013-11-24 17:39:41', '登录成功'),
(38, 'admin', '127.0.0.1', '2013-11-24 12:50:28', '登录成功'),
(39, 'admin', '127.0.0.1', '2013-11-24 12:57:31', '登录成功'),
(40, 'admin', '127.0.0.1', '2013-11-24 12:57:38', '登录成功'),
(41, 'admin', '127.0.0.1', '2013-11-24 13:00:57', '登录成功'),
(42, 'admin', '127.0.0.1', '2013-11-24 13:01:05', '登录成功'),
(43, 'admin', '127.0.0.1', '2013-11-24 13:01:13', '登录成功'),
(44, 'admin', '127.0.0.1', '2013-11-24 13:06:22', '登录成功'),
(45, 'admin', '127.0.0.1', '2013-11-24 13:07:14', '登录成功'),
(46, 'admin', '127.0.0.1', '2013-11-24 13:08:10', '登录成功'),
(47, 'admin', '127.0.0.1', '2013-11-24 13:08:52', '登录成功'),
(54, 'admin', '127.0.0.1', '2013-12-06 19:11:53', '登录成功'),
(55, 'admin', '127.0.0.1', '2013-12-06 21:39:44', '登录成功'),
(56, 'admin', '127.0.0.1', '2013-12-06 21:40:41', '登录成功'),
(57, 'admin', '127.0.0.1', '2013-12-08 09:04:54', '登录成功'),
(58, 'admin', '127.0.0.1', '2013-12-15 10:59:49', '登录成功'),
(59, 'admin', '127.0.0.1', '2013-12-15 16:20:04', '登录成功'),
(60, 'admin', '127.0.0.1', '2013-12-22 12:37:47', '登录成功'),
(61, 'admin', '127.0.0.1', '2013-12-22 13:27:39', '登录成功'),
(62, 'admin', '127.0.0.1', '2013-12-22 13:31:06', '登录成功'),
(63, 'admin', '127.0.0.1', '2013-12-22 13:55:55', '登录成功'),
(64, 'hr', '127.0.0.1', '2013-12-22 13:57:21', '登录成功'),
(65, 'storm', '127.0.0.1', '2013-12-22 14:17:25', '登录成功'),
(66, 'storm', '127.0.0.1', '2013-12-22 14:17:41', '登录成功'),
(67, 'storm', '127.0.0.1', '2013-12-22 14:18:09', '登录成功'),
(68, 'storm', '127.0.0.1', '2013-12-22 14:20:25', '登录成功'),
(69, 'storm', '127.0.0.1', '2013-12-22 15:16:14', '登录成功');

-- --------------------------------------------------------

--
-- 表的结构 `storm_message`
--

CREATE TABLE IF NOT EXISTS `storm_message` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `meguser` varchar(32) NOT NULL COMMENT '留言人',
  `megemail` varchar(64) NOT NULL COMMENT '邮箱',
  `megtel` varchar(32) NOT NULL COMMENT '电话',
  `megcontent` text NOT NULL COMMENT '内容',
  `megtime` datetime NOT NULL,
  `megstate` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='留言表' AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `storm_message`
--

INSERT INTO `storm_message` (`id`, `meguser`, `megemail`, `megtel`, `megcontent`, `megtime`, `megstate`) VALUES
(1, 'tete', 'dd@163.com', '13522152462', 'dfd d d d d d d d<p>aadfe</p>', '2010-09-26 10:26:20', 1),
(2, 'tete', 'dd@163.com', '13522152462', 'dfd d d d d d d d<p>aadfe</p>', '2010-09-26 10:26:20', 1),
(4, 'tete', 'dd@163.com', '13522152462', 'dfd d d d d d d d<p>aadfe</p>', '2010-09-26 10:26:20', 1),
(5, 'tete', 'dd@163.com', '13522152462', 'dfd d d d d d d d<p>aadfe</p>', '2010-09-26 10:26:20', 1),
(8, 'tete', 'dd@163.com', '13522152462', 'dfd d d d d d d d<p>aadfe</p>', '2010-09-26 10:26:20', 1),
(9, 'tete', 'dd@163.com', '13522152462', 'dfd d d d d d d d<p>aadfe</p>', '2010-09-26 10:26:20', 1),
(10, 'tete', 'dd@163.com', '13522152462', 'dfd d d d d d d d<p>aadfe</p>', '2010-09-26 10:26:20', 1),
(13, '测试留言', '测试留言', '88888', '测试留言测试留言测试留言测试留言\r<br/>\r<br/>\r<br/>测试留言', '2010-11-05 21:04:38', 1),
(20, 'test', 'odsemail@163.com', '13522152462', 'dafooool\rd\rfd\rd\rd fsfooo world', '2011-04-01 16:39:35', 1);

-- --------------------------------------------------------

--
-- 表的结构 `storm_photos`
--

CREATE TABLE IF NOT EXISTS `storm_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL COMMENT '所属相册id',
  `pcover` tinyint(1) NOT NULL COMMENT '是否封面',
  `path` varchar(512) NOT NULL COMMENT '路径',
  `pname` varchar(512) NOT NULL COMMENT '图片名',
  `pext` varchar(32) NOT NULL COMMENT '类型',
  `psize` varchar(32) NOT NULL COMMENT '大小',
  `ptime` int(11) NOT NULL COMMENT '上传时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='照片表' AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `storm_photos`
--

INSERT INTO `storm_photos` (`id`, `aid`, `pcover`, `path`, `pname`, `pext`, `psize`, `ptime`) VALUES
(17, 2, 0, '../albums/2/jpg_4c130918334d95197676a196495291b3_56784.jpg', 'qqyxd', 'jpg', '7KB', 1386480797),
(16, 2, 0, '../albums/2/jpg_4c130918334d95197676a196495291b3_24790.jpg', 'qqsg', 'jpg', '7KB', 1386480797),
(13, 2, 0, '../albums/2/jpg_4c130918334d95197676a196495291b3_55380.jpg', 'jr', 'jpg', '5KB', 1386480797),
(15, 2, 0, '../albums/2/jpg_4c130918334d95197676a196495291b3_76778.jpg', 'qqhx', 'jpg', '8KB', 1386480797),
(14, 2, 0, '../albums/2/jpg_4c130918334d95197676a196495291b3_61526.jpg', 'jy', 'jpg', '6KB', 1386480797),
(12, 2, 0, '../albums/2/jpg_4c130918334d95197676a196495291b3_55009.jpg', 'gy', 'jpg', '6KB', 1386480797),
(11, 2, 0, '../albums/2/jpg_4c130918334d95197676a196495291b3_65894.jpg', 'gdyx', 'jpg', '4KB', 1386480797),
(10, 2, 0, '../albums/2/jpg_4c130918334d95197676a196495291b3_76502.jpg', 'dnf', 'jpg', '5KB', 1386480797),
(18, 2, 0, '../albums/2/jpg_4c130918334d95197676a196495291b3_41802.jpg', 'qqzt', 'jpg', '6KB', 1386480797),
(19, 2, 0, '../albums/2/jpg_6d6d6b697908a2a258cbe772462d090d_49979.jpg', 'sd', 'jpg', '5KB', 1386480798),
(20, 2, 1, '../albums/2/jpg_65c9e39845f4dac3548297aacfb32300_85707.jpg', '店招2', 'jpg', '62KB', 1386480843);

-- --------------------------------------------------------

--
-- 表的结构 `storm_question`
--

CREATE TABLE IF NOT EXISTS `storm_question` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `queuser` varchar(32) NOT NULL COMMENT '留言人',
  `quemail` varchar(64) NOT NULL COMMENT '邮箱',
  `tel` varchar(16) NOT NULL COMMENT '电话',
  `quecontent` text NOT NULL COMMENT '内容',
  `quetime` datetime NOT NULL,
  `questate` int(2) NOT NULL,
  `querep` varchar(300) NOT NULL COMMENT '回复',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='留言表' AUTO_INCREMENT=55 ;

--
-- 转存表中的数据 `storm_question`
--

INSERT INTO `storm_question` (`id`, `queuser`, `quemail`, `tel`, `quecontent`, `quetime`, `questate`, `querep`) VALUES
(13, 'tabooc', 'tabooc@163.com', '', 'kk ee<a href="http://www.baidu.com">baidu</a>', '2010-09-26 13:10:10', 1, ''),
(14, 'tabooc', 'tabooc@163.com', '', 'kk ee<a href="http://www.baidu.com">baidu</a>', '2010-09-26 13:10:10', 1, 'ww'),
(15, 'tabooc', 'tabooc@163.com', '', 'kk ee<a href="http://www.baidu.com">baidu</a>', '2010-09-26 13:10:10', 1, ''),
(16, 'tabooc', 'tabooc@163.com', '', 'kk ee<a href="http://www.baidu.com">baidu</a>', '2010-09-26 13:10:10', 1, ''),
(17, 'tabooc', 'tabooc@163.com', '', 'kk ee<a href="http://www.baidu.com">baidu</a>', '2010-09-26 13:10:10', 0, ''),
(18, 'tabooc', 'tabooc@163.com', '', 'kk ee<a href="http://www.baidu.com">baidu</a>dfadfdfdafadfdfdfettaccvcvc  dfddadfdfdddfaf', '2010-09-26 13:10:10', 1, '18 回复\r<br/>\r<br/>\r<br/>18\r<br/>\r<br/>  回复'),
(19, 'tabooc', 'tabooc@163.com', '', 'kk ee<a href="http://www.baidu.com">baidu</a>dfadfdfdafadfdfdfettaccvcvc  dfddadfdfdddfaf', '2010-09-26 13:10:10', 1, ''),
(20, 'tabooc', 'tabooc@163.com', '', 'kk ee<a href="http://www.baidu.com">baidu</a>dfadfdfdafadfdfdfettaccvcvc  dfddadfdfdddfaf', '2010-09-26 13:10:10', 0, ''),
(21, 'tabooc', 'tabooc@163.com', '', 'kk ee<a href="http://www.baidu.com">baidu</a>dfadfdfdafadfdfdfettaccvcvc  dfddadfdfdddfaf', '2010-09-26 13:10:10', 1, ''),
(24, '大幅度', '大法', '', '爱的发短', '2010-11-05 21:18:49', 0, ''),
(28, 'dfadfd', 'tabooc@163.com', '13522152462', 'dafdafddddddd\r<br/>\r<br/>d\r<br/>f dfdddddddddddddd', '2011-04-01 15:48:38', 1, 'rr'),
(38, 'tabooc', 'odsemail@163.com', '13522152462', 'username', '2011-04-01 16:14:19', 1, ''),
(47, '哈哈', 'odsemail@163.com', '13522152462', '哈哈哈哈哈哈哈\r哈哈哈 呵呵呵 嘿嘿', '2011-04-01 16:42:43', 1, '啦啦啦'),
(48, '哈哈', 'odsemail@163.com', '13522152462', '等发达\r<br/>\r<br/>哦哦哦', '2011-04-01 16:44:34', 1, '哦哦大'),
(49, 'admin', 'odsemail@163.com', '13522152462', '&meta http-equiv=quotrefreshquot content=quot0;URL=index.phpquot /<', '2011-04-01 16:46:17', 1, '测试'),
(50, 'storm', 'tabooc@163.com', '13522152462', '&a href=', '2011-04-01 16:49:50', 0, ''),
(51, 'storm', 'odsemail@163.com', '13522152462', '&lt;meta http-equiv=&quot;refresh&quot; cONtent=&quot;0;URL=index.php&quot; /&gt; <br/>&lt;div style=&＃39;color:#F00&＃39;&gt;&lt;font size=&＃39;+2&＃39;&gt;哈哈&lt;/font&gt;&lt;/div&gt;', '2011-04-01 16:53:32', 1, '666'),
(52, 'admin', 'odsemail@163.com', '13522152462', '等发达 <br/> <br/>哦哦哦 <br/> <br/>忽忽', '2011-04-01 16:57:31', 1, '功能测试');

-- --------------------------------------------------------

--
-- 表的结构 `storm_rec`
--

CREATE TABLE IF NOT EXISTS `storm_rec` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `zhiwei` varchar(32) NOT NULL COMMENT '职位',
  `xingzhi` varchar(32) NOT NULL COMMENT '职位性质',
  `zptime` date NOT NULL COMMENT '发布时间',
  `gzyear` varchar(32) NOT NULL COMMENT '工作经验',
  `xueli` varchar(32) NOT NULL COMMENT '学历要求',
  `number` varchar(16) NOT NULL COMMENT '招聘人数',
  `yuyan` varchar(32) NOT NULL COMMENT '语言',
  `yuexin` varchar(32) NOT NULL COMMENT '月薪',
  `jlyy` varchar(32) NOT NULL COMMENT '简历语言',
  `place` varchar(64) NOT NULL COMMENT '工作地点',
  `miaoshu` text NOT NULL COMMENT '职位描述',
  `recstate` tinyint(3) NOT NULL COMMENT '状态',
  `leixing` varchar(32) NOT NULL COMMENT '招聘类型',
  `uptop` tinyint(2) NOT NULL COMMENT '是否置顶',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='人才招聘' AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `storm_rec`
--

INSERT INTO `storm_rec` (`id`, `zhiwei`, `xingzhi`, `zptime`, `gzyear`, `xueli`, `number`, `yuyan`, `yuexin`, `jlyy`, `place`, `miaoshu`, `recstate`, `leixing`, `uptop`) VALUES
(1, '物业工程部主管', '全职', '2010-05-31', '6~7年', '不限', '1', '不限', '3000~3999', '中文', '北京市', 'abc', 0, '2', 0),
(2, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 1, '4', 0),
(3, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 1, '2', 0),
(4, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 1, '2', 0),
(7, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '1', 0, '2', 0),
(10, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 1, '2', 0),
(11, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 1, '2', 0),
(12, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 1, '2', 0),
(13, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 1, '2', 1),
(14, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 0, '2', 0),
(15, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 0, '2', 0),
(16, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 1, '2', 0),
(17, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 0, '2', 0),
(18, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京朝阳区', '<p>teadddfld</p>\r\n<p>&nbsp;</p>\r\n<p>dfa da fd&nbsp; d ad df eeetetqjhjh</p>', 3, '1', 0),
(19, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 1, '2', 0),
(20, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 0, '2', 0),
(21, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 1, '1', 0),
(22, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 0, '1', 0),
(23, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 1, '1', 0),
(24, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '<p>天天</p>', 0, '1', 0),
(25, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', 'ee', 1, '4', 0),
(26, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 1, '1', 0),
(27, '总经理', '全职', '2010-09-26', '3年', '博士后', '3', '简体中文', '2w+', '中文、英文', '北京', '0', 3, '1', 0),
(28, 'CEO', '全职', '2011-09-26', '3~5年', '博士', '3', '中文，日文，韩文', '5w+', '中文，日文，韩文', '北京朝阳', '<p>得分率大幅度哦</p>\r\n<p>&nbsp;</p>\r\n<p>d分爱的啊的对方的份额哦哦的的的 </p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp; 的费德勒到了来的劳动力劳动力劳动力了来了的到了了了 </p>', 1, '3', 1),
(29, '二〇一三年十一月二十四日', '全职', '2013-11-24', '三', '大本', '3', '中文', '20000', '中文', '北京', '社会', 0, '2', 0);

-- --------------------------------------------------------

--
-- 表的结构 `storm_recclass`
--

CREATE TABLE IF NOT EXISTS `storm_recclass` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `zptype` varchar(32) NOT NULL,
  `typeid` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `storm_recclass`
--

INSERT INTO `storm_recclass` (`id`, `zptype`, `typeid`) VALUES
(1, '校园招聘', 1),
(2, '社会招聘', 2),
(3, '海外招聘', 3),
(4, '外星招聘', 4);

-- --------------------------------------------------------

--
-- 表的结构 `storm_user`
--

CREATE TABLE IF NOT EXISTS `storm_user` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `usertype` tinyint(4) NOT NULL COMMENT '管理员类型',
  `userstatus` int(11) NOT NULL COMMENT '用户状态',
  `regtime` datetime NOT NULL,
  `endlogin` datetime NOT NULL COMMENT '最后登录',
  PRIMARY KEY (`id`),
  KEY `usertype` (`usertype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户帐号' AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `storm_user`
--

INSERT INTO `storm_user` (`id`, `username`, `password`, `usertype`, `userstatus`, `regtime`, `endlogin`) VALUES
(1, 'admin', '96e79218965eb72c92a549dd5a330112', 1, 1, '2011-09-23 09:49:57', '2013-12-22 13:55:55'),
(23, 'eewq', 'e10adc3949ba59abbe56e057f20f883e', 5, 1, '2013-12-01 17:21:57', '0000-00-00 00:00:00'),
(19, 'test1', 'e10adc3949ba59abbe56e057f20f883e', 4, 1, '2013-12-01 17:20:58', '0000-00-00 00:00:00'),
(20, 'storm', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2013-12-01 17:21:09', '2013-12-22 15:16:14'),
(24, 'hr', 'e10adc3949ba59abbe56e057f20f883e', 6, 1, '2013-12-22 13:55:16', '2013-12-22 13:57:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
