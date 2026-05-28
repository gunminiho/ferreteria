<?php

declare(strict_types=1);

require_once __DIR__ . '/../config/bootstrap.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
$method = $_SERVER['REQUEST_METHOD'];

try {
    dispatch($method, $path);
} catch (PDOException $exception) {
    json_response([
        'ok' => false,
        'message' => 'Error de base de datos.',
        'error' => $exception->getMessage(),
    ], 500);
}
