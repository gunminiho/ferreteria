<?php

declare(strict_types=1);

function routes(): array
{
    return [
        'GET /'       => 'login_index',
        'POST /login' => 'login_store',
        'GET /logout'    => 'login_destroy',
        'GET /dashboard' => 'dashboard_index',
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

    $view_routes = ['GET /', 'POST /login', 'GET /logout', 'GET /dashboard'];

    if (!in_array($key, $view_routes)) {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
    }

    $handler = $routes[$key];
    $handler();
}

