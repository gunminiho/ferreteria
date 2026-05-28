<?php

declare(strict_types=1);

function cliente_all(): array
{
    return db()->query('SELECT * FROM clientes ORDER BY id_cliente DESC')->fetchAll();
}

function cliente_find(int $id): ?array
{
    $stmt = db()->prepare('SELECT * FROM clientes WHERE id_cliente = :id LIMIT 1');
    $stmt->execute(['id' => $id]);

    return $stmt->fetch() ?: null;
}

function cliente_create(array $data): array
{
    $data = only_fields($data, ['nombre', 'apellido', 'dni', 'telefono', 'direccion', 'correo']);
    $data = fill_missing($data, [
        'nombre' => '',
        'apellido' => '',
        'dni' => '',
        'telefono' => null,
        'direccion' => null,
        'correo' => null,
    ]);

    $stmt = db()->prepare(
        'INSERT INTO clientes (nombre, apellido, dni, telefono, direccion, correo)
         VALUES (:nombre, :apellido, :dni, :telefono, :direccion, :correo)'
    );
    $stmt->execute($data);

    return cliente_find((int) db()->lastInsertId());
}
