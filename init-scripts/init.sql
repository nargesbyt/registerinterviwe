CREATE USER IF NOT EXISTS 'company'@'%' IDENTIFIED BY 'company_secret';
SET PASSWORD FOR 'company'@'%' = PASSWORD('company_secret');
CREATE DATABASE IF NOT EXISTS company_test;
GRANT ALL PRIVILEGES ON company_test.* TO 'company'@'%';
FLUSH PRIVILEGES;