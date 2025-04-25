@extends('layouts.app')

@section('content')
<div class="py-12 md:py-20">
  <div class="container px-4 mx-auto">

    {{-- Header --}}
    <div class="text-center max-w-3xl mx-auto mb-16">
      <h1 class="text-4xl font-bold mb-6 text-gray-800">Notre Blog</h1>
      <p class="text-xl text-gray-600">
        Conseils, astuces et tendances dans le monde de la beauté et de la coiffure.
      </p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">

      {{-- Main Content --}}
      <div class="md:col-span-2">
        <div class="grid gap-8">
          @foreach ($blogPosts as $post)
          <article class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="md:flex">
              <div class="md:w-1/3">
                <div class="relative h-48 md:h-full">
                  <img src="{{ asset($post['image']) }}" alt="{{ $post['title'] }}" class="w-full h-full object-cover">
                </div>
              </div>
              <div class="md:w-2/3 p-6">
                <div class="flex items-center text-sm text-gray-500 mb-2">
                  <span class="bg-rose-100 text-rose-800 text-xs px-2 py-1 rounded-full">
                    {{ $post['category'] }}
                  </span>
                  <span class="mx-2">•</span>
                  <span class="flex items-center gap-1">
                    <i data-feather="calendar" class="w-4 h-4"></i> {{ $post['date'] }}
                  </span>
                  <span class="mx-2">•</span>
                  <span class="flex items-center gap-1">
                    <i data-feather="user" class="w-4 h-4"></i> {{ $post['author'] }}
                  </span>
                </div>
                <h2 class="text-xl font-bold mb-2 text-gray-800">
                  <a href="{{ url('/blog/' . $post['id']) }}" class="hover:text-rose-600 transition-colors">
                    {{ $post['title'] }}
                  </a>
                </h2>
                <p class="text-gray-600 mb-4">{{ $post['excerpt'] }}</p>
                <a href="{{ url('/blog/' . $post['id']) }}" class="inline-block px-4 py-2 border border-rose-600 text-rose-600 hover:bg-rose-50 rounded">
                  Lire la suite
                </a>
              </div>
            </div>
          </article>
          @endforeach
        </div>

        {{-- Pagination --}}
        <div class="flex justify-center mt-10">
          <div class="flex space-x-2">
            <button disabled class="px-4 py-2 border rounded text-gray-400 border-gray-300">Précédent</button>
            <button class="px-4 py-2 border bg-rose-600 text-white rounded">1</button>
            <button class="px-4 py-2 border rounded">2</button>
            <button class="px-4 py-2 border rounded">3</button>
            <button class="px-4 py-2 border rounded">Suivant</button>
          </div>
        </div>
      </div>

      {{-- Sidebar --}}
      <div>
        {{-- Search --}}
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
          <h3 class="text-lg font-semibold mb-4 text-gray-800">Recherche</h3>
          <form method="GET" action="{{ route('blog.search') }}" class="flex">
            <input name="query" type="text" placeholder="Rechercher un article..." class="rounded-r-none border px-3 py-2 w-full focus:ring-rose-600">
            <button type="submit" class="rounded-l-none px-4 bg-rose-600 hover:bg-rose-700 text-white">Rechercher</button>
          </form>
        </div>

        {{-- Categories --}}
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
          <h3 class="text-lg font-semibold mb-4 text-gray-800">Catégories</h3>
          <ul class="space-y-2">
            @foreach ($categories as $category)
              <li>
                <a href="{{ url('/blog/categorie/' . $category['id']) }}" class="flex justify-between items-center text-gray-700 hover:text-rose-600 transition-colors">
                  <span>{{ $category['name'] }}</span>
                  <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full">{{ $category['count'] }}</span>
                </a>
              </li>
            @endforeach
          </ul>
        </div>

        {{-- Recent Posts --}}
        <div class="bg-white rounded-lg shadow-md p-6">
          <h3 class="text-lg font-semibold mb-4 text-gray-800">Articles Récents</h3>
          <ul class="space-y-4">
            @foreach (array_slice($blogPosts, 0, 3) as $post)
            <li class="flex gap-3">
              <div class="w-16 h-16 flex-shrink-0">
                <img src="{{ asset($post['image']) }}" alt="{{ $post['title'] }}" class="w-full h-full object-cover rounded">
              </div>
              <div>
                <h4 class="font-medium text-sm">
                  <a href="{{ url('/blog/' . $post['id']) }}" class="hover:text-rose-600 transition-colors">
                    {{ $post['title'] }}
                  </a>
                </h4>
                <p class="text-gray-500 text-xs">{{ $post['date'] }}</p>
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
