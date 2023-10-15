<section>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg custom-color">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-weight-medium text-gray-900 dark:text-gray-100">
                            {{ __('Mettre à jour le mot de passe') }}
                        </h2>

                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester en sécurité.') }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('password.update') }}" class="mt-4">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <x-input-label for="current_password" class="font-weight-bold" :value="__('Mot de passe actuel')"></x-input-label>
                            <x-text-input id="current_password" name="current_password" type="password" class="form-control mt-2" autocomplete="current-password"></x-text-input>
                            <x-input-error class="text-danger mt-2" :messages="$errors->updatePassword->get('current_password')"></x-input-error>
                        </div>

                        <div class="form-group">
                            <x-input-label for="password" class="font-weight-bold" :value="__('Nouveau mot de passe')"></x-input-label>
                            <x-text-input id="password" name="password" type="password" class="form-control mt-2" autocomplete="new-password"></x-text-input>
                            <x-input-error class="text-danger mt-2" :messages="$errors->updatePassword->get('password')"></x-input-error>
                        </div>

                        <div class="form-group">
                            <x-input-label for="password_confirmation" class="font-weight-bold" :value="__('Confirmer le mot de passe')"></x-input-label>
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control mt-2" autocomplete="new-password"></x-text-input>
                            <x-input-error class="text-danger mt-2" :messages="$errors->updatePassword->get('password_confirmation')"></x-input-error>
                        </div>

                        <div class="d-flex align-items-center mt-4">
                            <x-primary-button class="btn btn-primary">{{ __('Enregistrer') }}</x-primary-button>

                            @if (session('status') === 'password-updated')
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

    </form>
</section>
