@extends('layouts.app')

@section('title', 'AdéCoif - Institut de Beauté à Abomey-Calavi')

@section('content')
    <!-- Hero Section -->
    @push('styles')
    <style>
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink {
            50% { border-color: transparent }
        }

        .typewriter {
            overflow: hidden;
            white-space: nowrap;
            border-right: 2px solid white;
            animation: typing 4s steps(30, end) forwards, blink 0.7s step-end infinite;
        }
    </style>
@endpush

<section class="relative lg:h-[1100px] h-[600px] shadow-2xl flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('storage/build/assets/build/assets/AdecoifIMAGE1.jpg') }}" alt="AdéCoif Beauty Salon"
             class="object-center w-full h-full" loading="lazy">
    </div>
    <div class="relative z-10 max-w-2xl px-4 mx-auto text-center text-white mt-[150px] lg:mt-[200px] sm:px-6 lg:px-8">
        <h1 class="mb-4 text-4xl font-bold lg:text-6xl drop-shadow-lg">AdéCoif</h1>
        <p class="mb-4 font-mono text-sm lg:text-2xl drop-shadow-lg typewriter">
            Bienvenue dans notre monde de beauté ✨
        </p>
        <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
            <a href="{{ route('reservation') }}"
               class="px-6 py-3 font-semibold text-white transition duration-300 rounded-md shadow-lg bg-rose-600 hover:bg-rose-700">
                Réserver maintenant
            </a>
            <a href="{{ route('services') }}"
               class="px-6 py-3 font-semibold text-white transition duration-300 border border-white rounded-md shadow-lg hover:bg-white/20">
                Nos services
            </a>
        </div>
    </div>
</section>


