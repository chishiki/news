
DROP TABLE IF EXISTS `news_News`;

CREATE TABLE `news_News` (
    `newsID` int(12) NOT NULL AUTO_INCREMENT,
    `siteID` int(12) NOT NULL,
    `creator` int(12) NOT NULL,
    `created` datetime NOT NULL,
    `updated` datetime NOT NULL,
    `deleted` int(1) NOT NULL,
    `newsDate` date NOT NULL,
    `newsTitleEnglish` varchar(255) NOT NULL,
    `newsContentEnglish` text NOT NULL,
    `newsTitleJapanese` varchar(255) NOT NULL,
    `newsContentJapanese` text NOT NULL,
    `newsPublished` int(1) NOT NULL,
    `newsURL` varchar(100) NOT NULL,
    PRIMARY KEY (`newsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
