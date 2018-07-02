DROP TABLE IF EXISTS `pay_order`;
CREATE TABLE `pay_order` (
`trade_no` varchar(64) NOT NULL,
`out_trade_no` varchar(64) NOT NULL,
`notify_url` varchar(64) DEFAULT NULL,
`return_url` varchar(64) DEFAULT NULL,
`type` varchar(50) NOT NULL,
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


CREATE TABLE `pay_config` (
  `k` varchar(32) NOT NULL,
  `v` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `pay_config` (`k`, `v`) VALUES
('access_token', ''),
('admin_pwd', 'admin'),
('admin_user', 'admin'),
('appid', ''),
('appkey', ''),
('cache', ''),
('CAPTCHA_ID', 'b31335edde91b2f98dacd393f6ae6de8'),
('description', '拇指付易支付是一个和彩虹易支付一样的免签约支付产品，可以助你一站式解决网站签约各种支付接口的难题，现拥有支付宝、财付通、QQ钱包、微信支付等免签约支付功能，并有开发文档与SDK，可快速集成到你的网站'),
('is_payreg', '0'),
('is_reg', '1'),
('keywords', '拇指付易支付,支付宝免签约即时到账,财付通免签约,微信免签约支付,QQ钱包免签约,免签约支付,云支付'),
('local_domain', 'localhost'),
('mail_apikey', ''),
('mail_apiuser', ''),
('mail_cloud', '0'),
('mail_name', '7019732@qq.com'),
('mail_port', '465'),
('mail_pwd', '123456'),
('mail_smtp', 'smtp.qq.com'),
('money_rate', '97'),
('PRIVATE_KEY', '170d2349acef92b7396c7157eb9d8f47'),
('quicklogin', '0'),
('reg_pid', '1000'),
('reg_price', '10'),
('settle_fee_max', '20'),
('settle_fee_min', '0.1'),
('settle_money', '30'),
('settle_open', '0'),
('settle_rate', '0.005'),
('sms_token', ''),
('sms_uid', ''),
('stype_1', '1'),
('stype_2', '1'),
('stype_3', '0'),
('stype_4', '1'),
('verifytype', '0'),
('web_name', '拇指付易支付'),
('web_name_end', '- 免签约支付平台'),
('web_qq', '7019732');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pay_config`
--
ALTER TABLE `pay_config`
  ADD PRIMARY KEY (`k`);
COMMIT;

INSERT INTO `pay_config` (`k`, `v`) VALUES ('alipay_type', '0');
INSERT INTO `pay_config` (`k`, `v`) VALUES ('wxpay_type', '0');
INSERT INTO `pay_config` (`k`, `v`) VALUES ('qqpay_type', '0');