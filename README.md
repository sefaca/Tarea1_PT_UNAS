# Gestión de Productos - Aplicación CRUD en PHP

Este es un proyecto **PHP** que implementa un sistema simple de gestión de productos. Muestra operaciones CRUD (Crear, Leer, Actualizar, Borrar) en un entorno web usando PHP, HTML, CSS y MySQL. Este proyecto fue creado como parte de una prueba técnica.

# Índice

- [Introducción](#introduction)
- [Primeros pasos](#getting-started)
- [Estructura del proyecto](#project-structure)
- [Tecnologías y herramientas utilizadas](#technologies-and-tools-used)
- [Configuración de la base de datos](#database-setup)
- [Aprendizaje y desarrollo](#learning-and-development)

# Introducción

Este proyecto pretende simular un sistema básico de gestión de productos en el que el usuario pueda añadir, ver, actualizar y eliminar productos. Demuestra el desarrollo back-end esencial con PHP y MySQL mientras maneja tareas front-end básicas con HTML y CSS.

# Primeros pasos

Para poner en marcha el proyecto, siga estos pasos:

## Paso 1: Clonar el repositorio

Primero, clona este repositorio en tu máquina local:

```bash
git clone https://github.com/tu-usuario/Tarea1_PT_UNAS.git
```

## Paso 2: Configurar la base de datos

Necesitará un servidor MySQL en su máquina local. Las instrucciones para configurar la base de datos se encuentran en la sección Configuración de la base de datos.

## Paso 3: Configurar la aplicación

Actualice la configuración de conexión a la base de datos en config/database.php con sus propias credenciales MySQL:

```bash
<?php
class Database {
    private $host = "localhost";
    private $db_name = "ecommerce";
    private $username = "root"; // your MySQL username
    private $password = ""; // your MySQL password
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
```

## Paso 4: Ejecutar la aplicación

Una vez que haya configurado la base de datos y el proyecto, inicie un servidor PHP local desde la carpeta pública:

```bash
php -S localhost:8000 -t public
```

A continuación, abra su navegador y vaya a http://localhost:8000 para acceder al sistema de gestión de productos.

# Estructura del proyecto

El proyecto está organizado en torno a las siguientes carpetas y archivos principales:

- **`public/`**: Contiene los principales puntos de entrada de la aplicación, como la lista de productos y las páginas de creación, edición y eliminación.
- **`config/`**: Almacena la configuración de la conexión a la base de datos.
- **`src/`**: Contiene la clase Product.php, que maneja todas las operaciones CRUD.
- **`assets/css`**: Almacena archivos CSS para el estilo básico del front-end.

Arquitectura del proyecto

El proyecto sigue una arquitectura sencilla y directa:

- Front-end: HTML puro para la estructura y CSS para el estilo.
- Back-end: PHP con prácticas de programación orientada a objetos (POO) y declaraciones preparadas para la seguridad.

# Tecnologías y herramientas utilizadas

## Back-end:

- PHP: El principal lenguaje de programación utilizado para implementar la funcionalidad CRUD. PHP se utiliza para manejar todas las operaciones del lado del servidor y las interacciones con la base de datos.

## Front-end:

- HTML: Proporciona la estructura de la interfaz de usuario de la aplicación.
- CSS: Añade estilo y diseño a los componentes HTML.

## Base de datos:

- MySQL: Una base de datos relacional utilizada para almacenar la información de los productos. PHP Data Objects (PDO) se utiliza para interactuar de forma segura con la base de datos.

# Configuración de la base de datos

Crea una base de datos MySQL llamada ecommerce y utiliza el siguiente SQL para crear la tabla products:

```bash
CREATE DATABASE ecommerce;

USE ecommerce;

CREATE TABLE products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

# Aprendizaje y desarrollo

Este proyecto se centra en la implementación de las funcionalidades básicas de una aplicación típica de comercio electrónico. El desarrollo del proyecto ayudó a solidificar las siguientes habilidades:

- Lógica Backend con PHP: Manejo de persistencia de datos y operaciones CRUD usando PHP plano, siguiendo estructuras de código limpias y modulares.
- Gestión de bases de datos con MySQL: Diseño de una base de datos relacional sencilla y uso de PDO para transacciones de base de datos seguras.
- Separación de intereses: Mantener la lógica de negocio (clase Producto) separada de la presentación (vistas HTML).
- Prácticas de seguridad: Implementación de consultas SQL con sentencias preparadas para evitar inyecciones SQL.

Este proyecto ha sido un excelente ejercicio para reforzar los principios básicos de desarrollo web y desarrollo backend.








