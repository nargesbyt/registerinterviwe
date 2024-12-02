CREATE TABLE IF NOT EXISTS `interviews` (
    id int NOT NULL auto_increment,
    firstname varchar(255),
    lastname varchar(255),
    interviewDate date,
    education varchar(255),
    age int,
    address varchar(255),
    maritalStatus varchar(255),
    childNum int,
    phoneNum varchar(255),
    careerFieldId int,
    gender int,
    employmentHistory int,
    fatherJob varchar(255),
    additionalDetails text,
    interviewResult varchar(255),
    resumeFile varchar(255),
    PRIMARY KEY  (`id`),
    FOREIGN KEY (careerFieldId) REFERENCES careerfields(id)
    );
    
