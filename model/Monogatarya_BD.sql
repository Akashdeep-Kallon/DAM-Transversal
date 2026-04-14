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
USE sql7822562;

-- Create Users table --
CREATE TABLE IF NOT EXISTS Users (
    email varchar(50) not null,
    promotor boolean default false,
    name varchar(50) not null,
    surname varchar(50) not null,
    password varchar(100) not null,
    constraint PK_Usuarios primary key (email)
);

-- Create Events table --
CREATE TABLE IF NOT EXISTS Events (
    ID_Events VARCHAR(25),
    Name VARCHAR(50),
    Description VARCHAR(100),
    Date DATE,
    Location VARCHAR(100),
    CONSTRAINT PK_Events PRIMARY KEY (ID_Events)
);

-- Create Catalogs table (M-M Users <-> Events) --
CREATE TABLE IF NOT EXISTS Catalogs (
    email VARCHAR(50),
    ID_Events VARCHAR(25),
    CONSTRAINT PK_Catalogs PRIMARY KEY (email, ID_Events),
    CONSTRAINT FK_CV_Users FOREIGN KEY (email) REFERENCES Users(email) ON DELETE CASCADE,
    CONSTRAINT FK_CV_Events FOREIGN KEY (ID_Events) REFERENCES Events(ID_Events) ON DELETE CASCADE
);

-- Create Animes table --
CREATE TABLE IF NOT EXISTS Animes (
    IDAnimes INT AUTO_INCREMENT,
    Title VARCHAR(25),
    Subtitle VARCHAR(100),
    EpisodeCount INT,
    Duration INT,
    Image VARCHAR(500),
    Video VARCHAR(100),
    Studio VARCHAR(25),
    Gender VARCHAR(50),
    Description VARCHAR(500),
    email VARCHAR(50),
    -- FK --
    CONSTRAINT PK_Animes PRIMARY KEY (IDAnimes),
    CONSTRAINT FK_Users_Animes FOREIGN KEY (email) REFERENCES Users(email) ON DELETE
    SET
        NULL
);

-- Create Episodes table --
CREATE TABLE IF NOT EXISTS Episodes (
    IDEpisodes INT AUTO_INCREMENT,
    AnimeName VARCHAR(25),
    Title VARCHAR(50),
    Description VARCHAR(100),
    Link VARCHAR(500),
    EpisodeNumber INT,
    IDAnimes INT,
    -- FK --
    CONSTRAINT PK_Episodes PRIMARY KEY (IDEpisodes),
    CONSTRAINT FK_Animes_Episodes FOREIGN KEY (IDAnimes) REFERENCES Animes(IDAnimes) ON DELETE CASCADE
);

-- Create Mangas table --
CREATE TABLE IF NOT EXISTS Mangas (
    IDMangas INT AUTO_INCREMENT,
    Title VARCHAR(25),
    Subtitle VARCHAR(25),
    ChapterNumber INT,
    Duration INT,
    Image VARCHAR(100),
    Video VARCHAR(100),
    Studie VARCHAR(25),
    Gender VARCHAR(50),
    Description VARCHAR(100),
    email VARCHAR(50),
    -- FK --
    CONSTRAINT PK_Mangas PRIMARY KEY (ID_Mangas),
    CONSTRAINT FK_Users_Mangas FOREIGN KEY (email) REFERENCES Users(email) ON DELETE
    SET
        NULL
);

-- Create Chapters table --
CREATE TABLE IF NOT EXISTS Chapters (
    IDChapters INT AUTO_INCREMENT,
    MangaName VARCHAR(50),
    Title VARCHAR(50),
    ChapterNumber INT,
    Description VARCHAR(100),
    Link VARCHAR(500),
    PageCount INT,
    ID_Mangas INT,
    -- FK --
    CONSTRAINT PK_Chapters PRIMARY KEY (ID_Chapters),
    CONSTRAINT FK_Mangas_Chapters FOREIGN KEY (ID_Mangas) REFERENCES Mangas(ID_Mangas) ON DELETE CASCADE
);

-- Crear procedure de comprovar el email si exite o no --
DELIMITER / / CREATE PROCEDURE sp_comprovar_email(IN emailP varchar(50), OUT exist boolean) BEGIN
SELECT
    EXISTS(
        SELECT
            email
        FROM
            Users
        WHERE
            email = emailP
    ) INTO exist;

END / / DELIMITER;

-- Crear un procedure para validar si el login esta bien --
DELIMITER / / CREATE PROCEDURE sp_login(
    IN emailP varchar(50),
    IN passwordP varchar(100),
    OUT valido boolean
) BEGIN
SELECT
    EXISTS(
        SELECT
            *
        FROM
            Users
        WHERE
            email = emailP
            AND password = passwordP
    ) INTO valido;

END / / DELIMITER;


-- CREAR ANIME --

DELIMITER //
CREATE PROCEDURE sp_crearAnime(
    IN p_Title VARCHAR(25),
    IN p_Subtitle VARCHAR(25),
    IN p_EpisodeCount INT,
    IN p_Duration INT,
    IN p_Image VARCHAR(100),
    IN p_Video VARCHAR(100),
    IN p_Studio VARCHAR(25),
    IN p_Gender VARCHAR(50),
    IN p_Description VARCHAR(100),
    IN p_ID_User VARCHAR(50)
)
BEGIN
    INSERT INTO Animes (
        Title,
        Subtitle,
        EpisodeCount,
        Duration,
        Image,
        Video,
        Studio,
        Gender,
        Description,
        ID_User
    ) VALUES (
        p_Title,
        p_Subtitle,
        p_EpisodeCount,
        p_Duration,
        p_Image,
        p_Video,
        p_Studio,
        p_Gender,
        p_Description,
        p_ID_User
    );
END //
DELIMITER ;