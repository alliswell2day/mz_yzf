DROP TABLE IF EXISTS `pay_order`;
CREATE TABLE `pay_order` (
`trade_no` varchar(64) NOT NULL,
`out_trade_no` varchar(64) NOT NULL,
`notify_url` varchar(64) DEFAULT NULL,
`return_url` varchar(64) DEFAULT NULL,
`type` varchar(20) NOT NULL,
`buyer` varchar(30) DEFAULT NULL,
`pid` int(11) NOT NULL,
`addtime` datetime DEFAULT NULL,
`endtime` datetime DEFAULT NULL,
`name` varchar(64) NOT NULL,
`money` varchar(32) NOT NULL,
`domain` varchar(32) DEFAULT NULL,
`ip` varchar(20) DEFAULT NULL,
`status` int(1) NOT NULL DEFAULT '0',
 PRIMARY KEY (`trade_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pay_user`;
CREATE TABLE `pay_user` (
`id` int(11) NOT NULL auto_increment,
`uid` int(11) DEFAULT NULL,
`key` varchar(32) NOT NULL,
`rate` varchar(8) DEFAULT NULL,
`account` varchar(32) DEFAULT NULL,
`username` varchar(10) DEFAULT NULL,
`alipay_uid` varchar(32) DEFAULT NULL,
`qq_uid` varchar(32) DEFAULT NULL,
`money` decimal(10,2) NOT NULL,
`settle_id` int(1) NOT NULL DEFAULT '1',
`email` varchar(32) DEFAULT NULL,
`phone` varchar(20) DEFAULT NULL,
`qq` varchar(20) DEFAULT NULL,
`url` varchar(64) DEFAULT NULL,
`addtime` datetime DEFAULT NULL,
`apply` int(1) NOT NULL DEFAULT '0',
`level` int(1) NOT NULL DEFAULT '1',
`type` int(1) NOT NULL DEFAULT '0',
`active` int(1) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1000;

DROP TABLE IF EXISTS `pay_settle`;
CREATE TABLE `pay_settle` (
`id` int(11) NOT NULL auto_increment,
`pid` int(11) NOT NULL,
`batch` varchar(20) NOT NULL,
`type` int(1) NOT NULL DEFAULT '1',
`username` varchar(10) NOT NULL,
`account` varchar(32) NOT NULL,
`money` decimal(10,2) NOT NULL,
`fee` decimal(10,2) NOT NULL,
`time` datetime DEFAULT NULL,
`status` int(1) NOT NULL DEFAULT '0',
`transfer_status` int(1) NOT NULL DEFAULT '0',
`transfer_result` varchar(64) DEFAULT NULL,
`transfer_date` datetime DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `panel_user`;
CREATE TABLE `panel_user` (
`id` int(11) NOT NULL auto_increment,
`token` varchar(32) NOT NULL,
`user` varchar(32) NOT NULL,
`pwd` varchar(32) NOT NULL,
`email` varchar(32) DEFAULT NULL,
`phone` varchar(20) DEFAULT NULL,
`name` varchar(10) DEFAULT NULL,
`regtime` datetime DEFAULT NULL,
`logtime` datetime DEFAULT NULL,
`level` int(1) NOT NULL DEFAULT '1',
`type` int(1) NOT NULL DEFAULT '0',
`active` int(1) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `panel_log`;
CREATE TABLE `panel_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `type` varchar(20) NULL,
  `date` datetime NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `data` text NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pay_batch`;
CREATE TABLE `pay_batch` (
`batch` varchar(20) NOT NULL,
`allmoney` decimal(10,2) NOT NULL,
`time` datetime DEFAULT NULL,
`status` int(1) NOT NULL DEFAULT '0',
 PRIMARY KEY (`batch`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pay_regcode`;
CREATE TABLE `pay_regcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(1) NOT NULL DEFAULT '0',
  `code` varchar(32) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `trade_no` varchar(32) DEFAULT NULL,
  `data` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;