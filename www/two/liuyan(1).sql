-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 11 月 27 日 01:03
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `liuyan`
--

-- --------------------------------------------------------

--
-- 表的结构 `liuyaninfo`
--

CREATE TABLE IF NOT EXISTS `liuyaninfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` varchar(40) NOT NULL COMMENT '留言标题',
  `author` varchar(30) NOT NULL COMMENT '留言作者',
  `content` text COMMENT '留言内容',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '留言时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `liuyaninfo`
--

INSERT INTO `liuyaninfo` (`id`, `title`, `author`, `content`, `time`) VALUES
(10, ' 请问去去去', '我恶趣味恶趣味', ' 请问企鹅求肉而而 ', '2015-11-20 01:54:40'),
(11, '    È¥ Æó¶ìÇëÎÊ', ' Æó¶ìÍõÆó¶ìÍõ', ' Æó¶ìÈ¥ÎÒ', '2015-11-21 03:29:19'),
(12, '     去问问去问问企鹅', '外围王问问', ' 额外而且', '2015-11-21 03:32:27'),
(13, '      企鹅请我请我去请问去 ', '', '去问去去请问去而且', '2015-11-21 04:35:39'),
(14, '草年末', 'XXXX', '傻逼吧你', '2015-11-21 11:49:22'),
(15, '啊啊', '爸爸', '巴拉巴拉', '2015-11-24 06:26:29');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `password` varchar(30) NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, '罗伟', '123456'),
(2, '吴开', '12345');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
