# 🏥 Prueba Técnica – Desarrollador SIHOS

Este proyecto fue desarrollado como parte de una **prueba técnica para el cargo de Desarrollador**.  
El objetivo principal fue implementar una aplicación básica en **Laravel** que gestione la información de pacientes, cumpliendo con los requerimientos de **lógica de programación, bases de datos y arquitectura MVC**.

---

## 🚀 Tecnologías utilizadas

- **PHP 8.2**  
- **Laravel 11**  
- **MySQL 8**  
- **Composer**  
- **Laragon** como entorno local  
- **Git & GitHub** para control de versiones  

---

## 🧱 Estructura general del proyecto

### 1. Base de Datos
El sistema está compuesto por las siguientes tablas principales:

| Tabla | Descripción |
|-------|--------------|
| `departamentos` | Lista de departamentos |
| `municipios` | Municipios asociados a cada departamento |
| `tipos_documento` | Tipos de documento (Cédula, Tarjeta, etc.) |
| `genero` | Registro de géneros |
| `paciente` | Datos de los pacientes, con sus respectivas relaciones |
| `users` | Usuarios del sistema (incluye usuario administrador) |

### Relaciones:
- Un **departamento** tiene muchos **municipios**.  
- Un **paciente** pertenece a un **departamento**, **municipio**, **género** y **tipo de documento**.

---

## 🧩 Migraciones y Seeders

Se implementaron **migraciones** y **seeders** para inicializar el sistema con datos de ejemplo.  
Ejecutar los siguientes comandos:

```bash
php artisan migrate
php artisan db:seed
