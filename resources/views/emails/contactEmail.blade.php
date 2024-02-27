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

    <title>{{ $contact->title ?? 'Demande' }} || Contact</title>
</head>
<body class="flex items-center justify-center">
    <div class="container mt-8 border-dashed border-2 border-indigo-300 rounded-2xl p-4 flex flex-col w-[70%] m-auto">
        <div class="text-center mx-auto my-5" style="max-width: 600px;">
            <h1 class="uppercase font-bold"><span class="text-primary">Message</span> de contact du website</h1>
        </div>

        <h2 class="font-semibold captalize headline-font tracking-wide">Autheur: <span class="text-primary ml-4 capitalize font-medium primary-font">{{ $contact->name }}</span></h2>
        <h2 class="font-semibold captalize headline-font tracking-wide">Objet: <span class="text-primary ml-4 capitalize font-medium primary-font">{{ $contact->subject }}</span></h2>
             
        <div class="mt-6 primary-font">
            <h3 class="font-semibold headline-font uppercase italic tracking-wide mb-4">Contenu du message:</h3>
            <p class="primary-font tracking-wide indent-4 text-base">{{ $contact->message }}</p>
        </div>
    </div>
</body>
</html>