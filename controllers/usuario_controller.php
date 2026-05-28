<?php

declare(strict_types=1);

function usuario_index(): void
{
    json_response([
        'ok' => true,
        'data' => usuario_all(),
    ]);
}

function usuario_store(): void
{
    json_response([
        'ok' => true,
        'message' => 'Usuario creado.',
        'data' => usuario_create(request_json()),
    ], 201);
}
