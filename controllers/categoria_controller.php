<?php

declare(strict_types=1);

function categoria_index(): void
{
    json_response([
        'ok' => true,
        'data' => categoria_all(),
    ]);
}

function categoria_store(): void
{
    json_response([
        'ok' => true,
        'message' => 'Categoria creada.',
        'data' => categoria_create(request_json()),
    ], 201);
}
