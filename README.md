# 🚀 Proyecto Full-Stack: Sistema de Gestión de Estudiantes y Cursos

Este proyecto es una aplicación web completa que permite la gestión administrativa de alumnos y sus respectivos cursos. La arquitectura ha sido diseñada separando el frontend, el backend y la base de datos en diferentes servicios usando render, vercel y Aiven.

## 🏗️ Arquitectura del Sistema

La aplicación se apoya en tres pilares fundamentales para garantizar su funcionamiento online:

* **Frontend (Vue.js 3):** Desplegado en **Vercel**. Es una Single Page Application (SPA) que gestiona la interfaz y la lógica de usuario.
* **Backend (Laravel 11):** Desplegado en **Render**. Funciona como una API RESTful que procesa las peticiones y se comunica con la base de datos.
* **Base de Datos (MySQL):** Alojada en **Aiven**. Una base de datos gestionada que asegura que los datos persistan independientemente del estado de los servidores.

## 🛠️ Stack Tecnológico

* **Frontend:** Vue.js 3 (Options API), Vite.
* **Backend:** PHP 8.x, Framework Laravel 11.
* **Base de Datos:** MySQL 8.0 (vía Aiven).
* **Despliegue e Infraestructura:** Vercel (Frontend CI/CD), Render (Backend), GitHub (Control de versiones).

## 📝 Proceso de Implementación y Despliegue

### 1. Preparación de la Base de Datos
* Se configuró una instancia de MySQL en **Aiven**.
* Se vincularon las credenciales mediante variables de entorno para una conexión segura desde el backend.

### 2. Configuración del Backend (Render)
* Se usaron las variables de entorno que nos dio Aiven al configurar la Base de Datos
* Se crearon los modelos, controladores y migraciones para las entidades `Student` y `Course`.
* Se ajustó el archivo `config/cors.php` para permitir el acceso desde el dominio de producción de Vercel.
* Se realizó el despliegue automático conectando el repositorio de GitHub a **Render**.

### 3. Desarrollo del Frontend (Vercel)
* Con la parte de Render ya funcional cogi el repositorio de GitHub
* Se implementaron componentes reactivos para el listado y CRUD de datos.
* Se configuró el **Root Directory** en Vercel apuntando a `Frontend/vue-project`.
* Se corrigieron las rutas de importación de componentes para asegurar la compatibilidad con el entorno de compilación de Vercel.

## 🚀 Acceso al Proyecto

* **URL del Frontend:** [https://practica-final-vercelrender.vercel.app](https://practica-final-vercelrender.vercel.app)

> **Nota Importante:** Debido al uso de la capa gratuita de **Render**, el servidor entra en reposo tras periodos de inactividad. La primera carga de datos puede demorar unos **50 segundos** mientras la instancia se reactiva.


## Imágenes del proceso 
---
**Desarrollado por:** Alejandro López Garrido