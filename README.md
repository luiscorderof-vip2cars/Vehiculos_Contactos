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

2. **Instalar dependencias de PHP**
   ```bash
   composer install

3. **Crear el archivo de entorno**
   ```bash
   cp .env.example .env

4. **Generar la clave de la aplicación**
   ```bash
   php artisan key:generate

5. **Configurar la base de datos en .env**
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=VehiculosContactos_DB
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_password

6. **Ejecutar migraciones y seeders**
   ```bash
   php artisan migrate --seed

## ▶️ Uso

1. **Levantar el servidor de desarrollo**
   ```bash
   php artisan serve
   La aplicación estará disponible en:
   👉 http://127.0.0.1:8000
   
2. **Usuario de prueba**
   ```bash
   Email: demo@vip2cars.local
   Password: demo1234

3. **Endpoints principales (API REST)**
   ```bash
   | Método | Endpoint           | Descripción         |
   | ------ | ------------------ | ------------------- |
   | GET    | /api/vehicles      | Listar vehículos    |
   | POST   | /api/vehicles      | Crear vehículo      |
   | PUT    | /api/vehicles/{id} | Actualizar vehículo |
   | DELETE | /api/vehicles/{id} | Eliminar vehículo   |

## 🤝 Contribuciones
¡Las contribuciones son bienvenidas!
Si deseas mejorar este proyecto, envía un Pull Request o abre un Issue.
