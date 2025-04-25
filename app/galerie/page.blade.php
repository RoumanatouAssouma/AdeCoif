{{-- resources/views/gallery.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="py-12 md:py-20">
    <div class="container px-4">
        {{-- Header --}}
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h1 class="text-4xl font-bold mb-6 text-gray-800">Notre Galerie</h1>
            <p class="text-xl text-gray-600">
                Découvrez nos plus belles réalisations et laissez-vous inspirer pour votre prochaine visite chez AdéCoif.
            </p>
        </div>

        {{-- Gallery Categories --}}
        <div class="flex flex-wrap justify-center gap-3 mb-10">
            @foreach ($categories as $category)
                <button class="border border-rose-600 text-rose-600 hover:bg-rose-50 px-4 py-2 rounded">
                    {{ $category['name'] }}
                </button>
            @endforeach
        </div>

        {{-- Gallery Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($galleryImages as $image)
                <div class="group relative overflow-hidden rounded-lg shadow-md">
                    <div class="relative aspect-square">
                        <img
                            src="{{ $image['src'] ?? '/placeholder.svg' }}"
                            alt="{{ $image['alt'] }}"
                            class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-110"
                        />
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                        <h3 class="text-white font-semibold text-lg">{{ $image['title'] }}</h3>
                        <p class="text-white/80 text-sm">
                            {{ collect($categories)->firstWhere('id', $image['category'])['name'] ?? '' }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- CTA Section --}}
        <div class="mt-16 text-center">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Vous aimez ce que vous voyez?</h2>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                Prenez rendez-vous dès maintenant pour obtenir votre nouveau look chez AdéCoif.
            </p>
            <a href="{{ route('reservation') }}" class="inline-block bg-rose-600 hover:bg-rose-700 text-white font-semibold py-2 px-6 rounded">
                Réserver un rendez-vous
            </a>
        </div>
    </div>
</div>
@endsection
