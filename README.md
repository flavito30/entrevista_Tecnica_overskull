# Prueba Tecnica

NO TERMINE LA DOCUMENTACION CON SWAGGER ASI QUE HICE ALGO EXTRA QUE HICE ALGO EXTRA PARA RECOMPENSARLO

Esta es una API para gestionar tareas personales, donde cada usuario puede registrar sus tareas, marcarlas como completadas o no, y ver todas sus tareas. Los usuarios deben registrarse e iniciar sesión para acceder a las rutas de tareas , cuando inicien sesion o se registren resiviran un token con el cual podran acceder a las rutas de Tareas .


## Características

- **Registro de Usuarios**: Permite a los usuarios registrarse en la plataforma.
- **Autenticación**: Inicio de sesión y cierre de sesión utilizando tokens de acceso.
- **Gestión de Tareas**: CRUD (Crear, Leer, Actualizar, Eliminar) de tareas asociadas a cada usuario.
- **Validaciones**: Uso de FormRequests para validar las solicitudes.
- **Seguridad**: Rutas protegidas con middleware de autenticación.


## Instalación

1. Clonar el repositorio:

   ```bash
   git clone https://github.com/flavito30/entrevista_Tecnica_overskull.git

2. Tener instalado Sanctum 
      ```bash
   composer require laravel/sanctum

## Endpoints
 REGISTRO : 
 Primero que nada devemos registrarnos para tener un usuario en la BD
   ```bash
   'http://localhost:8000/api/register'
 
 {
    "name": "Carlos García",
    "email": "carlos@example.com",
    "password": "password123",
    "password_confirmation": "password123"
 }

Login : 

http://localhost:8000/api/login

{
    "email": "carlos@example.com",
    "password": "password123"
}

//RECUERDA PARA ACCEDER A RUTAS DE CURSOS DEBES TENER EL TOKEN DE ACCESO PROPORCIANDO AL MOMENTO DE LOGEARTE O REGISTRATE Y PEGARLO EN EL BEARER TOKEN

registar Curso : 

   Post  : http://localhost:8000/api/task

   {
    "title": "Leer un libro",
    "description": "Leer el capítulo 5 del libro de Laravel"
   }

Obtener Curso :

   Get : http://localhost:8000/api/task

Obtener Curso por id : 

   Get : http://localhost:8000/api/task/id

Actualizar Curso por id : 

   Put : http://localhost:8000/api/task/{id}

Eliminar Curso por id : 

   Delete : http://localhost:8000/api/task/{id}

