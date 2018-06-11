/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Version : 50502
 Source Host           : localhost
 Source Database       : bear_demo

 Target Server Version : 50502
 File Encoding         : utf-8

 Date: 07/05/2011 10:22:08 AM (original)
 Date: 06/04/2018 1:15:00 PM (updated for MySQL 5.7)
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `entriessss`
-- ----------------------------
CREATE DATABASE IF NOT EXISTS `bear_demo`;
USE `bear_demo`;
DROP TABLE IF EXISTS `entries`;
CREATE TABLE `entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL ,
  `body` varchar(256),
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `entries`
-- ----------------------------
INSERT INTO `entries` VALUES ('1', 'PHP', 'PHP: Hypertext Preprocessor（ピー・エイチ・ピー ハイパーテキスト プリプロセッサー）とは、動的にHTMLデータを生成することによって、動的なウェブページを実現することを主な目的としたプログラミング言語、およびその言語処理系である。', '2009-11-28 01:28:52', null), ('2', 'Java', 'Java（ジャバ）は、狭義ではオブジェクト指向プログラミング言語Javaであり、広義ではプログラミング言語Javaのプログラムの実行環境および開発環境をいう。このJavaプログラムの実行環境と開発環境（広義のJava）は、Javaプラットフォームとも呼ばれる。\n', '2009-11-28 01:30:28', null), ('3', 'Python', 'Python（パイソン）は、オランダ人のグイド・ヴァンロッサムが作ったオープンソースのプログラミング言語。オブジェクト指向スクリプト言語の一種であり、Perlとともに欧米で広く普及している。イギリスのテレビ局 BBC が製作したコメディ番組『空飛ぶモンティ・パイソン』にちなんで名付けられた。Pythonは英語で爬虫類のニシキヘビの意味で、Python言語のマスコットやアイコンとして使われることがある。', '2009-11-28 01:31:19', null), ('4', 'Ruby', 'Ruby（ルビー）は、まつもとゆきひろ（通称Matz）により開発されたオブジェクト指向スクリプト言語であり、従来Perlなどのスクリプト言語が用いられてきた領域でのオブジェクト指向プログラミングを実現する。Rubyは当初1993年2 月24日に生まれ、1995年12月にfj上で発表された。名称のRubyは、プログラミング言語Perlが6月の誕生石であるPearl（真珠）と同じ発音をすることから、まつもとの同僚の誕生石（7月）のルビーを取って名付けられた。', '2009-11-28 01:32:08', null), ('5', 'Perl', 'Perl（パール）とは、ラリー・ウォールによって開発されたプログラミング言語である。記述の美しさよりも実用性と多様性をモットーにしており、Cやsed、awk、シェルスクリプトなど他のプログラミング言語やスクリプト言語の優れた機能を取り入れている。CGIスクリプトやシステム管理、テキスト処理などのプログラムを書くのに広く用いられている。代表的なアプリケーションはMovable Typeなど。', '2009-11-28 01:32:50', null), ('6', 'JavaScript', 'JavaScript（ジャバスクリプト）とは、オブジェクト指向スクリプト言語である。主にウェブブラウザなどのクライアントサイドで実装され、動的なウェブサイトの構築や、RIAなどの高度なユーザインタフェースの開発に用いられる。', '2009-11-28 01:33:40', null), ('7', 'Go', 'Goはプログラミング言語のひとつ。コンパイラ言語であり、特に並列コンピューティングに配慮したつくりになっている。Google社によって開発されており[2]、設計にロブ・パイク、ケン・トンプソンらが関わっている。', '2010-07-01 14:51:07', null), ('8', 'Scala', 'Scala (スカラ、スカーラ、スケイラ、Scalable Language) はオブジェクト指向言語と関数型言語の特徴を統合したマルチパラダイムのプログラミング言語である。', '2010-09-03 23:18:19', null);

