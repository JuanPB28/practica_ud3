# Práctica UD3: Bases de datos relacionales

## Descripción

#### Software Gestión de Mantenimiento de Equipos Informáticos

Supongamos que un cliente nos solicita implementar un sistema para gestionar el mantenimiento de los ordenadores de una escuela, y la propuesta de proyecto es la siguiente:

##### Objetivo del Proyecto:
Desarrollar un programa que permita gestionar el mantenimiento de los equipos informáticos de la empresa. Para ello se debe administrar a los usuarios, equipos, sus respectivas fichas técnicas y tipos, así como gestionar incidencias, mantenimientos y las operaciones asociadas a los equipos.

##### Requisitos Funcionales:
1. Gestión de Usuarios:
    - Registrar y gestionar usuarios (técnicos) que tendrán acceso al sistema.
    - Cada usuario debe tener un nombre y un correo electrónico único.
2. Gestión de Tipo de Equipos Informáticos:
    - Registrar y gestionar los tipos de equipos, indicando su nombre y descripción.
3. Gestión de Equipos Informáticos:
    - Registrar y gestionar los equipos informáticos, indicando su ubicación (aula y mesa).
    - Cada equipo tiene que estar asociado a un tipo de equipo específico.
    - Cada equipo debe tener una ficha técnica asociada.
4. Gestión Fichas Técnicas:
    - Registrar y gestionar las fichas técnicas de los equipos, incluyendo número de serie, marca, modelo, sistema operativo y componentes.
    - Cada ficha técnica debe estar asociada a un equipo específico.
5. Gestión de Incidencias:
    - Registrar y gestionar incidencias reportadas por los usuarios.
    - Cada incidencia debe estar asociada a un equipo y, opcionalmente, a un usuario.
    - Las incidencias deben tener un estado (abierto, en proceso, cerrado) y una descripción detallada.
6. Gestión de Mantenimientos:
    - Registrar y gestionar los mantenimientos realizados en los equipos.
    - Cada mantenimiento debe estar asociado a un usuario (técnico), a un equipo y las operaciones realizadas.
    - Debe incluir observaciones y la fecha en que se realizó.
7. Gestión de Operaciones:
    - Registrar y gestionar las operaciones que se pueden realizar durante un mantenimiento (por ejemplo, limpieza, actualización de software, cambio de componentes).
    - Cada operación debe tener un nombre y una descripción.

##### Tecnologías a Utilizar:
- Backend: Laravel (PHP) para la lógica del servidor, API y la gestión de la base de datos.
- Base de Datos: MariaDB para el almacenamiento de datos.
- Despliegue: Docker para la containerización y despliegue en servidores.

## Modelo ER

![Diagrama E-R](/diagrama.png)

## Way of working

### Requisitos

