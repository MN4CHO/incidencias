-- =====================================================================
--  Sistema de Tickets de Incidencias Técnicas (SIT)
--  Script de base de datos para MariaDB (XAMPP)
--
--  Cómo usarlo: phpMyAdmin -> pestaña "Importar" -> elegir este fichero
--  -> "Importar". Se puede volver a importar las veces que haga falta:
--  borra la base anterior y la crea de nuevo con los datos de prueba.
-- =====================================================================

DROP DATABASE IF EXISTS incidencias_db;

CREATE DATABASE incidencias_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE incidencias_db;

-- ---------------------------------------------------------------------
--  Tabla usuario: personas que pueden iniciar sesión en el sistema
-- ---------------------------------------------------------------------
CREATE TABLE usuario (
    id       INT          NOT NULL AUTO_INCREMENT,
    usuario  VARCHAR(50)  NOT NULL,              -- lo que se escribe en el login
    clave    VARCHAR(255) NOT NULL,              -- contraseña
    nombre   VARCHAR(100) NOT NULL,              -- se muestra en "Bienvenido ..."
    PRIMARY KEY (id),
    UNIQUE KEY uk_usuario (usuario)              -- no puede haber dos usuarios iguales
) ENGINE = InnoDB;

-- ---------------------------------------------------------------------
--  Tabla incidencia: problemas reportados por cada usuario
-- ---------------------------------------------------------------------
CREATE TABLE incidencia (
    id           INT                          NOT NULL AUTO_INCREMENT,  -- ID autoincremental (lo da la BD)
    nombre       VARCHAR(150)                 NOT NULL,
    descripcion  TEXT                         NOT NULL,
    prioridad    ENUM('alta', 'media', 'baja') NOT NULL,
    id_usuario   INT                          NOT NULL,                 -- quién la registró
    PRIMARY KEY (id),
    CONSTRAINT fk_incidencia_usuario
        FOREIGN KEY (id_usuario) REFERENCES usuario (id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE = InnoDB;

-- ---------------------------------------------------------------------
--  Datos de prueba
-- ---------------------------------------------------------------------
--  Usuarios para iniciar sesión:
--    luis  / luis123   -> tiene 2 incidencias
--    pedro / pedro123  -> tiene 2 incidencias
--    ana   / ana123    -> no tiene incidencias (para probar la lista vacía)
INSERT INTO usuario (usuario, clave, nombre) VALUES
    ('luis',  'luis123',  'Luis'),
    ('pedro', 'pedro123', 'Pedro'),
    ('ana',   'ana123',   'Ana');

INSERT INTO incidencia (nombre, descripcion, prioridad, id_usuario) VALUES
    ('Error al iniciar sesión en el ERP',
     'Al ingresar usuario y clave correctos, el sistema ERP muestra una pantalla en blanco.',
     'media', 1),
    ('Impresora del área contable no responde',
     'La impresora aparece desconectada desde esta mañana aunque está encendida.',
     'baja', 1),
    ('Cálculos realizados incorrectos',
     'La suma de los detalles de la factura debería ser 100 dólares, pero el sistema muestra 110.',
     'alta', 2),
    ('Reporte mensual no se genera',
     'Al pulsar Generar reporte, el sistema se queda cargando y nunca descarga el archivo.',
     'media', 2);
