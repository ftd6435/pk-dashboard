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

    <title>Modification || Construction</title>
</head>
<body>
    <div class="paralax-unsub flex items-center justify-center">
        <div class="container bg-slate-100  drop-shadow-lg rounded-2xl p-6 flex flex-col w-[50%] m-auto">
            <div class="flex items-center flex-col mb-4">
                <img src="/img/logo-white.jpg" alt="Logo" class="block rounded-full text-center" width="300" height="120" />
                <h2 class="mt-4 uppercase text-xl font-semibold healine-font">Modification de Mot de passe</h2>
            </div>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf
        
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
        
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" class="primary-font" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full primary-font" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 primary-font" />
                </div>
        
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" class="primary-font" :value="__('Mot de passe')" />
                    <x-text-input id="password" class="block mt-1 w-full primary-font" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 primary-font" />
                </div>
        
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" class="primary-font" :value="__('Confirmer mot de passe')" />
        
                    <x-text-input id="password_confirmation" class="block mt-1 w-full primary-font"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 primary-font" />
                </div>
        
                <div class="flex items-center justify-end mt-4 primary-font">
                    <x-primary-button>
                        {{ __('Réinitialiser mot de passe') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>



