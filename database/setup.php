<?php

declare(strict_types=1);

function db_server(): PDO
{
    $host = env_value('DB_HOST', '127.0.0.1');
    $port = env_value('DB_PORT', '3306');
    $user = env_value('DB_USER', 'root');
    $pass = env_value('DB_PASS', '');
    $charset = env_value('DB_CHARSET', 'utf8mb4');

    $dsn = "mysql:host={$host};port={$port};charset={$charset}";

    return new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
}

function crear_base_de_datos(): void
{
    db_server()->exec(
        'CREATE DATABASE IF NOT EXISTS ferreteria
         CHARACTER SET utf8mb4
         COLLATE utf8mb4_unicode_ci'
    );
}

function crear_tablas(): void
{
    crear_base_de_datos();

    $pdo = db();

    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS clientes (
            id_cliente INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(80) NOT NULL,
            apellido VARCHAR(80) NOT NULL,
            dni CHAR(8) NOT NULL,
            telefono VARCHAR(15) NULL,
            direccion VARCHAR(150) NULL,
            correo VARCHAR(120) NULL,
            UNIQUE KEY uk_clientes_dni (dni),
            UNIQUE KEY uk_clientes_correo (correo)
        ) ENGINE=InnoDB'
    );

    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS proveedores (
            id_proveedor INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nombre_empresa VARCHAR(120) NOT NULL,
            ruc CHAR(11) NOT NULL,
            telefono VARCHAR(15) NULL,
            direccion VARCHAR(150) NULL,
            correo VARCHAR(120) NULL,
            contacto VARCHAR(120) NULL,
            UNIQUE KEY uk_proveedores_ruc (ruc),
            UNIQUE KEY uk_proveedores_correo (correo)
        ) ENGINE=InnoDB'
    );

    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS categorias (
            id_categoria INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nombre_categoria VARCHAR(100) NOT NULL,
            descripcion VARCHAR(255) NULL,
            UNIQUE KEY uk_categorias_nombre (nombre_categoria)
        ) ENGINE=InnoDB'
    );

    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS productos (
            id_producto INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(120) NOT NULL,
            descripcion VARCHAR(255) NULL,
            marca VARCHAR(80) NULL,
            precio_compra DECIMAL(10,2) NOT NULL DEFAULT 0.00,
            precio_venta DECIMAL(10,2) NOT NULL DEFAULT 0.00,
            stock_actual INT NOT NULL DEFAULT 0,
            codigo_barras VARCHAR(50) NOT NULL,
            id_categoria INT UNSIGNED NOT NULL,
            id_proveedor INT UNSIGNED NOT NULL,
            UNIQUE KEY uk_productos_codigo_barras (codigo_barras),
            KEY idx_productos_categoria (id_categoria),
            KEY idx_productos_proveedor (id_proveedor),
            CONSTRAINT fk_productos_categoria FOREIGN KEY (id_categoria)
                REFERENCES categorias (id_categoria)
                ON UPDATE CASCADE
                ON DELETE RESTRICT,
            CONSTRAINT fk_productos_proveedor FOREIGN KEY (id_proveedor)
                REFERENCES proveedores (id_proveedor)
                ON UPDATE CASCADE
                ON DELETE RESTRICT
        ) ENGINE=InnoDB'
    );

    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS usuarios (
          id_usuario INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          nombre     VARCHAR(80)  NOT NULL,
          apellido   VARCHAR(80)  NOT NULL,
          correo     VARCHAR(120) NOT NULL,
          password   VARCHAR(255) NOT NULL,
          rol        ENUM(\'admin\', \'user\') NOT NULL DEFAULT \'user\',
          activo     TINYINT(1) NOT NULL DEFAULT 1,
          UNIQUE KEY uk_usuarios_correo (correo)
      ) ENGINE=InnoDB'
    );
}
