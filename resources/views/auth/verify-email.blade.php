<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Fontawesome Icons Link  --}}
    <script src="https://kit.fontawesome.com/b91affedee.js"></script>
    {{-- Boxicons Icons Link --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- Font family Link: Poppins & Noto Sans --}}
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Verification || Construction</title>
</head>
<body>
    <div class="paralax-unsub flex items-center justify-center">
        <div class="container bg-slate-100  drop-shadow-lg rounded-2xl p-6 flex flex-col w-[50%] m-auto">
            <div class="flex items-center flex-col mb-4">
                <img src="/img/logo-white.jpg" alt="Logo" class="block rounded-full text-center" width="300" height="120" />
                <h2 class="mt-4 uppercase text-xl font-semibold healine-font">Vérification de l'email</h2>
            </div>

            <div class="mb-4 text-sm text-gray-600 primary-font">
                {{ __('Merci pour l\'inscription! Avant de commencer, pourriez-vous verifié votre adresse email en cliquant sur le lien que nous venons juste de vous envoyé? Si vous n\'avez pas réçu l\email, nous vous envoyerons un autre avec plaisir.') }}
            </div>
        
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 primary-font">
                    {{ __('Un nouveau lien a été envoyé a l\adresse email fournir lors de l\inscription.') }}
                </div>
            @endif
        
            <div class="mt-4 flex items-center justify-between primary-font">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
        
                    <div class="primary-font">
                        <x-primary-button>
                            {{ __('Renvoi de lien de verification email') }}
                        </x-primary-button>
                    </div>
                </form>
        
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
        
                    <button type="submit" class="primary-font underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Se Deconnecter') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>



