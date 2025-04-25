@extends('layouts.app')

@section('title', 'AdéCoif - Institut de Beauté à Abomey-Calavi')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[600px] flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero-bg.jpg') }}" alt="AdéCoif Beauty Salon" class="w-full h-full object-cover brightness-50">
        </div>
        <div class="container relative z-10 px-4 text-center text-white">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">AdéCoif</h1>
            <p class="text-xl md:text-2xl mb-8">Institut de beauté à Abomey-Calavi</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('reservation') }}" class="inline-flex items-center justify-center px-6 py-3 bg-rose-600 text-white rounded-md hover:bg-rose-700 text-lg font-medium">
                    Réserver maintenant
                </a>
                <a href="{{ route('services') }}" class="inline-flex items-center justify-center px-6 py-3 bg-white/10 text-white border border-white rounded-md hover:bg-white/20 text-lg font-medium">
                    Nos services
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-white dark:bg-gray-800">
        <div class="container px-4">
            <div class="flex flex-col md:flex-row gap-12 items-center">
                <div class="md:w-1/2">
                    <img src="{{ asset('images/about.jpg') }}" alt="À propos d'AdéCoif" class="rounded-lg shadow-lg object-cover w-full h-auto">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white">Bienvenue chez AdéCoif</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        AdéCoif est un institut de beauté de premier plan situé à Abomey-Calavi. Nous offrons une gamme complète
                        de services de coiffure et de beauté pour hommes et femmes, dans un cadre élégant et relaxant.
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Notre équipe de professionnels qualifiés s'engage à vous offrir des services de la plus haute qualité,
                        en utilisant des produits premium pour des résultats exceptionnels.
                    </p>
                    <a href="{{ route('services') }}" class="inline-flex items-center justify-center px-4 py-2 bg-rose-600 text-white rounded-md hover:bg-rose-700 text-sm font-medium">
                        En savoir plus
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">Nos Services</h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Découvrez notre gamme complète de services de beauté et de coiffure, conçus pour vous faire sentir et
                    paraître au mieux.
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredServices as $service)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 h-full flex flex-col">
                    <div class="mb-4 text-rose-600 dark:text-rose-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 dark:text-white">{{ $service->name }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 flex-grow">{{ $service->short_description }}</p>
                    <p class="font-medium text-rose-600 dark:text-rose-400 mb-4">{{ $service->formatted_price }}</p>
                    <a href="{{ route('reservation') }}?service={{ $service->id }}" class="inline-flex items-center justify-center px-4 py-2 bg-rose-600 text-white rounded-md hover:bg-rose-700 text-sm font-medium w-full">
                        Réserver
                    </a>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-10">
                <a href="{{ route('services') }}" class="inline-flex items-center justify-center px-4 py-2 bg-rose-600 text-white rounded-md hover:bg-rose-700 text-sm font-medium">
                    Voir tous nos services
                </a>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-16 bg-gray-100 dark:bg-gray-800">
        <div class="container px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">Nos Réalisations</h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Découvrez quelques-unes de nos plus belles réalisations et laissez-vous inspirer pour votre prochaine
                    visite.
                </p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($galleryImages as $image)
                <div class="relative aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->title }}" class="object-cover w-full h-full hover:scale-105 transition-transform duration-300">
                </div>
                @endforeach
            </div>
            <div class="text-center mt-10">
                <a href="{{ route('gallery') }}" class="inline-flex items-center justify-center px-4 py-2 bg-rose-600 text-white rounded-md hover:bg-rose-700 text-sm font-medium">
                    Voir toute la galerie
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">Témoignages Clients</h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Découvrez ce que nos clients disent de leur expérience chez AdéCoif.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($testimonials as $testimonial)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 h-full">
                    <div class="flex items-center mb-4">
                        <div class="relative w-12 h-12 rounded-full overflow-hidden mr-4">
                            @if($testimonial->image)
                                <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" class="object-cover w-full h-full">
                            @else
                                <div class="bg-rose-100 dark:bg-rose-900 w-full h-full flex items-center justify-center text-rose-600 dark:text-rose-400 font-bold">
                                    {{ substr($testimonial->name, 0, 1) }}
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
                    <p class="text-gray-600 dark:text-gray-300 italic">{{ $testimonial->content }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact & Booking CTA -->
    <section class="py-16 bg-rose-600 text-white">
        <div class="container px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Prêt à vous faire chouchouter?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Réservez votre rendez-vous dès maintenant et offrez-vous un moment de détente et de beauté chez AdéCoif.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('reservation') }}" class="inline-flex items-center justify-center px-6 py-3 bg-white text-rose-600 rounded-md hover:bg-gray-100 text-lg font-medium">
                    Réserver un rendez-vous
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-6 py-3 border border-white text-white rounded-md hover:bg-white/10 text-lg font-medium">
                    Nous contacter
                </a>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="flex flex-col items-center text-center">
                    <div class="bg-rose-100 dark:bg-rose-900 p-4 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600 dark:text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 dark:text-white">Adresse</h3>
                    <p class="text-gray-600 dark:text-gray-300">Abomey-Calavi, Bénin</p>
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="bg-rose-100 dark:bg-rose-900 p-4 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600 dark:text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 dark:text-white">Téléphone</h3>
                    <p class="text-gray-600 dark:text-gray-300">+229 97 21 83 15</p>
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="bg-rose-100 dark:bg-rose-900 p-4 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600 dark:text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 dark:text-white">Email</h3>
                    <p class="text-gray-600 dark:text-gray-300">aguinedmond7@gmail.com</p>
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="bg-rose-100 dark:bg-rose-900 p-4 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600 dark:text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 dark:text-white">Horaires</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Lun-Sam: 8h-19h
                        <br />
                        Dim: 10h-16h
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Preview -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">Notre Boutique</h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Découvrez notre sélection de produits capillaires de qualité professionnelle pour entretenir votre beauté
                    à domicile.
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($featuredProducts as $product)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                    <div class="relative h-48">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="object-cover w-full h-full">
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-2 dark:text-white">{{ $product->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-3">{{ Str::limit($product->description, 60) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-rose-600 dark:text-rose-400">{{ $product->formatted_price }}</span>
                            <a href="{{ route('product.show', $product) }}" class="inline-flex items-center px-3 py-1 bg-rose-600 text-white rounded-md hover:bg-rose-700 text-sm font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                Acheter
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-10">
                <a href="{{ route('shop') }}" class="inline-flex items-center justify-center px-4 py-2 bg-rose-600 text-white rounded-md hover:bg-rose-700 text-sm font-medium">
                    Visiter la boutique
                </a>
            </div>
        </div>
    </section>
@endsection
