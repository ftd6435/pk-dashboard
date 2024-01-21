<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Merci pour l\'inscription! Avant de commencer, pourriez-vous verifié votre adresse email en cliquant sur le lien que nous venons juste de vous envoyé? Si vous n\'avez pas réçu l\email, nous vous envoyerons un autre avec plaisir.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Un nouveau lien a été envoyé a l\adresse email fournir lors de l\inscription.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Renvoi de lien de verification email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Se Deconnecter') }}
            </button>
        </form>
    </div>
</x-guest-layout>
