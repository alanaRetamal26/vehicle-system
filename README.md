# Vehicle Management System

## Descripción del Proyecto
¡Hola! Este proyecto es una aplicación web para gestionar la información de vehículos. Puedes consultar los detalles de un vehículo usando su placa patente o VIN, así como agregar nuevos vehículos al sistema. La aplicación está construida con Laravel para el backend, Vue.js para el frontend y MySQL para la base de datos.

## Tecnologías Utilizadas
- **Frontend**: Vue.js
- **Backend**: Laravel
- **Base de Datos**: MySQL

## Instalación y Configuración

### Backend (Laravel)
Para poner en marcha el backend, sigue estos pasos:
1. **Clona el Repositorio**: `git clone https://github.com/alanaRetamal26/vehicle-system.git`
2. **Configura el Entorno**:
   - Copia el archivo `.env.example` a `.env`: `cp .env.example .env`
   - Edita el archivo `.env` para configurar la conexión a la base de datos:
     ```plaintext
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=laravel
     DB_USERNAME=root
     DB_PASSWORD=
     ```
3. **Instala Dependencias**: `composer install`
4. **Ejecuta Migraciones**: `php artisan migrate`
5. **Inicia el Servidor**: `php artisan serve`

### Frontend (Vue.js)
Para el frontend, sigue estos pasos:
1. **Instala Dependencias**: `npm install`
2. **Compila y Carga en Desarrollo**: `npm run serve`
3. **Compila y Minifica para Producción**: `npm run build`
4. **Linter y Corrección de Archivos**: `npm run lint`
5. **Para autilizar el proyecto en el navegador: localhost:8080**
## Uso

### Endpoints de la API

#### GET /vehicle/search
- **Descripción**: Consulta la información del vehículo por placa patente o VIN.
- **Parámetros**:
  - `query` (string): La placa patente o VIN a buscar.
- **Respuesta Ejemplo**:
  - **Estado 200 OK**:
    ```json
    {
      "id": 1,
      "vin": "1HGBH41JXMN109186",
      "engine_number": "123456789",
      "displacement": 1500,
      "year": 2020,
      "brand": "Toyota",
      "model": "Corolla",
      "version": "LE",
      "plates": ["ABC123", "XYZ456"],
      "current_owner": "John Doe"
    }
    ```

#### POST /vehicle
- **Descripción**: Agrega un nuevo vehículo al sistema.
- **Cuerpo de Solicitud**:
  ```json
  {
    "vin": "3HGBH41JXMN209188",
    "engine_number": "3456789012",
    "displacement": 2000,
    "year": 2022,
    "brand": "Ford",
    "model": "Focus",
    "version": "ST",
    "plates": ["LMN456"],
    "current_owner": "Alice Johnson",
    "id": 19
  }
#### POST /vehicle
- **Respuesta Ejemplo**:
  - **Estado 201 OK**:
    ```json
    {
    "vin": "3HGBH41JXMN209188",
    "engine_number": "3456789012",
    "displacement": 2000,
    "year": 2022,
    "brand": "Ford",
    "model": "Focus",
    "version": "ST",
    "plates": ["LMN456"],
    "current_owner": "Alice Johnson",
    "updated_at": "2024-08-13T17:20:02.000000Z",
    "created_at": "2024-08-13T17:20:02.000000Z",
    "id": 14
    }
    ```
#### LISTADO DE VEHICULOS
- **Para registrar dos vehiculos de prueba se generan con este comando=php artisan db:seed**
