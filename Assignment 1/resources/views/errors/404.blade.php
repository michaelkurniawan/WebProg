<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>404 Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Raleway', sans-serif;
        }
    </style>
</head>
<body class="bg-white min-h-screen flex items-center justify-center px-4" style="background-image: url('/image/bg.png'); background-size: cover; background-position: center;">

    @php
        $randomImage = rand(1, 3);
    @endphp

    <div class="text-center p-10 max-w-lg" style="background-image: radial-gradient(circle at center, rgba(255,255,255,0.8), rgba(255,255,255,0.4));">
        <img src="{{ asset('image/Error Img/' . $randomImage . '.png') }}" alt="404 Image" class="w-60 h-auto mx-auto mb-6" />

        <h1 class="text-4xl font-bold text-gray-800 mb-3">404 - Page Not Found</h1>
        <p class="text-gray-600 mb-6">The page you're looking for doesn't seem to exist or has been moved.</p>

        <a href="{{ url('/') }}" class="inline-block px-6 py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition font-semibold">
            Back to Home
        </a>
    </div>

</body>
</html>
