CREATE DATABASE satdata;

CREATE TABLE Users (
    idUsers int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    usernameUsers tinytext NOT NULL,
    emailUsers tinytext NOT NULL,
    passwordUsers longtext NOT NULL,
    countryUsers tinytext NOT NULL,
    contactUsers int NOT NULL
);

CREATE TABLE SatData (
    idSatData int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    gstidSatData tinytext NOT NULL,
    datatypeSatData tinytext NOT NULL,
    sensorData tinytext NOT NULL
);