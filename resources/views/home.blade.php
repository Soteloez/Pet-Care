<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PetCare - Inicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Carga el CSS y JS de Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="home-body">

<div class="layout">

    {{-- SIDEBAR IZQUIERDA --}}
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo-circle">🐾</div>
            <div>
                <h2>PetCare</h2>
                <p>Menú Principal</p>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="active"><span>🏠</span><span>Inicio</span></li>
            <li class="{{ request()->routeIs('catalogo') ? 'active' : '' }}">
    <a href="{{ route('catalogo') }}" class="sidebar-link">
        <span>📦</span>
        <span>Catálogo</span>
    </a>
</li>

            <li><span>❤️</span><span>Favoritos</span></li>
            <li><span>🛒</span><span>Carrito</span></li>
            <li><span>📬</span><span>Pedidos</span></li>
            <li><span>🐶</span><span>Mascotas</span></li>
        </ul>
    </aside>

    {{-- CONTENIDO PRINCIPAL --}}
    <div class="main-panel">

        {{-- TOPBAR SUPERIOR --}}
        <header class="topbar">
            <div class="topbar-title">
                <h1>PetCare</h1>
                <p>Tu tienda de mascotas</p>
            </div>

            <div class="topbar-user">

                {{-- ESTE ES EL BOTÓN QUE SE CLICKEA --}}
               <button id="userButton" class="user-initial">
    {{ Auth::check() ? strtoupper(substr(Auth::user()->name,0,2)) : '??' }}
</button>

<div id="userDropdown" class="user-dropdown">

    @guest
        <a href="{{ route('login') }}">Iniciar sesión</a>
        <a href="{{ route('register') }}">Registrarse</a>
    @endguest

    @auth
        <a href="#">Perfil</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                Cerrar sesión
            </button>
        </form>
    @endauth

</div>

        </header>

        {{-- CONTENIDO SCROLLEABLE --}}
        <main class="content">

            {{-- BANNER PRINCIPAL --}}
            <section class="home-banner">
                <div class="banner-badge">Ofertas especiales</div>
                <h2>¡Hasta 35% OFF!</h2>
                <p>En productos seleccionados para tu mascota.</p>
                <a href="{{ route('catalogo') }}" class="btn-banner">
    Ver Todo el Catálogo
</a>

            </section>

            {{-- OFERTAS DESTACADAS --}}
            <section class="section-block">
                <h3 class="section-title">Ofertas Destacadas</h3>

                <div class="product-grid">

                    {{-- Producto 1 --}}
                    <article class="product-card">
                        <span class="discount-tag">-28%</span>
                        <div class="product-image img-1"></div>
                        <div class="product-body">
                            <span class="product-category">Alimentos</span>
                            <h4>Alimento Premium para Perros</h4>
                            <p class="product-description">
                                Alimento balanceado para perros adultos de alta calidad.
                            </p>
                            <div class="product-footer">
                                <div>
                                    <span class="price-now">$35.99</span>
                                    <span class="price-old">$49.99</span>
                                </div>
                                <button class="btn-small">Agregar</button>
                            </div>
                        </div>
                    </article>

                    {{-- Producto 2 --}}
                    <article class="product-card">
                        <span class="discount-tag">-35%</span>
                        <div class="product-image img-2"></div>
                        <div class="product-body">
                            <span class="product-category">Juguetes</span>
                            <h4>Juguete Interactivo para Gatos</h4>
                            <p class="product-description">
                                Juguete interactivo para mantener activo a tu gato.
                            </p>
                            <div class="product-footer">
                                <div>
                                    <span class="price-now">$12.99</span>
                                    <span class="price-old">$19.99</span>
                                </div>
                                <button class="btn-small">Agregar</button>
                            </div>
                        </div>
                    </article>

                </div>
            </section>

        </main>
    </div>
</div>

</body>
</html>
