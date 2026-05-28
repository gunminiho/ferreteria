<?php

declare(strict_types=1);

session_start();

// Infraestructura
require_once __DIR__ . '/env.php';
load_env(__DIR__ . '/../.env');

require_once __DIR__ . '/database.php';
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/../database/setup.php';

// Middlewares
foreach (glob(__DIR__ . '/../middlewares/*.php') as $file) {
    require_once $file;
}

// Modelos
foreach (glob(__DIR__ . '/../models/*.php') as $file) {
    require_once $file;
}

// Controladores
foreach (glob(__DIR__ . '/../controllers/*.php') as $file) {
    require_once $file;
}

// Rutas
require_once __DIR__ . '/../routes/web.php';
require_once __DIR__ . '/../routes/api.php';
require_once __DIR__ . '/../routes/dispatcher.php';
