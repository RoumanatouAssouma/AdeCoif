{{-- resources/views/shop/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="py-12 md:py-20">
    <div class="container px-4">
        {{-- Header --}}
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h1 class="text-4xl font-bold mb-6 text-gray-800">Notre Boutique</h1>
            <p class="text-xl text-gray-600">
                Découvrez notre sélection de produits capillaires de qualité professionnelle pour entretenir votre beauté à domicile.
            </p>
        </div>

        {{-- Filters --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div class="flex flex-wrap gap-2">
                @foreach($categories as $category)
                    <button class="px-4 py-2 rounded
                        {{ $category['id'] === 'all'
                            ? 'bg-rose-600 text-white hover:bg-rose-700'
                            : 'border border-rose-600 text-rose-600 hover:bg-rose-50' }}">
                        {{ $category['name'] }}
                    </button>
                @endforeach
            </div>
            <div class="w-full md:w-48">
                <select class="w-full px-4 py-2 border rounded">
                    <option value="newest">Plus récents</option>
                    <option value="price-low">Prix croissant</option>
                    <option value="price-high">Prix décroissant</option>
                    <option value="popular">Popularité</option>
                </select>
            </div>
        </div>

        {{-- Products Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative h-64 w-full">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105" />
                        @if($product['bestseller'])
                            <div class="absolute top-2 right-2 bg-rose-600 text-white text-xs px-2 py-1 rounded">
                                Bestseller
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            @for ($i = 0; $i < 5; $i++)
                                @if($i < $product['rating'])
                                    <svg class="h-4 w-4 text-yellow-400 fill-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09L5.5 12.1 1 8.5l6.09-.91L10 2l2.91 5.59L19 8.5l-4.5 3.6 1.378 5.99z"/>
                                    </svg>
                                @else
                                    <svg class="h-4 w-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 15l-5.878 3.09L5.5 12.1 1 8.5l6.09-.91L10 2l2.91 5.59L19 8.5l-4.5 3.6 1.378 5.99z"/>
                                    </svg>
                                @endif
                            @endfor
                            <span class="text-xs text-gray-500 ml-1">({{ $product['reviews'] }})</span>
                        </div>
                        <h3 class="font-semibold text-lg mb-1 text-gray-800">{{ $product['name'] }}</h3>
                        <p class="font-bold text-rose-600 mb-4">{{ number_format($product['price'], 0, ',', ' ') }} FCFA</p>
                        <div class="flex gap-2">
                            <a href="{{ route('shop.show', $product['id']) }}" class="flex-1 bg-rose-600 hover:bg-rose-700 text-white px-4 py-2 rounded text-center">Voir détails</a>
                            <button class="border border-rose-600 text-rose-600 hover:bg-rose-50 px-3 py-2 rounded">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 6h15l-1.5 9h-12z" />
                                    <path d="M6 6l-2 12h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="flex justify-center mt-12">
            <div class="flex space-x-2">
                <button class="px-4 py-2 border rounded text-gray-500" disabled>Précédent</button>
                <button class="px-4 py-2 border rounded bg-rose-600 text-white">1</button>
                <button class="px-4 py-2 border rounded">2</button>
                <button class="px-4 py-2 border rounded">Suivant</button>
            </div>
        </div>
    </div>
</div>
@endsection
