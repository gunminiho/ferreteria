<?php

declare(strict_types=1);

function producto_all(): array
{
    $sql = 'SELECT p.*, c.nombre_categoria, pr.nombre_empresa
            FROM productos p
            INNER JOIN categorias c ON c.id_categoria = p.id_categoria
            INNER JOIN proveedores pr ON pr.id_proveedor = p.id_proveedor
            ORDER BY p.id_producto DESC';

    return db()->query($sql)->fetchAll();
}

function producto_find(int $id): ?array
{
    $stmt = db()->prepare('SELECT * FROM productos WHERE id_producto = :id LIMIT 1');
    $stmt->execute(['id' => $id]);

    return $stmt->fetch() ?: null;
}

function producto_create(array $data): array
{
    $data = only_fields($data, [
        'nombre',
        'descripcion',
        'marca',
        'precio_compra',
        'precio_venta',
        'stock_actual',
        'codigo_barras',
        'id_categoria',
        'id_proveedor',
    ]);
    $data = fill_missing($data, [
        'nombre' => '',
        'descripcion' => null,
        'marca' => null,
        'precio_compra' => 0,
        'precio_venta' => 0,
        'stock_actual' => 0,
        'codigo_barras' => '',
        'id_categoria' => 0,
        'id_proveedor' => 0,
    ]);

    $stmt = db()->prepare(
        'INSERT INTO productos (
            nombre,
            descripcion,
            marca,
            precio_compra,
            precio_venta,
            stock_actual,
            codigo_barras,
            id_categoria,
            id_proveedor
         ) VALUES (
            :nombre,
            :descripcion,
            :marca,
            :precio_compra,
            :precio_venta,
            :stock_actual,
            :codigo_barras,
            :id_categoria,
            :id_proveedor
         )'
    );
    $stmt->execute($data);

    return producto_find((int) db()->lastInsertId());
}
