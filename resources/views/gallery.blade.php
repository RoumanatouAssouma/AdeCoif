@extends('layouts.app')

@section('title', 'Galerie - AdéCoif')
@section('meta_description', 'Découvrez nos plus belles réalisations dans la galerie d\'AdéCoif, institut de beauté à Abomey-Calavi.')

@section('content')
    <div class="py-12 md:py-20 ">
        <div class="container px-4 mx-auto ">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h1 class="text-4xl font-bold mb-6 text-gray-800">Notre Galerie</h1>
                <p class="text-xl text-gray-600">
                    Découvrez nos plus belles réalisations et laissez-vous inspirer pour votre prochaine visite chez AdéCoif.
                </p>
            </div>

            @include('partials.separator')

            <!-- Gallery Categories -->
            <div class="flex flex-wrap justify-center gap-3 mb-10">
                <a href="{{ route('gallery') }}" class="inline-flex items-center px-4 py-2 {{ !request('category') ? 'bg-rose-600 text-white' : 'border border-rose-600 text-rose-600' }} rounded-md hover:{{ !request('category') ? 'bg-rose-700' : 'bg-rose-50' }} text-sm font-medium">
                    Tous
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('gallery', ['category' => $category->slug]) }}" class="inline-flex items-center px-4 py-2 {{ request('category') == $category->slug ? 'bg-rose-600 text-white' : 'border border-rose-600 text-rose-600' }} rounded-md hover:{{ request('category') == $category->slug ? 'bg-rose-700' : 'bg-rose-50' }} text-sm font-medium">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mx-auto">
                @foreach($galleryImages as $image)
                <div class="group relative overflow-hidden rounded-lg shadow-md">
                    <div class="relative aspect-square">
                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->title }}" class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                        <h3 class="text-white font-semibold text-lg">{{ $image->title }}</h3>
                        <p class="text-white/80 text-sm">{{ $image->category->name }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $galleryImages->links() }}
            </div>

            @include('partials.separator')

            <!-- CTA Section -->
            <div class="mt-16 text-center">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Vous aimez ce que vous voyez?</h2>
                <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                    Prenez rendez-vous dès maintenant pour obtenir votre nouveau look chez AdéCoif.
                </p>
                <a href="{{ route('reservation') }}" class="inline-flex items-center justify-center px-4 py-2 bg-rose-600 text-white rounded-md hover:bg-rose-700 text-sm font-medium">
                    Réserver un rendez-vous
                </a>
            </div>
        </div>
    </div>
@endsection
