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

-- USERS
CREATE TABLE IF NOT EXISTS Users (
    email VARCHAR(50) NOT NULL,
    promotor BOOLEAN DEFAULT FALSE,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    CONSTRAINT PK_Users PRIMARY KEY (email)
);

-- EVENTS
CREATE TABLE IF NOT EXISTS Events (
    ID_Event VARCHAR(25) NOT NULL,
    Name VARCHAR(50),
    Description VARCHAR(100),
    Date DATE,
    Location VARCHAR(100),
    CONSTRAINT PK_Events PRIMARY KEY (ID_Event)
);

-- CATALOGS (M-M)
CREATE TABLE IF NOT EXISTS Catalogs (
    email VARCHAR(50),
    ID_Event VARCHAR(25),
    CONSTRAINT PK_Catalogs PRIMARY KEY (email, ID_Event),
    CONSTRAINT FK_Catalogs_Users FOREIGN KEY (email) 
        REFERENCES Users(email) ON DELETE CASCADE,
    CONSTRAINT FK_Catalogs_Events FOREIGN KEY (ID_Event) 
        REFERENCES Events(ID_Event) ON DELETE CASCADE
);

-- ANIMES
CREATE TABLE IF NOT EXISTS Animes (
    ID_Anime INT AUTO_INCREMENT,
    Title VARCHAR(25),
    Subtitle VARCHAR(100),
    Episodes INT,
    Duration INT,
    Image VARCHAR(500),
    Video VARCHAR(100),
    Date_premiere DATE,
    Studio VARCHAR(25),
    Gender VARCHAR(50),
    Description VARCHAR(500),
    email VARCHAR(50),
    CONSTRAINT PK_Animes PRIMARY KEY (ID_Anime),
    CONSTRAINT FK_Users_Animes FOREIGN KEY (email) 
        REFERENCES Users(email) ON DELETE SET NULL
);

-- EPISODES
CREATE TABLE IF NOT EXISTS Episodes (
    ID_Episode INT AUTO_INCREMENT,
    Anime_Name VARCHAR(25),
    Title VARCHAR(50),
    Description VARCHAR(100),
    Link VARCHAR(500),
    ID_Anime INT,
    CONSTRAINT PK_Episodes PRIMARY KEY (ID_Episode),
    CONSTRAINT FK_Animes_Episodes FOREIGN KEY (ID_Anime) 
        REFERENCES Animes(ID_Anime) ON DELETE CASCADE
);

-- MANGAS
CREATE TABLE IF NOT EXISTS Mangas (
    ID_Manga INT AUTO_INCREMENT,
    Title VARCHAR(25),
    Subtitle VARCHAR(25),
    Chapters INT,
    Image VARCHAR(100),
    Date_premiere DATE,
    Studio VARCHAR(25),
    Gender VARCHAR(50),
    Description VARCHAR(100),
    email VARCHAR(50),
    CONSTRAINT PK_Mangas PRIMARY KEY (ID_Manga),
    CONSTRAINT FK_Users_Mangas FOREIGN KEY (email) 
        REFERENCES Users(email) ON DELETE SET NULL
);

-- CHAPTERS
CREATE TABLE IF NOT EXISTS Chapters (
    ID_Chapter INT AUTO_INCREMENT,
    Manga_Name VARCHAR(50),
    Title VARCHAR(50),
    Description VARCHAR(100),
    Link VARCHAR(500),
    ID_Manga INT,
    CONSTRAINT PK_Chapters PRIMARY KEY (ID_Chapter),
    CONSTRAINT FK_Mangas_Chapters FOREIGN KEY (ID_Manga) 
        REFERENCES Mangas(ID_Manga) ON DELETE CASCADE
);

-- PROCEDURES
DELIMITER //

CREATE PROCEDURE sp_comprovar_email(
    IN emailP VARCHAR(50),
    OUT exist BOOLEAN
)
BEGIN
    SELECT EXISTS(
        SELECT 1 FROM Users WHERE email = emailP
    ) INTO exist;
END //

CREATE PROCEDURE sp_login(
    IN emailP VARCHAR(50),
    IN passwordP VARCHAR(100),
    OUT valido BOOLEAN
)
BEGIN
    SELECT EXISTS(
        SELECT 1 FROM Users 
        WHERE email = emailP AND password = passwordP
    ) INTO valido;
END //

