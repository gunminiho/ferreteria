<?php

declare(strict_types=1);

function web_routes(): array
{
    return [
        'GET /'          => 'login_index',
        'POST /login'    => 'login_store',
        'GET /logout'    => 'login_destroy',
        'GET /dashboard' => 'dashboard_index',
    ];
}
