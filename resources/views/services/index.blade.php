@extends('layouts.app')

@section('title', 'Nos Services - AdéCoif')
@section('meta_description', 'Découvrez notre gamme complète de services de beauté et de coiffure chez AdéCoif à Abomey-Calavi.')

@section('content')
    <div class="py-12 md:py-20 bg-gray-100">
        <!-- Hero Section -->
        <div class="container px-4 mb-16 mx-auto">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-4xl font-extrabold mb-6 text-gray-800">Nos Services</h1>
                <p class="text-lg md:text-xl text-gray-600 mb-6 leading-relaxed">
                    Découvrez notre gamme complète de services de beauté et de coiffure, conçus pour vous faire sentir et
                    paraître au mieux.
                </p>
                <div class="w-20 h-1 bg-rose-600 mx-auto rounded"></div>
            </div>
        </div>

        <!-- Services List -->
        <div class="container px-4 space-y-20 mx-auto">
            @foreach($services as $index => $service)
            <div class="flex flex-col {{ $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} items-center gap-10">
                <!-- Image -->
                <div class="md:w-1/2">
                    <div class="relative h-64 md:h-80 w-full rounded-xl overflow-hidden shadow-lg group">
                        <img src="{{ asset('storage/' . $service->image) }}"
                             alt="{{ $service->name }}"
                             class="object-cover w-full h-full transform group-hover:scale-105 transition duration-300 ease-in-out">
                    </div>
                </div>

                <!-- Text Content -->
                <div class="md:w-1/2">
                    <div class="flex items-center gap-2 mb-4 text-rose-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z" />
                        </svg>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $service->name }}</h2>
                    </div>
                    <p class="text-gray-600 mb-4">{{ $service->description }}</p>
                    <ul class="mb-4 space-y-2">
                        @foreach(explode("\n", $service->details) as $detail)
                        <li class="flex items-start">
                            <span class="mt-1 h-1.5 w-1.5 rounded-full bg-rose-600 mr-2 flex-shrink-0"></span>
                            <span class="text-gray-700">{{ $detail }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <p class="text-lg font-semibold text-rose-600 mb-4">{{ $service->formatted_price }}</p>
                    <a href="{{ route('reservation') }}?service={{ $service->id }}"
                       class="inline-flex items-center justify-center px-4 py-2 bg-rose-600 text-white rounded-md hover:bg-rose-700 text-sm font-medium transition duration-200">
                        Réserver ce service
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- CTA Section -->
        <div class="container px-4 mt-24 mx-auto">
            <div class="bg-rose-50 rounded-xl p-8 md:p-12 text-center shadow-md">
                <h2 class="text-2xl md:text-3xl font-bold mb-4 text-gray-800">Vous ne savez pas quel service choisir ?</h2>
                <p class="text-gray-600 mb-8 max-w-2xl mx-auto leading-relaxed">
                    Contactez-nous pour une consultation gratuite. Notre équipe d'experts vous aidera à déterminer les services
                    qui conviennent le mieux à vos besoins.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center justify-center px-6 py-2 bg-rose-600 text-white rounded-md hover:bg-rose-700 text-sm font-medium transition">
                        Nous contacter
                    </a>
                    <a href="{{ route('reservation') }}"
                       class="inline-flex items-center justify-center px-6 py-2 border border-rose-600 text-rose-600 rounded-md hover:bg-rose-100 text-sm font-medium transition">
                        Réserver un rendez-vous
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
