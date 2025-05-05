@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen flex items-center justify-center px-4 py-10">
  <div class="w-full max-w-6xl bg-white rounded-3xl shadow-2xl overflow-hidden grid md:grid-cols-2 gap-10 p-10 md:p-16">

    {{-- Formulaire de contact --}}
    <div class="space-y-8">
      <div class="text-center md:text-left">
        <h2 class="text-4xl font-bold text-rose-600">Contactez-Nous</h2>
        <p class="mt-2 text-gray-600 text-sm">Nous serons ravis de vous aider. Veuillez remplir ce formulaire.</p>
      </div>

      @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded-md">
          {{ session('success') }}
        </div>
      @endif

      <form method="POST" action="{{ route('contact.submit') }}" class="space-y-5">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
          <input type="text" name="name" placeholder="Nom complet" required
                 class="input-style" value="{{ old('name') }}" />
          <input type="email" name="email" placeholder="Email" required
                 class="input-style" value="{{ old('email') }}" />
        </div>

        <input type="text" name="phone" placeholder="Téléphone"
               class="input-style" value="{{ old('phone') }}" />

        <input type="text" name="subject" placeholder="Sujet"
               class="input-style" value="{{ old('subject') }}" required />

        <textarea name="message" rows="5" placeholder="Votre message" required
                  class="input-style resize-none">{{ old('message') }}</textarea>

        <button type="submit"
                class="w-full bg-rose-600 hover:bg-rose-700 text-white font-bold py-3 rounded-xl transition duration-300">
          Envoyer
        </button>
      </form>
    </div>

    {{-- Infos de contact --}}
    <div class="flex flex-col justify-center space-y-6 text-gray-600">
      <div>
        <h3 class="text-lg font-semibold text-gray-800">Adresse</h3>
        <p>Abomey-Calavi, Bénin</p>
      </div>
      <div>
        <h3 class="text-lg font-semibold text-gray-800">Téléphone</h3>
        <p>+229 97 21 83 15</p>
      </div>
      <div>
        <h3 class="text-lg font-semibold text-gray-800">Email</h3>
        <p>aguinedmond7@gmail.com</p>
      </div>
      <div>
        <h3 class="text-lg font-semibold text-gray-800">Horaires</h3>
        <p>Lundi - Samedi : 8h - 19h <br> Dimanche : 10h - 16h</p>
      </div>
      <div class="h-48 rounded-xl bg-gray-200 flex items-center justify-center text-gray-500 text-sm">
        Carte Google Maps ici
      </div>
    </div>
  </div>
</div>

{{-- Styles personnalisés pour les inputs --}}
<style>
  .input-style {
    @apply w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500 shadow-sm transition;
  }
</style>
@endsection
