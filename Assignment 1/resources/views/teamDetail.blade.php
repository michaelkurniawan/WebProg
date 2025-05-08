<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $member['name'] }} - Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        .carousel-img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0;
        transition: opacity 1s ease-in-out;
        }
        .carousel-img.active {
        opacity: 1;
        }
        .raleway {
            font-family: 'Raleway', sans-serif;
        }
    </style>
</head>
<body class="bg-white min-h-screen flex items-center justify-center" style="background-image: url('/image/bg.png');">
    <a href="{{ route('team.index') }}" onclick="sessionStorage.setItem('skipAnimation', 'true')" class="absolute top-4 left-4 flex items-center text-gray-600 hover:text-black transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="raleway font-medium">Back</span>
    </a>
    <div class="max-w-7xl w-full flex flex-col md:flex-row gap-24 p-8">
        
        <div class="md:w-1/2 w-full flex justify-center items-center shadow-sm">
            <div class="relative h-[90vh] aspect-[3/4] overflow-hidden shadow-lg">
                @foreach ($member['gallery'] as $index => $image)
                <img
                    src="{{ asset($image) }}"
                    alt="{{ $member['name'] }} image {{ $index + 1 }}"
                    class="carousel-img {{ $loop->first ? 'active' : '' }}"
                    id="carousel-img-{{ $index }}"
                />
                @endforeach
            </div>
        </div>

        <!-- Info -->
        <div class="md:w-1/2 w-full flex flex-col justify-center text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-4 raleway">{{ $member['name'] }}</h1>
            <p class="text-lg text-gray-600 mb-6 raleway">ID: {{ $member['student_id'] }} - {{ $member['class'] }}</p>
            <p class="text-base text-gray-700 leading-relaxed raleway">
                {!! nl2br(e($member['description'] ?? 'Deskripsi belum tersedia untuk anggota ini.')) !!}
            </p>
        </div>

    </div>

    <script>
        const images = document.querySelectorAll('.carousel-img');
        let currentIndex = 0;

        setInterval(() => {
            images[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % images.length;
            images[currentIndex].classList.add('active');
        }, 2000);
    </script>
</body>
</html>
