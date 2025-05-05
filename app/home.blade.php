<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="flex flex-col min-h-screen">
  <!-- Hero Section -->
  <section class="relative h-[600px] flex items-center justify-center">
    <div class="absolute inset-0 z-0">
      <img src="/placeholder.svg?height=600&width=1200" alt="AdéCoif Beauty Salon" class="object-cover w-full h-full brightness-50" />
    </div>
    <div class="container relative z-10 px-4 text-center text-white">
      <h1 class="mb-4 text-4xl font-bold md:text-6xl">AdéCoif</h1>
      <p class="mb-8 text-xl md:text-2xl">Institut de beauté à Abomey-Calavi</p>
      <div class="flex flex-col justify-center gap-4 sm:flex-row">
        <a href="{{ route('reservation') }}" class="text-white btn btn-lg bg-rose-600 hover:bg-rose-700">Réserver maintenant</a>
        <a href="{{ route('services') }}" class="text-white border border-white btn btn-lg hover:bg-white/10">Nos services</a>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="py-16 bg-white">
    <div class="container px-4">
      <div class="flex flex-col items-center gap-12 md:flex-row">
        <div class="md:w-1/2">
          <img src="/placeholder.svg?height=400&width=500" alt="À propos d'AdéCoif" width="500" height="400" class="object-cover rounded-lg shadow-lg" />
        </div>
        <div class="md:w-1/2">
          <h2 class="mb-6 text-3xl font-bold text-gray-800">Bienvenue chez AdéCoif</h2>
          <p class="mb-6 text-gray-600">
            AdéCoif est un institut de beauté de premier plan situé à Abomey-Calavi. Nous offrons une gamme complète
            de services de coiffure et de beauté pour hommes et femmes, dans un cadre élégant et relaxant.
          </p>
          <p class="mb-6 text-gray-600">
            Notre équipe de professionnels qualifiés s'engage à vous offrir des services de la plus haute qualité,
            en utilisant des produits premium pour des résultats exceptionnels.
          </p>
          <a href="{{ route('about') }}" class="text-white btn bg-rose-600 hover:bg-rose-700">En savoir plus</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="py-16 bg-gray-50">
    <div class="container px-4">
      <div class="mb-12 text-center">
        <h2 class="mb-4 text-3xl font-bold text-gray-800">Nos Services</h2>
        <p class="max-w-2xl mx-auto text-gray-600">
          Découvrez notre gamme complète de services de beauté et de coiffure, conçus pour vous faire sentir et
          paraître au mieux.
        </p>
      </div>
      @include('components.services')
      <div class="mt-10 text-center">
        <a href="{{ route('services') }}" class="text-white btn bg-rose-600 hover:bg-rose-700">Voir tous nos services</a>
      </div>
    </div>
  </section>

  <!-- Gallery Section -->
  @include('components.gallery')

  <!-- Testimonials Section -->
  @include('components.testimonials')

  <!-- Contact & Booking CTA -->
  <section class="py-16 text-white bg-rose-600">
    <div class="container px-4 text-center">
      <h2 class="mb-6 text-3xl font-bold">Prêt à vous faire chouchouter?</h2>
      <p class="max-w-2xl mx-auto mb-8 text-xl">
        Réservez votre rendez-vous dès maintenant et offrez-vous un moment de détente et de beauté chez AdéCoif.
      </p>
      <div class="flex flex-col justify-center gap-4 sm:flex-row">
        <a href="{{ route('reservation') }}" class="bg-white btn btn-lg text-rose-600 hover:bg-gray-200">Réserver un rendez-vous</a>
        <a href="{{ route('contact') }}" class="text-white border border-white btn btn-lg hover:bg-white/10">Nous contacter</a>
      </div>
    </div>
  </section>

  <!-- Info Section -->
  @include('components.info')

  <!-- Shop Preview -->
  @include('components.shop-preview')
</div>
@endsection
