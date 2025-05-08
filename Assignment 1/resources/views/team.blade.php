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
        #opening {
            opacity: 0;
            transition: opacity 0.5s ease-in;
        }
        #opening.show {
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
    <div id="opening" class="flex items-center justify-center h-screen transition-opacity duration-1000 opening-transition">
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
            const opening = document.getElementById('opening');
            const main = document.getElementById('mainContent');
            const skipAnimation = sessionStorage.getItem('skipAnimation') === 'true';
    
            if (skipAnimation) {
                sessionStorage.removeItem('skipAnimation');
                opening.classList.add('hidden');
                main.classList.remove('hidden');
            } else {
                opening.classList.add('show');
                setTimeout(() => {
                    opening.classList.remove('show');
                    opening.classList.add('fade-out');
                    setTimeout(() => {
                        opening.classList.add('hidden');
                        main.classList.remove('hidden');
                    }, 1000);
                }, 2000);
            }
        });
    </script>
    
    

</body>
</html>
