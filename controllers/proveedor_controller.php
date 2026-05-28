<?php

declare(strict_types=1);

function proveedor_index(): void
{
    json_response([
        'ok' => true,
        'data' => proveedor_all(),
    ]);
}

function proveedor_store(): void
{
    json_response([
        'ok' => true,
        'message' => 'Proveedor creado.',
        'data' => proveedor_create(request_json()),
    ], 201);
}
