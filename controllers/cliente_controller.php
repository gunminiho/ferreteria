<?php

declare(strict_types=1);

function cliente_index(): void
{
    json_response([
        'ok' => true,
        'data' => cliente_all(),
    ]);
}

function cliente_store(): void
{
    json_response([
        'ok' => true,
        'message' => 'Cliente creado.',
        'data' => cliente_create(request_json()),
    ], 201);
}
