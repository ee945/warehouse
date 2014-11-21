-- --------------------------------------------------------

--
-- 表的结构 `inf_record`
--

CREATE TABLE IF NOT EXISTS `inf_record` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `style` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `num` int(11) NOT NULL,
  `client` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `remark` text NOT NULL,
  `regtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `inf_record`
--

INSERT INTO `inf_record` (`id`, `date`, `style`, `color`, `size`, `num`, `client`, `location`, `remark`, `regtime`) VALUES
(1, '2014-03-01', 'F001', '黑色', '0码', 501, '', '', '', '2014-03-03 12:56:41'),
(2, '2014-03-01', 'F001', '红色', '0码', 80, '', '', '', '2014-03-03 12:56:41'),
(3, '2014-03-01', 'F001', '黑色', '2码', 90, '', '', '', '2014-03-03 12:56:41'),
(4, '2014-03-01', 'F001', '红色', '2码', 50, '', '', '', '2014-03-03 12:56:41'),
(5, '2014-03-01', 'F002', '黑色', '0码', 50, '', '', '', '2014-03-03 12:56:41'),
(6, '2014-03-01', 'F002', '黑色', '2码', 50, '', '', '', '2014-03-03 12:56:41'),
(7, '2014-03-01', 'F002', '红色', '0码', 50, '', '', '', '2014-03-03 12:56:41'),
(8, '2014-03-01', 'F002', '红色', '2码', 50, '', '', '', '2014-03-03 12:56:41'),
(9, '2014-03-01', 'F004', '红色', '均码', 100, '', '', '', '2014-03-03 12:56:41'),
(10, '2014-03-01', 'F004', '黑色', '2码', 50, '', '', '', '2014-03-03 12:56:41'),
(11, '2014-03-01', 'F004', '红色', '均码', -30, '', '', '', '2014-03-03 12:56:41'),
(12, '2014-03-01', 'F006', '黑色', '0码', 60, '', '', '', '2014-03-03 12:56:41'),
(13, '2014-03-01', 'F003', '白色', '2码', 80, '', '', '', '2014-03-03 12:56:41'),
(14, '2014-03-01', 'ABC', 'LO', '12', 100, 'ABD', '', 'SDF', '2014-03-11 13:00:57'),
(15, '2014-03-01', 'ABC', 'LO', '12', 100, 'ABD', '', 'SDF', '2014-03-11 13:03:24'),
(16, '2014-03-01', 'ABC', 'LO', '12', 50, 'ABD', '', 'SDF', '2014-03-11 13:04:49'),
(17, '2014-03-01', 'ABC', 'LA', '12', 100, 'ABD', '', 'SDF', '2014-03-11 13:14:12'),
(18, '2014-03-01', 'ABC', 'LA', '15', 120, 'ABD', '', 'SDF', '2014-03-11 13:14:57'),
(19, '2014-03-01', 'ABC', 'LA', '14', 100, 'ABD', '', 'SDF', '2014-03-11 13:16:00'),
(20, '2014-03-01', 'sdf', 'df', 'asd', 131, '', '', '', '2014-03-24 06:27:26'),
(21, '2014-04-10', 'F001', '黑色', '0码', -101, '', '', '', '2014-04-10 03:18:48');

-- --------------------------------------------------------

--
-- 表的结构 `inf_user`
--

CREATE TABLE IF NOT EXISTS `inf_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `pass` varchar(64) DEFAULT NULL,
  `nick` varchar(32) DEFAULT NULL,
  `dept` varchar(30) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `access` int(11) DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastdate` datetime DEFAULT NULL,
  `remark` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `inf_user`
--

INSERT INTO `inf_user` (`id`, `name`, `pass`, `nick`, `dept`, `grade`, `access`, `regdate`, `lastdate`, `remark`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'admin', 255, 255, '2014-03-24 06:24:52', NULL, ''),
(2, 'ee945', '81dc9bdb52d04dc20036dbd8313ed055', 'ee945', 'INF', 255, 255, '2013-12-26 07:17:47', '0000-00-00 00:00:00', ''),
(3, 'a1', '81dc9bdb52d04dc20036dbd8313ed055', 'a1', '234', 95, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(4, 'a2', '81dc9bdb52d04dc20036dbd8313ed055', 'a2', '12', 63, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(5, 'a3', '81dc9bdb52d04dc20036dbd8313ed055', 'a3', '1234', 127, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(6, 'a0', '81dc9bdb52d04dc20036dbd8313ed055', 'a0', 'sd', 15, NULL, '2014-03-26 02:47:11', NULL, '');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `inf_v_color`
--
CREATE TABLE IF NOT EXISTS `inf_v_color` (
`style` varchar(20)
,`color` varchar(20)
,`num` decimal(32,0)
);
-- --------------------------------------------------------

--
-- 替换视图以便查看 `inf_v_size`
--
CREATE TABLE IF NOT EXISTS `inf_v_size` (
`style` varchar(20)
,`color` varchar(20)
,`size` varchar(20)
,`num` decimal(32,0)
);
-- --------------------------------------------------------

--
-- 替换视图以便查看 `inf_v_style`
--
CREATE TABLE IF NOT EXISTS `inf_v_style` (
`style` varchar(20)
,`num` decimal(32,0)
);
-- --------------------------------------------------------

--
-- 视图结构 `inf_v_color`
--
DROP TABLE IF EXISTS `inf_v_color`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inf_v_color` AS select `inf_record`.`style` AS `style`,`inf_record`.`color` AS `color`,sum(`inf_record`.`num`) AS `num` from `inf_record` group by `inf_record`.`style`,`inf_record`.`color` order by `inf_record`.`style`,`inf_record`.`color` desc;

-- --------------------------------------------------------

--
-- 视图结构 `inf_v_size`
--
DROP TABLE IF EXISTS `inf_v_size`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inf_v_size` AS select `inf_record`.`style` AS `style`,`inf_record`.`color` AS `color`,`inf_record`.`size` AS `size`,sum(`inf_record`.`num`) AS `num` from `inf_record` group by `inf_record`.`style`,`inf_record`.`color`,`inf_record`.`size` order by `inf_record`.`style`,`inf_record`.`color` desc,`inf_record`.`size`;

-- --------------------------------------------------------

--
-- 视图结构 `inf_v_style`
--
DROP TABLE IF EXISTS `inf_v_style`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inf_v_style` AS select `inf_record`.`style` AS `style`,sum(`inf_record`.`num`) AS `num` from `inf_record` group by `inf_record`.`style` order by `inf_record`.`style`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
