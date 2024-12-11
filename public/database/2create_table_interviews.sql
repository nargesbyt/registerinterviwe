CREATE TABLE IF NOT EXISTS `interviews` (
    id int NOT NULL auto_increment,
    firstname varchar(255),
    lastname varchar(255),
    interviewDate date,
    careerFieldId int,
    education varchar(255),
    age int,
    address varchar(255),
    maritalStatus int,
    childNum int,
    phoneNum varchar(255),
    employmentHistory text,
    fatherJob varchar(255),
    reasonForJob varchar(255),
    interviewResult text,
    internship int,
    freetime varchar(255),
    englishLevel int,
    employmentAdv int,
    computerSkill int,
    knowAboutUs boolean,
    haveFriendHere boolean,
    wayToCome varchar(255),
    lastReadBook varchar(255),
    characterType int,
    coverType varchar(255),
    migrateIntention boolean,
    resumeFile varchar(255),
    PRIMARY KEY  (`id`),
    FOREIGN KEY (careerFieldId) REFERENCES careerFields(id)
    );
    
