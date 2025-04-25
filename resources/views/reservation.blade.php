@extends('layouts.app')

@section('title', 'Réservation - AdéCoif')
@section('meta_description', 'Réservez votre rendez-vous chez AdéCoif, institut de beauté à Abomey-Calavi. Choisissez le service, la date et l\'heure qui vous conviennent.')

@section('content')
    <div class="py-12 md:py-20">
        <div class="container px-4">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h1 class="text-4xl font-bold mb-6 text-gray-800">Réservation</h1>
                <p class="text-xl text-gray-600">
                    Réservez votre rendez-vous en quelques clics. Choisissez le service, la date et l'heure qui vous
                    conviennent.
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

                    <form action="{{ route('reservation.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-rose-500 focus:border-rose-500 @error('name') border-red-500 @enderror" placeholder="Votre nom" required>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-rose-500 focus:border-rose-500 @error('email') border-red-500 @enderror" placeholder="votre@email.com" required>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-rose-500 focus:border-rose-500 @error('phone') border-red-500 @enderror" placeholder="+229 XX XX XX XX" required>
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="service_id" class="block text-sm font-medium text-gray-700">Service</label>
                            <select id="service_id" name="service_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-rose-500 focus:border-rose-500 @error('service_id') border-red-500 @enderror" required>
                                <option value="">Sélectionnez un service</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ (old('service_id') == $service->id || (isset($selectedService) && $selectedService->id == $service->id)) ? 'selected' : '' }}>
                                        {{ $service->name }} ({{ $service->formatted_price }})
                                    </option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="space-y-2">
                                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                <input type="date" id="date" name="date" value="{{ old('date') }}" min="{{ date('Y-m-d') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-rose-500 focus:border-rose-500 @error('date') border-red-500 @enderror" required>
                                @error('date')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="time" class="block text-sm font-medium text-gray-700">Heure</label>
                                <select id="time" name="time" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-rose-500 focus:border-rose-500 @error('time') border-red-500 @enderror" required>
                                    <option value="">Sélectionnez une heure</option>
                                    @foreach($timeSlots as $timeSlot)
                                        <option value="{{ $timeSlot }}" {{ old('time') == $timeSlot ? 'selected' : '' }}>{{ $timeSlot }}</option>
                                    @endforeach
                                </select>
                                @error('time')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="notes" class="block text-sm font-medium text-gray-700">Notes supplémentaires</label>
                            <textarea id="notes" name="notes" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-rose-500 focus:border-rose-500 @error('notes') border-red-500 @enderror" placeholder="Informations supplémentaires concernant votre réservation...">{{ old('notes') }}</textarea>
                            @error('notes')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 bg-rose-600 text-white rounded-md hover:bg-rose-700 text-sm font-medium">
                            Confirmer la réservation
                        </button>
                    </form>
                </div>

                <div class="mt-8 bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
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
                        Pour toute demande spéciale ou réservation en dehors des heures d'ouverture, veuillez nous contacter
                        directement par téléphone au +229 97 21 83 15.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
