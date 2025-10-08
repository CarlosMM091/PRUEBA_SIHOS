🩺 Sistema de Información Hospitalaria - SIHOS

SIHOS es una aplicación desarrollada en Laravel (PHP) con un frontend en HTML, CSS y JavaScript, que permite gestionar la información de pacientes a través de un sistema CRUD completo (Crear, Leer, Actualizar y Eliminar).
El proyecto implementa una API RESTful con autenticación de usuarios, validaciones y conexión a base de datos mediante PDO, cumpliendo los requerimientos del ejercicio de evaluación.

🚀 Características principales

CRUD completo de pacientes (crear, listar, editar y eliminar).

Validaciones de correo electrónico y campos requeridos.

Autenticación mediante sesiones (login/logout).

Conexión a base de datos MySQL con migraciones y seeders.

Estructura modular de controladores y modelos.

Frontend totalmente funcional en HTML, CSS (Bootstrap) y JavaScript (fetch API).

Integración AJAX para evitar recargas de página.

⚙️ Requisitos del sistema
Requisito	Versión mínima
PHP	8.1
Composer	2.x
MySQL	5.7 o superior
Node.js (opcional)	16.x o superior
Laragon / XAMPP	Cualquier versión compatible
🧩 Instalación del proyecto
1️⃣ Clonar el repositorio
git clone https://github.com/CarlosMM091/PRUEBA_SIHOS.git
cd PRUEBA_SIHOS

2️⃣ Instalar dependencias de Laravel
composer install

3️⃣ Configurar entorno .env

Copia el archivo de ejemplo y configura tu conexión a base de datos:

cp .env.example .env


Abre el archivo .env y modifica los siguientes valores:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sihos_db
DB_USERNAME=root
DB_PASSWORD=

4️⃣ Generar la clave de aplicación y ejecutar migraciones
php artisan key:generate
php artisan migrate --seed


Esto creará todas las tablas y las llenará con los registros iniciales de prueba.

5️⃣ Levantar el servidor de desarrollo
php artisan serve


La aplicación quedará disponible en:
👉 http://127.0.0.1:8000

🌐 Frontend

El frontend se encuentra en la ruta:

public/frontend/


Archivos principales:

index.html → Listado de pacientes.

create.html → Formulario de registro.

edit.html → Formulario de edición.

login.html → Pantalla de autenticación.

script.js → Lógica de conexión con la API (fetch, POST, PUT, DELETE, GET).

Para visualizarlo, simplemente abre index.html desde el navegador o accede a la ruta configurada en tu servidor Laragon.

🧱 Base de datos y relaciones

Las migraciones creadas cubren las siguientes tablas:

departamentos (id, nombre)

municipios (id, departamento_id, nombre)

tipos_documento (id, nombre)

genero (id, nombre)

paciente (id, tipo_documento_id, numero_documento, nombre1, nombre2, apellido1, apellido2, genero_id, departamento_id, municipio_id, correo)

Seeders incluidos:

DepartamentosSeeder → 5 registros

MunicipiosSeeder → 2 por cada departamento

TiposDocumentoSeeder → 2 registros

GeneroSeeder → 2 registros

UsersSeeder → Usuario administrador

PacienteSeeder → 5 pacientes de prueba

🔑 Usuario para ingresar al sistema
Campo	Valor
Documento	admin@example.com
Contraseña	1234567890
🧠 Tecnologías utilizadas

Backend: Laravel 11 (PHP)

Frontend: HTML, CSS (Bootstrap), JavaScript (fetch API)

Base de datos: MySQL / SQLite

Control de versiones: Git & GitHub

📁 Estructura general del proyecto
prueba_sihos/
├── app/
│   ├── Http/Controllers/
│   │   ├── PacienteController.php
│   │   └── UserController.php
│   └── Models/
│       ├── Paciente.php
│       ├── Departamento.php
│       ├── Municipio.php
│       ├── Genero.php
│       └── TipoDocumento.php
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
│   └── frontend/
│       ├── index.html
│       ├── create.html
│       ├── edit.html
│       ├── login.html
│       └── script.js
│
└── routes/
    └── api.php

✅ Funcionalidades del CRUD
Acción	Descripción	Método API
Listar pacientes	Muestra todos los pacientes registrados	GET /api/pacientes
Crear paciente	Permite registrar un nuevo paciente	POST /api/pacientes
Editar paciente	Modifica los datos de un paciente existente	PUT /api/pacientes/{id}
Eliminar paciente	Borra un paciente del sistema	DELETE /api/pacientes/{id}
🧾 Licencia

Este proyecto fue desarrollado como prueba técnica de evaluación, y puede ser reutilizado con fines académicos o de aprendizaje.

¿Quieres que te lo prepare ya con formato Markdown (README.md) para copiarlo directamente en tu repositorio? (te lo paso con todos los títulos, negritas, íconos y enlaces listos).

You said:
Si 
ChatGPT said:

Perfecto 🔥
Aquí tienes el README.md completo en formato Markdown, totalmente listo para copiar y pegar en tu repositorio GitHub.
(Si lo pegas en el archivo README.md, GitHub automáticamente mostrará los íconos, títulos, colores y formato bonito que viste en la imagen anterior 👇)

# 🩺 Sistema de Información Hospitalaria - SIHOS

![Laravel Logo](https://laravel.com/img/logomark.min.svg)

**SIHOS** es una aplicación desarrollada en **Laravel (PHP)** con un frontend en **HTML, CSS y JavaScript**, que permite gestionar la información de pacientes a través de un sistema **CRUD completo** (Crear, Leer, Actualizar y Eliminar).  
El proyecto implementa una **API RESTful** con autenticación de usuarios, validaciones y conexión a base de datos mediante **PDO**, cumpliendo los requerimientos del ejercicio de evaluación.

---

## 🚀 Características principales

- CRUD completo de pacientes (crear, listar, editar y eliminar).  
- Validaciones de correo electrónico y campos requeridos.  
- Autenticación mediante sesiones (login/logout).  
- Conexión a base de datos **MySQL** con migraciones y seeders.  
- Estructura modular de controladores y modelos.  
- Frontend totalmente funcional en HTML, CSS (Bootstrap) y JavaScript (fetch API).  
- Integración AJAX para evitar recargas de página.

---

## ⚙️ Requisitos del sistema

| Requisito | Versión mínima |
|------------|----------------|
| PHP | 8.1 |
| Composer | 2.x |
| MySQL | 5.7 o superior |
| Node.js (opcional) | 16.x o superior |
| Laragon / XAMPP | Cualquier versión compatible |
