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

    <title>Confirmation || Construction</title>
</head>
<body>
    <div class="paralax-unsub flex items-center justify-center">
        <div class="container bg-slate-100  drop-shadow-lg rounded-2xl p-6 flex flex-col w-[50%] m-auto">
            <div class="flex items-center flex-col mb-4">
                <img src="/img/logo-white.jpg" alt="Logo" class="block rounded-full text-center" width="300" height="120" />
                <h2 class="mt-4 uppercase text-xl font-semibold healine-font">Confirmation</h2>
            </div>

            <div class="mb-4 text-sm text-gray-600 primary-font">
                {{ __('Ca c\'est une partie sécurisé de l\'application. SVP, confirmer votre mot de passe avant de continuer') }}
            </div>
        
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
        
                <!-- Password -->
                <div>
                    <x-input-label for="password" class="primary-font" :value="__('Mot de passe')" />
        
                    <x-text-input id="password" class="block mt-1 w-full primary-font"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2 primary-font" />
                </div>
        
                <div class="flex justify-end mt-4 primary-font">
                    <x-primary-button>
                        {{ __('Confirmer') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


