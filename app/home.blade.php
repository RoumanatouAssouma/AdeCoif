<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="flex flex-col min-h-screen">
  <!-- Hero Section -->
  <section class="relative h-[600px] flex items-center justify-center">
    <div class="absolute inset-0 z-0">
      <img src="/placeholder.svg?height=600&width=1200" alt="AdéCoif Beauty Salon" class="object-cover brightness-50 w-full h-full" />
    </div>
    <div class="container relative z-10 px-4 text-center text-white">
      <h1 class="text-4xl md:text-6xl font-bold mb-4">AdéCoif</h1>
      <p class="text-xl md:text-2xl mb-8">Institut de beauté à Abomey-Calavi</p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="{{ route('reservation') }}" class="btn btn-lg bg-rose-600 hover:bg-rose-700 text-white">Réserver maintenant</a>
        <a href="{{ route('services') }}" class="btn btn-lg border border-white text-white hover:bg-white/10">Nos services</a>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="py-16 bg-white">
    <div class="container px-4">
      <div class="flex flex-col md:flex-row gap-12 items-center">
        <div class="md:w-1/2">
          <img src="/placeholder.svg?height=400&width=500" alt="À propos d'AdéCoif" width="500" height="400" class="rounded-lg shadow-lg object-cover" />
        </div>
        <div class="md:w-1/2">
          <h2 class="text-3xl font-bold mb-6 text-gray-800">Bienvenue chez AdéCoif</h2>
          <p class="text-gray-600 mb-6">
            AdéCoif est un institut de beauté de premier plan situé à Abomey-Calavi. Nous offrons une gamme complète
            de services de coiffure et de beauté pour hommes et femmes, dans un cadre élégant et relaxant.
          </p>
          <p class="text-gray-600 mb-6">
            Notre équipe de professionnels qualifiés s'engage à vous offrir des services de la plus haute qualité,
            en utilisant des produits premium pour des résultats exceptionnels.
          </p>
          <a href="{{ route('about') }}" class="btn bg-rose-600 hover:bg-rose-700 text-white">En savoir plus</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="py-16 bg-gray-50">
    <div class="container px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold mb-4 text-gray-800">Nos Services</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">
          Découvrez notre gamme complète de services de beauté et de coiffure, conçus pour vous faire sentir et
          paraître au mieux.
        </p>
      </div>
      @include('components.services')
      <div class="text-center mt-10">
        <a href="{{ route('services') }}" class="btn bg-rose-600 hover:bg-rose-700 text-white">Voir tous nos services</a>
      </div>
    </div>
  </section>

  <!-- Gallery Section -->
  @include('components.gallery')

  <!-- Testimonials Section -->
  @include('components.testimonials')

  <!-- Contact & Booking CTA -->
  <section class="py-16 bg-rose-600 text-white">
    <div class="container px-4 text-center">
      <h2 class="text-3xl font-bold mb-6">Prêt à vous faire chouchouter?</h2>
      <p class="text-xl mb-8 max-w-2xl mx-auto">
        Réservez votre rendez-vous dès maintenant et offrez-vous un moment de détente et de beauté chez AdéCoif.
      </p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="{{ route('reservation') }}" class="btn btn-lg bg-white text-rose-600 hover:bg-gray-200">Réserver un rendez-vous</a>
        <a href="{{ route('contact') }}" class="btn btn-lg border border-white text-white hover:bg-white/10">Nous contacter</a>
      </div>
    </div>
  </section>

  <!-- Info Section -->
  @include('components.info')

  <!-- Shop Preview -->
  @include('components.shop-preview')
</div>
@endsection
