<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Supprimer compte') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Une fois votre compte supprimé, tout ses resources et donnés seront supprimé permanament. Avant de supprimer votre compte, SVP télécharger toutes vos données et information que vous souhaiter garder.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Supprimer compte') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Etes-vous sûr de vouloir supprimer votre compte?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Une fois votre compte supprimé, tout ses resources et donnés seront supprimé permanament. SVP, entrer votre mot de passe pour confirmer que vous aimeriez supprimer votre compte permanament.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Mot de passe') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Mot de passe') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Annuler') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Supprimer') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
