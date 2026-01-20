@extends('layouts.public')

@section('title', 'Contacto - Board this way!')

@section('content')
<x-guest-layout>
<div class="container">
    <div >
        <!-- Encabezado -->
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 mt-6 mb-4">
                Contacta con nosotros
            </h1>
            <p class="text-gray-600 text-lg">
                ¿Tienes alguna duda sobre nuestros juegos? Escríbenos y te responderemos lo antes posible.
            </p>
        </div>

        <!-- Card -->
        <div >
            <form method="POST" action="">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <!-- Nombre -->
                    <div>
                        <x-input-label for="name" value="Nombre" />
                        <x-text-input
                            id="name"
                            name="name"
                            type="text"
                            class="mt-1 block w-full border-black"
                            required
                            autofocus
                            :value="old('name')"
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Empresa -->
                    <div>
                        <x-input-label for="company" value="Empresa (opcional)" />
                        <x-text-input
                            id="company"
                            name="company"
                            type="text"
                            class="mt-1 block w-full"
                            :value="old('company')"
                        />
                        <x-input-error :messages="$errors->get('company')" class="mt-2" />
                    </div>

                </div>

                <!-- Email -->
                <div class="mt-6">
                    <x-input-label for="email" value="Correo electrónico" />
                    <x-text-input
                        id="email"
                        name="email"
                        type="email"
                        class="mt-1 block w-full"
                        required
                        :value="old('email')"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Mensaje -->
                <div class="mt-6">
                    <x-input-label for="message" value="¿En qué podemos ayudarte?" />
                    <textarea
                        id="message"
                        name="message"
                        rows="5"
                        class="mt-1 block w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500 shadow-sm"
                        required
                    >{{ old('message') }}</textarea>
                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                </div>

                <!-- Botón -->
                <div class="mt-8 text-center">
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center px-8 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition"
                    >
                        Enviar mensaje
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>
</x-guest-layout>
@endsection
