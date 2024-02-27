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

    <title>{{ $contact->title ?? 'Newsletter' }} || Newsletter</title>
</head>
<body>
    <div class="paralax">
        <h1 class="font-bold uppercase headline-font text-slate-200 text-2xl text-center mb-8">Salut ✋!<span class="text-primary"> Cher(e)</span> abonné(e)</h1>
        <div class="bg-slate-100 p-8">
            <h3 class="uppercase font-semibold headline-font"><i class="fa-regular fa-newspaper text-primary text-lg mr-4"></i> Un nouvel article a été posté sur notre platforme</h3>
            <h4 class="tracking-wide font-medium my-3 primary-font"><span class="text-primary uppercase mr-4 font-semibold headline-font">Titre:</span>{{ $post->title }}</h4>
            <p class="indent-4 primary-font">{{ $post->content($post->content) }}</p>
            <div class="flex items-center justify-center my-4">
                <a href="{{ route('blog') }}" class="px-6 py-2 rounded-md border border-indigo-500 bg-indigo-600 text-indigo-50 font-medium transition-all hover:bg-indigo-500 duration-300 focus:outline-none focus:ring focus:ring-indigo-500">Voir Les Actualités</a>
            </div>
            <p class="primary-font">Merci d'être l'un(e) de nos fidèl(e)s abonné(e)s.</p>
            <p class="primary-font mt-3 mb-1">Cordialement,</p>
            <h2 class="headline-font font-medium">PDG Oumar Kaba</h2>
        </div>

        <div class="mt-8 p-8 bg-slate-100">
            <p class="primary-font">
                Cette notification vous a été soumit automatiquement après que vous y êtes abonné a notre NEWSLETTER, vous pouvez vous désabonnez a tout moment juste en cliquant sur le bouton ci-dessous...
            </p>
            <div class="flex items-center justify-center mt-4">
                <a href="{{ route('newsletter.unsubscribe', $notifiable) }}" class="px-6 py-2 rounded-md border border-red-500 bg-red-600 text-indigo-50 font-medium transition-all hover:bg-red-500 duration-300 focus:outline-none focus:ring focus:ring-red-500">Se Désabonner</a>
            </div>
        </div>
    </div>
</body>
</html>