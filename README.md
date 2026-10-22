# Sistema de Tickets de Incidencias Técnicas (SIT)

Aplicación web desarrollada en PHP y MariaDB/MySQL para el reporte y consulta de incidencias técnicas por usuario. Aplica manejo de sesiones, métodos HTTP (`GET` y `POST`), códigos de estado HTTP (`201`, `400`, `500`) y consultas preparadas para mayor seguridad.

---

## 1. Requisitos e Instalación (XAMPP)

1. Copiar la carpeta `incidencias` dentro del directorio `htdocs` de XAMPP (usualmente en `C:\xampp\htdocs\incidencias`).
2. Abrir el **XAMPP Control Panel** e iniciar los módulos **Apache** y **MySQL** (MariaDB integrado).
3. Ingresar a `http://localhost/phpmyadmin` e importar una sola vez el archivo `incidencias.sql` ubicado en el proyecto (esto creará la base de datos `incidencias_db`, las tablas y los datos de prueba).
4. Acceder al sistema desde el navegador web en: `http://localhost/incidencias/index.php`.

### Guía para importar la Base de Datos en phpMyAdmin

> **Nota sobre el límite de tamaño:** Si tu archivo de base de datos (`.sql` o `.sql.gz`) pesa más de 2 MB u 8 MB (según la configuración predeterminada de PHP en XAMPP), la carga desde la interfaz fallará. Para archivos muy grandes, se recomienda importar desde la consola de comandos de MySQL/MariaDB.

Sigue estos pasos para realizar la importación:

1. **Iniciar el servicio de MySQL/MariaDB:** Abre el XAMPP Control Panel y haz clic en el botón *Start* que se encuentra al lado de Apache y de MySQL.
   * *Verificación:* Ambos servicios deben mostrarse con fondo verde e indicar los puertos activos (por ejemplo, puerto 3306 para MySQL).
2. **Abrir phpMyAdmin:** Haz clic en el botón *Admin* de la fila de MySQL en el XAMPP Control Panel, o abre tu navegador e ingresa a `http://localhost/phpmyadmin/`.
   * *Verificación:* Cargará la interfaz principal de phpMyAdmin mostrando el menú lateral con las bases de datos existentes.
3. **Crear una nueva base de datos (Recomendado):** En la barra lateral izquierda, haz clic en *Nueva (New)*. Asigna un nombre a la base de datos (en este caso `incidencias_db`) y en la codificación selecciona `utf8mb4_unicode_ci`. Luego haz clic en *Crear*.
   * *Verificación:* La nueva base de datos aparecerá listada en la columna de la izquierda y se seleccionará automáticamente.
4. **Acceder a la opción de Importar:** Con la base de datos seleccionada (asegúrate de ver su nombre en la parte superior), haz clic en la pestaña *Importar (Import)* ubicada en el menú superior.
   * *Verificación:* Verás una sección titulada "Importando en la base de datos [nombre_de_tu_bd]" con la opción "Seleccionar archivo".
5. **Seleccionar y subir el archivo `.sql`:** Haz clic en el botón *Seleccionar archivo (Browse)* y busca en tu equipo el archivo `.sql` (o comprimido `.sql.gz` / `.zip`) que deseas subir. Deja el resto de las opciones en su configuración por defecto.
   * *Verificación:* El nombre de tu archivo se mostrará junto al botón de selección.
6. **Ejecutar la importación:** Desplázate hasta el final de la página y haz clic en el botón *Importar* (o *Continuar* / *Go*).
   * *Verificación:* Tras unos segundos o minutos (según el tamaño del archivo), aparecerá un recuadro verde indicando: "La importación se ejecutó exitosamente, X consultas ejecutadas", y las tablas se mostrarán en la columna izquierda.

---

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
```

---

## 3. Contrato del Grupo y Especificaciones Técnicas

| Elemento | Valor / Especificación |
| :--- | :--- |
| **Base de datos** | `incidencias_db` (Host: `localhost`, Usuario: `root`, Clave: `""`, Charset: `utf8mb4`) |
| **Tabla `usuario`** | `id`, `usuario`, `clave`, `nombre` |
| **Tabla `incidencia`** | `id` (AUTO_INCREMENT), `nombre`, `descripcion`, `prioridad` (alta, media, baja), `id_usuario` |
| **Variables de sesión** | `$_SESSION['id_usuario']`, `$_SESSION['nombre']` |
| **Formulario Login** | Campos `usuario` y `clave` enviados por método `POST` hacia `listar.php` |
| **Formulario Registrar** | Campos `nombre`, `descripcion` y `prioridad` enviados por método `POST` hacia `registrar.php` |

### Usuarios de Prueba (precargados en `incidencias.sql`)

* **Usuario:** `luis` / **Clave:** `luis123` *(con incidencias registradas)*
* **Usuario:** `pedro` / **Clave:** `pedro123` *(con incidencias registradas)*
* **Usuario:** `ana` / **Clave:** `ana123` *(sin incidencias registradas)*

### Funciones de Acceso a Datos (`consultas.php`)

* `buscarUsuario($conexion, $usuario, $clave)`: Retorna un array con el `id` y `nombre` si las credenciales coinciden, o `null` si no son válidas.
* `listarPorUsuario($conexion, $idUsuario)`: Retorna un array con el `id` y `nombre` de las incidencias pertenecientes al usuario especificado.
* `obtenerIncidencia($conexion, $id, $idUsuario)`: Retorna el detalle (`id`, `nombre`, `descripcion`, `prioridad`) validando estrictamente que la incidencia pertenezca a `$idUsuario`, o `null` en caso contrario.
* `insertarIncidencia($conexion, $idUsuario, $nombre, $descripcion, $prioridad)`: Inserta una nueva incidencia utilizando una sentencia preparada con 4 parámetros (`?`); devuelve `true` en caso de éxito o `false` en caso de error.
