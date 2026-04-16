/*
 Sergi Ye
 Akashdeep Singh
 Jinnan Chen
 Eric Huang
 
 01/12/2025
 We generated the initial database structure for our transversal project.
 
 18/03/2026
 We updated the database with the necessary tables and relationships.
 
 14/04/2026
 Major refactor:
 - Unified the old 'Mangas' and 'Animes' tables into a single 'Works' table.
 - Added the 'Type' field (Manga/Anime) to classify each work.
 - Updated the structure to avoid duplicated schemas and improve scalability.
 - Created a universal 'Chapters' table linked to 'Works' via ID_Work.
 - Updated stored procedures, including error handling with SIGNAL and ROLLBACK.
 - Migrated old INSERT data from 'Animes' to the new 'Works' format.
 - Improved login and email-check procedures for better security and consistency.
 
 16/04/2026
 Bug fixes and schema cleanup:
 - Removed duplicate 'Events' table definition (stub with VARCHAR PK was shadowing
   the full definition, leaving Capacity, Image, Schedule and other columns missing).
   and Events.ID_Event (INT); now both are plain INT.
 - Removed redundant 'Chapters' count column from 'Works' to avoid data inconsistency.
 - Renamed 'Works.Gender' to 'Works.Genre'.
 - Normalised FK column casing: 'Email' in Events renamed to 'email' to match Users PK.
 - Made Transcription_Video and Transcription_Audio nullable in Event_Media to allow
   inserts before transcriptions are available.
 */
 
USE Monogatarya;
 
CREATE TABLE IF NOT EXISTS Users (
    email VARCHAR(50) NOT NULL,
    status BOOLEAN DEFAULT FALSE,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    CONSTRAINT PK_Users PRIMARY KEY (email)
);
 
CREATE TABLE IF NOT EXISTS Works (
    ID_Work INT AUTO_INCREMENT,
    Type ENUM('Manga', 'Anime'),
    Title VARCHAR(50),
    Subtitle VARCHAR(100),
    Image VARCHAR(500),
    Date_premiere DATE,
    Studio VARCHAR(25),
    Genre VARCHAR(50),
    -- renamed from Gender
    Description VARCHAR(500),
    email VARCHAR(50),
    CONSTRAINT PK_Works PRIMARY KEY (ID_Work),
    FOREIGN KEY (email) REFERENCES Users(email) ON DELETE
    SET
        NULL
);
 
CREATE TABLE IF NOT EXISTS Chapters (
    ID_Chapter INT AUTO_INCREMENT,
    Title VARCHAR(50),
    Description VARCHAR(100),
    Chapter_Number INT,
    Duration INT NULL,
    Link VARCHAR(500),
    ID_Work INT,
    CONSTRAINT PK_Chapters PRIMARY KEY (ID_Chapter),
    FOREIGN KEY (ID_Work) REFERENCES Works(ID_Work) ON DELETE CASCADE
);
 
-- Single, definitive Events table (stub removed)
CREATE TABLE IF NOT EXISTS Events (
    ID_Event INT AUTO_INCREMENT,
    Title VARCHAR(100) NOT NULL,
    Subtitle VARCHAR(150),
    Description TEXT,
    Image VARCHAR(500),
    Date_event DATE NOT NULL,
    Location VARCHAR(150),
    Capacity INT,
    Schedule VARCHAR(50),
    email VARCHAR(50),
    -- normalised to lowercase
    CONSTRAINT PK_Events PRIMARY KEY (ID_Event),
    FOREIGN KEY (email) REFERENCES Users(email) ON DELETE
    SET
        NULL
);
 
CREATE TABLE IF NOT EXISTS Event_Media (
    ID_Media INT AUTO_INCREMENT,
    ID_Event INT NOT NULL,
    Video VARCHAR(500),
    Audio VARCHAR(500),
    Image VARCHAR(500),
    Transcription_Video TEXT,
    Transcription_Audio TEXT,
    Description VARCHAR(200),
    CONSTRAINT PK_Event_Media PRIMARY KEY (ID_Media),
    FOREIGN KEY (ID_Event) REFERENCES Events(ID_Event) ON DELETE CASCADE
);
 
-- PROCEDURES
DELIMITER //
CREATE PROCEDURE sp_comprovar_email(
    IN emailP VARCHAR(50),
    OUT exist BOOLEAN
) BEGIN
SELECT
    EXISTS(
        SELECT
            1
        FROM
            Users
        WHERE
            email = emailP
    ) INTO exist;
 
END / / CREATE PROCEDURE sp_login(
    IN emailP VARCHAR(50),
    IN passwordP VARCHAR(100),
    OUT valido BOOLEAN
) BEGIN
SELECT
    EXISTS(
        SELECT
            1
        FROM
            Users
        WHERE
            email = emailP
            AND password = passwordP
    ) INTO valido;
 
END //
 
