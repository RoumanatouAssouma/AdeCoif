@extends('layouts.app')

@section('content')
<div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="grid items-start grid-cols-1 gap-10 p-6 shadow-xl md:grid-cols-2 rounded-2xl">
        
        {{-- Image du produit --}}
        <div class="w-full ">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto shadow-md rounded-xl">
            @else
                <img src="https://via.placeholder.com/400x300" alt="Image produit" class="w-full h-auto shadow-md rounded-xl">
            @endif
        </div>

        {{-- Informations du produit --}}
        <div class="p-5 space-y-4 bg-gray-300 rounded-xl">
            <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
            <p class="text-sm text-gray-500">Catégorie : <span class="font-medium text-indigo-600">{{ $product->category->name ?? 'Sans catégorie' }}</span></p>

            <p class="text-2xl font-semibold text-green-600">{{ number_format($product->price, 0, ',', ' ') }} FCFA</p>

            <p class="text-base leading-relaxed text-gray-700">{{ $product->description }}</p>

            {{-- Formulaire d'achat --}}
            <form action="{{ route('cart.add') }}" method="POST" class="mt-6">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <button type="submit"
                    class="inline-flex items-center px-6 py-3 text-base font-medium text-white transition bg-indigo-600 border border-transparent shadow-sm rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    🛒 Acheter maintenant
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

