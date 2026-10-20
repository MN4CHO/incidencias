DROP DATABASE IF EXISTS incidencias_db;
CREATE DATABASE incidencias_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE incidencias_db;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE incidencia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT NOT NULL,
    prioridad ENUM('alta', 'media', 'baja') NOT NULL,
    id_usuario INT NOT NULL,
    CONSTRAINT fk_incidencia_usuario FOREIGN KEY (id_usuario) 
        REFERENCES usuario(id) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO usuario (usuario, clave, nombre) VALUES
    ('luis',  'luis123',  'Luis'),
    ('pedro', 'pedro123', 'Pedro'),
    ('ana',   'ana123',   'Ana');

INSERT INTO incidencia (nombre, descripcion, prioridad, id_usuario) VALUES
    ('Error al iniciar sesión en el ERP', 'Al ingresar usuario y clave correctos, el sistema ERP muestra una pantalla en blanco.', 'media', 1),
    ('Impresora del área contable no responde', 'La impresora aparece desconectada desde esta mañana aunque está encendida.', 'baja', 1),
    ('Cálculos realizados incorrectos', 'La suma de los detalles de la factura debería ser 100 dólares, pero el sistema muestra 110.', 'alta', 2),
    ('Reporte mensual no se genera', 'Al pulsar Generar reporte, el sistema se queda cargando y nunca descarga el archivo.', 'media', 2);