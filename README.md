# Sistema de Información Hospitalaria - SIHOS

---

## Características principales

- CRUD completo de pacientes.  
- Validaciones y autenticación de usuario.  
- API RESTful con controladores y modelos Laravel.  
- Conexión a base de datos mediante migraciones y seeders.  
- Interfaz web responsive con Bootstrap y JavaScript (fetch API).

---

## Requisitos

- PHP ≥ 8.1  
- Composer  
- MySQL  
- Laragon o XAMPP

---

## Instalación

```bash
# Clonar repositorio
git clone https://github.com/CarlosMM091/PRUEBA_SIHOS.git
cd PRUEBA_SIHOS

# Instalar dependencias
composer install

# Configurar entorno
cp .env.example .env
php artisan key:generate

# Configurar base de datos en .env y ejecutar migraciones
php artisan migrate --seed

# Iniciar servidor
php artisan serve

```
## Accede a: http://127.0.0.1:8000/frontend/login.html

Credenciales de acceso
Usuario	admin@example.com
Contraseña	1234567890
