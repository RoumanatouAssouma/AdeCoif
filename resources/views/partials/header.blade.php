<header class="sticky top-0 z-50 transition-all duration-300 shadow-md bg-gradient-to-r from-red-400 to-blue-300 dark:bg-gradient-to-r dark:from-red-800 dark:to-blue-800">
    <div class="container px-4 mx-auto">
        <div class="flex items-center justify-between h-20">
            <!-- Logo avec animation hover -->
            <a href="{{ route('home') }}" class="flex items-center transition-all duration-300 group">
                <div class="relative w-12 h-12 mr-3 overflow-hidden transition-all duration-300 rounded-lg shadow-sm group-hover:shadow-md">
                    <img src="{{ asset('images/logo.png') }}" alt="AdéCoif Logo" class="object-contain transition-transform duration-300 group-hover:scale-105">
                </div>
                <span class="text-2xl font-bold text-black transition-colors duration-300 dark:text-white group-hover:text-red-800 dark:group-hover:text-rose-300">AdéCoif</span>
            </a>

            <!-- Desktop Navigation avec effet de soulignement -->
            <nav class="items-center hidden space-x-8 text-black md:flex dark:text-white ont-bold">
                @php
                    $navItems = [
                        'home' => 'Accueil',
                        'services' => 'Services',
                        'gallery' => 'Galerie',
                        'blog' => 'Blog',
                        'contact' => 'Contact'
                    ];
                @endphp
                
                @foreach($navItems as $route => $label)
                    <a href="{{ route($route) }}" 
                       class="text-gray-800 hover:text-rose-600 font-medium dark:text-gray-200 dark:hover:text-rose-400 {{ request()->routeIs($route.'*') ? 'text-rose-600 dark:text-rose-400' : '' }} relative py-2 group transition-all duration-200">
                        {{ $label }}
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-rose-600 dark:bg-rose-400 group-hover:w-full transition-all duration-300 {{ request()->routeIs($route.'*') ? 'w-full' : '' }}"></span>
                    </a>
                @endforeach
            </nav>

            <!-- Action Buttons avec améliorations visuelles -->
            <div class="items-center hidden space-x-5 md:flex">
                <button id="theme-toggle" class="p-2 text-gray-700 transition-all duration-300 rounded-full shadow-sm hover:bg-white hover:text-rose-600 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-rose-400 hover:shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden w-5 h-5 dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="block w-5 h-5 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>
                <a href="{{ route('shop') }}" class="inline-flex items-center px-5 py-2.5 border border-rose-600 text-rose-600 rounded-lg hover:bg-white text-sm font-medium dark:border-rose-400 dark:text-rose-400 dark:hover:bg-gray-700 transition-all duration-300 shadow-sm hover:shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Boutique
                </a>
                <a href="{{ route('reservation') }}" class="inline-flex items-center px-5 py-2.5 bg-rose-600 text-white rounded-lg hover:bg-rose-700 text-sm font-medium transition-all duration-300 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                    Réserver
                </a>
            </div>

            <!-- Mobile Menu Button amélioré -->
            <button id="mobile-menu-button" class="p-2 text-gray-700 transition-colors duration-300 rounded-lg md:hidden dark:text-gray-300 hover:bg-white dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu avec animations -->
    <div id="mobile-menu" class="hidden transition-all duration-300 bg-white border-t shadow-inner md:hidden dark:bg-gray-800 dark:border-gray-700">
        <div class="container px-4 py-6 mx-auto space-y-5">
            <nav class="flex flex-col space-y-4">
                @foreach($navItems as $route => $label)
                    <a href="{{ route($route) }}" 
                       class="text-gray-800 hover:text-rose-600 font-medium py-2.5 dark:text-gray-200 dark:hover:text-rose-400 {{ request()->routeIs($route.'*') ? 'text-rose-600 dark:text-rose-400 pl-2 border-l-4 border-rose-600 dark:border-rose-400' : '' }} transition-all duration-300 rounded-r-lg hover:bg-rose-50 dark:hover:bg-gray-700 hover:pl-2">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>
            <div class="flex flex-col pt-2 space-y-4">
                <button id="mobile-theme-toggle" class="flex items-center justify-center w-full px-5 py-3 text-gray-700 transition-all duration-300 border border-gray-300 rounded-lg hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden w-4 h-4 mr-3 dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="block w-4 h-4 mr-3 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <span class="dark:hidden">Mode sombre</span>
                    <span class="hidden dark:block">Mode clair</span>
                </button>
                <a href="{{ route('shop') }}" class="inline-flex items-center justify-center w-full px-5 py-3 transition-all duration-300 border-2 rounded-lg shadow-sm border-rose-600 text-rose-600 hover:bg-white dark:border-rose-400 dark:text-rose-400 dark:hover:bg-gray-700 hover:shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Boutique
                </a>
                <a href="{{ route('reservation') }}" class="inline-flex items-center justify-center px-5 py-3 bg-rose-600 text-white rounded-lg hover:bg-rose-700 w-full transition-all duration-300 shadow hover:shadow-md transform hover:-translate-y-0.5">
                    Réserver
                </a>
            </div>
        </div>
    </div>
</header>

@push('scripts')
<script>
    // Toggle mobile menu avec animation
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
            setTimeout(() => {
                mobileMenu.classList.add('opacity-100');
                mobileMenu.classList.remove('opacity-0');
            }, 10);
        } else {
            mobileMenu.classList.add('opacity-0');
            mobileMenu.classList.remove('opacity-100');
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300);
        }
    });

    // Theme toggle functionality amélioré
    function setTheme(darkMode) {
        if (darkMode) {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        }
    }

    // Check for saved theme preference or use system preference
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark' || (!savedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        setTheme(true);
    }

    // Add event listeners for theme toggle buttons avec transitions visuelles
    document.addEventListener('DOMContentLoaded', function() {
        const themeToggle = document.getElementById('theme-toggle');
        const mobileThemeToggle = document.getElementById('mobile-theme-toggle');
        
        if (themeToggle) {
            themeToggle.addEventListener('click', function() {
                const isDark = document.documentElement.classList.contains('dark');
                this.classList.add('animate-spin-once');
                setTimeout(() => {
                    this.classList.remove('animate-spin-once');
                }, 300);
                setTheme(!isDark);
            });
        }
        
        if (mobileThemeToggle) {
            mobileThemeToggle.addEventListener('click', function() {
                const isDark = document.documentElement.classList.contains('dark');
                setTheme(!isDark);
            });
        }
    });

    // Animation CSS pour le spin des boutons de thème et effets de transition
    if (!document.getElementById('spin-animation')) {
        const style = document.createElement('style');
        style.id = 'spin-animation';
        style.textContent = `
            @keyframes spin-once {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            .animate-spin-once {
                animation: spin-once 0.3s ease-in-out;
            }
            #mobile-menu {
                transition: opacity 0.3s ease;
            }
            #mobile-menu.opacity-0 {
                opacity: 0;
            }
            #mobile-menu.opacity-100 {
                opacity: 1;
            }
            
            /* Style supplémentaire pour l'effet de fond */
            header {
                border-bottom: 1px solid rgba(252, 231, 243, 0.3);
            }
            header.dark {
                border-bottom: 1px solid rgba(75, 85, 99, 0.3);
            }
        `;
        document.head.appendChild(style);
    }
</script>
@endpush