1. PHP
2. Composer
3. [Laravel](https://laravel.com/docs/11.x/installation)
4. Node.js y NPM
5. [Docker Engine](https://docs.docker.com/engine/install/)
6. [Postman](https://www.postman.com/downloads/)
7. Tener descargado el proyecto

### Configuración

1. Construir y ejecutar el contenedor de MariaDB con Docker Compose:
```bash
docker compose up -d
```
2. Entrar en la carpeta del proyecto de laravel ```/app```.
3. Instalar dependencias de PHP: 
```bash
composer install
```
4. Asegurarse de que el ```.env``` tiene los siguientes parámetros:
```env
DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=app
DB_USERNAME=root
DB_PASSWORD=password
```
5. Ejecutar las migraciones y seeders:
```bash
php artisan migrate --seed
```
6. Correr el servicio de Laravel: 
```bash
php artisan serve
```

---

## Enunciado de la práctica

Debes inventar e implementar un proyecto Laravel original donde demostrar los contenidos adquiridos durante la unidad 3. 

El proyecto debe contener las siguientes secciones desarrolladas en el README.md de la raíz. Al ser un tipo de fichero Markdown, es recomendable leer esta guía para que el estilo y la visualización del texto sea correcta: https://tutorialmarkdown.com/sintaxis.

### 1. Descripción del problema (1,5p)

Debes inventar un supuesto lo más realista posible, es decir, algo que pienses que puedan pedir en la empresa donde trabajas o trabajarás, algo que un cliente te haya pedido, etc. Por ejemplo: 

*Supongamos que un cliente nos solicita implementar un sistema para gestionar las notas de los alumnos en diferentes asignaturas. Además, desea realizar el cálculo de las notas medias y % de aprobados por asignatura y alumno ...*

Criterio de corrección:
- :muscle: Sobrenatural:
    - Todos los criterios de Notable
    - El supuesto puede ser de utilidad para la escuela.
- Notable: 
    - Al menos el texto contiene 100 palabras.
    - Supuesto realista y original.
    - Se representa correctamente todas las tablas y relaciones entre ellas. Todos los atributos pueden ser inferidos con la información aportada.
- Bien:
    - Entre 50 y 100 palabras.
    - Supuesto poco realista.
    - 2 tablas o relaciones no representadas.
- Suspenso:
    - Menos de 50 palabras.
    - Supuesto no realista.
    - +2 tablas o relaciones no representadas.

### 2. Modelo E-R (1,5p)

Adjuntar una imagen del modelo E-R de vuestra aplicación. [Ver sintaxis en Markdown para renderizar imágenes](https://tutorialmarkdown.com/sintaxis#imagenes).

Criterio de corrección:

- :muscle: Sobrenatural:
    - Todos los criterios de Notable.
    - Representa una relación ternaria.
    - Representa una relación de agregación.
- Notable:
    - Se representan todos los tipos de relaciones vistas en clase (Diapositiva 3, presentación 3.3)
    - PK de cada tabla representado.
    - FK representadas con la cardenalidad (0..N, N..N)
- Bien:  
    - Faltan 2 relaciones de las vistas en clase.
    - Faltan 2 PK de cada tabla representado.
    - Faltan 2 FK representadas con la cardenalidad (0..N, N..N)
- Suspenso:
    - Faltan >2 relaciones de las vistas en clase.
    - Faltan >2 PK de cada tabla representado.
    - Faltan >2 FK representadas con la cardenalidad (0..N, N..N)

### 3. Implementación (6p)

Implementar el proyecto en Laravel.

Criterio de corrección:

- :muscle: Sobrenatural:
    - Todos los criterios de Notable.
    - Existe en la raíz del proyecto un fichero de exportación de la aplicación [Postman](https://learning.postman.com/docs/getting-started/importing-and-exporting/exporting-data/) con un ejemplo de petición a todos los endpoints publicados.
    - Existe validación sobre los parámetros Request de entrada.
- Notable:
    - Todas las tablas creadas.
    - Todos lo modelos implementados.
    - Todas las tablas contienen datos de prueba mediante Seeders.
    - Todas las relaciones implementadas.
    - Existen almenos 10 endpoints en el fichero `api.php` [Recordar configurar las API Routes](https://laravel.com/docs/11.x/routing#api-routes).
    - Todos los verbos del protocolo HTTP (GET, POST, PUT, DELETE) implementados.
- Bien:  
    - Todas las tablas creadas.
    - Todos lo modelos implementados.
    - Todas las tablas contienen datos de prueba mediante Seeders.
    - Todas las relaciones implementadas.
    - Existen almenos 5 endpoints en el fichero `api.php` [Recordar configurar las API Routes](https://laravel.com/docs/11.x/routing#api-routes).
    - Todos los verbos del protocolo HTTP (GET, POST, PUT, DELETE) implementados.
- Suspenso:
    - No todas las tablas creadas.
    - No todos lo modelos implementados.
    - No todas las tablas contienen datos de prueba mediante Seeders.
    - No todas las relaciones implementadas.
    - No existen almenos 5 endpoints en el fichero `api.php` [Recordar configurar las API Routes](https://laravel.com/docs/11.x/routing#api-routes).
    - No todos los verbos del protocolo HTTP (GET, POST, PUT, DELETE) implementados.

### 4. WoW (1p)

El *Way of working* es una descripción detallada de los requisitos tecnológicos necesarios para trabajar en el proyecto y una serie de pasos concretos a ejecutar para tener la aplicación "lista" para trabajar.

- :muscle: Sobrenatural:
    - Todos los criterios de Notable.
    - Especifica cómo instalar todos los requisitos tecnológicos (PHP, Composer, etc).
- Notable:
    - Ejecutando todas las instrucciones en el orden proporcionado logramos "levantar" la aplicación.
- Bien:  
    - Falta 1 paso para "levantar" la aplicación.
- Suspenso:
    - Falta >1 paso para "levantar" la aplicación.