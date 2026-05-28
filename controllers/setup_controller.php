<?php

declare(strict_types=1);

function setup_index(): void
{
    crear_tablas();

    json_response([
        'ok' => true,
        'message' => 'Base de datos y tablas creadas desde PHP.',
        'tables' => ['clientes', 'proveedores', 'categorias', 'productos'],
    ]);
}
