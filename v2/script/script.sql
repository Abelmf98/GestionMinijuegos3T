-- Base de datos

-- Elminar base de datos
DROP DATABASE IF EXISTS miniJuegos;

-- Crear base de datos
CREATE DATABASE miniJuegos DEFAULT CHARACTER set utf8 COLLATE utf8_spanish_ci;

-- Seleccionar base de datos
USE miniJuegos;

-- Tabla
CREATE TABLE miniJuego(
    idMinijuego tinyint UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(60) NOT NULL UNIQUE,
    icono varchar(60) NULL,
    ruta varchar(255) NOT NULL
);