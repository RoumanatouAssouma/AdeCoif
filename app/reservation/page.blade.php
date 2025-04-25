@extends('layouts.app')

@section('content')
<div class="py-12 md:py-20">
    <div class="container px-4">
        <!-- En-tête -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h1 class="text-4xl font-bold mb-6 text-gray-800">Réservation</h1>
            <p class="text-xl text-gray-600">
                Réservez votre rendez-vous en quelques clics. Choisissez le service, la date et l'heure qui vous conviennent.
            </p>
        </div>

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Formulaire de réservation</h2>

                @if(session('success'))
                    <div class="bg-green-50 text-green-700 p-4 rounded-md mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('reservation.store') }}" class="space-y-6">
                    @csrf

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="space-y-2">
                            <x-label for="name" :value="'Nom complet'" />
                            <x-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>
                        <div class="space-y-2">
                            <x-label for="email" :value="'Email'" />
                            <x-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <x-label for="phone" :value="'Téléphone'" />
                        <x-input id="phone" class="block w-full" type="text" name="phone" :value="old('phone')" required />
                    </div>

                    <div class="space-y-2">
                        <x-label for="service" :value="'Service'" />
                        <select id="service" name="service" class="block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">Sélectionnez un service</option>
                            @foreach($services as $service)
                                <option value="{{ $service['id'] }}" {{ old('service') == $service['id'] ? 'selected' : '' }}>
                                    {{ $service['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="space-y-2">
                            <x-label for="date" :value="'Date'" />
                            <x-input id="date" class="block w-full" type="date" name="date" :value="old('date')" required />
                        </div>
                        <div class="space-y-2">
                            <x-label for="time" :value="'Heure'" />
                            <select id="time" name="time" class="block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">Sélectionnez une heure</option>
                                @foreach($timeSlots as $time)
                                    <option value="{{ $time }}" {{ old('time') == $time ? 'selected' : '' }}>
                                        {{ $time }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <x-label for="notes" :value="'Notes supplémentaires'" />
                        <textarea id="notes" name="notes" rows="3" class="block w-full border-gray-300 rounded-md shadow-sm">{{ old('notes') }}</textarea>
                    </div>

                    <x-button class="w-full bg-rose-600 hover:bg-rose-700">
                        {{ __('Confirmer la réservation') }}
                    </x-button>
                </form>
            </div>

            <div class="mt-8 bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4 flex items-center">
                    <svg class="h-5 w-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8v4l3 3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </svg>
                    Horaires d'ouverture
                </h3>
                <div class="grid grid-cols-2 gap-2 text-gray-700">
                    <div>Lundi - Vendredi:</div>
                    <div>8h - 19h</div>
                    <div>Samedi:</div>
                    <div>8h - 19h</div>
                    <div>Dimanche:</div>
                    <div>10h - 16h</div>
                </div>
                <p class="mt-4 text-sm text-gray-500">
                    Pour toute demande spéciale ou réservation en dehors des heures d'ouverture, veuillez nous contacter directement par téléphone au +229 97 21 83 15.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
