<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input 
                id="name" 
                class="block w-full px-4 py-3 mt-1 border-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                type="text" 
                name="name" 
                :value="old('name')" 
                required autofocus autocomplete="name" 
                placeholder="Entrez votre nom"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input 
                id="email" 
                class="block w-full px-4 py-3 mt-1 border-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required autocomplete="username" 
                placeholder="Entrez votre email"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <div class="relative">
                <x-text-input 
                    id="password" 
                    class="block w-full px-4 py-3 mt-1 border-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                    type="password" 
                    name="password" 
                    required autocomplete="new-password" 
                    placeholder="Entrez un mot de passe"
                />
                <button 
                    type="button" 
                    class="absolute text-gray-500 transform -translate-y-1/2 right-4 top-1/2"
                    id="toggle-password"
                >
                    <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 feather feather-eye"><path d="M1 10s3-7 9-7 9 7 9 7-3 7-9 7-9-7-9-7z"></path><circle cx="10" cy="10" r="3"></circle></svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

            <div class="relative">
                <x-text-input 
                    id="password_confirmation" 
                    class="block w-full px-4 py-3 mt-1 border-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                    type="password" 
                    name="password_confirmation" 
                    required autocomplete="new-password" 
                    placeholder="Confirmez votre mot de passe"
                />
                <button 
                    type="button" 
                    class="absolute text-gray-500 transform -translate-y-1/2 right-4 top-1/2"
                    id="toggle-confirm-password"
                >
                    <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 feather feather-eye"><path d="M1 10s3-7 9-7 9 7 9 7-3 7-9 7-9-7-9-7z"></path><circle cx="10" cy="10" r="3"></circle></svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Déjà inscrit ?') }}
            </a>

            <x-primary-button class="w-full py-3 mt-4 font-semibold text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700">
                {{ __('Inscription') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        document.getElementById('toggle-password').addEventListener('click', function() {
            let passwordInput = document.getElementById('password');
            let icon = document.getElementById('eye-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.setAttribute('d', 'M1 10s3-7 9-7 9 7 9 7-3 7-9 7-9-7-9-7z'); // Change icon to open eye
            } else {
                passwordInput.type = 'password';
                icon.setAttribute('d', 'M1 10s3-7 9-7 9 7 9 7-3 7-9 7-9-7-9-7z'); // Change icon to closed eye
            }
        });

        document.getElementById('toggle-confirm-password').addEventListener('click', function() {
            let confirmPasswordInput = document.getElementById('password_confirmation');
            let icon = document.getElementById('eye-icon');
            if (confirmPasswordInput.type === 'password') {
                confirmPasswordInput.type = 'text';
                icon.setAttribute('d', 'M1 10s3-7 9-7 9 7 9 7-3 7-9 7-9-7-9-7z'); // Change icon to open eye
            } else {
                confirmPasswordInput.type = 'password';
                icon.setAttribute('d', 'M1 10s3-7 9-7 9 7 9 7-3 7-9 7-9-7-9-7z'); // Change icon to closed eye
            }
        });
    </script>
</x-guest-layout>
