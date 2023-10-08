<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <!-- Prénom -->
        <div class="mt-4">
            <x-input-label for="first_name" :value="__('Name')"></x-input-label>
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('name')" required autofocus autocomplete="name"></x-text-input>
            <x-input-error :messages="$errors->get('first_name')" class="mt-2"></x-input-error>
        </div>

        <!-- Pseudo -->
        <div class="mt-4">
            <x-input-label for="pseudo" :value="__('Pseudo')"></x-input-label>
            <x-text-input id="pseudo" class="block mt-1 w-full" type="text" name="pseudo" :value="old('pseudo')" required autofocus autocomplete="pseudo"></x-text-input>
            <x-input-error :messages="$errors->get('pseudo')" class="mt-2"></x-input-error>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')"></x-input-label>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username"></x-text-input>
            <x-input-error :messages="$errors->get('email')" class="mt-2"></x-input-error>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"></x-input-label>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"></x-text-input>

            <x-input-error :messages="$errors->get('password')" class="mt-2"></x-input-error>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"></x-input-label>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"></x-text-input>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"></x-input-error>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
