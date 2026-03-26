/*
Sergi Ye
Akashdeep Singh
Jinnan Chen
Eric Huang
01/12/2025
We generated a database for our transversal project

18/03/2026
We updated the database with the necessary tables for the project, including the relationships between them.
*/

USE sql7820250;

-- Create Users table --
CREATE TABLE IF NOT EXISTS Users
(
    email varchar(50) not null,
    promotor boolean default false,
    name varchar(50) not null,
    surname varchar(50) not null,
    password varchar(100) not null,
    
    constraint PK_Usuarios primary key (email)
);

-- Create Events table --
CREATE TABLE IF NOT EXISTS Events
(
    ID_Events VARCHAR(25),
    Name VARCHAR(50),
    Description VARCHAR(100),
    Date DATE,
    Location VARCHAR(100),

    CONSTRAINT PK_Events PRIMARY KEY (ID_Events)
);

-- Create Catalogs table (M-M Users <-> Events) --
CREATE TABLE IF NOT EXISTS Catalogs
(
    email VARCHAR(50),
    ID_Events VARCHAR(25),

    CONSTRAINT PK_Catalogs PRIMARY KEY (email, ID_Events),
    CONSTRAINT FK_CV_Users FOREIGN KEY (email) REFERENCES Users(email) ON DELETE CASCADE,
    CONSTRAINT FK_CV_Events FOREIGN KEY (ID_Events) REFERENCES Events(ID_Events) ON DELETE CASCADE
);

-- Create Animes table --
CREATE TABLE IF NOT EXISTS Animes
(
    IDAnimes VARCHAR(20),
    Name VARCHAR(25),
    EpisodeCount INT,
    Description VARCHAR(100),
    ID_User VARCHAR(50),  -- FK --

    CONSTRAINT PK_Animes PRIMARY KEY (IDAnimes),
    CONSTRAINT FK_Users_Animes FOREIGN KEY (ID_User) REFERENCES Users(email) ON DELETE SET NULL
);

-- Create Episodes table --
CREATE TABLE IF NOT EXISTS Episodes
(
    IDEpisodes VARCHAR(25),
    AnimeName VARCHAR(25),
    Title VARCHAR(50),
    EpisodeNumber INT,
    IDAnimes VARCHAR(20), -- FK --

    CONSTRAINT PK_Episodes PRIMARY KEY (IDEpisodes),
    CONSTRAINT FK_Animes_Episodes FOREIGN KEY (IDAnimes) REFERENCES Animes(IDAnimes) ON DELETE CASCADE
);

-- Create Mangas table --
CREATE TABLE IF NOT EXISTS Mangas
(
    ID_Mangas VARCHAR(20),
    Name VARCHAR(25),
    ChapterNumber INT,
    Description VARCHAR(100),
    ID_User VARCHAR(50), -- FK --

    CONSTRAINT PK_Mangas PRIMARY KEY (ID_Mangas),
    CONSTRAINT FK_Users_Mangas FOREIGN KEY (ID_User) REFERENCES Users(email) ON DELETE SET NULL
);

-- Create Chapters table --
CREATE TABLE IF NOT EXISTS Chapters
(
    ID_Chapters VARCHAR(25),
    MangaName VARCHAR(50),
    Title VARCHAR(50),
    ChapterNumber INT,
    PageCount INT,
    ID_Mangas VARCHAR(20), -- FK --

    CONSTRAINT PK_Chapters PRIMARY KEY (ID_Chapters),
    CONSTRAINT FK_Mangas_Chapters FOREIGN KEY (ID_Mangas) REFERENCES BD_Mangas(ID_Mangas) ON DELETE CASCADE
);

-- Crear procedure de comprovar el email si exite o no --
DELIMITER //
CREATE PROCEDURE sp_comprovar_email(
	IN emailP varchar(50), 
	OUT exist boolean
)
BEGIN
	SELECT EXISTS(
		SELECT email
        FROM Users
        WHERE email = emailP
        ) INTO exist;
END //
DELIMITER ;

-- Crear un procedure para validar si el login esta bien --
DELIMITER //
CREATE PROCEDURE sp_login(
	IN emailP varchar(50),
    IN passwordP varchar(100),
    OUT valido boolean
)
BEGIN
	SELECT EXISTS(
		SELECT *
        FROM Users
        WHERE email = emailP
        AND password = passwordP
	) INTO valido;
END //
DELIMITER ;
