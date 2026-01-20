@push('styles')
<style>
    .hero-bg {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
@endpush

<div class="bg-blue-100 rounded-lg shadow-lg pt-4 pb-6 product-card cursor-pointer {{
    $class }}  hover:bg-blue-200 transition transform hover:scale-105">
    
    <!-- Imagen -->
    <div style="background-image: url('{{ asset('storage/products/' . $category->slug . '.jpg') }}')" class="hero-bg relative text-white py-14" >
    <!-- Overlay oscuro -->
        <div class="absolute inset-0 bg-black/40"></div>
            <div class="container mx-auto px-6 text-center relative z-10">
                <h4 class="text-xl font-bold mb-2 text-white">{{ $category->name }}</h4>
            </div>
    </div>
    <p class="text-gray-700 p-6">{{ $category->description }}</p>
    <a href="{{ route('categories.show', $category->id) }}"
        class="text-primary-600 p-6 mb-4 font-semibold hover:text-primary-700 transition">
        Ver Productos →
    </a>
</div>