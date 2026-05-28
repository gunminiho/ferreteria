<?php

declare(strict_types=1);

session_start();

require_once __DIR__ . '/env.php';
load_env(__DIR__ . '/../.env');

require_once __DIR__ . '/database.php';
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/../database/setup.php';

require_once __DIR__ . '/../models/cliente.php';
require_once __DIR__ . '/../models/proveedor.php';
require_once __DIR__ . '/../models/categoria.php';
require_once __DIR__ . '/../models/producto.php';
require_once __DIR__ . '/../models/usuario.php';

require_once __DIR__ . '/../controllers/cliente_controller.php';
require_once __DIR__ . '/../controllers/proveedor_controller.php';
require_once __DIR__ . '/../controllers/categoria_controller.php';
require_once __DIR__ . '/../controllers/producto_controller.php';
require_once __DIR__ . '/../controllers/setup_controller.php';
require_once __DIR__ . '/../controllers/login_controller.php';
require_once __DIR__ . '/../routes/web.php';
