@extends('layouts.public')

@section('title', 'Todos los Productos - Board this way!')

@push('styles')
    <style>
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }
    </style>
@endpush

@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Todos los Productos</h1>
            <p class="text-gray-600">Descubre nuestra amplia gama de juegos de mesa.</p>
        </div>

        <form method="GET" action="{{ route('products.index') }}" class="mb-8">
            <div class="flex flex-col sm:flex-row gap-4 max-w-xl">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Buscar un producto..."
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary-500 focus:outline-none"
                >

                <button
                    type="submit"
                    class="bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 transition"
                >
                    Buscar
                </button>
            </div>
        </form>


        <div class="product-grid">
            @forelse($products as $product)
                    <x-product-card :product="$product" />
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">
                        No se encontraron productos para 
                        <span class="font-semibold">"{{ request('search') }}"</span>
                    </p>
                </div>
            @endforelse
        </div>
    </div>
@endsection