DELIMITER //
CREATE PROCEDURE sp_add_Work(
    IN p_Type ENUM('Manga', 'Anime'),
    IN p_Title VARCHAR(25),
    IN p_Subtitle VARCHAR(100),
    IN p_Chapters INT,
    IN p_Image VARCHAR(500),
    IN p_Studio VARCHAR(25),
    IN p_Date_premiere DATE,
    IN p_Gender VARCHAR(50),
    IN p_Description VARCHAR(500),
    IN p_email VARCHAR(50)
) BEGIN -- Control de errores
DECLARE EXIT HANDLER FOR SQLEXCEPTION BEGIN ROLLBACK;
 
SIGNAL SQLSTATE '45000'
SET
    MESSAGE_TEXT = 'Error al insertar la obra en Works';
 
END;
 
START TRANSACTION;
 
INSERT INTO
    Works (
        Type,
        Title,
        Subtitle,
        Chapters,
        Image,
        Studio,
        Date_premiere,
        Gender,
        Description,
        email
    )
VALUES
    (
        p_Type,
        p_Title,
        p_Subtitle,
        p_Chapters,
        p_Image,
        p_Studio,
        p_Date_premiere,
        p_Gender,
        p_Description,
        p_email
    );
 
COMMIT;
 
END //
DELIMITER;
 
DELIMITER //
CREATE PROCEDURE drop_tables() BEGIN DROP TABLE Works;
 
DROP TABLE Catalogs;
 
DROP TABLE Chapters;
 
DROP TABLE Episodes;
 
DROP TABLE Events;
 
DROP TABLE Mangas;
 
DROP TABLE Users;
 
END //
 
DELIMITER;
 
INSERT INTO
    Works (
        Type,
        Title,
        Subtitle,
        Chapters,
        Image,
        Date_premiere,
        Studio,
        Gender,
        Description,
        email
    )
VALUES
    (
        'Anime',
        'One Piece',
        NULL,
        NULL,
        'https://i.imgur.com/ZmYD4Uo.jpeg',
        NULL,
        NULL,
        NULL,
        'El anime más popular del momento',
        NULL
    ),
    (
        'Anime',
        'Cyberpunk: Edgerunners',
        NULL,
        NULL,
        'https://static.wikia.nocookie.net/cyberpunk/images/c/c1/Cyberpunk_Edgerunners_Trigger_2.jpg/revision/latest/scale-to-width-down/1200?cb=20230324074932&path-prefix=es%27,
        NULL,
        NULL,
        NULL,
        'Historias de un futuro donde la tecnología cambia la vida de todos',
        NULL
    ),
    (
        'Anime',
        'Naruto',
        NULL,
        NULL,
        'https://m.media-amazon.com/images/M/MV5BZTNjOWI0ZTAtOGY1OS00ZGU0LWEyOWYtMjhkYjdlYmVjMDk2XkEyXkFqcGc@._V1_.jpg%27,
        NULL,
        NULL,
        NULL,
        'La historia de un ninja que nunca se rinde y lucha por sus sueños',
        NULL
    ),
    (
        'Anime',
        'Frieren: Beyond Journey''s End',
        NULL,
        NULL,
        'https://es.web.img3.acsta.net/c_310_420/pictures/23/07/31/10/02/0006409.jpg',
        NULL,
        NULL,
        NULL,
        'Anime mejor valorado',
        NULL
    ),
    (
        'Anime',
        'Kimetsu no Yaiba',
        NULL,
        NULL,
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRlx52AOnIL8Vq7yJLUK9ZwNOLUXL9Gi9-grg&s',
        NULL,
        NULL,
        NULL,
        'Un joven lucha contra demonios para salvar a su hermana y proteger a los demás',
        NULL
    ),
    (
        'Anime',
        'Jujutsu Kaisen',
        NULL,
        NULL,
        'https://i0.wp.com/codigoespagueti.com/wp-content/uploads/2023/03/poster-jujutsu-kaisen-2.jpg?resize=1280%2C1810&ssl=1%27,
        NULL,
        NULL,
        NULL,
        'Un estudiante de secundaria que se involucra en luchas contra espíritus malvados',
        NULL
    ),
    (
        'Anime',
        'Re:Zero',
        NULL,
        NULL,
        'https://m.media-amazon.com/images/M/MV5BOTIyNGIzY2EtYjMyZS00Y2M0LWE4MTktNmQ3Y2IwZTBhNWE2XkEyXkFqcGc@._V1_.jpg%27,
        NULL,
        NULL,
        NULL,
        'Un joven que es transportado a un mundo mágico y debe luchar por su supervivencia',
        NULL
    ),
    (
        'Anime',
        'Steins;Gate',
        NULL,
        NULL,
        'https://m.media-amazon.com/images/M/MV5BZjI1YjZiMDUtZTI3MC00YTA5LWIzMmMtZmQ0NTZiYWM4NTYwXkEyXkFqcGc@._V1_QL75_UX190_CR0,2,190,281_.jpg%27,
        NULL,
        NULL,
        NULL,
        'Un joven que descubre un experimento que le permite viajar en el tiempo',
        NULL
    ),
    (
        'Anime',
        'Ficha 9',
        NULL,
        NULL,
        '../../assets/img/background-image.webp',
        NULL,
        NULL,
        NULL,
        'Descripción de la ficha',
        NULL
    );