create schema 6314_final_project;

CREATE TABLE `6314_final_project`.`user` (
  `UserId` INT NOT NULL AUTO_INCREMENT,
  `UserName` VARCHAR(45) NOT NULL,
  `psw` VARCHAR(45) NOT NULL,
  `type` INT NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`UserId`));
  
  CREATE TABLE `6314_final_project`.`poster` (
  `PosterId` INT NOT NULL AUTO_INCREMENT,
  `PosterName` varchar(45) NOT NULL,
  `PosterURL` varchar(45) NOT NULL,
  `Location` varchar(45) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`PosterId`));

CREATE TABLE `6314_final_project`.`user_poster` (
  `userID` INT NOT NULL,
  `PosterID` INT NOT NULL,
  PRIMARY KEY (`userID`, `PosterID`),
  INDEX `posterID_idx` (`PosterID` ASC),
  CONSTRAINT `userID`
    FOREIGN KEY (`userID`)
    REFERENCES `6314_final_project`.`user` (`UserId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `posterID`
    FOREIGN KEY (`PosterID`)
    REFERENCES `6314_final_project`.`poster` (`PosterId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `6314_final_project`.`user_favorite` (
  `UserID` INT NOT NULL,
  `PosterID` INT NOT NULL,
  INDEX `posterid_idx` (`PosterID` ASC),
  PRIMARY KEY (`UserID`, `PosterID`),
  CONSTRAINT `userid1`
    FOREIGN KEY (`UserID`)
    REFERENCES `6314_final_project`.`user` (`UserId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `posterid1`
    FOREIGN KEY (`PosterID`)
    REFERENCES `6314_final_project`.`poster` (`PosterId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
    
INSERT INTO `6314_final_project`.`user` (`UserName`, `psw`, `type`, `email`) VALUES ('testUser', '202cb962ac59075b964b07152d234b70', '0', 'test@gmail.com');
INSERT INTO `6314_final_project`.`user` (`UserName`, `psw`, `type`, `email`) VALUES ('testAdmin', '202cb962ac59075b964b07152d234b70', '1', 'test1@gmail.com');
INSERT INTO `6314_final_project`.`user` (`UserName`, `psw`, `type`, `email`) VALUES ('paul', '202cb962ac59075b964b07152d234b70', '0', 'paul@gmail.com');
INSERT INTO `6314_final_project`.`user` (`UserName`, `psw`, `type`, `email`) VALUES ('sherry', '202cb962ac59075b964b07152d234b70', '1', 'sherry@gmail.com');

INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test1', 'posterPic/pic1.jpg', 'JSOM', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test2', 'posterPic/pic2.jpg', 'ATC', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test3', 'posterPic/pic3.jpg', 'ECSS', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test4', 'posterPic/pic4.jpg', 'ECSW', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test5', 'posterPic/pic5.jpg', 'ECSN', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test6', 'posterPic/pic6.jpg', 'JSOM', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test7', 'posterPic/pic7.jpg', 'ECSW', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test8', 'posterPic/pic8.jpg', 'JSOM', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test9', 'posterPic/pic9.jpg', 'ECSW', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test10', 'posterPic/pic10.jpg', 'ATC', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test11', 'posterPic/pic11.jpg', 'ECSW', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test12', 'posterPic/pic12.jpg', 'JSOM', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test10', 'posterPic/pic13.jpg', 'ECSW', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test11', 'posterPic/pic14.jpg', 'ATC', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test12', 'posterPic/pic15.jpg', 'JSOM', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test10', 'posterPic/pic16.jpg', 'ECSW', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test11', 'posterPic/pic17.jpg', 'ATC', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test12', 'posterPic/pic18.jpg', 'JSOM', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test11', 'posterPic/pic19.jpg', 'ECSW', '1234');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `Description`) VALUES ('test12', 'posterPic/pic20.jpg', 'JSOM', '1234');

INSERT INTO `6314_final_project`.`user_poster` (`userID`, `PosterID`) VALUES ('1', '1');
INSERT INTO `6314_final_project`.`user_poster` (`userID`, `PosterID`) VALUES ('1', '2');
INSERT INTO `6314_final_project`.`user_poster` (`userID`, `PosterID`) VALUES ('1', '3');
INSERT INTO `6314_final_project`.`user_poster` (`userID`, `PosterID`) VALUES ('1', '4');
INSERT INTO `6314_final_project`.`user_poster` (`userID`, `PosterID`) VALUES ('1', '5');
INSERT INTO `6314_final_project`.`user_poster` (`userID`, `PosterID`) VALUES ('1', '6');
INSERT INTO `6314_final_project`.`user_poster` (`userID`, `PosterID`) VALUES ('1', '7');
INSERT INTO `6314_final_project`.`user_poster` (`userID`, `PosterID`) VALUES ('3', '8');
INSERT INTO `6314_final_project`.`user_poster` (`userID`, `PosterID`) VALUES ('3', '9');
INSERT INTO `6314_final_project`.`user_poster` (`userID`, `PosterID`) VALUES ('3', '10');
INSERT INTO `6314_final_project`.`user_poster` (`userID`, `PosterID`) VALUES ('3', '11');
INSERT INTO `6314_final_project`.`user_poster` (`userID`, `PosterID`) VALUES ('3', '12');
               
               
INSERT INTO `6314_final_project`.`user_favorite` (`UserID`, `PosterID`) VALUES ('1', '9');
INSERT INTO `6314_final_project`.`user_favorite` (`UserID`, `PosterID`) VALUES ('1', '10');
INSERT INTO `6314_final_project`.`user_favorite` (`UserID`, `PosterID`) VALUES ('1', '11');