@include('partials.separator')

    <!-- About Section -->
    <section class="py-16 bg-gray-100 dark:bg-gray-800">
        <div class="container px-4 mx-auto max-w-7xl">
            <div class="flex flex-col items-center gap-12 md:flex-row">
                <div class="md:w-1/2">
                    <img src="{{ asset('storage/build/assets/build/assets/AdecoifIMAGE3.jpg') }}" alt="À propos d'AdéCoif" class="object-cover w-full h-auto transition duration-300 transform rounded-lg shadow-2xl hover:scale-105" loading="lazy">
                </div>
                <div class="md:w-1/2">
                    <h2 class="mb-6 text-3xl font-extrabold text-gray-800 dark:text-white drop-shadow-lg">
                        Bienvenue chez AdéCoif
                    </h2>
                    <p class="mb-4 text-lg leading-relaxed text-gray-600 dark:text-gray-300">
                        AdéCoif est un institut de beauté de premier plan situé à Abomey-Calavi. Nous offrons une gamme complète de services de coiffure et de beauté pour hommes et femmes, dans un cadre élégant et relaxant.
                    </p>
                    <p class="mb-6 text-lg leading-relaxed text-gray-600 dark:text-gray-300">
                        Notre équipe de professionnels qualifiés s'engage à vous offrir des services de la plus haute qualité, en utilisant des produits premium pour des résultats exceptionnels.
                    </p>
                    <a href="{{ route('services') }}" class="inline-block px-6 py-3 font-semibold text-white transition duration-300 transform rounded-md shadow-lg bg-rose-600 hover:bg-rose-700 hover:scale-105">
                        En savoir plus
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('partials.separator')


    <!-- Services Section -->
    <section class="py-16 bg-gray-100 dark:bg-gray-900">
        <div class="container px-4 mx-auto max-w-7xl">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-800 dark:text-white">Nos Services</h2>
                <p class="max-w-2xl mx-auto mb-4 text-lg leading-relaxed text-gray-600 dark:text-gray-300">
                    Découvrez notre gamme complète de services de beauté et de coiffure, conçus pour vous faire sentir et paraître au mieux.
                </p>
            </div>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($featuredServices as $service)
                <div class="flex flex-col h-full p-6 transition-transform duration-300 bg-white rounded-lg shadow-md dark:bg-gray-800 hover:scale-105">
                    <div class="mb-4 text-rose-600 dark:text-rose-400">
                        <!-- Icône -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-semibold text-center dark:text-white">{{ $service->name }}</h3>
                    <p class="flex-grow mb-4 text-center text-gray-600 dark:text-gray-300">{{ $service->short_description }}</p>
                    <p class="mb-4 font-medium text-center text-rose-600 dark:text-rose-400">{{ $service->formatted_price }}</p>
                    <a href="{{ route('reservation') }}?service={{ $service->id }}" class="px-4 py-2 mt-auto text-sm font-semibold text-center text-white transition duration-300 rounded-md bg-rose-600 hover:bg-rose-700">
                        Réserver
                    </a>
                </div>
                @endforeach
            </div>
            <div class="mt-10 text-center">
                <a href="{{ route('services') }}" class="inline-flex items-center px-4 py-2 font-semibold text-white transition duration-300 rounded-md bg-rose-600 hover:bg-rose-700">
                    Voir tous nos services
                </a>
            </div>
        </div>
    </section>

    @include('partials.separator')

    <!-- Gallery Section -->
    <section class="py-16 bg-gray-100 dark:bg-gray-800">
        <div class="container px-4 mx-auto max-w-7xl">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-800 dark:text-white">Nos Réalisations</h2>
                <p class="max-w-2xl mx-auto mb-4 text-lg leading-relaxed text-gray-600 dark:text-gray-300">
                    Découvrez quelques-unes de nos plus belles réalisations et laissez-vous inspirer pour votre prochaine visite.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4 md:grid-cols-3">
                @foreach($galleryImages as $image)
                <div class="relative overflow-hidden transition-transform duration-300 rounded-lg shadow aspect-square hover:scale-105">
                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->title }}" class="object-cover w-full h-full" loading="lazy">
                </div>
                @endforeach
            </div>
            <div class="mt-10 text-center">
                <a href="{{ route('gallery') }}" class="inline-flex items-center px-4 py-2 font-semibold text-white transition duration-300 rounded-md bg-rose-600 hover:bg-rose-700">
                    Voir toute la galerie
                </a>
            </div>
        </div>
    </section>

    @include('partials.separator')

    <!-- Testimonials Section -->
    <section class="py-16 bg-gray-100 dark:bg-gray-900">
        <div class="container px-4 mx-auto max-w-7xl">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-800 dark:text-white">Témoignages Clients</h2>
                <p class="max-w-2xl mx-auto mb-4 text-lg leading-relaxed text-gray-600 dark:text-gray-300">
                    Découvrez ce que nos clients disent de leur expérience chez AdéCoif.
                </p>
            </div>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($testimonials as $testimonial)
                <div class="flex flex-col justify-between h-full p-6 transition-shadow duration-300 bg-white rounded-lg shadow-md dark:bg-gray-800 hover:shadow-xl">
                    <div class="flex items-center mb-4">
                        <div class="relative flex-shrink-0 w-12 h-12 mr-4 overflow-hidden rounded-full">
                            @if($testimonial->image)
                                <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" class="object-cover w-full h-full" loading="lazy">
                            @else
                                <div class="flex items-center justify-center w-full h-full text-xl font-bold uppercase bg-rose-100 dark:bg-rose-900 text-rose-600 dark:text-rose-400">
                                    {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                                </div>
                            @endif
                        </div>
                        <div>
                            <h4 class="font-semibold dark:text-white">{{ $testimonial->name }}</h4>
                            <div class="flex">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="italic text-gray-600 dark:text-gray-300">"{{ $testimonial->content }}"</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.separator')

    <!-- Call to Action -->
    <section class="py-16 text-center text-white" style="background-color: rgba(239, 204, 4, 0.959);>
        <div class="max-w-3xl px-4 mx-auto">
            <h2 class="mb-4 text-3xl font-bold">Prêt à vous faire chouchouter ?</h2>
            <p class="mb-8 text-xl">Réservez votre rendez-vous dès maintenant et offrez-vous un moment de détente et de beauté chez AdéCoif.</p>
            <div class="flex flex-col justify-center gap-4 sm:flex-row">
                <a href="{{ route('reservation') }}" class="px-6 py-3 font-semibold transition duration-300 bg-white rounded-md shadow-lg text-rose-600 hover:bg-gray-100">
                    Réserver un rendez-vous
                </a>
                <a href="{{ route('contact') }}" class="px-6 py-3 font-semibold transition duration-300 border border-white rounded-md hover:bg-white/20">
                    Nous contacter
                </a>
            </div>
        </div>
    </section>

    @include('partials.separator')

    <!-- Info Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container px-4 mx-auto max-w-7xl">
            <div class="grid grid-cols-1 gap-8 text-center md:grid-cols-2 lg:grid-cols-4">
                @php
                    $infos = [
                        [
                            'icon' => 'map',
                            'title' => 'Adresse',
                            'content' => 'Abomey-Calavi, Bénin'
                        ],
                        [
                            'icon' => 'phone',
                            'title' => 'Téléphone',
                            'content' => '+229 97 21 83 15'
                        ],
                        [
                            'icon' => 'email',
                            'title' => 'Email',
                            'content' => 'aguinedmond7@gmail.com'
                        ],
                        [
                            'icon' => 'clock',
                            'title' => 'Horaires',
                            'content' => 'Lun-Sam: 8h-19h<br>Dim: 10h-16h'
                        ],
                    ];
                @endphp
                @foreach($infos as $info)
                <div class="flex flex-col items-center text-center">
                    <div class="p-4 mb-4 rounded-full bg-rose-100 dark:bg-rose-900">
                        @switch($info['icon'])
                            @case('map')
                                <!-- Icon Map -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-rose-600 dark:text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                @break
                            @case('phone')
                                <!-- Icon Phone -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-rose-600 dark:text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                @break
                            @case('email')
                                <!-- Icon Email -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-rose-600 dark:text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                @break
                            @case('clock')
                                <!-- Icon Horaires -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-rose-600 dark:text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                @break
                        @endswitch
                    </div>
                    <h3 class="mb-2 text-xl font-semibold dark:text-white">{{ $info['title'] }}</h3>
                    <p class="text-gray-600 dark:text-gray-300">{!! $info['content'] !!}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
