@extends('layouts.public')

@section('title', 'Nuestras tiendas - Board this way!')

@section('content')
<div class="container mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold text-gray-900 mb-4">
        Nuestras tiendas en España
    </h1>

    <p class="text-gray-600 mb-6">
        Encuentra una tienda Board this way! cerca de ti.
    </p>

    <div id="map" class="w-full h-[500px] rounded-lg shadow-lg"></div>
</div>
@endsection

@push('styles')
<link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
/>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    const stores = @json($stores);

    const map = L.map('map').setView([40.4168, -3.7038], 6);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    stores.forEach(store => {
        L.marker([store.lat, store.lng])
            .addTo(map)
            .bindPopup(`
                <strong>${store.name}</strong><br>
                ${store.address}<br>
                ${store.city}
            `);
    });
</script>
@endpush
