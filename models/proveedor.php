<?php

declare(strict_types=1);

function proveedor_all(): array
{
    return db()->query('SELECT * FROM proveedores ORDER BY id_proveedor DESC')->fetchAll();
}

function proveedor_find(int $id): ?array
{
    $stmt = db()->prepare('SELECT * FROM proveedores WHERE id_proveedor = :id LIMIT 1');
    $stmt->execute(['id' => $id]);

    return $stmt->fetch() ?: null;
}

function proveedor_create(array $data): array
{
    $data = only_fields($data, ['nombre_empresa', 'ruc', 'telefono', 'direccion', 'correo', 'contacto']);
    $data = fill_missing($data, [
        'nombre_empresa' => '',
        'ruc' => '',
        'telefono' => null,
        'direccion' => null,
        'correo' => null,
        'contacto' => null,
    ]);

    $stmt = db()->prepare(
        'INSERT INTO proveedores (nombre_empresa, ruc, telefono, direccion, correo, contacto)
         VALUES (:nombre_empresa, :ruc, :telefono, :direccion, :correo, :contacto)'
    );
    $stmt->execute($data);

    return proveedor_find((int) db()->lastInsertId());
}
