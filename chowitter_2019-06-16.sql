# ************************************************************
# Sequel Pro SQL dump
# バージョン 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# ホスト: localhost (MySQL 5.7.25)
# データベース: chowitter
# 作成時刻: 2019-06-16 06:24:10 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# テーブルのダンプ accounts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login_id` varchar(15) DEFAULT NULL COMMENT 'ログインID',
  `login_password` varchar(255) DEFAULT NULL COMMENT 'パスワード（ハッシュ）',
  `email` text COMMENT 'メールアドレス',
  `display_name` varchar(50) DEFAULT NULL COMMENT '表示名',
  `user_icon` text COMMENT 'ユーザーアイコンファイル名',
  `header_image` text COMMENT 'ユーザーヘッダーファイル名',
  `comment` varchar(160) DEFAULT NULL COMMENT 'プロフィール・メッセージ',
  `url` text COMMENT 'プロフィール・URL',
  `regist_date` date DEFAULT NULL COMMENT 'アカウント作成日',
  `birthday` date DEFAULT NULL COMMENT 'プロフィール・誕生日',
  `official` varchar(3) DEFAULT NULL COMMENT '公式の有無',
  `privacy` varchar(3) DEFAULT NULL COMMENT 'プライバシー保護',
  `status` varchar(11) DEFAULT NULL COMMENT 'アカウントの状態',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_id` (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;

INSERT INTO `accounts` (`id`, `login_id`, `login_password`, `email`, `display_name`, `user_icon`, `header_image`, `comment`, `url`, `regist_date`, `birthday`, `official`, `privacy`, `status`)
VALUES
	(1,'admin','$2y$10$CLT8gxmYjrXNnHyyAm1pBugTGMu4ssVSl/legs66jBuJJk2aiHm0W','official@chowitter.com','Chowitter公式','default_icon.svg','admin.svg','Chowitter公式アカウントです。','http://chowitter.com','2019-06-15',NULL,'yes','off','active'),
	(6,'daisuke814','$2y$10$lB7/6.IBAZ1gYmpUfrh2tuz1U9i.1gkRH29Xaj/Zt07bZp0rpJ86q','daisuke814@outlook.com','阪本 大将',NULL,NULL,NULL,NULL,'2019-06-15',NULL,'no','off','active'),
	(7,'AmazonJP','$2y$10$FZ7LJ5Dv7s9Z7XAvWNUpB.LWVB8m/geJdbZ2C2hlGJmaFXo0kT6l6','amazon@amazon.co.jp','Amamzon','AmazonJP1560631438.png','AmazonJP1560631500.jpg','http://Amazon.co.jp 公式Twitterアカウント。 ※ソーシャルメディアのカスタマーサポートは土日祝日含め、365日 7:30-23:00にて行っております。','https://amazon.co.jp',NULL,'1900-01-01','yes','off','active'),
	(8,'Google','$2y$10$YIUGAeO5iUWJzr7MTN4VXuQbPFSLoSgdBIuVpXHMndxc.jdq.tdhW','google@google.com','Google','Google1560632123.jpg','Google1560632123.jpg','OK Google!!','https://google.com',NULL,'1996-01-01','yes','off','active');

/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ choweet
# ------------------------------------------------------------

DROP TABLE IF EXISTS `choweet`;

CREATE TABLE `choweet` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login_id` varchar(15) DEFAULT NULL,
  `choweet` varchar(280) DEFAULT NULL,
  `images` text,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `choweet` WRITE;
/*!40000 ALTER TABLE `choweet` DISABLE KEYS */;

INSERT INTO `choweet` (`id`, `login_id`, `choweet`, `images`, `time`)
VALUES
	(1,'admin','テスト',NULL,'2019-06-16 02:58:45'),
	(2,'admin','テスト２','admin1560621547.gif','2019-06-16 02:59:07'),
	(3,'admin','<h1>マジ卍</h1>\r\n\r\n\r\n\r\nあいうえお！','admin1560625415.jpg','2019-06-16 04:03:35'),
	(4,'Google','Googleアプリをインストールして生活をもっと便利に！','Google1560634462.jpg','2019-06-16 06:34:22'),
	(5,'AmazonJP','Amazonのクレジットカード','AmazonJP1560641553.jpg','2019-06-16 08:32:33');

/*!40000 ALTER TABLE `choweet` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ direct_message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `direct_message`;

CREATE TABLE `direct_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ follow
# ------------------------------------------------------------

DROP TABLE IF EXISTS `follow`;

CREATE TABLE `follow` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login_id` varchar(15) DEFAULT NULL,
  `follow_accounts` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `follow` WRITE;
/*!40000 ALTER TABLE `follow` DISABLE KEYS */;

INSERT INTO `follow` (`id`, `login_id`, `follow_accounts`)
VALUES
	(7,'Google','admin');

/*!40000 ALTER TABLE `follow` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ registing
# ------------------------------------------------------------

DROP TABLE IF EXISTS `registing`;

CREATE TABLE `registing` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` text COMMENT 'メールアドレス',
  `password` varchar(255) DEFAULT NULL COMMENT 'パスワード',
  `time` datetime DEFAULT NULL COMMENT '作成日時',
  `token` varchar(30) DEFAULT NULL COMMENT 'トークン',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ report
# ------------------------------------------------------------

DROP TABLE IF EXISTS `report`;

CREATE TABLE `report` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `target` varchar(15) DEFAULT NULL COMMENT '通報対象',
  `repot_accounts` varchar(15) DEFAULT NULL COMMENT '通報したアカウント',
  `time` datetime DEFAULT NULL COMMENT '通報日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
