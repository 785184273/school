-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 12 月 29 日 03:40
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
  `title` varchar(40) NOT NULL COMMENT '标题',
  `author` varchar(30) NOT NULL COMMENT '作者',
  `content` text COMMENT '内容',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `liuyaninfo`
--

INSERT INTO `liuyaninfo` (`id`, `title`, `author`, `content`, `time`) VALUES
(1, '哦哦哦', '且委屈去', '', '2015-12-27 05:01:28'),
(2, '哦哦哦', '且委屈去', '王企鹅去去去', '2015-12-27 05:01:44'),
(3, '尼玛', '无情的武器去', '而且切22 1 231', '2015-12-28 07:16:30'),
(4, '恶趣味切去', '委屈而且 ', '二维切去切去去', '2015-12-28 08:04:53'),
(5, '为而且请问请问轻轻额', '且委屈且为去去额外企鹅去', '且为且为去而且完全\r\n', '2015-12-28 08:19:09'),
(6, '李文全额轻微轻微 ', ' 喂喂喂切企鹅王企鹅去 ', ' 未全额企鹅王企鹅企鹅 ', '2015-12-28 09:28:40'),
(15, '', '', '&lt;a href=&quot;&quot;&gt;&lt;script&gt;alert(&quot;xss&quot;)&lt;/script&gt;baidu&lt;/a&gt;', '2015-12-28 11:19:45'),
(16, '', '', '&lt;a href=&quot;&quot;&gt;&lt;script&gt;alert(&quot;哦哟哟好叼哦&quot;)&lt;/script&gt;百度&lt;/a&gt;', '2015-12-28 12:38:04'),
(17, '', '', '', '2015-12-29 01:23:12'),
(18, ' 未全额切 ', ' 为轻额切', '轻微轻微切', '2015-12-29 01:23:36'),
(19, ' 为轻微去', ' 请问请问轻微 ', '二维轻微切去', '2015-12-29 01:25:06'),
(20, ' 为轻微去', ' 请问请问切', '轻微轻微去', '2015-12-29 01:32:00'),
(21, '且委屈 ', '为轻微恶趣味', ' 切轻微未全额去', '2015-12-29 03:27:29'),
(22, '话说得好', 'dsadjks', '爱神的箭好事\r\n', '2015-12-29 03:34:09');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `password` varchar(30) NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, '785184273', '123456'),
(3, '3366', '3366');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
