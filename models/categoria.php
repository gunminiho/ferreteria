<?php

declare(strict_types=1);

function categoria_all(): array
{
    return db()->query('SELECT * FROM categorias ORDER BY id_categoria DESC')->fetchAll();
}

function categoria_find(int $id): ?array
{
    $stmt = db()->prepare('SELECT * FROM categorias WHERE id_categoria = :id LIMIT 1');
    $stmt->execute(['id' => $id]);

    return $stmt->fetch() ?: null;
}

function categoria_create(array $data): array
{
    $data = only_fields($data, ['nombre_categoria', 'descripcion']);
    $data = fill_missing($data, [
        'nombre_categoria' => '',
        'descripcion' => null,
    ]);

    $stmt = db()->prepare(
        'INSERT INTO categorias (nombre_categoria, descripcion)
         VALUES (:nombre_categoria, :descripcion)'
    );
    $stmt->execute($data);

    return categoria_find((int) db()->lastInsertId());
}
