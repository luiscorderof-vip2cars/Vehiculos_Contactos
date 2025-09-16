VIP2CARS - CRUD Vehículos y Contactos
Sistema desarrollado en Laravel 11 con conexión a base de datos MySQL para gestionar:
🚘 Vehículos (Placa, Marca, Modelo, Año, Cliente, etc.)
👥 Contactos de clientes (Nombre, Apellidos, Documento, Email, Teléfono, Cargo, Notas)
Incluye:
Autenticación con usuario demo (demo@vip2cars.local / demo1234)
Paginación y búsqueda en listados
Validaciones en formularios
Manejo de errores estandarizado en JSON

📦 Requisitos
Antes de comenzar asegúrate de tener instalado:
PHP 8.2+
Composer
MySQL 8+
Node.js + NPM
 (para compilar assets si usas frontend)
Git

⚙️ Instalación
Clonar el repositorio:
git clone https://github.com/TU_USUARIO/TU_REPO.git
cd TU_REPO

Instalar dependencias de PHP:
composer install

Crear el archivo de entorno:
cp .env.example .env

Generar la clave de la aplicación:
php artisan key:generate

Configurar la base de datos en .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=VehiculosContactos_DB
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password

Ejecutar migraciones y seeders:
php artisan migrate --seed

▶️ Uso
Levantar el servidor de desarrollo:
php artisan serve
La aplicación estará disponible en http://127.0.0.1:8000

Usuario de prueba:
Email: demo@vip2cars.local
Password: demo1234

Endpoints principales (API REST):
GET /api/vehicles → Listar vehículos
POST /api/vehicles → Crear vehículo
PUT /api/vehicles/{id} → Editar vehículo
DELETE /api/vehicles/{id} → Eliminar vehículo
GET /api/contacts → Listar contactos
POST /api/contacts → Crear contacto

📚 Documentación adicional
Laravel Docs
MySQL Docs

🤝 Contribuciones
Si deseas mejorar este proyecto, ¡envía un Pull Request o abre un Issue!

📜 Licencia

Este proyecto está bajo licencia MIT.
