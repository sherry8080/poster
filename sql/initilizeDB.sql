CREATE DATABASE `poster_project` /*!40100 DEFAULT CHARACTER SET latin1 */;

CREATE TABLE `building` (
  `BuildingID` int(11) NOT NULL,
  `BuildingName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`BuildingID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `poster` (
  `PosterID` int(11) NOT NULL AUTO_INCREMENT,
  `PosterName` varchar(45) DEFAULT NULL,
  `PosterURL` varchar(2084) DEFAULT NULL,
  PRIMARY KEY (`PosterID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

CREATE TABLE `poster_building` (
  `PosterID` int(11) NOT NULL,
  `BuildingID` int(11) NOT NULL,
  PRIMARY KEY (`PosterID`,`BuildingID`),
  KEY `BuildingID` (`BuildingID`),
  CONSTRAINT `poster_building_ibfk_1` FOREIGN KEY (`PosterID`) REFERENCES `poster` (`PosterID`),
  CONSTRAINT `poster_building_ibfk_2` FOREIGN KEY (`BuildingID`) REFERENCES `building` (`BuildingID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user` (
  `username` int(10) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user_poster` (
  `username` int(11) NOT NULL,
  `posterID` int(11) NOT NULL,
  PRIMARY KEY (`username`,`posterID`),
  KEY `posterID_idx` (`posterID`),
  CONSTRAINT `posterID` FOREIGN KEY (`posterID`) REFERENCES `poster` (`PosterID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `poster` VALUES (1,'PosterName1','posterPic/pic1.jpg'),(2,'PosterName2','posterPic/pic2.jpg'),(3,'PosterName3','posterPic/pic3.jpg'),(4,'PosterName4','posterPic/pic4.jpg'),(5,'PosterName5','posterPic/pic5.jpg'),(6,'PosterName6','posterPic/pic6.jpg'),(7,'PosterName7','posterPic/pic7.jpg'),(8,'PosterName8','posterPic/pic8.jpg'),(9,'PosterName9','posterPic/pic9.jpg'),(10,'PosterName10','posterPic/pic10.jpg'),(11,'PosterName11','posterPic/pic11.jpg'),(12,'PosterName12','posterPic/pic12.jpg'),(13,'PosterName13','posterPic/pic13.jpg'),(14,'PosterName14','posterPic/pic14.jpg');

