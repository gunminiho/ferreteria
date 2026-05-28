<?php

declare(strict_types=1);

function usuario_all(): array
{
    return db()->query('SELECT id_usuario, nombre, apellido, correo, rol, activo FROM usuarios ORDER BY id_usuario DESC')->fetchAll();
}

function usuario_find(int $id): ?array
{
    $stmt = db()->prepare('SELECT id_usuario, nombre, apellido, correo, rol, activo FROM usuarios WHERE id_usuario = :id LIMIT 1');
    $stmt->execute(['id' => $id]);

    return $stmt->fetch() ?: null;
}

function usuario_create(array $data): array
{
    $data = only_fields($data, ['nombre', 'apellido', 'correo', 'password', 'rol']);
    $data = fill_missing($data, [
        'nombre'   => '',
        'password' => '',
        'apellido' => '',
        'correo'   => '',
        'rol'      => 'user',
    ]);

    $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

    $stmt = db()->prepare(
        'INSERT INTO usuarios (nombre, apellido, correo, password, rol)                                                                                                                                                                                                                                                                                                                 
             VALUES (:nombre, :apellido, :correo, :password, :rol)'
    );
    $stmt->execute($data);

    return usuario_find((int) db()->lastInsertId());
}
