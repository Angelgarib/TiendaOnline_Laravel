<!-- Footer -->
<footer class="bg-gray-900 text-white py-8 mt-0">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-7">
            <div>
                <h5 class="text-xl font-bold mb-4">🛍 Board this way!</h5>
                <p class="text-gray-400">Tu tienda de confianza para encontrar los mejores juegos de mesa.</p>
            </div>
            <div class="border-l-2 border-gray-700">
                <h6 class="font-bold mb-4 ml-2">Enlaces Rápidos</h6>
                <ul class="space-y-2 text-gray-400 ml-2">
                    <li><a href="{{ route('welcome') }}" class="hover:text-white transition">Inicio</a></li>
                    <li><a href="{{ route('products.index') }}" class="hover:textwhite transition">Productos</a></li>
                    <li><a href="{{ route('categories.index') }}" class="hover:text-white transition">Géneros</a></li>
                    <li><a href="{{ route('offers.index') }}" class="hover:text-white transition">Ofertas</a></li>
                </ul>
            </div>
            <div class="border-l-2 border-gray-700">
                <h6 class="font-bold mb-4 ml-2">Contacto</h6>
                <ul class="space-y-2 text-gray-400 ml-2">
                    <li>📞 963 123 123</li>
                    <li>📧 boardthisgame@gmail.com</li>
                    <li>🕒 Horario: 10:00 - 19:00</li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition">💬 Contacta con nosotros</a></li>
                </ul>
            </div>
            <div class="border-l-2 border-gray-700">
                <h6 class="font-bold mb-4 ml-2">Social</h6>
                <ul class="space-y-2 text-gray-400 ml-2">
                    <li><a href="https://www.facebook.com/" class="hover:text-white transition">🧑‍🧑‍🧒‍🧒 Facebook</a></li>
                    <li><a href="https://www.instagram.com/" class="hover:text-white transition">📷 Instagram</a></li>
                    <li><a href="https://www.linkedin.com/" class="hover:text-white transition">🛜 LinkedIn</a></li>
                    <li><a href="https://www.bsky.app/" class="hover:text-white transition">🦋 BlueSky</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <span>© 2026 Board this way! Todos los derechos reservados.</span>
            <span class="ml-40"><a href="#" class="hover:text-white transition">Términos</a></span>
            <span class="ml-5"><a href="#" class="hover:text-white transition">Privacidad</a></span>
            <span class="ml-5"><a href="#" class="hover:text-white transition">Cumplimiento</a></span>
        </div>
    </div>
</footer>