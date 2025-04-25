@extends('layouts.app')

@section('content')
<div class="py-12 md:py-20">
    {{-- Hero Section --}}
    <div class="container px-4 mb-16">
        <div class="text-center max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold mb-6 text-gray-800">Nos Services</h1>
            <p class="text-xl text-gray-600 mb-8">
                Découvrez notre gamme complète de services de beauté et de coiffure, conçus pour vous faire sentir et
                paraître au mieux.
            </p>
        </div>
    </div>

    {{-- Services List --}}
    <div class="container px-4">
        <div class="grid gap-12">
            @php
            $services = [
                [
                    'id' => 'coiffure-femme',
                    'title' => 'Coiffure Femme',
                    'description' => 'Nos experts en coiffure pour femmes offrent une gamme complète de services, des coupes tendance aux colorations sophistiquées, en passant par les coiffures pour occasions spéciales.',
                    'icon' => 'scissors',
                    'image' => '/placeholder.svg?height=400&width=600&text=Coiffure Femme',
                    'details' => [
                        'Coupes et styles',
                        'Coloration et mèches',
                        'Extensions de cheveux',
                        'Traitements capillaires',
                        'Coiffures pour mariages et événements',
                    ],
                    'price' => 'À partir de 5.000 FCFA',
                ],
                [
                    'id' => 'coiffure-homme',
                    'title' => 'Coiffure Homme',
                    'description' => 'Notre équipe de barbiers qualifiés propose des coupes modernes et des soins de barbe pour les hommes qui souhaitent un look impeccable.',
                    'icon' => 'scissors',
                    'image' => '/placeholder.svg?height=400&width=600&text=Coiffure Homme',
                    'details' => [
                        'Coupes et styles',
                        'Dégradés et fades',
                        'Taille de barbe',
                        'Soins du cuir chevelu',
                        'Traitements capillaires',
                    ],
                    'price' => 'À partir de 3.000 FCFA',
                ],
                [
                    'id' => 'soins-visage',
                    'title' => 'Soins du Visage',
                    'description' => 'Nos soins du visage personnalisés nettoient, exfolient et hydratent votre peau pour un teint éclatant et une sensation de fraîcheur.',
                    'icon' => 'heart',
                    'image' => '/placeholder.svg?height=400&width=600&text=Soins du Visage',
                    'details' => [
                        'Nettoyage profond',
                        'Masques hydratants',
                        'Traitements anti-âge',
                        'Soins pour peaux sensibles',
                        'Massages du visage',
                    ],
                    'price' => 'À partir de 10.000 FCFA',
                ],
                [
                    'id' => 'manucure-pedicure',
                    'title' => 'Manucure & Pédicure',
                    'description' => 'Prenez soin de vos mains et de vos pieds avec nos services de manucure et pédicure, incluant pose de vernis, soins des cuticules et massages relaxants.',
                    'icon' => 'sparkles',
                    'image' => '/placeholder.svg?height=400&width=600&text=Manucure & Pédicure',
                    'details' => [
                        'Manucure classique',
                        'Pédicure complète',
                        'Pose de vernis gel',
                        'Nail art',
                        'Soins des cuticules'
                    ],
                    'price' => 'À partir de 7.000 FCFA',
                ],
                [
                    'id' => 'maquillage',
                    'title' => 'Maquillage',
                    'description' => 'Nos maquilleurs professionnels vous aident à créer le look parfait pour toutes les occasions, des plus naturels aux plus glamour.',
                    'icon' => 'palette',
                    'image' => '/placeholder.svg?height=400&width=600&text=Maquillage',
                    'details' => [
                        'Maquillage jour',
                        'Maquillage soirée',
                        'Maquillage mariée',
                        'Cours de maquillage',
                        'Conseils personnalisés',
                    ],
                    'price' => 'À partir de 8.000 FCFA',
                ],
                [
                    'id' => 'soins-corps',
                    'title' => 'Soins du Corps',
                    'description' => 'Offrez-vous un moment de détente avec nos soins du corps, incluant massages, gommages et enveloppements pour une peau douce et revitalisée.',
                    'icon' => 'gem',
                    'image' => '/placeholder.svg?height=400&width=600&text=Soins du Corps',
                    'details' => [
                        'Massages relaxants',
                        'Gommages corporels',
                        'Enveloppements',
                        'Soins amincissants',
                        'Rituels spa'
                    ],
                    'price' => 'À partir de 15.000 FCFA',
                ],
            ];
            @endphp

            @foreach($services as $index => $service)
                <div class="flex flex-col {{ $index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} gap-8 items-center">
                    <div class="md:w-1/2">
                        <div class="relative h-64 md:h-80 w-full rounded-lg overflow-hidden">
                            <img src="{{ $service['image'] }}" alt="{{ $service['title'] }}" class="object-cover absolute inset-0 w-full h-full">
                        </div>
                    </div>
                    <div class="md:w-1/2">
                        <div class="mb-4">
                            @switch($service['icon'])
                                @case('scissors')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-rose-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="6" r="3"></circle><circle cx="18" cy="18" r="3"></circle><line x1="20" y1="4" x2="8.12" y2="15.88"></line><line x1="14.47" y1="14.48" x2="20" y2="20"></line><line x1="8.12" y1="8.12" x2="12" y2="12"></line></svg>
                                    @break
                                @case('heart')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-rose-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path></svg>
                                    @break
                                @case('sparkles')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-rose-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"></path><path d="M5 3v4"></path><path d="M19 17v4"></path><path d="M3 5h4"></path><path d="M17 19h4"></path></svg>
                                    @break
                                @case('palette')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-rose-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="13.5" cy="6.5" r=".5"></circle><circle cx="17.5" cy="10.5" r=".5"></circle><circle cx="8.5" cy="7.5" r=".5"></circle><circle cx="6.5" cy="12.5" r=".5"></circle><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"></path></svg>
                                    @break
                                @case('gem')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-rose-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3h12l4 6-10 13L2 9Z"></path><path d="M11 3 8 9l4 13 4-13-3-6"></path><path d="M2 9h20"></path></svg>
                                    @break
                                @default
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-rose-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle></svg>
                            @endswitch
                        </div>
                        <h2 class="text-2xl font-bold mb-4 text-gray-800">{{ $service['title'] }}</h2>
                        <p class="text-gray-600 mb-6">{{ $service['description'] }}</p>
                        <ul class="mb-6 space-y-2">
                            @foreach($service['details'] as $detail)
                                <li class="flex items-center">
                                    <span class="h-1.5 w-1.5 rounded-full bg-rose-600 mr-2"></span>
                                    <span class="text-gray-700">{{ $detail }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <p class="font-medium text-rose-600 mb-6">{{ $service['price'] }}</p>
                        <a href="{{ url('/reservation?service=' . $service['id']) }}" class="inline-flex items-center justify-center rounded-md px-4 py-2 text-sm font-medium bg-rose-600 hover:bg-rose-700 text-white">
                            Réserver ce service
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- CTA Section --}}
    <div class="container px-4 mt-20">
        <div class="bg-rose-50 rounded-lg p-8 md:p-12 text-center">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 text-gray-800">Vous ne savez pas quel service choisir?</h2>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                Contactez-nous pour une consultation gratuite. Notre équipe d'experts vous aidera à déterminer les services
                qui conviennent le mieux à vos besoins.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/contact') }}" class="inline-flex items-center justify-center rounded-md px-4 py-2 text-sm font-medium bg-rose-600 hover:bg-rose-700 text-white">
                    Nous contacter
                </a>
                <a href="{{ url('/reservation') }}" class="inline-flex items-center justify-center rounded-md border border-rose-600 px-4 py-2 text-sm font-medium text-rose-600 hover:bg-rose-50">
                    Réserver un rendez-vous
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
