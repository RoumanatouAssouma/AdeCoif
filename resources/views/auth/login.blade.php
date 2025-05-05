<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen px-4 py-12 bg-gradient-to-r from-indigo-100 via-purple-100 to-pink-100 sm:px-6 lg:px-8">
        <div class="w-full max-w-md p-8 bg-white shadow-xl rounded-2xl">
            <h2 class="mb-6 text-3xl font-extrabold text-center text-gray-900">
                {{ __('Se connecter à votre compte') }}
            </h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input 
                        id="email" 
                        class="block w-full px-4 py-3 mt-1 border-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required autofocus autocomplete="username" 
                        placeholder="Entrez votre email"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <x-input-label for="password" :value="__('Mot de passe')" />
                    <div class="relative">
                        <x-text-input 
                            id="password" 
                            class="block w-full px-4 py-3 mt-1 border-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                            type="password" 
                            name="password" 
                            required autocomplete="current-password" 
                            placeholder="Entrez votre mot de passe"
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

                <!-- Remember Me -->
                <div class="flex items-center mt-4">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" 
                        name="remember"
                    >
                    <label for="remember_me" class="block ml-2 text-sm text-gray-900">
                        {{ __('Se souvenir de moi') }}
                    </label>
                </div>

                <!-- Forgot Password & Login Button -->
                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 underline hover:text-indigo-900" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                    @endif

                    <x-primary-button class="w-full py-3 mt-6 font-semibold text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700">
                        {{ __('Connexion') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Inscription Button -->
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">
                    {{ __("Pas encore de compte ?") }}
                    <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-900">
                        {{ __('Inscrivez-vous') }}
                    </a>
                </p>
            </div>
        </div>
    </div>

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
    </script>
</x-guest-layout>
