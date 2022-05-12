/*Abel Mansilla Felipe*/

-- Creamos usuario

CREATE USER '2daw023T'@'localhost' IDENTIFIED BY 'password';

-- Le otorgamos permisos de seleccionar, añadir, modificar y eliminar sobre la base de datos minijuegos

GRANT SELECT, INSERT, UPDATE, DELETE ON `minijuegos`.* TO '2daw023T'@'localhost';