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
  `PosterCategory` varchar(45) DEFAULT NULL,
  `UploadDate` date DEFAULT NULL,
  `EventDate` date DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
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
    
INSERT INTO `6314_final_project`.`user` (`UserName`, `psw`, `type`, `email`) VALUES ('testUser', '123', '0', 'test@gmail.com');
INSERT INTO `6314_final_project`.`user` (`UserName`, `psw`, `type`, `email`) VALUES ('testAdmin', '123', '1', 'test1@gmail.com');
INSERT INTO `6314_final_project`.`user` (`UserName`, `psw`, `type`, `email`) VALUES ('paul', '123', '0', 'paul@gmail.com');
INSERT INTO `6314_final_project`.`user` (`UserName`, `psw`, `type`, `email`) VALUES ('sherry', '123', '1', 'sherry@gmail.com');

INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `PosterCategory`, `UploadDate`, `EventDate`) VALUES ('test1', 'posterPic/pic1.jpg', 'jsom', 'job', '2018-11-19', '2018-11-19');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `PosterCategory`, `UploadDate`, `EventDate`) VALUES ('test2', 'posterPic/pic2.jpg', 'atc', 'club', '2018-11-19', '2018-11-19');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `PosterCategory`, `UploadDate`, `EventDate`) VALUES ('test3', 'posterPic/pic3.jpg', 'ecss', 'event', '2018-11-19', '2018-11-19');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `PosterCategory`, `UploadDate`, `EventDate`) VALUES ('test4', 'posterPic/pic4.jpg', 'ecsw', 'job', '2018-11-19', '2018-11-19');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `PosterCategory`, `UploadDate`, `EventDate`) VALUES ('test5', 'posterPic/pic5.jpg', 'ecsn', 'event', '2018-11-19', '2018-11-19');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `PosterCategory`, `UploadDate`, `EventDate`) VALUES ('test6', 'posterPic/pic6.jpg', 'jsom', 'job', '2018-11-19', '2018-11-19');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `PosterCategory`, `UploadDate`, `EventDate`) VALUES ('test7', 'posterPic/pic7.jpg', 'ecsw', 'event', '2018-11-19', '2018-11-19');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `PosterCategory`, `UploadDate`, `EventDate`) VALUES ('test8', 'posterPic/pic8.jpg', 'jsom', 'job', '2018-11-19', '2018-11-19');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `PosterCategory`, `UploadDate`, `EventDate`) VALUES ('test9', 'posterPic/pic9.jpg', 'ecsw', 'event', '2018-11-19', '2018-11-19');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `PosterCategory`, `UploadDate`, `EventDate`) VALUES ('test10', 'posterPic/pic10.jpg', 'ecsw', 'job', '2018-11-19', '2018-11-19');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `PosterCategory`, `UploadDate`, `EventDate`) VALUES ('test11', 'posterPic/pic11.jpg', 'ecsw', 'event', '2018-11-19', '2018-11-19');
INSERT INTO `6314_final_project`.`poster` (`PosterName`, `PosterURL`, `Location`, `PosterCategory`, `UploadDate`, `EventDate`) VALUES ('test12', 'posterPic/pic12.jpg', 'jsom', 'club', '2018-11-19', '2018-11-19');

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

