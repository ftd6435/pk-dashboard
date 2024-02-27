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

    <title>Désabonnement || Newsletter</title>
</head>
<body>
    <div class="paralax-unsub flex items-center justify-center">
        <div class="container text-center bg-slate-100 border-dashed border-4 border-red-500 drop-shadow-lg rounded-2xl p-4 flex flex-col w-[60%] m-auto">
            <p class="primary-font">En cliquant sur le bouton ci-dessous, vous ne recevrez plus les nouvelles de nos actualités. Et pour vous reabonner vous aurez besoin de soucrire a travers notre champ NEWSLETTER dans le pied de page.</p>
            
            @include('pages.admin.include.success')

            <div class="flex items-center justify-center mt-4 gap-4">
                <form action="{{ route('newsletter.destroy', $newsletter) }}" method="POST">
                    @csrf
                    @method('DELETE')
    
                    <button class="px-6 py-2 rounded-md border border-red-500 bg-red-600 text-indigo-50 font-medium transition-all hover:bg-red-500 duration-300 focus:outline-none focus:ring focus:ring-red-500">Se Désabonner</button>
                </form>

                <a href="{{ route('blog') }}" class="px-6 py-2 rounded-md border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500 capitalize">Retour a l'Acceuil</a>
            </div>
        </div>
    </div>
</body>
</html>