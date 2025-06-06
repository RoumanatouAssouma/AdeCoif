@extends('layouts.app')

@section('title', 'Contact - AdéCoif')
@section('meta_description', 'Contactez AdéCoif, institut de beauté à Abomey-Calavi. Nous sommes là pour répondre à toutes vos questions.')

@section('content')
    <div class="py-12 md:py-20 ">
        <div class="container px-4 mx-auto">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h1 class="text-4xl font-bold mb-6 text-black dark:text-white">Contactez-Nous</h1>
                <p class="text-xl text-black dark:text-white leading-relaxed">
                    Nous sommes là pour répondre à toutes vos questions. N'hésitez pas à nous contacter par téléphone, email ou
                    en remplissant le formulaire ci-dessous.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-start">
                <!-- Contact Form -->
                <div class="bg-gray-200 rounded-lg shadow-xl p-8 sm:p-10">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Envoyez-nous un message</h2>

                    @if(session('success'))
                        <div class="bg-green-50 text-green-700 p-4 rounded-md mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="mt-1 block w-full px-4 py-3 border text-black rounded-lg shadow-sm focus:outline-none focus:ring-rose-500 focus:border-black @error('name') border-black @enderror" placeholder="Votre nom" required>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 text-black block w-full px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-rose-500 focus:border-black @error('email') border-black @enderror" placeholder="votre@email.com" required>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="mt-1 block text-black w-full px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-rose-500 focus:border-black @error('phone') border-black @enderror" placeholder="+229 XX XX XX XX">
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="subject" class="block text-sm font-medium text-gray-700">Sujet</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" class="mt-1 text-black block w-full px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-rose-500 focus:border-black @error('subject') border-black @enderror" placeholder="Sujet de votre message" required>
                            @error('subject')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="message" class="block text-sm font-medium text-black dark:text-">Message</label>
                            <textarea id="message" name="message" rows="5" class="mt-1 block w-full text-black px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-rose-500 focus:border-black @error('message') border-black @enderror" placeholder="Votre message..." required>{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 bg-yellow-500 rounded-lg hover:bg-rose-700 text-sm font-medium transition duration-200">
                            Envoyer le message
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class=" rounded-lg shadow-xl p-8 sm:p-10">
                    <h2 class="text-2xl font-bold mb-6">Informations de contact</h2>

                    <div class="space-y-8">
                        <div class="flex items-start">
                            <div class="bg-rose-100 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg mb-1">Adresse</h3>
                                <p class="">Abomey-Calavi, Bénin</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-rose-100 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg mb-1">Téléphone</h3>
                                <p class="">+229 97 21 83 15</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-rose-100 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg mb-1">Email</h3>
                                <p class="">aguinedmond7@gmail.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-rose-100 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg mb-1">Horaires d'ouverture</h3>
                                <div class="">
                                    <p>Lundi - Samedi: 8h - 19h</p>
                                    <p>Dimanche: 10h - 16h</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Map Placeholder -->
                    <a href="">
                        <div class="mt-8 bg-gray-100 h-64 rounded-2xl relative shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <div class="absolute inset-0 flex items-center justify-center text-gray-500">
                                <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A2 2 0 013 15.382V5.618a2 2 0 011.553-1.947L9 2m0 0l6 3m-6-3v18m6-15l5.447 2.724A2 2 0 0121 8.618v9.764a2 2 0 01-1.553 1.947L15 22m0 0V4" />
                                </svg>
                                <span class="ml-2 text-sm">Carte Google Maps ici</span>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection
