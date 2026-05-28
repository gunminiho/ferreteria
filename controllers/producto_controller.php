<?php

declare(strict_types=1);

function producto_index(): void
{
    json_response([
        'ok' => true,
        'data' => producto_all(),
    ]);
}

function producto_store(): void
{
    json_response([
        'ok' => true,
        'message' => 'Producto creado.',
        'data' => producto_create(request_json()),
    ], 201);
}
