<!DOCTYPE html>
<html lang="en">
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

    <title>Register || Construction</title>
</head>
<body>
    <div class="paralax-unsub flex items-center justify-center">
        <div class="container bg-slate-100  drop-shadow-lg rounded-2xl p-6 flex flex-col w-[40%] m-auto">
            <div class="flex items-center flex-col mb-4">
                <img src="/img/logo-white.jpg" alt="Logo" class="block rounded-full text-center" width="300" height="120" />
                <h2 class="mt-4 uppercase text-xl font-semibold healine-font">Inscrivez-vous en tant que utilisateur</h2>
            </div>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
        
                <!-- Name -->
                <div>
                    <x-input-label for="name" class="primary-font" :value="__('Nom complet')" />
                    <x-text-input id="name" class="block mt-1 w-full primary-font" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 primary-font" />
                </div>
        
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" class="primary-font" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full primary-font" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 primary-font" />
                </div>
        
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" class="primary-font" :value="__('Mot de passe')" />
        
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2 primary-font" />
                </div>
        
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" class="primary-font" :value="__('Confirmer mot de passe')" />
        
                    <x-text-input id="password_confirmation" class="block mt-1 w-full primary-font"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
        
                <div class="flex items-center justify-between mt-4">
                    <a class="primary-font underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Déjà inscrit?') }}
                    </a>
        
                    <x-primary-button class="ms-4 primary-font">
                        {{ __('S\'inscrire') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
