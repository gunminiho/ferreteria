<?php

declare(strict_types=1);

function dispatch(string $method, string $path): void
{
    if ($method === 'OPTIONS') {
        http_response_code(204);
        exit;
    }

    $key = $method . ' ' . $path;

    $web = web_routes();

    if (isset($web[$key])) {
        $web[$key]();
        return;
    }

    $api = api_routes();

    if (isset($api[$key])) {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
        $api[$key]();
        return;
    }

    json_response(['ok' => false, 'message' => 'Ruta no encontrada.'], 404);
}
