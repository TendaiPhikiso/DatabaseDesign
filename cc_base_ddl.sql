DROP DATABASE IF EXISTS canary;
CREATE DATABASE canary;
USE canary;
 
  CREATE TABLE member(
  memberID INT AUTO_INCREMENT,
  firstName VARCHAR(40),
  lastName VARCHAR(40),
  grade char, -- j, junior, s, senior
  PRIMARY KEY(memberID)
);
  
  CREATE TABLE series(
  seriesID INT AUTO_INCREMENT,
  seriesName VARCHAR(40),
  seriesYear INTEGER,
  PRIMARY KEY(seriesID)
);
  
CREATE TABLE race(
  raceID INT AUTO_INCREMENT,
  seriesID INT,
  raceName VARCHAR(40),
  raceDate DATE,
  FOREIGN KEY series_key(seriesID) REFERENCES series(seriesID),
  PRIMARY KEY(raceID)
);
CREATE TABLE competitor(
  competitorID INT AUTO_INCREMENT,
  memberID INT,
  raceID INT,
  position INT,
  FOREIGN KEY member_key(memberID) REFERENCES member(memberID),
  FOREIGN KEY race_key(raceID) REFERENCES race(raceID),
  PRIMARY KEY(competitorID)
);

CREATE TABLE course(
    courseID INT AUTO_INCREMENT,
    courseName VARCHAR(50),
    courseLevel INT,
    PRIMARY KEY(courseID)
);

CREATE TABLE enrolment(
  enrolmentID INT AUTO_INCREMENT,
  memberID INT, 
  courseID INT,
  FOREIGN KEY enrolment_member_key(memberID) REFERENCES member(memberID),
  FOREIGN KEY course_key(courseID) REFERENCES course(courseID),
  PRIMARY KEY(enrolmentID)
);


