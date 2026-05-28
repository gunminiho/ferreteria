<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferretería — Dashboard</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        .main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 32px;
        }

        .main__header {
            margin-bottom: 32px;
        }

        .main__title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-text);
        }

        .main__subtitle {
            font-size: 0.9375rem;
            color: var(--color-text-muted);
            margin-top: 4px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
        }

        .card {
            background: var(--color-surface);
            border-radius: var(--radius-lg);
            border: 1px solid var(--color-border);
            padding: 24px;
            cursor: pointer;
            transition: box-shadow 0.15s, transform 0.15s, border-color 0.15s;
            text-decoration: none;
            display: block;
        }

        .card:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
            border-color: #bfdbfe;
        }

        .card__icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }

        .card__icon svg { width: 22px; height: 22px; }

        .card__icon--blue   { background-color: #dbeafe; color: #2563eb; }
        .card__icon--green  { background-color: #dcfce7; color: #16a34a; }
        .card__icon--orange { background-color: #ffedd5; color: #ea580c; }
        .card__icon--purple { background-color: #f3e8ff; color: #9333ea; }
        .card__icon--red    { background-color: #fee2e2; color: #dc2626; }

        .card__title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--color-text);
            margin-bottom: 4px;
        }

        .card__desc {
            font-size: 0.8125rem;
            color: var(--color-text-muted);
            line-height: 1.5;
        }

        .card__badge {
            display: inline-block;
            margin-top: 14px;
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--color-primary);
            background-color: var(--color-primary-light);
            border-radius: 6px;
            padding: 3px 8px;
        }
    </style>
</head>
<body>

    <?php require __DIR__ . '/partials/navbar.php'; ?>

    <main class="main">
        <div class="main__header">
            <h1 class="main__title">Bienvenido, <?= htmlspecialchars($usuario['nombre']) ?></h1>
            <p class="main__subtitle">Selecciona un módulo para comenzar.</p>
        </div>

        <div class="grid">

            <a class="card" href="#">
                <div class="card__icon card__icon--blue">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </div>
                <div class="card__title">Clientes</div>
                <div class="card__desc">Gestiona los clientes registrados en el sistema.</div>
                <span class="card__badge">Módulo</span>
            </a>

            <a class="card" href="#">
                <div class="card__icon card__icon--green">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                    </svg>
                </div>
                <div class="card__title">Proveedores</div>
                <div class="card__desc">Administra los proveedores y sus datos de contacto.</div>
                <span class="card__badge">Módulo</span>
            </a>

            <a class="card" href="#">
                <div class="card__icon card__icon--orange">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M6 6h.008v.008H6V6Z" />
                    </svg>
                </div>
                <div class="card__title">Categorías</div>
                <div class="card__desc">Organiza los productos por categorías.</div>
                <span class="card__badge">Módulo</span>
            </a>

            <a class="card" href="#">
                <div class="card__icon card__icon--purple">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                    </svg>
                </div>
                <div class="card__title">Productos</div>
                <div class="card__desc">Controla el inventario, precios y stock de productos.</div>
                <span class="card__badge">Módulo</span>
            </a>

            <?php if ($usuario['rol'] === 'admin'): ?>
            <a class="card" href="#">
                <div class="card__icon card__icon--red">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                </div>
                <div class="card__title">Usuarios</div>
                <div class="card__desc">Gestiona los usuarios y sus roles de acceso.</div>
                <span class="card__badge">Solo admin</span>
            </a>
            <?php endif; ?>

        </div>
    </main>

</body>
</html>
