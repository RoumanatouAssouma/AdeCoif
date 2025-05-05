{{-- resources/views/shop/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="py-12 md:py-20">
    <div class="container px-4">
        {{-- Header --}}
        <div class="max-w-3xl mx-auto mb-16 text-center">
            <h1 class="mb-6 text-4xl font-bold text-gray-800">Notre Boutique</h1>
            <p class="text-xl text-gray-600">
                Découvrez notre sélection de produits capillaires de qualité professionnelle pour entretenir votre beauté à domicile.
            </p>
        </div>

        {{-- Filters --}}
        <div class="flex flex-col items-start justify-between gap-4 mb-10 md:flex-row md:items-center">
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
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($products as $product)
                <div class="overflow-hidden bg-white rounded-lg shadow-md group">
                    <div class="relative w-full h-64">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105" />
                        @if($product['bestseller'])
                            <div class="absolute px-2 py-1 text-xs text-white rounded top-2 right-2 bg-rose-600">
                                Bestseller
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            @for ($i = 0; $i < 5; $i++)
                                @if($i < $product['rating'])
                                    <svg class="w-4 h-4 text-yellow-400 fill-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09L5.5 12.1 1 8.5l6.09-.91L10 2l2.91 5.59L19 8.5l-4.5 3.6 1.378 5.99z"/>
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 15l-5.878 3.09L5.5 12.1 1 8.5l6.09-.91L10 2l2.91 5.59L19 8.5l-4.5 3.6 1.378 5.99z"/>
                                    </svg>
                                @endif
                            @endfor
                            <span class="ml-1 text-xs text-gray-500">({{ $product['reviews'] }})</span>
                        </div>
                        <h3 class="mb-1 text-lg font-semibold text-gray-800">{{ $product['name'] }}</h3>
                        <p class="mb-4 font-bold text-rose-600">{{ number_format($product['price'], 0, ',', ' ') }} FCFA</p>
                        <div class="flex gap-2">
                            <a href="{{ route('product.show', $product['id']) }}" class="flex-1 px-4 py-2 text-center text-white rounded bg-rose-600 hover:bg-rose-700">Voir détails</a>
                            <button class="px-3 py-2 border rounded border-rose-600 text-rose-600 hover:bg-rose-50">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24 ">
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
                <button class="px-4 py-2 text-gray-500 border rounded" disabled>Précédent</button>
                <button class="px-4 py-2 text-white border rounded bg-rose-600">1</button>
                <button class="px-4 py-2 border rounded">2</button>
                <button class="px-4 py-2 border rounded">Suivant</button>
            </div>
        </div>
    </div>
</div>
@endsection


