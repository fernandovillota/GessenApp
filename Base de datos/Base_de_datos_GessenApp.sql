CREATE DATABASE Base_de_datos_GessenApp;

USE Base_de_datos_GessenApp;

CREATE TABLE formulario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    genero VARCHAR(50),
    telefono VARCHAR(10) NOT NULL,
    ciudad VARCHAR(255) NOT NULL,
    enfermedad VARCHAR(255),
    dieta VARCHAR(50)
);

CREATE TABLE sesion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);
