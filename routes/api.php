<?php

declare(strict_types=1);

function api_routes(): array
{
    return [
        'GET /setup'        => 'setup_index',
        'GET /clientes'     => 'cliente_index',
        'POST /clientes'    => 'cliente_store',
        'GET /proveedores'  => 'proveedor_index',
        'POST /proveedores' => 'proveedor_store',
        'GET /categorias'   => 'categoria_index',
        'POST /categorias'  => 'categoria_store',
        'GET /productos'    => 'producto_index',
        'POST /productos'   => 'producto_store',
        'GET /usuarios'     => 'usuario_index',
        'POST /usuarios'    => 'usuario_store',
    ];
}
