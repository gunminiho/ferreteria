<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferretería — Iniciar sesión</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: var(--color-surface);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-card);
            padding: 48px 40px;
            width: 100%;
            max-width: 400px;
        }

        .login-card__logo {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-card__logo svg {
            width: 48px;
            height: 48px;
            color: var(--color-primary);
        }

        .login-card__title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-text);
            text-align: center;
            margin-bottom: 4px;
        }

        .login-card__subtitle {
            font-size: 0.875rem;
            color: var(--color-text-muted);
            text-align: center;
            margin-bottom: 32px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-card__logo">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                    d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
            </svg>
        </div>

        <h1 class="login-card__title">Ferretería</h1>
        <p class="login-card__subtitle">Ingresa tus credenciales para continuar</p>

        <?php if (!empty($error)): ?>
            <div class="alert"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="/login">
            <div class="form__group">
                <label class="form__label" for="correo">Correo electrónico</label>
                <input
                    class="form__input"
                    type="email"
                    id="correo"
                    name="correo"
                    placeholder="correo@ejemplo.com"
                    value="<?= htmlspecialchars($_POST['correo'] ?? '') ?>"
                    required
                    autofocus
                >
            </div>

            <div class="form__group">
                <label class="form__label" for="password">Contraseña</label>
                <input
                    class="form__input"
                    type="password"
                    id="password"
                    name="password"
                    placeholder="••••••••"
                    required
                >
            </div>

            <button class="btn" type="submit">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>
