@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    <article class="bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Image de couverture -->
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">

        <div class="p-6">
            <!-- Titre -->
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>

            <!-- Infos auteur/date -->
            <div class="flex items-center text-sm text-gray-500 mb-4">
                <span>Publié le {{ \Carbon\Carbon::parse($post->published_at)->format('d/m/Y') }}</span>
                <span class="mx-2">•</span>
                <span>Catégorie : {{ $post->category->name ?? 'N/A' }}</span>
            </div>

            <!-- Extrait -->
            <p class="text-gray-600 italic mb-4">
                {{ $post->excerpt }}
            </p>

            <!-- Contenu -->
            <div class="text-gray-700 leading-relaxed space-y-4">
                {!! nl2br(e($post->content)) !!}
            </div>

            <!-- Bouton retour -->
            <div class="mt-8">
                <a href="{{ route('blog') }}" class="inline-block text-rose-600 hover:underline">
                    ← Retour aux articles
                </a>
            </div>
        </div>
    </article>
</div>
@endsection
