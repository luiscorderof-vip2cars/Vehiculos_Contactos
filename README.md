# 🚗 VIP2CARS - CRUD Vehículos y Contactos

Sistema desarrollado en **Laravel 11** con conexión a base de datos **MySQL** para gestionar:

- 🚘 Vehículos (Placa, Marca, Modelo, Año de fabricación, Datos del cliente).  
- 👥 Contactos (Nombre, Apellidos, Documento, Email, Teléfono, Cargo, Notas).  

Incluye:
- Autenticación con usuario demo (`demo@vip2cars.local` / `demo1234`)  
- Paginación y búsqueda en listados  
- Validaciones en formularios  
- Manejo de errores estandarizado en JSON  

---

## 📦 Requisitos

Antes de comenzar asegúrate de tener instalado:

- [PHP 8.2+](https://www.php.net/)  
- [Composer](https://getcomposer.org/)  
- [MySQL 8+](https://dev.mysql.com/downloads/)  
- [Node.js + NPM](https://nodejs.org/) (si usas frontend)  
- [Git](https://git-scm.com/)  

---

## ⚙️ Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/TU_USUARIO/Vip2Cars_VehiculosContactos.git
   cd Vip2Cars_VehiculosContactos
composer install
cp .env.example .env
php artisan key:generate

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=VehiculosContactos_DB
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password

php artisan migrate --seed
php artisan serve
Email: demo@vip2cars.local
Password: demo1234
