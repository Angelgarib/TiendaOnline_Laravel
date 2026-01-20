@extends('layouts.public')

@section('title', 'Ofertas - Board this way!')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Ofertas Especiales</h1>
            <p class="text-gray-600">Descubre nuestras mejores ofertas y descuentos.</p>
        </div>
        
        @if($activeOffers->count())
            <div class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">🔥 Ofertas actuales</h2>
                <p class="text-gray-600 mb-6">Descuentos disponibles por tiempo limitado.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($activeOffers as $offer)
                        <div class="bg-white rounded-lg shadow-lg p-6 border-l-4 border-orange-500">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $offer->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ $offer->description }}</p>
                            <div class="text-2xl font-bold text-orange-600 mb-4">
                                {{ $offer->discount_percentage }}% de descuento
                            </div>
                            <a href="{{ route('offers.show', $offer->id) }}"
                            class="bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition">
                                Ver Productos
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if($upcomingOffers->count())
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">⏳ Próximamente</h2>
                <p class="text-gray-600 mb-6">Ofertas que estarán disponibles muy pronto.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($upcomingOffers as $offer)
                        <div class="bg-white rounded-lg shadow-lg p-6 border-l-4 border-gray-300 opacity-80">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $offer->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ $offer->description }}</p>
                            <div class="text-2xl font-bold text-gray-400 mb-4">
                                {{ $offer->discount_percentage }}% de descuento
                            </div>
                            <span class="inline-block bg-gray-200 text-gray-600 px-4 py-2 rounded-lg text-sm cursor-not-allowed">
                                Próximamente
                            </span>
                            <span class="inline-block text-gray-600 px-4 py-2 rounded-lg text-sm cursor-not-allowed">
                                {{ $offer->start_date }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

@endsection

