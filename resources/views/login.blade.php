<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pet - Care - Iniciar Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fuente -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(180deg, #f6f0ff 0%, #ffffff 45%, #ffffff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1f2933;
        }

        .auth-card {
            width: 100%;
            max-width: 430px;
            background: #ffffff;
            padding: 34px 30px 28px;
            border-radius: 24px;
            box-shadow:
                0 20px 35px rgba(15, 23, 42, 0.08),
                0 0 0 1px rgba(148, 163, 184, 0.15);
            text-align: center;
            position: relative;
        }

        .logo-circle {
            width: 86px;
            height: 86px;
            border-radius: 9999px;
            background: conic-gradient(from 200deg, #f97316, #ec4899, #6366f1, #f97316);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            box-shadow: 0 10px 30px rgba(236, 72, 153, 0.45);
        }

        .logo-inner {
            width: 70px;
            height: 70px;
            border-radius: 9999px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        h1 {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .subtitle {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 22px;
        }

        .field-label {
            display: block;
            text-align: left;
            font-size: 13px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 6px;
        }

        .input {
            width: 100%;
            padding: 12px 14px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            background: #f9fafb;
            outline: none;
            font-size: 14px;
            margin-bottom: 14px;
            transition: 0.18s ease;
        }

        .input:focus {
            background: white;
            border-color: #a855f7;
            box-shadow: 0 0 0 1px rgba(168,85,247,0.4);
        }

        .btn-primary {
            width: 100%;
            padding: 12px 16px;
            border-radius: 20px;
            border: none;
            margin-top: 4px;
            font-size: 15px;
            font-weight: 500;
            color: white;
            cursor: pointer;
            background-image: linear-gradient(90deg, #f97316, #ec4899, #6366f1);
            box-shadow: 0 15px 35px rgba(236,72,153,0.35);
            transition: 0.18s ease;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
        }

        .btn-secondary {
            width: 100%;
            padding: 10px 16px;
            border-radius: 20px;
            border: 1px solid #e5e7eb;
            background: #ffffff;
            font-size: 14px;
            color: #374151;
            cursor: pointer;
            margin-top: 16px;
        }

        .small-text {
            font-size: 13px;
            text-align: center;
            margin-top: 16px;
            color: #6b7280;
        }

        .small-text a {
            color: #7c3aed;
            text-decoration: none;
            font-weight: 500;
        }

        .small-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="auth-card">

    <div class="logo-circle">
        <div class="logo-inner">🐾</div>
    </div>

    <h1>Pet - Care</h1>
    <p class="subtitle">Inicia sesión para continuar</p>

    {{-- FORMULARIO LOGIN: ENVÍA POST A /login --}}
    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <label class="field-label">Email</label>
        <input
            type="email"
            class="input"
            name="email"
            placeholder="tu@email.com"
            required
        >

        <label class="field-label">Contraseña</label>
        <input
            type="password"
            class="input"
            name="password"
            placeholder="••••••••"
            required
        >

        <button type="submit" class="btn-primary">
            Iniciar Sesión
        </button>
    </form>

    <button class="btn-secondary" type="button"
            onclick="window.location='{{ route('home') }}'">
        Continuar como Visitante
    </button>

    <p class="small-text">
        ¿No tienes cuenta?
        <a href="{{ route('register') }}">Regístrate</a>
    </p>

</div>

</body>
</html>
