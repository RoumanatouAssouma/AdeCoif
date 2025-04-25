@extends('layouts.app')

@section('title', 'Blog - AdéCoif')
@section('meta_description', 'Découvrez nos articles, conseils et astuces dans le domaine de la beauté et de la coiffure sur le blog d\'AdéCoif.')

@section('content')
    <div class="py-12 md:py-20">
        <div class="container px-4">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h1 class="text-4xl font-bold mb-6 text-gray-800">Notre Blog</h1>
                <p class="text-xl text-gray-600">
                    Conseils, astuces et tendances dans le monde de la beauté et de la coiffure.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="md:col-span-2">
                    <div class="grid gap-8">
                        @foreach($posts as $post)
                        <article class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="md:flex">
                                <div class="md:w-1/3">
                                    <div class="relative h-48 md:h-full">
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="object-cover w-full h-full">
                                    </div>
                                </div>
                                <div class="md:w-2/3 p-6">
                                    <div class="flex items-center text-sm text-gray-500 mb-2">
                                        <span class="bg-rose-100 text-rose-800 text-xs px-2 py-1 rounded-full">
                                            {{ $post->category->name }}
                                        </span>
                                        <span class="mx-2">•</span>
                                        <span class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{ $post->published_at->format('d/m/Y') }}
                                        </span>
                                        <span class="mx-2">•</span>
                                        <span class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            {{ $post->user->name }}
                                        </span>
                                    </div>
                                    <h2 class="text-xl font-bold mb-2 text-gray-800">
                                        <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-rose-600 transition-colors">
                                            {{ $post->title }}
                                        </a>
                                    </h2>
                                    <p class="text-gray-600 mb-4">{{ $post->excerpt }}</p>
                                    <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center px-4 py-2 border border-rose-600 text-rose-600 rounded-md hover:bg-rose-50 text-sm font-medium">
                                        Lire la suite
                                    </a>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-10">
                        {{ $posts->links() }}
                    </div>
                </div>

                <!-- Sidebar -->
                <div>
                    <!-- Search -->
                    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Recherche</h3>
                        <form action="{{ route('blog') }}" method="GET" class="flex">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher un article..." class="flex-grow px-3 py-2 border border-gray-300 rounded-l-md shadow-sm focus:outline-none focus:ring-rose-500 focus:border-rose-500">
                            <button type="submit" class="px-4 py-2 bg-rose-600 text-white rounded-r-md hover:bg-rose-700">
                                Rechercher
                            </button>
                        </form>
                    </div>

                    <!-- Categories -->
                    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Catégories</h3>
                        <ul class="space-y-2">
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('blog.category', $category->slug) }}" class="flex justify-between items-center text-gray-700 hover:text-rose-600 transition-colors">
                                    <span>{{ $category->name }}</span>
                                    <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full">{{ $category->posts_count }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Recent Posts -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Articles Récents</h3>
                        <ul class="space-y-4">
                            @foreach($recentPosts as $post)
                            <li class="flex gap-3">
                                <div class="relative w-16 h-16 flex-shrink-0">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="object-cover w-full h-full rounded">
                                </div>
                                <div>
                                    <h4 class="font-medium text-sm">
                                        <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-rose-600 transition-colors">
                                            {{ $post->title }}
                                        </a>
                                    </h4>
                                    <p class="text-gray-500 text-xs">{{ $post->published_at->format('d/m/Y') }}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
