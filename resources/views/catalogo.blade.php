@extends('layouts.app')

@section('content')

<h1 class="catalogo-title">Catálogo de Productos</h1>

{{-- ================================
     BARRA DE CATEGORÍAS
================================ --}}
<div class="category-bar">
    <a href="{{ route('catalogo') }}"
       class="category-item {{ request('categoria') ? '' : 'active' }}">
        Todos
    </a>

    @foreach ($categories as $cat)
        <a href="{{ route('catalogo', ['categoria' => $cat->id]) }}"
           class="category-item {{ request('categoria') == $cat->id ? 'active' : '' }}">
            {{ $cat->name }}
        </a>
    @endforeach
</div>


{{-- ================================
     GRID DE PRODUCTOS  
================================ --}}
<div class="products-grid">

    @forelse ($products as $product)
        <div class="product-card">

            {{-- Imagen --}}
            <div class="product-image">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            </div>

            {{-- Info --}}
            <div class="product-info">
                <h3 class="product-name">{{ $product->name }}</h3>

                <p class="product-category">
                    {{ $product->category->name }}
                </p>

                <p class="product-description">
                    {{ $product->description }}
                </p>

                <div class="product-footer">
                    <span class="product-price">
                        ${{ number_format($product->price, 2) }}
                    </span>

                    <button class="btn-add">Agregar</button>
                </div>
            </div>

        </div>
    @empty
        <p class="no-products">No hay productos en esta categoría 🐾</p>
    @endforelse

</div>


{{-- ================================
       ESTILOS CSS DEL CATÁLOGO
================================ --}}
<style>

.catalogo-title {
    font-size: 26px;
    font-weight: 600;
    margin-bottom: 18px;
    color: #fff;
}

/* Barra de categorías */
.category-bar {
    display: flex;
    gap: 10px;
    margin-bottom: 25px;
    flex-wrap: wrap;
}

.category-item {
    padding: 8px 16px;
    border-radius: 12px;
    background: rgba(255,255,255,0.15);
    color: #fff;
    text-decoration: none;
    font-size: 14px;
    transition: .2s;
}

.category-item:hover {
    background: rgba(255,255,255,0.25);
}

.category-item.active {
    background: linear-gradient(90deg, #f97316, #ec4899, #6366f1);
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}


/* GRID DE PRODUCTOS */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 22px;
    margin-top: 10px;
}

.product-card {
    background: #fff;
    padding: 14px;
    border-radius: 22px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.08);
    transition: 0.25s;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 28px rgba(0,0,0,0.15);
}

.product-image img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    border-radius: 14px;
}

.product-info {
    margin-top: 12px;
}

.product-name {
    font-size: 17px;
    font-weight: 600;
    margin-bottom: 4px;
}

.product-category {
    font-size: 13px;
    color: #6b7280;
    margin-bottom: 10px;
}

.product-description {
    font-size: 14px;
    color: #374151;
    margin-bottom: 14px;
}

.product-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.product-price {
    font-weight: bold;
    font-size: 18px;
    color: #ec4899;
}

.btn-add {
    padding: 8px 16px;
    background: linear-gradient(90deg,#f97316,#ec4899);
    border: none;
    color: #fff;
    border-radius: 12px;
    cursor: pointer;
    transition: .2s;
}

.btn-add:hover {
    filter: brightness(1.1);
}

.no-products {
    color: #fff;
    font-size: 16px;
    margin-top: 20px;
}

</style>

@endsection
