<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kainara Team</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'Storica';
            src: url('/fonts/Storica/Storica-Bold.ttf') format('truetype');
            font-weight: 700;
            font-style: normal;
        }
        .fade-out {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        .opening-transition {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        .opening-transition.show {
            opacity: 1;
        }
        .raleway {
            font-family: 'Raleway', serif;
        }
        .storica {
            font-family: 'Storica', sans-serif;
            font-weight: 700;
            color: #895129
        }
    </style>
</head>
<body class="bg-white min-h-screen flex flex-col" style="background-image: url('/image/bg.png');">
    <div id="opening1" class="flex items-center justify-center h-screen transition-opacity duration-1000 opening-transition">
        <img src="/image/logo/1.png" alt="Logo Kainara" class="w-1/2 h-auto">
    </div>

    <div id="opening2" class="flex items-center justify-center h-screen transition-opacity duration-1000 opening-transition">
        <div class="flex flex-col items-start text-left relative">
            <p class="text-base text-gray-600 tracking-widest raleway">WE ARE</p>
            <h1 class="text-9xl font-bold tracking-widest storica m-2">KAINARA</h1>
            <div class="flex justify-end items-end w-full">
                <p class="text-base text-gray-600 tracking-widest raleway">BANGGA PAKAI KARYA UMKM</p>
            </div>
        </div>
    </div>

    <div id="mainContent" class="hidden flex-1 flex flex-col items-center justify-center p-6">
        <h2 class="text-3xl font-semibold text-gray-700 mb-8 raleway">Meet Our Team!</h2>
        <div class="flex flex-row flex-wrap justify-center gap-6">
            @foreach ($members as $member)
                <a href="{{ route('team.show', ['alt' => $member['alt']]) }}">
                    <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col items-center text-center w-64 hover:scale-110 hover:translate-2 transition-transform duration-300">
                        <div class="w-48 aspect-[3/4] overflow-hidden rounded-lg mb-4">
                            <img src="{{ asset($member['gallery'][0]) }}" alt="{{ $member['alt'] }}" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 raleway">{{ $member['name'] }}</h3>
                        <p class="text-sm text-gray-500 raleway">ID: {{ $member['student_id'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>       
    </div>
    
    
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const opening1 = document.getElementById('opening1');
            const opening2 = document.getElementById('opening2');
            const main = document.getElementById('mainContent');
            const skipAnimation = sessionStorage.getItem('skipAnimation') === 'true';
    
            if (skipAnimation) {
                sessionStorage.removeItem('skipAnimation');
                opening1.classList.add('hidden');
                opening2.classList.add('hidden');
                main.classList.remove('hidden');
            } else {
                opening1.classList.add('show');

                setTimeout(() => {
                    opening1.classList.remove('show');
                    opening1.classList.add('fade-out');

                    setTimeout(() => {
                        opening1.classList.add('hidden');

                        opening2.classList.add('show');

                        setTimeout(() => {
                            opening2.classList.remove('show');
                            opening2.classList.add('fade-out');

                            setTimeout(() => {
                                opening2.classList.add('hidden');
                                main.classList.remove('hidden');
                            }, 1000);
                        }, 2000);
                    }, 1000);
                }, 2000);

            }
        });
    </script>
</body>
</html>
