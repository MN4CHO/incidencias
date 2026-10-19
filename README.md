# Sistema de Tickets de Incidencias Técnicas (SIT)

Aplicación web desarrollada en PHP y MariaDB/MySQL para el reporte y consulta de incidencias técnicas por usuario, aplicando manejo de sesiones, métodos HTTP (`GET` y `POST`), códigos de estado (`201`, `400`, `500`) y consultas preparadas.

## 1. Requisitos e Instalación (XAMPP)

1. Copiar la carpeta `incidencias` dentro del directorio `htdocs` de XAMPP (`C:\xampp\htdocs\incidencias`).
2. Abrir el **XAMPP Control Panel** e iniciar los módulos **Apache** y **MySQL** (MariaDB integrado).
3. Ingresar a `http://localhost/phpmyadmin` e importar una sola vez el archivo `incidencias.sql` ubicado en el proyecto (crea la base de datos `incidencias_db`, las tablas y los datos de prueba).
4. Acceder al sistema desde el navegador en: `http://localhost/incidencias/index.php`.

## 2. Estructura del Proyecto

```text
incidencias/
├── index.php          # Formulario de login (POST hacia listar.php)
├── listar.php         # Valida credenciales, inicia sesión y lista incidencias del usuario
├── detalle.php        # Muestra el detalle de una incidencia (?id=...)
├── registrar.php      # Formulario y procesamiento POST para crear incidencias
├── 201.php            # Estado HTTP 201: "Incidencia Creada - 201 Created"
├── 400.php            # Estado HTTP 400: "Error 400 - Bad request"
├── 500.php            # Estado HTTP 500: "Error 500 - Internal Server Error"
├── validarsesion.php  # Protege las páginas privadas verificando la sesión activa
├── cerrarsesion.php   # Destruye la sesión y redirige a index.php
├── conexion.php       # Conexión a MariaDB/MySQL con manejo de excepciones
├── consultas.php      # Funciones SQL preparadas (usuarios e incidencias)
└── incidencias.sql    # Script de creación y carga inicial de la base de datos