# Backend Ferreteria - Patron MVC

Proyecto sin frameworks y sin clases. Usa funciones organizadas con patron MVC:

```text
config/
  bootstrap.php      Carga archivos base
  database.php       Conexion PDO con funcion db()
  env.php            Carga variables desde .env
  helpers.php        Respuestas JSON y lectura de requests
controllers/
  *_controller.php   Reciben la peticion y devuelven respuesta
database/
  setup.php          Crea la base de datos y tablas desde PHP
models/
  *.php              Funciones para consultar e insertar datos
public/
  index.php          Front controller
routes/
  web.php            Definicion de rutas
```

## Levantar servidor

Configura las variables en `.env`:

```env
DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=ferreteria
DB_USER=root
DB_PASS=
DB_CHARSET=utf8mb4
```

```bash
C:\xampp\php\php.exe -S localhost:8000 -t public
```

## Crear base de datos y tablas

Con MySQL/XAMPP encendido, entra a:

```text
http://localhost:8000/setup
```

Eso crea desde PHP con un POST y GET en :

- `clientes`
- `proveedores`
- `categorias`
- `productos`

## Rutas

```text
GET  /
GET  /setup
GET  /clientes
POST /clientes
GET  /proveedores
POST /proveedores
GET  /categorias
POST /categorias
GET  /productos
POST /productos
```

## Ejemplo

```bash
curl -X POST http://localhost:8000/categorias ^
  -H "Content-Type: application/json" ^
  -d "{\"nombre_categoria\":\"Herramientas\",\"descripcion\":\"Herramientas manuales\"}"
```
