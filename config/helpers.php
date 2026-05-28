<?php

declare(strict_types=1);

function json_response(array $data, int $status = 200): void
{
    http_response_code($status);
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

function request_json(): array
{
    $raw = file_get_contents('php://input') ?: '{}';
    $data = json_decode($raw, true);

    if (!is_array($data)) {
        json_response([
            'ok' => false,
            'message' => 'El cuerpo debe ser JSON valido.',
        ], 400);
    }

    return $data;
}

function only_fields(array $data, array $fields): array
{
    return array_intersect_key($data, array_flip($fields));
}

function fill_missing(array $data, array $defaults): array
{
    return array_merge($defaults, $data);
}
