-- DATABASE CODES PARA MAG INITILIZE SA LOCAL SYSTEM NIYO USING XAMPP
-- do not change anything 
-- para mag work ang classes at included actions


CREATE DATABASE satdata;

CREATE TABLE Users (
    idUsers int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    usernameUsers tinytext NOT NULL,
    emailUsers tinytext NOT NULL,
    passwordUsers VARCHAR(255) NOT NULL,
    countryUsers tinytext NOT NULL,
    contactUsers int NOT NULL
);

CREATE TABLE SatData (
    idSatData int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    gstidSatData tinytext NOT NULL,
    datatypeSatData tinytext NOT NULL,
    sensorData tinytext NOT NULL,
    idSatDataMeta NOT NULL
);

CREATE TABLE SatDataMeta (
    idSatDataMeta int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    fileSatDataMeta BLOB NOT NULL,
    dateUploadedSatDataMeta date NOT NULL
)