/*
Sergi Ye
Akashdeep Singh
Jinnan Chen
Eric Huang
1/12/2025 
Generamos una Base de datos de nuestro proyecto transversal
*/

-- CREACION BD -- 
create database if not exists monogatarya;
use monogatarya;

-- Crear tabla Usuarios --
create table if not exists Usuarios
(
    Correo varchar(50),
    Rango varchar(10),
    Nombre varchar(50),
    Apellido varchar(50),
    Contrasena varchar(100),
    FotoPerfil longblob,

    
    constraint PK_Usuarios primary key (Correo)
);

-- Crear tabla Eventos --
create table if not exists Eventos
(
    ID_Eventos varchar(25),
    Nombre varchar(50),
    Descripcion varchar(100),
    Fecha DATE,
    Lugar varchar(100),
    Foto longblob,

    constraint PK_Eventos primary key (ID_Eventos)
);

-- Crear tabla CrearVer (M-M Usuarios <-> Eventos) --
create table if not exists CrearVer
(
    Correo varchar(10),
    ID_Eventos varchar(25),

    constraint PK_CrearVer primary key (Correo, ID_Eventos),
    constraint FK_CV_Usuarios foreign key (Correo) references Usuarios(Correo) on delete cascade,
    constraint FK_CV_Eventos foreign key (ID_Eventos) references Eventos(ID_Eventos) on delete cascade
);

-- Crear tabla Animes --
create table if not exists Animes
(
    IDAnimes varchar(20),
    Nombre varchar(25),
    NumEpisodio int,
    Descripcion varchar(100),
    Archivos longblob,
    ID_User varchar(10),  -- FK --

    constraint PK_Animes primary key (IDAnimes),
    constraint FK_Usuarios_Animes foreign key (ID_User) references Usuarios(ID_User) on delete set null
);
-- Crear tabla Episodios --
create table if not exists Episodios
(
    IDEpisodios varchar(25),
    NombreAnime varchar(25),
    Titulo varchar(50),
    NumEpisodios int,
    Archivos longblob,
    IDAnimes varchar(20), -- FK -- 

    constraint PK_Episodios primary key (IDEpisodios),
    constraint FK_Animes_Episodios foreign key (IDAnimes) references Animes(IDAnimes) on delete cascade
);

-- Crear tabla BD_Mangas --
create table if not exists BD_Mangas
(
    ID_Mangas varchar(20),
    Nombre varchar(25),
    Num_Capitulo int,
    Descripcion varchar(100),
    Archivo longblob,
    ID_User varchar(10), -- FK --

    constraint PK_Mangas primary key (ID_Mangas),
    constraint FK_Usuarios_Mangas foreign key (ID_User) references Usuarios(ID_User) on delete set null
);

-- Crear tabla Capitulos --
create table if not exists Capitulos
(
    ID_Capitulos varchar(25),
    NombreManga varchar(50),
    Titulo varchar(50),
    NumCapitulo int,
    NumPaginas int,
    Archivos longblob,
    ID_Mangas varchar(20), -- FK --

    constraint PK_Capitulos primary key (ID_Capitulos),
    constraint FK_Mangas_Capitulos foreign key (ID_Mangas) references BD_Mangas(ID_Mangas) on delete cascade
);
