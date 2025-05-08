@extends('layouts.app')

@section('title', 'Blog - AdéCoif')
@section('meta_description', 'Découvrez nos articles, conseils et astuces dans le domaine de la beauté et de la coiffure sur le blog d\'AdéCoif.')

@section('content')
<div class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        
        <!-- HEADER -->
        <div class="max-w-2xl mx-auto text-center mb-14">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Le Blog d’AdéCoif</h1>
            <p class="text-lg text-gray-600">Inspiration, conseils & tendances dans l’univers de la beauté et de la coiffure.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            
            <!-- ARTICLES -->
            <div class="md:col-span-2 space-y-10">
                @foreach($posts as $post)
                <article class="bg-white rounded-2xl shadow hover:shadow-lg transition duration-300 overflow-hidden">
                    <div class="md:flex">
                        <div class="md:w-1/3">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        </div>
                        <div class="md:w-2/3 p-6 flex flex-col justify-between">
                            <div>
                                <div class="flex flex-wrap items-center text-sm text-gray-500 mb-3 gap-3">
                                    <span class="bg-rose-100 text-rose-700 text-xs px-3 py-1 rounded-full">
                                        {{ $post->category->name }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        📅 {{ $post->published_at->format('d/m/Y') }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        👤 {{ $post->user->name }}
                                    </span>
                                </div>

                                <h2 class="text-2xl font-semibold text-gray-800 hover:text-rose-600 transition">
                                    <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                </h2>
                                <p class="text-gray-600 mt-2">{{ $post->excerpt }}</p>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center text-rose-600 hover:underline">
                                    Lire la suite →
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach

                <!-- Pagination -->
                <div class="pt-6">
                    {{ $posts->links() }}
                </div>
            </div>

            <!-- SIDEBAR -->
            <aside class="space-y-10">
                <!-- Search -->
                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Recherche</h3>
                    <form action="{{ route('blog') }}" method="GET" class="flex">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher..." class="flex-grow px-4 py-2 border border-gray-300 rounded-l-md focus:ring-rose-500 focus:border-rose-500">
                        <button type="submit" class="px-4 py-2 bg-rose-600 text-white rounded-r-md hover:bg-rose-700">OK</button>
                    </form>
                </div>

                <!-- Categories -->
                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Catégories</h3>
                    <ul class="space-y-2">
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('blog.category', $category->slug) }}" class="flex justify-between items-center text-gray-700 hover:text-rose-600">
                                <span>{{ $category->name }}</span>
                                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">{{ $category->posts_count }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Recent Posts -->
                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Articles récents</h3>
                    <ul class="space-y-4">
                        @foreach($recentPosts as $post)
                        <li class="flex gap-3 items-start">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-16 h-16 object-cover rounded-md">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-800 hover:text-rose-600">
                                    <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                </h4>
                                <p class="text-xs text-gray-500">{{ $post->published_at->format('d/m/Y') }}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </aside>

        </div>
    </div>
</div>
@endsection
