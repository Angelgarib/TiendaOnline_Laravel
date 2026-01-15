@extends('layouts.public')

@section('title', 'Bienvenido - Board this way!')

@push('styles')
<style>
    .hero-bg {
        background-image: url('{{ asset('storage/products/hero.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
@endpush


@section('content')
    <!-- Hero Section -->
    <section class="hero-bg relative text-white py-10">
    <!-- Overlay oscuro -->
    <div class="absolute inset-0 bg-black/65"></div>

    <div class="container mx-auto px-6 text-center relative z-10">
        <h2 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">
            Bienvenido a Board this way!
        </h2>
        <p class="text-xl md:text-2xl font-bold mb-8 max-w-3xl mx-auto">
            Tu tienda especializada en juegos de mesa de todos los géneros.<br>
            Encuentra la diversión al mejor precio.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('products.index') }}"
               class="bg-white text-primary-600 font-bold py-4 px-8 rounded-full hover:bg-gray-100 transition transform hover:scale-105">
                Ver Productos
            </a>
            <a href="{{ route('products.on-sale') }}"
               class="border-2 border-white font-bold py-4 px-8 rounded-full hover:bg-white hover:text-primary-600 transition">
                🏷️ Ofertas Especiales
            </a>
        </div>
    </div>
</section>

 <!-- Productos Destacados -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold mb-12 text-center text-gray-900">
                Promociones Destacadas
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($featuredProducts as $product)
                    <x-product-card :product="$product" />
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-lg">No hay juegos destacados.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Categorías Destacadas -->
    <section class="py-10">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold mb-12 text-center text-gray-900">
                Nuestros géneros
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($featuredCategories as $category)
                    <x-category-card :category="$category" />
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-lg">No hay categorías disponibles.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Productos más vendidos -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold mb-12 text-center text-gray-900">
                Los más vendidos
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($BestSellingProducts as $product)
                    <x-product-card :product="$product" />
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-lg">No hay juegos más vendidos.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Novedades -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold mb-12 text-center text-gray-900">
                Últimas novedades
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($NewProducts as $product)
                    <x-product-card :product="$product" />
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-lg">No hay novedades.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

   
@endsection