<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Votre titre ici</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Style personnalisé pour le gradient -->
</head>

<body class="bg-gradient">
<nav x-data="{ open: false }" class="bg-gradient bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 p-4">
    <div class="container mx-auto">
        <div class="flex justify-between">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/logoCarsNotation.png') }}" alt="Logo" class="block h-9 w-auto">

                </a>
            </div>


            <div class="hidden md:flex items-center">
                <!-- Search Bar -->
                <div class="ml-10 flex items-center">
                    <input type="text" placeholder="Rechercher..." class="rounded-full px-4 py-2 border border-gray-300">
                    <button class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-full">Valider</button>
                </div>
            </div>

            <!-- Profile, Logout, Login, and Register Buttons -->
            <div class="flex items-center ml-auto">
                <!-- Navigation Links -->
                <a href="{{ route('vehicle.create') }}" class="ml-10 text-gray-700 dark:text-gray-200">{{ __('Noter') }}</a>
                @if (Auth::check())
                    <a href="{{ route('profile.edit') }}" class="text-gray-700 dark:text-gray-200 ml-4">{{ __('Profil') }}</a>
                    <form method="POST" action="{{ route('logout') }}" class="ml-4">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="text-gray-700 dark:text-gray-200">{{ __('Déconnecter') }}</a>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-200 ml-4">{{ __('Connexion') }}</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-gray-700 dark:text-gray-200 ml-4">{{ __('Inscription') }}</a>
                    @endif
                @endif
            </div>

            <!-- Hamburger -->
            <div class="md:hidden flex items-center">
                <button @click="open = ! open" class="text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="md:hidden">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-200">{{ __('Dashboard') }}</a>

            <input type="text" placeholder="Rechercher..." class="block px-4 py-2 w-full border border-gray-300 rounded-lg mt-2">
            <button class="block px-4 py-2 bg-blue-500 text-white rounded-lg w-full mt-2">Valider</button>

            @if (Auth::check())
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-200 mt-2">{{ __('Profile') }}</a>
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-gray-700 dark:text-gray-200">{{ __('Log Out') }}</a>
                </form>
            @else
                <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-200 mt-2">{{ __('Log in') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-200 mt-2">{{ __('Register') }}</a>
                @endif
            @endif
        </div>
    </div>
</nav>

<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>
</html>
