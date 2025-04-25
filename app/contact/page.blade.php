@extends('layouts.app')

@section('content')
<div class="py-12 md:py-20">
  <div class="container px-4">

    {{-- Header --}}
    <div class="text-center max-w-3xl mx-auto mb-16">
      <h1 class="text-4xl font-bold mb-6 text-gray-800">Contactez-Nous</h1>
      <p class="text-xl text-gray-600">
        Nous sommes là pour répondre à toutes vos questions. N'hésitez pas à nous contacter par téléphone, email ou en remplissant le formulaire ci-dessous.
      </p>
    </div>

    <div class="grid md:grid-cols-2 gap-12 items-start">

      {{-- Contact Form --}}
      <div class="bg-white rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Envoyez-nous un message</h2>

        @if(session('success'))
          <div class="bg-green-50 text-green-700 p-4 rounded-md mb-6">
            {{ session('success') }}
          </div>
        @endif

        <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6">
          @csrf

          <div class="grid gap-4 sm:grid-cols-2">
            <div class="space-y-2">
              <label for="name" class="block font-medium">Nom complet</label>
              <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded p-2" value="{{ old('name') }}" placeholder="Votre nom" required>
            </div>
            <div class="space-y-2">
              <label for="email" class="block font-medium">Email</label>
              <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded p-2" value="{{ old('email') }}" placeholder="votre@email.com" required>
            </div>
          </div>

          <div class="space-y-2">
            <label for="phone" class="block font-medium">Téléphone</label>
            <input type="text" name="phone" id="phone" class="w-full border border-gray-300 rounded p-2" value="{{ old('phone') }}" placeholder="+229 XX XX XX XX">
          </div>

          <div class="space-y-2">
            <label for="subject" class="block font-medium">Sujet</label>
            <input type="text" name="subject" id="subject" class="w-full border border-gray-300 rounded p-2" value="{{ old('subject') }}" placeholder="Sujet de votre message" required>
          </div>

          <div class="space-y-2">
            <label for="message" class="block font-medium">Message</label>
            <textarea name="message" id="message" rows="5" class="w-full border border-gray-300 rounded p-2" placeholder="Votre message..." required>{{ old('message') }}</textarea>
          </div>

          <button type="submit" class="w-full bg-rose-600 hover:bg-rose-700 text-white py-2 px-4 rounded">
            Envoyer le message
          </button>
        </form>
      </div>

      {{-- Contact Info --}}
      <div>
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Informations de contact</h2>

        <div class="space-y-8">
          <div class="flex items-start">
            <div class="bg-rose-100 p-3 rounded-full mr-4">
              <svg class="h-6 w-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C8.134 2 5 5.134 5 9c0 6 7 13 7 13s7-7 7-13c0-3.866-3.134-7-7-7z" />
              </svg>
            </div>
            <div>
              <h3 class="font-semibold text-lg mb-1">Adresse</h3>
              <p class="text-gray-600">Abomey-Calavi, Bénin</p>
            </div>
          </div>

          <div class="flex items-start">
            <div class="bg-rose-100 p-3 rounded-full mr-4">
              <svg class="h-6 w-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M3 5h2l3.6 7.59-1.35 2.45a1 1 0 0 0-.25.66c0 .55.45 1 1 1h12v-2H9.42a.5.5 0 0 1-.49-.38l.03-.12L10.1 13h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49A.996.996 0 0 0 22 4H6.21l-.94-2H1v2h2l3.6 7.59-1.35 2.45c-.13.23-.25.49-.25.66a1 1 0 0 0 1 1h12v-2H9.42a.5.5 0 0 1-.49-.38l.03-.12L10.1 13h7.45z" />
              </svg>
            </div>
            <div>
              <h3 class="font-semibold text-lg mb-1">Téléphone</h3>
              <p class="text-gray-600">+229 97 21 83 15</p>
            </div>
          </div>

          <div class="flex items-start">
            <div class="bg-rose-100 p-3 rounded-full mr-4">
              <svg class="h-6 w-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M16 12v1.5c0 .83-.67 1.5-1.5 1.5S13 14.33 13 13.5V12h-2v1.5C11 14.33 10.33 15 9.5 15S8 14.33 8 13.5V12H6v6h12v-6h-2z" />
              </svg>
            </div>
            <div>
              <h3 class="font-semibold text-lg mb-1">Email</h3>
              <p class="text-gray-600">aguinedmond7@gmail.com</p>
            </div>
          </div>

          <div class="flex items-start">
            <div class="bg-rose-100 p-3 rounded-full mr-4">
              <svg class="h-6 w-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M12 6v6l4 2" />
              </svg>
            </div>
            <div>
              <h3 class="font-semibold text-lg mb-1">Horaires d'ouverture</h3>
              <div class="text-gray-600">
                <p>Lundi - Samedi: 8h - 19h</p>
                <p>Dimanche: 10h - 16h</p>
              </div>
            </div>
          </div>
        </div>

        {{-- Map --}}
        <div class="mt-8 bg-gray-200 h-64 rounded-lg relative">
          <div class="absolute inset-0 flex items-center justify-center text-gray-500">
            Carte Google Maps ici
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