CREATE PROCEDURE sp_crearAnime(
    IN p_Title VARCHAR(25),
    IN p_Subtitle VARCHAR(100),
    IN p_Episodes INT,
    IN p_Duration INT,
    IN p_Image VARCHAR(500),
    IN p_Studio VARCHAR(25),
    IN p_Date_premiere DATE,
    IN p_Gender VARCHAR(50),
    IN p_Description VARCHAR(500),
    IN p_email VARCHAR(50)
)
BEGIN
    INSERT INTO Animes (
        Title,
        Subtitle,
        Episodes,
        Duration,
        Image,
        Studio,
        Date_premiere,
        Gender,
        Description,
        email
    )
    VALUES (
        p_Title,
        p_Subtitle,
        p_Episodes,
        p_Duration,
        p_Image,
        p_Studio,
        p_Date_premiere,
        p_Gender,
        p_Description,
        p_email
    );
END //

CREATE PROCEDURE drop_tables()
BEGIN
DROP TABLE Animes;
DROP TABLE Catalogs;
DROP TABLE Chapters;
DROP TABLE Episodes;
DROP TABLE Events;
DROP TABLE Mangas;
DROP TABLE Users;
END //

DELIMITER ;

INSERT INTO Animes 
(Title, Subtitle, Episodes, Duration, Image, Video, Date_premiere, Studio, Gender, Description, email)
VALUES
('One Piece', NULL, NULL, NULL,
 'https://i.imgur.com/ZmYD4Uo.jpeg',
 NULL, NULL, NULL, NULL,
 'El anime más popular del momento',
 NULL),

('Cyberpunk: Edgerunners', NULL, NULL, NULL,
 'https://static.wikia.nocookie.net/cyberpunk/images/c/c1/Cyberpunk_Edgerunners_Trigger_2.jpg/revision/latest/scale-to-width-down/1200?cb=20230324074932&path-prefix=es',
 NULL, NULL, NULL, NULL,
 'Historias de un futuro donde la tecnología cambia la vida de todos',
 NULL),

('Naruto', NULL, NULL, NULL,
 'https://m.media-amazon.com/images/M/MV5BZTNjOWI0ZTAtOGY1OS00ZGU0LWEyOWYtMjhkYjdlYmVjMDk2XkEyXkFqcGc@._V1_.jpg',
 NULL, NULL, NULL, NULL,
 'La historia de un ninja que nunca se rinde y lucha por sus sueños',
 NULL),

('Frieren: Beyond Journey''s End', NULL, NULL, NULL,
 'https://es.web.img3.acsta.net/c_310_420/pictures/23/07/31/10/02/0006409.jpg',
 NULL, NULL, NULL, NULL,
 'Anime mejor valorado',
 NULL),

('Kimetsu no Yaiba', NULL, NULL, NULL,
 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRlx52AOnIL8Vq7yJLUK9ZwNOLUXL9Gi9-grg&s',
 NULL, NULL, NULL, NULL,
 'Un joven lucha contra demonios para salvar a su hermana y proteger a los demás',
 NULL),

('Jujutsu Kaisen', NULL, NULL, NULL,
 'https://i0.wp.com/codigoespagueti.com/wp-content/uploads/2023/03/poster-jujutsu-kaisen-2.jpg?resize=1280%2C1810&ssl=1',
 NULL, NULL, NULL, NULL,
 'Un estudiante de secundaria que se involucra en luchas contra espíritus malvados',
 NULL),

('Re:Zero', NULL, NULL, NULL,
 'https://m.media-amazon.com/images/M/MV5BOTIyNGIzY2EtYjMyZS00Y2M0LWE4MTktNmQ3Y2IwZTBhNWE2XkEyXkFqcGc@._V1_.jpg',
 NULL, NULL, NULL, NULL,
 'Un joven que es transportado a un mundo mágico y debe luchar por su supervivencia',
 NULL),

('Steins;Gate', NULL, NULL, NULL,
 'https://m.media-amazon.com/images/M/MV5BZjI1YjZiMDUtZTI3MC00YTA5LWIzMmMtZmQ0NTZiYWM4NTYwXkEyXkFqcGc@._V1_QL75_UX190_CR0,2,190,281_.jpg',
 NULL, NULL, NULL, NULL,
 'Un joven que descubre un experimento que le permite viajar en el tiempo',
 NULL),

('Ficha 9', NULL, NULL, NULL,
 '../../assets/img/background-image.webp',
 NULL, NULL, NULL, NULL,
 'Descripción de la ficha',
 NULL);
