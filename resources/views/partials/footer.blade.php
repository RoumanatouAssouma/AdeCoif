<footer class="bg-gray-900 text-white dark:bg-gray-950">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo and About -->
            <div class="md:col-span-1">
                <a href="{{ route('home') }}" class="flex items-center mb-4">
                    <div class="relative h-10 w-10 mr-2">
                        <img src="{{ asset('images/logo.png') }}" alt="AdéCoif Logo" class="object-contain">
                    </div>
                    <span class="font-bold text-xl text-rose-400">AdéCoif</span>
                </a>
                <p class="text-gray-400 mb-4">
                    Institut de beauté de premier plan à Abomey-Calavi, offrant des services de coiffure et de beauté pour
                    hommes et femmes.
                </p>
                <div class="flex space-x-4">
                    <a href="https://facebook.com" class="text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                        </svg>
                        <span class="sr-only">Facebook</span>
                    </a>
                    <a href="https://instagram.com" class="text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.28-.059-1.689-.073-4.948-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                        <span class="sr-only">Instagram</span>
                    </a>
                    <a href="https://twitter.com" class="text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                        <span class="sr-only">Twitter</span>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4 text-rose-400">Liens Rapides</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('home') }}" class="text-gray-400 hover:text-white">
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services') }}" class="text-gray-400 hover:text-white">
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gallery') }}" class="text-gray-400 hover:text-white">
                            Galerie
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}" class="text-gray-400 hover:text-white">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-gray-400 hover:text-white">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h3 class="text-lg font-semibold mb-4 text-rose-400">Nos Services</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('services') }}?category=coiffure-femme" class="text-gray-400 hover:text-white">
                            Coiffure Femme
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services') }}?category=coiffure-homme" class="text-gray-400 hover:text-white">
                            Coiffure Homme
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services') }}?category=soins-visage" class="text-gray-400 hover:text-white">
                            Soins du Visage
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services') }}?category=manucure" class="text-gray-400 hover:text-white">
                            Manucure & Pédicure
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services') }}?category=maquillage" class="text-gray-400 hover:text-white">
                            Maquillage
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-lg font-semibold mb-4 text-rose-400">Contact</h3>
                <ul class="space-y-2 text-gray-400">
                    <li>Abomey-Calavi, Bénin</li>
                    <li>+229 97 21 83 15</li>
                    <li>aguinedmond7@gmail.com</li>
                    <li>
                        <strong>Horaires:</strong>
                        <br />
                        Lun-Sam: 8h-19h
                        <br />
                        Dim: 10h-16h
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400 text-sm">
            <p>&copy; {{ date('Y') }} AdéCoif. Tous droits réservés.</p>
        </div>
    </div>
</footer>
