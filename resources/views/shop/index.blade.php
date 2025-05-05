@extends('layouts.app')

@section('title', 'Boutique - AdéCoif')
@section('meta_description', 'Découvrez notre sélection de produits capillaires de qualité professionnelle pour entretenir votre beauté à domicile.')

@section('content')
    <div class="py-12 md:py-20">
        <div class="container px-4">
            <!-- Header -->
            <div class="max-w-3xl mx-auto mb-16 text-center">
                <h1 class="mb-6 text-4xl font-bold ">Notre Boutique</h1>
                <p class="text-xl ">
                    Découvrez notre sélection de produits capillaires de qualité professionnelle pour entretenir votre beauté à
                    domicile.
                </p>
            </div>

            <!-- Filters -->
            <div class="flex flex-col items-start justify-between gap-4 mb-10 md:flex-row md:items-center">
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('shop') }}" class="inline-flex items-center px-4 py-2 {{ !request('category') ? 'bg-rose-600 text-white' : 'border border-rose-600 text-rose-600' }} rounded-md hover:{{ !request('category') ? 'bg-rose-700' : 'bg-rose-50' }} text-sm font-medium">
                        Tous les produits
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('shop.category', $category->slug) }}" class="inline-flex items-center px-4 py-2 {{ request('category') == $category->slug ? 'bg-rose-600 text-white' : 'border border-rose-600 text-rose-600' }} rounded-md hover:{{ request('category') == $category->slug ? 'bg-rose-700' : 'bg-rose-50' }} text-sm font-medium">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
                <div class="w-full md:w-48">
                    <form action="{{ route('shop') }}" method="GET">
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <select name="sort" onchange="this.form.submit()" class="block w-full px-3 py-2 bg-yellow-300 border rounded-md border-gray-00 focus:outline-none focus:ring-rose-500 focus:border-rose-500 dark:text-black">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Plus récents</option>
                            <option value="price-low" {{ request('sort') == 'price-low' ? 'selected' : '' }}>Prix croissant</option>
                            <option value="price-high" {{ request('sort') == 'price-high' ? 'selected' : '' }}>Prix décroissant</option>
                            <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Popularité</option>
                        </select>
                    </form>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach($products as $product)
                <div class="overflow-hidden bg-white rounded-lg shadow-md group">
                    <div class="relative">
                        <div class="relative w-full h-64">
                            <a href="{{ route('product.show', $product->slug) }}" class="block w-full h-full">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product['name'] }}" class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105">
                            </a>
                        </div>
                        @if($product->is_bestseller)
                            <div class="absolute px-2 py-1 text-xs text-white rounded top-2 right-2 bg-rose-600">
                                Bestseller
                            </div>
                        @endif
                    </div>
                    </a>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            @for($i = 1; $i <= 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 {{ $i <= $product->rating ? 'text-yellow-400' : 'text-gray-300' }}" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                            <span class="ml-1 text-xs text-gray-500">({{ $product->reviews_count }})</span>
                        </div>
                        <h3 class="mb-1 text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                        <p class="mb-4 font-bold text-rose-600">{{ $product->formatted_price }}</p>
                        <div class="flex gap-2">
                            <a href="{{ route('product.show', $product->slug) }}" class="inline-flex items-center justify-center flex-1 px-4 py-2 text-sm font-medium text-white rounded-md bg-rose-600 hover:bg-rose-700">
                                Voir détails
                            </a>
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium border rounded-md border-rose-600 text-rose-600 hover:bg-rose-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    <span class="sr-only">Ajouter au panier</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
