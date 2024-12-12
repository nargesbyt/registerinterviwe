CREATE TABLE IF NOT EXISTS `interviews` (
    id int NOT NULL auto_increment,
    firstname varchar(255),
    lastname varchar(255)
    interview_date date,
    education varchar(255),
    age int,
    address_residence varchar(255),
    marital_status varchar(255),
    child_num int,
    phone_num varchar(255),
    career_field_id int,
    gender int,
    employment_history_id int,
    father_job varchar(255),
    additional_details text,
    interview_result varchar(255),
    resume_file varchar(255),
    user_id int,
    PRIMARY KEY  (`id`),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (career_field_id) REFERENCES careerfields(id),
    FOREIGN KEY (employment_history_id) REFERENCES employmenthistory(id)
    );
    
