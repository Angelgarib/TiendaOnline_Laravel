@extends('layouts.public')

@section('title', $product->name . ' - Board this way!')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Imagen del Producto -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-center p-8">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                            alt="{{ $product->name }}" 
                            class="h-80 w-80">
                </div>
            </div>

            <!-- Información del Producto -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
                <p class="text-gray-600 mb-6">{{ $product->description }}</p>
            
                <!-- Precio -->
                <div class="mb-6">
                    @if($product->offer)
                        <div class="flex items-baseline gap-3">
                            <span class="text-2xl text-gray-400 line-through">€{{ number_format($product->price, 2) }}</span>
                            <span class="text-4xl font-bold text-orange-600">€{{ number_format($product->final_price, 2) }}</span>
                        </div>
                        <p class="text-sm text-orange-600 mt-2">
                            ¡Ahorra €{{ number_format($product->price - $product->final_price, 2) }}!
                        </p>
                    @else
                        <span class="text-4xl font-bold text-green-400">€{{ number_format($product->price, 2) }}</span>
                    @endif
                </div>
            
                <!-- Categoría, jugadores y Stock-->
                @if($product->category)
                    <div class="mb-6 flex flex-wrap items-center gap-4">

                        <!-- Categoría -->
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-500">Género:</span>
                            <a href="{{ route('categories.show', $product->category->id) }}"
                            class="bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-sm hover:bg-primary-200 transition">
                                {{ $product->category->name }}
                            </a>
                        </div>

                        <!-- Jugadores -->
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-500">Jugadores:</span>
                            <span class="bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-sm">
                                {{ $product->min_players }}-{{ $product->max_players }}
                            </span>
                        </div>

                        <!-- Stock -->
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-500">Stock:</span>

                            @if ($product->stock > 0)
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                                    {{ $product->stock }} disponibles
                                </span>
                            @else
                                <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-semibold">
                                    Agotado
                                </span>
                            @endif
                        </div>
                    </div>
                @endif

            
                <!-- Oferta -->
                @if($product->offer)
                    <div class="mb-6">
                        <span class="text-sm text-gray-500">Oferta activa:</span>
                        <div class="mt-2">
                            <span class="inline-block bg-orange-100 text-orange-800 text-sm px-3 py-1 rounded-full">
                                🏷️ {{ $product->offer->name }} (-{{ $product->offer->discount_percentage }}%)
                            </span>
                        </div>
                    </div>
                @endif

                <!-- Botones de Acción -->
                <div class="flex items-center space-x-4">
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        @if ($product->stock > 0)
                            <button type="submit" class="bg-primary-600 text-white px-6 py-3 rounded-lg hover:bg-primary-700 transition">
                                🛒 Añadir al Carrito
                            </button>
                        @else
                            <button type="button" disabled class="bg-gray-300 text-gray-500 px-6 py-3 rounded-lg cursor-not-allowed">
                                ❌ Producto agotado
                            </button>
                        @endif
                    </form>

                    {{-- Botón de Wishlist (solo para usuarios autenticados) --}}
                    @auth
                        <form action="{{ route('admin.wishlist.store', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="border-2 border-red-500 text-red-500 px-6 py-3 rounded-lg hover:bg-red-500 hover:text-white transition">
                                ❤️ Guardar en Favoritos
                            </button>
                        </form>
                    @endauth

                    <a href="{{ route('products.index') }}" 
                    class="border border-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-100 transition">
                        ← Volver a Productos
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection