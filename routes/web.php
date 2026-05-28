<?php

declare(strict_types=1);

function routes(): array
{
    return [
        'GET /' => 'home',
        'GET /setup' => 'setup_index',
        'GET /clientes' => 'cliente_index',
        'POST /clientes' => 'cliente_store',
        'GET /proveedores' => 'proveedor_index',
        'POST /proveedores' => 'proveedor_store',
        'GET /categorias' => 'categoria_index',
        'POST /categorias' => 'categoria_store',
        'GET /productos' => 'producto_index',
        'POST /productos' => 'producto_store',
    ];
}

function dispatch(string $method, string $path): void
{
    if ($method === 'OPTIONS') {
        http_response_code(204);
        exit;
    }

    $key = $method . ' ' . $path;
    $routes = routes();

    if (!isset($routes[$key])) {
        json_response([
            'ok' => false,
            'message' => 'Ruta no encontrada.',
        ], 404);
    }

    $handler = $routes[$key];
    $handler();
}

function home(): void
{
    json_response([
        'ok' => true,
        'message' => 'Servidor PHP puro con MVC procedural funcionando.',
        'routes' => array_keys(routes()),
    ]);
}
