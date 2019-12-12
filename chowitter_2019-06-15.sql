# ************************************************************
# Sequel Pro SQL dump
# バージョン 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# ホスト: localhost (MySQL 5.7.25)
# データベース: chowitter
# 作成時刻: 2019-06-14 16:24:08 +0000
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
  `comment` varchar(160) DEFAULT NULL COMMENT 'プロフィール・メッセージ',
  `url` text COMMENT 'プロフィール・URL',
  `area` varchar(30) DEFAULT NULL COMMENT 'プロフィール・地域',
  `birthday` date DEFAULT NULL COMMENT 'プロフィール・誕生日',
  `official` varchar(3) DEFAULT NULL COMMENT '公式の有無',
  `privacy` varchar(3) DEFAULT NULL COMMENT 'プライバシー保護',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_id` (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;

INSERT INTO `accounts` (`id`, `login_id`, `login_password`, `email`, `display_name`, `comment`, `url`, `area`, `birthday`, `official`, `privacy`)
VALUES
	(1,'admin','$2y$10$CLT8gxmYjrXNnHyyAm1pBugTGMu4ssVSl/legs66jBuJJk2aiHm0W','official@chowitter.com','Chowitter','Chowitter公式アカウントです。','http://chowitter.com','Toyko Japan','2019-06-15','yes','no');

/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ choweet
# ------------------------------------------------------------

DROP TABLE IF EXISTS `choweet`;

CREATE TABLE `choweet` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `accounts_id` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `chowieet` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
