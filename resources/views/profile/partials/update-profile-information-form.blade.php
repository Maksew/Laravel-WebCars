<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg custom-color">
    <div class="max-w-xl">
        <section>
            <header>
                <h2 class="text-lg font-weight-medium text-gray-900 dark:text-gray-100">
                    {{ __('Informations du profil') }}
                </h2>

                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Mettez à jour les informations de votre compte et l'adresse e-mail.") }}
                </p>
            </header>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" class="mt-4">
                @csrf
                @method('patch')

                <div class="form-group">
                    <x-input-label for="name" class="font-weight-bold" :value="__('Nom')"></x-input-label>
                    <x-text-input id="name" name="name" type="text" class="form-control mt-2" :value="old('name', $user->name)" required autofocus autocomplete="name"></x-text-input>
                    <x-input-error class="text-danger mt-2" :messages="$errors->get('name')"></x-input-error>
                </div>

                <div class="form-group">
                    <x-input-label for="email" class="font-weight-bold" :value="__('E-mail')"></x-input-label>
                    <x-text-input id="email" name="email" type="email" class="form-control mt-2" :value="old('email', $user->email)" required autocomplete="username"></x-text-input>
                    <x-input-error class="text-danger mt-2" :messages="$errors->get('email')"></x-input-error>

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="mt-2">
                            <p class="text-sm text-gray-800 dark:text-gray-200">
                                {{ __('Votre adresse e-mail n\'est pas vérifiée.') }}

                                <button form="send-verification" class="btn btn-link btn-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                                    {{ __('Cliquez ici pour renvoyer le e-mail de vérification.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-weight-medium text-sm text-success">
                                    {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="d-flex align-items-center mt-4">
                    <x-primary-button class="btn btn-primary">{{ __('Enregistrer') }}</x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400 ml-3"
                        >{{ __('Enregistré.') }}</p>
                    @endif
                </div>
            </form>
        </section>
    </div>
</div>
